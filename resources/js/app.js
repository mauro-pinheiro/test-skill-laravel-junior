require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { createVuetify } from 'vuetify'
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

const el = document.getElementById('app');
const vuetify = createVuetify()

createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin)
    .use(vuetify)
    .mount(el);

InertiaProgress.init({ color: '#4B5563' });
