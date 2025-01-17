<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div style="text-align: center; margin-top: 100px;">
            <img src="/images/logo.png" alt="Logo" style="width: 150px; height: 150px;">
            <h1>Bienvenue</h1>
            <div>
                <a href="{{ route('login') }}" class="btn">Se connecter</a>
                <a href="{{ route('register') }}" class="btn">S'inscrire</a>
            </div>
        </div>
    </div>
</x-app-layout>
