<x-guest-layout>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
            <button type="submit" class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                {{ __('Log out') }}
            </button>
    </form>

</x-guest-layout>
