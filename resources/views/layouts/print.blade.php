
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/style-print.css') }}">
</head>
<body>
<div class="ticket">
    <img
        src="{{ asset('assets/images/logo-plasticos-del-cerro.jpg')}}"
        alt="Logotipo">
    <p class="centrado">Plasticos del cerro
        <br>CerroYork
        <br>13/01/2024 08:22 a.m.</p>
    @yield('content')
    <p class="centrado">¡GRACIAS POR SU COMPRA!
        <br>F B: @plasticosdelcerromx</p>
    <br><br><br><br>
    <p>2024</p>
</div>
</body>
</html>
