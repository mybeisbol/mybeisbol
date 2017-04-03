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
                          <div class="x_title" style="background-color: #1ABB9C">
                    <h2>Adicionar Categoria
                        </br><small>Introduzca los datos deseados de la categoria</small></h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ url('categories') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre de la categoria">
                                @if($errors->has('name'))
                                    <span style="color: red;">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Descripcion
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" name="description" class="form-control col-md-7 col-xs-12" placeholder="Breve decripcion de la categoria"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent">Parent <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single form-control" tabindex="-1" name="parent" required="required">
                                    <option></option>
                                    <option value="0">Primaria</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
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
                                    <option></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
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
                                    <option></option>
                                    <option value="Menu Rojo">Menu Rojo</option>
                                    <option value="Menu Blanco">Menu Blanco</option>
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

<script>

</script>