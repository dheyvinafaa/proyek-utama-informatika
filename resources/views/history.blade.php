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
			<div class="d-flex gap-5">
				@foreach($orders as $order)
          <div class="card" style="width: 18rem;">
						<div class="card-body">
							{{-- make vertically center --}}
							<div class="d-flex justify-content-between align-items-center">
								<h5 class="card-title">{{ $order->quantity }}x {{ $order->menu->name }}</h5>
								<h6 class="card-subtitle mb-2 text-body-secondary ms-auto">Rp {{ number_format($order->menu->price, 0, ',', '.') }}</h6>
							</div>
							<p class="card-subtitle mb-2 text-body-secondary" style="font-size: 13px;">{{ date('d F Y (H:i)', strtotime($order->created_at)) }}</p>
							<p class="card-subtitle mb-2 text-dark font-weight-bold">{{ $order->order_number }}</p>
						</div>
					</div>
        @endforeach
			</div>
			@if(count($orders) == 0)
				<div class="text-center">
					<h3 class="text-center text-dark">Belum ada riwayat pesanan</h3>
				</div>
			@endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>