@extends('adminlte::page')

@section('title', 'Crear usuario')

@section('content')

<div class="wrapper">
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear nuevo usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" onclick="window.location.href='{{ route('admin.index') }}'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"></path>
                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Volver al inicio</span>
                            </button>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- CONTENIDO --}}
                            <x-auth-validation-errors class="text-danger mb-4" :errors="$errors" />

                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf
                                <input type="hidden" name="email_verified_at" value="{{Carbon\Carbon::now()}}">

                                <fieldset>
                                    <div class="row ">
                                        <div class="col-12">
                                            <div id="div_id_name" class="mb-3">
                
                                                <label for="id_type_id" class="form-label d-block my-2 fw-700"> Tipo de cuenta</label>
                
                                                <div>
                                                <input type="radio" id="usuario" name="rol" value="usuario" checked>
                                                <label for="usuario">Empleado</label>
                                                </div>

                                                <hr>
                
                                                <div>
                                                <input type="radio" id="mtto" name="rol" value="mantenimiento">
                                                <label for="mtto">Mantenimiento</label>
                                                </div>

                                                <div>
                                                    <input type="radio" id="prevencion" name="rol" value="prevencion">
                                                    <label for="prevencion">Prevenci??n</label>
                                                </div>
                
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Name -->
                                <div class="mt-3">
                                    <x-input-label for="name" :value="__('Nombre completo')" /><span class="ms-1 text-danger">*</span>
                    
                                    <x-text-input id="name" class="textinput textInput form-control" type="text" name="name" :value="old('name')" required autofocus />
                                </div>
                    
                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" /><span class="ms-1 text-danger">*</span>
                    
                                    <x-text-input id="email" class="textinput textInput form-control" type="email" name="email" :value="old('email')" required />
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Contrase??a')" /><span class="ms-1 text-danger">*</span>
                    
                                    <x-text-input id="password" class="textinput textInput form-control"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" />
                                </div>
                    
                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-input-label for="password_confirmation" :value="__('Confirmar contrase??a')" /><span class="ms-1 text-danger">*</span>
                    
                                    <x-text-input id="password_confirmation" class="textinput textInput form-control"
                                                    type="password"
                                                    name="password_confirmation" required />
                                </div>
                    
                                <div class="flex items-center justify-end mt-4">
                    
                                   
                                </div>
                
                                                             
                                
                                <div class="mt-4 justify-content-between">
                                    <div>
                                        <input type="button" name="cancel" value="Cancelar" class="btn btn-dark bg-white btn-sm" id="button-id-cancel" onclick="window.location.href='{{route('user.index')}}'">
                                        <input type="submit" name="submit" value="Guardar" class="btn btn-primary btn btn-dark btn-sm" id="submit-id-submit">
                                    </div>
                                </div>
                            </form>                


                            {{-- CONTENIDO --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ url('/assets/css/custom.css') }}" />
@stop

@section('js')


@stop
