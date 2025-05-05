<?php 

$student_id = auth()->user()->student_id;
if ($student_id != null) {
    $student = App\Models\Student::with('programme_details.department')->where('id', $student_id)->firstOrFail();
    $regnum = $student->regnum;
}


$user_role = App\Models\User::with('chairperson.department', 'coordinator.department')->findOrFail(auth()->user()->id);

                        
                        ?>
 <aside
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Sidenav" id="drawer-navigation">
            <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <div class="bg-red-600 py-5 px-3 rounded-lg mb-3">
            <p class="text-white font-bold text-xs mb-3 ml-3">Welcome {{ auth()->user()->name }}</p>

            @if (auth()->user()->is_admin == 1)
                <p class="text-white text-xs mb-3 ml-3">Logged in as Admin</p>

            @endif

            @if($user_role?->chairperson && auth()->user()->is_admin != 1)
                <p class="text-white text-xs mb-3 ml-3">Logged in as Chairperson</p>
                <p class="text-white text-xs mb-3 ml-3">{{ $user_role?->chairperson?->department?->name }}</p>
            @endif

            @if($user_role?->coordinator && auth()->user()->is_admin != 1)
                <p class="text-white text-xs mb-3 ml-3">Logged in as Coordinator</p>
                <p class="text-white text-xs mb-3 ml-3">{{ $user_role?->coordinator?->department?->name }}</p>
            @endif
            @if(auth()->user()->student_id > 0)
                <p class="text-white text-xs mb-3 ml-3">Reg Number: {{ $regnum }}</p>
                <p class="text-white text-xs mb-3 ml-3">Programme: {{ $student?->programme_details?->name }}</p>

            @endif

            @if(!$user_role?->coordinator && auth()->user()->is_admin != 1 && !$user_role?->chairperson && !auth()->user()->student_id)
                <p class="text-white text-xs mb-3 ml-3">Logged in as Supervisor</p>
                <p class="text-white text-xs mb-3 ml-3">{{ $user_role?->coordinator?->department?->name }}</p>
            @endif

        </div>
                <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                @if (auth()->user()->is_admin == 1)
                <li>
                    <a href="{{ url('/report') }}"
                        class="flex items-center p-1 text-red-50 rounded-lg hover:bg-red-600 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
                            <path
                                d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
                        </svg>



                        <span class="ms-3 text-sm">Reports</span>
                    </a>
                </li>
            @else
                <li>

                    <a href="{{ url('/dashboard') }}"
                        class="flex items-center p-1 text-red-50 rounded-lg hover:bg-red-600 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                        </svg>

                        <span class="ms-3 text-sm">Dashboard</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ url('/student') }}"
                    class="flex items-center p-1 text-red-50 rounded-lg hover:bg-red-600  group">
                    <svg class="flex-shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M17 10v1.126c.367.095.714.24 1.032.428l.796-.797 1.415 1.415-.797.796c.188.318.333.665.428 1.032H21v2h-1.126c-.095.367-.24.714-.428 1.032l.797.796-1.415 1.415-.796-.797a3.979 3.979 0 0 1-1.032.428V20h-2v-1.126a3.977 3.977 0 0 1-1.032-.428l-.796.797-1.415-1.415.797-.796A3.975 3.975 0 0 1 12.126 16H11v-2h1.126c.095-.367.24-.714.428-1.032l-.797-.796 1.415-1.415.796.797A3.977 3.977 0 0 1 15 11.126V10h2Zm.406 3.578.016.016c.354.358.574.85.578 1.392v.028a2 2 0 0 1-3.409 1.406l-.01-.012a2 2 0 0 1 2.826-2.83ZM5 8a4 4 0 1 1 7.938.703 7.029 7.029 0 0 0-3.235 3.235A4 4 0 0 1 5 8Zm4.29 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h6.101A6.979 6.979 0 0 1 9 15c0-.695.101-1.366.29-2Z"
                            clip-rule="evenodd" />
                    </svg>


                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">
                        @if (auth()->user()->is_admin == 1)
                            Placed Students
                        @elseif(auth()->user()->student_id == null && auth()->user()->is_admin != 1)
                            Your Students
                        @elseif(auth()->user()->student_id > 0)
                            Placement Details
                        @endif
                    </span>
                </a>
            </li>

            @if(auth()->user()->student_id > 0)

                <li>
                    <a href="{{ url("/student/$regnum/?only_documents=1") }}"
                        class="flex items-center p-1 text-red-50 rounded-lg hover:bg-red-600  group">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M17 10v1.126c.367.095.714.24 1.032.428l.796-.797 1.415 1.415-.797.796c.188.318.333.665.428 1.032H21v2h-1.126c-.095.367-.24.714-.428 1.032l.797.796-1.415 1.415-.796-.797a3.979 3.979 0 0 1-1.032.428V20h-2v-1.126a3.977 3.977 0 0 1-1.032-.428l-.796.797-1.415-1.415.797-.796A3.975 3.975 0 0 1 12.126 16H11v-2h1.126c.095-.367.24-.714.428-1.032l-.797-.796 1.415-1.415.796.797A3.977 3.977 0 0 1 15 11.126V10h2Zm.406 3.578.016.016c.354.358.574.85.578 1.392v.028a2 2 0 0 1-3.409 1.406l-.01-.012a2 2 0 0 1 2.826-2.83ZM5 8a4 4 0 1 1 7.938.703 7.029 7.029 0 0 0-3.235 3.235A4 4 0 0 1 5 8Zm4.29 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h6.101A6.979 6.979 0 0 1 9 15c0-.695.101-1.366.29-2Z"
                                clip-rule="evenodd" />
                        </svg>


                        <span class="flex-1 ms-3 whitespace-nowrap text-sm">
                            Uploaded Files
                        </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->is_admin == 1)

                <li>
                    <a href="{{ url('/all_student') }}"
                        class="flex items-center p-1 text-red-50 rounded-lg hover:bg-red-600  group">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M6 2c-1.10457 0-2 .89543-2 2v4c0 .55228.44772 1 1 1s1-.44772 1-1V4h12v7h-2c-.5523 0-1 .4477-1 1v2h-1c-.5523 0-1 .4477-1 1s.4477 1 1 1h5c.5523 0 1-.4477 1-1V3.85714C20 2.98529 19.3667 2 18.268 2H6Z" />
                            <path
                                d="M6 11.5C6 9.567 7.567 8 9.5 8S13 9.567 13 11.5 11.433 15 9.5 15 6 13.433 6 11.5ZM4 20c0-2.2091 1.79086-4 4-4h3c2.2091 0 4 1.7909 4 4 0 1.1046-.8954 2-2 2H6c-1.10457 0-2-.8954-2-2Z" />

                        </svg>



                        <span class="flex-1 ms-3 whitespace-nowrap text-sm">All Students</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/user') }}"
                        class="flex items-center p-1 text-red-50 rounded-lg hover:bg-red-600  group">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                clip-rule="evenodd" />

                        </svg>



                        <span class="flex-1 ms-3 whitespace-nowrap text-sm">Users</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/department') }}"
                        class="flex items-center p-1 text-red-50 rounded-lg hover:bg-red-600  group">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                clip-rule="evenodd" />

                        </svg>



                        <span class="flex-1 ms-3 whitespace-nowrap text-sm">Departments</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ url('/meeting') }}"
                    class="flex items-center p-1 text-red-50 rounded-lg hover:bg-red-600  group">
                    <svg class="flex-shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />



                    </svg>



                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">Meetings</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/user/profile') }}"
                    class="flex items-center p-1 text-red-50 rounded-lg hover:bg-red-600  group">
                    <svg class="flex-shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
                            clip-rule="evenodd" />

                    </svg>



                    <span class="flex-1 ms-3 whitespace-nowrap text-sm">Profile</span>
                </a>
            </li>


            <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                        class="flex items-center p-1 text-red-50 rounded-lg hover:bg-red-600  group">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.2"
                                d="M9.5 11H5a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h4.5M7 11V7a3 3 0 0 1 6 0v1.5m2.5 5.5v1.5l1 1m3.5-1a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Z" />
                        </svg>


                        <span class="flex-1 ms-3 whitespace-nowrap text-sm">Logout</span>
                    </a>
                </form>
            </li>
                </ul>
            </div>
        </aside>