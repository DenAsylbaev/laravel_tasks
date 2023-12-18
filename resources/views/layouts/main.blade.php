
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>
    <meta charset="utf-8">    
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>
  <header data-bs-theme="dark">
    <div class="collapse text-bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4>NEWS MENU</h4>
              <li><a href="#" class="text-white">Politics</a></li>
              <li><a href="#" class="text-white">Business</a></li>
              <li><a href="#" class="text-white">Science</a></li>
              <li><a href="#" class="text-white">Health</a></li>
              <li><a href="#" class="text-white">Sport</a></li>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4>Contact</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Follow on Telegram</a></li>
              <li><a href="#" class="text-white">Like on Facebook</a></li>
              <li><a href="#" class="text-white">Email</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <button class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarHeader" 
            aria-controls="navbarHeader" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>

  </header>

  <main>
    @yield('content')
  </main>

  <footer class="text-body-secondary py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
    </div>
  </footer>

  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
