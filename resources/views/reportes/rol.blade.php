<x-app-layout>

    <x-slot name="header">

        <h3 class="pt-4 text-2xl text-center">
            ASIGNACION DE ROLES
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4">
                    <p class="text-lg font-semibold">Nombre:</p>
                    <p class="border border-gray-300 rounded-md px-3 py-2 mt-1">{{ $users->name }}</p>
                    <br>
                    <form action="{{ route('reportes.update', $users) }}" method="post">
                        @method('put')
                        @csrf
                        <div>
                            <p class="text-lg font-semibold">Rol:</p>
                            @foreach ($roles as $rol)
                                <label class="block my-2">
                                    <input type="checkbox" name="roles[]" value="{{ $rol->id }}" >
                                    {{ $rol->name }}
                                </label>
                            @endforeach
                        </div>
                        <br>
                        <div class="flex justify-center">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Asignar rol
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

</x-app-layout>
