@extends('admin.layouts.home')

<!-- define title of the page -->
@section('title','Adicionar Administrador')

<!-- define main-icon -->
@section('main-icon','fa-user')

<!-- define full-name -->
@section('full-name')
    {{ Auth::user()->first_name." ".Auth::user()->last_name }}
@endsection

@section('user-action','Crear');

@section('page-content')
    @include('admin.admin.manage');
@endsection

