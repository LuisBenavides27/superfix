<div>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-1">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
                    <div class="col-span-2 md:col-span-1">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" wire:model="search" name="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Busca por activo fijo o serial">
                        </div>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <div class="flex items-center justify-end">
                            <select wire:model="filtroEstado" name="filtroEstado"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Filtrar estado ---</option>
                                <option value="1">Enviados</option>
                                <option value="2">Revision</option>
                                <option value="3">Reparados</option>
                            </select>
                        </div>
                    </div>
                </div>

                @if (auth()->user()->hasRole('Tecnico'))
                    <x-tecnico :activos="$activos" :centro="$centro"></x-tecnico>
                @elseif(auth()->user()->hasRole('Lider'))
                    <x-usuario :activoso="$activoso"></x-usuario>
                @else
                    <x-todos :activos="$activos" :centro="$centro"></x-todos>
                @endif

            </div>
        </div>
    </section>
</div>
