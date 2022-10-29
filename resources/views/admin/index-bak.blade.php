@extends('adminlte::page')

@section('plugins.Chartjs', true)


@section('title', 'Inicio')

@section('content_header')
    <h3>Estadísticas</h3>
@stop

@section('content')



<div class="main col pt-5">
    <div class="container">
        
        @if(session('message'))
        
        <script>
            swal('{{ session('message') }}', {
                icon: 'success',
              });
        </script>

        {{-- <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
          <strong>{{ session('message') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}

        @endif

    <div class="row mb-5">
      <div class="col-12 col-lg-5 justify-content-start align-items-start mb-lg-2 position-relative">
          <h3 class="mb-2 mb-lg-0 fw-bold truncate">Estadísticas</h3>
      </div>

      <div class="col-12 col-lg-auto flex-1 ms-auto justify-content-center align-items-end mb-lg-2">
          <div class="d-flex flex-row w-100 h-100 justify-content-start justify-content-lg-end align-items-center flex-wrap">
              <div class="ms-2 mb-1">
                  <div class="dropdown">
                      <button id="dropdownMenuButton1" aria-expanded="false" type="button" data-bs-toggle="dropdown" class="d-flex justify-content-center align-items-center bg-white dropdown-toggle btn btn-white btn-sm">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                              <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"></path>
                              <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"></path>
                          </svg>
                          <span class="text-sm me-1 ms-2">Ir a</span>
                      </button>
                      <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton1">
                          <li><small><a class="dropdown-item" href="{{ route('admin.index') }}">Inicio</a></small></li>
                          <li><small><a class="dropdown-item" href="#">Panel personal</a></small></li>
                      </ul>
                  </div>
              </div>
              <div class="ms-2 mb-1">
                  <div>
                      <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" onclick="window.location.href='{{route('admin.create')}}'">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                          </svg>
                          <span class="text-sm ms-2">Crear nueva incidencia</span>
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>


{{-- <div class="row">
    <section class="card shadow-sm col-sm-3 col-md-3 bg-secondary bg-opacity-10 p-3 m-5 d-flex flex-column justify-content-between">
        <div>
            <h3>Tipos de incidencias</h3>
            <canvas id="chTipo"></canvas>
        </div>
    </section>
    
    
    <section class="card shadow-sm col-sm-3 col-md-3 bg-secondary bg-opacity-10 p-3 m-5 d-flex flex-column">
        <div>
            <h3>Porcentaje incidencias cerradas</h3>
            <h5>{{round((count($avSolved)+count($evaSolved))/(count($averias)+count($evaluaciones))*100)}}%</h5>
            <canvas id="chPorcentaje"></canvas>
        </div>
    </section>
</div> --}}

{{-- ============ --}}
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="card col card-custom shadow-sm bg-light bg-opacity-10 p-3 m-5 d-flex flex-column justify-content-between">
            <h3>Tipos de incidencias</h3>
            <canvas id="chTipo"></canvas>
        </div>
        <div class="card col card-custom shadow-sm bg-light bg-opacity-10 p-3 m-5 d-flex flex-column justify-content-between">
            <h3>Porcentaje incidencias cerradas</h3>
            <h5>{{round((count($avSolved)+count($evaSolved))/(count($averias)+count($evaluaciones))*100)}}%</h5>
            <canvas id="chPorcentaje"></canvas>
        </div>
    </div>
</div>

{{-- ========= --}}
</div>
</div>

@stop

@section('css')
@stop

@section('js')
    <script defer src="{{url('/assets/js/chartjs.js')}}" data-cerradas="{{count($avSolved)+count($evaSolved)}}" data-pendientes="{{count($avPend)+count($evaPend)}}" data-averias="{{count($averias)}}" data-evaluaciones="{{count($evaluaciones)}}"></script>
@stop