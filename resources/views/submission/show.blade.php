<x-app-layout>

   <div class="py-0">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8w h-full">
         <section class="dark:bg-gray-900 ">
            <div class="px-4 mx-auto max-w-2xl">
               <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Messenger</h2>
               <div id="alert-additional-content-4"
                  class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                  role="alert">
                  <div class="flex items-center">
                     <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                           d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z">
                        </path>
                     </svg>
                     <span class="sr-only">Info</span>
                     <h3 class="text-lg font-medium">Chat Info</h3>
                  </div>
                  <div class="mt-2 mb-4 text-sm">
                     @if($is_student)
                   <p class="text-yellow-80d0">Chat with supervisor <span
                        class="font-bold">{{$conversation->chatting_with}} (<a target="blank"
                          href="mailto:{{$conversation->chatting_email}}">{{$conversation->chatting_email}}</a>)</span>
                   </p>
                @else
                <p class="text-yellow-80d0">Chat with student {{$student->firstname}} {{$student->surname}}
                  ({{$student->regnum}})</p>
                <p class="text-yellow-80d0">Programme: {{$student?->programme_details?->name}}</p>
             @endif
                  </div>
               </div>



               @foreach ($conversation->messages as $message)

               <?php   $type_bubble = ($message?->sender?->id == auth()->id()) ? "flex items-start gap-2.5 mb-4" : "flex justify-end gap-2.5 mb-4"?>
               <div class="{{$type_bubble}} ">
                 <img class="w-8 h-8 rounded-full"
                   src="https://ui-avatars.com/api/?name={{$message?->sender?->name}}&color=7F9CF5&background=EBF4FF"
                   alt="Jese image">
                 <div
                   class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                   <div class="flex items-center space-x-2 rtl:space-x-reverse">
                     <span
                        class="text-sm font-semibold text-gray-900 dark:text-white">{{($message?->sender?->id == auth()->id()) ? "You" : $message?->sender?->name}}</span>
                     <span
                        class="text-sm font-normal text-gray-500 dark:text-gray-400">{{date("H:i", strtotime($message->created_at))}}</span>
                   </div>
                   @if($message?->meeting)
                  <span class="text-gray-500 dark:text-gray-100 font-bold mt-2">MEETING REQUEST</span>
               @endif
                   <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">{{$message?->message}}</p>
                   @if($message?->document)
                  <div class="flex items-start my-2.5 bg-gray-50 dark:bg-gray-600 rounded-xl p-2">
                   <div class="me-2">
                     <span class="flex items-center gap-2 text-sm font-medium text-gray-900 dark:text-white pb-2">
                       <svg fill="none" aria-hidden="true" class="w-5 h-5 flex-shrink-0" viewBox="0 0 20 21">
                        <g clip-path="url(#clip0_3173_1381)">
                          <path fill="#E2E5E7"
                            d="M5.024.5c-.688 0-1.25.563-1.25 1.25v17.5c0 .688.562 1.25 1.25 1.25h12.5c.687 0 1.25-.563 1.25-1.25V5.5l-5-5h-8.75z">
                          </path>
                          <path fill="#B0B7BD" d="M15.024 5.5h3.75l-5-5v3.75c0 .688.562 1.25 1.25 1.25z">
                          </path>
                          <path fill="#CAD1D8" d="M18.774 9.25l-3.75-3.75h3.75v3.75z"></path>
                          <path fill="#F15642"
                            d="M16.274 16.75a.627.627 0 01-.625.625H1.899a.627.627 0 01-.625-.625V10.5c0-.344.281-.625.625-.625h13.75c.344 0 .625.281.625.625v6.25z">
                          </path>
                          <path fill="#fff"
                            d="M3.998 12.342c0-.165.13-.345.34-.345h1.154c.65 0 1.235.435 1.235 1.269 0 .79-.585 1.23-1.235 1.23h-.834v.66c0 .22-.14.344-.32.344a.337.337 0 01-.34-.344v-2.814zm.66.284v1.245h.834c.335 0 .6-.295.6-.605 0-.35-.265-.64-.6-.64h-.834zM7.706 15.5c-.165 0-.345-.09-.345-.31v-2.838c0-.18.18-.31.345-.31H8.85c2.284 0 2.234 3.458.045 3.458h-1.19zm.315-2.848v2.239h.83c1.349 0 1.409-2.24 0-2.24h-.83zM11.894 13.486h1.274c.18 0 .36.18.36.355 0 .165-.18.3-.36.3h-1.274v1.049c0 .175-.124.31-.3.31-.22 0-.354-.135-.354-.31v-2.839c0-.18.135-.31.355-.31h1.754c.22 0 .35.13.35.31 0 .16-.13.34-.35.34h-1.455v.795z">
                          </path>
                          <path fill="#CAD1D8"
                            d="M15.649 17.375H3.774V18h11.875a.627.627 0 00.625-.625v-.625a.627.627 0 01-.625.625z">
                          </path>
                        </g>
                        <defs>
                          <clipPath id="clip0_3173_1381">
                            <path fill="#fff" d="M0 0h20v20H0z" transform="translate(0 .5)"></path>
                          </clipPath>
                        </defs>
                       </svg>
                       {{$message?->document?->file_name}}
                     </span>
                     <span class="flex text-xs font-normal text-gray-500 dark:text-gray-400 gap-2">
                       {{$message?->document?->document_type}}
                       <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="self-center" width="3"
                        height="4" viewBox="0 0 3 4" fill="none">
                        <circle cx="1.5" cy="2" r="1.5" fill="#6B7280"></circle>
                       </svg>
                       <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="self-center" width="3"
                        height="4" viewBox="0 0 3 4" fill="none">
                        <circle cx="1.5" cy="2" r="1.5" fill="#6B7280"></circle>
                       </svg>
                       {{strtoupper($message?->document?->file_type)}}
                     </span>
                   </div>
                   <div class="inline-flex self-center items-center">
                     <a href="{{url($message?->document?->file_path)}}" target="_blank"
                       class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-50 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:ring-gray-600"
                       type="button">
                       <svg class="w-4 h-4 text-gray-900 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                          d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z">
                        </path>
                        <path
                          d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z">
                        </path>
                       </svg>
                     </a>
                   </div>
                  </div>
                  @if($message?->document?->accepted == 1)
                 <span
                  class="bg-green-100 text-green-800 w-1/2 text-xs font-medium me-2 px-2.5 py-1 rounded-full dark:bg-green-900 dark:text-green-300">Document
                  Accepted </span>


              @elseif($message?->document?->accepted == 2)
              <span
               class="bg-red-100 max-w-none text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Document
               Revision Requested </span>

           @endif
                  @if($message?->document?->accepted <> 0)
                 <h6 class="font-bold text-gray-200">Comment</h6>
                 <p class="text-gray-200 text-xs p-1">{{$message?->document?->comment}}</p>
              @endif
                  <!-- acceptance of documents -->
                  @if($message?->document?->accepted == 0 && $is_student)
                 <span
                  class="px-3 py-2 text-xs w-full font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                  <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                   width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                   <path fill-rule="evenodd"
                     d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                     clip-rule="evenodd" />
                  </svg>

                  Awaiting Supervisor Response
                 </span>

              @endif
                  @if(!$is_student && $message?->document?->accepted == 0)
                 <button data-modal-target="document-response-modal" data-modal-toggle="document-response-modal"
                  hredf="{{url("document?accept=1", $message?->document?->id)}}" type="button"
                  class="px-3 py-2 text-xs w-full font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                  <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                   width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                   <path fill-rule="evenodd"
                     d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                     clip-rule="evenodd" />
                  </svg>

                  Respond
                 </button>


                 <!-- Main modal -->
                 <div id="document-response-modal" tabindex="-1" aria-hidden="true"
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
                       data-modal-toggle="document-response-modal">
                       <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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

                     <div class="grid gap-4 mb-4 grid-cols-2">
                       <div class="col-span-2 sm:col-span-2">
                        <label for="category"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Response
                          Type</label>
                        <select id="accepted" name="accepted"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                          <option selected=""></option>
                          <option value="1">Accept Submission</option>
                          <option value="2">Request Revision</option>
                        </select>
                       </div>
                       <div class="col-span-2">
                        <label for="comment"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comment</label>
                        <textarea id="comment" rows="4" name="comment"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Write comment here"></textarea>
                       </div>
                     </div>
                     <button id="response-btn"
                       class="font-bold text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                       <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                          d="M3 6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-6.616l-2.88 2.592C8.537 20.461 7 19.776 7 18.477V17H5a2 2 0 0 1-2-2V6Zm4 2a1 1 0 0 0 0 2h5a1 1 0 1 0 0-2H7Zm8 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Zm-8 3a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7Zm5 0a1 1 0 1 0 0 2h5a1 1 0 1 0 0-2h-5Z"
                          clip-rule="evenodd" />
                       </svg>
                       Send Feeback
                     </button>
                     </form>
                   </div>
                  </div>
                 </div>
              @endif
               @endif

                   @if($message?->meeting)
                  <div class="flex items-start my-2.5 bg-gray-50 dark:bg-gray-600 rounded-xl p-2">
                   <div class="me-2">
                     <span class="flex items-center gap-2 text-sm font-medium text-gray-900 dark:text-white pb-2">
                       <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                       </svg>

                       {{date('d F Y', strtotime($message?->meeting?->scheduled_date))}}
                     </span>
                     <span class="flex text-xs font-normal text-gray-500 dark:text-gray-400 gap-2">
                       {{$message?->meeting?->start_time}}
                       <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="self-center" width="3"
                        height="4" viewBox="0 0 3 4" fill="none">
                        <circle cx="1.5" cy="2" r="1.5" fill="#6B7280"></circle>
                       </svg>
                       {{$message?->meeting?->end_time}}
                       <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="self-center" width="3"
                        height="4" viewBox="0 0 3 4" fill="none">
                        <circle cx="1.5" cy="2" r="1.5" fill="#6B7280"></circle>
                       </svg>
                       <span class=" font-bold">MEETING</span>
                     </span>
                   </div>
                  </div>
                  @if($message?->meeting?->accepted == 1)
                 <span
                  class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-1 rounded-full dark:bg-green-900 dark:text-green-300">Meeting
                  Accepted </span>

              @elseif($message?->meeting?->accepted == 2)
              <span
               class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Meeting
               Rejected </span>
           @else
           <span
            class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">
            @if($message?->sender?->id == auth()->id())
            Pending Acceptance
         @else
         <a href="{{url("meeting?accept=1", $message?->meeting?->id)}}" type="button"
          class="px-3 py-2 text-xs w-full font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

          <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
            d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
            clip-rule="evenodd" />
          </svg>

          Accept Invitation
         </a>

         <a href="{{url("meeting?accept=2", $message?->meeting?->id)}}" type="button"
          class="px-3 py-2 text-xs mt-2 w-full font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">

          <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
            clip-rule="evenodd" />
          </svg>

          Not Attending
         </a>
      @endif
           </span>

        @endif

               @endif
                 </div>

               </div>

            @endforeach
               @if($conversation->messages->count() > 2)
               <div role="status" class="max-w-sm animate-pulse">
                 <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                 <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px] mb-2.5"></div>
                 <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                 <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[330px] mb-2.5"></div>
                 <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[300px] mb-2.5"></div>
                 <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
                 <span class="sr-only">Loading...</span>
               </div>
            @endif
               @if($conversation->messages->isEmpty())
               <div class="flex justify-center items-center py-16">
                 <div class="text-center">
                   <i class="">
                     <svg class="w-[100px] h-[100px] text-gray-800 dark:text-white mx-auto" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5"
                          d="m10.827 5.465-.435-2.324m.435 2.324a5.338 5.338 0 0 1 6.033 4.333l.331 1.769c.44 2.345 2.383 2.588 2.6 3.761.11.586.22 1.171-.31 1.271l-12.7 2.377c-.529.099-.639-.488-.749-1.074C5.813 16.73 7.538 15.8 7.1 13.455c-.219-1.169.218 1.162-.33-1.769a5.338 5.338 0 0 1 4.058-6.221Zm-7.046 4.41c.143-1.877.822-3.461 2.086-4.856m2.646 13.633a3.472 3.472 0 0 0 6.728-.777l.09-.5-6.818 1.277Z" />
                     </svg>

                   </i>
                   <p class="text-gray-600 text-lg font-medium mb-2 font-bold">No messages yet!</p>
                   <p class="text-gray-500 text-sm">You don't have any messages at the moment.</p>

                 </div>
               </div>
            @endif



               <form action="{{url('submission')}}" method="POST" enctype="multipart/form-data"
                  class="fixed bottom-0 left-1/3 p-4 bg-white dark:bg-gray-800 z-10 max-w-full w-1/2 overflow-hidden">
                  @csrf
                  <input type="hidden" readonly name="placement_id" value="{{$student?->placement?->id}}" />
                  <input type="hidden" readonly name="regnum" value="{{$student->regnum}}" />
                  <input type="hidden" readonly name="supervisor_id"
                     value="{{$student?->placement?->placement_supervisor?->user?->id}}" />

                  <label for="chat" class="sr-only">Your message</label>
                  <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                     <button data-tooltip-target="tooltip-animation" type="button" data-modal-target="crud-modal"
                        data-modal-toggle="crud-modal"
                        class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                           xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961" />
                        </svg>

                        <span class="sr-only">Upload Document</span>
                     </button>

                     <button data-tooltip-target="tooltip-animation2" type="button" data-modal-target="meeting-modal"
                        data-modal-toggle="meeting-modal"
                        class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">


                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                           xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9.5 11H5a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h4.5M7 11V7a3 3 0 0 1 6 0v1.5m2.5 5.5v1.5l1 1m3.5-1a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Z" />
                        </svg>


                        <span class="sr-only">Schedule Meeting</span>
                     </button>
                     <textarea id="chat" rows="1" name="additional_details"
                        class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your message..."></textarea>
                     <button type="submit"
                        class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                        <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                           xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                           <path
                              d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                        </svg>
                        <span class="sr-only">Send message</span>
                     </button>
                  </div>
               </form>

            </div>
         </section>
      </div>
   </div>


   <div id="tooltip-animation" role="tooltip"
      class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
      Upload Document
      <div class="tooltip-arrow" data-popper-arrow></div>
   </div>

   <div id="tooltip-animation2" role="tooltip"
      class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-bold text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">

      Schedule Meeting
      <div class="tooltip-arrow" data-popper-arrow></div>
   </div>

   <!-- Main modal -->
   <div id="crud-modal" tabindex="-1" aria-hidden="true"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
               <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Upload Document
               </h3>
               <button type="button"
                  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                  data-modal-toggle="crud-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
               </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="submission-form" method="POST" enctype="multipart/form-data">
               <div id="submission-error-message"
                  class="text-sm font-bold p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                  style="display: none;">

               </div>
               @csrf
               <input type="hidden" readonly name="placement_id" value="{{$student?->placement?->id}}" />
               <input type="hidden" readonly name="regnum" value="{{$student->regnum}}" />
               <input type="hidden" readonly name="supervisor_id"
                  value="{{$student?->placement?->placement_supervisor?->user?->id}}" />

               <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                  <div class="sm:col-span-2">
                     <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                     <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Type document title" value="" required>
                     @error('name')
                   <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                  </div>
                  <div class="sm:col-span-2">
                     <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Document
                        Type</label>
                     <select id="category" name="document_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select Document Type</option>
                        @foreach (["Chapter", "Dissertation", "Essay", "Final Document", "Project Plan", "Progress Report", "Proposal", "Research Paper", "Report", "Thesis"] as $document_type)
                     <option @if($document_type == $student?->placement?->document_type) selected @endif>
                        {{$document_type}}
                     </option>
                  @endforeach
                     </select>
                     @error('document_type')
                   <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                  </div>




                  <div class="flex items-center justify-center w-full sm:col-span-2 py-2">
                     <input
                        class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="default_size" name="file" type="file">

                     @error('file')
                   <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                  </div>
                  <div class="sm:col-span-2">
                     <label for="additional_details"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Additional
                        Details</label>
                     <textarea name="additional_details" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""></textarea>
                     @error('additional_details')
                   <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                  </div>



               </div>
               <button type="submit" id="submit-btn"
                  class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                  Submit Document
               </button>
            </form>

         </div>
      </div>
   </div>

   <!-- meeting time -->



   <!-- Main modal -->
   <div id="meeting-modal" tabindex="-1" aria-hidden="true"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
               <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                  Schedule Meeting
               </h3>
               <button type="button"
                  class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                  data-modal-hide="meeting-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
               </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
               <form class="space-y-2" id="meeting-form">
                  <div id="error-message"
                     class="text-sm font-bold p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                     style="display: none;">
                     <span id="error-text"></span>
                  </div>
                  @csrf
                  <input type="hidden" readonly name="placement_id" value="{{$student?->placement?->id}}" />
                  <input type="hidden" readonly name="regnum" value="{{$student->regnum}}" />
                  <input type="hidden" readonly name="supervisor_id"
                     value="{{$student?->placement?->placement_supervisor?->user?->id}}" />
                  <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of
                     Meeting</label>

                  <div class="relative max-w-sm">
                     <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                           xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path
                              d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                     </div>

                     <input id="datepicker-format" datepicker name="start_date" datepicker-max-date="05/05/2030"
                        type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date">
                  </div>
                  <div>
                     <label for="start-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                        time:</label>
                     <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                              xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd"
                                 d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                 clip-rule="evenodd" />
                           </svg>
                        </div>
                        <input type="time" id="start-time" name="start_time"
                           class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           min="06:00" max="20:00" value="08:00" required />
                     </div>
                  </div>
                  <div>
                     <label for="end-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                        time:</label>
                     <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                              xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd"
                                 d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                 clip-rule="evenodd" />
                           </svg>
                        </div>
                        <input type="time" id="end-time" name="end_time"
                           class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           min="06:00" max="20:00" value="19:00" required />
                     </div>
                  </div>



                  <label for="message"
                     class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                  <textarea name="additional_details" id="additional_details" rows="4"
                     class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     placeholder=""></textarea>


                  <button type="submit" id="meeting-btn"
                     class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Schedule
                     Meeting</button>

               </form>
            </div>
         </div>
      </div>
   </div>


   <script>
      const form = document.getElementById('submission-form');
      const submitBtn = document.getElementById('submit-btn');
      const submissionErrorMessageDiv = document.getElementById('submission-error-message');

      submitBtn.addEventListener('click', async (e) => {
         e.preventDefault();

         // Disable the button and show loading indicator
         submitBtn.disabled = true;
         submitBtn.textContent = 'Processing...';

         const formData = new FormData(form);
         const url = '{{ url("submission") }}';

         try {
            const response = await fetch(url, {
               method: 'POST',
               headers: {
                  'Accept': 'application/json',
               },
               body: formData,
            });

            const data = await response.json();

            if (response.ok) {
               console.log(data);
               location.reload();
            } else {
               console.error(data);
               // Display validation error messages
               if (data.errors) {
                  let errorMessageHtml = '';
                  Object.keys(data.errors).forEach(key => {
                     const errorMessages = data.errors[key];
                     errorMessages.forEach(message => {
                        errorMessageHtml += `<li>${message}</li>`;
                     });
                  });
                  submissionErrorMessageDiv.innerHTML = errorMessageHtml;
                  submissionErrorMessageDiv.style.display = 'block';
               } else {
                  submissionErrorMessageDiv.innerHTML = `<p>${data.message || 'Error submitting document'}</p>`;
                  submissionErrorMessageDiv.style.display = 'block';
               }
            }
         } catch (error) {
            console.error(error);
            // Display error message
            submissionErrorMessageDiv.innerHTML = `<p>An error occurred while submitting the document. Please try again.</p>`;
            submissionErrorMessageDiv.style.display = 'block';
         } finally {
            // Enable the button and reset its text
            submitBtn.disabled = false;
            submitBtn.textContent = 'Submit';
         }
      });

      //-------------------------------------
      //meeting submission
      //-------------------------------------
      const meetingForm = document.getElementById('meeting-form');
      const meetingSubmitBtn = document.getElementById('meeting-btn');
      const errorMessageDiv = document.getElementById('error-message');
      const errorTextSpan = document.getElementById('error-text');

      meetingSubmitBtn.addEventListener('click', async (e) => {
         e.preventDefault();

         // Disable the button and show loading indicator
         meetingSubmitBtn.disabled = true;
         meetingSubmitBtn.textContent = 'Processing...';

         const formData = new FormData(meetingForm);
         const url = '{{ url("meeting") }}';

         try {
            const response = await fetch(url, {
               method: 'POST',
               headers: {
                  'Accept': 'application/json',
               },
               body: formData,
            });

            const data = await response.json();

            if (response.ok) {
               console.log(data);
               location.reload();
               // display success message or redirect to another page
            } else if (response.status === 422) {
               // Handle validation errors
               console.error(data);
               const errorMessages = [];
               Object.keys(data.errors).forEach(key => {
                  errorMessages.push(data.errors[key][0]);
               });
               errorTextSpan.innerText = errorMessages.join('\n');
               errorMessageDiv.style.display = 'block';
            } else {
               console.error(data);
               errorTextSpan.innerText = 'Error submitting meeting';
               errorMessageDiv.style.display = 'block';
            }
         } catch (error) {
            console.error(error);
            errorTextSpan.innerText = 'Error submitting meeting';
            errorMessageDiv.style.display = 'block';
         } finally {
            // Enable the button and reset its text
            meetingSubmitBtn.disabled = false;
            meetingSubmitBtn.textContent = 'Schedule Meeting';
         }
      });

      //RESPONSE FormData

      const responseForm = document.getElementById('response-form');
      const responseSubmitBtn = document.getElementById('response-btn');
      const responseerrorMessageDiv = document.getElementById('response-error-message');
      const responseErrorTextSpan = document.getElementById('response-error-text');

      responseSubmitBtn.addEventListener('click', async (e) => {
         e.preventDefault();

         // Disable the button and show loading indicator
         responseSubmitBtn.disabled = true;
         responseSubmitBtn.textContent = 'Processing...';

         const formData = new FormData(responseForm);
         const url = '{{ url("document") }}';

         try {
            const response = await fetch(url, {
               method: 'POST',
               headers: {
                  'Accept': 'application/json',
               },
               body: formData,
            });

            const data = await response.json();

            if (response.ok) {
               console.log(data);
               location.reload();
               // display success message or redirect to another page
            } else if (response.status === 422) {
               // Handle validation errors
               console.error(data);
               const errorMessages = [];
               Object.keys(data.errors).forEach(key => {
                  errorMessages.push(data.errors[key][0]);
               });
               responseErrorTextSpan.innerText = errorMessages.join('\n');
               responseerrorMessageDiv.style.display = 'block';
            } else {
               console.error(data);
               responseErrorTextSpan.innerText = 'Error submitting response';
               responseerrorMessageDiv.style.display = 'block';
            }
         } catch (error) {
            console.error(error);
            responseErrorTextSpan.innerText = 'Error submitting response';
            responseerrorMessageDiv.style.display = 'block';
         } finally {
            // Enable the button and reset its text
            responseSubmitBtn.disabled = false;
            responseSubmitBtn.textContent = 'Schedule response';
         }
      });

   </script>
</x-app-layout>