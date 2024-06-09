<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  </head>
  <body>
		<style>
			.bg-img {
				background-image: url("{{ asset('img/bg-login.jpg') }}");
				width: 100vw;
				height: 100vh;
				display: flex;
				justify-content: center;
				align-items: center;
				background-size: cover;
				background-position: center;
			}
		</style>
		<div class="bg-img">
			<div class="container">
				<div class="col-lg-4 m-auto">
					<div class="card p-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
							<h2 class="text-center fw-bold">Selamat Datang!</h2>
							<p class="text-center mb-5">Daftar untuk melanjutkan</p>
							@if($errors->any())
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							@endif
								
							<form method="POST" action="{{ route('registerPost') }}">
								@csrf
								<div class="mb-3">
									<label class="form-label">Username</label>
									<input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Email address</label>
									<input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Password</label>
									<input type="password" name="password" class="form-control" value="{{ old('password') }}" required> 
								</div>
								<div class="mb-3">
									<label class="form-label">Ulangi Password</label>
									<input type="password" name="password_confirm" value="{{ old('password_confirm') }}" class="form-control" required>
								</div>
								<button type="submit" class="btn mt-3 w-100 bg-custom-primary text-white">Daftar</button>
								<p class="text-center mt-3">Punya akun? <a href="{{ route('login') }}" class="text-custom-primary text-decoration-none">Masuk</a></p>
							</form>
					</div>
				</div>
			</div>
		</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>