@extends('layouts.escritorio')

@section('content')

<div class="container">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h1 mb-0 text-gray-800">Zona</h1>
                        <div class="btn-group" role="group" aria-label="botones">
                            <a href="{{ route('zonas.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Agregar Zona</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped" style="width=100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">nombre_zona</th>
                                    <th scope="col">ciudad</th>
                                    <th scope="col">parroquia</th>
                                    <th scope="col">municipio</th>
                                    <th scope="col">estado</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($zonas as $zona)
                                <tr>
                                    <td>{{$zona->id}}</td>
                                    <td>{{$zona->nombre_zona}}</td>
                                    <td>{{$zona->ciudad}}</td>
                                    <td>{{$zona->parroquia}}</td>
                                    <td>{{$zona->municipio}}</td>
                                    <td>{{$zona->estado}}</td>
                                    <td style="width: 140px;">
                                        @can('Eliminar zonas')
                                            <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modalEliminar{{$zona->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                        @endcan
                                        <a class="btn btn-primary btn-sm" href="{{ route('zonas.show',$zona->id) }}" data-toggle="tooltip" data-placement="top" title="Mostrar"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-success btn-sm" href="{{ route('zonas.edit',$zona->id) }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>

                                <!-- modalEliminar se muestra al hacer click en boton de borrar ------>
                                <div class="modal fade" id="modalEliminar{{$zona->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header d-flex justify-content-center">
                                                <h4>Eliminar Registro</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center">Está seguro(a) de eliminar el cliente {{$zona->nombre_zona}} / ID: {{$zona->id}}?</p>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('zonas.destroy', $zona->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="fas fa-trash-alt"></i> Borrar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--fin modal-->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $zonas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
