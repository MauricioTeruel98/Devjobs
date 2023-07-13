<div class="bg-gray-100 dark:bg-slate-700 p-5 mt-10 flex flex-col justify-center items-center rounded-lg">
    <h3 class="text-center font-bold text-2xl my-4">Postularme a esta vacante</h3>

    @if (session()->has('mensaje'))
        <div class="uppercase border-l-4 border-green-700 bg-green-100 text-green-700 font-bold p-2 my-5">
            {{session('mensaje')}}
        </div>
    @else
        <form class="w-96 mt-5" wire:submit.prevent='postularme'>
            <div class="mb-4">
                <x-input-label class="uppercase" for="cv" :value="__('Curriculum u Hoja de vida (PDF)')"/>
                <x-text-input id="cv" type="file" accept=".pdf" class="block mt-3 w-full" wire:model="cv" />
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message">
            @enderror

            <x-primary-button class="mt-5">
                {{__('Postularme')}}
            </x-primary-button>
        </form>
    @endif
</div>
