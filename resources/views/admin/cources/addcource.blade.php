@extends('admin.layouts.app')
@section('content')

@livewire('admin.cources.add', ['categories' => $categories])
@endsection
@section('scripts')
<script src="https://cdn.tiny.cloud/1/lp3k352k7b0pyw7jy2uvuh5igu4nxqn3k2bgrocu3c6kvhho/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector: '.mytextarea',
  language: 'ar',
  

});
/* const inputt = document.querySelector("input[type=file]");
inputt.value = "foo";
 */
</script>

@endsection

