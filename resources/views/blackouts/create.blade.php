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
                        <h1 class="h1 mb-0 text-gray-800">Crear apagon</h1>
                        <div class="btn-group" role="group" aria-label="botones">
                            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('blackouts') }}"><i class="fas fa-arrow-alt-circle-left fa-sm text-white-50"></i> Volver</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('blackouts.store') }}">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="FechaInicio">FechaInicio</label>
                              <input type="date" class="form-control" id="FechaInicio" name="FechaInicio">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="HoraInicio">HoraInicio</label>
                              <input type="time" class="form-control" id="HoraInicio" name="HoraInicio">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="FechaFinal">FechaFinal</label>
                              <input type="date" class="form-control" id="FechaFinal" name="FechaFinal">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="HoraFinal">HoraFinal</label>
                              <input type="time" class="form-control" id="HoraFinal" name="HoraFinal">
                            </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-3">
                            <label for="inputState">Zona</label>
                            <select id="zona_id" name="zona_id" class="form-control">
                              <option selected>Choose...</option>
                              @foreach ($zonas as $zona)
                                <option value="{{$zona->id}}">{{$zona->nombre_zona}}</option>
                              @endforeach

                            </select>
                          </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="descripcion">descripcion</label>
                              <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                            </div>
                          </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
