<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Qori')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <! --------------------------------- ICONOS --------------------------------- >
    <link rel="stylesheet" href="https://program09.github.io/YORDIALCANTARA/public/css/Icons/css/all.min.css">

    <! --------------------------------- Bootstrap 5 --------------------------------- >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <! --------------------------------- Jquery --------------------------------- >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <! --------------------------------- Datatables --------------------------------- >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json"></script>

    <! --------------------------------- Estilos app --------------------------------- >
    <link rel="stylesheet" href="{{ asset('css/app-light.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app-dark.css') }}">

</head>
<body>