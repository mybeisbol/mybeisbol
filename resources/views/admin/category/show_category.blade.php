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
                                    <a href="categories/create">Adicionar</a>
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
                                        <td title="{{ $n->description }}">{{ $n->name }}</td>
                                        <td>{{ $n->parent }}</td>
                                        <td>{{ $n->order }}</td>
                                        <td>{{ $n->cat_type }}</td>
                                        <td>{{ $n->is_active }}</td>
                                        <td>
                                            <li class="dropdown">
                                                <a href="#" class="fa fa-gears" data-toggle="dropdown" ></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="categories/{{ $n->id }}/edit" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('categories.destroy', $n->id) }}" method="POST">
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            {{ csrf_field() }}
                                                            <input type="submit" class="btn btn-default" value="Activar"></input>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
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