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
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Unlock yourself with Verga</h1>
                        <p class="lead text-white-50 mb-4">
                            Verga is a website that provides information regarding webinars to help you improve their
                            skills and abilities.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
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
                                    <i class="bi bi-dot"></i>
                                    <strong>{{ $dt->title }}</strong>
                                </li>
                                <li class="text-muted">
                                    <i class="bi bi-calendar-event-fill"></i>
                                    {{ $dt->date }}
                                </li>
                            </ul>
                            <div class="d-grid"><a class="btn btn-outline-primary"
                                    href="{{ route("webinar_show", ['id' => $dt->id]) }}">Detail</a>
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
        <div class="bg-light">
            <div class="container py-5">
                <div class="row h-100 align-items-center py-5">
                    <div class="col-lg-6">
                        <h1 class="display-4">About us page</h1>
                        <p class="lead text-muted mb-0">
                            Create a minimal about us page using Bootstrap 4.
                        </p>
                        <p class="lead text-muted">
                            Snippet by
                            <a href="https://bootstrapious.com/snippets" class="text-muted">
                                <u>Bootstrapious</u></a>
                        </p>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="https://bootstrapious.com/i/snippets/sn-about/illus.png" alt="" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white py-5">
            <div class="container py-5">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                        <h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2>
                        <p class="font-italic text-muted mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
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
                        <h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2>
                        <p class="font-italic text-muted mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-light py-5">
            <div class="container py-5">
                <div class="row mb-4">
                    <div class="col-lg-5">
                        <h2 class="display-4 font-weight-light">Our team</h2>
                        <p class="font-italic text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                </div>

                <div class="row text-center">
                    <!-- Team item-->
                    <div class="col-xl-3 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4">
                            <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-4.png" alt="" width="100"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">Manuella Nevoresky</h5>
                            <span class="small text-uppercase text-muted">CEO - Founder</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->

                    <!-- Team item-->
                    <div class="col-xl-3 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4">
                            <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-3.png" alt="" width="100"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">Samuel Hardy</h5>
                            <span class="small text-uppercase text-muted">CEO - Founder</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->

                    <!-- Team item-->
                    <div class="col-xl-3 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4">
                            <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-2.png" alt="" width="100"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">Tom Sunderland</h5>
                            <span class="small text-uppercase text-muted">CEO - Founder</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End-->

                    <!-- Team item-->
                    <div class="col-xl-3 col-sm-6">
                        <div class="bg-white rounded shadow-sm py-5 px-4">
                            <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" alt="" width="100"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" />
                            <h5 class="mb-0">John Tarly</h5>
                            <span class="small text-uppercase text-muted">CEO - Founder</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-link"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
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
</body>

</html>
