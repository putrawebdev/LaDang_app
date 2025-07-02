@extends('layouts.app')

@section('title', 'Data User')
@section('aktif-user', 'active')
@section('content')
    @livewire('superadmin.user.index')
@endsection
