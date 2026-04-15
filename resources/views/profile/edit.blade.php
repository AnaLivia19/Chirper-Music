<x-layout>
    <div class="max-w-xl mx-auto mt-10">

        <h1 class="text-2xl font-bold mb-6">Seu Perfil</h1>

        <form method="POST" action="/profile" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Avatar -->
            <div class="mb-4">
                @if($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" class="w-20 h-20 rounded-full mb-2">
                @endif

                <input type="file" name="avatar" class="file-input file-input-bordered w-full">
            </div>

            <!-- Bio -->
            <div class="mb-4">
                <textarea
                    name="bio"
                    class="textarea textarea-bordered w-full"
                    maxlength="160"
                    placeholder="Sua bio..."
                >{{ old('bio', $user->bio) }}</textarea>
            </div>

            <button class="btn btn-primary">Salvar</button>
        </form>

    </div>
</x-layout>