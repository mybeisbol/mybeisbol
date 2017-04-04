
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Adicionar Categoria</div>

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
                                <label for="menu" class="col-sm-2 control-label">Menu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="menu" placeholder="menu">

                                    @if($errors->has('menu'))
                                        <span style="color: red;">{{ $errors->first('menu') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Adicionar</button>
                                </div>
                            </div>
                        </form>
                        <div class="panel-body">
                            @include('categories.show_categories');
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection