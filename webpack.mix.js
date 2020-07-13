const mix = require('laravel-mix');

/*mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/styles/vendors/bootstrap/dist/css/bootstrap.css',
    'resources/styles/vendors/perfect-scrollbar/css/perfect-scrollbar.min.css',
    'resources/styles/vendors/bootstrap-select/dist/css/bootstrap-select.min.css',
    'resources/styles/vendors/select2/dist/css/select2.min.css',
    'resources/styles/vendors/tempus-dominus-bs4/build/css/tempusdominus-bootstrap-4.min.css',
    'resources/styles/vendors/font-feathericons/dist/feather.css',
    'resources/styles/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
    'resources/styles/vendors/sweetalert2/animate.min.css',
    'resources/styles/vendors/font-linearicons/style.css',
    'resources/styles/vendors/font-awesome/css/font-awesome.min.css',
    'resources/styles/vendors/bootstrap-table/bootstrap-table.min.css',
    'resources/styles/vendors/font-icomoon/style.css',
    'resources/styles/vendors/toastr/toastr.min.css',
    'resources/styles/components/kit-vendors/bootstrap/css/card.css',
    'resources/styles/components/kit-vendors/bootstrap/css/utilities.css',
    'resources/styles/components/kit-vendors/bootstrap/css/buttons.css',
    'resources/styles/components/kit-vendors/bootstrap/css/table.css',
    'resources/styles/components/kit-vendors/bootstrap/css/typography.css',
    'resources/styles/components/kit-vendors/bootstrap/css/breadcrumb.css',
    'resources/styles/components/kit-vendors/bootstrap/css/dropdowns.css',
    'resources/styles/components/kit-vendors/bootstrap/css/selectboxes.css',
    'resources/styles/components/kit-vendors/bootstrap/css/badge.css',
    'resources/styles/components/kit-vendors/bootstrap/css/carousel.css',
    'resources/styles/components/kit-vendors/bootstrap/css/collapse.css',
    'resources/styles/components/kit-vendors/bootstrap/css/modal.css',
    'resources/styles/components/kit-vendors/bootstrap/css/alerts.css',
    'resources/styles/components/kit-vendors/bootstrap/css/pagination.css',
    'resources/styles/components/kit-vendors/bootstrap/css/navs.css',
    'resources/styles/components/kit-vendors/bootstrap/css/popovers.css',
    'resources/styles/components/kit-vendors/bootstrap/css/tooltips.css',
    'resources/styles/components/kit-vendors/bootstrap/css/list-group.css',
    'resources/styles/components/kit-vendors/bootstrap/css/progress.css',
    'resources/styles/components/kit-vendors/bootstrap/css/jumbotron.css',
    'resources/styles/components/kit-vendors/bootstrap/css/navbar.css',
    'resources/styles/components/kit-vendors/perfect-scrollbar/style.css',
    'resources/styles/components/kit-vendors/editable-table/style.css',
    'resources/styles/components/kit-vendors/select2/style.css',
    'resources/styles/components/kit-vendors/jquery-ui/style.css',
    'resources/styles/components/kit-vendors/c3/style.css',
    'resources/styles/components/kit-core/css/core.css',
    'resources/styles/components/kit-core/css/measurements.css',
    'resources/styles/components/kit-core/css/colors.css',
    'resources/styles/components/kit-core/css/utils.css',
    'resources/styles/components/cui-styles/style.css',
    'resources/styles/components/kit-widgets/list/style.css',
    'resources/styles/components/kit-widgets/table/style.css',
    'resources/styles/components/kit-widgets/general/style.css',
    'resources/styles/components/kit-apps/style.css',
    'resources/styles/components/cui-ecommerce/style.css',
    'resources/styles/components/cui-dashboards/style.css',
    'resources/styles/components/cui-system/auth/style.css',
    'resources/styles/components/cui-layout/breadcrumbs/style.css',
    'resources/styles/components/cui-layout/footer/style.css',
    'resources/styles/components/cui-layout/menu-left/style.css',
    'resources/styles/components/cui-layout/menu-top/style.css',
    'resources/styles/components/cui-layout/sidebar/style.css',
    'resources/styles/components/cui-layout/support-chat/style.css',
    'resources/styles/components/cui-layout/topbar/style.css',
    'resources/styles/css/customs.css',
], 'public/css/backend.css');

mix.styles([
    'resources/styles/vendors/font-awesome/css/font-awesome.min.css',
    'resources/styles/vendors/select2/dist/css/select2.min.css',
    'resources/styles/css/themeeditor-main.min.css',
], 'public/css/theme-editor.css');

mix.combine([
    'resources/styles/vendors/fontawesome-iconpicker/js/fontawesome-iconpicker.min.js',
    'resources/styles/js/themeeditor.min.js',
    'resources/styles/js/theme-editor.js',
], 'public/js/theme-editor.js');

mix.combine([
    'resources/styles/vendors/jquery/dist/jquery.min.js',
    'resources/styles/vendors/popper.js/dist/umd/popper.js',
    'resources/styles/vendors/jquery-ui/jquery-ui.min.js',
    'resources/styles/vendors/bootstrap/dist/js/bootstrap.js',
    'resources/styles/vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js',
    'resources/styles/vendors/select2/dist/js/select2.full.min.js',
    'resources/styles/vendors/jquery-validation/jquery.validate.min.js',
    'resources/styles/vendors/bootstrap-table/bootstrap-table.min.js',
    'resources/styles/vendors/sweetalert2/sweetalert2.js',
    'resources/styles/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
    'resources/styles/vendors/bootstrap-datepicker/js/load-datepicker.js',
    'resources/styles/vendors/toastr/toastr.min.js',
    'resources/styles/components/kit-core/index.js',
    'resources/styles/components/cui-layout/menu-left/index.js',
    'resources/styles/components/cui-layout/menu-top/index.js',
    'resources/styles/components/cui-layout/sidebar/index.js',
    'resources/styles/components/cui-layout/support-chat/index.js',
    'resources/styles/components/cui-layout/topbar/index.js',
    'resources/vendor/laravel-filemanager/js/stand-alone-button.js',
    'resources/styles/js/load-ajax.js',
    'resources/styles/js/load-select2.js',
    'resources/styles/js/LoadBootstrapTable.js',
    'resources/styles/js/form-ajax.js',
    'resources/js/customs.js',
], 'public/js/backend.js');*/

mix.styles([
    'resources/styles/frontend/assets/css/bootstrap.min.css',
    'resources/styles/frontend/style.css',
    'resources/styles/frontend/assets/css/style.css',
], 'public/styles/themes/mymo/css/main.css');

mix.combine([
    'resources/styles/vendors/jquery/dist/jquery.min.js',
    'resources/styles/frontend/assets/js/bootstrap.min.js',
    'resources/styles/frontend/assets/js/core.min.js',
    'resources/styles/frontend/assets/js/lazysizes.min.js',
    'resources/styles/frontend/assets/js/owl.carousel.min.js',
    'resources/styles/frontend/assets/js/ajax-auth-script.min.js',
    'resources/styles/frontend/player/assets/js/jwplayer-8.9.3.js',
    'resources/styles/frontend/player/assets/js/player.min.js',
],'public/styles/themes/mymo/js/main.js');
