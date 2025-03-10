<x-app-layout>


    <div class="">
        <div class="max-w-7xl sm:px-6  lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4">
                    <div class="">
                        <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Meetings</h2>
                        <p class="text-gray-500 dark:text-white text-sm mb-2">Below is a list of meetings</p>
                    </div>

                    @if(session('success'))
                        <x-success-message title="Success alert!" message="{{ session('success') }}" />
                    @endif
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">

                            <tbody>
                                <tr class="uppercase font-bold border-b bg-white dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-2 py-4">
                                        Meeting Date
                                    </td>
                                    <td class="px-2 py-4">
                                        Start Time
                                    </td>
                                    <td class="px-2 py-4">
                                        End Time
                                    </td>
                                    <!-- <td class="px-2 py-4">
                                        Created By
                                    </td> -->
                                    <td class="px-2 py-4">
                                        Student
                                    </td>
                                    <td class="px-2 py-4">
                                        Supervisor
                                    </td>
                                    <td class="px-2 py-4">
                                        Notes
                                    </td>
                                    <td class="px-2 py-4">
                                        Status
                                    </td>
                                    <td></td>
                                </tr>
                                @foreach ($meetings as $meeting)

                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">


                                        <td class="px-2 py-4">
                                            {{date('D d M Y', strtotime($meeting?->scheduled_date))}}
                                        </td>

                                        <td class="px-2 py-4">
                                            {{ $meeting?->start_time }}
                                        </td>


                                        <td class="px-2 py-4">
                                            {{ $meeting?->end_time }}
                                        </td>
                                        <!-- <td class="px-2 py-4">
                                            <span
                                                class="font-bold text-gray-800">{{ $meeting?->message->sender->name }}</span>
                                            <br />
                                            {{ $meeting?->message->sender->email }}
                                        </td> -->
                                        <td class="px-2 py-4">
                                            <span
                                                class="font-bold text-gray-400">{{ $meeting?->message?->conversation?->student?->firstname }}
                                                {{ $meeting?->message?->conversation?->student?->surname }}</span>
                                            <br />
                                            {{ $meeting?->message?->conversation?->student?->regnum }}
                                        </td>

                                        <td class="px-2 py-4">
                                            <span
                                                class="font-bold text-gray-400">{{ $meeting?->message?->conversation?->supervisor?->name }}</span>
                                            <br />
                                            {{ $meeting?->message?->conversation?->supervisor?->email }}
                                        </td>

                                        <td class="px-2 py-4">
                                            {{ $meeting?->message->message }}
                                        </td>
                                        </td>
                                        <td class="px-2 py-2">
                                            @if($meeting->accepted == 1)
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5  rounded-full  dark:bg-green-900 dark:text-green-300">
                                                    Accepted
                                                </span>
                                            @elseif($meeting->accepted == 0)
                                                <span
                                                    class="bg-gray-300 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5  rounded-full  dark:bg-green-900 dark:text-green-300">
                                                    Pending
                                                </span>
                                            @else
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5  rounded-full  dark:bg-green-900 dark:text-green-300">
                                                    Rejected
                                                </span>
                                            @endif
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