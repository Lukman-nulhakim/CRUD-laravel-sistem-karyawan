<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Home</title>

    <style>
        .jumbotron {
            background-image: url(img/pesawat1.jpg);
            background-size: cover;
            height: 800px;
        }
        h1{
            letter-spacing: 5px;
        }
        p{
            letter-spacing: 2px;
        }
        a {
            width: 200px;
            height: 50px;
        }
        a .btn{
            width: 200px;
            height: 40px;
        }
        h2{
            font-weight: 30px;
            margin-left: 120px;
            font-style: italic;
        }
    </style>
</head>
<body>
    
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-white">
            <h1 class="display-4 mb-4">WELCOME PT.GARUDA</h1>
            <p class="lead justify-content-start">This is a modified jumbotron that occupies the entire <br> horizontal space of its parent.
                Lorem ipsum dolor sit amet <br> consectetur adipisicing elit. Itaque vero accusantium perspiciatis <br> asperiores aperiam eos dolore nulla numquam consectetur commodi! <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, explicabo!
            </p>
            <h2 class="mt-5 mb-3">Okey GO IT !</h2>
            <a href="{{ route('its.index') }}" class="btn btn-warning mr-2 font-weight-bolder">DIVISI IT</a>
            <a href="{{ route('marketings.index') }}" class="btn btn-warning font-weight-bolder">DIVISI MARKETING</a>
        </div>                          
    </div>

</body>
</html>