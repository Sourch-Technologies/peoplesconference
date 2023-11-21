<x-app-layout>

    <x-title>
        Constituen
    </x-title>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All District With Constituencies') }}
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
                        <div class="container mx-auto ">
                            <div>


                                @foreach ($constituencies as $constituency)
                                    <div class="rounded overflow-hidden border border-gray-700 my-5">
                                        <!-- accordion-tab  -->
                                        <div class="group outline-none accordion-section" tabindex="1">
                                            <div
                                                class="group bg-gray-900 flex justify-between px-4 py-3 items-center transition ease duration-500 cursor-pointer pr-10 relative">
                                                <div class="group-focus:text-white transition ease duration-500">
                                                    Constituency: {{ $constituency->name }}

                                                </div>
                                                <div
                                                    class="h-8 w-8 border border-gray-700 rounded-full items-center inline-flex justify-center transform transition ease duration-500 group-focus:text-white group-focus:-rotate-180 absolute top-0 right-0 mb-auto ml-auto mt-2 mr-2">
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                            </div>
                                            <div
                                                class="group-focus:max-h-screen max-h-0 bg-gray-800 px-4 overflow-hidden ease duration-500">
                                                <!-- component -->
                                                <!-- This is an example component -->
                                                <div class="mx-auto">

                                                    <div class="flex flex-col">
                                                        <div class="overflow-x-auto">
                                                            <div class="inline-block min-w-full align-middle">
                                                                <div class="overflow-hidden ">
                                                                    <div class="p-2 ">
                                                                        <div class="overflow-x-auto">
                                                                            <table
                                                                                class="min-w-full text-left text-sm font-light">
                                                                                <thead
                                                                                    class="border-b font-medium dark:border-neutral-500">
                                                                                    <tr>
                                                                                        <th scope="col"
                                                                                            class="px-6 py-4">
                                                                                            SNO</th>
                                                                                        <th scope="col"
                                                                                            class="px-6 py-4">
                                                                                            Locality</th>
                                                                                        <th scope="col"
                                                                                            class="px-6 py-4">
                                                                                            Building Location
                                                                                        </th>
                                                                                        <th scope="col"
                                                                                            class="px-6 py-4">
                                                                                            Polling Area</th>
                                                                                        <th scope="col"
                                                                                            class="px-6 py-4">
                                                                                            Total Votes</th>
                                                                                        <th scope="col"
                                                                                            class="px-6 py-4">
                                                                                            Section Names</th>
                                                                                        <th scope="col"
                                                                                            class="px-6 py-4">
                                                                                            Active Members</th>
                                                                                        <th scope="col"
                                                                                            class="px-6 py-4">
                                                                                            Edit</th>
                                                                                        <th scope="col"
                                                                                            class="px-6 py-4">
                                                                                            Delete</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($constituency->pollingStations as $pollingStation)
                                                                                        <tr
                                                                                            class="border-b dark:border-neutral-500">
                                                                                            <td
                                                                                                class="whitespace-nowrap px-6 py-4 font-medium">
                                                                                                {{ $pollingStation->SNO }}
                                                                                            </td>
                                                                                            <td
                                                                                                class="whitespace-nowrap px-6 py-4">
                                                                                                {{ $pollingStation->locality }}
                                                                                            </td>
                                                                                            <td
                                                                                                class="whitespace-nowrap px-6 py-4">
                                                                                                {{ $pollingStation->building_location }}
                                                                                            </td>
                                                                                            <td
                                                                                                class="whitespace-nowrap px-6 py-4">
                                                                                                {{ $pollingStation->polling_area }}

                                                                                            </td>
                                                                                            <td
                                                                                                class="whitespace-nowrap px-6 py-4">
                                                                                                {{ $pollingStation->total_votes }}
                                                                                            </td>
                                                                                            <td
                                                                                                class="whitespace-nowrap px-6 py-4">
                                                                                                <ul>
                                                                                                    <li>
                                                                                                        1.FAZUL
                                                                                                        AABAD
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        2.
                                                                                                        GANAIE
                                                                                                        MOHALLA

                                                                                                    </li>
                                                                                                    <li>
                                                                                                        3.
                                                                                                        HERPORA

                                                                                                    </li>
                                                                                                    <li>
                                                                                                        4.
                                                                                                        GUJARPATI
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
                                                                                            <td
                                                                                                class="whitespace-nowrap px-6 py-4">
                                                                                                Edit</td>
                                                                                            <td
                                                                                                class="whitespace-nowrap px-6 py-4">
                                                                                                Delete</td>
                                                                                        </tr>
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
                                        </div>

                                    </div>
                                @endforeach


                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
