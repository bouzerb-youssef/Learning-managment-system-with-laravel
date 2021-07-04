@extends('admin.layouts.app')
@section('content')
<br><br><br>
<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Students </a></li>
                    <li>Edit Student</li>
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
                        <h5 class="mb-0"> Add Student</h5>
                    </div>
                    <hr class="m-0">
                    <form  action="{{route("admin.student.update",$student->id)}}" method="POST" enctype="multipart/form-data" class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                                    {{ csrf_field() }}
                                <div class="uk-first-column">
                                    <h5 class="uk-text-bold mb-2">Name</h5>
                                    <input type="text" class="uk-input" value="{{$student->name}}" name="name" placeholder="name">
                                </div>
                               
                                <div class="uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Email</h5>
                                    <input type="text" class="uk-input"  value="{{$student->email}}" name="email" placeholder="email">
                                </div>
                                <div class="uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Password</h5>
                                    <input type="text" class="uk-input"  name="password" placeholder="Password">
                                </div> 
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Sex </h5>
                                    <select  name="sex"  class="uk-select">
                                        <option value="0" >femmel</option>
                                        <option value="1">male</option>
                                    </select>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> CIN</h5>
                                    <input type="text" class="uk-input"  value="{{$student->cin}}"  name="cin" placeholder="cin">
                                </div>
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2">phone </h5>
                                    <input type="text" class="uk-input"  value="{{$student->phone}}"  name="phone" placeholder="phone">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Age</h5>
                                    <input type="text" class="uk-input" placeholder="Age" value="{{$student->age}}"   name="age">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Family Situation </h5>
                                    <select name="familySituation" class="uk-select">
                                        <option value="0" >عازب</option>
                                        <option value="1">متزوج</option>
                                        <option value="2">مطلق</option>
                                    </select>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2">Children Number</h5>
                                    <input type="text" class="uk-input" name="childrenNmb"  value="{{$student->childrenNmb}}" placeholder="Children Number">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Education Level</h5>
                                    <input type="text" class="uk-input" name="educationLevel" value="{{$student->educationLevel}}" placeholder="Education Level">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Address</h5>
                                    <textarea  name="address" placeholder="Address" {{-- class="mytextarea"  --}} class="form-control">{{$student->address}}</textarea>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Nots</h5>
                                    <textarea  name="nots" {{-- class="mytextarea" --}}  placeholder="Nots"   class="form-control">{{$student->nots}}</textarea>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2">Profile Photo</h5>
                                    <div class="uk-margin"> 
                                        <div uk-form-custom> 
                                            <input type="file" name="photo"> 
                                            <button class="uk-uk-button uk-button-default" type="button" tabindex="-1">Select a Photo</button> 
                                        </div> 
                                    </div> 
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2">Select Group </h5>
                                    <select name="group_id" class="uk-select">
                                        @if (isset($groups) && $groups->count()>0)
                                        @foreach ($groups as $group)
                                        <option value="{{$group->id}}">{{$group->title}} </option>

                                        @endforeach
                                        @endif
                                    </select>
                                </div>  
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> </h5>
                                </div>
                                <div class="d-flex justify-content-between mb-3">

                                    <h3>  </h3>
                            
                                    <div>
                                        <button type="submit" class="btn btn-outline-dark">Save</button>
                            
                                    </div>
                        </div>
                     </form>
               
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