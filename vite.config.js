import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { fileURLToPath, URL } from 'url';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                    'resources/css/app.css', 
                    'resources/js/admin/app.js', 
                    'resources/js/seller/app.js'
                  ],
            refresh: true,
        }),
    ],
    resolve: {
      alias: {
        "@": fileURLToPath(new URL('resources/js', import.meta.url)),
      },
    },
    optimizeDeps: {
      exclude: ['vue'],
      include: ['path/to/other/dependency'],
    },
});
