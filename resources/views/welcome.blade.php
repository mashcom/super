<x-guest-layout>

    <div
        class="bg-gray-200 relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center selection:bg-red-500 selection:text-white">


        <div class="max-w-7xl mx-auto">

            <div class="mt-16">
                <div class="py-8 sm:py-32  rounded mb-4 rounded-lg">
                    <div class="mx-auto grid max-w-7xl gap-20 px-6 lg:px-8 xl:grid-cols-3">
                        <div class="max-w-xl">
                            <h2 class="text-3xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-4xl">
                                Select Role</h2>
                            <p class="mt-6 text-lg/8 text-gray-600">Please select your role from the options below to
                                customize your application experience.</p>
                        </div>
                        <ul role="list" class="grid gap-x-8 gap-y-2 sm:grid-cols-2 sm:gap-y-4 xl:col-span-2">
                            @foreach(["Parent", "Student", "Head", "Accounts", "Teacher", "Admissions Office"] as $role)
                                <li
                                    class="hover:shadow-lgd bg-gray-100 shadow-sm p-4 rounded-lg border-2 hover:border-indigo-300">
                                    <a href="{{url('login')}}" class="flex items-center gap-x-6">
                                        <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-200 dark:ring-gray-200"
                                            src="{{asset($role)}}.png" alt="Bordered avatar">

                                        <div>
                                            <h3
                                                class="text-base/7 font-semibold tracking-tight text-gray-600 hover:text-indigo-600 ">
                                                {{$role}}
                                            </h3>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            <!-- <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm sm:text-left">
                        &nbsp;
                    </div>

                    <div class="text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div> -->
        </div>
    </div>
</x-guest-layout>