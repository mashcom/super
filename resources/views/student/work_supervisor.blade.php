<x-app-layout>


    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4 mx-auto max-w-2xl">
                    <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Manage Work Supervisor</h2>
                    <div id="alert-additional-content-4"
                        class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                        role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <h3 class="text-lg font-medium">Warning</h3>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                           You are about to update work supervisor details for student <span class="font-bold">{{$student->firstname}} {{$student->surname}} registration number {{$student->regnum}}</span>, make sure the details are correct before saving. 
                        </div>
                    </div>
                    <form action="{{url('work_supervisor')}}" method="POST">
                        @csrf
                        <input type="hidden" readonly name="regnum" value="{{$student->regnum}}" />

                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name
                                </label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Type company name" required=""
                                    value="{{ $student?->placement?->work_supervisor?->name}}">
                                @error('name')
                                    <div class="text-red-500 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="designation"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Designation
                                </label>
                                <input type="text" name="designation" id="designation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Type supervisor designation" required=""
                                    value="{{ $student?->placement?->work_supervisor?->designation}}">
                                @error('designation')
                                    <div class="text-red-500 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="company"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
                                <select id="company" name="placement_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected="" value="{{$student?->placement?->id}}">{{$student?->placement?->name}}</option>
                                </select>
                                @error('placement_id')
                                    <div class="text-red-500 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
                                <input type="tel" name="telephone" id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Type company phone number" required=""
                                    value="{{ $student?->placement?->work_supervisor?->telephone}}">
                                @error('telephone')
                                    <div class="text-red-500 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="text" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Type email address" required=""
                                    value="{{ $student?->placement?->work_supervisor?->email}}">
                                @error('email')
                                    <div class="text-red-500 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Save Work Supervisor
                        </button>
                    </form>
                </div>
            </section>
        </div>

    </div>
</x-app-layout>