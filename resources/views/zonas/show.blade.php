@extends('layouts.escritorio')

@section('content')

<div class="container">

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h1 mb-0 text-gray-800">Editar Zona</h1>
                        <div class="btn-group" role="group" aria-label="botones">
                            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('zonas') }}"><i class="fas fa-arrow-alt-circle-left fa-sm text-white-50"></i> Volver</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="nombre_zona">nombre_zona</label>
                        <input type="text" class="form-control" id="nombre_zona" name="nombre_zona" value="{{$zona->nombre_zona}}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" value="{{$zona->estado}}" disabled>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="municipio">Municipio</label>
                        <input type="text" class="form-control" id="municipio" name="municipio" value="{{$zona->municipio}}" disabled>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="parroquia">Parroquia</label>
                        <input type="text" class="form-control" id="parroquia" name="parroquia" value="{{$zona->parroquia}}" disabled>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{$zona->ciudad}}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
