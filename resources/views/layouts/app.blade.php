
<x-moonshine::layout>
    <x-moonshine::layout.html :with-alpine-js="true" :with-themes="true">
        <x-moonshine::layout.head>
            <x-moonshine::layout.meta name="csrf-token" :content="csrf_token()"/>
            <x-moonshine::layout.favicon />
            <x-moonshine::layout.assets>
                @vite([
                    'resources/css/main.css',
                    'resources/js/app.js',
                ], 'vendor/moonshine')
            </x-moonshine::layout.assets>
        </x-moonshine::layout.head>
        <x-moonshine::layout.body>

            {{--// TODO top-bar--}}

            <x-moonshine::layout.top-bar :home_route="route('home')">
                <x-moonshine::layout.menu />

                @auth
                    <x-moonshine::layout.profile
                            route="/profile"
                            :log-out-route="route('web.logout')"
                            :avatar="auth()->user()?->avatar ?? ''"
                            :name-of-user="auth()->user()->name ?? ''"
                    />
                @elseguest
                    <x-moonshine::link-button :href="route('login')" class="btn-primary">
                        Войти
                    </x-moonshine::link-button>
                @endauth

            </x-moonshine::layout.top-bar>

            <x-moonshine::layout.content>
                @yield('content')
            </x-moonshine::layout.content>

        </x-moonshine::layout.body>
    </x-moonshine::layout.html>
</x-moonshine::layout>