<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Polling Station') }}
            </h2>
            <x-secondary-button>
                <a href="{{ route('pollingstation.index') }}">
                    View Polling Station....
                </a>
            </x-secondary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden  sm:rounded">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium">Success!</span> {{ session('success') }}.
                        </div>
                    @endif

                    <form action="{{ route('pollingstation.update', [$polling_station->id]) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="SNO" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                SNO:
                            </label>
                            <input type="number" id="SNO" name="SNO" value="{{ $polling_station->SNO }}"
                                class="bg-gray-50 border
                                 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('SNO')
                                <span class="text-red-500">{{ $errors->first('SNO') }}</span>
                            @enderror


                        </div>


                        <div class="grid md:grid-cols-2 gap-2">
                            <div class="mb-6">
                                <label for="locality"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Locality:
                                </label>
                                <input type="text" id="locality" name="locality" value="{{ $polling_station->locality }}"
                                    class="bg-gray-50 border
                                     border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('locality')
                                    <span class="text-red-500">{{ $errors->first('locality') }}</span>
                                @enderror


                            </div>


                            <div class="mb-6">
                                <label for="building_location"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Building Location:
                                </label>
                                <input type="text" id="building_location" name="building_location"
                                    value="{{ $polling_station->building_location }}"
                                    class="bg-gray-50 border
                                     border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('building_location')
                                    <span class="text-red-500">{{ $errors->first('building_location') }}</span>
                                @enderror


                            </div>


                            <div class="mb-6">
                                <label for="polling_area"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Polling Area:
                                </label>
                                <input type="text" id="polling_area" name="polling_area"
                                    value="{{ $polling_station->polling_area }}"
                                    class="bg-gray-50 border
                                     border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('polling_area')
                                    <span class="text-red-500">{{ $errors->first('polling_area') }}</span>
                                @enderror


                            </div>

                            <div class="mb-6">
                                <label for="total_votes"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Total Votes:
                                </label>
                                <input type="number" id="total_votes" name="total_votes"
                                    value="{{ $polling_station->total_votes  }}"
                                    class="bg-gray-50 border
                                     border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('total_votes')
                                    <span class="text-red-500">{{ $errors->first('total_votes') }}</span>
                                @enderror


                            </div>

                        </div>
                        <div class="mb-6">

                            <select id="constituency_id" name="constituency_id"
                                class="bg-gray-50 border
                                 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($constituencies)

                                    <option value="">Select Constituency</option>
                                    @foreach ($constituencies as $constituency)
                                        <option value="{{ $constituency->id }}" {{ $constituency->id ===  $polling_station->constituency_id ? 'selected' : ''  }} >{{ $constituency->name }}</option>
                                    @endforeach
                                @else
                                @endif
                            </select>
                            @error('constituency_id')
                                <span class="text-red-500">{{ $errors->first('constituency_id') }}</span>
                            @enderror

                        </div>


                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
