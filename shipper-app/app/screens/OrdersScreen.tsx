import { View, Text, StyleSheet, FlatList, ActivityIndicator, TouchableOpacity } from 'react-native';
import { useEffect, useState } from 'react';
import axios from 'axios';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { router } from 'expo-router';
import { useIsFocused } from '@react-navigation/native'; // ✅ Thêm dòng này
import { Button } from 'react-native';
import API from '@/constants/api'; // Đảm bảo đã import đúng


type Order = {
  id: number;
  order_code: string;
  payment_method: string;
  status: string;
  is_paid: number;
  created_at: string;
};

export default function OrdersScreen() {
  const [orders, setOrders] = useState<Order[]>([]);
  const [loading, setLoading] = useState(true);
  const isFocused = useIsFocused(); // ✅ Reload khi quay lại

  const fetchOrders = async (token: string) => {
    try {
      const res = await axios.get(`${API.BASE_URL}/api/shipper/orders`, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      const filtered = res.data.orders.filter(
        (order: Order) => order.status === 'shipping'
      );
      setOrders(filtered);
    } catch (error: any) {
      const errMsg = error?.response?.data || error?.message || 'Lỗi không xác định';
      console.log('🔥 Lỗi tải đơn hàng:', JSON.stringify(errMsg));
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    const getTokenAndFetch = async () => {
      const token = await AsyncStorage.getItem('shipperToken');
      if (token) {
        setLoading(true); // 👈 Thêm để loading khi reload
        await fetchOrders(token);
      } else {
        console.log('⚠️ Không tìm thấy token đăng nhập');
        setLoading(false);
      }
    };

    if (isFocused) {
      getTokenAndFetch();
    }
  }, [isFocused]);

  if (loading) {
    return (
      <View style={styles.container}>
        <ActivityIndicator size="large" />
        <Text>Đang tải đơn hàng...</Text>
      </View>
    );
  }

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Danh sách đơn đang giao</Text>

      {/* 👉 Nút chuyển sang lịch sử đơn đã hoàn thành */}
      <Button
        title="📜 Xem đơn đã hoàn thành"
        onPress={() => router.push('/screens/CompletedOrdersScreen')}
      />

      {orders.length === 0 ? (
        <Text style={{ textAlign: 'center', marginTop: 20 }}>Không có đơn hàng nào đang giao</Text>
      ) : (
        <FlatList
          data={orders}
          keyExtractor={(item) => item.id.toString()}
          renderItem={({ item }) => (
            <TouchableOpacity onPress={() => router.push({ pathname: '/screens/OrderDetailScreen', params: { order: JSON.stringify(item) } })}>
              <View style={styles.orderItem}>
                <Text style={styles.orderText}>Mã đơn: {item.order_code}</Text>
                <Text>Phương thức: {item.payment_method}</Text>
                <Text>Thanh toán: {item.is_paid ? 'Đã thanh toán' : 'Chưa thanh toán'}</Text>
                <Text>Trạng thái: {translateStatus(item.status)}</Text>
                <Text>Ngày tạo: {new Date(item.created_at).toLocaleString()}</Text>
              </View>
            </TouchableOpacity>
          )}
        />
      )}
    </View>

  );
}

const styles = StyleSheet.create({
  container: { flex: 1, padding: 20 },
  title: { fontSize: 22, fontWeight: 'bold', marginBottom: 10 },
  orderItem: {
    padding: 15,
    backgroundColor: '#f2f2f2',
    marginBottom: 10,
    borderRadius: 8,
  },
  orderText: { fontWeight: 'bold', marginBottom: 5 },
});

const translateStatus = (status: string) => {
  switch (status) {
    case 'confirming':
      return 'Chờ xác nhận';
    case 'processing':
      return 'Đang xử lý';
    case 'shipping':
      return 'Đang giao hàng';
    case 'completed':
      return 'Đã hoàn thành';
    case 'cancelled':
      return 'Đã huỷ';
    case 'returning':
      return 'Đã hoàn trả';
    default:
      return status;
  }
};