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
                        <div class="x_title" style="background-color: #1ABB9C">
                            <h2>Lista de Categorias
                                </br><small>Muestra las categorias existentes</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li>
                                    <a href="categories/create" class="btn-success">Adicionar</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered">
                                @if(isset($categories))
                                    <thead>
                                    <th>Name</th>
                                    <th>Parent</th>
                                    <th>Order</th>
                                    <th>Type</th>
                                    <th>Active</th>
                                    <th>Acciones</th>
                                    </thead>


                                <tbody>
                                @foreach($categories as $n)
                                    <tr>
                                        <td title="{{ $n->description }}">{{ $n->name }}
                                            <br />
                                            <small class="light-gray">{{ $n->description }}</small>
                                        </td>
                                        <td>{{ $n->parent }}</td>
                                        <td>{{ $n->order }}</td>
                                        <td>
                                         @if($n->cat_type=="Menu Rojo")
                                                <label class="btn-warning btn-xs">{{ $n->cat_type }}</label>
                                             @else
                                                <label class="btn-default btn-xs">{{ $n->cat_type }}</label>
                                             @endif
                                        </td>
                                        <td>{{ $n->is_active }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success">Action</button>
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="categories/{{ $n->id }}/edit" class="btn btn-success">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('categories.destroy', $n->id) }}" method="POST">
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            {{ csrf_field() }}
                                                            <input type="submit" class="btn btn-success" value="Activar"></input>
                                                        </form>
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