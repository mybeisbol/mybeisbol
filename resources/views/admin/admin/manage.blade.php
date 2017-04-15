@extends('admin.layouts.home')

<!-- define title of the page -->
@section('title',$action.' Administrador')

<!-- define main-icon -->
@section('main-icon','fa-user')

<!-- define full-name -->
@section('full-name')
    {{ Auth::user()->first_name." ".Auth::user()->last_name }}
@endsection

@section('user-action',$action);

@section('page-content')
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>@yield('user-action') Administradores </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form class="form-horizontal form-label-left" action="{{  url('/admins') }}" method="<?= isset($user->id) || !empty($user->id) ? "put" : "post" ?>">
                                {{ csrf_field() }}
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombres <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="first_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="first_name" placeholder="Primer y/o Segundo nombre(s) e.g Carlos Manuel" required="required" type="text" value="<?= isset($user->first_name) ? $user->first_name: '' ; ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="last_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="last_name" placeholder="Apellido(s) e.g Gonzalez Perez" required="required" type="text" value="<?= isset($user->last_name) ? $user->last_name: '' ; ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12"  placeholder="e.g admin@mybeisbol.com" value="<?= isset($user->email) ? $user->email: '' ; ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirmar Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email2" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="e.g admin@mybeisbol.com" value="<?= isset($user->email) ? $user->email: '' ; ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña @if($action == "Adicionar") <span class="required">*</span> @endif</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" @if($action == "Adicionar") required="required" @endif>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repetir Contraseña @if($action == "Adicionar") <span class="required">*</span> @endif</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" @if($action == "Adicionar") required="required" @endif>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div id="gender" class="btn-group">
                                            M: <input type="radio" class="flat" name="gender" id="genderM" value="M" checked required />
                                            F:  <input type="radio" class="flat" name="gender" id="genderF" value="F" <?php if(isset($user->gender) && $user->gender == "F") echo "checked";?> />

                                        </div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Edad <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="age" name="age" required="required" data-validate-minmax="16,80" class="form-control col-md-7 col-xs-12" value="<?= isset($user->age) ? $user->age: '' ; ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Roles*</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p style="padding: 5px;">
                                            @foreach(\App\Role::all() as $rol)
                                                <input type="checkbox" name="roles[]" id="rol_{{ $rol->id }}" value="{{ $rol->id }}" class="flat" <?php if(isset($roles[$rol->id])) echo "checked"; ?> /> {{ $rol->name }}<br />
                                            @endforeach
                                        </p>
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Cancel</button>
                                        <button id="send" type="submit" class="btn btn-success">Submit</button>
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

@section('add_js')
    <!-- validator -->
    <script src="{{ asset('js/validator/validator.js') }}"></script>
@endsection
