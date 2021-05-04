<nav x-data="{ open: false }" class="navbar navbar-light bg-light">
    <!-- Primary Navigation Menu -->
    <div class="col-md-12">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="col-md-4">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="col-md-2" />
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="col-md-2">
                <x-dropdown  width="48">
                    <x-slot name="trigger">
                        <button class="col-md-6">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>



        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">

                <div class="col-md-2">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
