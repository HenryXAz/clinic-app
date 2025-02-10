import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({command, mode}) => {
    const {VITE_HOST} = loadEnv(mode, process.cwd(), 'VITE_HOST');
    const {VITE_PORT} = loadEnv(mode, process.cwd(), 'VITE_PORT');

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
        ],
        server: {
            host: `${VITE_HOST}:${VITE_PORT}`,
            hmr: {
                host: `${VITE_HOST}`
            },
        },
    }
});
