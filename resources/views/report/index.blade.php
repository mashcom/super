<x-app-layout>


    <div class="">
        <div class="max-w-7xl sm:px-6  lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4">
                    <div class="">
                        <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Quick Statistics</h2>
                        <p class="text-gray-500 dark:text-white text-sm mb-2">Below is a list of quick statistics</p>
                    </div>

                    @if(session('success'))
                        <x-success-message title="Success alert!" message="{{ session('success') }}" />
                    @endif
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        <div class="gride gap-4 xl:grid-cols-2 2xl:grid-cols-3">

                            <div class="my-2 flex">

                                <div
                                    class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                    <h5 class="mb-4 font-medium text-gray-500 dark:text-gray-400">Total Students
                                    </h5>
                                    <div class="flex items-baseline text-gray-900 dark:text-white">
                                        <span class="text-5xl font-extrabold tracking-tight">{{ $students }}</span>
                                    </div>
                                </div>

                                <div
                                    class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-green-900 dark:border-green-700 mx-3">
                                    <h5 class="mb-4 font-medium text-gray-500 dark:text-gray-100">Students with
                                        Supervisors
                                    </h5>
                                    <div class="flex items-baseline text-gray-900 dark:text-green-400">
                                        <span
                                            class="text-5xl font-extrabold tracking-tight">{{ $placed->number_of_student }}</span>
                                    </div>
                                </div>
                                <div
                                    class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-red-800 dark:border-red-700 ">
                                    <h5 class="mb-4 font-medium text-gray-500 dark:text-gray-100">Students
                                        without Supervisors
                                    </h5>
                                    <div class="flex items-baseline text-gray-900 dark:text-red-300">
                                        <span
                                            class="text-5xl font-extrabold tracking-tight">{{  $students - $placed->number_of_student }}</span>
                                    </div>
                                </div>
                            </div>

                            <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md">
                            <caption
                                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-gray-800 dark:bg-gray-200 rounded-t-lg">
                                    Students By Departments
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-600">
                                        Summary of students by their departments</p>
                                </caption>
                                <tbody>
                                    <tr
                                        class="uppercase font-bold border-b bg-gray-200 text-gray-800 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200">
                                        <td class="px-2 py-4">
                                            Department
                                        </td>
                                        <td class="px-2 py-4 text-center">
                                            Students
                                        </td>
                                    </tr>
                                    @foreach ($departments as $department)

                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">


                                            <td class="px-2 py-4 font-bold uppercase">
                                                {{ $department->name }}
                                            </td>
                                            <td class="px-2 py-4 font-bold text-lg text-center px-4">
                                                {{ $department->students }}
                                            </td>


                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>

                            <!-- by faculty -->
                            <table
                                class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
                                <caption
                                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-gray-800 dark:bg-gray-200 rounded-t-lg">
                                    Students By Faculty
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-600">
                                        Summary of students by their faculty</p>
                                </caption>
                                <tbody>
                                    <tr
                                        class="uppercase font-bold border-b bg-gray-200 text-gray-800 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200">
                                        <td class="px-2 py-4">
                                            Department
                                        </td>
                                        <td class="px-2 py-4 text-center">
                                            Students
                                        </td>
                                    </tr>
                                    @foreach ($faculties as $department)

                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">


                                            <td class="px-2 py-4">
                                                {{ $department->name }}
                                            </td>
                                            <td class="px-2 py-4 font-bold text-lg text-center px-4">
                                                {{ $department->students }}
                                            </td>


                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </section>
        </div>

    </div>
</x-app-layout>