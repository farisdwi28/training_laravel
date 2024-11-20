<div class="w-full min-h-screen bg-gray-100">
    <dh-component>
        <div class="flex flex-no-wrap">
            <!-- Sidebar -->
            <div class="w-64 hidden sm:flex flex-col justify-between bg-gray-800 shadow min-h-screen">
                <div class="px-6">
                    <ul class="mt-12 space-y-6">
                        <li class="flex justify-between items-center text-gray-300">
                            <a href="/units"
                                class="flex items-center space-x-2 focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                </svg>
                                <span class="text-sm">Unit</span>
                            </a>
                        </li>
                        <li class="flex justify-between items-center text-gray-400 hover:text-gray-300">
                            <a href="/employee"
                                class="flex items-center space-x-2 focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                    </path>
                                </svg>
                                <span class="text-sm">Employee</span>
                            </a>
                        </li>
                        <li class="flex justify-between items-center text-gray-400 hover:text-gray-300">
                            <a href="#"
                                class="flex items-center space-x-2 focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                </svg>
                                <span class="text-sm">Performance</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Mobile Sidebar -->
            <div class="sm:hidden">
                <div id="mobile-nav"
                    class="fixed top-0 left-0 w-64 h-full bg-gray-800 shadow flex flex-col justify-between transform -translate-x-full transition-transform duration-300 z-50">
                    <button id="closeSideBar"
                        class="absolute top-4 right-4 h-10 w-10 bg-gray-800 text-white rounded-full hidden focus:ring-2 focus:ring-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <div class="px-6 py-4">
                        <ul class="space-y-6">
                            <li>
                                <a href="#" class="flex items-center space-x-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                        <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                        <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                        <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                    </svg>
                                    <span class="text-sm">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Toggle Button -->
                <button id="openSideBar"
                    class="absolute top-4 left-4 h-10 w-10 bg-gray-800 text-white rounded-full focus:ring-2 focus:ring-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-auto" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

        </div>
    </dh-component>
    <script>
        var sideBar = document.getElementById("mobile-nav");
        var openSidebar = document.getElementById("openSideBar");
        var closeSidebar = document.getElementById("closeSideBar");

        function sidebarHandler(flag) {
            if (flag) {
                sideBar.style.transform = "translateX(0px)";
                openSidebar.classList.add("hidden");
                closeSidebar.classList.remove("hidden");
            } else {
                sideBar.style.transform = "translateX(-260px)";
                closeSidebar.classList.add("hidden");
                openSidebar.classList.remove("hidden");
            }
        }

        // Event listeners
        openSidebar.addEventListener("click", function() {
            sidebarHandler(true);
        });

        closeSidebar.addEventListener("click", function() {
            sidebarHandler(false);
        });
    </script>
</div>
