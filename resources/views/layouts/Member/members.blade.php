<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All Members') }}
            </h2>
            <x-secondary-button>

                <a href="{{ route('member.create') }}">
                    Create Member
                </a>
            </x-secondary-button>
        </div>
    </x-slot>



    <div class="py-12">
        <div class=" mx-auto sm:px-4 ">
            <div class=" overflow-hidden  sm:rounded">
                <div class=" text-gray-900 dark:text-gray-100">

                    @if ($districts)


                        <div class="container mx-auto dark:text-gray-100">


                            @if (session('success'))
                                <x-error>
                                    <span class="font-medium">Success::</span>
                                    {{ session('success') }}
                                </x-error>
                            @endif


                            <div class="overflow-x-auto">
                                <table class="w-full p-6 text-xs text-left whitespace-nowrap">
                                    <colgroup>
                                        <col class="w-5">
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col class="w-5">
                                    </colgroup>
                                    <thead>
                                        <tr class="dark:bg-gray-700">
                                            <th class="p-3">Image</th>
                                            <th class="p-3">Name</th>
                                            <th class="p-3">Email</th>
                                            <th class="p-3">Phone</th>
                                            <th class="p-3">Gender</th>
                                            <th class="p-3">Section Name</th>
                                            <th class="p-3">Locality</th>
                                            <th class="p-3">Polling Station</th>
                                            <th class="p-3">Constituency</th>
                                            <th class="p-3">District</th>
                                            <th class="p-3">
                                                Edit
                                            </th>
                                            <th>
                                                Delete
                                            </th>
                                        </tr>
                                    </thead>

                                    @foreach ($districts as $district)
                                        @foreach ($district->constituencies as $constituency)
                                            @foreach ($constituency->pollingstations as $pollingstation)
                                                @foreach ($pollingstation->sectionnames as $sectionname)
                                                    @foreach ($sectionname->members as $member)
                                                        <tbody class="border-b dark:bg-gray-900 dark:border-gray-700 ">
                                                            <tr>
                                                                <td
                                                                    class="px-3 text-2xl font-medium dark:text-gray-400">
                                                                    <img class="w-7 h-7 rounded-full"
                                                                        src="storage/photos/{{ $member->photo }}"
                                                                        alt="">
                                                                </td>
                                                                <td class="px-3 py-2">
                                                                    <p>{{ $member->name }}</p>
                                                                </td>
                                                                <td class="px-3 py-2">

                                                                    <a href="mailto:{{ $member->email }}"
                                                                        class="dark:text-gray-400">{{ $member->email }}</a>
                                                                </td>
                                                                <td class="px-3 py-2">
                                                                    <a
                                                                        href="tel:{{ $member->phone }}">{{ $member->phone }}</a>
                                                                </td>
                                                                <td class="px-3 py-2">
                                                                    <p>{{ $member->gender }}</p>
                                                                </td>
                                                                <td class="px-3 py-2">

                                                                    <p class="dark:text-gray-400">
                                                                        {{ $sectionname->name }}</p>

                                                                </td>
                                                                <td class="px-3 py-2">


                                                                    <p class="dark:text-gray-400">
                                                                        {{ $pollingstation->locality }}</p>

                                                                </td>
                                                                <td class="px-3 py-2">


                                                                    <p class="dark:text-gray-400">
                                                                        {{ $pollingstation->polling_area }}</p>

                                                                </td>
                                                                <td class="px-3 py-2">


                                                                    <p class="dark:text-gray-400">
                                                                        {{ $constituency->name }}
                                                                    </p>

                                                                </td>
                                                                <td class="px-3 py-2">


                                                                    <p class="dark:text-gray-400">
                                                                        {{ $district->name }}
                                                                    </p>

                                                                </td>

                                                                <td>
                                                                    <a
                                                                        href="{{ route('member.edit', [$member->id]) }}">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <form
                                                                        action="{{ route('member.destroy', [$member->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>

                                                            </tr>

                                                        </tbody>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach




                                </table>
                            </div>
                        </div>
                    @else
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
