<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voting') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-10">

        @if (session('success'))
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center p-4 mb-4 bg-emerald-500 text-white rounded-2xl">
                    <i class="fa-solid fa-circle-check"></i>
                    <div class="ml-3 text-sm font-reguler">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        @if (session('failed'))
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center p-4 mb-4 bg-red-500 text-white rounded-2xl">
                    <i class="fa-solid fa-circle-check"></i>
                    <div class="ml-3 text-sm font-reguler">
                        {{ session('failed') }}
                    </div>
                </div>
            </div>
        @endif

        <table class="max-w-7xl mx-auto">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Candidate</th>
                    <th>Organization</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($voting as $key => $vote)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $vote->cardvote->period->description }}</td>
                        <td>{{ $vote->candidate->name }}</td>
                        <td>{{ $vote->candidate->organization->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Not found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        @if (count($candidates_non_organization) > 0)
            <section class="max-w-7xl mx-auto space-y-4 sm:px-6 lg:px-8">
                <header class="max-w-lg mx-auto text-center space-y-1">
                    <h2 class="font-bold text-md">Pemilihan Non Organization</h2>
                    <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus
                        deserunt cumque excepturi ex praesentium corrupti eveniet sed sint quibusdam reiciendis?</p>
                </header>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
                    @foreach ($candidates_non_organization as $candidate_non_organization)
                        <form action="{{ route('voting.store') }}" method="POST"
                            class="bg-white shadow-md rounded-lg text-center space-y-1 p-4">
                            @csrf
                            <div class="h-32 bg-gray-200"></div>
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
                    <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus
                        deserunt cumque excepturi ex praesentium corrupti eveniet sed sint quibusdam reiciendis?</p>
                </header>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
                    @foreach ($candidates as $candidate)
                        <form action="{{ route('voting.store') }}" method="POST"
                            class="bg-white shadow-md rounded-lg text-center space-y-1 p-4">
                            @csrf
                            <div class="h-32 bg-gray-200"></div>
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
