<div >
        <a wire:click="$set('open', true)" ><svg class="h-8 w-8 text-blue-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  
        stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />  
        <circle cx="12" cy="12" r="3" /></svg> 
    </a>

   
        
   <x-dialog-modal wire:model="open" >

        <x-slot name='title' >
            Observaciones para el activo fijo <b>{{$activo->active}}</b> 
        </x-slot>

        <x-slot name='content' >   
               
          
                    <div class="p-6 flex space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>                                     
                                    <span class="text-gray-800">{{ $obs->elemento->user->name }}</span>
                                    <small class="ml-2 text-sm text-gray-600">{{ $obs->created_at->timezone('America/Bogota')->format('d/m/Y h:i A') }}</small>
                                </div>
                    
                            </div>
                            <p class="mt-4 text-lg text-gray-900">{{ $obs->observations }}</p>
                        </div>
                    </div>
                    @if ($obs->observations2)
                        <div class="p-6 flex space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-gray-800">{{ $obs->tecnico1 }}</span>
                                        <small class="ml-2 text-sm text-gray-600">{{ \Carbon\Carbon::parse($obs->entrega)->timezone('America/Bogota')->format('d/m/Y h:i A') }}</small>
                                    </div>
                        
                                </div>
                                <p class="mt-4 text-lg text-gray-900">{{ $obs->observations2 }}</p>
                            </div>
                        </div>                        
                    @endif
                    @if ($obs->observations3)
                        <div class="p-6 flex space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-gray-800">{{ $obs->tecnico2 }}</span>
                                        <small class="ml-2 text-sm text-gray-600">{{ $obs->updated_at->timezone('America/Bogota')->format('d/m/Y h:i A') }}</small>
                                    </div>
                        
                                </div>
                                <p class="mt-4 text-lg text-gray-900">{{ $obs->observations3 }}</p>
                            </div>
                        </div>                        
                    @endif
                    
          
                    
        </x-slot>

        <x-slot name='footer'>

        </x-slot> 
    </x-dialog-modal>  

</div> 