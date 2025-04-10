import { Redirect } from 'expo-router';
import { useEffect, useState } from 'react';
import AsyncStorage from '@react-native-async-storage/async-storage';

export default function Index() {
  const [token, setToken] = useState<string | null>(null);

  useEffect(() => {
    AsyncStorage.getItem('token').then(setToken);
  }, []);

  if (token === null) {
    return <Redirect href="/screens/LoginScreen" />;
  }

  return <Redirect href="/screens/OrdersScreen" />;
}
