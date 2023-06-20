<div class="overflow-x-auto">
    @if ($activos->count())
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">ID</th>
                    <th scope="col" class="px-4 py-3">Nombre</th>
                    <th scope="col" class="px-4 py-3">Activo Fijo</th>
                    <th scope="col" class="px-4 py-3">serial / imei</th>
                    <th scope="col" class="px-4 py-3">Fecha de envio</th>
                    <th scope="col" class="px-4 py-3">Origen</th>
                    <th scope="col" class="px-4 py-3">Fecha de entrega</th>
                    <th scope="col" class="px-4 py-3">Destino</th>
                    <th scope="col" class="px-4 py-3">Estado</th>
                    <th scope="col" class="px-4 py-3">action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($activos as $activo)
                   
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $activo->id }}
                            </th>
                            <td class="px-4 py-3">{{ $activo->name }}</td>
                            <td class="px-4 py-3">{{ $activo->active }}</td>
                            <td class="px-4 py-3">{{ $activo->serial }}</td>

                            <td class="px-4 py-3">
                                {{ $activo->created_at->timezone('America/Bogota')->format('d/m/Y h:i A') }}</td>
                            <td class="px-4 py-3">{{ $activo->centro->name }}</td>
                            @if ($activo->status == 3)
                                <td class="px-4 py-3">
                                    {{ $activo->updated_at->timezone('America/Bogota')->format('d/m/Y h:i A') }}</td>
                            @else
                                <td class="px-4 py-3"></td>
                            @endif
                            <td class="px-4 py-3">{{ $activo->zone }}</td>
                            <td class="px-4 py-3">
                                @if ($activo->status == 1)
                                    <span
                                        class="inline-flex items-center bg-yellow-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                        <span class="w-2 h-2 mr-1 bg-yellow-500 rounded-full"></span>
                                        Enviado
                                    </span>
                                @elseif($activo->status == 2)
                                    <span
                                        class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                        <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                        En revision
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                        <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                        Reparado
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @livewire('ver-activo', ['activo' => $activo], key($activo->id))
                            </td>
                        </tr>
                    
                @endforeach

            </tbody>
        </table>

        <div class="px-6 py-3">
            {{ $activos->links() }}
        </div>
    @else
        <div class="overflow-x-auto">
            No existe ningun elemento con ese activo o serial
        </div>
    @endif
</div>