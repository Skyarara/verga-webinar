<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Verga</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ url('icon/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ url('css/styles.css') }}" rel="stylesheet" />

    <style>
        img {
            min-width: 300px;
            min-height: 400px;

            max-width: 300px;
            max-height: 400px;
        }

    </style>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">Verga</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="{{ route("landing") }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">features</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        @if(file_exists(public_path("storage/".$data->image)))
                        <img src="{{ asset("storage/".$data->image) }}" width="300px" height="400px">
                        @else
                        <img src="{{ $data->image }}" alt="">
                        @endif
                        <p class="lead text-white-50 mb-4">
                            {{ $data->title }}<br>
                            {{ $data->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Webinars section-->
    <section class="py-5 border-bottom" id="webinars">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center text-center">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                            class="bi bi-calendar2-fill"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Date & Time</h2>
                    <p>
                        {{ $data->date }}
                    </p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-robot"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Category</h2>
                    <p>{{ $data->category->name }}
                    </p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Contact Person</h2>
                    <p>{{ $data->cp }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-5">
            <p class="m-0 text-center text-white">Copyright &copy; Verga 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ url('js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
