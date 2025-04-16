import { View, Text, StyleSheet, Button, Alert, ScrollView } from 'react-native';
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
  const [markedPaid, setMarkedPaid] = useState(false);

  useEffect(() => {
    const fetchOrderDetails = async () => {
      try {
        const token = await AsyncStorage.getItem('shipperToken');
        const parsed = typeof params.order === 'string' ? JSON.parse(params.order) : params.order;
        const res = await axios.get(`${API.BASE_URL}/api/shipper/orders/${parsed.id}`, {
          headers: { Authorization: `Bearer ${token}` },
        });

        if (res.data.status === 'success') {
          setOrder({
            ...res.data.order,
            customer: res.data.customer,
            items: res.data.items,
            discount: res.data.discount,
            discount_percent: res.data.discount_percent,
            total_price: res.data.total_price,
            shipping_fee: res.data.shipping_fee,
            total_amount: res.data.total_amount,
          });
          
          setStatus(res.data.order.status);
        }
      } catch (err) {
        console.log('❌ Lỗi khi lấy chi tiết đơn hàng:', err);
      }
    };

    if (params.order) {
      fetchOrderDetails();
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
        Alert.alert('❌ Lỗi', res.data.message || 'Không thể cập nhật trạng thái');
      }
    } catch (err: any) {
      const msg = err?.response?.data?.message || err?.message || 'Lỗi không xác định';
      Alert.alert('❌ Lỗi', msg);
    } finally {
      setLoading(false);
    }
  };

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
        Alert.alert('❌ Lỗi', res.data.message || 'Không thể xác nhận thanh toán');
      }
    } catch (err: any) {
      const msg = err?.response?.data?.message || err?.message || 'Lỗi không xác định';
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

  const totalPrice = order.items?.reduce(
    (sum: number, item: any) => sum + item.price * item.quantity,
    0
  );

  const discount = Number(order.discount ?? 0);
  const discountPercent = discount > 0 && totalPrice > 0
    ? Math.round((discount / totalPrice) * 100)
    : 0;

  const shippingFee = totalPrice - discount >= 300000 ? 0 : 20000;

  const totalAmount = totalPrice - discount + shippingFee;



  return (
    <ScrollView style={styles.container}>
      <Text style={styles.sectionTitle}>Thông tin người nhận</Text>
      <Text>Họ tên: {order.customer?.name || '---'}</Text>
      <Text>Số điện thoại: {order.customer?.phone || '---'}</Text>
      <Text>Địa chỉ: {order.customer?.address || '---'}</Text>


      {order.items?.map((item: any, index: number) => (
        <View key={index} style={{ marginBottom: 8 }}>
          <Text style={styles.title}>Chi tiết đơn hàng</Text>
          <Text>Mã đơn: {order.order_code}</Text>
          <Text>Phương thức: {order.payment_method}</Text>
          <Text>Thanh toán: {order.is_paid ? 'Đã thanh toán' : 'Chưa thanh toán'}</Text>
          <Text>Trạng thái hiện tại: {translateStatus(status)}</Text>
          <Text>Sản phẩm: {item.product_name}</Text>
          <Text>Số lượng: {item.quantity}</Text>
          <Text>Giá: {Number(item.price).toLocaleString()}₫</Text>
          <Text>Màu: {item.color}</Text>
          <Text>Size: {item.size}</Text>
        </View>
      ))}

      <Text style={styles.sectionTitle}>Tổng chi phí</Text>
      <Text>Giá gốc: {totalPrice.toLocaleString()}₫</Text>

      {order?.promotion_code && Number(order?.discount) > 0 && (
        <>
          <Text>
            Mã giảm giá: {order.promotion_code} ({discountPercent}%)
          </Text>
          <Text>Đã giảm: {Number(order.discount).toLocaleString()}₫</Text>
        </>
      )}


<Text>
  Phí vận chuyển: {Number(order.shipping_fee ?? 0) === 0
    ? 'Miễn phí'
    : `${Number(order.shipping_fee).toLocaleString()}₫`}
</Text>
<Text style={{ fontWeight: 'bold', color: 'red' }}>
  Tổng thanh toán: {Number(order.total_amount ?? 0).toLocaleString()}₫
</Text>





      {status === 'shipping' && (
        <View style={styles.buttonGroup}>
          {order.payment_method?.toLowerCase() === 'cod' && !Number(order.is_paid) && !markedPaid && (
            <Button title="Xác nhận đã thanh toán" onPress={markAsPaid} disabled={loading} />
          )}
          {(order.payment_method?.toLowerCase() === 'vnpay' || Number(order.is_paid) === 1 || markedPaid) && (
            <View style={{ marginTop: 10 }}>
              <Button title="Đã giao thành công" onPress={() => updateStatus('completed')} disabled={loading} />
            </View>
          )}
        </View>
      )}

      {status === 'completed' && <Text style={styles.disabledText}>Đơn hàng đã hoàn tất.</Text>}
    </ScrollView>
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
  disabledText: { marginTop: 30, fontSize: 16, color: '#888' },
  sectionTitle: { marginTop: 20, marginBottom: 8, fontWeight: 'bold', fontSize: 16 },
});


