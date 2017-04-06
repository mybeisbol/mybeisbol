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
                        <div class="x_title" >
                            <h2>Editar Categoria</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                        <form class="form-horizontal" role="form" method="post" action="{{ url(route('categories.update', $categories->id)) }}">
                            <input name="_method" type="hidden" value="PUT">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{ $categories->name }}">
                                    @if($errors->has('name'))
                                        <span style="color: red;">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Descripcion
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="description" class="form-control col-md-7 col-xs-12" value="{{ $categories->description }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent">Parent <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="select2_single form-control" name="parent" required="required">
                                        <option>{{ $categories->parent }}</option>
                                        <option value="0">Primaria</option>
                                    </select>
                                    @if($errors->has('parent'))
                                        <span style="color: red;">{{ $errors->first('parent') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="order">Orden <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="select2_single form-control" tabindex="-1" name="order" required="required">
                                        <option value="0" @if ($categories->cat_type == 0) selected @endif>0</option>
                                        <option value="1" @if ($categories->cat_type == 1) selected @endif>1</option>
                                        <option value="2" @if ($categories->cat_type == 2) selected @endif>2</option>
                                        <option value="3" @if ($categories->cat_type == 3) selected @endif>3</option>
                                        <option value="4" @if ($categories->cat_type == 4) selected @endif>4</option>
                                        <option value="5" @if ($categories->cat_type == 5) selected @endif>5</option>
                                        <option value="6" @if ($categories->cat_type == 6) selected @endif>6</option>
                                        <option value="7" @if ($categories->cat_type == 7) selected @endif>7</option>
                                        <option value="8" @if ($categories->cat_type == 8) selected @endif>8</option>
                                        <option value="9" @if ($categories->cat_type == 9) selected @endif>9</option>
                                        <option value="10" @if ($categories->cat_type == 10) selected @endif>10</option>
                                    </select>
                                    @if($errors->has('order'))
                                        <span style="color: red;">{{ $errors->first('order') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Tipo <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="select2_single form-control" tabindex="-1" name="type" required="required">
                                        <option value="1" @if ($categories->cat_type == 1) selected @endif>Menu Rojo</option>
                                        <option value="2" @if ($categories->cat_type == 2) selected @endif>Menu Blanco</option>
                                        <option value="3" @if ($categories->cat_type == 3) selected @endif>Menu Negro</option>
                                    </select>
                                    @if($errors->has('type'))
                                        <span style="color: red;">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Aceptar</button>
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