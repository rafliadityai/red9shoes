<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Red9 Shoes Laundry</title>
        <link rel="icon" href="/assets/img/icon.png" type="image/png">
        <!-- Favicon-->
        {{-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Red9 Shoes</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#location">Location</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Admin Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Fresh Look, Fresh Feet</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Spesialis Laundry Sepatu!</p>
                        <a class="btn btn-primary btn-xl" href="#about">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Keunggulan Kami</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4"> <b>Bahan Pembersih Aman:</b> Produk pembersih khusus yang tidak merusak bahan sepatu.</p>
                        <p class="text-white-75 mb-4"> <b>Teknisi Berpengalaman:</b> Ahli perawatan sepatu dengan pengalaman bertahun-tahun.</p>
                        <p class="text-white-75 mb-4"><b>Hasil Maksimal:</b> Garansi sepatu bersih, wangi, dan tampak seperti baru</p>
                        <a class="btn btn-light btn-xl" href="#services">Layanan Kami!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">SERVICES</h2>
                <hr class="divider" />
            
                <!-- Baris pertama dengan 3 kolom -->
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2">
                                <img src="{{ asset('assets/img/shoes.svg') }}" alt="Basic Level Shoes" class="img-fluid level-basic" style="width: 55px; height: 55px;">
                            </div>
                            <h3 class="h4 mb-2">Easy</h3>
                            <p class="text-muted mb-0">Sepatu anak-anak, ukuran maksimal EU 32</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2">
                                <img src="{{ asset('assets/img/shoes.svg') }}" alt="Medium Level Shoes" class="img-fluid level-medium" style="width: 55px; height: 55px;">
                            </div>
                            <h3 class="h4 mb-2">Medium</h3>
                            <p class="text-muted mb-0">Berdasarkan bahan sepatu dan tingkat kekotoran</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2">
                                <img src="{{ asset('assets/img/shoes.svg') }}" alt="Hard Level Shoes" class="img-fluid level-hard" style="width: 55px; height: 55px;">
                            </div>
                            <h3 class="h4 mb-2">Hard</h3>
                            <p class="text-muted mb-0">Mengatasi kotoran berat seperti lumpur basah atau kehujanan</p>
                        </div>
                    </div>
                </div>
            
                <!-- Baris kedua dengan 2 kolom -->
                <div class="row gx-4 gx-lg-5 mt-5">
                    <div class="col-lg-6 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-tools fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Repair</h3>
                            <p class="text-muted mb-0">Menangani Unyellowing, Jahit Sol, hingga Repaint</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-truck fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Delivery</h3>
                            <p class="text-muted mb-0">Kami melayani jasa Delivery Maksimal 3KM</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Lebih dekat dengan kami melalui konta di bawah ini</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center mb-5 mb-lg-0">
                        <div class="d-flex justify-content-center">
                            <div class="text-center me-4">
                                <a href="https://wa.me/+6287779275999" target="_blank" class="text-decoration-none">
                                    <i class="bi-whatsapp fs-2 text-muted"></i>
                                    <div>+62-877-7927-5999</div>
                                </a>
                            </div>
                            <div class="text-center me-4">
                                <a href="https://instagram.com/red9shoeslaundry" target="_blank" class="text-decoration-none">
                                    <i class="bi-instagram fs-2 text-muted"></i>
                                    <div>@red9shoeslaundry</div>
                                </a>
                            </div>
                            {{-- <div class="text-center">
                                <a href="https://www.tiktok.com/@red9shoeslaundry" target="_blank" class="text-decoration-none">
                                    <i class="bi-tiktok fs-2 text-muted"></i>
                                    <div>@red9shoeslaundry</div>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

         <!-- Lokasi-->
         
         <section class="page-section" id="location">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Location</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Ayo Kunjungi kami di Jl Jalaprang No. 93</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 d-flex justify-content-center">
                        <div class="map-container" style="width: 100%; max-width: 600px;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d247.55931693944603!2d107.6309120289359!3d-6.896695213250888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1726045305249!5m2!1sen!2sid" 
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
      
        
        
        
        
        <!-- Portfolio-->
        <!-- <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Call to action-->
        <!-- <section class="page-section bg-dark text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
                <a class="btn btn-light btn-xl" href="https://startbootstrap.com/theme/creative/">Download Now!</a>
            </div>
        </section> -->
        <!-- Contact-->
       
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2024 - Clap Creative</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
