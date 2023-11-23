@extends('Dashboard.dashboard') {{-- -Inherits dashboard- --}}
@section('title', 'Crear Torneo')

@section('content')
    <div class="torneos-create">
        <h1>Crear Torneo</h1>

        <form action="#" method="POST">
            @csrf
            <label>Nombre de torneo: <br>
                <input type = "text" name="name" value="{{ old('name') }}"> <br> {{-- old() recovers what was in the field before the error --}}
            </label>
            @error('name')
                {{-- Checks if there has been an error in the "name" field --}}
                <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                <br>
            @enderror

            <label>Ubicación: <br>
                <input type = "text" name="ubicacion" value="{{ old('ubicacion') }}"> <br> {{-- old() recovers what was in the field before the error --}}
            </label>
            @error('ubicacion')
                {{-- Checks if there has been an error in the "ubicacion" field --}}
                <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                <br>
            @enderror

            <label>Tipo de juego del torneo: <br>
                <input type = "text" name="tipoJuego" value="{{ old('tipoJuego') }}"> <br>
            </label>
            @error('tipoJuego')
                {{-- Checks if there has been an error in the "name" field --}}
                <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                <br>
            @enderror

            <label>Descripción: <br>
                <input type = "text" name="descripcion" value="{{ old('descripcion') }}"> <br>
            </label>
            @error('descripcion')
                {{-- Checks if there has been an error in the "name" field --}}
                <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                <br>
            @enderror

            <label>Fecha de Inicio: <br>
                <input type = "date" name="fechaInicio" value="{{ old('fechaInicio') }}"> <br>
            </label>
            @error('fechaInicio')
                {{-- Checks if there has been an error in the "name" field --}}
                <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                <br>
            @enderror

            <label>Fecha de Fin: <br>
                <input type = "date" name="fechaFin" value="{{ old('fechaFin') }}"> <br>
            </label>
            @error('fechaFin')
                {{-- Checks if there has been an error in the "name" field --}}
                <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                <br>
            @enderror
            <label class="tipo torneo">Elige el tipo de torneo:</label><br>
            <label for="individual">Individual</label>
            <input type="radio" id="Individual" name="tipoTorneo" value="Individual" required
                value="{{ old('tipoTorneo') }}"> <br>
            <label for="equipos">Equipos</label>
            <input type="radio" id="Equipos" name="tipoTorneo" value="Equipos" required
                value="{{ old('tipoTorneo') }}">
            <br>
            @error('tipoTorneo')
                {{-- Checks if there has been an error in the "name" field --}}
                <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                <br>
            @enderror
            @if (old('tipoTorneo') == 'Individual')
                <label for="cantidad">Cantidad de participantes:</label>
                <input type="number" id="cantEquipo" name="cantEquipo">
            @endif
            @if (old('tipoTorneo') == 'Equipos')
                <label for="cantidad">Cantidad de miembros por equipo aceptada:</label>
                <input type="number" id="cantEquipo" name="cantEquipo">
            @endif
            <br>
            @error('cantEquipo')
                {{-- Checks if there has been an error in the "name" field --}}
                <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
            @enderror

            <button type="submit">Crear</button>

            <a href="/torneos">Volver</a>
    </div>
@endsection
