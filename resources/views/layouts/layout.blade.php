<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPEG - Sistem Informasi Pegawai</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/recruitment.png" type="image/png">

    <link rel="stylesheet" href="assets/css/shared/iconly.css">
    @stack('additional-head')

</head>

<body>
    <div id="app">
        @include('layouts.partials.sidebar')
        @yield("main")
    </div>






    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    @stack('additional-js')
</body>

</html>
