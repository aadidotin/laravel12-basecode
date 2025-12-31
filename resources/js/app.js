import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
    // resolve: name => import([
    //     `./Pages/${name}.vue`
    // ]),
    resolve: name => {
        // 1. Check if the name looks like "ModuleName::PageName"
        let parts = name.split('::');

        if (parts.length > 1) {
            // It's a module! Load from Modules/ModuleName/Resources/assets/js/Pages/...
            let moduleName = parts[0];
            let pageName = parts[1];
            return import(`../../Modules/${moduleName}/resources/js/pages/${pageName}.vue`);
        } else {
            // It's a standard app page
            return import(`./Pages/${name}.vue`);
        }
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})
