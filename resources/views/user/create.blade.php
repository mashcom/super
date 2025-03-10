<x-app-layout>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8w h-full">
            <section class="dark:bg-gray-900">
                <div class="px-4 mx-auto">
                    <h2 class="mb-4 text-2xl font-bold text-gray-500 dark:text-white">Add User</h2>

                    <div class="flex flex-col sm:justify-center itemsd-center pt-6 sm:pt-0">

                        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                            <x-validation-errors class="mb-4" />

                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf

                                <div>
                                    <x-label for="name" value="{{ __('Name') }}" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                </div>

                                <div class="mt-4">
                                    <x-label for="email" value="{{ __('Email') }}" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autocomplete="username" />
                                </div>

                                <div class="mt-4">
                                    <x-label for="password" value="{{ __('Password') }}" />
                                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                        required autocomplete="new-password" />
                                </div>

                                <div class="mt-4">
                                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                </div>

                                <div class="mt-4">
                                    <x-label for="is_admin" value="{{ __('Is User Admin') }}" />
                                    <select id="is_admin" name="is_admin" required class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option selected value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>



                                <div class="flex items-center justify-end mt-4">


                                    <x-button class="ms-4">
                                        {{ __('Register') }}
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</x-app-layout>