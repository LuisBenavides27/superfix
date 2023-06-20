<x-app-layout>
    
    <x-slot name="header">     

        <h3 class="pt-4 text-2xl text-center">
            CREAR NUEVO ROL
        </h3>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">                
                <div class="p-4">
                    <form action="{{ route('roles.store') }}" method="POST">                       
                       @csrf
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NOMBRE</label>
                            <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            @error('name')
                                <small class="block mt-1 text-red-500">{{ $message }}</small>
                            @enderror
                        </div> 
                        
                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LISTA DE PERMISOS</label>
                            @foreach ($permissions as $permission)
                                <input name="permissions[]" type="checkbox" value="{{$permission->id}}"> {{$permission->description}}
                                <br>
                            @endforeach
                        </div> 

                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                            CREAR
                        </button>
                          
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>