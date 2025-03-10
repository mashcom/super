<x-app-layout>
@php
                                            
                                            $user_role = App\Models\User::with('chairperson.department', 'coordinator.department')->findOrFail(auth()->user()->id);

                                            @endphp

    <div class="">
        <div class="max-w-7xl sm:px-6  lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4">
                    <div class="flex justify-between">
                        <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Manage Placement Details</h2>

                    </div>

                    @if(session('success'))
                        <x-success-message title="Success alert!" message="{{ session('success') }}" />
                    @endif

                    @if($student?->placement?->on_wrl==1)
                        <x-success-message title="WRL Status" message="This student is not Work Related Learning" />
                        @if(auth()->user()->is_admin == 1)
                                            <a href="{{url("student/$student->regnum/edit")}}" type="button" class="my-2">
                                                <x-button>
                                                    <svg class="w-4 h-4 text-gray-800 dark:text-white text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                    </svg>
                                                    Update Placement Details
                                                </x-button>
                                            </a>
                                        @endif
                        @endif

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
                       
                        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">

                            <tbody>
                                <tr class="border-b bg-gray-200">
                                    <td class="px-6 w-1/4 py-4 font-bold text-gray-800" colspan="4">
                                        PERSONAL DETAILS
                                    </td>

                                </tr>
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 w-1/4 py-4">
                                        Registration Number
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student->regnum}}
                                    </td>
                                    <td class="px-6 w-1/4 py-4">
                                        Sex
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student->sex}}
                                    </td>
                                </tr>

                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 w-1/4 py-4">
                                        Fistname(s)
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student->firstname}}
                                    </td>
                                    <td class="px-6 w-1/4 py-4">
                                        Surname
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student->surname}}
                                    </td>
                                </tr>

                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 w-1/4 py-4">
                                        Programme
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student->programme_details?->name}}
                                    </td>
                                    <td class="w-1/4"></td>
                                    <td class="w-1/4"></td>
                                </tr>
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 w-1/4 py-4">
                                        Department
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student->programme_details?->department?->name}}
                                    </td>
                                    <td class="w-1/4"></td>
                                    <td class="w-1/4"></td>
                                </tr>
                                <tr class="border-b bg-gray-200">
                                    <td class="px-6 w-1/4 py-4 font-bold text-gray-800" colspan="3">
                                        PROJECT DETAILS
                                    </td>
                                    <td class="text-right">
                                    @if(auth()->user()->is_admin == 1 ||  $user_role->coordinator  || $user_role->chairperson)
                                            <a href="{{route("placement_project.edit",$student?->placement?->id)}}" type="button" class="mx-2">
                                                <x-button>
                                                    <svg class="w-4 h-4 text-gray-800 dark:text-white text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                    </svg>
                                                    Edit Project Details
                                                </x-button>
                                            </a>
                                        @endif
                                    </td>

                                </tr>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 w-1/4 py-4">
                                        Project Title
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student->placement?->project?->title}}
                                    </td>
                                    <td class=""></td>
                                    <td class=""></td>
                                </tr>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 w-1/4 py-4">
                                        Project Type
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student->placement?->project?->type}}
                                    </td>
                                    <td class=""></td>
                                    <td class=""></td>
                                </tr>
                              
                                @if($student?->placement?->on_wrl==0)
                                <tr class="border-b bg-gray-200">
                                    <td class="px-6 w-1/4 py-4 font-bold text-gray-800" colspan="3">
                                        PLACEMENT DETAILS
                                    </td>
                                    <td class="text-right ">
                                        @if(auth()->user()->is_admin == 1)
                                            <a href="{{url("student/$student->regnum/edit")}}" type="button" class="mx-2">
                                                <x-button>
                                                    <svg class="w-4 h-4 text-gray-800 dark:text-white text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                    </svg>
                                                    Edit Placement
                                                </x-button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 w-1/4 py-4">
                                        Company Name
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student?->placement?->name}}
                                    </td>
                                    <td class="w-1/4"></td>
                                    <td class="w-1/4"></td>
                                </tr>

                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 w-1/4 py-4">
                                        Country
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student?->placement?->country}}
                                    </td>
                                    <td class="px-6 w-1/4 py-4">
                                        City
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student?->placement?->city}}
                                    </td>
                                </tr>

                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 w-1/4 py-4">
                                        Physical Address
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student?->placement?->physical_address}}
                                    </td>
                                    <td class="w-1/4"></td>
                                    <td class="w-1/4"></td>
                                </tr>
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 w-1/4 py-4">
                                        Website
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student?->placement?->website}}
                                    </td>
                                    <td class="w-1/4"></td>
                                    <td class="w-1/4"></td>
                                </tr>

                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 w-1/4 py-4">
                                        Telephone
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student?->placement?->telephone}}
                                    </td>
                                    <td class="px-6 w-1/4 py-4">
                                        Email
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student?->placement?->email}}
                                    </td>
                                </tr>

                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 w-1/4 py-4">
                                        Date of Engagement
                                    </td>
                                    <td
                                        class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$student?->placement?->date_of_engagement}}
                                    </td>
                                    <td class="w-1/4"></td>
                                    <td class="w-1/4"></td>
                                </tr>
@endif
                                @if($student?->placement)
                                @if($student?->placement?->on_wrl==0)
                                    <tr class="border-b bg-gray-200">
                                        <td class="px-6 w-1/4 py-4 font-bold text-gray-800" colspan="3">
                                            WORK SUPERVISOR
                                        </td>
                                        <td class="text-right ">
                                            @if(auth()->user()->is_admin == 1)
                                                <a href="{{url("student/$student->regnum/edit?page=supervisor")}}" type="button"
                                                    class="mx-2">
                                                    <x-button>
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white text-white" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                        </svg>
                                                        Edit Work Supervisor
                                                    </x-button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr
                                        class="odrd:bg-white oddr:dark:bg-gray-900 erven:bg-gray-50 erven:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 w-1/4 py-4">
                                            Fullname
                                        </td>
                                        <td
                                            class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $student?->placement?->work_supervisor?->name}}
                                        </td>
                                        <td class="px-6 w-1/4 py-4">
                                            Designation
                                        </td>
                                        <td
                                            class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $student?->placement?->work_supervisor?->designation}}
                                        </td>
                                    </tr>
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 w-1/4 py-4">
                                            Phone
                                        </td>
                                        <td
                                            class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $student?->placement?->work_supervisor?->telephone}}
                                        </td>
                                        <td class="px-6 w-1/4 py-4">
                                            Email
                                        </td>
                                        <td
                                            class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $student?->placement?->work_supervisor?->email}}
                                        </td>
                                    </tr>

@endif
                                    <!-- in house supervisor-->
                                    <tr class="border-b bg-gray-200">
                                        <td class="px-6 w-1/4 py-4 font-extrabold text-gray-800" colspan="3">
                                            UNIVERSITY SUPERVISOR
                                        </td>
                                        <td class="text-right ">
                                          
                                            @if(auth()->user()->is_admin == 1 || $user_role->coordinator)
                                                <a href="{{url("student/$student->regnum/edit?page=university_supervisor&target=1")}}"
                                                    type="button" class="mx-2">
                                                    <x-button>
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white text-white" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                        </svg>
                                                        Assign Supervisor
                                                    </x-button>
                                                </a>
                                            @endif


                                        </td>
                                    </tr>
                                    <tr
                                        class="odrd:bg-white oddr:dark:bg-gray-900 erven:bg-gray-50 erven:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 w-1/4 py-4">
                                            Fullname
                                        </td>
                                        <td
                                            class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $student?->placement?->placement_supervisor?->user?->name}}
                                        </td>

                                        <td class="px-6 w-1/4 py-4">
                                            Email
                                        </td>
                                        <td
                                            class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $student?->placement?->placement_supervisor?->user?->email}}
                                        </td>

                                    </tr>
                                    @if($student?->placement?->placement_supervisor?->user)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <td class="px-6 w-1/4 py-4" colspan="4"> <a
                                                    href="{{url("submission?student_id=$student->id&user_id=" . $student?->placement?->placement_supervisor?->user?->id)}}"
                                                    type="button" class="">
                                                    <x-button><svg class="w-4 h-4 text-gray-800 dark:text-white text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" viewBox="0 0 24 24">
                                                            <path fill-rule="evenodd"
                                                                d="M3 6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-6.616l-2.88 2.592C8.537 20.461 7 19.776 7 18.477V17H5a2 2 0 0 1-2-2V6Zm4 2a1 1 0 0 0 0 2h5a1 1 0 1 0 0-2H7Zm8 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Zm-8 3a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7Zm5 0a1 1 0 1 0 0 2h5a1 1 0 1 0 0-2h-5Z"
                                                                clip-rule="evenodd" />
                                                        </svg> Send Message
                                                    </x-button>
                                                </a>

                                            </td>
                                        </tr>
                                    @endif
                                    <!----- COORDINATOR --->
                                    <tr class="border-b bg-gray-200">
                                        <td class="px-6 w-1/4 py-4 font-extrabold text-gray-800" colspan="3">
                                            UNIVERSITY COORDINATOR
                                        </td>
                                        <td class="text-right ">
                                            <!-- @if(auth()->user()->is_admin == 1)
                                            <a href="{{url("student/$student->regnum/edit?page=university_supervisor&target=2")}}"
                                                type="button"
                                                class="mx-2">

                                                <x-button>
                                                    <svg class="w-4 h-4 text-gray-800 dark:text-white text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                    </svg>
                                                    Edit
                                                </x-button>
                                            </a>
                                            @endif -->


                                        </td>
                                    </tr>
                                    <tr
                                        class="odrd:bg-white oddr:dark:bg-gray-900 erven:bg-gray-50 erven:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 w-1/4 py-4">
                                            Fullname
                                        </td>
                                        <td
                                            class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $student?->placement?->placement_supervisor?->coordinator?->name}}
                                        </td>

                                    </tr>
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 w-1/4 py-4">
                                            Email
                                        </td>
                                        <td
                                            class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $student?->placement?->placement_supervisor?->coordinator?->email}}
                                        </td>

                                    </tr>

                                    <!--- END OF COORDINATOR --->

                                    <!----- CHAIRPERSON --->
                                    <tr class="border-b bg-gray-200">
                                        <td class="px-6 w-1/4 py-4 font-extrabold text-gray-800" colspan="3">
                                            UNIVERSITY CHAIRPERSON
                                        </td>
                                        <td class="text-right ">
                                            @if(auth()->user()->is_admin == 1)
                                            <!-- <a href="{{url("student/$student->regnum/edit?page=university_supervisor&target=3")}}"
                                                type="button"
                                                class="mx-2"> <x-button>
                                                    <svg class="w-4 h-4 text-gray-800 dark:text-white text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                    </svg>
                                                    Edit
                                                </x-button>
                                            </a> -->
                                            @endif

                                        </td>
                                    </tr>
                                    <tr
                                        class="odrd:bg-white oddr:dark:bg-gray-900 erven:bg-gray-50 erven:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 w-1/4 py-4">
                                            Fullname
                                        </td>
                                        <td
                                            class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $student?->placement?->placement_supervisor?->chairperson?->name}}
                                        </td>

                                    </tr>
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 w-1/4 py-4">
                                            Email
                                        </td>
                                        <td class="px-6 w-1/4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                            colspan="3">
                                            {{ $student?->placement?->placement_supervisor?->chairperson?->email}}
                                        </td>

                                    </tr>

                                    <!--- END OF CHAIRPERSON --->

                                    <!--  FILES -->
                                    @if($conversation?->messages)
                                        <tr class="border-b dark:bg-gray-900 bg-gray-300 text-gray-800">
                                            <td class="px-6 w-1/4 py-4 font-extrabold text-gray-" colspan="3">
                                                <h2 class="mb-4 text-2xl dark:text-white ">
                                                    Submitted Documents
                                                </h2>

                                            </td>
                                            <td class=""></td>
                                        </tr>

                                        @foreach ($conversation?->messages as $message)
                                            @if($message?->document)
                                                <tr
                                                    class="odrd:bg-white oddr:dark:bg-gray-900 erven:bg-gray-50 erven:dark:bg-gray-800 border-b dark:border-gray-700">
                                                    <td class="px-6 w-1/4 py-4" colspan="4">

                                                        <ol class="relative border-s border-gray-200 dark:border-gray-700">
                                                            <li class="mb-10 ms-6">
                                                                <span
                                                                    class="absolute flex items-center justify-center w-4 h-4 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                                                    <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300"
                                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                        fill="currentColor" viewBox="0 0 20 20">
                                                                        <path
                                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                                    </svg>
                                                                </span>
                                                                <h3
                                                                    class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                                                    {{$message?->document->file_name}} <span
                                                                        class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300 ms-3">
                                                                        <p>{{$message?->document->document_type}}
                                                                    </span>
                                                                </h3>
                                                                <time
                                                                    class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Last
                                                                    updated
                                                                    on {{$message->document->updated_at->diffForHumans()}}</time>
                                                                <p class="mb-4  text-sm text-gray-500 dark:text-gray-400">
                                                                    {{$message?->document->description}}
                                                                </p>

                                                                <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                                                                    <li class="pb-3 sm:pb-4">
                                                                        <div class="flex items-center space-x-4 rtl:space-x-reverse">

                                                                            <div class="flex-1 min-w-0">
                                                                                <p
                                                                                    class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                                    Supervisor
                                                                                </p>
                                                                                <p
                                                                                    class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                                    {{$message?->document?->comment}}
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">


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

                                                        <button type="button"
                                                                                                data-modal-target="document-response-supervisor-{{$message?->document?->id}}"
                                                                                                data-modal-toggle="document-response-supervisor-{{$message?->document?->id}}"
                                                                                                data-modal-level="Supervisor"
                                                                                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Accept/Reject
                                                                                                Submission</button>
                                                    @endif
                                                 </div>
                                                                        </div>
                                                                    </li>


                                                                    @foreach (["Coordinator", "Chairperson"] as $level)


                                                                        <li class="py-4 sm:pb-4">
                                                                            <div class="flex items-center space-x-4 rtl:space-x-reverse">

                                                                                <div class="flex-1 min-w-0">
                                                                                    <p
                                                                                        class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                                        {{$level}}
                                                                                    </p>
                                                                                    <p
                                                                                        class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                                        {{$message?->document?->acceptance?->where("type", $level)?->first()?->comment}}


                                                                                    </p>
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

                                                                                </div>
                                                                                <div
                                                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">

                                                                                    @if($level == "Coordinator")
                                                                                        @if(!$message?->document?->acceptance?->where("type", $level)?->first()?->status && $student?->placement?->placement_supervisor?->coordinator?->id == auth()->id())
                                                                                            <button type="button"
                                                                                                data-modal-target="document-response-modal-{{$message?->document?->id}}"
                                                                                                data-modal-toggle="document-response-modal-{{$message?->document?->id}}"
                                                                                                data-modal-level="Coordinator"
                                                                                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Accept/Reject
                                                                                                Submission</button>
                                                                                        @endif
                                                                                    @endif
                                                                                    @if($level == "Chairperson")
                                                                                        @if(!$message?->document?->acceptance?->where("type", $level)?->first()?->status && $student?->placement?->placement_supervisor?->chairperson?->id == auth()->id())
                                                                                            <button type="button"
                                                                                                data-modal-target="document-response-chair-{{$message?->document?->id}}"
                                                                                                data-modal-toggle="document-response-chair-{{$message?->document?->id}}"
                                                                                                data-modal-level="Chairperson"
                                                                                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Accept/Reject
                                                                                                Submission</button>
                                                                                        @endif
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>




                                                                <a href="{{url($message?->document?->file_path)}}" target="_blank"
                                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"><svg
                                                                        class="w-3.5 h-3.5 me-2.5" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                        viewBox="0 0 20 20">
                                                                        <path
                                                                            d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                                                        <path
                                                                            d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                                                    </svg> Download {{$message?->document->document_type}}</a>



                                                            </li>
                                                        </ol>

                                                        
                                                        <!-- Supervisor modal -->
                                                        <div id="document-response-supervisor-{{$message?->document?->id}}" tabindex="-1"
                                                            aria-hidden="true"
                                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                                <!-- Modal content -->
                                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                    <!-- Modal header -->
                                                                    <div
                                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                            Document Feedback
                                                                        </h3>
                                                                        <button type="button"
                                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                            data-modal-toggle="document-response-modal-{{$message?->document?->id}}">
                                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                viewBox="0 0 14 14">
                                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                    <form id="response-form" class="p-4 md:p-5">
                                                                        <div id="response-error-message"
                                                                            class="text-sm font-bold p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                                                            style="display: none;">
                                                                            <span id="response-error-text"></span>
                                                                        </div>
                                                                        <input type="hidden" readonly name="document_id"
                                                                            value="{{$message?->document?->id}}" />
                                                                        <!-- New Input for Level -->
                                                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                                                            <input readonly type="text" id="level" name="approval"
                                                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                placeholder="Enter level" value="approval" />
                                                                            <div class="col-span-2">
                                                                                <label for="level"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                                    Level
                                                                                </label>
                                                                                <input readonly type="text" id="level" name="level"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                    placeholder="Enter level" value="Supervisor" />
                                                                            </div>
                                                                            <div class="col-span-2 sm:col-span-2">
                                                                                <label for="category"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                                    Response Type
                                                                                </label>
                                                                                <select id="accepted" name="accepted"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                                    <option selected=""></option>
                                                                                    <option value="1">Accept Submission</option>
                                                                                    <option value="2">Request Revision</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-span-2">
                                                                                <label for="comment"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                                    Comment
                                                                                </label>
                                                                                <textarea id="comment" rows="4" name="comment"
                                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                                    placeholder="Write comment here"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <button id="response-btn"
                                                                            class="font-bold text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                            <svg class="w-4 h-4 text-gray-800 dark:text-white text-white"
                                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24" fill="currentColor"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M3 6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-6.616l-2.88 2.592C8.537 20.461 7 19.776 7 18.477V17H5a2 2 0 0 1-2-2V6Zm4 2a1 1 0 0 0 0 2h5a1 1 0 1 0 0-2H7Zm8 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Zm-8 3a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7Zm5 0a1 1 0 1 0 0 2h5a1 1 0 1 0 0-2h-5Z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>
                                                                            Send Feedback
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Response modal -->
                                                        <div id="document-response-modal-{{$message?->document?->id}}" tabindex="-1"
                                                            aria-hidden="true"
                                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                                <!-- Modal content -->
                                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                    <!-- Modal header -->
                                                                    <div
                                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                            Document Feedback
                                                                        </h3>
                                                                        <button type="button"
                                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                            data-modal-toggle="document-response-modal-{{$message?->document?->id}}">
                                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                viewBox="0 0 14 14">
                                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                    <form id="response-form" class="p-4 md:p-5">
                                                                        <div id="response-error-message"
                                                                            class="text-sm font-bold p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                                                            style="display: none;">
                                                                            <span id="response-error-text"></span>
                                                                        </div>
                                                                        <input type="hidden" readonly name="document_id"
                                                                            value="{{$message?->document?->id}}" />
                                                                        <!-- New Input for Level -->
                                                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                                                            <input readonly type="text" id="level" name="approval"
                                                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                placeholder="Enter level" value="approval" />
                                                                            <div class="col-span-2">
                                                                                <label for="level"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                                    Level
                                                                                </label>
                                                                                <input readonly type="text" id="level" name="level"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                    placeholder="Enter level" value="Coordinator" />
                                                                            </div>
                                                                            <div class="col-span-2 sm:col-span-2">
                                                                                <label for="category"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                                    Response Type
                                                                                </label>
                                                                                <select id="accepted" name="accepted"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                                    <option selected=""></option>
                                                                                    <option value="1">Accept Submission</option>
                                                                                    <option value="2">Request Revision</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-span-2">
                                                                                <label for="comment"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                                    Comment
                                                                                </label>
                                                                                <textarea id="comment" rows="4" name="comment"
                                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                                    placeholder="Write comment here"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <button id="response-btn"
                                                                            class="font-bold text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                            <svg class="w-4 h-4 text-gray-800 dark:text-white text-white"
                                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24" fill="currentColor"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M3 6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-6.616l-2.88 2.592C8.537 20.461 7 19.776 7 18.477V17H5a2 2 0 0 1-2-2V6Zm4 2a1 1 0 0 0 0 2h5a1 1 0 1 0 0-2H7Zm8 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Zm-8 3a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7Zm5 0a1 1 0 1 0 0 2h5a1 1 0 1 0 0-2h-5Z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>
                                                                            Send Feedback
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="document-response-chair-{{$message?->document?->id}}" tabindex="-1"
                                                            aria-hidden="true"
                                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                                <!-- Modal content -->
                                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                    <!-- Modal header -->
                                                                    <div
                                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                            Document Feedback
                                                                        </h3>
                                                                        <button type="button"
                                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                            data-modal-toggle="document-response-modal-{{$message?->document?->id}}">
                                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                viewBox="0 0 14 14">
                                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                    <form id="response-form" class="p-4 md:p-5">
                                                                        <div id="response-error-message"
                                                                            class="text-sm font-bold p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                                                            style="display: none;">
                                                                            <span id="response-error-text"></span>
                                                                        </div>
                                                                        <input type="hidden" readonly name="document_id"
                                                                            value="{{$message?->document?->id}}" />
                                                                        <!-- New Input for Level -->
                                                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                                                            <input readonly type="text" id="level" name="approval"
                                                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                placeholder="Enter level" value="approval" />
                                                                            <div class="col-span-2">
                                                                                <label for="level"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                                    Level
                                                                                </label>
                                                                                <input readonly type="text" id="level" name="level"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                    placeholder="Enter level" value="Chairperson" />
                                                                            </div>
                                                                            <div class="col-span-2 sm:col-span-2">
                                                                                <label for="category"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                                    Response Type
                                                                                </label>
                                                                                <select id="accepted" name="accepted"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                                    <option selected=""></option>
                                                                                    <option value="1">Accept Submission</option>
                                                                                    <option value="2">Request Revision</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-span-2">
                                                                                <label for="comment"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                                    Comment
                                                                                </label>
                                                                                <textarea id="comment" rows="4" name="comment"
                                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                                    placeholder="Write comment here"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <button id="response-btn"
                                                                            class="font-bold text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                            <svg class="w-4 h-4 text-gray-800 dark:text-white text-white"
                                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24" fill="currentColor"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M3 6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-6.616l-2.88 2.592C8.537 20.461 7 19.776 7 18.477V17H5a2 2 0 0 1-2-2V6Zm4 2a1 1 0 0 0 0 2h5a1 1 0 1 0 0-2H7Zm8 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Zm-8 3a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7Zm5 0a1 1 0 1 0 0 2h5a1 1 0 1 0 0-2h-5Z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>
                                                                            Send Feedback
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>

                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif

                                @endif
                            </tbody>
                        </table>





                    </div>

                </div>
            </section>
        </div>

    </div>

    <script>
        // Listen for click events on all buttons that have the data-modal-toggle attribute
        document.querySelectorAll('[data-modal-toggle]').forEach(function (button) {
            button.addEventListener('click', function () {
                // Retrieve the modal target and the level from the button's attributes
                var modalId = button.getAttribute('data-modal-target');
                var levelValue = button.getAttribute('data-modal-level');

                // Locate the modal element using the modalId
                var modal = document.querySelector(modalId);
                if (modal) {
                    // Find the level input inside the modal and update its value
                    var levelInput = modal.querySelector('input[name="level"]');
                    if (levelInput) {
                        levelInput.value = levelValue;
                    }
                }
            });
        });
    </script>
</x-app-layout>