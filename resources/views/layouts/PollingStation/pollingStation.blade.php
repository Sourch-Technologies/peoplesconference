<x-app-layout>

    <x-title>
        Polling Station
    </x-title>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('All Polling Stations With Constituencies') }}
            </h2>
            @can('is_admin')
                <x-secondary-button>
                    <a href="{{ route('pollingstation.create') }}">
                        Create Polling Station
                    </a>

                </x-secondary-button>
            @endcan
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


                    <div class="flex justify-center text-white">
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
                                                                                        @can('is_admin')
                                                                                            <th scope="col"
                                                                                                class="px-6 py-4">
                                                                                                Edit</th>
                                                                                            <th scope="col"
                                                                                                class="px-6 py-4">
                                                                                                Delete</th>
                                                                                        @endcan

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
                                                                                                    @foreach ($pollingStation->sectionnames as $sectionname)
                                                                                                        <li>
                                                                                                            {{ $sectionname->name }}
                                                                                                        </li>
                                                                                                    @endforeach


                                                                                                </ul>
                                                                                            </td>
                                                                                            <td>
                                                                                                <ul>
                                                                                                    @foreach ($pollingStation->sectionnames as $sectionname)
                                                                                                        <li>
                                                                                                            {{ $sectionname->members_count }}

                                                                                                        </li>
                                                                                                    @endforeach

                                                                                                </ul>
                                                                                            </td>
                                                                                            @can('is_admin')
                                                                                                <td
                                                                                                    class="whitespace-nowrap px-6 py-4">
                                                                                                    <a
                                                                                                        href="{{ route('pollingstation.edit', [$pollingStation->id]) }}">
                                                                                                        <i
                                                                                                            class="fa-solid fa-pen-to-square"></i>

                                                                                                    </a>
                                                                                                </td>
                                                                                                <td
                                                                                                    class="whitespace-nowrap px-6 py-4">
                                                                                                    <form
                                                                                                        action="{{ route('pollingstation.destroy', [$pollingStation->id]) }}"
                                                                                                        method="POST">
                                                                                                        @csrf
                                                                                                        @method('DELETE')
                                                                                                        <button
                                                                                                            type="submit">

                                                                                                            <i
                                                                                                                class="fa-solid fa-trash"></i>
                                                                                                        </button>

                                                                                                </td>
                                                                                                </form>
                                                                                            @endcan
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
