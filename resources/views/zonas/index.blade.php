@extends('layouts.escritorio')

@section('styles')
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> -->
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


        <!-- modalEliminar se muestra al hacer click en boton de borrar ------>
        <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h4>Eliminar Registro</h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('zonas.destroy', @id ) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class='btn btn-danger btn-sm' type='submit' data-toggle='tooltip' data-placement='top' title='Borrar'><i class='fas fa-trash-alt'></i> Borrar</button>
                    </form>
                    </div>
                </div>
            </div>
        </div><!--fin modal-->
    </div>
@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>

    function mostrarmodal(id){
        var texto1 = '<p class="text-center">Está seguro(a) de eliminar el cliente  / ID: '+ id +' ?</p>';

        texto1= texto1 + "<button type='button' class='btn btn-secondary btn-sm' onclick='borrarzona("+ id +")'>mostrar</button>"

        $('.modal-body').html(texto1);
        $('#modalEliminar').modal({show:true});

    }

    function borrarzona(id){
        var deletePostUri = '{{ route("zonas.destroy","temp")}}';
        deletePostUri= deletePostUri.replace("temp",id)
        var token = $("meta[name='csrf-token']").attr("content");

        console.log(deletePostUri)
        console.log(token)
        console.log(id)

        $.ajax({
            type: "DELETE",
            url: deletePostUri,
            data: {
                "id": id,
                "_token": token,
            },
            success: function (data) {
                table.ajax.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }

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
</script>
@endsection
