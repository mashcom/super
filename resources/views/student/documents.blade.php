<x-app-layout>


    <div class="">
        <div class="max-w-7xl sm:px-6  lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4">
                    <div class="">
                        <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Uploaded Files</h2>
                        <p class="text-gray-500 dark:text-white text-sm mb-2">Below is a list of files you uploaded wich
                            were at least accepeted by your supervisor</p>
                    </div>

                    @if(session('success'))
                        <x-success-message title="Success alert!" message="{{ session('success') }}" />
                    @endif
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">

                            <tbody>
                                <tr class="uppercase font-bold border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-2 py-4">
                                        Name
                                    </td>
                                    <td class="px-2 py-4">
                                        Supervisor
                                    </td>
                                    <td class="px-2 py-4">
                                        Coordinator
                                    </td>

                                    <td class="px-2 py-4">
                                        Chairperson
                                    </td>
                                    <td></td>
                                </tr>




                                <!--  FILES -->
                                @if($conversation?->messages)

                                    @foreach ($conversation?->messages as $message)
                                        @if($message?->document)

                                            <tr
                                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                <td class="px-2 py-2">
                                                    {{$message?->document->file_name}}
                                                    <br />
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-medium m-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">
                                                        {{$message?->document->document_type}}
                                                    </span>

                                                </td>
                                                <!-- 
                                                                                                            <td>
                                                                                                                {{$message?->document->description}}
                                                                                                            </td> -->
                                                <td class="px-2 py-2">
                                                    @if($message?->document?->accepted == 1)
                                                        <span
                                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5  rounded-full  dark:bg-green-900 dark:text-green-300">
                                                            Accepted
                                                        </span>
                                                    @elseif($message?->document?->accepted == 2)
                                                        <span
                                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5  rounded-full dark:bg-red-900 dark:text-red-300">
                                                            Rejected
                                                        </span>
                                                    @else
                                                        <span
                                                            class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5  rounded-full  dark:bg-gray-700 dark:text-gray-300">
                                                            Pending
                                                        </span>
                                                    @endif
                                                </td>

                                                @foreach (["Coordinator", "Chairperson"] as $level)
                                                    <td class="px-2 py-2">
                                                        {{$message?->document?->acceptance?->where("type", $level)?->first()?->comment}}

                                                        <p>
                                                            @if($message?->document?->acceptance?->where("type", $level)?->first()?->status)
                                                                @if($message?->document?->acceptance?->where("type", $level)?->first()?->status == "Accepted")

                                                                    <span
                                                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5  rounded-full  dark:bg-green-900 dark:text-green-300">
                                                                        {{$message?->document?->acceptance?->where("type", $level)?->first()?->status}}
                                                                    </span>
                                                                @else
                                                                    <span
                                                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5  rounded-full dark:bg-red-900 dark:text-red-300">
                                                                        {{$message?->document?->acceptance?->where("type", $level)?->first()?->status}}
                                                                    </span>
                                                                @endif

                                                            @else

                                                                <span
                                                                    class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5  rounded-full  dark:bg-gray-700 dark:text-gray-300">
                                                                    Pending
                                                                </span>
                                                            @endif


                                                    </td>


                                                @endforeach

                                                <td>
                                                    <a href="{{url($message?->document?->file_path)}}" target="_blank"
                                                        class="font-bold text-white">Download</a>
                                                </td>
                                            </tr>


                                        @endif
                                    @endforeach
                                @endif

                            </tbody>
                        </table>





                    </div>

                </div>
            </section>
        </div>

    </div>
</x-app-layout>