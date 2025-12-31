import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue'

function moduleAliases() {
    const modulesPath = path.resolve(__dirname, 'Modules')
    const aliases = {}

    fs.readdirSync(modulesPath).forEach(module => {
        aliases[`@${module}`] = path.join(
            modulesPath,
            module,
            'Resources/js'
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
        vue(),
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
