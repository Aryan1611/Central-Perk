<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Central Perk</title>
    <link rel="icon" href="img/canteen.png" type="image/icon type">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet"> 

    <style>
       
        body {
            font-family: 'Comfortaa', cursive;
            height: 100vh;
            background-image: linear-gradient(to right,rgb(162,114,80,0.7),rgb(60,42,30,0.7)), url("img/cafe-bg.jpg");
            background-size: cover;
            background-position: bottom;            
        }
    
         a {
            margin: 20% 0 0 45%;

        }
        @media (max-width: 480px) {
            a {
                margin: 30% 0 0 37%;
            }
        }

        img {            
            margin-top:20%;
            width:100%;
            transform : rotate(-1.5deg);
        }

        footer {
            position : absolute;
            bottom : 0;
            left : 10px;
        }

    </style>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h4 class="text-center" style = "color:white">A place where F.R.I.E.N.D.S meet &#128521</h4>
                <img src='img/centralperk3.png' >
                <a href="{{ route('menu.index') }}" class="btn btn-danger btn-lg">OPEN</a>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    
</body>
</html>