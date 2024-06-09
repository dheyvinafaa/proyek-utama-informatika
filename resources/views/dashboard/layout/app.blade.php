<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>{{ env('APP_NAME') }} | {{ $title }}</title>
		<link rel="icon" type="image/x-icon" href="{{ asset('/Assets/favicon.ico') }}">

		<link rel="stylesheet" href="{{ asset('/Assets/css/main/app.css') }}">
		<link rel="stylesheet" href="{{ asset('/Assets/css/main/app-dark.css') }}">
		<link rel="stylesheet" href="{{ asset('/Assets/css/shared/iconly.css') }}">
		<link rel="stylesheet" href="{{ asset('/Assets/css/preloader.css') }}" />
		<link rel="stylesheet" href="{{ asset('/Assets/css/image-upload.css') }}" />
		<link
			rel="stylesheet"
			href="{{ asset('/Assets/extensions/toastify-js/src/toastify.css') }}"
		/>
		<link
			rel="stylesheet"
			href="{{ asset('/Assets/extensions/choices.js/public/assets/styles/choices.css') }}"
		/>
		<script src="{{ asset('/Assets/extensions/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('/Assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
		<script src="{{ asset('/Assets/extensions/toastify-js/src/toastify.js') }}"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<link rel="stylesheet" href="{{ asset('/Assets/extensions/filepond/filepond.css') }}" />
		<link
			rel="stylesheet"
			href="{{ asset('/Assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}"
		/>
		<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet" />
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
		<link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.7/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.11.0/r-2.5.0/rg-1.4.1/rr-1.4.1/sc-2.3.0/sb-1.6.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.7/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.11.0/r-2.5.0/rg-1.4.1/rr-1.4.1/sc-2.3.0/sb-1.6.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.js"></script>


  </head>
	<body>
		<script src="{{ asset('/Assets/js/initTheme.js') }}"></script>

		<div class="preloader">
			<div class="loader"></div>
		</div>

		<div id="app">
			@include('dashboard.layout.sidebar')
			<div id="main">
				@include('dashboard.layout.header')
				<div class="page-content mt-3">
					@yield('content')
				</div>
				@include('dashboard.layout.footer')
			</div>
		</div>
			
		<script src="https://kit.fontawesome.com/b632dc8495.js" crossorigin="anonymous"></script>
		<script src="{{ asset('/Assets/js/bootstrap.js') }}"></script>
		<script src="{{ asset('/Assets/js/app.js') }}"></script>
		<script src="{{ asset('/Assets/js/preloader.js') }}"></script>
		<script src="{{ asset('/Assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    	<script src="{{ asset('/Assets/js/pages/form-element-select.js') }}"></script>
		<script src="{{ asset('/Assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
		<script src="{{ asset('/Assets/extensions/filepond/filepond.min.js') }}"></script>
		<script src="{{ asset('/Assets/js/pages/filepond.js') }}"></script>
	</body>
</html>