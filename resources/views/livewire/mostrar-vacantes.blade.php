<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div
                class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-500 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500">Último Día: {{ $vacante->ultimo_dia }}</p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="{{ route('candidatos.index', $vacante) }}"
                        class="bg-slate-800 dark:bg-gray-200 py-2 px-4 rounded-lg text-white dark:text-slate-800 text-xs font-bold uppercase text-center">
                        {{ $vacante->candidatos->count() }}
                        Candidatos
                    </a>

                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Editar
                    </a>

                    <button 
                        wire:click="$emit( 'eliminar', {{ $vacante->id }} )"
                        class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                    >
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray 500">No hay vacantes para mostrar aquí</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Livewire.on('prueba', (vacanteId) => {
        //     alert(vacanteId)
        // });

        Livewire.on('eliminar', (vacanteId) => {
            Swal.fire({
            title: 'Eliminar vacante?',
            text: "Una vacante eliminada no se podrá recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminarla',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                //Eliminar la vacante desde el servidor
                Livewire.emit('eliminarVacante', vacanteId);

                Swal.fire(
                    'Eliminada!',
                    'La vacante ha sido eliminada',
                    'success'
                )
            }
        })
        });
    </script>

@endpush
