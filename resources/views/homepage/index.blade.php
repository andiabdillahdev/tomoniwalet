<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/page.css') }}">
    <title>Tomoniwalet</title>
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <div class="logo">
                <img src="{{ asset('assets/img/logo_tm.png') }}" alt="" srcset="">
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active">
                        <a href="#">BERANDA</a>
                    </li>
                    <li class="active">
                        <a href="#">TENTANG KAMI</a>
                    </li>
                    <li class="active">
                        <a href="#">BELANJA</a>
                    </li>
                    <li class="active">
                        <a href="#">KONTAK</a>
                    </li>
                </ul>
            </nav>
            <a href="#" class="tm_button tm_primary">Masuk</a>
        </div>
    </header>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>