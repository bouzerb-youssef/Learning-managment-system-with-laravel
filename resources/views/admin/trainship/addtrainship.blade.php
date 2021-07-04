@extends('admin.layouts.app')
@section('content')
<br><br><br>
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Trainships </a></li>
                    <li>Add New Trainship</li>
                </ul>
            </nav>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong></strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div uk-grid="" class="uk-grid">
      

            <div class="uk-width-2-4@m">

                <div class="card rounded">
                    <div class="p-3">
                        <h5 class="mb-0"> Add Traiship</h5>
                    </div>
                    <hr class="m-0">
                    <form action="{{route("admin.trainship.store")}}"   method="POST">
                        {{ csrf_field() }}
                        <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" >
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> title</h5>
                                    <input type="text" class="uk-input"name="title" placeholder="title ">
                                </div>
                        
                             
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> Begun date* </h5>
                                    <input type="date" name="begundate" id="birthDate" class="form-control">
                                </div>
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> End Date* </h5>
                                    <input type="date" name="enddate" id="birthDate" class="form-control">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Select Student* </h5>
                                    <select name="user_id" class="uk-select">
                                        @if (isset($students) && $students->count()>0)
                                        @foreach ($students as $student)
                                        <option value="{{$student->id}}">{{$student->student}} </option>
                
                                        @endforeach
                                        @endif
                                    </select>
                                </div>  
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> company*</h5>
                                    <input type="text" class="uk-input"name="company" placeholder="company ">
                                </div>
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2"> responsible*</h5>
                                    <input type="text" class="uk-input"name="responsible" placeholder="responsible ">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Description *</h5>
                                    <textarea  name="description"   class="form-control"></textarea>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Address* </h5>
                                    <textarea  name="address" class="form-control"></textarea>
                                </div>

                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> </h5>
                                   
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> </h5>
                                   
                                </div>
                                <div class="d-flex justify-content-between ">
        
                                    <h3>  </h3>
                            
                                    <div >
                                        <button  type="submit" class="btn btn-outline-dark">Save </button>
                                    </div>  
                                </div>
                            </div>
                        </form>
                    </div>
                  
                
                </div>
                
            </div>
        </div>

    </div>

</div>    

    
@endsection
@section('scripts')
<script src="https://cdn.tiny.cloud/1/lp3k352k7b0pyw7jy2uvuh5igu4nxqn3k2bgrocu3c6kvhho/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector: '.mytextarea',
  language: 'ar'
});
</script>

@endsection