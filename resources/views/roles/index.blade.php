<x-app-layout>
    
    <x-slot name="header">        
        <h3 class="pt-4 text-2xl text-center">
            ADMINISTRACION DE ROLES Y PERMISOS
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
        <a href="{{route('roles.create')}}" class="px-2 py-1 text-sm rounded-md bg-blue-500 text-white float-right">Agregar Rol</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">                
                @if ($roles->count())
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">  ID  </th>
                                <th scope="col" class="px-4 py-3">NOMBRE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $rol->id }}
                                    </th>
                                    <td class="px-4 py-3">{{ $rol->name }}</td>                                    
                                    <td class="w-10">                                        
                                        <a href="{{route('roles.edit',$rol)}}"><x-button>EDITAR</x-button></a>
                                    </td>
                                    <td class="w-10">
                                        <form action="{{route('roles.destroy', $rol)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit">ELIMINAR</x-danger-button>                                            
                                        </form>
                                    </td>                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="overflow-x-auto">
                        No existe ningun usuario con ese nombre o ese email, revisa si esta bien escrito.
                    </div>
                @endif

            </div>
        </div>
    </div>

</x-app-layout>