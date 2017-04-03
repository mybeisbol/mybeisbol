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


            <div class="clearfix"></div>
            <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="panel-heading"><h2>Adicionar Categoria</h2></div>
                        @if(isset($edit))
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="{{ url(route('categories.update', $categories->id)) }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" value="{{ $categories->name }}">

                                            @if($errors->has('name'))
                                                <span style="color: red;">{{ $errors->first('name') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="description" value="{{ $categories->description }}"></input>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent" class="col-sm-2 control-label">Parent</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="parent" value="{{ $categories->parent }}">

                                            @if($errors->has('parent'))
                                                <span style="color: red;">{{ $errors->first('parent') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="order" class="col-sm-2 control-label">Order</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="order" value="{{ $categories->order }}">

                                            @if($errors->has('order'))
                                                <span style="color: red;">{{ $errors->first('order') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="order" class="col-sm-2 control-label">Type</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="type" value="{{ $categories->cat_type }}">

                                            @if($errors->has('type'))
                                                <span style="color: red;">{{ $errors->first('type') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-default">Editar</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        @else
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post" action="{{ url('categories') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" placeholder="name">

                                        @if($errors->has('name'))
                                            <span style="color: red;">{{ $errors->first('name') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="description" placeholder="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="parent" class="col-sm-2 control-label">Parent</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="parent" placeholder="parent">

                                        @if($errors->has('parent'))
                                            <span style="color: red;">{{ $errors->first('parent') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="order" class="col-sm-2 control-label">Order</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="order" placeholder="order">

                                        @if($errors->has('order'))
                                            <span style="color: red;">{{ $errors->first('order') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="order" class="col-sm-2 control-label">Type</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="type" placeholder="type">

                                        @if($errors->has('type'))
                                            <span style="color: red;">{{ $errors->first('type') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Adicionar</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Lista de Categorias</h2>
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
                                @if(isset($categories))
                                    <thead>
                                    <th>Name</th>
                                    <th>Parent</th>
                                    <th>Order</th>
                                    <th>Type</th>
                                    <th>Active</th>
                                    <th></th>
                                    </thead>


                                <tbody>
                                @foreach($categories as $n)
                                    <tr>
                                        <td>{{ $n->name }}</td>
                                        <td>{{ $n->parent }}</td>
                                        <td>{{ $n->order }}</td>
                                        <td>{{ $n->cat_type }}</td>
                                        <td>{{ $n->is_active }}</td>
                                        <td>
                                            <a href="categories/{{ $n->id }}/edit" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
                                            <form action="{{ route('categories.destroy', $n->id) }}" method="POST">
                                                <input name="_method" type="hidden" value="DELETE">
                                                {{ csrf_field() }}
                                                <input type="submit" class="btn btn-default" value="Activar"></input>
                                            </form>
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
        @endif
    </div>

@endsection