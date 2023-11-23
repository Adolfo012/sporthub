<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportHub Registro</title>
    <link rel="preload" href="{{ asset('css/styles.css') }}" as="style">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="form-body">
    <!-- <header>
        <nav class="nav">
            <a href="#"> Inicio </a>
            <a href="#"> Registro </a>
            <a href="#"> Redes </a>
            <a href="#"> Contacto </a>
        </nav>
    </heade> -->

    <section class="form-section">
        <div class="form-box"></div>
            <div class="form-value">
                <form method="POST" action="#">
                    @csrf
                    <h1 class="login-h1"> Registro </h1>
                    
                    <div class="inputbox">
                        <input name="name" type="text" required value="{{old('name')}}" autofocus> <br>
                        <label for=""> Nombre(s) </label>
                        @error('name')  {{-- Checks if there has been an error in the "name" field --}}
                        <span class="error-message">*{{$message}}</span> {{--print a message if there is an error--}}
                        <br>
                        @enderror
                    </div>
                    <div class="inputbox">
                        <input name="fsurname" type="text" required value="{{old('fsurname')}}"> <br>
                        <label for=""> Apellido Paterno </label>
                        @error('fsurname')  {{-- Checks if there has been an error in the "name" field --}}
                        <span class="error-message">*{{$message}}</span> {{--print a message if there is an error--}}
                        <br>
                        @enderror
                    </div>
                    <div class="inputbox">
                        <input name="msurname" type="text" required value="{{old('msurname')}}"> <br>
                        <label for=""> Apellido Materno </label>
                        @error('msurname')  {{-- Checks if there has been an error in the "name" field --}}
                        <span class="error-message">*{{$message}}</span> {{--print a message if there is an error--}}
                        <br>
                        @enderror
                    </div>
                    <div class="inputbox-birthday">
                        <label class="birthday">Fecha de Nacimiento</label>
                        <input name="birthdate" type="date" required value="{{old('birthdate')}}"> <br>
                        @error('birthdate')  {{-- Checks if there has been an error in the "name" field --}}
                        <span class="error-message">*{{$message}}</span> {{--print a message if there is an error--}}
                        <br>
                        @enderror
                    </div>
                    <div class="inputbox-gender">
                        <label class="genero" >Género</label>
                        <div class="radio-group">
                            <input type="radio" id="male" name="gender" value="male" required value="{{old('gender')}}"> <br>
                            <label for="male">Hombre</label>
                            <input type="radio" id="female" name="gender" value="female" required value="{{old('gender')}}"> <br>
                            <label for="female">Mujer</label>
                            <input type="radio" id="non-binary" name="gender" value="non-binary" required value="{{old('gender')}}"> <br>
                            <label for="non-binary"><br><br>Sin mencionar</label>
                        </div>
                        @error('gender')  {{-- Checks if there has been an error in the "name" field --}}
                        <span class="error-message"*{{$message}}</span> {{--print a message if there is an error--}}
                        <br>
                        @enderror
                    </div>
                    <div class="inputbox">
                        <input name="nickname"type="text" required value="{{old('nickname')}}"> <br>
                        <label for=""> Apodo </label>
                        @error('nickname')  {{-- Checks if there has been an error in the "name" field --}}
                        <span class="error-message">*{{$message}}</span> {{--print a message if there is an error--}}
                        <br>
                        @enderror
                    </div>
                    <div class="inputbox">
                        <input name="email" type="email" required value="{{old('email')}}"> <br>
                        <label for=""> Correo </label>
                        @error('email')  {{-- Checks if there has been an error in the "name" field --}}
                        <span class="error-message">*{{$message}}</span> {{--print a message if there is an error--}}
                        <br>
                        @enderror
                    </div>
                    <div class="inputbox">
                        <input name="password" type="password" required>
                        <label for=""> Contraseña </label>
                        @error('password')  {{-- Checks if there has been an error in the "name" field --}}
                        <span class="error-message">*{{$message}}</span> {{--print a message if there is an error--}}
                        <br>
                        @enderror
                    </div>
                    <div class="inputbox">
                        <input name="confirmpassword" type="password" required>
                        <label for=""> Confirmar Contraseña </label>
                        @error('confirmpassword')  {{-- Checks if there has been an error in the "name" field --}}
                        <span class="error-message">*{{$message}}</span> {{--print a message if there is an error--}}
                        <br>
                        @enderror
                    </div>
                    <button class="login-button" type="submit"> Registrarse </button>
                    <a class="back-form" href="/login">volver</a>
                </form>
            </div>
    </section>
    <script src="{{ asset('js/form.js') }}" ></script>
</body>
</html>