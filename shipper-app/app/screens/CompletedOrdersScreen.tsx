import { View, Text, StyleSheet, FlatList } from 'react-native';
import { useEffect, useState, useCallback } from 'react';
import axios from 'axios';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { useFocusEffect } from '@react-navigation/native';
import API from '@/constants/api';


type Order = {
  id: number;
  order_code: string;
  payment_method: string;
  status: string;
  is_paid: number;
  created_at: string;
};

export default function CompletedOrdersScreen() {
  const [orders, setOrders] = useState<Order[]>([]);
  const [loading, setLoading] = useState(false);


const fetchCompletedOrders = async () => {
  const token = await AsyncStorage.getItem('shipperToken');
  if (!token) {
    console.warn('🚫 Không có token!');
    return;
  }

  try {
    setLoading(true);

    const res = await axios.get(`${API.BASE_URL}/api/shipper/completed-orders`, {
      headers: {
        Authorization: `Bearer ${token}`,
        Accept: 'application/json',
      },
    });

    setOrders(res.data.orders || []);
  } catch (err: any) {
    const msg = err?.response?.data?.message || err.message || 'Lỗi không xác định';
    console.error('❌ Lỗi tải đơn hoàn thành:', msg);
  } finally {
    setLoading(false);
  }
};


  useFocusEffect(
    useCallback(() => {
      fetchCompletedOrders();
    }, [])
  );

  const renderItem = ({ item }: { item: Order }) => (
    <View style={styles.card}>
      <Text style={styles.code}>Mã đơn: {item.order_code}</Text>
      <Text>Phương thức: {item.payment_method}</Text>
      <Text>Thanh toán: {item.is_paid ? 'Đã thanh toán' : 'Chưa thanh toán'}</Text>
      <Text>Ngày tạo: {new Date(item.created_at).toLocaleString()}</Text>
    </View>
  );

  return (
    <View style={styles.container}>
      <Text style={styles.title}>📜 Lịch sử đơn đã hoàn thành</Text>

      {loading && <Text>Đang tải đơn hàng...</Text>}

      {!loading && orders.length === 0 && (
        <Text style={{ marginTop: 20, color: '#888' }}>Chưa có đơn hàng nào được hoàn thành</Text>
      )}

      {!loading && orders.length > 0 && (
        <FlatList
          data={orders}
          keyExtractor={(item) => item.id.toString()}
          renderItem={renderItem}
        />
      )}
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, padding: 20, backgroundColor: '#fff' },
  title: { fontSize: 22, fontWeight: 'bold', marginBottom: 10 },
  orderItem: {
    padding: 15,
    backgroundColor: '#f2f2f2',
    marginBottom: 10,
    borderRadius: 8,
  },
  orderText: { fontWeight: 'bold', marginBottom: 5 },
  card: {
    padding: 15,
    backgroundColor: '#e9e9e9',
    borderRadius: 8,
    marginBottom: 12,
  },
  code: {
    fontWeight: 'bold',
    fontSize: 16,
    marginBottom: 5,
  },
});
