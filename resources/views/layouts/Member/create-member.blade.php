<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row gap-4  md:items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Member') }}
            </h2>
            <x-secondary-button>
                <a href="{{ route('member.index') }}">
                    View Member
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


                    <!-- component -->
                    <div class=" min-h-screen flex items-center justify-center bg-center">
                        <div class=" bg-black opacity-60 inset-0 z-0"></div>
                        <div class=" w-full space-y-8">
                            <form class="grid  gap-8 grid-cols-1" action="{{ route('member.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-col ">
                                    <div class="flex flex-col sm:flex-row items-center">
                                        <h2 class="font-semibold text-lg mr-auto">Member Detail</h2>
                                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                                    </div>
                                    <div class="mt-5">
                                        <div class="form">
                                            <div class="md:space-y-2 mb-3">
                                                <div class="flex items-center py-6">
                                                    <div
                                                        class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                                        @auth
                                                            <img class="w-12 h-12 mr-4 object-cover" src=""
                                                                alt="">
                                                        @endauth
                                                    </div>
                                                    <label class="cursor-pointer ">
                                                        <span id="photo"
                                                            class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Browse</span>
                                                        <input type="file" class="hidden" name="photo">
                                                    </label>
                                                    <p class="text-red-600">{{ $errors->first('photo') }}</p> 

                                                </div>
                                            </div>
                                            {{-- '','','phone','','is_Active','photo','section_id' --}}
                                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                                <div class="mb-3 space-y-2 w-full text-xs">
                                                    <label class="font-semibold  py-2" for="name">Member
                                                        Name</label>
                                                    <input placeholder="Member Name"
                                                        class="bg-gray-50 border
                                                        border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        type="text" name="name" id="name"
                                                        value="{{ old('name') }}">
                                                    <p class="text-red-600">{{ $errors->first('name') }}</p>
                                                </div>
                                                <div class="mb-3 space-y-2 w-full text-xs">
                                                    <label class="font-semibold  py-2" for="email">
                                                        Email <abbr title="required"></label>
                                                    <input placeholder="Email ID"
                                                        class="bg-gray-50 border
                                                        border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        type="email" name="email" id="email"
                                                        value="{{ old('email') }}">
                                                    <p class="text-red-600">{{ $errors->first('email') }}</p>

                                                </div>
                                            </div>

                                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">

                                                <div class="w-full flex flex-col mb-3">
                                                    <label class="font-semibold  py-2" for="gender">Gender<abbr
                                                            title="required"></label>
                                                    <select
                                                        class="bg-gray-50 border
                                                        border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                                                        name="gender" id="gender">
                                                        <option value="">Gender</option>
                                                        <option value="M">Male</option>
                                                        <option value="F">Female</option>
                                                        <option value="O">Other</option>
                                                    </select>
                                                    <p class="text-red-600">{{ $errors->first('gender') }}</p>

                                                </div>
                                                <div class=" space-y-2 w-full text-xs pt-2">
                                                    <label class="font-semibold  py-2" for="phone">
                                                        Phone Number <abbr title="required"></label>
                                                    <input placeholder="phone ID"
                                                        class="bg-gray-50 border
                                                        border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        type="number" name="phone" id="phone"
                                                        value="{{ old('phone') }}">
                                                    <p class="text-red-600">{{ $errors->first('phone') }}</p>

                                                </div>

                                            </div>
                                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">

                                                <div class="w-full flex flex-col mb-3">
                                                    <label class="font-semibold  py-2" for="section_name_id">Section
                                                        Name<abbr title="required"></label>
                                                    <select
                                                        class="bg-gray-50 border
                                                        border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        name="section_name_id" id="section_name_id">
                                                        <option value="">Select Section Names</option>
                                                        @if ($sectionNames)
                                                            @foreach ($sectionNames as $sectionName)
                                                                <option value="{{ $sectionName->id }}">
                                                                    {{ $sectionName->name }}</option>
                                                            @endforeach
                                                        @else
                                                        @endif
                                                    </select>
                                                    <p class="text-red-600">{{ $errors->first('section_name_id') }}
                                                    </p>

                                                </div>
                                            </div>

                                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                                <button type="submit"
                                                    class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>


