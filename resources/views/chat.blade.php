@extends('admin.layouts.app')
@section('content')
<br><br><br><br>
    @livewire('chat', [
        'groups' => $groups,
       /*  'group' => $group,*/

        ])
    
  
@endsection