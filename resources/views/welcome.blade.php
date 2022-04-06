            {{-- <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --> --}}


            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta http-equiv="X-UA-Compatible" content="ie=edge" />

                <title>
                    LaundryKu
                </title>

                <meta name="description" content="" />
                <meta name="keywords" content="" />
                <meta name="author" content="" />

                <!-- CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
                    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
                    crossorigin="anonymous">

                <link rel="stylesheet" href="css/style.css">

                <!-- font -->
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link
                    href="https://fonts.googleapis.com/css2?family=Arvo&family=Josefin+Sans:wght@600&family=Karla:wght@500&family=Lobster&family=Overpass:wght@300&display=swap"
                    rel="stylesheet">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">

                <link href="{{ asset('img/logo.png') }}" rel="icon" type="image/png">

                <script src="https://kit.fontawesome.com/3107302f4a.js" crossorigin="anonymous"></script>
            </head>

            <body>

                <!-- NAVBAR -->
                <nav class="navbar navbar-expand-lg navbar-light fixed-top bgcolor">
                    <div class="container">
                        <a class="navbar-brand" href="#">LaundryKu</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav ml">
                                <a class="nav-link active" aria-current="page" href="#welcome">Home</a>
                                <a class="nav-link" href="#about">About</a>
                                <a class="nav-link btn btn-primary tombol shadow" href="login">Login</a>
                            </div>
                        </div>
                    </div>
                </nav>


                <!-- HEADER -->
                <section id="welcome">
                    <div class="hero tron">
                        <div class="container">
                            <h1 class="display-4">LaundryKu </h1>
                            <p class="p">
                                Let's get wet, tumble around, and dry off, together.
                            </p>
                        </div>
                    </div>
                </section>

                <section id="about">
                    <div class="hero1 tronabt">
                        <div class="container">
                            <div>
                                <h1>about creator</h1>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <img src="../img/kresna.jpg" alt="" width="70%" height="70%"
                                        class="img-fluid rounded-circle img1">
                                </div>
                                <div class="col">
                                    <div class="abt">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nulla, natus,
                                            quos iusto dolor vel aspernatur porro quis dolorem ex odit odio
                                            necessitatibus numquam corrupti nam labore beatae suscipit facere obcaecati
                                            commodi? Consequatur voluptate possimus modi in rerum aspernatur, labore
                                            sint laborum ratione quae. Voluptates, placeat. Impedit dignissimos enim
                                            dolores!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- FOOTER -->
                <footer>
                    <div class="footer-content container">
                        <h3>Laundry</h3>
                        <p>Bersihkan Pakaianmu!</p>
                        <ul class="socials">
                            <li><a href="https://www.facebook.com/rexsa.zxa/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send/?phone=6282257534227&text&app_absent=0"><i
                                        class="fa fa-whatsapp"></i></a></li>
                            <li><a href="https://www.instagram.com/kresn.mw/"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="footer-bottom container">
                        <p>copyright &copy;2022 Laundry. designed by <span>Kresna Mukti</span></p>
                    </div>
                </footer>

                <!-- jQuery if you need it -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                <script src="js/bootstrap.bundle.min.js"></script>

                <script>
                    var nav = document.querySelector('nav');

                    window.addEventListener('scroll', function() {
                        if (window.pageYOffset > 100) {
                            nav.classList.add('bg-dark', 'shadow');
                        } else {
                            nav.classList.remove('bg-dark', 'shadow')
                        }
                    })
                </script>
            </body>

            </html>
