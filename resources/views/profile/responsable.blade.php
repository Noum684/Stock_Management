<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">Profil Responsable</h2>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label class="block text-gray-700">Nom</label>
            <input type="text" name="name" value="{{ $responsable->nom }}" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Prénom</label>
            <input type="text" name="name" value="{{ $responsable->prenom }}" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" value="{{ $responsable->email }}" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
            Mettre à jour
        </button>
    </form>
</div>
