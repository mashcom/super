<x-app-layout>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4 mx-aueto max-w-2xl">
                    <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Project Details</h2>

                    <x-validation-errors></x-validation-errors>
                    <form action="{{route('placement_project.store', $placement?->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" readonly name="placement_id" value="{{$placement?->id}}" />


                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Type project title" value="{{ $project?->title }}" required>
                                @error('name')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project
                                    Type</label>
                                <select id="category" name="type" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Select Document Type</option>
                                    @foreach (["Organisational", "Non-Organisational"] as $type)
                                        <option @if($type == $project?->type) selected @endif>
                                            {{$type}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Save Project Details
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>