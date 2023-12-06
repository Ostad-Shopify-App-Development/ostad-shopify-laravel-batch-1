@if($_withAppBridge)
    <!-- End custom js for this page-->
    @if(\Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_enabled') && \Osiset\ShopifyApp\Util::useNativeAppBridge())
        <script src="{{config('shopify-app.appbridge_cdn_url') ?? 'https://unpkg.com'}}/@shopify/app-bridge{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
        <script
            @if(\Osiset\ShopifyApp\Util::getShopifyConfig('turbo_enabled'))
                data-turbolinks-eval="false"
            @endif
        >
            var AppBridge = window['app-bridge'];
            var actions = AppBridge.actions;
            var utils = AppBridge.utilities;
            var createApp = AppBridge.default;
            var app = createApp({
                apiKey: "{{ \Osiset\ShopifyApp\Util::getShopifyConfig('api_key', request()->get('shop') ?? Auth::user()->name ) }}",
                host: "{{ \Request::get('host') }}",
                forceRedirect: true,
            });

            axios.interceptors.request.use(function (config) {
                return utils.getSessionToken(app) // requires a Shopify App Bridge instance
                    .then((token) => {
                        // Append your request headers with an authenticated token
                        config.headers.Authorization = `Bearer ${token}`
                        return config
                    })
            })

            // var sessionToken = setTimeout(() => {
            //     utils.getSessionToken(app).then((token) => {
            //         document.getElementByClassName('session-token').value = token;
            //         console.log(token)
            //     })
            // }, 5000);
        </script>



        @include('shopify-app::partials.token_handler')
    @endif
@endif
@stack('scripts')
