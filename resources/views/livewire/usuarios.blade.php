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
                                placeholder="Busca usuarios por nombre o por email">
                        </div>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <div class="flex items-center justify-end">
                            <a href="{{ route('reportes.nuevo') }}"
                                class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                Agregar Usuario
                            </a>
                        </div>
                    </div>

                </div>

                <div class="overflow-x-auto">
                    @if ($users->count())

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">ID</th>
                                    <th scope="col" class="px-4 py-3">NOMBRE</th>
                                    <th scope="col" class="px-4 py-3">CARGO</th>
                                    <th scope="col" class="px-4 py-3">ZONA</th>
                                    <th scope="col" class="px-4 py-3">EMAIL</th>
                                    <th scope="col" class="px-4 py-3">ROL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->id }}
                                        </th>
                                        <td class="px-4 py-3">{{ $user->name }}</td>
                                        <td class="px-4 py-3">{{ $user->cargo }}</td>
                                        <td class="px-4 py-3">{{ $user->zone }}</td>
                                        <td class="px-4 py-3">{{ $user->email }}</td>
                                        <td class="px-4 py-3">
                                            @if ($user->hasRole('Admin'))
                                                <p>Admin</p>
                                            @elseif($user->hasRole('Tecnico'))
                                                <p>Tecnico</p>
                                            @elseif($user->hasRole('Lider'))
                                                <p>Lider</p>
                                            @elseif($user->hasRole('Mesa de ayuda'))
                                                <p>Mesa de ayuda</p>
                                            @else
                                                <p>Sin Asignar</p>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex justify space-x-6">
                                                @can('reportes.edit')
                                                    <a href="{{ route('reportes.edit', $user) }}"
                                                        class="text-blue-500 hover:text-blue-700">
                                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </a>
                                                @endcan
                                                <a href="{{ route('reportes.reset', $user) }}"
                                                    class="text-green-500 hover:text-green-700">
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" />
                                                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5" />
                                                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5" />
                                                    </svg>
                                                </a>
                                                @can('reportes.destroy')
                                                    <a wire:click="$emit('deleteUser',{{ $user->id }})"
                                                        class="text-red-500 hover:text-red-700">
                                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a>
                                                @endcan
                                                <a href="{{ route('reportes.actualizar', $user) }}"
                                                    class="text-purple-500 hover:text-purple-700">
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                        <path
                                                            d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="px-6 py-3">
                            {{ $users->links() }}
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            No existe ningun usuario con ese nombre o ese email, revisa si esta bien escrito.
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </section>
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('deleteUser', userId => {
                Swal.fire({
                    title: '¿Desea eliminar este usuario?',
                    text: "Recuerda que no podras revertir esta acción",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('usuarios', 'delete', userId);

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Se ha eliminado el usuario',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }
                })
            })
        </script>
    @endpush

</div>