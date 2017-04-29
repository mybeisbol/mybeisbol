@extends('admin.layouts.home')

<!-- define title of the page -->
@section('title','Admins')

<!-- define main-icon -->
@section('main-icon','fa-user')

<!-- define full-name -->
@section('full-name')
    {{ Auth::user()->first_name." ".Auth::user()->last_name }}
@endsection

@section('add_css')
    <!-- Pnotify -->
    <link href="{{ asset('/css/pnotify/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/pnotify/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/pnotify/pnotify.nonblock.css') }}" rel="stylesheet">

    <!-- Switchery -->
    <link href="{{ asset('/css/switchery.min.css') }}" rel="stylesheet">
@endsection

@section('page-content')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lista de Administradores</h2>

                        <ul class="nav navbar-right panel_toolbox dropdown-usermenu">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                <ul class="dropdown-menu list-unstyled" role="menu">
                                    <li><a href="{{ url('/admins/create') }}"><i class="fa fa-plus-square"></i> Adicionar</a></li>

                                </ul>
                            </li>
                            <li><a href="{{ url('/admins/create') }}" class=""><i class="fa fa-plus"></i></a>
                            </li>
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            @if(isset($admins))
                                <thead>
                                    <th>Nombre</th>
                                    <th>Correo Electronico</th>
                                    <th>Roles</th>
                                    <th>Ultima Actualizacion</th>
                                    <th>Actualizado por</th>
                                    <th>Activo</th>
                                    <th>Accion</th>
                                </thead>


                                <tbody>
                                @foreach($admins as $id => $admin)
                                    <tr>

                                        <td>{{ $admin->first_name." ".$admin->last_name }}
                                            <br />
                                            <small class="light-gray">Created {{ formatDate($admin->created_at) }}</small>
                                        </td>
                                        <td>{{ $admin->email }}</td>
                                        <td align="center">
                                            @foreach($admin->roles as $rolId => $rolName)
                                                @if(!empty($rolName))
                                                    <?php
                                                        switch ($rolId){
                                                            case 1:
                                                                echo '<label class="btn-success btn-xs">';
                                                            break;
                                                            case 2:
                                                                echo '<label class="btn-info btn-xs">';
                                                            break;
                                                            case 3:
                                                                echo '<label class="btn-danger btn-xs">';
                                                            break;
                                                            case 4:
                                                                echo '<label class="btn-block btn-xs">';
                                                            break;
                                                            default:
                                                                echo '<label class="btn-warning btn-xs">';
                                                            break;

                                                        }
                                                        echo $rolName;
                                                        echo '</label>';

                                                    ?>

                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ formatDate($admin->updated_at) }}</td>
                                        <td>{{ $admin->updated_by }}</td>
                                        <td align="center">
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" data-id="{{ $id }}" class="js-switch" @if($admin->is_active) checked @endif />
                                                </label>
                                            </div>
                                        </td>
                                        <td align="center">
                                            <a href="{{ url('/admins/'.$admin->id.'/edit') }}" style="cursor: pointer"><i class="glyphicon glyphicon-edit"  style="font-size: large"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('add_js')
    <!-- pnotifiy -->
    <script src="{{ asset('js/pnotify/pnotify.js') }}"></script>
    <script src="{{ asset('js/pnotify/pnotify.buttons.js') }}"></script>
    <script src="{{ asset('js/pnotify/pnotify.nonblock.js') }}"></script>

    <!-- Switchery -->
    <script src="{{ asset('js/switchery.min.js') }}"></script>

    <!-- custom -->
    <script src="{{ asset('js/custom/admin.js') }}"></script>

    <!-- ajax -->
    <script src="{{ asset('js/ajax.lib.js') }}"></script>
@endsection