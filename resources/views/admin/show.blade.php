@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Ver incidencia')

@section('content')

<div class="wrapper">
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ver incidencia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" onclick="window.location.href='{{ route('admin.incidencias') }}'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"></path>
                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Volver a incidencias</span>
                            </button>
                        </li>
                        <li class="mx-1">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" onclick="window.location.href='{{ route('admin.edit', $ticket->id) }}'" @if ($ticket->status==2) disabled @endif >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Editar</span>
                            </button>
                        </li>
                        <li class="mx-1">
                            <form action="{{route('admin.destroy', $ticket->id)}}" method="POST" class="@if ($ticket->status!=2) form-sa-delete @endif">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" @if ($ticket->status==2) disabled @endif >
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                  </svg>
                                  <span class="text-sm ms-2 p-1">Borrar</span>
                              </button>
                          </form>
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

                            @if ($ticket->prior)
                            <div class="h3 col mb-4 mt-1 p-0">
                                <span class="badge bg-warning rounded-pill align-text-top">Prioritario</span>
                            </div>
                            @endif

                            <h4>Título</h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-sm mb-3 mt-1">
                                            <span class="h6 text-muted">{{ $ticket->title }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                  
                            @if ($ticket->description)
                              <h4>Descripción</h4>
                              <div class="container">
                                  <div class="row">
                                      <div class="col">
                                          <p class="text-sm mb-3 mt-1">
                                              <span class="h6 text-muted">{{ $ticket->description }}</span>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          @endif
                  
                          <h4>Reportada por</h4>
                          <div class="container">
                              <div class="row">
                                  <div class="col">
                                      <p class="text-sm mb-3 mt-1">
                                          <span class="h6 text-muted">@if (!empty($user->name)) {{$user->name}} @else No disponible @endif</span>
                                      </p>
                                  </div>
                              </div>
                          </div>
                  
                          <h4>Ubicación</h4>
                          <div class="container">
                              <div class="row">
                                  <div class="col">
                                      <p class="text-sm mb-3 mt-1">
                                          <span class="h6 text-muted">{{ $location->name }}</span>
                                      </p>
                                  </div>
                              </div>
                          </div>
                  
                          <h4>Tipo</h4>
                          <div class="container">
                              <div class="row">
                                <div class="h5 col mb-3 mt-1">
                                      @if ($ticket->type_id==1)
                                          <span class="px-2 badge bg-danger rounded-pill align-text-top">Avería</span>
                                      @elseif ($ticket->type_id==2)
                                          <span class="px-2 badge bg-info rounded-pill align-text-top">Evaluación</span>
                                      @else 
                                          <span class="px-2 badge bg-secondary rounded-pill align-text-top">Sin asignar</span>
                                      @endif
                                  </div>
                              </div>
                          </div>
                                  
                            <h4>Fechas</h4>
                            {{-- <div class="container"  @if ($ticket->closed_at) style="background-color: lightgoldenrodyellow;" @endif> --}}
                              <div class="container @if ($ticket->closed_at) cerrado @endif" >
                                <div class="row">
                                    <div class="col">
                                        <p class="text-sm mb-3 mt-2">
                                            <strong class="h6 d-block">Creada</strong>
                                            <span class="text-muted">{{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                    @if ($ticket->closed_at)
                                    <div class="col">
                                        <p class="text-sm mb-3 mt-2">
                                            <strong class="h6 d-block">Cerrada</strong>
                                            <span class="text-muted">{{ \Carbon\Carbon::parse($ticket->closed_at)->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                    @endif
                                    
                                </div>
                            </div>
                  
                            {{-- @if ($ticket->comment)
                            <h4 class="mt-5">Comentario</h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col card shadow bg-light bg-opacity-10 py-0 my-4 d-flex flex-column justify-content-between">
                                        <span class="h6 text-secondary p-4">{{ $ticket->comment }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif --}}

                            @if ($ticket->comment)
                            <h4 class="mt-5">Comentario</h4>
                                <div class="col card shadow bg-light bg-opacity-10 py-0 my-4 d-flex flex-column justify-content-between">
                                    <span class="h6 text-secondary p-4">{{ $ticket->comment }}</span>
                                </div>
                            @endif
                  
                            {{-- @if ($ticket->file_name)
                            <h4 class="mt-5">Documentación</h4>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-sm mb-1 mt-2">
                                            <span class="h6 text-muted"><a href="{{URL::asset('storage/files/' . $ticket->file_name)}}" target="_blank">{{ $ticket->file_name }}</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endif --}}

                            @if ($ticket->file_name)
                            <h4 class="mt-5">Documentación</h4>
                                <div class="col card shadow bg-light bg-opacity-10 py-0 my-4 d-flex flex-column justify-content-between">
                                        <span class="h6 p-4"><a href="{{URL::asset('storage/files/' . $ticket->file_name)}}" target="_blank">{{ $ticket->file_name }}</a></span>
                                </div>
                            @endif
                  
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
    <script defer src="{{url('/assets/js/sa.js')}}"></script>
@stop
