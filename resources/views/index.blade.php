<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/c1839f1e3d.js" crossorigin="anonymous"></script>
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
      <div class="position-absolute translate-middle-x bg-white rounded-5 p-4 px-5 shadow-lg text-center p-3" style="bottom: -10%; left: 50%; transform: translate(-50%, 50%);">
        <h3 class="fw-bold">Ayo cari makananmu!</h3>
        <p class="mb-4">Temukan berbagai macam makanan dan minuman di CampusBitesUTY</p>
        <a href="{{ route('menu') }}" class="btn btn-lg bg-custom-primary text-white rounded-5 m-auto">Lihat Makanan</a>
      </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <div class="container mt-5">
      {{-- KATEGORI --}}
      <section class="mt-5 mb-5">
        <h3 class="text-center mt-5 fw-bold">Kategori Makanan</h3>
        <div class="d-flex justify-content-center mt-4">
          @foreach($categories as $category)
            <div class="col-lg-2">
              <div class="m-3 text-center">
                <a href="{{ route('category', $category->slug) }}" class="text-decoration-none text-dark">
                  <img src="{{ asset('categoryImages/' . $category->image) }}" class="rounded-pill" alt="{{ $category->image }}" style="width: 150px;height: 150px;">
                </a>
                <h5 class="text-center mt-4">{{ $category->name }}</h5>
              </div>
            </div>
          @endforeach
        </div>
      </section>

      <br>
      <br>
      <br>

      {{-- KANTIN --}}
      <section class="mt-5">
        <h3 class="text-center mt-5 fw-bold">Kantin</h3>
        <div class="d-flex justify-content-center mt-4">
          @foreach($canteens as $canteen)
            <div class="col-lg-2">
              <a href="{{ route('kantin' , $canteen->slug) }}" class="text-decoration-none text-dark">
                <div class="m-3 text-center">
                  <img src="{{ asset('img/' . $canteen->image) }}" class="w-75" alt="{{ $canteen->image }}">
                  <h5 class="text-center mt-4">{{ $canteen->name }}</h5>
                </div>
              </a>
            </div>
          @endforeach
        </div>
    </div>

    @include('components.footer') 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>