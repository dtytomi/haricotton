<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Haricotton</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Fontawesome 5 -->
        <script defer src="{{ URL::to('vendor/fontawesome/svg-with-js/js/fontawesome-all.min.js') }}"></script>

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/arc.css')}}">
        
    </head>
    <body>
      <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Haricotton</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Route::has('login'))
              <ul class="navbar-nav ml-auto">
                @auth
                  <li class="nav-item">
                    <a class="nav-link active" href="#" >Home <span class="sr-only">(current)</span></a>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="btn btn-primary btn-sm" href="{{ route('login') }}" role="button" aria-pressed="true">Login</a>
                  </li>
                @endauth
              </ul>
            @endif
          </div>
          <!-- collapsible -->
        </div>
        <!-- container -->
      </nav>
      
      <header>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" data-src="holder.js/100px500?text=Add \n 1 line breaks \n anywhere." src="" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" data-src="holder.js/100px500?text=Add \n 2 line breaks \n anywhere." src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" data-src="holder.js/100px500?text=Add \n 3 line breaks \n anywhere." src="..." alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </header>

      <aside class="feature holderjs" id="sample1">
        <div class="Overlay">
          <div class="container">
            <!-- <img data-src="holder.js/100px100?text=Aside." src="..." alt="Tag Line"> -->
          </div>
        </div>
      </aside>

      <section>
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading">About Us</h2>
              <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
          </div>
          <!-- Row 1 -->

          <div class="row text-center">
            <div class="col col-md-4">
              <span class="fa-stack fa-4x">
                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
              </span>
              <h4 class="service-heading">E-Commerce</h4>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col col-md-4">
              <span class="fa-stack fa-4x">
                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
              </span>
              <h4 class="service-heading">Responsive Design</h4>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col col-md-4">
              <span class="fa-stack fa-4x">
                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
              </span>
              <h4 class="service-heading">Web Security</h4>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
          </div>
          <!-- Row 2 -->
        </div>
      </section>

      <aside class="feature holderjs" id="sample2">
        <div class="Overlay">
          <div class="container">
            <!-- <img data-src="holder.js/100px100?text=Aside." src="..." alt="Tag Line"> -->
          </div>
        </div>
      </aside>

      <footer>
        <div class="container">
          <div class="row">
            <div class="col">
              <ul class="list-unstyled">
                <li>Lorem ipsum dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
                <li>Integer molestie lorem at massa</li>
                <li>Facilisis in pretium nisl aliquet</li>
                <li>Faucibus porta lacus fringilla vel</li>
                <li>Aenean sit amet erat nunc</li>
                <li>Eget porttitor lorem</li>
              </ul>
            </div>
            <!-- List 1 -->
            <div class="col">
              <ul class="list-unstyled">
                <li>Lorem ipsum dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
                <li>Integer molestie lorem at massa</li>
                <li>Facilisis in pretium nisl aliquet</li>
                <li>Faucibus porta lacus fringilla vel</li>
                <li>Aenean sit amet erat nunc</li>
                <li>Eget porttitor lorem</li>
              </ul>
            </div>
            <!-- List 2 -->
            <div class="col">
              <ul class="list-unstyled">
                <li>Lorem ipsum dolor sit amet</li>
                <li>Consectetur adipiscing elit</li>
                <li>Integer molestie lorem at massa</li>
                <li>Facilisis in pretium nisl aliquet</li>
                <li>Faucibus porta lacus fringilla vel</li>
                <li>Aenean sit amet erat nunc</li>
                <li>Eget porttitor lorem</li>
              </ul>
            </div>
            <!-- List 3 -->
          </div>
        </div>
      </footer>

      <!-- jQuery -->
      <script src="{{ URL::to('vendor/jquery.min.js') }}"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

      <!-- Plugin JavaScript -->
      <script src="{{ URL::to('vendor/jquery.easing.min.js') }}"></script>
      <script src="{{ URL::to('vendor/wow.min.js') }}"></script>

      <!-- Picture Holder -->
      <script src="{{ URL::to('vendor/holder.js') }}"></script>

    </body>
</html>
