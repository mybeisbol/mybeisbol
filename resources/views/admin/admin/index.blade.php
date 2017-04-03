@extends('admin.layouts.home')

<!-- define title of the page -->
@section('title','Admins')

<!-- define main-icon -->
@section('main-icon','fa-user')

<!-- define full-name -->
@section('full-name')
    {{ Auth::user()->first_name." ".Auth::user()->last_name }}
@endsection

@section('page-content')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lista de Administradores</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                                <th>Actions</th>
                                </thead>


                                <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->first_name." ".$admin->last_name }}
                                            <br />
                                            <small class="light-gray">Created {{ formatDate($admin->created_at) }}</small>
                                        </td>
                                        <td>{{ $admin->email }}</td>
                                        <td align="center" style="max-width: 150px;">
                                            @foreach($admin->roles as $rolName)
                                                @if(!empty($rolName))
                                                    <label class="btn-success btn-xs">
                                                        {{ $rolName }}
                                                    </label>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ formatDate($admin->updated_at) }}</td>
                                        <td>{{ $admin->updated_by }}</td>
                                        <td align="center">
                                            @if($admin->is_active)
                                                <span class="fa fa-check green"></span>
                                            @else
                                                <span class="fa fa-remove red"></span>
                                            @endif
                                            </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success">Action</button>
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Modificar</a>
                                                    </li>
                                                    <li><a href="#">Desactivar</a>
                                                    </li>


                                                </ul>
                                            </div>
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
@endsection