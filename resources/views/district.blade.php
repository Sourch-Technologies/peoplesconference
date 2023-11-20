<x-app-layout>

    <x-title>
        District
    </x-title>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Districts') }}
            </h2>
            <x-secondary-button>

                <a href="district/create">
                    Create District
                </a>

            </x-secondary-button>
        </div>

    </x-slot>


    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class=" overflow-hidden  sm:rounded">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @error('error')
                        <x-error>
                            <span class="font-medium">Error!:</span>
                            {{ $message }}.
                        </x-error>
                    @enderror

                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium">Success!</span> {{ session('success') }}.
                        </div>
                    @endif



                    <div class="flex justify-center ">
                        <div class="overflow-auto lg:overflow-visible  w-full p-5">
                            @if ($districts)

                                <div class="grid md:grid-cols-4 gap-3 text-center">
                                    @foreach ($districts as $district)
                                        <div
                                            class="border border-gray-600 rounded p-3 hover:scale-105 duration-200 ease-in-out delay-75 hover:bg-gray-800 cursor-pointer space-y-3">
                                            <h1>{{ $district->name }}</h1>
                                            <p>Constituency : {{ $district->constituencies_count }}</p>

                                            <ul class="flex items-center justify-around">

                                                <li>
                                                    <a href="{{ route('district.show', [$district->id]) }}">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <form id="deleteForm"
                                                        action=""
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>

                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div>
                                    <h1>
                                        No District In Database
                                    </h1>
                                </div>

                            @endif

                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>



</x-app-layout>

