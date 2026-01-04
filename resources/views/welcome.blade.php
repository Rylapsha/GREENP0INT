<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>GREEN P0INT</title>

    <!-- Font Awesome icons (free version)-->
    <script src="{{ asset('sbtheme2/https://use.fontawesome.com/releases/v6.3.0/js/all.js') }}" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="{{ asset('sbtheme2/https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900') }}" rel="stylesheet" />
    <link href="{{ asset('sbtheme2/https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i') }}" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('sbtheme2/css/styles.css') }}" rel="stylesheet" />
    <link href="{{asset('sbadmin2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container px-5">
            <a class="navbar-brand d-flex align-items-center justify-content-center" href="#page-top">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="sidebar-brand-text mx-3">GREEN P0INT</div>
            </a>
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#scroll">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">Go <span class="text-success">Green</span>, Earn <span class="text-warning">Points</span></h1>
                <h2 class="masthead-subheading mb-0">Your Green Action Pays Off</h2>
                <a class="btn btn-success btn-xl rounded-pill mt-5" href="#scroll">Learn More</a>
            </div>
        </div>
    </header>

    <!-- Content section 1-->
    <div class="text-white" style=" background-color: #198754;">
        <section id="scroll">
            <div class="container px-5">
                <h2 class="pt-5 display-5 text-center fw-bold mb-4">WHAT IS GREEN P0INT?</h2>
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid" src="sbtheme2/assets/img/3.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-5">Green Contribution Platform 🌿</h2>
                            <p>Platform digital yang memudahkan masyarakat berkontribusi dalam pengelolaan barang bekas dan daur ulang secara terstruktur dan berkelanjutan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 2-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid" src="sbtheme2/assets/img/2.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Eco Actions with Real Rewards! ⭐</h2>
                            <p>Setiap aksi ramah lingkungan dihargai dengan sistem poin sebagai bentuk apresiasi atas kepedulian pengguna terhadap lingkungan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 3-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid" src="sbtheme2/assets/img/1.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Act Green, Make a Difference ♻️</h2>
                            <p>Ajak diri Anda untuk beraksi menjaga bumi dengan cara yang mudah, bermanfaat, dan berkelanjutan bersama GreenPoint.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact-->
        <section class="py-5 contact-section" id="contact">
            <div class="container px-4 px-lg-5">
                <h2 class="pb-5 display-5 text-center fw-bold m-4">CONTACT US</h2>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center text-black">
                                <i class="fas fa-map-marked-alt text-success mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">Purwakarta, West Java, Indonesia</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center text-black">
                                <i class="fas fa-envelope text-success mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">greenpointshere@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center text-black">
                                <i class="fas fa-mobile-alt text-success mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+(021) 3456-7890</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-3 social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer-->
    <footer class="py-5" style="background-color: #90AB8B;">
        <div class=" container px-5">
            <p class="m-0 text-center text-white small">Copyright &copy; GREEN P0INT 2025</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>