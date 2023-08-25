<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>HOTEL</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.4/plyr.css">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            padding-bottom: 50px
        }

        .cover-container {
            position: relative;
            margin-top: 0;
        }

        .cover-image {
            width: 100%;
            height: auto;
            position: relative;
        }
        .cover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.575); /* Adjust opacity as needed */
        }
        .centered-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white; /* Set the text color to white for contrast */
        }
        .data-row {
            overflow: hidden;
        }

        .data-label {
            float: left;
            width: 150px; /* Adjust the width as needed */
        }

        .data-value {
            float: left;
            margin-left: 10px; /* Adjust the spacing between label and value */
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><strong>HOTEL</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#harga">Daftar Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pesan">Pesan Kamar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="cover-container">
        <img class="cover-image" src="{{ asset('img/cover.jpeg') }}" alt="Cover Image">
        <div class="cover-overlay"></div> <!-- Overlay to make it darker -->
        <div style="text-align: center" class="centered-text">
            <h1 style="font-size: 120px">HOTEL VIP</h1>
            <h4 style="font-family: Verdana, Geneva, Tahoma, sans-serif">Pilihan tepat untuk memilih hotel mahal.</h4>
        </div>
    </div>
    
    <main class="container">
        <div class="produk" id="produk">
            @include('ui.produk')
        </div>
        <br><br>
        <div class="harga" id="harga">
            @include('ui.harga')
        </div>
        <br><br>
        <div class="tentang" id="tentang">
            @include('ui.tentang')
        </div>
        <br><br>
        <div class="pesan" id="pesan">
            @include('ui.pesan')
        </div>
        <br><br>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('a.nav-link').on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
    
                    var hash = this.hash;
    
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){
                        window.location.hash = hash;
                    });
                }
            });
        });
    </script>

</body>
</html>
