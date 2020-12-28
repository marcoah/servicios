@extends('layouts.escritorio')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Contenido Central -->
            <main role="main" class="col-lg-12 col-sm-12 col-md-12 ml-sm-auto px-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 col-sm-12 border-bottom">
                    <h1>Resultado de la búsqueda: {{$search}} </h1>
                </div>

                <div class="col-sm-12">
                    @isset($message)
                    <div class="alert alert-warning" role="alert">
                        {{$message}}
                    </div>
                    @endisset
                </div>

                <div class="col-sm-12">
                    @isset($resultados)
                    <h3>Total Resultados: {{ $resultados->total() }}</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Autores</td>
                                <td>Titulo</td>
                                <td>ISBN</td>
                                <td>Idioma</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultados as $resultado)
                            <tr>
                                <td>{{$resultado->id}}</td>
                                <td>{{$resultado->autores}}</td>
                                <td>{{$resultado->titulo}}</td>
                                <td>{{$resultado->isbn}}</td>
                                <td>{{$resultado->idioma}}</td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="{{ route('libros.show',$resultado->id) }}" data-toggle="tooltip" data-placement="top" title="Mostrar"><i class="fas fa-eye"></i> Ver detalles</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $resultados->links() }}
                @endisset

            </main><!-- Fin contenido central -->
        </div>
    </div>
@endsection
