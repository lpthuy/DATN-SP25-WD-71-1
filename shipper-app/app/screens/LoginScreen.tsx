import { View, Text, TextInput, Button, StyleSheet, TouchableOpacity, Alert } from 'react-native';
import { useState } from 'react';
import axios from 'axios';
import { router } from 'expo-router';
import AsyncStorage from '@react-native-async-storage/async-storage'; // 💡 THÊM DÒNG NÀY
import API from '@/constants/api'; // ✅ Thêm dòng này

export default function LoginScreen() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleLogin = async () => {
    try {
      const res = await axios.post(`${API.BASE_URL}/api/shipper/login`, {
        email,
        password,
      });
  
      const token = res.data.token;
  
      await AsyncStorage.setItem('shipperToken', token); // 💾 Lưu token shipper
  
      router.push('/screens/OrdersScreen'); // 👉 Điều hướng tới danh sách đơn
    } catch (error: any) {
      console.log('Đăng nhập lỗi:', error?.response?.data); // 👈 Dòng mới
      const message = error?.response?.data?.message || 'Đăng nhập thất bại';
      Alert.alert('Lỗi', message);
    }
  };
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Đăng nhập Shipper</Text>

      <TextInput
        placeholder="Email"
        value={email}
        onChangeText={setEmail}
        style={styles.input}
        keyboardType="email-address"
        autoCapitalize="none"
      />
      <TextInput
        placeholder="Mật khẩu"
        value={password}
        onChangeText={setPassword}
        secureTextEntry
        style={styles.input}
      />

      <Button title="Đăng nhập" onPress={handleLogin} />

      <TouchableOpacity onPress={() => router.push('/screens/RegisterScreen')}>
        <Text style={styles.registerLink}>👉 Chưa có tài khoản? Đăng ký ngay</Text>
      </TouchableOpacity>
    </View>
  );
}

const styles = StyleSheet.create({
  container: { padding: 20, marginTop: 100 },
  title: { fontSize: 24, fontWeight: 'bold', marginBottom: 20, textAlign: 'center' },
  input: {
    borderWidth: 1,
    borderColor: '#ccc',
    padding: 10,
    marginBottom: 10,
    borderRadius: 5,
  },
  registerLink: {
    marginTop: 20,
    color: '#007bff',
    textAlign: 'center',
    textDecorationLine: 'underline',
    fontSize: 16,
  },
});
