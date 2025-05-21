<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Badan Eksekutif Mahasiswa</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('img/kpu.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url('img/kpu.png') }}">
    <link rel="apple-touch-icon" href="{{ url('img/kpu.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-sans text-gray-900 antialiased bg-[url('/public/img/gedung2.jpg')] bg-no-repeat bg-cover bg-gray-800 bg-blend-multiply">
    <div
        class="h-screen flex flex-col sm:justify-center items-center lg:pt-6 dark:bg-gray-900 px-6 lg:px-0 pt-[250px] ">
        <div class="flex mb-2 gap-10" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000"
            data-aos-delay="800">
            <div>
                <img src="{{ url('img/logo-lp3i-putih-SVG.svg') }}" alt="" srcset=""
                    class="lg:w-[200px] w-[130px]">
            </div>
            <div>
                <img src="{{ url('img/gmu-white.png') }}" alt="" srcset="" class="lg:w-[150px] w-[100px]">
            </div>
        </div>
        <div class="text-center text-white mt-4 mb-3">
            <div class="text-lg font-bold">Ayo gunakan hak pilihmu dalam Pemilu BEM dan HIMA!</div>
            <div>Satu suara kamu menentukan arah gerakan mahasiswa. <br> Jangan golput, karena perubahan dimulai dari suara kita</div>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
