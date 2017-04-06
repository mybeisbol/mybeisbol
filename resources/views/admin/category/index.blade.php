@extends('admin.layouts.home')

<!-- define title of the page -->
@section('title','Dashboard')

<!-- define main-icon -->
@section('main-icon','fa-bar-chart-o')

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
                            <h2>Lista de Categorias</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li>
                                    <a href="categories/create" class="btn-success" style="border: hidden">Adicionar</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered">
                                @if(isset($categories))
                                    <thead>
                                    <th>Nombre</th>
                                    <th>Parent</th>
                                    <th>Orden</th>
                                    <th>Tipo</th>
                                    <th>Activo</th>
                                    <th>Acciones</th>
                                    </thead>


                                <tbody>
                                @foreach($categories as $n)
                                    <tr>
                                        <td title="{{ $n->description }}">{{ $n->name }}
                                            <br />
                                            <small class="light-gray">{{ $n->description }}</small>
                                        </td>
                                        <td align="center">{{ $n->parent }}</td>
                                        <td align="center">{{ $n->order }}</td>
                                        <td align="center">
                                         @if($n->cat_type == 1)
                                                <label class="btn-danger btn-xs">Menu Rojo</label>
                                         @elseif($n->cat_type == 2)
                                                <label class="btn-default btn-xs">Menu Blanco</label>
                                        @elseif($n->cat_type == 3)
                                                <label class="btn-dark btn-xs">Live Score</label>
                                         @endif
                                        </td>
                                        <td align="center">
                                            @if($n->is_active)
                                                <form action="{{ route('categories.destroy', $n->id) }}" method="POST">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <button type="submit" value="" class="fa fa-check green"></button>
                                                </form>
                                            @else
                                                <form action="{{ route('categories.destroy', $n->id) }}" method="POST">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <button type="submit" value="" class="fa fa-remove red"></button>
                                                </form>
                                            @endif</td>
                                        <td align="center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success">Action</button>
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="categories/{{ $n->id }}/edit" class="btn btn-success">Edit</a>
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