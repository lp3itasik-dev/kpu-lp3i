<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-10">
        @foreach ($vote_totals_by_period_candidate as $organization)
            <section class="max-w-7xl mx-auto space-y-4 sm:px-6 lg:px-8">
                <header class="max-w-lg mx-auto text-center space-y-1">
                    <h2 class="font-bold text-md">{{ $organization[0]['organization_name'] }}
                        {{ $organization[0]['period_name'] }}</h2>
                    <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus
                        deserunt cumque excepturi ex praesentium corrupti eveniet sed sint quibusdam reiciendis?</p>
                </header>
                @php
                    if ($organization[0]['program_id'] !== null) {
                        $totalPemilih = App\Models\CardVote::where([
                            'period_id' => $organization[0]['period_id'],
                            'organization_id' => $organization[0]['organization_id'],
                        ])->count();
                    } else {
                        $totalPemilih = App\Models\CardVote::where([
                            'period_id' => $organization[0]['period_id'],
                        ])->count();
                    }
                    $totalYangMemilih = 0;
                @endphp
                <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
                    @foreach ($organization as $candidate)
                        <div class="bg-white shadow-md rounded-lg text-center space-y-1 p-4">
                            @if ($candidate->candidate_logo)
                                <img src="{{ asset('storage/' . $candidate->candidate_logo) }}" alt="Logo"
                                    class="w-full h-52 object-contain">
                            @else
                                <div class="w-full h-52 bg-gray-200"></div>
                            @endif
                            <h2 class="text-lg font-bold">{{ $candidate->candidate_name }}</h2>
                            <h3 class="text-md font-medium">{{ $candidate->candidate_description }}</h3>
                            <p class="text-sm text-gray-700">{{ $candidate->total }}</p>
                            @php
                                $totalYangMemilih += $candidate->total;
                            @endphp
                        </div>
                    @endforeach
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-5 text-center">
                    <p>Total Pemilih: {{ $totalPemilih }}</p>
                    <p>Total Yang Memilih: {{ $totalYangMemilih }}</p>
                    <p>Total Belum Memilih: {{ $totalPemilih - $totalYangMemilih }}</p>
                    <p>Persentase: {{ ($totalYangMemilih / $totalPemilih) * 100 }}%</p>
                </div>
            </section>
        @endforeach
    </div>
</x-app-layout>
