<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voting') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-10">

        @if (session('success'))
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center p-4 mb-4 bg-emerald-500 text-white rounded-2xl lg:mx-0 mx-5">
                    <i class="fa-solid fa-circle-check"></i>
                    <div class="ml-3 text-sm font-reguler">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        @if (session('failed'))
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center p-4 mb-4 bg-red-500 text-white rounded-2xl lg:mx-0 mx-5">
                    <i class="fa-solid fa-circle-check"></i>
                    <div class="ml-3 text-sm font-reguler">
                        {{ session('failed') }}
                    </div>
                </div>
            </div>
        @endif


        @if (session('error'))
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center p-4 mb-4 bg-red-500 text-white rounded-2xl lg:mx-0 mx-5">
                    <i class="fa-solid fa-circle-check"></i>
                    <div class="ml-3 text-sm font-reguler">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif

        @if (count($voting) > 0)
            <div class="max-w-7xl mx-auto space-y-4 sm:px-6 lg:px-8">
                <header>
                    <h2 class="bg-emerald-100 text-emerald-700 px-5 py-2 rounded-xl mb-2 text-center mx-5 lg:mx-0">✅
                        Anda sudah memilih! Terima
                        kasih sudah menggunakan hak suara Anda dalam pemilihan BEM dan HIMA. Pilihan Anda adalah
                        kontribusi nyata untuk perubahan!</h2>
                </header>
                <div class="text-center">
                    <div class="font-bold">PEMILIHAN UMUM BEM DAN HIMA 2025</div>
                    <p>Silahkan lihat Kandidat berikut dan keputusan anda</p>
                </div>



                <div class="relative overflow-x-auto shadow-md sm:rounded-lg lg:mx-0 mx-5">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-center">
                                    NO
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    NAME
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-center">
                                    CANDIDATE
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    ORGANIZATION
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($voting as $key => $vote)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 text-center">
                                        {{ $key + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $vote->cardvote->period->description }}
                                    </td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        {{ $vote->candidate->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $vote->candidate->organization->name }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 bg-gray-50 dark:bg-gray-800">Not found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if (count($candidates_non_organization) > 0)
            <section class="max-w-7xl mx-auto space-y-4 sm:px-6 lg:px-8">
                <header class="max-w-lg mx-auto text-center space-y-1">
                    <h2 class="font-bold text-md">Pemilihan Non Organization</h2>
                    <p class="text-sm text-gray-600 lg:mx-0 mx-5">Gunakan hak suaramu, karena satu suara menentukan arah perubahan!
                        Mari bersama membangun organisasi mahasiswa yang lebih baik.</p>
                </header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:mx-0 mx-5">
                    @foreach ($candidates_non_organization as $candidate_non_organization)
                        <form action="{{ route('voting.store') }}" method="POST"
                            class="bg-white shadow-md rounded-lg text-center space-y-1 p-4">
                            @csrf
                            @if ($candidate_non_organization->logo)
                                <img src="{{ asset('storage/' . $candidate_non_organization->logo) }}" alt="Logo"
                                    class="w-full h-52 object-cover">
                            @else
                                <div class="w-full h-52 bg-gray-200"></div>
                            @endif
                            <h2 class="text-lg font-bold">{{ $candidate_non_organization->name }}</h2>
                            <h3 class="text-md font-medium">
                                {{ $candidate_non_organization->organization->name ?? 'Unknown' }}</h3>
                            <p class="text-sm text-gray-700">{{ $candidate_non_organization->description }}</p>
                            <input type="hidden" name="candidate_id" value="{{ $candidate_non_organization->id }}">
                            <input type="hidden" name="card_vote_id" value="{{ $cardvote->id }}">
                            <button type="submit"
                                class="inline-block bg-sky-500 hover:bg-sky-600 text-white px-5 py-2 text-sm font-medium rounded-xl">Pilih</button>
                        </form>
                    @endforeach
                </div>
            </section>
        @endif

        @if (count($candidates) > 0)
            <section class="max-w-7xl mx-auto space-y-4 sm:px-6 lg:px-8">
                <header class="max-w-lg mx-auto text-center space-y-1">
                    <h2 class="font-bold text-md">Pemilihan Organization</h2>
                    <p class="text-sm text-gray-600 lg:mx-0 mx-5">Gunakan hak suaramu, karena satu suara menentukan arah perubahan!
                        Mari bersama membangun organisasi mahasiswa yang lebih baik.</p>
                </header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:mx-0 mx-5">
                    @foreach ($candidates as $candidate)
                        <form action="{{ route('voting.store') }}" method="POST"
                            class="bg-white shadow-md rounded-lg text-center space-y-1 p-4">
                            @csrf
                            @if ($candidate->logo)
                                <img src="{{ asset('storage/' . $candidate->logo) }}" alt="Logo"
                                    class="w-full h-52 object-cover">
                            @else
                                <div class="w-full h-52 bg-gray-200"></div>
                            @endif
                            <h2 class="text-lg font-bold">{{ $candidate->name }}</h2>
                            <h3 class="text-md font-medium">{{ $candidate->organization->name ?? 'Unknown' }}</h3>
                            <p class="text-sm text-gray-700">{{ $candidate->description }}</p>
                            <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                            <input type="hidden" name="card_vote_id" value="{{ $cardvote->id }}">
                            <button type="submit"
                                class="inline-block bg-sky-500 hover:bg-sky-600 text-white px-5 py-2 text-sm font-medium rounded-xl">Pilih</button>
                        </form>
                    @endforeach
                </div>
            </section>
        @endif

    </div>
</x-app-layout>
