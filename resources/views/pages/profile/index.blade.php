<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h1 class="text-lg font-semibold mb-6">Your Profile</h1>

        <div class="bg-white shadow sm:rounded-lg p-6">
            <div class="md:flex md:items-center md:space-x-6">
                <!-- Avatar Section -->
                <div class="flex-shrink-0">

                            <img class="w-8 h-8 rounded-full" src="data:image/png;base64, {{ session('picture') }}"   width="32" height="32" alt="{{ session('email') }}" />
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        <label for="avatar" class="block text-sm font-medium text-gray-700 mt-2">Change Avatar</label>
                        <input id="avatar" name="avatar" type="file" class="mt-1 block w-full">
                        <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-md">Upload</button>
                    </form>
                </div>

                <!-- User Details Section -->
                <div class="mt-6 md:mt-0 md:flex-1">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input id="name" name="name" type="text" value="{{ session('fullName') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email" value="{{ session("email") }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="col-span-2">
                            <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                            <textarea id="bio" name="bio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ session("userName") }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="mt-8 border-t border-gray-200 pt-6">
                <h2 class="text-lg font-medium text-gray-900">Update Password</h2>
                <form method="POST" action="#" class="mt-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                            <input id="current_password" name="current_password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                            <input id="new_password" name="new_password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input id="confirm_password" name="confirm_password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>
                    <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
