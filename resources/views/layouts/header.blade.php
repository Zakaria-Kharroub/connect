<!doctype html>
<header lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        a{
            text-decoration: none;
        }
    </style>
    <title>Document</title>
</head>
<body>
<header >
    <nav
        class="fixed inset-x-0 top-0 z-10 w-full px-4 py-1 bg-white shadow-md border-slate-500 dark:bg-[#0c1015] transition duration-700 ease-out"
    >
        <div class="flex justify-between p-4">
            <a href="/" class="text-[2rem] leading-[3rem] tracking-tight font-bold text-black dark:text-white" style="text-decoration: none">
                YouConnect
            </a>
            <div style="display: flex; gap: 2rem; align-items: center">

                @if(Auth::check())

                    <div class="relative inline-block text-left">

                        <button id="dropdown-button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                            {{ Auth::user()->name }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="dropdown-menu" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                            <div class="py-2 p-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                                <a href="/profile" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">Profile</a>
                                <a href="#" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">Notification</a>
                                <a href="/dashboard" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">Add Post</a>
                                <form method="post" action="{{route('logout')}}">
                                    @csrf
                                    @method('post')
                                    <button class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">Log out</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        const dropdownButton = document.getElementById('dropdown-button');
                        const dropdownMenu = document.getElementById('dropdown-menu');
                        let isDropdownOpen = false;

                        function toggleDropdown() {
                            isDropdownOpen = !isDropdownOpen;
                            if (isDropdownOpen) {
                                dropdownMenu.classList.remove('hidden');
                            } else {
                                dropdownMenu.classList.add('hidden');
                            }
                        }

                        toggleDropdown();

                        dropdownButton.addEventListener('click', toggleDropdown);

                        window.addEventListener('click', (event) => {
                            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                                dropdownMenu.classList.add('hidden');
                                isDropdownOpen = false;
                            }
                        });
                    </script>

                @else
                    <div class="flex items-center space-x-4 text-lg font-semibold tracking-tight">
                        <a href="/login"
                           class="px-6 py-2 text-black transition duration-700 ease-out bg-white border border-black rounded-lg hover:bg-black hover:border hover:text-white dark:border-white dark:bg-inherit dark:text-white dark:hover:bg-white dark:hover:text-black"
                        >Sign in</a
                        >
                        <a href="/register"
                           class="px-6 py-2 text-white transition duration-500 ease-out bg-blue-700 rounded-lg hover:bg-blue-800 hover:ease-in hover:underline"
                        >Sign up</a
                        >
                    </div>
                @endif
            </div>



        </div>
    </nav>
</header>


</body>
    </html>
