<x-layout>
    <x-slot:title>REGISTRARSE</x-slot:title>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl w-full space-y-8 bg-white p-10 rounded-2xl shadow-lg">
            <h2 class="text-center text-3xl font-bold text-gray-900">Crea tu cuenta</h2>

            <form class="space-y-6" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nombre -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            @error('name') aria-invalid="true" @enderror>
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Apellido -->
                    <div>
                        <label for="lastName" class="block text-sm font-medium text-gray-700">Apellido</label>
                        <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            @error('lastName') aria-invalid="true" @enderror>
                        @error('lastName')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Género -->
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Género</label>
                        <select name="gender" id="gender"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="Masculino" {{ old('gender') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ old('gender') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="Otro" {{ old('gender') == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('gender')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div>
                        <label for="birthdate" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                        <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            @error('birthdate') aria-invalid="true" @enderror>
                        @error('birthdate')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- DNI -->
                    <div>
                        <label for="dni" class="block text-sm font-medium text-gray-700">DNI</label>
                        <input type="text" id="dni" name="dni" value="{{ old('dni') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            @error('dni') aria-invalid="true" @enderror>
                        @error('dni')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Dirección -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            @error('address') aria-invalid="true" @enderror>
                        @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Teléfono -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            @error('phone') aria-invalid="true" @enderror>
                        @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto -->
                    <div>

                        
                        <label for="foto" class="block text-sm font-medium text-gray-700">Foto (opcional)</label>
                        <input type="file" id="foto" name="foto"
                            class="mt-1 block w-full rounded-md border border-gray-300 text-gray-700"
                            @error('foto') aria-invalid="true" @enderror>
                        @error('foto')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="md:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            @error('email') aria-invalid="true" @enderror>
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="md:col-span-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            @error('password') aria-invalid="true" @enderror>
                        @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </div>
   
    


</x-layout>
