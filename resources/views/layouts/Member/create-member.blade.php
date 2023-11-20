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



                    is_Active

                    constituency_id

                    <!-- component -->
                    <div class=" min-h-screen flex items-center justify-center bg-center items-center">
                        <div class=" bg-black opacity-60 inset-0 z-0"></div>
                        <div class=" w-full space-y-8">
                            <form class="grid  gap-8 grid-cols-1">
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
                                                        <img class="w-12 h-12 mr-4 object-cover"
                                                            src="https://images.unsplash.com/photo-1611867967135-0faab97d1530?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1352&amp;q=80"
                                                            alt="Avatar Upload">
                                                    </div>
                                                    <label class="cursor-pointer ">
                                                        <span
                                                        id="photo"
                                                            class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Browse</span>
                                                        <input type="file" class="hidden"
                                                            name="photo">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                                <div class="mb-3 space-y-2 w-full text-xs">
                                                    <label class="font-semibold text-gray-600 py-2">Member Name <abbr
                                                            title="required">*</abbr></label>
                                                    <input placeholder="Company Name"
                                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                     type="text" name="name"
                                                        id="integration_shop_name">
                                                    <p class="text-red text-xs hidden">Please fill out this field.</p>
                                                </div>
                                                <div class="mb-3 space-y-2 w-full text-xs">
                                                    <label class="font-semibold text-gray-600 py-2"> Email <abbr
                                                            title="required">*</abbr></label>
                                                    <input placeholder="Email ID"
                                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                        required="required" type="email" name="email"
                                                        id="integration_shop_name">
                                                    <p class="text-red text-xs hidden">Please fill out this field.</p>
                                                </div>
                                            </div>

                                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                                <div class="w-full flex flex-col mb-3">
                                                    <label class="font-semibold text-gray-600 py-2">Gender</label>
                                                    <input placeholder="Address"
                                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                        type="text" name="gender"
                                                        id="integration_street_address">
                                                </div>
                                                <div class="w-full flex flex-col mb-3">
                                                    <label class="font-semibold text-gray-600 py-2">Gender<abbr
                                                            title="required">*</abbr></label>
                                                    <select
                                                        class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                                                        required="required" name="integration[city_id]"
                                                        id="integration_city_id">
                                                        <option value="">Seleted location</option>
                                                        <option value="M">Male</option>
                                                        <option value="F">Female</option>
                                                        <option value="O">Other</option>
                                                    </select>
                                                    <p class="text-sm text-red-500 hidden mt-3" id="error">Please
                                                        fill out this field.</p>
                                                </div>
                                            </div>
                                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">

                                                <div class="w-full flex flex-col mb-3">
                                                    <label class="font-semibold text-gray-600 py-2"
                                                    for="constituency_id">Constituency<abbr
                                                            title="required">*</abbr></label>
                                                    <select
                                                        class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                                                        required="required" name="constituency_id"
                                                        id="constituency_id">
                                                        <option value="">Select Constituency</option>
                                                    </select>
                                                    <p class="text-sm text-red-500 hidden mt-3" id="error">Please
                                                        fill out this field.</p>
                                                </div>
                                            </div>
                                            <p class="text-xs text-red-500 text-right my-3">Required fields are marked
                                                with an
                                                asterisk <abbr title="Required field">*</abbr></p>
                                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                                <button type="submit"
                                                    class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Save</button>
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
</x-app-layout>
