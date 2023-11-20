<x-app-layout>

    <x-title>
        Constituency
    </x-title>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Constituencies') }}
            </h2>
            <x-secondary-button>

                <a href="{{ route('constituency.create') }}">
                    Create Constituency
                </a>

            </x-secondary-button>
        </div>

    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class=" overflow-hidden  sm:rounded">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('error'))
                        <x-error>
                            <span class="font-medium">Error!:</span>
                            {{ session('error') }}
                        </x-error>
                    @endif


                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium">Success!</span> {{ session('success') }}.
                        </div>
                    @endif


                    <div class="flex justify-center ">
                        <div class="overflow-auto lg:overflow-visible  w-full p-5">

                            @if ($districts && $districts->count() > 0)
                                @foreach ($districts as $district)
                                    <p class="text-red-500">Distrct: {{ $district->name }}</p>
                                    @foreach ($district->constituencies as $constituencies)
                                        <p>{{ $constituencies->name }}</p>
                                        <a href="{{ route('constituency.edit', [$constituencies->id]) }}">Edit</a>

                                        <form action="{{ route('constituency.destroy', [$constituencies->id]) }}"
                                            method="POST" id="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    @endforeach
                                @endforeach
                            @else
                                <h1 class="text-red-600 text-2xl">No Constituency! Please Add Constituency</h1>
                            @endif

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

