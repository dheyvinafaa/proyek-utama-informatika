<nav class="navbar navbar-expand-lg bg-white">
  <div class="container">
    <a class="navbar-brand d-flex justify-center align-items-center" href="{{ route('index') }}">
			<img src="{{ asset('img/logo_campusbite.png') }}" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
      <h5 class="mt-3 ms-2">{{ env('APP_NAME') }}</h5>
		</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-center align-items-center" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-4 ms-4">
        <li class="nav-item">
          <a class="nav-link text-dark" aria-current="page" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" aria-current="page" href="{{ route('menu') }}">Menu</a>
				</li>
      </ul>
      <div class="input-group w-25">
        <form method="POST" action="{{ route('search') }}">
          @csrf
          <input type="text" name="keyword" class="form-control" placeholder="Search">
        </form>
      </div>

      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa fa-shopping-cart fs-4 text-custom-primary me-4" aria-hidden="true"></i>
      </button>

      <a href="{{ route('history') }}">
        <i class="fa fa-history fs-4 text-custom-primary me-4" aria-hidden="true"></i>
      </a>
      @if(session('username'))
        <div class="d-flex justify-content-center align-items-center gap-3">
          <div class="d-flex justify-content-center align-items-center gap-1">
            <p class="text-dark mt-2">{{ session('username') }}</p>
          </div>
          <a href="{{ route('logout') }}" class="text-custom-primary">
            <i class="fa fa-sign-out fs-5" aria-hidden="true"></i>
          </a>
        </div>
      @else
      <a href="{{ route('login') }}" class="btn rounded-5 bg-custom-primary text-white ms-4">Masuk / Daftar</a>
      @endif
    </div>
  </div>

  <!-- Modal -->
  <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Keranjang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('order.store') }}">
          @csrf
          <div class="modal-body">
            {{-- show carts items using invisible table --}}
            <table class="table table-borderless" id="table">
              <thead>
                <tr>
                  <th scope="col">Nama Menu</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Total</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <label for="type" class="form-label fw-bold">Pilih jenis pesanan</label>
                <select name="type" class="form-select mb-3" required>
                  <option value="pickUp">Ambil di tempat</option>
                  <option value="dineIn">Makan di tempat</option>
                </select>

                <label for="type" class="form-label fw-bold">Tambahkan catatan</label>
                <input type="text" name="note" class="form-control mb-3"></input>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const table = document.getElementById('table');

    fetch('/api/cart')
      .then(response => response.json())
      .then(data => {
        data.data.forEach(item => {
          const row = table.insertRow(-1);
          const total = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.menu.price * item.quantity);
          const price = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.menu.price);
          row.innerHTML = `
            <td>${item.menu.name}</td>
            <td>${price}</td>
            <td>${item.quantity}</td>
            <td>${total}</td>
            <td>
              <a href='/api/cart/${item.id}' class="btn btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </a>
            </td>
          `;
        });
      });

  </script>
</nav>