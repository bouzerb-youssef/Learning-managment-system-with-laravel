@extends('admin.layouts.app')

@section('content')

    @livewire('admin.lesson.editlesson', ['lesson' => $lesson])     
         
@endsection
