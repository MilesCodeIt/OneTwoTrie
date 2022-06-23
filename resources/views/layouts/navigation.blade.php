<nav class="sticky bg-gray-200 top-0 left-0 right-0 w-screen h-16 shadow flex justify-between items-center px-6 gap-4">
    <a class="hidden sm:block hover:text-teal-500" href="{{ route('index') }}">
        OneTwoTrie
    </a>

    <form method="GET" action="/search" class="w-full max-w-xl">
        @csrf
        <input
            id="navigation__search-input"
            name="q"
            placeholder="Rechercher un produit (nom, marque, code-barre, ...)"
            autocomplete="off"

            class="
                block p-2 w-full transition rounded-lg
                text-gray-900 text-sm bg-gray-50
                border border-gray-300

                focus:ring-teal-500
                focus:border-teal-500

                dark:bg-gray-700
                dark:border-gray-600
                dark:placeholder-gray-400
                dark:text-white
                dark:focus:ring-teal-500
                dark:focus:border-teal-500
            "
            type="text"
        />
    </form>

    <div class="relative inline-block text-left">
        <div>
            <img
                class="
                    flex transition rounded-full w-12 aspect-square
                    text-gray-900 text-sm bg-gray-50
                    border-2 border-gray-300
                    cursor-pointer

                    hover:ring-teal-500
                    hover:border-teal-500

                    dark:bg-gray-700
                    dark:border-gray-600
                    dark:placeholder-gray-400
                    dark:text-white
                    dark:hover:ring-teal-500
                    dark:hover:border-teal-500
                "
                src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-26.jpg"
                id="navigation__menu-button"
                alt="no user icon"
            />
        </div>

        <div
            class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
            id="navigation__menu"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="navigation__menu-button"
            tabindex="-1"
        >
            <x-nav-dropdown-group>
                @auth
                    <x-nav-dropdown-item href="{{ route('dashboard') }}">
                        Dashboard
                    </x-nav-dropdown-item>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-dropdown-item :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-nav-dropdown-item>
                    </form>
                @endauth
                @guest
                    <x-nav-dropdown-item href="{{ route('login') }}">
                        Login
                    </x-nav-dropdown-item>
                    <x-nav-dropdown-item href="{{ route('register') }}">
                        Register
                    </x-nav-dropdown-item>
                @endguest
            </x-nav-dropdown-group>
        </div>
    </div>
</nav>

<script>
    let nav_menu_opened = false;
    const nav_menu_button = document.getElementById("navigation__menu-button");
    const nav_menu = document.getElementById("navigation__menu");
    nav_menu_button.addEventListener("click", () => {
        nav_menu_opened = !nav_menu_opened;
        nav_menu.classList.toggle("hidden");
    });

    const nav_search_input = document.getElementById("navigation__search-input");
    nav_search_input.addEventListener("input", async (event) => {
        const value = event.currentTarget.value.trim();
        if (!value) return;

        const response = await fetch(`/api/search?query=${value}`, {
            method: "POST"
        });

        const data = await response.json();
        console.log(data);
    });
</script>
