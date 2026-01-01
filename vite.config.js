import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue'
import path from 'path';
import fs from 'fs';

function moduleAliases() {
    const modulesPath = path.resolve(__dirname, 'Modules')
    const aliases = {}

    fs.readdirSync(modulesPath).forEach(module => {
        aliases[`@${module}`] = path.join(
            modulesPath,
            module,
            'resources/js'
        )
    })

    return aliases
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: false
            }
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            ...moduleAliases(),
        },
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
