<x-app-layout>

    <x-title>
        District
    </x-title>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Districts') }}
            </h2>
            @can('is_admin')
                <x-secondary-button>

                    <a href="district/create">
                        Create District
                    </a>

                </x-secondary-button>
            @endcan


        </div>

    </x-slot>


    <div class="py-12 p-4">
        <div class=" mx-auto sm:px-4 ">
            <div class=" overflow-hidden  sm:rounded">
                <div class=" text-white">

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
                        <div class="overflow-auto lg:overflow-visible  w-full py-4 px-2">
                            @if ($districts)

                                <div class="grid md:grid-cols-4 gap-3 text-center">
                                    @foreach ($districts as $district)
                                        <div
                                            class="border border-gray-600   rounded p-3 hover:scale-105 duration-200 ease-in-out delay-75 hover:bg-gray-800 cursor-pointer space-y-3">
                                            <h1>{{ $district->name }}</h1>
                                            <a href="{{ route('district.show', [$district->id]) }}">Constituency :
                                                {{ $district->constituencies_count }}</a>

                                            @can('is_admin')
                                                <ul class="flex items-center justify-around">

                                                    <li>
                                                        <a href="{{ route('district.edit', [$district->id]) }}">
                                                            <i class="fa-regular fa-pen-to-square"></i>
                                                    
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <form id="deleteForm"
                                                            action="{{ route('district.destroy', [$district->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            @endcan


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
