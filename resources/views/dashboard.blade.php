<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Gallery') }}
            </h2>
            <x-secondary-button>
                home
            </x-secondary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden  sm:rounded">
                <div class="">
                    
                
                    <h1 class="text-white p-2">In Development</h1>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
