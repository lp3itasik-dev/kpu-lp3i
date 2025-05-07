<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Candidate Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('candidates.index') }}">Back</a>
            <form action="{{ route('candidatedetails.update', $candidatedetail->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div>
                    <label for="candidate_id">Candidate</label>
                    <select name="candidate_id" id="candidate_id">
                        @foreach ($candidates as $candidate)
                            <option value="{{ $candidate->id }}">{{ $candidate->name }} ({{ $candidate->period->name }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $candidatedetail->name }}" required>
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" value="{{ $candidatedetail->description }}" required>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
