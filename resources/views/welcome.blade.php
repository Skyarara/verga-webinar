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
            min-width: 200px;
            max-width: 200px;
            min-height: 300px;
            max-height: 300px;
        }

        .header {
            background-image: url('images/vergacover2.jpeg');
        }

    </style>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="{{ route('landing') }}">Verga</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="{{ route("landing") }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="py-5 header">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <!-- <h1 class="display-5 fw-bolder text-white mb-2">Unlock yourself with Verga</h1>
                        <p class="lead fw-bolder text-white">
                            Verga is a website that provides information regarding webinars to help you improve their
                            skills and abilities.
                        </p> -->
                        <br>
                        <br>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class=" text-center my-5">
                        <h1 class="display-5 fw-bolder text-secondary mb-2">Unlock yourself with Verga</h1>
                        <p class="lead fw-bolder text-secondary">
                            Verga is a website that provides information regarding webinars to help you improve their
                            skills and abilities.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features section-->
    <section class="py-5 border-bottom" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Email</h2>
                    <p>In this feature, users will get an event entry ticket via email from the webinar
                        organizer
                    </p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                            class="bi bi-person-workspace"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Webinars Info</h2>
                    <p>Users can view information about the webinar on the website.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                            class="bi bi-person-plus-fill"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Register Webinars</h2>
                    <p>
                        In this feature, users can register for webinars available on the
                        website.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing section-->
    <section class="bg-light py-5 border-bottom" id="webinars">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder mb-5">Learn what you want</h2>
                <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route("landing")."#webinars" }}" method="get">
                            <select name="category" class="form-control" onchange="this.form.submit()">
                                <option value="">Search by Category</option>
                                @foreach ($category as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == request()->get('category') ? 'selected' : '' }}>{{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="col">
                        <form action="{{ route("landing")."#webinars" }}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search by Title" name="search"
                                    value="{{ request()->get('search') ? request()->get('search') : "" }}">
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" row gx-5 justify-content-center">
                @forelse ($webinar as $dt)
                <div class="col-lg-6 col-xl-4 mb-3">
                    <div class="card mb-5 mb-xl-0">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">
                                {{ $dt->category->name }}</div>
                            <div class="mb-3">
                                @if(file_exists(public_path("storage/".$dt->image)))
                                <img src="{{ asset("storage/".$dt->image) }}" width="200px" height="300px">
                                @else
                                <img src="{{ $dt->image }}" alt="">
                                @endif
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    <strong>{{ $dt->title }}</strong>
                                </li>
                                <li class="text-muted">
                                    <i class="bi bi-calendar-event-fill"></i>
                                    {{ $dt->date }}
                                </li>
                            </ul>
                            <div class="d-grid">
                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-outline-primary"
                                            href="{{ route("webinar_show", ['id' => $dt->id]) }}">Detail
                                        </a>
                                    </div>
                                    @can('user')
                                    <div class="col">
                                        <form action="{{ route("user_webinar_store") }}" method="post">
                                            @csrf
                                            <input type="hidden" name="webinar_id" value="{{ $dt->id }}">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <button class="btn btn-outline-success" type="submit">
                                                register
                                            </button>
                                        </form>
                                    </div>
                                    @endcan
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center">Data Empty</p>
                @endforelse
                <div class="justify-content-center">
                    {{ $webinar->links() }}
                </div>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="bg-white py-5">
            <div class="container py-5">
                <h2 class="display-4 font-weight-light">About Us</h2>
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                        <h2 class="font-weight-light">Verga</h2>
                        <p class="font-italic text-muted mb-4">
                            Verga adalah website yang menyediakan informasi mengenai webinar untuk membantu pengguna
                            dalam meningkatkan skill dan keterampilan. Website Verga sendiri merupakan ide yang muncul
                            dikarenakan faktor kurangnya wadah untuk menampung webinar webinar yang ada. Sehingga
                            membuat orang yang ingin mengakses webinar mengalami kesusahan.
                        </p>
                    </div>
                    <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2">
                        <img src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt=""
                            class="img-fluid mb-4 mb-lg-0" />
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5 px-5 mx-auto">
                        <img src="https://bootstrapious.com/i/snippets/sn-about/img-2.jpg" alt=""
                            class="img-fluid mb-4 mb-lg-0" />
                    </div>
                    <div class="col-lg-6">
                        <i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                        <h2 class="font-weight-light">Benefit</h2>
                        <p class="font-italic text-muted mb-4">
                            Mengikuti acara webinar menjadi alternatif kegiatan belajar yang fleksibel. Tanpa harus
                            keluar rumah dan mengeluarkan banyak waktu dan biaya, kamu sudah bisa mendapat materi lewat
                            siaran online. Pastinya bikin kamu punya banyak waktu lebih untuk mengerjakan aktivitas
                            produktif lain. Beberapa webinar juga menyediakan e-sertifikat untuk para peserta.
                            Sertifikat pelatihan dan seminar dibutuhkan untuk masuk ke dunia kerja. E-sertifikat akan
                            menjadi bukti, juga nilai tambah saat melamar kerja, kamu akan dinilai memiliki pengalaman
                            dan pengetahuan tentang bidang tersebut.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-light py-5">
            <div class="container py-5">
                <div class="row mb-4">
                    <div class="col-lg-5">
                        <h2 class="display-4 font-weight-light">Our team</h2>
                    </div>
                </div>

                <div class="row text-center">
                    <!-- Team item-->
                    <div class="col-xl-3 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4">
                            <img src="{{ asset('images/richard.jpeg') }}" alt="" width="100"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">RICHARD TANDY JAPUTRA</h5>
                            <span class="small text-uppercase text-muted">CEO - Founder</span>
                        </div>
                    </div>
                    <!-- End-->

                    <!-- Team item-->
                    <div class="col-xl-3 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4">
                            <img src="{{ asset('images/hafiz.jpeg') }}" alt="" width="100"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">HAFIZ ADYATMA</h5>
                            <span class="small text-uppercase text-muted">CEO - Founder</span>
                        </div>
                    </div>
                    <!-- End-->

                    <!-- Team item-->
                    <div class="col-xl-3 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4">
                            <img src="{{ asset('images/ivan.jpeg') }}" alt="" width="100"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">IVAN FEBRIANTO</h5>
                            <span class="small text-uppercase text-muted">CEO - Founder</span>
                        </div>
                    </div>
                    <!-- End-->

                    <!-- Team item-->
                    <div class="col-xl-3 col-sm-6">
                        <div class="bg-white rounded shadow-sm py-5 px-4">
                            <img src="{{ asset('images/amel.jpeg') }}" alt="" width="100"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">AMELIA CAROLINA</h5>
                            <span class="small text-uppercase text-muted">CEO - Founder</span>
                        </div>
                    </div>
                    <!-- End-->
                    <!-- Team item-->
                    <div class="col-xl-3 col-sm-6">
                        <div class="bg-white rounded shadow-sm py-5 px-4">
                            <img src="{{ asset('images/david.jpeg') }}" alt="" width="100"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">David Sie Wettleson</h5>
                            <span class="small text-uppercase text-muted">CEO - Founder</span>
                        </div>
                    </div>
                    <!-- End-->
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section-->
    <section class="bg-white py-5" id="contact">
        <div class="container px-5 mb-5 px-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i>
                </div>
                <h2 class="fw-bolder">Get in touch</h2>
                <p class="lead mb-0">We'd love to hear from you</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <form action="{{ route('contact_store') }}" method="POST">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="name" type="text" placeholder="Enter your name..."
                                required>
                            <label for="name">Full name</label>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email"
                                placeholder="name@example.com" required>
                            <label for="email">Email address</label>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="(123) 456-7890"
                                required />
                            <label for="phone">Phone number</label>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" name="message" type="text"
                                placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                            <label for="message">Message</label>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                        </div>
                    </form>
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

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/63bae3f5c2f1ac1e202c579b/1gm90kukc';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();

    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
