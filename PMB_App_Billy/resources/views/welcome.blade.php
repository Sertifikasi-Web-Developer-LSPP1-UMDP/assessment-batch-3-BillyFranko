<html>
    <head>
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            /* .container {
                background-color: #ffffff;
            } */

            .carousel-container {
                background-color: #B2BEB5; /
            }

            .carousel-inner {
                display: flex;
            }

            .carousel-item {
                transition: transform 0.5s ease;
            }

            .carousel-item.active img {
                width: 80%; 
                height: auto;
                filter: none; 
            }

            .carousel-item:not(.active) img {
                width: 80%; 
                height: auto;
                filter: blur(5px);
            }

            .carousel-item img {
                transition: all 0.5s ease;
            }

            .carousel-item img {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .main-content {
                background-color: white; 
            }

            /* .card-img-top {
                max-width: 100px;
                max-height: 100px;
                width: auto;
                height: auto;
                object-fit: contain;
            } */

        </style>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <div class="carousel-container" id="home-section">
            <div class="container-fluid bg-success">
                <div class = "container">
                <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
                    <div class="col-md-3 mb-2 mb-md-0">
                        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                            <img src="logo-umdp-1-300x248-2.png" alt="Logo" width="150" height="124">
                        </a>
                    </div>

                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#home-section" class="nav-link px-2 link-light">Home</a></li>
                        <li><a href="#informasi-section" class="nav-link px-2 link-light">Informasi</a></li>
                    </ul>


                    <div class="col-md-3  text-end">
                        <button type="button" class="btn btn-light"> <a href="{{ route('login') }}" style="text-decoration: none;"> Login </a></button>
                        <button type="button" class="btn btn-light"> <a href="{{ route('register') }}" style="text-decoration: none;"> Sign-up </a> </button>
                    </div>
                </header>
                </div>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="foto.jpg" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="foto.jpg" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="foto.jpg" class="d-block" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <br><br>
        <div class="main-content">
            <div class="container d-flex justify-content-center" id="informasi-section">
                <h1>Informasi Terbaru</h1><br>
            </div>
            <div class="container d-flex justify-content-center text-body-secondary">
                <h3>Dapatkan Informasi Mengenai Penerimaan Siswa Baru!</h3><br><br><br>
            </div>
           <div class="container">
                <div class="row"> 

                    @foreach ($pengumuman as $data)
                        <div class="col-md-4 mb-4"> 
                            <div class="card">
                                <img class="card-img-top" style="height:200px; width:100%; object-fit:cover;" src="{{ asset('storage/' . $data->lampiran_foto) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data->judul }}</h5>
                                    <div class="card-body" style="max-height: 200px; overflow-y: auto;">
                                        <p class="card-text">{{ $data->informasi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if ($pengumuman->count() < 3)
                        @for ($i = $pengumuman->count(); $i < 3; $i++)
                            <div class="col-md-4 mb-4"> 
                                <div class="card" style="visibility: hidden;">
                                </div>
                            </div>
                        @endfor
                    @endif

                </div> 
            </div>

        </div>

        <br><br><br><br><br><br>

        <div class="carousel-container">
            <div class="container-fluid bg-success">
                <div class="container">
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-5 border-top">
                    <p class="col-md-4 mb-0 text-white">
                        &copy; 2024 Universitas MDP<br>
                        Jl. Rajawali 14, 30113<br>
                        Palembang - Sumatera Selatan<br>
                        (0711) 376 400 / kuliah@mdp.ac.id
                    </p>

                    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                        <img src="logo-umdp-1-300x248-2.png" alt="Logo" width="150" height="124">
                    </a>

                </footer>
                </div>
            </div>
        </div>

    </body>
</html>
