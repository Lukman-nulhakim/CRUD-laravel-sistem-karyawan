<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Home</title>

    <style>
        
        .navbar{
            background-color: #191919;
        }

        .navbar .container .nav-item{
            color: white;
            font-size: 20px;
            letter-spacing: 3px;
            font-family:  "Libre Franklin", Arial, sans-serif;
        }

        .navbar .container .nav-item:hover{
            color:  #e32879;
        }

        .container .navbar-brand{
            color:  #e32879;
            font-size: 20px;
            letter-spacing: 4px;
            font-family:  "Libre Franklin", Arial, sans-serif;
        }

        /* content */

        .hero-section{
            height: 800px;
            background-image: url(img/hero-bg.jpg);
            display: flex;
            align-items: center;
            -webkit-box-align: center;
        }

        .set-bg{ 
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top center;
        }

        .hs-text span {
            color: #e32879;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .hs-text h2 {
            color: #ffffff;
            font-size: 60px;
            font-weight: 700;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .hs-text p {
            color: #ffffff;
            margin-bottom: 45px;
        }

        p {
            font-size: 16px;
            font-family: "Libre Franklin", sans-serif;
            color: #b3b3b3;
            font-weight: 400;
            line-height: 26px;
            margin: 0 0 15px 0;
        }

        .primary-btn {
            font-size: 16px;
            color: #ffffff;
            background: #e32879;
            display: inline-block;
            font-weight: 700;
            padding: 12px 30px 10px;
        }

        .hs-text a:hover {
            text-decoration: none;
            color: rgb(0, 14, 94);
        }

    </style>
</head>
<body>
    
    {{-- Navbar --}}
    <nav class="navbar navbar-dark py-4">
        <img src="{{ asset('img/hazze.png') }}" class="img-fluid ml-5" alt="" >
        <div class="container d-flex justify-content-end">
            <a class="navbar-brand" href="{{ route('tokoBaju.index') }}">Home</a>
            <a class="nav-item nav-link" href="{{ route('tokoBaju.index') }}">About Us</a>
            <a class="nav-item nav-link" href="{{ route('tokoBaju.index') }}">Blog</a>
            <a class="nav-item nav-link" href="{{ route('tokoBaju.index') }}">Gallery</a>
            <a class="nav-item nav-link" href="{{ route('tokoBaju.index') }}">Contact</a>
        </div>
    </nav>

    {{-- Content --}}
    <section class="hero-section set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="hs-text">
                        <span>Office Fashion</span>
                        <h2>New Fashion</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla soluta ad vero, et molestias quaerat illum maiores quam id. Dolorum Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores, assumenda.</p>
                        <a href="{{ route('tokoBaju.index') }}" class="primary-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>