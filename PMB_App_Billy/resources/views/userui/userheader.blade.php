<html>
    <head>
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            width: 70%; /* Set the width of the active image */
            height: auto;
            filter: none; /* No blur effect on the active item */
        }

        /* Inactive carousel items (blurred) */
        .carousel-item:not(.active) img {
            width: 50%; /* Optional: Adjust inactive image size */
            height: auto;
            filter: blur(5px); /* Apply blur effect */
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <div class="container-fluid bg-primary">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <div class="col-md-3 mb-2 mb-md-0 ms-5">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <img src="logo-umdp-1-300x248-2.png" alt="Logo" width="100" height="100">
                    </a>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-light">Home</a></li>
                    <li><a href="#" class="nav-link px-2 link-light">Features</a></li>
                    <li><a href="#" class="nav-link px-2 link-light">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 link-light">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 link-light">About</a></li>
                </ul>
            </header>
        </div>
    </body>
</html>