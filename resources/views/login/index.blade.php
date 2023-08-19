<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/01e60f3c97.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,900&display=swap" rel="stylesheet">
    <style>
        body{
            background-image: url('https://books.forbes.com/wp-content/uploads/2020/06/bigstock-Latin-American-Doctor-Checking-360379282.jpg'); /* Replace 'example-puskesmas-image.jpg' with the actual image file name/path */
            background-size: cover;
            background-position: 10 50
        }
    </style>
</head>
  <body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card shadow border-0 mt-5 text-white" style="background:rgba(0,0,0,.4)">
                    <div class="card-header border-0">
                        <a href="/" class="btn btn-outline-secondary">Back</a>
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                       
                        @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <img src="https://2.bp.blogspot.com/-dD4nsBd1i9o/WJ25BAmpquI/AAAAAAAAAn8/aUUZJbRr4Yw8VuRJX2JlvX-u6Y_v5OmmwCLcB/s1600/Logo%2BPuskesmas%2BBaru.png" class="m-auto mb-2 d-flex" style="width:150px" alt="">
                        <h3 class="fw-thin text-center">Please Login</h3>
                    </div>
                    <div class="card-body">
                    <form action="/login" method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="email"><i class="bi bi-envelope"></i> Email :</label>
                            <input type="text" name="email" value="{{ old('email') }}" placeholder="Ketikan email" class="@error('email') is-invalid @enderror form-control" autofocus>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>  
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="password"><i class="bi bi-key"></i> Password :</label>
                            <input type="password" name="password" placeholder="Ketikan password" class="form-control">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>  
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary w-100 mb-3" type="submit">Login</button>
                            <p>Belum Punya Akun? <a href="{{ route('register') }}">Daftar Sekarang</a></p>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
