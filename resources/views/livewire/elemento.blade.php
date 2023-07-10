<div>
    <div class="container mx-auto">

        <div class="flex justify-center px-6 my-12">

            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->

                <div id="picture" class="w-full h-auto bg-gray-100 hidden lg:block lg:w-4/12 bg-cover rounded-l-lg"
                    style="background-image: url('{{ asset('storage/tec1.png') }}')">

                </div>
                <!-- Col -->
                <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">AGREGAR ACTIVOS PARA REPARAR</h3>
                    <br>
                    <!-- Mensajes de error para Activo Fijo y Serial / Imei -->
                    <div class="text-justify">
                        @error('active')
                            <small class="block mt-1 text-red-500">{{ $message }}</small>
                        @enderror
                        @error('serial')
                            <small class="block mt-1 text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <br>
                    <form id="myForm" action="{{ route('elementos.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                                    Nombre de Activo
                                </label>
                                <input required id="name" autocomplete="active"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="name" type="text" placeholder="Impresora" value="{{ old('name') }}" />
                                @error('name')
                                    <small class="block mt-1 text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="type">
                                    Tipo
                                </label>
                                <input required id="type"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="type" type="text" placeholder="TMU" value="{{ old('type') }}" />
                                @error('type')
                                    <small class="block mt-1 text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="active">
                                    Activo Fijo
                                </label>
                                <input id="active"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="active" type="text" placeholder="12487" value="{{ old('active') }}" />
                            </div>
                        </div>
                        <div class="mb-6 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="serial">
                                    Serial / Imei
                                </label>
                                <input id="serial"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="serial" type="text" placeholder="1457844SD457E4"
                                    value="{{ old('serial') }}" />
                            </div>
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="mark">
                                    Marca
                                </label>
                                <input required id="mark"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="mark" type="text" placeholder="Epson" value="{{ old('mark') }}" />
                                @error('mark')
                                    <small class="block mt-1 text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="transport">
                                    Transportadora
                                </label>
                                <input required id="transport"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="transport" type="text" placeholder="Serviveloz"
                                    value="{{ old('transport') }}" />
                                @error('transport')
                                    <small class="block mt-1 text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-6 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="guide">
                                    No. Guia
                                </label>
                                <input id="guide"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="guide" type="text" placeholder="12458965874"
                                    value="{{ old('guide') }}" />
                                @error('guide')
                                    <small class="block mt-1 text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="centro_id">
                                    Centro de costo
                                </label>
                                <select required id="centro_id" name="centro_id"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                    <option value="{{ null }}">-- seleccione origen </option>
                                    @foreach ($centros as $centro)
                                        <option value="{{ $centro->id }}" >{{ $centro->name }}</option>
                                    @endforeach
                                </select>                                
                                @error('centro_id')
                                    <small class="block mt-1 text-red-500">{{ $message }}</small>
                                @enderror
                            </div>                       
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="zone">
                                    Destino
                                </label>
                                <select required name="zone" id="zone"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                    <option value="{{ null }}">-- seleccione destino ---</option>
                                    <option value="PASTO">PASTO</option>
                                    <option value="IPIALES">IPIALES</option>
                                    <option value="TUMACO">TUMACO</option>
                                    <option value="LA UNION">LA UNION</option>
                                    <option value="PUTUMAYO">PUERTO ASIS</option>
                                </select>
                                @error('zone')
                                    <small class="block mt-1 text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div> 
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="image">
                                Imagen de activo a enviar: (Procura tomar la foto de forma Horizontal)
                            </label>
                            <input required id="image"
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                name="image" type="file" value="{{ old('image') }}" accept="image/*" />
                            @error('image')
                                <small class="block mt-1 text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="observations">
                                Observaciones:
                            </label>
                            <textarea required name="observations" placeholder="Se envia para cambio de cabezote" id="observations"
                                value="{{ old('observations') }}"
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">{{ old('observations') }}</textarea>
                            @error('observations')
                                <small class="block mt-1 text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-6 text-center">
                            <button id="submit-button"
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="sumbit">
                                Registrar Activo
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.getElementById('myForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Evita el envío automático del formulario

                // Verifica si todos los campos requeridos están completos
                if (this.checkValidity()) {
                    // Muestra el cuadro de confirmación
                    Swal.fire({

                        title: 'Confirmar envío',
                        text: '¿Estás seguro de que deseas enviar el formulario?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Enviar',
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
    @endpush
</div>
