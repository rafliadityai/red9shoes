<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red 9 Shoes Laundry</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #d32f2f; /* Merah Aksen */
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .hero {
            background-color: #f5f5f5;
            padding: 100px 0;
        }
        .hero h1 {
            color: #d32f2f;
            font-weight: bold;
        }
        .hero p {
            color: #666;
        }
        .btn-red {
            background-color: #d32f2f;
            color: #fff;
            border: none;
        }
        .btn-red:hover {
            background-color: #b71c1c;
            color: #fff;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Red 9 Shoes Laundry</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light" href="{{ route('login') }}">Admin Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero text-center">
        <div class="container">
            <h1>Welcome to Red 9 Shoes Laundry</h1>
            <p class="lead">Professional Shoe Cleaning Services</p>
            <a href="{{ route('orders.create') }}" class="btn btn-red btn-lg mt-4">Place an Order</a>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services" class="container text-center mt-5">
        <h2 class="mb-4">Our Services</h2>
        <p>We offer a wide range of shoe cleaning services to keep your footwear looking brand new.</p>
        <div class="row">
            <div class="col-md-4">
                <h4>Cuci Sepatu</h4>
                <p>Layanan cuci sepatu untuk berbagai jenis sepatu.</p>
            </div>
            <div class="col-md-4">
                <h4>Reparasi Sepatu</h4>
                <p>Perbaikan sepatu untuk menjaga kualitas dan kenyamanan.</p>
            </div>
            <div class="col-md-4">
                <h4>Poles Sepatu</h4>
                <p>Mengembalikan kilau dan kebersihan sepatu Anda.</p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="container text-center mt-5">
        <h2 class="mb-4">Contact Us</h2>
        <p>For inquiries or to place an order, feel free to reach out to us.</p>
        <p>Email: info@red9shoeslaundry.com | Phone: 123-456-7890</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
