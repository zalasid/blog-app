<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 font-sans leading-normal tracking-normal">
	<!--Header-->
	<div class="w-full m-0 p-0 bg-cover bg-bottom" style="background-image:url('https://source.unsplash.com/collection/3106804/800x460'); height: 60vh; max-height:460px;">
			<div class="container max-w-4xl mx-auto pt-16 md:pt-32 text-center break-normal">
				<!--Title-->
                <p class="text-white font-extrabold text-3xl md:text-5xl">
                    <a href="/">Blog App</a>
                </p>
			</div>
		</div>
		<!--Container-->
		<div class="container px-4 md:px-0 max-w-6xl mx-auto -mt-32">
			<div class="mx-0 sm:mx-6">
				<!--Nav-->
                @include('layouts.navigation')
				{{-- Alert Message --}}
				@include('layouts.alerts')
				<!--Posts Container-->
				<div class="flex flex-wrap justify-between -mx-6">
					{{ $content }}
				</div>
				<!--/ Post Content-->
			</div>
		</div>
	</div>
</body>
</html>
