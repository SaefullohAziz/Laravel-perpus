<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/landing.css">
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto lead font-weight-bold">
                  @if (Route::has('login'))
                    @auth
                      <a class="nav-item nav-link" href="{{ url('/home') }}">HOME</a>
                    @endauth
                  @endif
                </div>
              </div>
            </div>
          </div>
        </nav>

        <section id="jumbotron" class="jumbotron">  
            <div class="row pt-5">
              <div class="col mt-5 pt-5 text-center">
                <h1 class="display-3 text-center mt-5">
                  Dapatkan pinjaman<br>
                  buku <span class="font-weight-bold">gratis</span><br>
                  hanya di <br> perpustakaan. <br>
                  <a href="{{ route('login') }}" class="btn btn-primary col-3 py-2 rounded-pill font-weight-bold">MASUK</a>
                  <a href="{{ route('register') }}" class="btn btn-primary col-3  py-2 rounded-pill font-weight-bold">DAFTAR</a>
                </h1>
              </div>
              <div class="col pt-5">
                <div class="row mt-2">
                  <div class="col-sm-6 mt-3">
                    <img src="/img/book_lover.png" class="img-thumbnail shadow">
                  </div>
                  <div class="col-sm-6 mt-5">
                    <img src="/img/walk-readin.png" class="img-thumbnail shadow">
                  </div>
                </div>
                <div class="row my-2 pl-4">
                  <div class="col-sm-6 mt-2">
                    <img src="/img/big_books.png" class="img-thumbnail shadow">
                  </div>
                  <div class="col-sm-6 mt-4">
                    <img src="/img/studying.png" class="img-thumbnail shadow">
                  </div>
                </div>
              </div>
          </div>          

        </section>







        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
