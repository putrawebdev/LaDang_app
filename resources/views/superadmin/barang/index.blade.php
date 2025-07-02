@extends('layouts.app')

@section('title', 'Data barang')
@section('aktif-barang', 'active')
@section('content')
    @livewire('superadmin.barang.index')
@endsection