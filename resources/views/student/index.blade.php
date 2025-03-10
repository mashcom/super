<x-app-layout>

    <div class="py-12d">
        <section class=" p-3 sm:p-5">

            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">
                    {{  auth()->user()->is_admin == 1 ? "Placed Students" : "Your Students"}}
                </h2>
                @if(auth()->user()->is_admin != 1)
                    <p class="text-gray-500 font-bold my-2">Below are the students you have access to as a
                        Supervisor,Coordinator or Chairperson</p>
                @else
                    <p class="text-sm my-2 text-white">Below are the students you have access to as the Admin</p>

                @endif


                <div
                    class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-green-900 dark:border-green-700 my-3">
                    <h5 class="mb-4 font-medium text-gray-500 dark:text-gray-100">Students
                    </h5>
                    <div class="flex items-baseline text-gray-900 dark:text-green-400">
                        <span class="text-5xl font-extrabold tracking-tight">{{ count($students) }}</span>
                    </div>
                </div>

                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Search" name="q" required="">
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Reg Number</th>
                                    <th scope="col" class="px-4 py-3">Fullname</th>
                                    <th scope="col" class="px-4 py-3">Programme</th>
                                    <th scope="col" class="px-4 py-3">Level</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)


                                    <tr class="border-b dark:border-gray-700 text-xs  py-3 ">
                                        <td scope="row"
                                            class="px-4 py-3 text-left whitespace-nowrap flex flex-col items-start dark:text-white">
                                            {{$student?->regnum}}

                                        </td>
                                        <td class="px-4 py-3">{{$student->firstname}} {{$student->surname}}</td>
                                        <td class="px-4 py-3">{{$student->programme_details?->name}}</td>
                                        <td class="px-4 py-3">{{$student->academic_year}}:{{$student->semester}}</td>
                                        <!-- <td>

                                                            @if($student?->placement)
                                                                <ul
                                                                    class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                                                    <li>
                                                                        <span class="text-gray-600 dark:text-gray-200 font-bold uppercase ">Company:</span>
                                                                        {{$student?->placement?->name}}
                                                                    </li>
                                                                    <li>
                                                                        <span class="text-gray-600 dark:text-gray-200 font-bold uppercase ">City:</span>
                                                                        {{$student?->placement?->city}}
                                                                    </li>
                                                                    <li>
                                                                        <span class="text-gray-600 dark:text-gray-200 font-bold uppercase ">Country:</span>
                                                                        {{$student?->placement?->country}}
                                                                    </li>
                                                                    <li>
                                                                        <span class="text-gray-600 dark:text-gray-200 font-bold uppercase ">Phone:</span>
                                                                        {{$student?->placement?->telephone}}
                                                                    </li>
                                                                    <li>
                                                                        <span class="text-gray-600 dark:text-gray-200 font-bold uppercase ">Email:</span>
                                                                        {{$student?->placement?->email}}
                                                                    </li>
                                                                </ul>

                                                            @else
                                                                <span
                                                                    class="bg-red-100 text-red-800 text-xs font-bold me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">No
                                                                    Placement</span>
                                                            @endif


                                                        </td> -->

                                        <td class="px-4 py-3 flex items-center justify-end">


                                            <div class="inline-flex rounded-md shadow-sm" role="group">
                                                <a href="{{url("submission?student_id=$student->id&user_id=" . auth()->id())}}"
                                                    type="button"
                                                    class="inline-flex items-center px-4 py-2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                    <!-- <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                        fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z" />
                                                                    </svg> -->

                                                    Messages
                                                </a>

                                                <a href="{{url("student/$student->regnum")}}" type="button"
                                                    class="inline-flex items-center px-4 py-2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">


                                                    More
                                                </a>
                                            </div>


                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                        aria-label="Table navigation">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>