@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Incidencias cerradas')

@section('content')

<div class="wrapper">
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Listado de incidencias cerradas</h1>
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
                            @if (count($tickets)>0)

                            <table id="tabla" class="table" style="width:100%">
                          
                                <thead>
                                    <tr>
                                        <th class="col-1" data-priority="1">Id</th>
                                        <th data-priority="1">Título</th>
                                        {{-- <th class="col-1">Tipo</th> --}}
                                        <th class="col-2" >Cerrada</th>
                                        <th class="col-1" data-priority="1">Acción</th>
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                            
                                @forelse($tickets as $key => $ticket)
                            
                                    <tr>
                                        
                                        <td><a class="fw-500 cursor-pointer" href="{{route('manage.show',$ticket->id)}}">{{$ticket->id}}</a></td>
                                        <td>{{$ticket->title}}</td>
                                    
                                        {{-- <td class="h5">
                                            @if ($ticket->type_id==1)
                                                <span class="px-2 badge bg-danger rounded-pill align-text-top">Avería</span>
                                            @else
                                                <span class="px-2 badge bg-info rounded-pill align-text-top">Evaluación</span>
                                            @endif
                                        </td> --}}
                            
                                        
                                    {{-- <td><span class="d-block">{{date ('d/m/Y', strtotime($ticket->closed_at))}}</span></td> --}}
                                    <td><span class="d-block">{{\Carbon\Carbon::parse($ticket->closed_at)->format('d/m/Y')}}</span></td>
                                    {{-- <td><span class="d-block">{{\Carbon\Carbon::parse($ticket->closed_at)->diffForHumans()}}</span></td> --}}
                                    <td class="p-2">
                                        <div class="d-flex">
                                            <a href="{{route('manage.show',$ticket->id)}}" type="button" class="d-flex justify-content-center align-items-center btn btn-sm btn-outline-secondary m-1 px-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                                </svg>
                                                <span class="text-sm m-1">Ver</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <h2 class="text-center text-secondary p-4">Ninguna incidencia pendiente</h2>
                                @endforelse
                                </tbody>
                          </table>
                          
                          @else
                            <h2 class="text-center text-secondary p-4">Ninguna incidencia cerrada</h2>
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
        order: [[0, 'desc']],
        "columnDefs": [ 
          {
          "targets": 3,
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
        text: '{{ session('message') }}',
        icon: 'success',
    })
@endif

</script>

@stop
