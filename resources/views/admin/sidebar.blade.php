<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ??
        'Derasya Store
                    ' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50">
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 shadow-sm">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="/" class="flex items-center gap-3 ms-2 md:me-24">
                        <i class="text-3xl text-blue-600 fa-solid fa-store"></i>
                        <span class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap">
                            Derasya Store
                        </span>
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <div class="hidden sm:flex items-center gap-2">
                        <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>
                        <span class="px-2 py-1 text-xs font-medium text-blue-600 bg-blue-100 rounded-full">
                            {{ Auth::user()->role }}
                        </span>
                    </div>
                    <div class="flex items-center">
                        <div class="relative">
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-blue-300"
                                data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="user photo">
                            </button>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg"
                                id="dropdown-user">
                                <div class="px-4 py-3" role="none">
                                    <p class="text-sm text-gray-900" role="none">
                                        {{ Auth::user()->name }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-500 truncate" role="none">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                                <ul class="py-1" role="none">
                                    <li>
                                        <a href="/homepage"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">User page</a>
                                    </li>
                                    <li>
                                        <a href="/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50"
                                            role="menuitem">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/admin/user"
                        class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-blue-50 group {{ Request::is('admin/user*') ? 'bg-blue-50 text-blue-600' : '' }}">
                        <i class="text-xl w-[15%] fa-solid fa-users"></i>
                        <span class="ms-3">User</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/barang"
                        class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-blue-50 group {{ Request::is('admin/barang*') ? 'bg-blue-50 text-blue-600' : '' }}">
                        <i class="text-xl w-[15%] fa-solid fa-box"></i>
                        <span class="ms-3">Barang</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                showCloseButton: true,
                closeButtonHtml: '&times;',
                closeButtonAriaLabel: 'Close this dialog',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'bg-blue-600'
                }
            });
        </script>
    @endif


    <div class="p-4 sm:ml-64 mt-14">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
