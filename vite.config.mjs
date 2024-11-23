import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            hotFile: 'public_html/hot', // Hot file dla dev servera
        }),
        vue(),
    ],
    build: {
        outDir: 'public_html/build', // Katalog docelowy
    },
    server: {
        host: 'localhost',
        port: 5173,
        origin: 'http://localhost:5173',
    },
});
