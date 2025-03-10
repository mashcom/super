<x-app-layout>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4 mx-auto max-w-2xl">
                    <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Submit Submissions</h2>

                    <form action="{{url('submission')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" readonly name="placement_id" value="{{$student?->placement?->id}}" />
                        <input type="hidden" readonly name="regnum" value="{{$student->regnum}}" />
                        <input type="hidden" readonly name="supervisor_id" value="{{$student?->placement?->placement_supervisor?->user?->id}}" />

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
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Document
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




                            <div class="flex items-center justify-center w-full sm:col-span-2 py-16">
                            
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
                                <textarea name="additional_details" rows="8"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder=""></textarea>
                                @error('additional_details')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>



                        </div>
                        <div id="alert-additional-content-4"
                            class="p-4 mt-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                            role="alert">
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <h3 class="text-lg font-medium">Warning</h3>
                            </div>
                            <div class="mt-2 mb-4 text-sm">
                                You are about to submit a document to your supervisor <span
                                    class="font-bold font-italic">{{ $student?->placement?->placement_supervisor?->user?->name}}</span>
                                with email <span class="font-bold font-italic">
                                    {{ $student?->placement?->placement_supervisor?->user?->email}}</span>
                            </div>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Submit Document
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>