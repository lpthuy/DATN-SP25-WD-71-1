import { View, Text, StyleSheet, Button, Alert } from 'react-native';
import { useLocalSearchParams, router } from 'expo-router';
import { useEffect, useState } from 'react';
import AsyncStorage from '@react-native-async-storage/async-storage';
import axios from 'axios';
import API from '@/constants/api'; // Đảm bảo đã import đúng


export default function OrderDetailScreen() {
  const params = useLocalSearchParams();
  const [order, setOrder] = useState<any>(null);
  const [status, setStatus] = useState('');
  const [loading, setLoading] = useState(false);
  const [markedPaid, setMarkedPaid] = useState(false); // ✅ để điều kiện hiển thị nút hoàn thành

  useEffect(() => {
    if (params.order) {
      try {
        const parsed = typeof params.order === 'string' ? JSON.parse(params.order) : params.order;
        setOrder(parsed);
        setStatus(parsed.status);
      } catch (err) {
        console.log('❌ JSON parse lỗi:', err);
      }
    }
  }, [params.order]);

  const updateStatus = async (newStatus = status) => {
    const token = await AsyncStorage.getItem('shipperToken');
    if (!token || !order) {
      Alert.alert('❌ Lỗi', 'Không có token hoặc đơn hàng không hợp lệ');
      return;
    }
  
    try {
      setLoading(true);
  
      const res = await axios.put(
        `${API.BASE_URL}/api/shipper/orders/${order.id}/status`,
        { status: newStatus },
        {
          headers: {
            Authorization: `Bearer ${token}`,
            Accept: 'application/json',
          },
        }
      );
  
      if (res.data.status === 'success') {
        setStatus(res.data.order.status);
        Alert.alert('✅ Thành công', 'Đơn hàng đã được cập nhật');
        router.replace('/screens/OrdersScreen');
      } else {
        console.log('❌ API báo lỗi:', res.data);
        Alert.alert('❌ Lỗi', res.data.message || 'Không thể cập nhật trạng thái');
      }
    } catch (err: any) {
      const msg = err?.response?.data?.message || err?.message || 'Lỗi không xác định';
      console.log('❌ Lỗi cập nhật trạng thái:', JSON.stringify(err?.response?.data || err));
      Alert.alert('❌ Lỗi', msg);
    } finally {
      setLoading(false);
    }
  };
  

  // ✅ Hàm gọi API xác nhận thanh toán
  const markAsPaid = async () => {
    const token = await AsyncStorage.getItem('shipperToken');
    if (!token || !order) {
      Alert.alert('❌ Lỗi', 'Không có token hoặc đơn hàng không hợp lệ');
      return;
    }
  
    try {
      setLoading(true);
  
      const res = await axios.put(
        `${API.BASE_URL}/api/shipper/orders/${order.id}/paid`,
        { is_paid: 1 },
        {
          headers: {
            Authorization: `Bearer ${token}`,
            Accept: 'application/json',
          },
        }
      );
  
      if (res.data.status === 'success') {
        setMarkedPaid(true);
        setOrder((prev: any) => ({ ...prev, is_paid: 1 }));
        Alert.alert('✅ Thành công', 'Đã xác nhận thanh toán');
      } else {
        console.log('❌ API báo lỗi:', res.data);
        Alert.alert('❌ Lỗi', res.data.message || 'Không thể xác nhận thanh toán');
      }
    } catch (err: any) {
      const msg = err?.response?.data?.message || err?.message || 'Lỗi không xác định';
      console.log('❌ Lỗi xác nhận thanh toán:', JSON.stringify(err?.response?.data || err));
      Alert.alert('❌ Lỗi', msg);
    } finally {
      setLoading(false);
    }
  };
  

  if (!order) {
    return (
      <View style={styles.container}>
        <Text style={styles.title}>Lỗi hiển thị đơn hàng</Text>
        <Text>Dữ liệu không hợp lệ hoặc đơn hàng bị thiếu.</Text>
      </View>
    );
  }

  const canMarkComplete =
    (order.payment_method === 'vnpay' && order.is_paid === 1) ||
    (order.payment_method === 'cod' && (order.is_paid === 1 || markedPaid));

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Chi tiết đơn hàng</Text>
      <Text>Mã đơn: {order.order_code}</Text>
      <Text>Phương thức: {order.payment_method}</Text>
      <Text>Thanh toán: {order.is_paid ? 'Đã thanh toán' : 'Chưa thanh toán'}</Text>
      <Text>Trạng thái hiện tại: {translateStatus(status)}</Text>

      {status === 'shipping' && (
        <View style={styles.buttonGroup}>
          {/* ✅ Nếu là COD chưa thanh toán thì hiển thị nút xác nhận */}
          {order.payment_method === 'cod' && !order.is_paid && !markedPaid && (
            <Button
              title="Xác nhận đã thanh toán"
              onPress={markAsPaid}
              disabled={loading}
            />
          )}

          {/* ✅ Hiện nút hoàn thành nếu đã xác nhận thanh toán */}
          {canMarkComplete && (
            <View style={{ marginTop: 10 }}>
              <Button
                title="Hoàn thành đơn hàng"
                onPress={() => updateStatus('completed')}
                disabled={loading}
              />
            </View>
          )}
        </View>
      )}

      {status === 'completed' && (
        <Text style={styles.disabledText}>Đơn hàng đã hoàn tất.</Text>
      )}
    </View>
  );
}

const translateStatus = (status: string) => {
  switch (status) {
    case 'confirming': return 'Chờ xác nhận';
    case 'processing': return 'Đang xử lý';
    case 'shipping': return 'Đang giao hàng';
    case 'completed': return 'Đã giao thành công';
    case 'cancelled': return 'Đã huỷ';
    case 'returning': return 'Đã hoàn trả';
    default: return status;
  }
};

const styles = StyleSheet.create({
  container: { flex: 1, padding: 20 },
  title: { fontSize: 22, fontWeight: 'bold', marginBottom: 10 },
  buttonGroup: { marginTop: 20 },
  disabledText: {
    marginTop: 30,
    fontSize: 16,
    color: '#888',
  },
});
