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
                <!--Replace with your tailwind.css once created-->
                <link rel="stylesheet" href="css/style.css">

                <!-- font -->
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link
                    href="https://fonts.googleapis.com/css2?family=Arvo&family=Josefin+Sans:wght@600&family=Karla:wght@500&family=Lobster&family=Overpass:wght@300&display=swap"
                    rel="stylesheet">

                <link href="{{ asset('img/logo.png') }}" rel="icon" type="image/png">

                <script src="https://kit.fontawesome.com/3107302f4a.js" crossorigin="anonymous"></script>
            </head>

            <body>

                <!-- NAVBAR -->
                <nav class="navbar navbar-expand-lg navbar-light fixed-top bgcolor">
                    <div class="container">
                        <a class="navbar-brand" href="#">Laundry</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav ml">
                                <a class="nav-link active" aria-current="page" href="#welcome">Home</a>
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
                                Let’s get wet, tumble around, and dry off, together.
                            </p>
                        </div>
                    </div>
                </section>


                <!-- FOOTER -->
                <footer>
                    <div class="footer-content container">
                        <h3>Laundry</h3>
                        <p>Bersihkan Pakaianmu!</p>
                        <ul class="socials">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
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
                            nav.classList.add('bg-black', 'shadow');
                        } else {
                            nav.classList.remove('bg-black', 'shadow')
                        }
                    })
                </script>
            </body>

            </html>
