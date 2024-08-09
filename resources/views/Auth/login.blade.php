<x-layout1>
    <div class="flex min-h-screen">
        <!-- Left Side Image -->
        <div class="w-1/2 bg-gray-100 flex items-center justify-center">
            <img class="object-cover h-full w-full" src="https://img.freepik.com/premium-photo/remote-learning-environments_861346-47353.jpg?w=826" alt="Teacher">
        </div>

        <!-- Right Side Login Form -->
        <div class="w-1/2 flex items-center justify-center bg-white">
            <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
                <div class="text-center">
                    <h2 class="text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
                </div>
                <form class="space-y-6" action="/login" method="POST">
                    @csrf
                    <div>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="email" name="email" type="email" autocomplete="true" required />
                            <x-form-error name="email" />
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <x-form-label for="password">Password</x-form-label>
                        </div>
                        <div class="mt-2">
                            <x-form-input id="password" name="password" type="password" autocomplete="current-password" required />
                            <x-form-error name="password" />
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">Sign in</button>
                    </div>
                </form>

                <p class="mt-8 text-center text-sm text-gray-500">
                    Create Login?
                    <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500">Register</a>
                </p>
            </div>
        </div>
    </div>
</x-layout1>
