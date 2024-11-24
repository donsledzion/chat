import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            publicDirectory: 'public_html/',
            hotFile: 'public_html/hot',
            buildDirectory: 'build',
            refresh: true,
        }),
        vue(),
    ],
    build: {
        // Absolutna ścieżka do katalogu public_html/build
        outDir: path.resolve(__dirname, 'public_html/build'),
        emptyOutDir: true, // Czyści katalog przed buildem
    },
});
