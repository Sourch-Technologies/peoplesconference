<x-app-layout>

    <x-title>
        Constituency
    </x-title>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Districts') }}
            </h2>
            <x-secondary-button>

                <a href="constituency/create">
                    Create Constituency
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
                          
                            

                        </div>
                    
                    </div>
               



                </div>
            </div>
        </div>
    </div>



</x-app-layout>
<script src="{{ asset('JS/district.js') }}"></script>