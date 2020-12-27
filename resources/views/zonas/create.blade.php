@extends('layouts.escritorio')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Zonas</h1>
                        <a href="{{ route('zonas.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Agregar Zona</a>
                    </div>
                </div>

                <div class="card-body">
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
        </div>
    </div>
    <div class="row">

        <form method="post" action="{{ route('zonas.store') }}">
            @csrf

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nombre_zona">nombre_zona</label>
                <input type="text" class="form-control" id="nombre_zona" name="nombre_zona">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputState">Estado</label>
                <select id="inputState" name="estado" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputState">Municipio</label>
                <select id="inputState" name="municipio" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputState">Parroquia</label>
                <select id="inputState" name="parroquia" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputState">Ciudad</label>
                <select id="inputState" name="ciudad" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>

          </form>

    </div>
</div>
@endsection
