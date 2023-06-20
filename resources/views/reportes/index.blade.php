<x-app-layout>

    <x-slot name="header">

        <h3 class="pt-4 text-2xl text-center">
            GESTION DE REPORTES PARA ACTIVOS ENVIADOS A REPARACION
        </h3>
        <br>
        @if (session('info'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                <strong>
                    {{ session('info') }}
                </strong>
            </div>
        @endif

        @if (session('danger'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                <strong>
                    {{ session('danger') }}
                </strong>
            </div>
        @endif
    </x-slot>

    <div class="py-6">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> 

                    <a href="#"
                        class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="w-full">
                            <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900">Genrera Reporte en pdf</h2>
                            <p class="mt-4 text-gray-500 text-sm leading-relaxed justify text-justify">
                                En esta seccion podras crear un reporte pdf de los activos enviados a reparacion que ya han sido reparados,
                                selecciona la fecha de inicio y fecha final para generar el reporte segun sea requerido.
                            </p>
                            <br>
                            <form action="{{ route('reportes.create') }}" method="post">
                                @csrf
                                @method('get')
                                <div class="mb-4">
                                    <label for="fecha_inicio_1" class="block text-gray-700">Fecha de inicio:</label>
                                    <input required type="date" class="w-full border-gray-300 rounded-md"
                                        name="fecha_inicial">
                                </div>
                                <div class="mb-4">
                                    <label for="fecha_fin_1" class="block text-gray-700">Fecha de fin:</label>
                                    <input type="date" required name="fecha_final"
                                        class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                                        max="{{ date('Y-m-d') }}">
                                </div>
                                <div class="flex justify-center">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                        Generar reporte
                                    </button>
                                </div>
                            </form>
                        </div>
                    </a>
               
            </div>
        </div>
    </div>
</x-app-layout>
