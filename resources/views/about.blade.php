@extends('layouts.app')

<!-- Styles -->
<link rel="stylesheet" href="{{URL::asset('css/about.css')}}">   

@section('content')
<header class="intro">
</header>
<section >
  <div class="container">
    <p class="lead text-justify">
      Our goal as a company is to invest in Petroleum products and production of daily used items and also to provide guidance to those that will one day grow large.
      Haricotton Investment Club is a platform of placement of Capital in expectation of delivering income or profit.
       Haricotton is a business developer that concerned with the analytical preparation of potential growth opportunities for Artisans and business individuals through financial aid as well as the subsequent support and monitoring.
      We are business developer with tools to address the business development tasks, capable of implementing the growth opportunity successfully.
    </p>

    <h3>OUR PACKAGES</h3>
    <p>Our Investors are opportune to invest in any of our ten different plans of investment</p>

    <div class="row text-center">
      <div class="col-sm-3">
        <div class="card border-warning">
          <span style="margin: 2rem;" class="text-warning">
            <i class="far fa-hourglass fa-4x"></i>
          </span>
          <div class="card-body">
            <h1 class="card-title ">Ordinary</h1>
            <h2> ₦5,250<small style="font-size: 0.9rem;">/$15</small></h2>
            <hr />
            <p class="card-text">
              ₦300 Weekly <br />
              ₦1300 Monthly <br />
              Referral bonus of $0.5 
            </p>
            <a href="/home" class="btn btn-outline-warning">Start now</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card border-warning">
          <span style="margin: 2rem;" class="text-warning">
            <i class="far fa-lemon fa-4x"></i>
          </span>
          <div class="card-body">
            <h1 class="card-title ">Bronze</h1>
            <h2> ₦10,500<small style="font-size: 0.9rem;">/$30</small></h2>
            <hr />
            <p class="card-text"> 
              ₦612.50k Weekly <br />
              ₦2625 Monthly <br />
              Referral bonus of $1 
            </p>
            <a href="/home" class="btn btn-outline-warning">Start now</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card border-warning">
          <span style="margin: 2rem;" class="text-warning">
            <i class="fab fa-connectdevelop  fa-4x"></i>
          </span>
          <div class="card-body">
            <h1 class="card-title ">Silver</h1>
            <h2>₦21,000<small style="font-size: 0.9rem;">/$60</small></h2>
            <hr />
            <p class="card-text">
              ₦1,225 Weekly <br />
              ₦5250 Monthly <br />
              Referral bonus of $5
            </p>
            <a href="/home" class="btn btn-outline-warning">Start now</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card border-warning">
          <span style="margin: 2rem;" class="text-warning">
            <i class="far fa-snowflake fa-4x"></i>
          </span>
          <div class="card-body">
            <h1 class="card-title ">Gold</h1>
            <h2>₦42,000<small style="font-size: 0.9rem;">/$120</small></h2>
            <hr />
            <p class="card-text">
              ₦2450 Weekly <br /> 
              ₦10500 Monthly <br />
              Referral bonus of $10 
            </p>
            <a href="/home" class="btn btn-outline-warning">Start now</a>
          </div>
        </div>
      </div>
    </div>

    <br />

    <div class="row text-center">
      <div class="col-sm-3">
        <div class="card border-warning">
          <span style="margin: 2rem;" class="text-warning">
            <i class="far fa-gem fa-4x"></i>
          </span>
          <div class="card-body">
            <h1 class="card-title ">Diamond</h1>
            <h2>₦84,000<small style="font-size: 0.9rem;">/$240</small></h2>
            <hr />
            <p class="card-text">
              ₦4900 Weekly <br /> 
              ₦21000 Monthly <br />
              Referral bonus of $25
            </p>
            <a href="/home" class="btn btn-outline-warning">Start now</a>
          </div>
        </div>
      </div>
      
      <div class="col-sm-3">
        <div class="card border-warning">
          <span style="margin: 2rem;" class="text-warning">
            <i class="fas fa-certificate  fa-4x"></i>
          </span>
          <div class="card-body">
            <h1 class="card-title ">Platinum</h1>
            <h2>₦168,000<small style="font-size: 0.9rem;">/$480</small></h2>
            <hr />
            <p class="card-text">
              ₦9800 Weekly <br /> 
              ₦42000 Monthly <br />
              Referral bonus of $40
            </p>
            <a href="/home" class="btn btn-outline-warning">Start now</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card border-warning">
          <span style="margin: 2rem;" class="text-warning">
            <i class="far fa-star  fa-4x"></i>
          </span>
          <div class="card-body">
            <h1 class="card-title ">Onyx</h1>
            <h2>₦336,000<small style="font-size: 0.9rem;">/$960</small></h2>
            <hr />
            <p class="card-text">
              ₦19600 Weekly <br /> 
              ₦84000 Monthly <br />
              Referral bonus of $75
            </p>
            <a href="/home" class="btn btn-outline-warning">Start now</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card border-warning">
          <span style="margin: 2rem;" class="text-warning">
            <i class="far fa-sun fa-4x"></i>
          </span>
          <div class="card-body">
            <h1 class="card-title ">Sapphire</h1>
            <h2>₦672,000<small style="font-size: 0.9rem;">/$1,920</small></h2>
            <hr />
            <p class="card-text">
              ₦39,200 Weekly <br /> 
              ₦168000 Monthly <br />
              Referral bonus of $100
            </p>
            <a href="/home" class="btn btn-outline-warning">Start now</a>
          </div>
        </div>
      </div>

    </div>

    <br />

    <div class="row text-center">

      <div class="col-sm-3">
        <div class="card border-warning">
          <span style="margin: 2rem;" class="text-warning">
            <i class="far fa-moon fa-4x"></i>
          </span>
          <div class="card-body">
            <h1 class="card-title  ">Crystal</h1>
            <h2>₦1,344,000<small style="font-size: 0.9rem;">/$3,840</small></h2>
            <hr />
            <p class="card-text">
              ₦78,400 Weekly <br /> 
              ₦336,000 Monthly <br />
              Referral bonus of $150
            </p>
            <a href="/home" class="btn btn-outline-warning">Start now</a>
          </div>
        </div>
      </div>
      
      <div class="col-sm-3">
        <div class="card border-warning">
          <span style="margin: 2rem;" class="text-warning">
            <i class="far fa-paper-plane fa-4x"></i>
          </span>
          <div class="card-body">
            <h1 class="card-title ">Jasper</h1>
            <h2> ₦2,688,000<small style="font-size: 0.9rem;">/$15,360</small></h2>
            <hr />
            <p class="card-text">
              ₦156,800 Weekly <br /> 
              ₦672.000 Monthly <br />
              Referral bonus of $200
            </p>
            <a href="/home" class="btn btn-outline-warning">Start now</a>
          </div>
        </div>
      </div>

    </div>

  </div>

  <br />
  <br />

</section>
@endsection
