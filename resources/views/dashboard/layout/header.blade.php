<header class="mb-3">
	<a href="#" class="burger-btn d-block d-xl-none">
		<i class="bi bi-justify fs-3"></i>
	</a>
</header>

<div class="h-auto">
	<div class="d-flex justify-content-between">
		<div class="w-auto">
			<h3>{{ $title }}</h3>
			<p class="text-subtitle text-muted">
				{{ $subtitle }}
			</p>
		</div>
	
		<div class="w-auto">
			<button class="btn btn-sm border-0 dropdown-toggle me-1 show" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<div class="avatar bg-warning">
          <span class="avatar-content">{{ session('initial') }}</span>
          <span class="avatar-status bg-success"></span>
        </div>
			</button>

			{{-- dropdown content --}}
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 40px, 0px);" data-popper-placement="bottom-start">
				
				<div class="dropdown-item">
					<span class="font-bold">{{ ucwords(session('username')) }}</span><br>
					<span class="text-sm">{{strtolower(session('email')) }}</span><br>
					@if(session('role') == 'admin')
						<span class="badge bg-danger mt-1">{{ (ucwords(session('role'))) }}</span>
					@else
						<span class="badge bg-primary mt-1">{{ (ucwords(session('role'))) }}</span>
					@endif
				</div>

				<hr class="my-2">
				{{-- <a class="dropdown-item text-md" href="">
					<i class="fa fa-user me-1" aria-hidden="true"></i>
					Profile
				</a> --}}
				
				<div class="dropdown-item text-md">
					<div class="d-flex gap-2">
						<div>
							<i class="fa fa-moon me-1" aria-hidden="true"></i>
							Dark Mode
						</div>
						<div class="theme-toggle d-flex gap-2 align-items-center">
							<div class="form-check form-switch fs-6">
								<input
									class="form-check-input me-0"
									type="checkbox"
									id="toggle-dark"
									style="cursor: pointer"
								/>
								<label class="form-check-label"></label>
							</div>
						</div>
					</div>
				</div>

				<a class="dropdown-item text-md" href="{{ route('logout') }}">
					<i class="fa fa-sign-out me-1" aria-hidden="true"></i>
					Logout
				</a>
      </div>
		</div>
	</div>
</div>
				