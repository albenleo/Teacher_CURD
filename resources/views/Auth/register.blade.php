<x-layout1>
    <div class="flex min-h-screen">
        <!-- Left Side Image -->
        <div class="w-1/2 bg-gray-100 flex items-center justify-center">
            <img class="object-cover h-full w-full" src="https://media.istockphoto.com/id/1131756963/photo/exams-test-student-in-high-school-university-student-holding-pencil-for-testing-exam-writing.jpg?s=1024x1024&w=is&k=20&c=xzkbH6S42AJxjY_hg83gIg4PZ2tYIKMr4iztLK5ABQg=" alt="Register">
        </div>

        <!-- Right Side Registration Form -->
        <div class="w-1/2 flex items-center justify-center bg-white">
            <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
                <div class="text-center">
                    <h2 class="text-2xl font-bold leading-9 tracking-tight text-gray-900">Register for an account</h2>
                </div>
                <form method="POST" action="/register" class="space-y-6">
                    @csrf

                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <x-form-field>
                                <x-form-label for="first_name">First Name</x-form-label>

                                <div class="mt-2">
                                    <x-form-input name="first_name" id="first_name" class="w-full" required />
                                    <x-form-error name="first_name" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="last_name">Last Name</x-form-label>

                                <div class="mt-2">
                                    <x-form-input name="last_name" id="last_name" required />
                                    <x-form-error name="last_name" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="email">Email</x-form-label>

                                <div class="mt-2">
                                    <x-form-input name="email" id="email" type="email" required />
                                    <x-form-error name="email" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="password">Password</x-form-label>

                                <div class="mt-2">
                                    <x-form-input name="password" id="password" type="password" required />
                                    <x-form-error name="password" />
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-label for="password_confirmation">Confirm Password</x-form-label>

                                <div class="mt-2">
                                    <x-form-input name="password_confirmation" id="password_confirmation" type="password" required />
                                    <x-form-error name="password_confirmation" />
                                </div>
                            </x-form-field>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <x-form-button>Register</x-form-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout1>
