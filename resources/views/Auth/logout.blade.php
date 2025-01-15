<x-guest-layout>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
           
            <x-primary-button class="ms-3">
                {{ __('Se déconneter') }}
            </x-primary-button>
    </form>

</x-guest-layout>
