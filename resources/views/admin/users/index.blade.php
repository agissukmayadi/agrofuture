@extends('layout.admin')


@section('content')
    <h1 class="text-3xl font-bold mb-5">Users</h1>
    <div class="w-full bg-white p-5 shadow-md">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-3">
            <form class="relative w-full lg:w-[28rem] order-2 lg:order-1">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
                </div>
                <input type="search" id="default-search" name="name"
                    class=" block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 "
                    placeholder="Search name" value="{{ request('name') }}" />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-[5.5px] bg-indigo-600 hover:bg-indigo-700 font-medium rounded text-sm px-4 py-2">Search</button>
            </form>
            <button data-modal-target="create-user-modal" id="button-modal-create-user"
                data-modal-toggle="create-user-modal"
                class="block w-full order-1 lg:order-2 lg:w-fit bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg text-sm px-5 py-2 text-center">Create
                User</button>
            <!-- Create Modal -->
            <div id="create-user-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full ">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow ">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                            <h3 class="text-lg font-semibold text-gray-900 ">
                                Create New User
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                data-modal-toggle="create-user-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" action="{{ route('admin.user.store') }}" method="POST">
                            @csrf
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                    <input type="text" name="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 "
                                        placeholder="Type user name" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-red-500 text-xs">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-span-2">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                                    <input type="text" name="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 "
                                        placeholder="Type user email" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-red-500 text-xs">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-span-2">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                                    <input type="password" name="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 "
                                        placeholder="Type user password" value="{{ old('password') }}">
                                    @error('password')
                                        <small class="text-red-500 text-xs">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-span-2">
                                    <label for="password_confirmation"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Password Confirmation</label>
                                    <input type="password" name="password_confirmation"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 "
                                        placeholder="Type password confirmation" value="{{ old('password_confirmation') }}">
                                    @error('password_confirmation')
                                        <small class="text-red-500 text-xs">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-span-2">
                                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Role</label>
                                    <select name="role"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full">
                                        <option value="" disabled selected>Select role</option>
                                        <option value="admin" @if (old('role') == 'admin') selected @endif>Admin
                                        </option>
                                        <option value="customer" @if (old('role') == 'customer') selected @endif>Customer
                                        </option>
                                    </select>
                                    @error('role')
                                        <small class="text-red-500 text-xs">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-indigo-700 hover:bg-indigo-800  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Add new user
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if (request()->has('name') && !empty(request('name')))
            <div class="lg:flex lg:justify-start">
                <a href="{{ route('admin.users') }}"
                    class="text-gray-500 block w-full lg:w-[28rem] text-center hover:bg-light py-2 mt-2 text-sm"><i
                        class="fa-solid fa-xmark"></i> Clear
                    Filter</a>
            </div>
        @endif
        @if (session()->has('success'))
            <div id="alert"
                class="flex items-center p-4 my-4 text-green-800 rounded-lg bg-green-50 border border-green-600 "
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 "
                    data-dismiss-target="#alert" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        @if (session()->has('error'))
            <div id="alert"
                class="flex items-center p-4 my-4 text-red-800 rounded-lg bg-red-50 border border-red-600 "
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 "
                    data-dismiss-target="#alert" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="relative overflow-x-auto mt-4">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase bg-indigo-600 text-white ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ ucfirst($user->role) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->created_at }}
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <button class="text-indigo-600 hover:text-indigo-800 hover:underline font-medium"
                                    data-modal-target="edit-user-modal" id="button-modal-edit-user"
                                    data-modal-toggle="edit-user-modal" data-user="{{ $user }}"
                                    data-user-id="{{ $user->id }}" type="button">
                                    Edit
                                </button>

                                <button class="text-red-600 hover:text-red-800 hover:underline font-medium"
                                    data-modal-target="delete-user-modal" id="button-modal-delete-user"
                                    data-modal-toggle="delete-user-modal" type="button"
                                    data-user="{{ $user }}">
                                    Delete
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $users->links() }}
        </div>
    </div>
    <div id="edit-user-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full ">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Edit User
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-toggle="edit-user-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="#" method="POST" id="edit-user-form">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                            <input type="text" name="name" id="edit-user-name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 "
                                placeholder="Type user name" value="">
                            @error('name')
                                <small class="text-red-500 text-xs">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                            <input type="text" name="email" id="edit-user-email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 "
                                placeholder="Type user email" value="">
                            @error('email')
                                <small class="text-red-500 text-xs">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">New
                                Password</label>
                            <input type="password" name="password" id="edit-user-password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 "
                                placeholder="Type user password" value="">
                            @error('password')
                                <small class="text-red-500 text-xs">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Password Confirmation</label>
                            <input type="password" name="password_confirmation" id="edit-user-password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 "
                                placeholder="Type password confirmation" value="">
                            @error('password_confirmation')
                                <small class="text-red-500 text-xs">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Role</label>
                            <select name="role"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                                id="edit-user-role">
                                <option value="" disabled selected>Select role</option>
                                <option value="admin">Admin
                                </option>
                                <option value="customer">Customer
                                </option>
                            </select>
                            @error('role')
                                <small class="text-red-500 text-xs">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-indigo-700 hover:bg-indigo-800  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Save user
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div id="delete-user-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow ">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-hide="delete-user-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are
                        you sure you want to delete this user?</h3>
                    <a href="#" id="delete-user-link"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </a>
                    <button data-modal-hide="delete-user-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $('[data-modal-target="delete-user-modal"]').on('click', function() {
            const user = $(this).data('user');
            let deleteUrl = "{{ route('admin.user.destroy', ':id') }}";
            deleteUrl = deleteUrl.replace(':id', user.id);
            $('#delete-user-link').attr('href', deleteUrl);
        })

        $('[data-modal-target="edit-user-modal"]').on('click', function() {
            // Get the user data from the button's data-user attribute
            const user = $(this).data('user');
            // // Set the name input value in the modal
            $('#edit-user-name').val(user.name);
            $('#edit-user-email').val(user.email);
            $('#edit-user-role').val(user.role);

            let updateUrl = "{{ route('admin.user.update', ':id') }}";
            updateUrl = updateUrl.replace(':id', user.id);

            // Set action form di dalam modal
            $('#edit-user-form').attr('action', updateUrl);
        });
    </script>
    @if (session('error_store'))
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('#button-modal-create-user').click();
                }, 300); // Penundaan 300ms
            });
        </script>
    @endif

    @if (session('error_update'))
        <script>
            $(document).ready(function() {
                let userId = "{{ session('user-edit-id') }}";
                setTimeout(function() {
                    $('[data-user-id="' + userId + '"]').click();
                }, 300); // Penundaan 300ms
            });
        </script>
    @endif
@endsection
