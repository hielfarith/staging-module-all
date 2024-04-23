<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPPIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom CSS */
        body {}

        .navbar-brand {
            font-size: 1.5rem;
        }

        .jumbotron {
            background-image: url('{{ asset('images/book.jpg') }}');
            background-size: cover;
            height: 750px;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            color: white;
            text-align: left;
            position: relative;
            /* Add relative positioning to the jumbotron */
        }

        .container {
            position: absolute;
            /* Align to the top */
            left: 50px;
            top: 130px;
            /* Align to the left */
        }

        .status {
            margin-top: 50px;
        }

        .jumbotron h2 {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 64px;
            color: #023020;
        }

        .jumbotron p {
            font-style: "Montserrat", sans-serif;
            font-size: 34px;
        }

        .bg-black {
            background: #d7d2d2;
        }

        .card-title {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 34px;
            color: aliceblue;
            font-weight: bold;
        }

        .col h2 {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }

        .card-text {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 24px;
            color: aliceblue;
        }

        .card-body {
            height: 40vh;
        }

        .card-body .btn {
            background-color: #C5DBC4;
        }

        #button-addon1 {
            background-color: #ff8e74;
        }

        .card {
            border-radius: 40px;
            background-image: url('{{ asset('images/card-book.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .modal.fade .modal-dialog {
            -webkit-transform: translate(0, -50%);
            -ms-transform: translate(0, -50%);
            transform: translate(0, -50%);
            top: 50%;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.fade.show .modal-dialog {
            opacity: 1;
        }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>
