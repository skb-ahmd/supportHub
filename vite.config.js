import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/argon-dashboard.css',
                'resources/css/argon-dashboard.min.css',
                'resources/css/nucleo-icons.css',
                'resources/css/nucleo-svg.css',
                
                'resources/js/core/bootstrap.bundle.min.js',
                'resources/js/core/bootstrap.min.js',
                'resources/js/core/popper.min.js',

                'resources/js/plugins/bootstrap-notify.js',
                'resources/js/plugins/perfect-scrollbar.min.js',
                'resources/js/plugins/smooth-scrollbar.min.js',
                
                'resources/js/argon-dashboard.js',
                'resources/js/argon-dashboard.min.js',
                
                'resources/js/agents/register.js'


            ],
            refresh: true,
        }),
    ],
});
