<div>
    <div class="mb-5">
        <h3 class="font-bold text-3xl my3">
            {{$vacante->titulo}}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 dark:bg-slate-700 p-4 my-1 rounded-lg">
            <p class="font-bold text-sm uppercase my-3">
                Empresa: 
                <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
            </p>

            <p class="font-bold text-sm uppercase my-3">
                Último día para postularse: 
                <span class="normal-case font-normal">{{ $vacante->ultimo_dia }}</span>
            </p>

            <p class="font-bold text-sm uppercase my-3">
                Categoria: 
                <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
            </p>

            <p class="font-bold text-sm uppercase my-3">
                Salario: 
                <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-6">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{ 'Imagen vacante' . $vacante->titulo }}">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción del puesto:</h2>
            <p>{{$vacante->descripcion}}</p>
        </div>
    </div>

    @guest
    <div class="mt-5 bg-gray-50 dark:bg-slate-700 border border-dashed p-5 text-center">
        <p>
            ¿Deseas aplicar a esta vacante? <a class="font-bold text-indigo-300" href="{{ route('register') }}">Obten una cuenta y aplica a esta y a otras vacantes</a>
        </p>
    </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot

</div>
