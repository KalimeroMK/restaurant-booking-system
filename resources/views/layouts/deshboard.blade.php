<!doctype html>
<html lang="en">

<head>
    @include('parts.header')
</head>

<body>
    <div class="wrapper">
        @include('parts.sidebar')

        <div class="main-panel">
            @include('parts.topnav')
            <div class="content">
                <div class="container-fluid">
                    @include('parts.messages')
                    @yield('main-content')
                    @include('parts.footer')
                </div>
            </div>
        </div>
    </div>

</body>
</html>