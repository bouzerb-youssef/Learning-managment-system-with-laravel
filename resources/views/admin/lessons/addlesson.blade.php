@extends('admin.layouts.app')

@section('content')

 @livewire('admin.lesson.addlesson', ['section' => $section])       
@endsection
