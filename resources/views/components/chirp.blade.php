@props(['chirp'])

<div class="card bg-base-100 shadow mb-4">
    <div class="card-body">

        <div class="flex space-x-3">

            <!-- Avatar -->
            <div class="avatar">
                <div class="w-10 rounded-full overflow-hidden">
                    @if ($chirp->user?->avatar)
                        <img src="{{ asset('storage/' . $chirp->user->avatar) }}"
                             alt="{{ $chirp->user->name }}">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($chirp->user?->name ?? 'User') }}"
                             alt="Avatar padrão">
                    @endif
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="min-w-0 flex-1">

                <!-- Header -->
                <div class="flex justify-between w-full">
                    <div class="flex items-center gap-1">
                        <span class="text-sm font-semibold">
                            {{ $chirp->user?->name ?? 'Anonymous' }}
                        </span>

                        <span class="text-base-content/60">·</span>

                        <span class="text-sm text-base-content/60">
                            {{ $chirp->created_at->diffForHumans() }}
                        </span>
                    </div>

                    @can('update', $chirp)
                        <div class="flex gap-1">
                            <a href="/chirps/{{ $chirp->id }}/edit" class="btn btn-ghost btn-xs">
                                Edit
                            </a>

                            <form method="POST" action="/chirps/{{ $chirp->id }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Are you sure?')"
                                        class="btn btn-ghost btn-xs text-error">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>

                <!-- MENSAGEM (AQUI ESTAVA O ERRO DE LAYOUT) -->
                <p class="mt-2 text-base-content">
                    {{ $chirp->message }}
                </p>

            </div>
        </div>

    </div>
</div>