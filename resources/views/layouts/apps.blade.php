<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet" />
	<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
	<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
	<link
	href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css"
	rel="stylesheet"
	/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css">
	@livewireStyles
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased light-body dark:dark-body">
	@include('sweetalert::alert')
	<div class="min-h-screen">
		
		
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"></script>
	<script>
		$('[data-toggle="datepicker"]').datepicker({ format: 'yyyy-mm-dd'});
	</script>
	@livewireScripts
	@livewire('livewire-ui-modal')
	@stack('footerScripts')
</body>
</html>
