<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div>
            <h2 class="font-bold">Perhitungan Jumlah</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Faculty</th>
                        <th>Name</th>
                        <th>Head</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cardvotes as $key => $vardvote)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $vardvote[0]['organization']['name'] }}</td>
                        <td>{{ $vardvote[0]['user']['name'] }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6">Not found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
           </div>
        </div>
    </div>
</x-app-layout>
