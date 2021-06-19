@extends('admin.layouts.app')
@section('content')

@livewire('admin.cources.add', ['categories' => $categories])
@endsection

