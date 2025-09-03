<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.head')
    @livewireStyles
    {!! ToastMagic::styles() !!}
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    @include('layouts.partials.sidebar')
    @include('layouts.partials.header')
    <div class="pc-container">
        @yield('content')
    </div>
    @include('layouts.partials.footer')
    @include('layouts.partials.scripts')
    {!! ToastMagic::scripts() !!}
    @livewireScripts
</body>

</html>
