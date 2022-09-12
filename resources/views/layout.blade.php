<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #footer {
            position: absolute;
            bottom: 0px
        }

        .input-group {
            margin: 10px
        }

        #buton {
            margin: 10px
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | @yield('title')</title>
</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white">Ana Sayfa</a></li>
                    <li><a href="/trends" class="nav-link px-2 text-white">Trendler</a></li>
                    @guest
                        <li><a href="/explore" class="nav-link px-2 text-white">Keşfet</a></li>
                    @else
                    <li><a href="/addcontent" class="nav-link px-2 text-white">İçerik ekle</a></li>
                    <li><a href="/saved" class="nav-link px-2 text-white">Kaydettiklerim</a></li>
                    <li><a href="/profile" class="nav-link px-2 text-white">Profilim</a></li>
                    @endguest

                </ul>

                @auth
                    <p style="margin-right: 20px; margin-top: 10px">{{Auth::user()->username}}</p>
                @else
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Ara..."
                        aria-label="Search">
                </form>
                @endauth

                @guest
                    <div class="text-end">
                        <a href={{ route('loginform') }}><button type="button" class="btn btn-outline-light me-2">Giriş
                                yap</button></a>
                        <a href={{ route('registrationform') }}><button type="button" class="btn btn-warning">Kayıt
                                ol</button></a>
                    </div>
                @else
                    <a href={{ route('logout') }}><button type="button" class="btn btn-danger">Logout</button></a>
                @endguest
            </div>
        </div>
    </header>

    @yield('content')

    <div class="container" id="footer">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="text-muted">© Tüm hakları saklıdır.</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24"
                            height="24">
                            <use xlink:href="#twitter"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24"
                            height="24">
                            <use xlink:href="#instagram"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24"
                            height="24">
                            <use xlink:href="#facebook"></use>
                        </svg></a></li>
            </ul>
        </footer>
    </div>
</body>

</html>
