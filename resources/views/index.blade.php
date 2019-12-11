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
            /* background-image: linear-gradient(to right,rgb(179, 162, 253,0.7),rgb(73, 43, 243,0.7)); */
            /* background-image: linear-gradient(to right,rgb(179, 162, 253,0.5),rgb(73, 43, 243,0.5)), url("img/coffee2.jpg"); */
            background-image: linear-gradient(to right,rgb(162,114,80,0.7),rgb(60,42,30,0.7)), url("img/coffee2.jpg");
            /* background-image: linear-gradient(to right,rgba(242, 255, 55, 0.8), rgba(255, 145, 0, 0.8)), url("food.jpg"); */
            background-size: cover;
            background-position: bottom;

            position : relative;
            
        }
    
        a {
            position : absolute;
            top : 77%;
            left : 50%;
            transform : translate(-50%, -50%);
            /* height : 80px;
            width : 160px;
        } */
    }
        /* h1 {
            position : absolute;
            top :30%;
            left : 0;
            width : 100%;
            text-align : center;

            font-size : 60px;
            transform : translateX(-50%);
        } */

        img {
            position : absolute;
            top : 20% ;
            left : 11%;
            /* margin:auto; */
            transform : rotate(-1.5deg);
        }

        footer {
            position : absolute;
            bottom : 0;
            left : 10px;
        }

        .responsive {
            max-width: 80%;
            height: auto;
        }

        .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

        .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
        }
    </style>

</head>
<body>

    <h4 class="text-center" style = "color:white">A place where F.R.I.E.N.D.S meet &#128521</h4>
    <!-- <p class="text-center">Eat ~~ Sleep ~~ Repeat</p> -->
    <img src='img/centralperk3.png' class='responsive'>
    <!-- <h1>Welcome to Central Perk</h1> -->
    <a href="{{ route('menu.index') }}" class="btn btn-danger btn-lg">OPEN</a>


    <footer>
        <p>&copy;All rights reserved. 2019</p>
    </footer>

    
</body>
</html>