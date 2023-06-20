<div class="overflow-x-auto">
    @if ($activos->count())
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">ID</th>
                    <th scope="col" class="px-4 py-3">NOMBRE</th>
                    <th scope="col" class="px-4 py-3">Activo </th>
                    <th scope="col" class="px-4 py-3">serial / imei</th>
                    <th scope="col" class="px-4 py-3">Fecha de envio</th>
                    <th scope="col" class="px-4 py-3">Fecha de entrega</th>
                    <th scope="col" class="px-4 py-3">Origen</th>
                    <th scope="col" class="px-4 py-3">Estado</th>
                    <th scope="col" class="px-4 py-3">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activos as $activo)
                    {{-- @if ($activo->id == 1) --}}
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
                        @if ($activo->status == 3)
                            <td class="px-4 py-3">
                                {{ $activo->updated_at->timezone('America/Bogota')->format('d/m/Y h:i A') }}</td>
                        @else
                            <td class="px-4 py-3"></td>
                        @endif
                        <td class="px-4 py-3">{{ $activo->centro->name }}</td>

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
                        @if ($activo->zone == auth()->user()->zone)
                            <td class="px-4 py-3">
                                <a href="{{ route('elementos.edit', $activo) }}">
                                    <svg class="h-8 w-8 text-green-500" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4" />
                                        <line x1="14.5" y1="5.5" x2="18.5" y2="9.5" />
                                        <polyline points="12 8 7 3 3 7 8 12" />
                                        <line x1="7" y1="8" x2="5.5" y2="9.5" />
                                        <polyline points="16 12 21 17 17 21 12 16" />
                                        <line x1="16" y1="17" x2="14.5" y2="18.5" />
                                    </svg>
                                </a>
                            </td>                           
                        @else
                            <td class="px-4 py-3">
                                @livewire('ver-activo', ['activo' => $activo], key($activo->id))
                            </td>
                        @endif
                    </tr>
                    {{--  @endif --}}
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
