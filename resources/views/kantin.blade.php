<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/c1839f1e3d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  </head>
  <body>
    @include('components.header')

    <div class="p-3 position-relative">
      <img src="{{ asset('img/home_banner.jpg') }}" class="w-100 rounded-5" alt="Responsive image">

      <div class="position-absolute text-center text-white" style="top: 50%; left: 50%; transform: translate(-50%, -70%); padding: 20px; border-radius: 10px;">
        <img src="{{ asset('img/eat.png') }}" alt="Responsive image" style="width: 100px;">
        <h3 class="text-center text-white fw-bold mt-2">Makan enak? CampusBites aja!</h3>
        <div class="col-md-9 text-center m-auto">
          <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, rem a quasi laboriosam facilis veritatis?</p>
        </div>
      </div>

      {{-- create white box in middle botton --}}
      <div class="position-absolute translate-middle-x bg-white rounded-5 p-4 px-5 shadow-lg text-center p-3" style="bottom: -10%; left: 50%; transform: translate(-50%, 50%);width: 90%;">
        <h3 class="fw-bold">{{ $canteen->name }}</h3>
				<div class="d-flex justify-content-center align-items-center gap-1">
					<i class="fa fa-star text-warning" aria-hidden="true"></i>
					<i class="fa fa-star text-warning" aria-hidden="true"></i>
					<i class="fa fa-star text-warning" aria-hidden="true"></i>
					<i class="fa fa-star text-warning" aria-hidden="true"></i>
					<i class="fa fa-star text-warning" aria-hidden="true"></i>
				</div>
        <p class="mb-4 mt-2">{{ $canteen->description }}</p>
      </div>
    </div>

		<br>
    <br>
    <br>
    <br>
		<section class="mt-5 mb-5">
      <h3 class="text-center mt-5 fw-bold mb-4">Menu Makanan</h3>
      <div class="col-lg-6 m-auto">
        @if(session('success'))
          <script>
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: '{{ session('success') }}',
            });
          </script>
        @endif
      </div>
			<div class="col-lg-12 m-auto">
				<div class="d-flex justify-content-center gap-4">
          @foreach($menus as $menu)
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('menuImages/' . $menu->image) }}" class="card-img-top" alt="nasi">
              <div class="card-body">
                <h5 class="card-title">{{ $menu->name }}</h5>
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
    
    </section>
    <script src="{{ asset('/js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>