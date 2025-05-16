<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Badan Eksekutif Mahasiswa</title>
    <link rel="icon" href="{{ url('img/logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-[url('/public/img/building.jpg')] bg-no-repeat bg-cover bg-gray-500 bg-blend-multiply">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="flex mb-2 gap-10" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000"
            data-aos-delay="800">
            <div>
                <img src="{{ url('img/lp3i-logo-color-poltek.png') }}" alt="" srcset=""
                    class="lg:w-[200px] w-[130px]">
            </div>
            <div>
                <img src="{{ url('img/gmu.png') }}" alt="" srcset="" class="lg:w-[150px] w-[100px]">
            </div>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
