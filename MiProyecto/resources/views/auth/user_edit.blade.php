@extends('layouts.app')

@section('content')

<style>

#editarPerfil .card-god {
    background: #f5f7ff;
    border-radius: 25px;
    padding: 40px;
    box-shadow: 0 0 25px rgba(0,0,0,0.15);
}

#editarPerfil .avatar-edit {
    width: 160px;
    height: 160px;
    border-radius: 100%;
    border: 5px solid #007bff;
    object-fit: cover;
    cursor: pointer;
    transition: 0.25s;
}

#editarPerfil .avatar-edit:hover {
    transform: scale(1.05);
}

#editarPerfil .input-pro {
    width: 100%;
    padding: 14px 18px;
    border-radius: 12px;
    border: 1px solid #d1d1d1;
    background: white;
    color: #1e1e1e;
    font-size: 1rem;
    margin-bottom: 20px;
}

#editarPerfil .input-pro:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 12px rgba(0,110,255,0.4);
}

#editarPerfil .btn-save {
    background: linear-gradient(135deg, #006eff, #0038a8);
    color: white;
    font-weight: bold;
    padding: 14px 30px;
    border-radius: 12px;
    box-shadow: 0 0 12px rgba(0, 60, 180, 0.5);
    transition: 0.25s;
}

#editarPerfil .btn-save:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px rgba(0,110,255,0.7);
}

</style>

<div id="editarPerfil" class="max-w-3xl mx-auto mt-12 card-god">

    <div class="text-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800">
            ✏️ Editar Perfil de Usuario
        </h1>
    </div>

    <div class="flex flex-col items-center mb-6">
        <label for="imageInput">
            <img id="preview" 
                 src="{{ $user->image ? asset('storage/'.$user->image) : asset('images/default_user.png') }}"
                 class="avatar-edit">
        </label>
    </div>

    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
        @csrf

        <input type="file" name="image" id="imageInput" class="hidden">

        <input type="text" 
               name="name" 
               class="input-pro"
               value="{{ $user->name }}"
               placeholder="Tu nombre">

        <input type="email" 
               name="email" 
               class="input-pro"
               value="{{ $user->email }}"
               placeholder="Correo electrónico">

        <input type="password" 
               name="password"
               class="input-pro"
               placeholder="Nueva contraseña (opcional)">

        <input type="password" 
               name="password_confirmation"
               class="input-pro"
               placeholder="Confirmar contraseña">

        <div class="text-center mt-8">
            <button class="btn-save">
                💾 Guardar Cambios
            </button>
        </div>
    </form>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if(file){
                document.getElementById('preview').src = URL.createObjectURL(file);
            }
        });
    </script>

</div>

@endsection
