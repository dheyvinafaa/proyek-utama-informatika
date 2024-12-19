<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semua Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/c1839f1e3d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    @include('components.header')
    <div class="container mt-5">
				@if(session('success'))
          <script>
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: '{{ session('success') }}',
            });
          </script>
        @endif
			<div class="d-flex gap-5">
				@foreach($menus as $menu)
          <div class="card" style="width: 18rem;">
            <img src="{{ $menu->image }}" class="card-img-top" alt="nasi">
            <div class="card-body">
              <h5 class="card-title">{{ $menu->name }}</h5>
							<span class="badge rounded-pill text-white bg-custom-primary mb-2">{{ $menu->canteen->name }}</span>
              <p class="card-text">{{ $menu->description }}</p>
              <p class="card-text fw-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
              <form method="POST" action="{{ route('cart.store') }}">
                @csrf
                <input type="hidden" name="menu_id" id="menu_id" value="{{ $menu->id }}">
                <button type="submit" class="btn btn-sm bg-custom-primary text-white rounded-5 px-4">Tambah Keranjang</button>
              </form>
            </div>
          </div>
        @endforeach
			</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>