@extends('dashboard.layout.app')

@section('content')
	<section class="section">
		<div class="card">
			<div class="card-header">
				<div class="d-flex justify-content-between">
					<h4 class="card-title">Daftar Pesanan</h4>
				</div>
			</div>
			<div class="card-body table-responsive">
				<table class="table" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Order Number</th>
							<th>Menu</th>
							<th>Nama Pembeli</th>
							<th>Jumlah</th>
							<th>Total Harga</th>
							<th>Tipe</th>
							<th>Note</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $item)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $item->order_number }}</td>
								<td>{{ $item->menu->name }}</td>
								<td>{{ $item->user->username }}</td>
								<td>{{ $item->quantity }}</td>
								<td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
								<td>{{ $item->type }}</td>
								<td>{{ $item->note ? $item->note : '-' }}</td>
								<td>{{ $item->received_at ? 'Diambil pada ' . $item->received_at : 'Belum Diambil' }}</td>
								<td>
									<button type="button" class="btn btn-sm btn-primary dropdown-toggle me-1"
										id="dropdownMenuButton"
										data-bs-toggle="dropdown"
										aria-haspopup="true"
										aria-expanded="false"
									>
										Opsi
									</button>
									<div
										class="dropdown-menu fade"
										aria-labelledby="dropdownMenuButton"
									>
										<form action="{{ route('dashboard.order.update', $item->order_number) }}" method="POST">
											@csrf
											@method('PUT')
											<button type="submit" onclick="selesai()" class="dropdown-item">Selesai</button>
										</form>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<!-- Modal Create Category -->
	<div class="modal fade text-left" id="createCategory" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel33">
            Tambah Menu
          </h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </button>
        </div>
        <form action="{{ route('dashboard.menu.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
          <div class="modal-body">
						<label>Nama Menu: </label>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Nama Menu" name="name" id="name" value="{{ old('name') }}">
            </div>

						<label>Deskripsi Menu: </label>
						<div class="form-group">
							<textarea type="text" class="form-control" placeholder="Deskripsi Menu" name="description" id="description" style="height: 100px" value="{{ old('description') }}"></textarea>
						</div>

						<label>Harga Menu: </label>
						<div class="form-group">
							<input type="number" class="form-control" placeholder="Harga Menu" name="price" id="price" value="{{ old('price') }}">
						</div>

						<label>Gambar Menu: </label>
						<div class="form-group">
              <input type="file" name="image" class="form-control" placeholder="Upload gambar produk" value="{{ old('image') }}" accept="image/*" onchange="showPreview(event);">
            </div>

						<div class="col-lg-6 mb-3">
							<img src="{{ asset('/Assets/images/image-placeholder.png') }}" id="preview" class="img-thumbnail bg-upload" style="height: 200px;width: 200px;">
						</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
              <span class="d-sm-block">Close</span>
            </button>
            <button type="submit" class="btn btn-primary ml-1">
              <span class="d-sm-block">Tambah</span>
            </button>
          </div>
        </form>
      </div>
    </div>
	</div>

	<!-- Modal Edit Category -->
	<div class="modal fade text-left" id="editCategory" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel33">
            Edit Menu
          </h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
          <div class="modal-body">
						<label>Nama Menu: </label>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Nama Menu" name="name" id="name" value="{{ old('name') }}">
            </div>

						<label>Deskripsi Menu: </label>
						<div class="form-group">
							<textarea type="text" class="form-control" placeholder="Deskripsi Menu" name="description" id="description" style="height: 100px" value="{{ old('description') }}"></textarea>
						</div>

						<label>Harga Menu: </label>
						<div class="form-group">
							<input type="number" class="form-control" placeholder="Harga Menu" name="price" id="price" value="{{ old('price') }}">
						</div>

						<label>Gambar Menu: </label>
						<div class="form-group">
              <input type="file" name="image" class="form-control" placeholder="Upload gambar produk" value="{{ old('image') }}" accept="image/*" onchange="showPreview2(event);">
            </div>

						<div class="col-lg-6 mb-3">
							<img src="{{ asset('/Assets/images/image-placeholder.png') }}" id="preview2" class="img-thumbnail bg-upload" style="height: 200px;width: 200px;">
						</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
              <span class="d-sm-block">Close</span>
            </button>
            <button type="submit" class="btn btn-primary ml-1">
              <span class="d-sm-block">Tambah</span>
            </button>
          </div>
        </form>
      </div>
    </div>
	</div>
	
	@if($message = Session::get('success'))
		<script>
			Toastify({
				text: '{{ $message }}',
				duration: 3000,
				close: true,
				gravity: "top",
				position: "right",
				backgroundColor: "#4fbe87",
			}).showToast()
		</script>
	@elseif($message = Session::get('errors'))
		@foreach($message->all() as $error)
			<script>
				Toastify({
					text: '{{ $error }}',
					duration: 3000,
					close: true,
					gravity: "top",
					position: "right",
					backgroundColor: "#f46a6a",
				}).showToast()
			</script>
		@endforeach
	@elseif($message = Session::get('api_errors'))
		<script>
			Toastify({
				text: '{{ $message }}',
				duration: 3000,
				close: true,
				gravity: "top",
				position: "right",
				backgroundColor: "#f46a6a",
			}).showToast()
		</script>
	@endif

	<script>
		function showPreview(event){
			if(event.target.files.length > 0){
				let src = URL.createObjectURL(event.target.files[0]);
				let preview = document.getElementById("preview");
				preview.src = src;
				preview.style.display = "block";
			}
		}

		function showPreview2(event){
			if(event.target.files.length > 0){
				let src = URL.createObjectURL(event.target.files[0]);
				let preview = document.getElementById("preview2");
				preview.src = src;
				preview.style.display = "block";
			}
		}
	</script>

	<script>
		$(document).on('click', '#filterBtn', function(){
			const storeName = $('#filter_store').val();
			$('#table1').DataTable().search(storeName).draw();
    });
	</script>

	<script>
		$(document).on('click', '#editBtn', function(){
      const url = "/category/";
      const categoryID = $(this).val();
      $.get(url + categoryID, function (data) {
        $('#editCategory').modal('show');
				$('#editCategory form').attr('action', url + categoryID);
				$('#editCategory form input[name="name"]').val(data.name);
				$('#editCategory form textarea[name="description"]').val(data.description);
				$('#editCategory form select[name="id_store"]').val(data.id_store).change();
      }) 
    });
	</script>
	
	<script>
		function confirm() {
			event.preventDefault();
			let form = event.target.form;
			Swal.fire({
				title: 'Apakah anda yakin?',
				text: "Aksi ini tidak dapat dikembalikan!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#435EBE',
				cancelButtonColor: '#DC3545',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					form.submit();
				}
			})
		}
	</script>

	<script>
		function selesai() {
			event.preventDefault();
			let form = event.target.form;
			Swal.fire({
				title: 'Apakah anda yakin?',
				text: "Pesanan ini akan ditandai sebagai selesai!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#435EBE',
				cancelButtonColor: '#DC3545',
				confirmButtonText: 'Yes, selesai!'
			}).then((result) => {
				if (result.isConfirmed) {
					form.submit();
				}
			})
		}
	</script>
	<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
	<script src="{{ asset('/Assets/js/pages/datatables.js') }}"></script>
@endsection