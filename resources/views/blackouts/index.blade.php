
@extends('layouts.escritorio')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="col-lg-12 mb-4">
                        <div class="table-responsive-sm">
                            <table class="table table-striped" style="width=100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre Completo</th>
                                        <th scope="col">Compañia</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{$cliente->id}}</td>
                                        <td>{{$cliente->nombres}} {{$cliente->apellidos}}</td>
                                        <td>{{$cliente->razon_social}}</td>
                                        <td>{{$cliente->email}}</td>
                                        <td>{{$cliente->telefono}}</td>
                                        <td style="width: 140px;">
                                            @can('Eliminar clientes')
                                                <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modalEliminar{{$cliente->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                            @endcan
                                            <a class="btn btn-primary btn-sm" href="{{ route('clientes.show',$cliente->id) }}" data-toggle="tooltip" data-placement="top" title="Mostrar"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-success btn-sm" href="{{ route('clientes.edit',$cliente->id) }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>

                                    <!-- modalEliminar se muestra al hacer click en boton de borrar ------>
                                    <div class="modal fade" id="modalEliminar{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex justify-content-center">
                                                    <h4>Eliminar Registro</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-center">Está seguro(a) de eliminar el cliente {{$cliente->razon_social}} / ID: {{$cliente->id}}?</p>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post">
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
                        {{ $clientes->links() }}
                    <div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


