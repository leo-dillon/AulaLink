<x-layout>
    <x-slot:title>Inicar Sesion</x-slot:title>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl w-full space-y-8 bg-white p-10 rounded-2xl shadow-lg">
            <h2 class="text-center text-3xl font-bold text-gray-900">Inicar Sesion</h2>

            <form class="space-y-6" action="{{ route('login.authenticate') }}" method="POST" >
                @csrf
                  
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                        Aplicar Canbios
                    </button>
                </div>
            </form>
        </div>
    </div>
   
    


</x-layout>
