
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
    <p class="centrado" id="dateSale"></p>
    @yield('content')
    <p class="centrado">¡GRACIAS POR SU COMPRA!
        <br>F B: @plasticosdelcerromx</p>
    <br><br><br><br>
    <p>2024</p>
</div>

<script>
    let f = new Date();
    f = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
    document.getElementById("dateSale").innerHTML = `Plasticos del cerro
        <br>CerroYork
        <br>${f}`;
</script>
</body>
</html>
