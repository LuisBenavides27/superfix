<x-app-layout>
    <x-slot name="header">
       
        <h3 class="pt-4 text-2xl text-center">
            GESTION DE ACTIVOS ENVIADOS A REPARACION
        </h3>
        <br>
            @if (session('info'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">                       
                        <strong>
                            {{ session('info') }} 
                        </strong>
                    </div>
            @endif                          
        
    </x-slot>

    @livewire('activos')
        
</x-app-layout>
