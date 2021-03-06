<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,500,700" rel="stylesheet"> 

        <!-- Fontawesome 5 -->
        <script defer src="{{ URL::to('vendor/fontawesome/svg-with-js/js/fontawesome-all.min.js') }}"></script>

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/arc.css')}}">
        
    </head>
    <body class="bg-secondary text-dark">
      <nav id="mainNav" data-spy="affix" class="navbar fixed-top navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
          <a class="navbar-brand" href="#">Haricotton Investment Club</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Route::has('login'))
              <ul class="navbar-nav ml-auto">
                @auth
                  <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/home') }}" >Home</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link" href="#about" role="button" aria-pressed="true">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" role="button" aria-pressed="true">Login</a>
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
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{URL::asset('img/hr.png')}}" data-src="holder.js/100px500?text=Add \n 1 line breaks \n anywhere." src="" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{URL::asset('img/crop.jpg')}}" data-src="holder.js/100px500?text=Add \n 2 line breaks \n anywhere." src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{URL::asset('img/nationalism.jpg')}}" data-src="holder.js/100px500?text=Add \n 3 line breaks \n anywhere." src="..." alt="Third slide">
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

      <aside>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="card text-center bg-light">
                <div class="card-body">
                  <span style="color:#fed136">
                    <i class="far fa-hourglass fa-2x"></i>
                  </span>
                  <h4 class="card-title">Ordinary</h4>
                  <p class="card-text">The Total Investment including membership fee is ₦5250 or $15</p>
                  <a href="/about">Learn More <i class="fas fa-angle-right fa-1x"></i></a>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
              <div class="card text-center bg-light">
                <div class="card-body">
                  <span style="color:#fed136">
                    <i class="far fa-lemon fa-2x"></i>
                  </span>
                  <h4 class="card-title">Bronze</h4>
                  <p class="card-text">The Total Investment including membership fee is ₦10,500 or $30.</p>
                  <a href="/about">Learn More <i class="fas fa-angle-right fa-1x"></i></a>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
              <div class="card text-center bg-light">
                <div class="card-body">
                  <span style="color:#fed136">
                    <i class="fab fa-connectdevelop  fa-2x"></i>
                  </span>
                  <h4 class="card-title">Silver</h4>
                  <p class="card-text">The Total Investment including membership fee is ₦21,000 or $60.</p>
                  <a href="/about">Learn More <i class="fas fa-angle-right fa-1x"></i></a>
                </div>
              </div> 
            </div>
            
            <div class="col-md-3 col-sm-6">
              <div class="card text-center bg-light">
                <div class="card-body">
                  <span style="color:#fed136">
                    <i class="far fa-snowflake fa-2x"></i>
                  </span>
                  <h4 class="card-title">Gold</h4>
                  <p class="card-text">The Total Investment including membership fee is ₦42000 or $120.</p>
                  <a href="/about">Learn More <i class="fas fa-angle-right fa-1x"></i></a>
                </div>
              </div>  
            </div>
            
            <div class="col-md-3 col-sm-6">
              <div class="card text-center bg-light">
                <div class="card-body">
                  <span style="color:#fed136">
                    <i class="far fa-sun fa-2x"></i>
                  </span>
                  <h4 class="card-title">Sapphire</h4>
                  <p class="card-text">The Total Investment including membership fee is ₦72,000 or $1920.</p>
                  <a href="/about">Learn More <i class="fas fa-angle-right fa-1x"></i></a>
                </div>
              </div>  
            </div>
            
            <div class="col-md-3 col-sm-6">
              <div class="card text-center bg-light">
                <div class="card-body">
                  <span style="color:#fed136">
                    <i class="far fa-gem fa-2x"></i>
                  </span>
                  <h4 class="card-title">Diamond</h4>
                  <p class="card-text">The Total Investment including membership fee is ₦84,000 or $240.</p>
                  <a href="/about">Learn More <i class="fas fa-angle-right fa-1x"></i></a>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
              <div class="card text-center bg-light">
                <div class="card-body">
                  <span style="color:#fed136">
                    <i class="fas fa-certificate  fa-2x"></i>
                  </span>
                  <h4 class="card-title">Platinum</h4>
                  <p class="card-text">The Total Investment including membership fee is ₦168,000 or $480.</p>
                  <a href="/about">Learn More <i class="fas fa-angle-right fa-1x"></i></a>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
              <div class="card text-center bg-light">
                <div class="card-body">
                  <span style="color:#fed136">
                    <i class="far fa-star  fa-2x"></i>
                  </span>
                  <h4 class="card-title">Onyx</h4>
                  <p class="card-text">The Total Investment including membership fee is ₦336,000 or $960.</p>
                  <a href="/about">Learn More <i class="fas fa-angle-right fa-1x"></i></a>
                </div>
              </div>
            </div>
          

          </div>
          <!-- Row ends -->
        </div>
        <!-- container fluid -->
      </aside>

      <section id="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading">About Us</h2>
              <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
            </div>
          </div>
          <!-- Row 1 -->

          <div class="row">
            <div class="text-center">
              <p class="large text-muted">Our goal as a company is to invest in Petroleum products and production of daily used items and also to provide guidance to those that will one day grow large.
                Haricotton Investment Club is a platform of placement of Capital in expectation of delivering income or profit.
                 Haricotton is a business developer that concerned with the analytical preparation of potential growth opportunities for Artisans and business individuals through financial aid as well as the subsequent support and monitoring.
                We are business developer with tools to address the business development tasks, capable of implementing the growth opportunity successfully.
              </p>
              <br />
              <br />
              <div class="col offset-md-5 col-md-3">
                <a href="/about" role="button" class="btn btn-block btn-lg btn-warning text-white">Learn More!</a>
              </div>
            </div>
          </div>
          <!-- Row 2 -->
        </div>
      </section>

       <!-- Call to Action -->
      <section class="call-to-action text-white text-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-xl-9 mx-auto">
              <h2 class="mb-4">Ready to get started? Sign up now!</h2>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
              <form>
                <div class="form-row">
                  <div class="col-12 col-md-9 mb-2 mb-md-0">
                    <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
                  </div>
                  <div class="col-12 col-md-3">
                    <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <footer class="footer">
        <div class="container">
          <div class="row">

            <div class="col-md-4 col-sm-6">
              
            </div>
            <!-- List 1 -->

            <div class="col-md-4 col-sm-6">
              <h4>Follow Us:</h4>
              <ul class="list-unstyled list-inline list-social-icons">
                <li class="list-inline-item">
                    <a href="#" style="color: #3b5999;"><i class="fab fa-facebook-square fa-2x"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="#" style="color: #55acee;"><i class="fab fa-twitter-square fa-2x"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="#" style="color: #dd4b39;"><i class="fab fa-google-plus-square fa-2x"></i></a>
                </li>
              </ul>
            </div>
            <!-- List 2 -->

            <div class="col-md-4 col-sm-6">
              <address>
                <strong>Haricotton.</strong><br>
                Suite 57B Praise Plaza,<br>
                Iwo Road, Ibadan<br>
                <abbr title="Phone">P:</abbr> 08144799879, 0906878383
              </address>
            </div>
            <!-- List 3 -->
          </div>
        </div>
      </footer>
      <nav class="navbar navbar-light bg-dark">
        <p class="text-white small mb-4 mb-lg-0">&copy; Haricotton Investment Club 2018. All Rights Reserved.</p>
      </nav>

      <!-- jQuery -->
      <script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

      <!-- Plugin JavaScript -->
      <script src="{{ URL::to('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
      <script src="{{ URL::to('vendor/wow.min.js') }}"></script>

      <!-- Picture Holder -->
      <script src="{{ URL::to('vendor/holder.js') }}"></script>

      <script src="{{ URL::to('js/arc.js') }}"></script>

    </body>
</html>
