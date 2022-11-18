@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Usuarios')

@section('content')

<div class="wrapper">
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Listado de usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" onclick="window.location.href='{{route('user.create')}}'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Crear nuevo usuario</span>
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
<table id="tabla" class="table " style="width:100%">
    <thead>
        <tr>
            <th class="col-1">Id</th>
            <th data-priority="1">Nombre</th>
            <th class="col-2" data-priority="2">email</th>
            <th class="col-2" data-priority="2">Rol</th>
            <th class="col-2" data-priority="1">Acción</th>
        </tr>
    </thead>

    <tbody>

      @forelse($users as $key => $user)
        
        @if ($user->roles[0]->name=="admin")
            <tr class="filaadmin">
        @elseif (($user->roles[0]->name=="mantenimiento") || ($user->roles[0]->name=="prevencion"))
            <tr class="filamanager">
        @else
            <tr>
        @endif

          <td><a class="fw-500 cursor-pointer">{{$user->id}}</a></td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->roles[0]->name}}</td>
          <td>
              <div class="d-flex">
                <a href="{{route('user.edit',$user->id)}}" type="button" class="d-flex justify-content-center align-items-center btn btn-sm btn-outline-secondary m-1 px-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                    </svg>
                    <span class="text-sm m-1">Editar</span>
                </a>

                <form action="{{route('user.destroy', $user->id)}}" method="POST" class="@if ($user->id!=1) form-sa-delete @endif">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="d-flex justify-content-center align-items-center btn btn-sm btn-outline-secondary m-1 p-2" @if ($user->id==1) disabled @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                        </svg>
                        <span class="text-sm ms-2 js-delete">Borrar</span>
                    </button>
                </form>
            </div>
          </td>
      </tr>

      @empty
      <h2 class="text-center text-secondary p-4">No existe ningún usuario.</h2>
    @endforelse
      
    </tbody>
  </table>

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

<script>
  $(function () {
    $('#tabla').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        order: [[0, 'asc']],
        "columnDefs": [ 
          {
          "targets": [3,4],
          "orderable": false
          }
          ],
      "paging": true,
      "lengthChange": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

@if(session("message"))
    Swal.fire({ 
        // title: 'Error!',
        text: '{{ session('message') }}',
        icon: 'success',
        // confirmButtonText: 'Cool'
    })
@endif

</script>

@stop
