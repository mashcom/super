<x-app-layout>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4 mx-auto">
                    <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Departments</h2>


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Chairperson
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Coordinator
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$department->name}}
                                        </th>
                                        <td class="px-6 py-4 text-xs">
                                            <span class="font-bold">{{$department->chairperson?->user?->name}}</span>
                                            <br />
                                            <span>{{$department->chairperson?->user?->email}}</span>

                                        </td>

                                        <td class="px-6 py-4 text-xs">
                                            <span class="font-bold">{{$department->coordinator?->user?->name}}</span>
                                            <br />
                                            <span>{{$department->coordinator?->user?->email}}</span>

                                        </td>

                                        <td class="">
                                            <a class="text-xs" href="{{ route('department.edit', $department->id) }}">
                                                <x-secondary-button>
                                                    More Details
                                                </x-secondary-button>
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