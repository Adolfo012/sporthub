   @extends('Dashboard.dashboard') {{-- -Inherits dashboard- --}}
   @section('title', 'Editar usuario')

   @section('content')
       <main class="home-section">
           <section class="principalbox">
               <div class="contorno">
                   <form action="{{ route('user.update', ['user' => $user, 'userID' => auth()->user()->id]) }}"
                       method="POST">
                       @csrf
                       @method('put')
                       <h1>Perfil</h1>

                       <label for=""> Nombre(s) </label>
                       <input name="name" type="text" required value="{{ old('name', $user->name) }}" autofocus> <br>
                       @error('name')
                           {{-- Checks if there has been an error in the "name" field --}}
                           <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                           <br>
                       @enderror

                       <label for=""> Apellido Paterno </label>
                       <input name="fsurname" type="text" required value="{{ old('fsurname', $user->fsurname) }}"> <br>
                       @error('fsurname')
                           {{-- Checks if there has been an error in the "name" field --}}
                           <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                           <br>
                       @enderror

                       <label for=""> Apellido Materno </label>
                       <input name="msurname" type="text" required value="{{ old('msurname', $user->msurname) }}"> <br>
                       @error('msurname')
                           {{-- Checks if there has been an error in the "name" field --}}
                           <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                           <br>
                       @enderror


                       <label for=""> Apodo </label>
                       <input name="nickname"type="text" required value="{{ old('nickname', $user->nickname) }}"> <br>
                       @error('nickname')
                           {{-- Checks if there has been an error in the "name" field --}}
                           <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                           <br>
                       @enderror

                       <label for=""> Correo </label>
                       <input name="email" type="email" required value="{{ old('email', $user->email) }}"> <br>
                       @error('email')
                           {{-- Checks if there has been an error in the "name" field --}}
                           <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                           <br>
                       @enderror

                       <label for=""> Contraseña Actual</label>
                       <input name="password" type="password" value="{{ old('password') }}">
                       @error('password')
                           <span>*{{ $message }}</span>
                           <br>
                       @enderror

                       <label for=""> Nueva Contraseña </label>
                       <input name="newpassword" type="password" value="{{ old('password') }}">
                       @error('newpassword')
                           <span>*{{ $message }}</span>
                           <br>
                       @enderror

                       <label for=""> Confirmar Nueva Contraseña </label>
                       <input name="confirmNewpassword" type="password">
                       @error('confirmNewpassword')
                           <span>*{{ $message }}</span>
                           <br>
                       @enderror

                       @if (session()->has('mensaje'))
                           <p>{{ session()->get('mensaje') }}</p> {{-- Poner de color verde de aceptacion, y ponerle formato centrado FRONT-End --}}
                       @endif
                       <!-- <button class="login-button" type="submit"> Editar </button>
                    <a class="back-form" href="/dashboard">volver</a> -->

                       <div class="flex-contianer">
                           <button type="submit" class="button-left" style="height: 45px; margin-top: 13px;">
                               Crear
                           </button>
                           <a href="/dashboard" class="button-right">Volver</a>
                       </div>
                   </form>
               </div>
           </section>
       </main>
   @endsection
