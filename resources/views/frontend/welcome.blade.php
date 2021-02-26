<!doctype html>
<html lang="en">
<head>
  <title>COVID-19 -Listianti</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('assets/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{asset('assets/fonts/flaticon/font/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fonts/flaticon-covid/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    
    <header class="site-navbar light js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2">
            <div class="mb-0 site-logo"><a href="index.html" class="mb-0">Covid<span class="text-primary">.</span> </a></div>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a class="nav-link scrollto" href="#hero">HOME</a></li>
                
                <li><a class="nav-link scrollto" href="#pricing">Indonesia</a></li>
                <li><a class="nav-link scrollto" href="#hiro">Global</a></li>
                <li><a class="nav-link scrollto" href="#haro">Provinsi</a></li>
                <li class="has-children">
                  <a href="#" class="nav-link">Masuk</a>
                  <ul class="dropdown">
                  @if (Route::has('login'))
                  @auth
                    <li><a href="{{ url('/home') }}" class="nav-link">Home </a></li>
                    @else
                    <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    @endif
                   @endauth
                   @endif
                      </ul>
                    </li>
          </ul>
        </li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a></div>

        </div>
      </div>

    </header>

    
    <section id="hero" >
    <div class="hero-v1">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mr-auto text-center text-lg-left">
            <span class="d-block subheading">Covid-19 Awareness</span>
            <h1 class="heading mb-3">Stay Safe. Stay at Home.</h1>
            <p class="mb-5">Coronavirus Global & Indonesia Live Data</p>



          </div>
          <div class="col-lg-6">
            <figure class="illustration">
              <img src="{{asset('assets/images/illustration.png')}}" alt="Image" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-6"></div>
        </div>
      </div>
    </div>


    <!-- MAIN -->
    <section id="pricing" class="pricing">
    <div class="site-section stats">
      <div class="container">
        <div class="row mb-3">
          <div class="col-lg-7 text-center mx-auto">
            <h2 class="section-heading">KASUS INDONESIA</h2>
            <p>Data Corona Virus Global & Indonesia</p>
          </div>
        </div>
        <div class="row"> 
          <div class="col-lg-4">
            <div class="data">
              <span class="icon text-primary">
                <span class="flaticon-virus"></span>
              </span>
              <strong class="d-block number">{{$positif}}</strong>
              <span class="label">Jumlah Positif</span>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="data">
              <span class="icon text-primary">
                <span class="flaticon-virus"></span>
              </span>
              <strong class="d-block number">{{$sembuh}}</strong>
              <span class="label">Jumlah Sembuh</span>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="data">
              <span class="icon text-primary">
                <span class="flaticon-virus"></span>
              </span>
              <strong class="d-block number">{{$meninggal}}</strong>
              <span class="label">Jumlah Meninggal</span>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

                        <section id="hiro">
                            <div class="card mb-4">
                            <div class="card-header">
                                Data Global Coronavirus
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <?php 
                                          $data = file_get_contents('https://api.kawalcorona.com');
                                          $negara = json_decode($data, true);
                                        ?>
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO.</th>
                                                <th scope="col">Negara</th>
                                                <th scope="col">Positif</th>
                                                <th scope="col">Sembuh</th>
                                                <th scope="col">Meninggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php $no=1; @endphp
                                          @foreach($negara as $data)
                                          <tr>
                                            <td scope="row">{{$no++}}</td>
                                            <td scope="row">{{$data['attributes']['Country_Region']}}</td>
                                            <td scope="row">{{$data['attributes']['Confirmed']}}</td>
                                            <td scope="row">{{$data['attributes']['Recovered']}}</td>
                                            <td scope="row">{{$data['attributes']['Deaths']}}</td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </section>
                        
                        <section id="haro">
                        <div class="card mb-4">
                            <div class="card-header">
                                    Data Coronavirus Berdasarkan Provinsi di Negara Indonesia
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>PROVINSI</th>
                                                <th>POSITIF</th>
                                                <th>SEMBUH</th>
                                                <th>MENINGGAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach($tampil as $data)
                                              <tr>
                                                <th scope='row'>{{ $no++ }}</th>
                                                <th>{{ $data->nama_provinsi }}</th>
                                                <th>{{ $data->positif}}</th>
                                                <th>{{ $data->sembuh}}</th>
                                                <th>{{ $data->meninggal}} </th> 
                                              </tr>
                                              @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  </section>


        <div class="row text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p class="copyright"><small>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;listianti. All rights reserved <i class="icon-heart text-danger" aria-hidden="true"></i> </a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div> <!-- .site-wrap -->

  <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('assets/js/aos.js')}}"></script>
  <script src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>


  <script src="{{asset('assets/js/main.js')}}"></script>


</body>
</html>