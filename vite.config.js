import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            publicDirectory: './public_html',
            hotFile: './public_html/hot',
            buildDirectory: 'build',
            refresh: true,
        }),
        vue(),
    ],
    /*build: {
        outDir: 'public_html/build',
    },*/
});
