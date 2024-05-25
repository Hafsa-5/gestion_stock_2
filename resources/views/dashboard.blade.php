@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Dashboard</h4>
    </div>
@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="statistic bg-primary p-4 d-flex align-items-center rounded">
                    <div class="icon col-4">
                        <span style="font-size:60px">
                            <i class="fas fa-users"></i>
                        </span>
                    </div>
                    <div class="col-8 pl-3">
                        <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Entite::all()->count()}}</b></div>
                        <div class="label" style="font-size:24px">Entités</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="statistic bg-primary p-4 d-flex align-items-center rounded">
                    <div class="icon col-4">
                        <span style="font-size:60px">
                            <i class="fas fa-users"></i>
                        </span>
                    </div>
                    <div class="col-8 pl-3">
                        <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Agent::all()->count()}}</b></div>
                        <div class="label" style="font-size:24px">Agents</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="statistic bg-success p-4 d-flex align-items-center rounded">
                    <div class="icon col-4">
                        <span style="font-size:60px">
                            <i class="fas fa-user-tag"></i>
                        </span>
                    </div>
                    <div class="col-8 pl-3">
                        <div class="value" style="font-size:65px; line-height:65px"><b>{{\Spatie\Permission\Models\Role::all()->count()}}</b></div>
                        <div class="label" style="font-size:24px">Rôles</div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="statistic bg-warning p-4 d-flex align-items-center rounded">
                    <div class="icon col-4">
                    <span style="font-size:60px">
                        <i class="fas fa-building"></i>
                    </span>
                    </div>
                    <div class="col-8 pl-3">
                        <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Fournisseur::all()->count()}}</b></div>
                        <div class="label" style="font-size:24px">Fournisseurs</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="statistic bg-secondary p-4 d-flex align-items-center rounded">
                    <div class="icon col-4">
                    <span style="font-size:60px">
                        <i class="fas fa-home"></i>
                    </span>
                    </div>
                    <div class="col-8 pl-3">
                        <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Demande::all()->count()}}</b></div>
                        <div class="label" style="font-size:24px">Demandes</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="statistic bg-danger p-4 d-flex align-items-center rounded">
                    <div class="icon col-4">
                    <span style="font-size:60px">
                        <i class="fas fa-exclamation-circle"></i>
                    </span>
                    </div>
                    <div class="col-8 pl-3">
                        <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Contrat::all()->count()}}</b></div>
                        <div class="label" style="font-size:24px">Contrats</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="statistic bg-info p-4 d-flex align-items-center rounded">
                    <div class="icon col-4">
                    <span style="font-size:60px">
                        <i class="fas fa-calendar"></i>
                    </span>
                    </div>
                    <div class="col-8 pl-3">
                        <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Article::all()->count()}}</b></div>
                        <div class="label" style="font-size:24px">Articles</div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script> console.log('Hi!'); </script>
    @stop
