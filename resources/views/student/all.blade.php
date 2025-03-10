<x-app-layout>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8w h-full">
        <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">All Students</h2>
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
                                        placeholder="Search" name="regnum" required="">
                                </div>
                            </form>
                        </div>
                       
                    </div>
            <section class="dark:bg-gray-900">
                <div class="px-4 mx-auto">
                    
                 


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Reg Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Surname
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Firstname
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sex
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Programme
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Level
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)


                                    <tr
                                        class="text-xs odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$student->regnum}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$student->surname}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$student->firstname}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$student->sex}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$student->programme_details?->name}}
                                        </td>
                                        <td class="px-4 py-3">{{$student->academic_year}}:{{$student->semester}}</td>
                                      

                                        <td class="">
                                            <a href="{{route('student.show', $student->regnum)}}">
                                                <x-button>Open</x-button>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>
        </div>
    </div>
</x-app-layout>