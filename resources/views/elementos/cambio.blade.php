<div class="w-full xl:w-3/4 lg:w-11/12 flex">
    <!-- Col -->
    <div class="w-full ">
        @if ($elemento->status == 1 or $elemento->status == 2)
            <h3 class="pt-4 text-2xl text-center">CAMBIAR ESTADO DE ACTIVOS</h3>
        @elseif($elemento->status == 3)
            <h3 class="pt-4 text-2xl text-center">INFORMACION DEL ACTIVO REPARADO</h3>
        @endif
        <br><br>
        <div class="mb-6 md:flex md:justify-between">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                    Nombre de Activo
                </label>
                <input
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="name" type="text" value="{{ $elemento->name }}" readonly />
            </div>
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="type">
                    Tipo
                </label>
                <input readonly
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="type" type="text" value="{{ $elemento->type }}" />
            </div>
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="active">
                    Activo Fijo
                </label>
                <input readonly
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="active" type="text" value="{{ $elemento->active }}" />
            </div>
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="serial">
                    Serial / Imei
                </label>
                <input readonly
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="serial" type="text" value="{{ $elemento->serial }}" />
            </div>
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="mark">
                    Marca
                </label>
                <input required
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="mark" type="text" value="{{ $elemento->mark }}" />
            </div>
        </div>
        <div class="mb-6 md:flex md:justify-between">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="guide">
                    No. Guia
                </label>
                <input readonly
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="guide" type="text" value="{{ $elemento->guide }}" />
            </div>
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="guide">
                    Centro de costo
                </label>
                <input readonly
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="guide" type="text" value="{{ $elemento->centro->name }}" />
            </div>
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="transport">
                    Transportadora
                </label>
                <input readonly
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="transport" type="text" value="{{ $elemento->transport }}" />
            </div>
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="transport">
                    Fecha de envio
                </label>
                <input readonly
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="transport" type="text"
                    value="{{ $elemento->created_at->timezone('America/Bogota')->format('d/m/Y h:i A') }}" />
            </div>
            <div class="mb-4 md:mr-2 md:mb-0">
                <br>
                <x-button class="bg-blue-500 text-white" onclick="toggleImage()">Activo enviado</x-button>
            </div>
        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="observations">
                Observaciones de envio:
            </label>
            <b>
                <textarea readonly
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">{{ $obs->observations }}</textarea>
            </b>
        </div>

        <div id="contenedor-imagen" hidden>
            <div class="mb-4">
                <img src="{{ Storage::url($image[0]['url']) }}" class="w-1/2 mx-auto">
            </div>
        </div>

        @if ($elemento->status == 1)
            <form id="recibe" action="{{ route('elementos.update', $elemento) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="observations">
                        Observaciones de recepcion:
                    </label>
                    <textarea placeholder="Escribe como se recibe el activo" name="observation2" required
                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"></textarea>
                    @error('observation2')
                        <small class="block mt-1 text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-6 text-center">
                    <button id="recibe"
                        class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                        type="sumbit">
                        CONFIRMA RECEPCION DE ACTIVO
                    </button>
                </div>
            </form>
        @elseif($elemento->status == 2)
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="observations3">
                    Observaciones de recepcion:
                </label>
                <textarea placeholder="Confima la reparacion que se le hizo al activo" name="observations3" readonly 
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">{{$obs->observations2}}
                </textarea>
            </div>
            <form id="reparado" action="{{ route('elementos.destroy', $elemento) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('delete')
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="image">
                        Sube la Imagen de activo reparado para enviar
                    </label>
                    <input required
                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="image" type="file" value="{{ old('image') }}" accept="image/*" />
                    @error('image')
                        <small class="block mt-1 text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="observations3">
                        Observaciones de entrega:
                    </label>
                    <textarea placeholder="Confima la reparacion que se le hizo al activo" name="observations3" required
                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"></textarea>
                    @error('observations3')
                        <small class="block mt-1 text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-6 text-center">
                    <button id="reparado"
                        class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                        type="sumbit">CONFIRMA REPARACION Y ENVIO DEL ACTIVO
                    </button>
                </div>
            </form>
        @endif
        @if ($elemento->status == 3)
            <div class="mb-6 md:flex md:justify-between">
                <div class="mb-4 md:mr-2 md:mb-0">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="transport">
                        Fecha de recepcion
                    </label>
                    <input readonly
                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="transport" type="text"
                        value="{{ \Carbon\Carbon::parse($obs->entrega)->timezone('America/Bogota')->format('d/m/Y h:i A') }}" />
                </div>
                <div class="mb-4 md:mr-2 md:mb-0">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="transport">
                        tecnico que recibe
                    </label>
                    <input 
                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="transport" type="text" value="{{ $obs->tecnico1 }}" />
                </div>
                <div class="mb-4 md:mr-2 md:mb-0">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="transport">
                        Fecha de entrega
                    </label>
                    <input readonly
                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="transport" type="text"
                        value="{{ $obs->updated_at->timezone('America/Bogota')->format('d/m/Y h:i A') }}" />
                </div>
                <div class="mb-4 md:mr-2 md:mb-0">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="transport">
                        tecnico que entrega
                    </label>
                    <input readonly
                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="transport" type="text" value="{{ $obs->tecnico2 }}" />
                </div>
                <div class="mb-4 md:mr-2 md:mb-0">
                    <br>
                    <x-danger-button class="bg-blue-500 text-white" onclick="toggleImage2()">Activo reparado
                    </x-danger-button>
                </div>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="observations2">
                    Observaciones de recepcion:
                </label>
                <b>
                    <textarea readonly
                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">{{ $obs->observations2 }}</textarea>
                </b>
            </div>
            <div id="contenedor-imagen2" hidden>
                <div class="mb-4">
                    <img src="{{ Storage::url($image[1]['url']) }}" class="w-1/2 mx-auto">
                </div>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="observations3">
                    Observaciones de reparacion:
                </label>
                <b>
                    <textarea readonly
                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">{{ $obs->observations3 }}</textarea>
                </b>
            </div>
        @endif
    </div>
</div>

@if ($elemento->status == 1)
    <script>
        document.getElementById('recibe').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            // Verifica si todos los campos requeridos están completos
            if (this.checkValidity()) {
                // Muestra el cuadro de confirmación
                Swal.fire({
                    title: 'Confirmar Recepcion',
                    text: '¿Estás seguro de confirmar la recepcion del activo?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario confirmó, envía el formulario manualmente
                        event.target.submit();
                    }
                });
            } else {
                // Muestra un mensaje de error si faltan campos requeridos
                Swal.fire({
                    title: 'Campos incompletos',
                    text: 'Por favor, completa todos los campos requeridos.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script> 
@endif
@if ($elemento->status == 2)
    <script>
        document.getElementById('reparado').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            // Verifica si todos los campos requeridos están completos
            if (this.checkValidity()) {
                // Muestra el cuadro de confirmación
                Swal.fire({
                    title: 'Confirmar Reparacion',
                    text: '¿Estás seguro de confirmar la reparacion del activo?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario confirmó, envía el formulario manualmente
                        event.target.submit();
                    }
                });
            } else {
                // Muestra un mensaje de error si faltan campos requeridos
                Swal.fire({
                    title: 'Campos incompletos',
                    text: 'Por favor, completa todos los campos requeridos.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
@endif