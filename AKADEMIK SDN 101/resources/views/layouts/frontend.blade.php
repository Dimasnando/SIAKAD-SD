<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SDN 101 &mdash; Lambur 1</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Bocor - v4.7.0
  * Template URL: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="/">SDN 101<span></span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row d-flex align-items-center">
                <div class=" col-lg-6 py-5 py-lg-0 order-2 order-lg-1" data-aos="fade-right">
                    <h1>SDN 101 Lambur 1</h1>
                    <a href="{{ url('login', []) }}" class="btn-get-started scrollto">Login</a>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="{{ asset('frontend') }}/assets/img/front1.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-in">Informasi Akademik</h2>
                </div>

                <div class="row">
                    @foreach ($info as $item)
                        <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-right">
                            <div class="card">
                                <div class="card-img">
                                    <img class="img-fluid" style="width: 400px; height: 200px;"
                                        src="{{ url('/informasi_foto/' . $item->foto) }}"  alt="images" />
                                        
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $item->isi }} </p>
                                    {{-- <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak</h2>
                    {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box" data-aos="fade-up">
                                    <i class="bx bx-map"></i>
                                    <h3>Alamat</h3>
                                    <p>Kecamatan Kec. Muara Sabak Timur, Kabupaten Kab. Tanjung Jabung Timur,
                                        Provinsi Prov. Jambi
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
                                    <i class="bx bx-envelope"></i>
                                    <h3>Email</h3>
                                    <p>sdn101.lambur1@tanjabtim.go.id
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
                                    <i class="bx bx-phone-call"></i>
                                    <h3>No. Hp</h3>
                                    <p>0741-11685
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">


        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; 2023 SDN 101 LAMBUR 1
            </div>

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('frontend') }}/assets/js/main.js"></script>

</body>

</html>
