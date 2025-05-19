<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidate Details') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-5">
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

        @if (session('error'))
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center p-4 mb-4 bg-red-500 text-white rounded-2xl">
                    <i class="fa-solid fa-circle-check"></i>
                    <div class="ml-3 text-sm font-reguler">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="max-w-7xl lg:mx-auto mx-5 sm:px-6 lg:px-8 space-y-6">

            <div class="flex gap-5">
                <div class="mt-4 w-32">
                    <a href="{{ route('candidates.index') }}"
                        class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-sky-100 border border-dashed border-sky-500 text-sky-500 pl-4 pr-4 pt-2"><span>Back</span></a>
                </div>
                <div class="mt-4 w-36">
                    <a href="{{ route('candidatedetails.create') }}"
                        class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-emerald-100 border border-dashed border-emerald-500 text-emerald-500 pl-4 pr-4 pt-2"><span>Create</span></a>
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                                DESCRIPTION
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                ACTION
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($candidatedetails as $key => $candidate)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 text-center">
                                    {{ $key + 1 }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $candidate->name }}
                                </td>
                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                    {{ $candidate->description }}
                                </td>
                                <td class="px-6 py-4 flex gap-2 items-center justify-center">
                                    <a href="{{ route('candidatedetails.edit', $candidate->id) }}"
                                        class="mr-2 hover:bg-amber-100 text-amber-600 pr-3 pl-3 py-[11px] rounded-xl text-xs border-2 border-dashed border-amber-600"><i
                                            class="fa-solid fa-edit"></i></a>
                                    <form action="{{ route('candidatedetails.destroy', $candidate->id) }}"
                                        method="POST" class="inline"
                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="border-2 border-dashed border-red-500 text-red-500 hover:bg-red-100 px-3 py-1 rounded-xl h-10 w-10 text-xs"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
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
    </div>
</x-app-layout>
