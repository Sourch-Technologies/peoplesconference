<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create District') }}
            </h2>
            <x-secondary-button>

                <a href="{{ url('/district') }}">
                    Show Districts
                </a>

            </x-secondary-button>
        </div>

    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden  sm:rounded">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="w-full mx-auto  max-w-3xl" action="{{ url('/district') }}" method="POST">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full ">
                                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                    for="district">
                                    District Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200
                                     text-gray-700 border 
                                     border-red-500 rounded py-3 
                                     px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="district" 
                                    type="text" 
                                    name="name" 
                                    value="{{ old('name') }}">

                                @error('name')
                                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                                @enderror


                            </div>
                            <div class="mt-4">
                                <button type="submit" class="bg-white text-black rounded p-2 hover:bg-gray-200">
                                    Save District
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
