@extends('layouts.escritorio')

@section('content')

<div id="app"></div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h1 mb-0 text-gray-800">Perfil usuario</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Boton de opcion</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Cinta superior-->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card text-white bg-info shadow">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <p class="m-0">Horas a Facturar</p>
                            <p class="m-0"><strong>20 horas</strong></p>
                        </div>
                        <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                    </div>
                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;15% de las tareas</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <p class="m-0">Horas Facturadas</p>
                            <p class="m-0"><strong>120 horas</strong></p>
                        </div>
                        <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                    </div>
                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;Mes de febrero 2020</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <p class="m-0">Estado de Cuenta</p>
                            <p class="m-0"><strong>Al día</strong></p>
                        </div>
                        <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                    </div>
                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;a la fecha de hoy</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header py-3">
                    <h6 class="text-primary font-weight-bold m-0">Perfil</h6>
                </div>
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="{{ asset('/img/profile.jpeg') }}" width="160" height="160">
                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Cambiar Foto</button></div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary font-weight-bold m-0">Tracing Actuales</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Server migration<span class="float-right">20%</span></h4>
                    <div class="progress progress-sm mb-3">
                        <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span></div>
                    </div>
                    <h4 class="small font-weight-bold">Sales tracking<span class="float-right">40%</span></h4>
                    <div class="progress progress-sm mb-3">
                        <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span></div>
                    </div>
                    <h4 class="small font-weight-bold">Customer Database<span class="float-right">60%</span></h4>
                    <div class="progress progress-sm mb-3">
                        <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span></div>
                    </div>
                    <h4 class="small font-weight-bold">Payout Details<span class="float-right">80%</span></h4>
                    <div class="progress progress-sm mb-3">
                        <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span></div>
                    </div>
                    <h4 class="small font-weight-bold">Account setup<span class="float-right">Complete!</span></h4>
                    <div class="progress progress-sm mb-3">
                        <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Datos del Usuario</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="username"><strong>Nombre de Usuario</strong></label>
                                            <input class="form-control" type="text" placeholder="user.name" name="username" value="{{ Auth::user()->username }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email"><strong>Correo Electrónico</strong></label>
                                            <input class="form-control" type="email" placeholder="user@example.com" name="email" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="first_name"><strong>Nombre</strong></label>
                                            <input class="form-control" type="text" placeholder="John" name="first_name" value="{{ Auth::user()->firstname }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="last_name"><strong>Apellido</strong></label>
                                            <input class="form-control" type="text" placeholder="Doe" name="last_name" value="{{ Auth::user()->lastname }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Guardar</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Datos de contacto</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group"><label for="address"><strong>Dirección</strong></label><input class="form-control" type="text" placeholder="Sunset Blvd, 38" name="address"></div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="city"><strong>Ciudad</strong></label><input class="form-control" type="text" placeholder="Caracas" name="city"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="country"><strong>Pais</strong></label><input class="form-control" type="text" placeholder="Venezuela" name="country"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">Guardar&nbsp;datos</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
