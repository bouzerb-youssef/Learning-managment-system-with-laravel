@extends('admin.layouts.app')

@section('content')

 @livewire('admin.lesson.addlesson', ['cource' => $cource])       
@endsection
