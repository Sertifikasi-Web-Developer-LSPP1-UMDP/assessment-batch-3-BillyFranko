<html>
    <head>
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            /* Ensures carousel container is centered */
            .carousel-inner {
                display: flex;
            }

            /* Ensure that each carousel item transitions smoothly */
            .carousel-item {
                transition: transform 0.5s ease;
            }

            /* Active carousel item (fixed size) */
            .carousel-item.active img {
                width: 70%;
                height: auto;
                filter: none;
            }

            /* Inactive carousel items (blurred) */
            .carousel-item:not(.active) img {
                width: 50%;
                height: auto;
                filter: blur(5px);
            }

            /* Smooth transition for images */
            .carousel-item img {
                transition: all 0.5s ease;
            }

            /* Center the carousel images */
            .carousel-item img {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <div class="container-fluid bg-success">
            <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-1 border-bottom">
                <div class="col-md-3 mb-2 mb-md-0 ">
                    <a href="{{route('userui.dashboard')}}" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <img src="logo-umdp-1-300x248-2.png" alt="Logo" width="150" height="124">
                    </a>
                </div>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle me-5" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('images.jpg')}}" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        {{-- <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li> --}}
                        <li><a class="dropdown-item" href="{{route('logout')}}">Sign out</a></li>
                    </ul>
                </div>
            </header>
            </div>
        </div>

        @yield('Content')

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    "initComplete": function(settings, json) {
                        $('#example').css({
                            'border': '2px solid #000',
                            'border-collapse': 'collapse'
                        });

                        $('#example th, #example td').css({
                            'border': '1px solid #ddd',
                            'padding': '8px'
                        });
                    }
                });
            });
            $(document).ready(function() {
                $('#example2').DataTable({
                    "initComplete": function(settings, json) {
                        // Add a border to the table after it's created
                        $('#example2').css({
                            'border': '2px solid #000',
                            'border-collapse': 'collapse'
                        });

                        // Add borders to table cells
                        $('#example2 th, #example2 td').css({
                            'border': '1px solid #ddd',
                            'padding': '8px'
                        });
                    }
                });
            });
        </script>
    </body>
</html>
