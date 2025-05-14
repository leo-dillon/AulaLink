<x-layout>
        <x-slot:title> REGISTRARSE </x-slot:title>

<form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf

    <div>
        <!-- Nombre -->
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" @error('name') aria-invalid="true" @enderror>
        @error('name') <div><p>{{ $message }}</p></div> @enderror
    </div>

    <div>
        <!-- Apellido -->
        <label for="lastName">Apellido</label>
        <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" @error('lastName') aria-invalid="true" @enderror>
        @error('lastName') <div><p>{{ $message }}</p></div> @enderror
    </div>

    <div>
        <!-- Género -->
        <label for="gender">Género</label>
        <select name="gender" id="gender">
            <option value="Masculino" {{ old('gender') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ old('gender') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
            <option value="Otro" {{ old('gender') == 'Otro' ? 'selected' : '' }}>Otro</option>
        </select>
        @error('gender') <div><p>{{ $message }}</p></div> @enderror
    </div>

    <div>
        <!-- Fecha de nacimiento -->
        <label for="birthdate">Fecha de nacimiento</label>
        <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" @error('birthdate') aria-invalid="true" @enderror>
        @error('birthdate') <div><p>{{ $message }}</p></div> @enderror
    </div>

    <div>
        <!-- DNI -->
        <label for="dni">DNI</label>
        <input type="text" id="dni" name="dni" value="{{ old('dni') }}" @error('dni') aria-invalid="true" @enderror>
        @error('dni') <div><p>{{ $message }}</p></div> @enderror
    </div>

    

    <div>
        <!-- Dirección -->
        <label for="address">Dirección</label>
        <input type="text" id="address" name="address" value="{{ old('address') }}" @error('address') aria-invalid="true" @enderror>
        @error('address') <div><p>{{ $message }}</p></div> @enderror
    </div>

    <div>
        <!-- Teléfono -->
        <label for="phone">Teléfono</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" @error('phone') aria-invalid="true" @enderror>
        @error('phone') <div><p>{{ $message }}</p></div> @enderror
    </div>

    

    <div>
        <!-- Foto -->
        <label for="foto">Foto (opcional)</label>
        <input type="file" id="foto" name="foto" @error('foto') aria-invalid="true" @enderror>
        @error('foto') <div><p>{{ $message }}</p></div> @enderror
    </div>

   <div>
        <!-- Email -->
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" @error('email') aria-invalid="true" @enderror>
        @error('email') <div><p>{{ $message }}</p></div> @enderror
    </div>
    <div>
        <!-- Contraseña -->
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" @error('password') aria-invalid="true" @enderror>
        @error('password') <div><p>{{ $message }}</p></div> @enderror
    </div>

    <div>
        <!-- Botón -->
        <button type="submit">Registrarse</button>
    </div>
</form>

</x-layout>