@extends('layouts.escritorio')

@section('styles')
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="app"></div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Zona</h1>
            <a href="{{ route('zonas.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Agregar Zona</a>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="table-responsive-sm">
                    <table class="table table-striped" id="tablazonas" style="width=100%">
                        <thead class="thead-dark">
                            <tr>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">nombre_zona</th>
                                    <th scope="col">ciudad</th>
                                    <th scope="col">parroquia</th>
                                    <th scope="col">municipio</th>
                                    <th scope="col">estado</th>
                                    <th scope="col"></th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            <div>
        </div>
    </div>
@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready( function () {

        /*
        $('#tablazonas').DataTable( {
            "language": {
                "url": "lang/datatables-es.json"
            }
        });
*/

        $(function () {
            var table = $('#tablazonas').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('zonas.list') }}",
                "language": {
                    "url": "lang/datatables-es.json"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nombre_zona', name: 'nombre_zona'},
                    {data: 'ciudad', name: 'ciudad'},
                    {data: 'parroquia', name: 'parroquia'},
                    {data: 'municipio', name: 'municipio'},
                    {data: 'estado', name: 'estado'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


    } );
</script>
@endsection
