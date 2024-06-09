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
    <div class="container mt-5">
      <div class="col-lg-6 m-auto">
        <div class="card w-100 p-3">
          <div class="card-body">
            <h1 class="text-center fw-bold">Rincian Pesanan</h1>
            <p class="text-center mb-4">Pesanan anda telah berhasil dibuat. Berikut adalah rincian pesanan anda:</p>

            @if($orders[0]->received_at)
              <div class="alert alert-danger" role="alert">
                Pesanan ini telah selesei.
              </div>
            @else
              <div class="alert alert-success" role="alert">
                Pesanan ini sedang diproses.
              </div>
            @endif

            <h5>Order Number:</h5>
            <p>{{ $orders[0]->order_number }}</p>

            <h5>Nama Pembeli:</h5>
            <p>{{ $user->username }}</p>
            
            <h5 class="mt-4">List Pesanan:</h5>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nama Menu</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                  <tr>
                    <td>{{ $order->menu->name }}</td>
                    <td>Rp {{ number_format($order->menu->price, 0, ',', '.') }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>Rp {{ number_format($order->menu->price * $order->quantity, 0, ',', '.') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <h5 class="mt-4">Catatan:</h5>
            <p>{{ $orders[0]->note }}</p>

            <h5 class="mt-4">Total Harga:</h5>
            <p>Rp {{ number_format($total, 0, ',', '.') }}</p>

          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>