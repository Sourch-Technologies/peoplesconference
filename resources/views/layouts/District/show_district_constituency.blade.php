<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                @if ($district)
                    District {{ $district->name }} With Constituencies
                @endif
            </h2>
            <x-secondary-button>
                <a href="{{ route('district.index') }}">
                    View Districts
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
                                               
                                                <th scope="col" class="px-6 py-4">Constituency</th>
                                                <th scope="col" class="px-6 py-4">Constituency Type</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($district)
                                                @foreach ($district->constituencies as $constituency)
                                                    <tr class="border-b dark:border-neutral-500">
                                                      

                                                        <td class="whitespace-nowrap px-6 py-4">
                                                            {{ $constituency->name }}
                                                        </td>
                                                       
                                                    </tr>
                                                @endforeach
                                            @else
                                            @endif


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
