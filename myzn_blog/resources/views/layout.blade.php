<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Myzn Blog</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Reset CSS -->
    <link rel="stylesheet" href="/css/base/reset.css">
    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="/css/style.css"> -->
</head>
<body>

    <header>
        <div class="d-flex justify-content-around bg-light align-items-center">
            <div class="p-2">
                <div class="d-flex justify-content-around ">
                    <div class="p-3"><a href="/daily">Daily</a></div>
                    <div class="p-3"><a href="/weekly">Weekly</a></div>
                    <div class="p-3"><a href="/monthly">Monthly</a></div>
                </div>
            </div>
            <div class="p-2"><a href="/"><h1>Myzn Blog</h1></a></div>
            <div class="p-2">
                <div class="d-flex justify-content-around ">
                    <div class="p-3"><a href="/daily"><i class="fab fa-github-alt"></i></a></div>
                    <div class="p-3"><a href="/weekly"><i class="fab fa-facebook-f"></i></a></div>
                    <div class="p-3"><a href="/monthly"><i class="fab fa-instagram"></i></a></div>
                </div>
            </div>
        </div>



            <!--  -->
            <!--  -->
            <!-- <div class="collapse navbar&#45;collapse" id="navbarTogglerDemo03"> -->
            <!--     <ul class="navbar&#45;nav mr&#45;auto mt&#45;2 mt&#45;lg&#45;0"> -->
            <!--         <li class="nav&#45;item active"> -->
            <!--             <a class="nav&#45;link" href="/daily">Daily <span class="sr&#45;only">(current)</span></a> -->
            <!--         </li> -->
            <!--         <li class="nav&#45;item"> -->
            <!--             <a class="nav&#45;link" href="/weekly">Weekly</a> -->
            <!--         </li> -->
            <!--         <li class="nav&#45;item"> -->
            <!--             <a class="nav&#45;link" href="/monthly">Monthly</a> -->
            <!--         </li> -->
            <!--     </ul> -->
            <!-- </div> -->
            <!-- <a class="navbar&#45;brand mx&#45;auto" href="/">Myzn Blog</a> -->

        </nav>
    </header>


    @yield('content')

    <footer>
        <div class="d-flex justify-content-center">Powered by Eiji_Myzn Portfolio</div>
    </footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
