<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'RFID System')</title>
@stack('styles')
</head>
<body>

@include('partials.header')

@include('partials.sidebar')

<div class="main" id="main">
    @yield('content')
</div>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');

    if (menuBtn && sidebar && main) {
        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            main.classList.toggle('shifted');
        });
    }
</script>

@stack('scripts')

</body>
</html>


