import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'

// Cargar variables de entorno desde `process.env`
const env = {
  VITE_VUE_APP_RUTA_API: process.env.VITE_VUE_APP_RUTA_API || ''
}

export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'src'),
      events: 'eventemitter3'
    }
  },
  define: {
    'import.meta.env': JSON.stringify(env)
  }
})
