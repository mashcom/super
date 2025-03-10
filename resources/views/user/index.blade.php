<x-app-layout>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4 mx-auto">
                    <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">System Users</h2>

                    <a href="{{ route('user.create') }}">
                        <x-button class="my-2 p-4">Add User</x-button>
                    </a>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Chairperson/Coordinator
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Is Admin
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr
                                        class="text-xs odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$user->name}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$user->email}}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($user->chairperson)
                                                Chairperson: {{$user->chairperson?->department?->name}}
                                            @endif
                                            @if($user->coordinator)
                                                Coordinator: {{$user->coordinator?->department?->name}}
                                            @endif
                                        </td>

                                        <td class="px-6 py-4">
                                            {{$user->is_admin ? 'Yes' : 'No'}}
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