<x-app-layout>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4 mx-auto max-w-2xl">
                    <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Manage Placement Details</h2>
                    <div id="alert-additional-content-4"
                        class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-gray-300 dark:border-yellow-800"
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
                           You are about to update placement details for student <span class="font-bold">{{$student->firstname}} {{$student->surname}} registration number {{$student->regnum}}</span>, make sure the details are correct before saving. 
                        If the student is not on Work Related Learning. Tick the check box and Click "Submit Non WRL Placemement"
                        <form action="{{url('placement')}}" method="POST">
                            <br/>
                            <input type="hidden" readonly name="regnum" value="{{$student->regnum}}" />
                            <x-checkbox name="on_wrl"></x-checkbox><span class="text-red-500 font-bold">Yes, student is not on Work Related Learning</span>
                            <br/>
                            <x-button class="mt-2" role="submit">Submit Non WRL Placemement</x-button>
                        </form>
                        
                        </div>
                    </div>
                    <form action="{{url('placement')}}" method="POST">
                        @csrf
                        <input type="hidden" readonly name="regnum" value="{{$student->regnum}}" />
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Name</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type company name" value="{{$student?->placement?->name}}" >
                                @error('name')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                                <select id="category" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Select country</option>
                                    @foreach (config('app.countries') as $country)
                                        <option @if($country == $student?->placement?->country) selected @endif>{{$country}}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                                <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type city name" value="{{$student?->placement?->city}}" >
                                @error('city')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="physical_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Physical Address</label>
                                <textarea name="physical_address" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Company Physical Address">{{$student?->placement?->physical_address}}</textarea>
                                @error('physical_address')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
                                <input type="tel" name="telephone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type company phone number" value="{{$student?->placement?->telephone}}" >
                                @error('telephone')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type email address" value="{{$student?->placement?->email}}" >
                                @error('email')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                                <input type="tel" name="website" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type company website address" value="{{$student?->placement?->website}}">
                                @error('website')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Engagement</label>
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker id="default-datepicker" type="text" name="date_of_engagement" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" value="{{ date('d/m/Y', strtotime($student?->placement?->date_of_engagement)) }}">
                                </div>
                                @error('date_of_engagement')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Save Placement
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>