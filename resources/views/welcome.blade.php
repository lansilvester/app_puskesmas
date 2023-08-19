<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Puskesmas Mantehage</title>
  <style>
    /* Reset some default styles */
    *{
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      /* overflow: hidden; */
    }

    /* Navbar styles */
    .navbar {
      background-color: #0f5ab5;
      padding: 20px;
      display: flex;
      /* width:100%; */
      top:0;
      justify-content: flex-end;
    }

    .navbar a {
      color: #fff;
      text-decoration: none;
      padding: 8px 16px;
    }

    /* Hero banner styles */
    .hero-banner {
      background-image: url('https://etimg.etb2bimg.com/photo/75642114.cms'); /* Replace 'example-puskesmas-image.jpg' with the actual image file name/path */
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      display: flex;
      align-items: center;
      padding: 0 50px;
      color: #fff;
    }

    .hero-banner-text {
      font-size:2em;
      text-shadow: 3px 3px 10px rgba(0,0,0,.5);
    }

    /* Main content styles */
    .main-content {
      padding: 40px 20px;
      text-align: justify;
      line-height: 1.6;
    }

    /* Footer styles */
    .footer {
      background-color: #f1f1f1;
      padding: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
 @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
  </div>

  <!-- Hero Banner -->
  <div class="hero-banner">
    <div class="hero-banner-text">
      <h1>Puskesmas Mantehage</h1>
      <p>Desa Tinongko, Pulau Mantehage, Kec. Wori</p>
    </div>
  </div>
</body>
</html>
