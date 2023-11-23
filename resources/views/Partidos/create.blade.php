@extends('Dashboard.dashboard') {{---Inherits dashboard---}}
@section('title','Crear partido')

@section('content')
<h1>Crear Partido</h1>

<form action="{{route('partidos.store', $torneoID)}}" method="POST">
@csrf
    <label>Fecha del Partido: <br>
        <input type = "date" name="fechaPartido" value="{{ old('fechaPartido') }}"> <br>
    </label>
    @error('fechaPartido')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror

    <label>Hora del partido: <br>
        <input type = "time" name="horaPartido" value="{{ old('horaPartido') }}"> <br> 
    </label>
    @error('horaPartido')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror

    <label>Jornada: <br>
        <input type = "date" name="jornada" value="{{ ('jornada') }}"> <br>
    </label>
    @error('jornada')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror

    <label>Equipo Local: <br>
    <select name="equipoLocal_id">
        <option value="">Seleccione equipo</option>
        @foreach($equipos as $equipo) 
            <option value="{{ $equipo->id }}">{{ $equipo->name }}</option>
        @endforeach
    </select> <br>
    @error('equipoLocal_id')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror

    <label>Equipo Visitante: <br>
    <select name="equipoVisitante_id">
        <option value="">Seleccione equipo</option>
        @foreach($equipos as $equipo) 
            <option value="{{ $equipo->id }}">{{ $equipo->name }}</option>
        @endforeach
    </select> <br>
    @error('equipoVisitante_id')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror

    <button type="submit">Crear</button>
    
    <a href="{{route('partidos.index',$torneoID)}}">Volver</a>
@endsection