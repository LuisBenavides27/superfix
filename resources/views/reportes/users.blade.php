<x-app-layout>

    <x-slot name="header">

        <h3 class="pt-4 text-2xl text-center">
            ADMINISTRACION DE USUARIOS 
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

         @livewire('usuarios')

        
</x-app-layout>
     