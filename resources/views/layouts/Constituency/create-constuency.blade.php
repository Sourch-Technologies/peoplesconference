<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Constituency') }}
            </h2>
            <x-secondary-button>
                View Constituency
            </x-secondary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden  sm:rounded">
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




                    <form>



                        <div class="grid md:grid-cols-2 gap-2">
                            <div class="relative z-0 w-full mb-6 group">

                                <label for="countries"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                    option</label>
                                <select id="countries"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose Constituency</option>
                                    <option value="1">Assembly</option>
                                    <option value="2">Parlimentary</option>
                                    <option value="0">Both</option>
                                </select>


                            </div>
                            <div class="mb-6">
                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Constituency Name:
                                </label>
                                <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
