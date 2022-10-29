@extends('adminlte::page')

@section('title', 'Editar incidencia')

@section('content')

<div class="wrapper">
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar una incidencia</h1>
                </div>
                <div class="col-sm-6">
                {{-- <div class="d-flex flex-row w-100 h-100 justify-content-start justify-content-lg-end align-items-center flex-wrap"> --}}
                    <ol class="breadcrumb float-sm-right">
                        <li class="mx-1">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" onclick="window.location.href='{{ route('ticket.index') }}'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"></path>
                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Volver al inicio</span>
                            </button>
                        </li>
                        {{-- <li class="mx-1">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" disabled="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Show</span>
                            </button>

                        </li>
                        <li class="mx-1">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" disabled="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Editar</span>
                            </button>
                        </li>
                        <li class="mx-1">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" disabled="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Crear</span>
                            </button>
                        </li>
                        <li class="mx-1">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" onclick="window.location.href='{{route('ticket.index')}}'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"></path>
                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Listar</span>
                            </button>
                        </li> --}}
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
                            <form action="{{route('ticket.update', $ticket->id)}}" method="POST" enctype="multipart/form-data">

                                @csrf
                                @method('PUT')
                                <input type="hidden" name="prior" value=0>
                                <input type="hidden" name="status" value=0>
                                <input type="hidden" name="user_id" value={{Auth::user()->id}}>
                
                                <fieldset>
                                    <div class="row ">
                                        <div class="col-12">
                                            <div id="div_id_name" class="mb-3">
                                                <label for="id_title" class="form-label d-block my-0 fw-700"> Título<span class="ms-1 text-danger">*</span></label>
                                                <small id="hint_id_title" class="form-text text-muted d-block my-0 mn"><em>This field will be shown on the tab title, and will appear in search result title.</em></small>
                                                <input type="text" name="title" id="title" maxlength="45" class="textinput textInput form-control @error('title') is-invalid @enderror" placeholder="Título" value="{{ $ticket->title }}" >
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                
                                    </div>
                                </fieldset>
                
                                <fieldset>
                                    <label for="id_description" class="form-label d-block m-0 fw-700"> Descripción </label>
                                    <small id="hint_id_description" class="form-text text-muted my-3"><em>Introduce una descripción de la incidencia.</em></small>
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea name="description" id="description" rows="6" class="textinput textInput form-control @error('description') is-invalid @enderror" placeholder="Descripción">{{ $ticket->description }}</textarea>
                                            @error('content')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                
                
                                <fieldset>
                                    <div class="row ">
                                        <div class="col-12">
                                            <div id="div_id_lctn" class="mb-3">
                                                <label for="id_location_id" class="form-label d-block my-0 fw-700"> Ubicación<span class="ms-1 text-danger">*</span></label>
                                                <small id="hint_id_location_id" class="form-text text-muted d-block my-0 mn"><em>This field will be shown on the tab title, and will appear in search result title.</em></small>
                                                <select name="location_id" id="location_id">
                                                    @foreach ($locations as $location)
                                                        <option value="{{$location->id}}" @if ($location->id==$ticket->location_id) selected @endif>{{$location->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('location_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                
                                <div class="mt-4 justify-content-between">
                                    <div>
                                        <input type="button" name="cancel" value="Cancel" class="btn btn-dark bg-white btn-sm" id="button-id-cancel" onclick="window.location.href='{{route('ticket.misincidencias')}}'">
                                        <input type="submit" name="submit" value="Save" class="btn btn-primary btn btn-dark btn-sm" id="submit-id-submit">
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
    {{-- <link rel="stylesheet" href=" {{ url('/assets/bootstrap/css/style.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ url('/assets/css/dt.css') }}" /> --}}
    <link rel="stylesheet" href="{{ url('/assets/css/custom.css') }}" />
@stop

@section('js')


@stop
