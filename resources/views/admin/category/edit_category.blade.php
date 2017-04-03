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
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="panel-heading"><h2>Adicionar Categoria</h2></div>
                        <form class="form-horizontal" role="form" method="post" action="{{ url(route('categories.update', $categories->id)) }}">
                            <input name="_method" type="hidden" value="PUT">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{ $categories->name }}">

                                    @if($errors->has('name'))
                                        <span style="color: red;">{{ $errors->first('name') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Descripcion</label>
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
                                <label for="order" class="col-sm-2 control-label">Orden</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="order" value="{{ $categories->order }}">

                                    @if($errors->has('order'))
                                        <span style="color: red;">{{ $errors->first('order') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="order" class="col-sm-2 control-label">Tipo</label>
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
                                    <button class="btn btn-default">Cancelar</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection