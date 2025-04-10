import { View, Text, TextInput, Button, StyleSheet, Alert } from 'react-native';
import { useState } from 'react';
import axios from 'axios';
import { router } from 'expo-router';

export default function RegisterScreen() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');

  const handleRegister = async () => {
    if (password !== confirmPassword) {
      Alert.alert('Lỗi', 'Mật khẩu xác nhận không khớp');
      return;
    }

    try {
      const res = await axios.post('http://192.168.100.179:8000/api/shipper/register', {
        name,
        email,
        password,
        password_confirmation: confirmPassword,
      });
      
      
      

      Alert.alert('Thành công', 'Đăng ký thành công');
      router.replace('/screens/LoginScreen');
    } catch (error: any) {
      console.error('Lỗi đăng ký:', error.response?.data || error.message);
      
      const errors = error.response?.data?.errors;
      const message = errors
        ? Object.values(errors).flat().join('\n')
        : error.response?.data?.message || 'Đăng ký thất bại';

      Alert.alert('Lỗi', message);
    }
  };

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Đăng ký tài khoản Shipper</Text>

      <TextInput placeholder="Họ tên" value={name} onChangeText={setName} style={styles.input} />
      <TextInput placeholder="Email" value={email} onChangeText={setEmail} style={styles.input} keyboardType="email-address" autoCapitalize="none" />
      <TextInput placeholder="Mật khẩu" value={password} onChangeText={setPassword} secureTextEntry style={styles.input} />
      <TextInput placeholder="Xác nhận mật khẩu" value={confirmPassword} onChangeText={setConfirmPassword} secureTextEntry style={styles.input} />

      <Button title="Đăng ký" onPress={handleRegister} />
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
});
