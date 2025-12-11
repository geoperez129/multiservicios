@extends('layouts.app')

@section('content')

<!-- ========================== -->
<!--  ESTILOS MODO DIOS (aislados) -->
<!-- ========================== -->
<style>

#perfilUsuario .card-god {
    background: linear-gradient(145deg, #ffffff, #e7e7e7);
    box-shadow: 12px 12px 30px #bdbdbd,
                -12px -12px 30px #ffffff;
    border-radius: 25px;
    padding: 40px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

#perfilUsuario .card-god:hover {
    transform: scale(1.01);
    box-shadow: 15px 15px 35px #b5b5b5,
                -15px -15px 35px #ffffff;
}

#perfilUsuario .avatar-frame {
    border-radius: 100%;
    width: 160px;
    height: 160px;
    object-fit: cover;
    border: 5px solid #007bff;
    box-shadow: 0 0 18px rgba(0, 110, 255, 0.7);
}

#perfilUsuario .info-box {
    background: #f6f6f6;
    border-radius: 18px;
    padding: 18px;
    border: 1px solid #e0e0e0;
    transition: transform 0.2s ease;
}

#perfilUsuario .info-box:hover {
    transform: scale(1.02);
}

#perfilUsuario .btn-edit {
    background: linear-gradient(135deg, #006eff, #0050c8);
    color: white;
    font-weight: bold;
    padding: 12px 32px;
    border-radius: 15px;
    display: inline-flex;
    gap: 10px;
    align-items: center;
    box-shadow: 4px 4px 12px rgba(0, 60, 180, 0.5);
    transition: 0.25s ease;
}

#perfilUsuario .btn-edit:hover {
    transform: scale(1.06);
    box-shadow: 0px 0px 20px rgba(0, 110, 255, 0.8);
}

</style>

<!-- ========================== -->
<!--    PERFIL    -->
<!-- ========================== -->

<div id="perfilUsuario" class="max-w-3xl mx-auto mt-12 card-god text-gray-800">

    <div class="flex flex-col items-center">

        <!-- FOTO -->
        <img src="{{ $user->image ? asset('storage/'.$user->image) : asset('images/default_user.png') }}"
             class="avatar-frame">

        <h2 class="text-3xl font-extrabold mt-5">
            {{ $user->name }}
        </h2>

        <p class="mt-1 text-sm 
            @if($user->last_login_at && $user->last_login_at->diffInMinutes(now()) < 20)
                text-green-600 font-semibold
            @else
                text-gray-500
            @endif">

            @if($user->last_login_at && $user->last_login_at->diffInMinutes(now()) < 20)
                🟢 En línea ahora
            @else
                🟡 Última vez: {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Sin registro' }}
            @endif
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">

        <div class="info-box shadow-sm">
            <h3 class="font-semibold text-lg mb-2">📧 Correo</h3>
            <p>{{ $user->email }}</p>
        </div>

        <div class="info-box shadow-sm">
            <h3 class="font-semibold text-lg mb-2">🛡 Rol</h3>
            <p>{{ ucfirst($user->role) }}</p>
        </div>

        <div class="info-box shadow-sm">
            <h3 class="font-semibold text-lg mb-2">📅 Registrado</h3>
            <p>{{ $user->created_at->format('d/m/Y') }}</p>
        </div>

        <div class="info-box shadow-sm">
            <h3 class="font-semibold text-lg mb-2">🕒 Último acceso</h3>
            <p>{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Nunca' }}</p>
        </div>

    </div>

    <div class="text-center mt-10">
        <a href="{{ route('user.edit') }}" class="btn-edit">
            ✏️ Editar Perfil
        </a>
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('home') }}" class="text-gray-600 hover:text-black font-semibold text-sm">
            ← Regresar al inicio
        </a>
    </div>

</div>

@endsection
