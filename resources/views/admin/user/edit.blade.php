@extends('admin.sidebar')

@section('container')
    <div class="max-w-screen-sm p-4 md:p-5 bg-white rounded-md">
        <h2 class="mb-6 font-semibold text-2xl text-gray-900">Edit user</h2>
        <!-- Modal body -->
        <form action="/admin/user/edit/{{ $user->id }}" method="POST">
            @csrf
            @method("POST")
            <input type="hidden" id="id" name="id" value="{{ $user->id }}">
            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 read-only:text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        readonly>
                </div>
                <!-- Role -->
                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                    <select name="role" id="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <!-- Password -->
                {{-- <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                        Password
                        <span class="text-sm text-gray-500">(leave empty to keep current password)</span>
                    </label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div> --}}
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end mt-4 pt-4 border-t">
                <button type="button"
                    class="me-3 px-3 py-2 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100"
                    data-modal-hide="edit-user-modal">Cancel</button>
                <button type="submit"
                    class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">Save
                    changes</button>
            </div>
        </form>
    </div>
@endsection
