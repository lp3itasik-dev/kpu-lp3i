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
                <h2 class="font-bold text-md">{{ $organization[0]['organization_name'] }} {{ $organization[0]['period_name'] }}</h2>
                <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus
                    deserunt cumque excepturi ex praesentium corrupti eveniet sed sint quibusdam reiciendis?</p>
            </header>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
                @foreach ($organization as $candidate)
                    <div class="bg-white shadow-md rounded-lg text-center space-y-1 p-4">
                        <div class="h-32 bg-gray-200"></div>
                        <h2 class="text-lg font-bold">{{ $candidate->candidate_name }}</h2>
                        <h3 class="text-md font-medium">{{ $candidate->candidate_description }}</h3>
                        <p class="text-sm text-gray-700">{{ $candidate->total }}</p>
                    </div>
                @endforeach
            </div>
        </section>
        @endforeach
    </div>
</x-app-layout>
