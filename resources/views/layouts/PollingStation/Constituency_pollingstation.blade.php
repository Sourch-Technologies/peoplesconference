<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               {{$constituencies->name}} {{ __('Constituency With Polling Stations') }}
            </h2>
            <x-secondary-button>
                <a href="{{ route('pollingstation.create') }}">
                    Create Polling Station
                </a>
            </x-secondary-button>
        </div>
    </x-slot>




    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden  sm:rounded">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <div class="flex flex-col overflow-x-auto">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">SNO</th>
                                                <th scope="col" class="px-6 py-4">Locality</th>
                                                <th scope="col" class="px-6 py-4">Building Location</th>
                                                <th scope="col" class="px-6 py-4">Polling Area</th>
                                                <th scope="col" class="px-6 py-4">Total Votes</th>
                                                <th scope="col" class="px-6 py-4">Section Names</th>
                                                <th scope="col" class="px-6 py-4">Active Members</th>
                                                <th scope="col" class="px-6 py-4">Edit</th>
                                                <th scope="col" class="px-6 py-4">Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($constituencies->pollingStations as $pollingStation)
                                                {{-- @foreach ($constituency->pollingStations as $pollingstation) --}}
                                                    <tr class="border-b dark:border-neutral-500">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                            {{ $pollingStation->SNO }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ $pollingStation->locality }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{$pollingStation->building_location}}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{$pollingStation->polling_area}}
                                                            
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{$pollingStation->total_votes}}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            <ul>
                                                                <li>
                                                                    1.FAZUL AABAD
                                                                </li>
                                                                <li>
                                                                    2. GANAIE MOHALLA

                                                                </li>
                                                                <li>
                                                                    3. HERPORA

                                                                </li>
                                                                <li>
                                                                    4. GUJARPATI
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                <li>1</li>
                                                                <li>2</li>
                                                                <li>3</li>
                                                                <li>4</li>
                                                            </ul>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4">Edit</td>
                                                        <td class="whitespace-nowrap px-6 py-4">Delete</td>
                                                    </tr>
                                                {{-- @endforeach --}}
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
