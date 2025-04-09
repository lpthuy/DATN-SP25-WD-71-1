import { Stack } from 'expo-router';
import { useFonts } from 'expo-font';
import { useEffect } from 'react';
import * as SplashScreen from 'expo-splash-screen';

SplashScreen.preventAutoHideAsync();

export default function RootLayout() {
  // Load font
  const [loaded] = useFonts({
    SpaceMono: require('../assets/fonts/SpaceMono-Regular.ttf'),
  });

  // Ẩn splash screen sau khi font load xong
  useEffect(() => {
    if (loaded) {
      SplashScreen.hideAsync();
    }
  }, [loaded]);

  // Khi chưa load font thì return null
  if (!loaded) return null;

  // Trả về router Stack, dùng để render các màn hình con
  return (
    <Stack
      screenOptions={{
        headerShown: false, // Ẩn header mặc định
      }}
    />
  );
}
