@extends('dashboard.layout.app')

@section('content')
	<section class="row">
		<div class="col-12 col-lg-12">
			{{-- welcome alert name --}}
			<div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
				Selamat datang, <b>{{ ucwords($user->username) }}!</b>
        <button type="button" class="btn-close color-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
			@if(session('role') != 'admin')
				<div class="row">
					<div class="col-6 col-lg-4 col-md-6">
						<div class="card">
							<div class="card-body px-4 py-4-5">
							<div class="row">
								<div
								class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
								>
									<div class="stats-icon green mb-2">
										<i class="fa fa-usd" aria-hidden="true"></i>
									</div>
								</div>
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="text-muted font-semibold">
										Total Pendapatan
									</h6>
									<h6 class="font-extrabold mb-0">Rp {{ number_format($income, 0, ',', '.') }}</h6>
								</div>
							</div>
							</div>
						</div>
					</div>
					<div class="col-6 col-lg-4 col-md-6">
						<div class="card">
							<div class="card-body px-4 py-4-5">
							<div class="row">
								<div
								class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
								>
								<div class="stats-icon red mb-2">
									<i class="fa fa-cutlery" aria-hidden="true"></i>
								</div>
								</div>
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">
									Total Pesanan
								</h6>
								<h6 class="font-extrabold mb-0">{{ $orders }}</h6>
								</div>
							</div>
							</div>
						</div>
					</div>
					<div class="col-6 col-lg-4 col-md-6">
						<div class="card">
							<div class="card-body px-4 py-4-5">
							<div class="row">
								<div
								class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
								>
								<div class="stats-icon purple mb-2">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</div>
								</div>
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">
									Total Menu
								</h6>
								<h6 class="font-extrabold mb-0">{{ $menus }}</h6>
								</div>
							</div>
							</div>
						</div>
					</div>
					{{-- <div class="col-6 col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body px-4 py-4-5">
								<div class="row">
									<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
										<div class="stats-icon blue mb-2">
											<i class="fa fa-usd" aria-hidden="true"></i>
										</div>
									</div>
									<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
										<h6 class="text-muted font-semibold">Total Sakit</h6>
										<h6 class="font-extrabold mb-0"></h6>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
			@endif
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body mt-2">
							<h5 class="text-center">Selamat Datang di Website Dashboard CampusBitesUTY</h5>
							<p class="text-center">
								CampusBitesUTY adalah Website kantin online bagi mahasiswa untuk memesan makanan dan minuman dari kantin kampus dengan mudah.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="{{ asset('/Assets/js/pages/dashboard.js') }}"></script>
@endsection
					