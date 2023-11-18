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
                                
                                <div>
                                    <label for="district"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> District
                                        Name</label>
                                    <input type="text" id="first_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
                                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        id="district" type="text" name="name" value="{{ old('name') }}">

                                    @error('name')
                                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                                    @enderror
                                </div>

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
