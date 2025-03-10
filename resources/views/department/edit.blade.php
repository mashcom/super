<x-app-layout>


    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4 mx-auto">
                    <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Edit Department</h2>
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
                            You are about to update details for department: <span
                                class="font-bold">{{$department->name}}
                        </div>
                    </div>
                    <div
                        class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-md font-bold leading-none text-gray-900 dark:text-white">
                                Chairperson: {{ $department->name }}
                            </h5>

                        </div>
                        <div class="flow-root">


                            @if($department?->chairperson?->user)
                                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <img class="w-8 h-8 rounded-full"
                                                    src="{{$department?->chairperson?->user?->profile_photo_url }}"
                                                    alt="Neil image">
                                            </div>
                                            <div class="flex-1 min-w-0 ms-4">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    {{$department?->chairperson?->user?->name }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{$department?->chairperson?->user?->email }}
                                                </p>
                                            </div>
                                            <div
                                                class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @else
                                <p class="font-bold text-red-300 bg-red-900 py-2 px-4 rounded-lg my-3">
                                    <svg class="w-[28px] h-[28px] text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    No allocated chairperson found!
                                </p>
                            @endif


                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-md font-bold leading-none text-gray-900 dark:text-white">
                                Coordinator: {{ $department->name }}
                            </h5>

                        </div>
                        <div class="flow-root">
                            @if($department?->coordinator?->user)
                                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <img class="w-8 h-8 rounded-full"
                                                    src="{{$department?->coordinator?->user?->profile_photo_url }}"
                                                    alt="Neil image">
                                            </div>
                                            <div class="flex-1 min-w-0 ms-4">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    {{$department?->coordinator?->user?->name }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{$department?->coordinator?->user?->email }}
                                                </p>
                                            </div>
                                            <div
                                                class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @else
                                <p class="font-bold text-red-300 bg-red-900 py-2 px-4 rounded-lg my-3">
                                    <svg class="w-[28px] h-[28px] text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    No allocated coordinator found!
                                </p>
                            @endif
                        </div>
                    </div>
                    <div
                        class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 mt-6">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-md font-bold leading-none text-gray-900 dark:text-white">Choose New

                            </h5>

                        </div>
                        <div class="flow-root">
                            <x-validation-errors></x-validation-errors>
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($users as $user)

                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <img class="w-8 h-8 rounded-full" src="{{$user?->profile_photo_url}}" />
                                            </div>
                                            <div class="flex-1 min-w-0 ms-4">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    {{$user?->name }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{$user?->email }}
                                                </p>
                                            </div>
                                            <div
                                                class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">

                                                @if(!$user->is_chairperson && !$user->is_coordinator)
                                                    <a href="{{url("department_chairperson?department_id=$department->id&user_id=$user->id")}}"
                                                        class="mx-2">
                                                        <x-secondary-button> <svg class="w-5 h-5 mr-2"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M5 13l4 4L19 7" />
                                                            </svg>
                                                            Assign as Chairperson</x-secondary-button>

                                                    </a>

                                                    <a
                                                        href="{{url("department_coordinator?department_id=$department->id&user_id=$user->id")}}">
                                                        <x-secondary-button> <svg class="w-5 h-5 mr-2"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M5 13l4 4L19 7" />
                                                            </svg>
                                                            Assign as Coordinator</x-secondary-button>

                                                    </a>

                                                @endif  
                                          </div>
                                        </div>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </section>
        </div>

    </div>
</x-app-layout>