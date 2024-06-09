<div id="sidebar" class="active">
	<div class="sidebar-wrapper active">
		<div class="sidebar-header position-relative">
			<div class="mt-1">
				<div class="logo mt-2">
					<a href="" class="d-flex">
						{{-- <img src="" class="my-auto" alt="Logo" style="width: 30px;height: 25px;"/> --}}
						<h5 class="ms-2 my-auto">{{ env('APP_NAME') }}</h5>
					</a>
				</div>
				<div class="sidebar-toggler x">
					<a href="#" class="sidebar-hide d-xl-none d-block"
					><i class="bi bi-x bi-middle"></i
					></a>
				</div>
			</div>
		</div>

		<div class="sidebar-menu mt-0">
			<ul class="menu">
				<li class="sidebar-item {{ $title == 'Overview' ? 'active' : '' }}">
					<a href="{{ route('dashboard.index') }}" class="sidebar-link">
						<i class="bi bi-grid-fill"></i>
						<span>Overview</span>
					</a>
				</li>

				@if(session('role') != 'admin')
					<li class="sidebar-title">Menu</li>

					<li class="sidebar-item {{ $title == 'Menu' ? 'active' : '' }}">
						<a href="{{ route('dashboard.menu') }}" class="sidebar-link">
							<i class="fa fa-cutlery" aria-hidden="true"></i>
							<span>Menu</span>
						</a>
					</li>

					<li class="sidebar-item {{ $title == 'Pesanan' ? 'active' : '' }}">
						<a href="{{ route('dashboard.order') }}" class="sidebar-link">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							<span>Pesanan</span>
						</a>
					</li>

					{{-- <li class="sidebar-item {{ $title == 'Kehadiran' ? 'active' : '' }}">
						<a href="" class="sidebar-link">
							<i class="fa fa-line-chart" aria-hidden="true"></i>
							<span>Laporan</span>
						</a>
					</li> --}}
				@endif


				@if(session('role') == 'admin')
					<li class="sidebar-title">Admin</li>

					<li class="sidebar-item {{ $title == 'Pengguna' ? 'active' : '' }}">
						<a href="{{ route('dashboard.user') }}" class="sidebar-link">
							<i class="fa fa-users" aria-hidden="true"></i>
							<span>User</span>
						</a>
					</li>

					<li class="sidebar-item {{ $title == 'Kategori' ? 'active' : '' }}">
						<a href="{{ route('dashboard.category') }}" class="sidebar-link">
							<i class="fa fa-tags" aria-hidden="true"></i>
							<span>Category</span>
						</a>
					</li>
				@endif

				<li class="sidebar-item my-4">
					<a href="#" class="sidebar-link">
						{{--  --}}
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
			
			