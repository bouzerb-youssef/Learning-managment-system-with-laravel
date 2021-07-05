@extends('admin.layouts.app')
@section('content')

<div class="page-content">
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="#"> Students </a></li>
                    <li>Add  Student</li>
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
          

            <div class="uk-width-2-4@m ">

                <div class="card rounded">
                    <div class="p-3">
                        <h5 class="mb-0"> Add Student </h5>
                    </div>
                    <hr class="m-0" style='border-top: ridge ;'>
                    <h4 style='padding: 24px 10px 0px 10px;'>Personnel Informations:</h4>

                    <form   onsubmit="return Validation()" action="{{route("admin.student.store")}}" method="POST" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                        <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">          
                                <div class="uk-first-column">
                                    <h5 class="uk-text-bold mb-2">Name</h5>
                                    <input type="text" class="uk-input"  name="name" placeholder="name">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2">Profile Photo</h5>
                                    <div class="uk-margin"> 
                                        <div uk-form-custom="target: true" class="uk-form-custom uk-first-column">
                                            <input type="file" name='photo'>
                                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Photo" disabled="">
                                        </div>
                                    </div> 
                                </div>
                               
                        
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Sex </h5>
                                    <select  name="sex"  class="uk-select">
                                        <option value="0" >femele</option>
                                        <option value="1">male</option>
                                    </select>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> CIN</h5>
                                    <input type="text" class="uk-input"   name="cin" placeholder="cin">
                                </div>
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2">phone </h5>
                                    <input type="text" class="uk-input"    name="phone" placeholder="+212....">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Birthday Date</h5>
                                    <input type="date" class="uk-input" placeholder="Age" name="age">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Family Situation </h5>
                                    <select name="familySituation" class="uk-select">
                                        <option value="Celibate" >Celibate</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorce">Divorce</option>
                                    </select>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2">Children Number</h5>
                                    <input type="number" class="uk-input" name="childrenNmb"   placeholder="Children Number">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Education Level </h5>
                                    <select name="educationLevel" class="uk-select">
                                        <option value="Primary School 1">Primary School 1	 </option>
                                        <option value="Primary School 2">Primary School 2	</option>
                                        <option value="Primary School 3">Primary School 3	 </option>
                                        <option value="Primary School 4" >Primary School 4	</option>
                                        <option value="Primary School 5">Primary School 5	</option>
                                        <option value="Primary School 6">Primary School 6	</option>
                                        <option value="Basic Education Cycle collégial 7" >Basic Education (Cycle collégial) 7</option>
                                        <option value="Basic Education Cycle collégial 8">Basic Education (Cycle collégial) 8</option>
                                        <option value="Basic Education Cycle collégial 9">Basic Education (Cycle collégial) 9</option>
                                        <option value="General Secondary Cycle qualificant 10" >General Secondary (Cycle qualificant) 10</option>
                                        <option value="General Secondary Cycle qualificant 11">General Secondary (Cycle qualificant) 11</option>
                                        <option value="General Secondary Cycle qualificant 12">General Secondary (Cycle qualificant) 12</option>
                                    </select>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Address</h5>
                                    <textarea  name="address" placeholder="Address" {{-- class="mytextarea"  --}} class="form-control"></textarea>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Nots</h5>
                                    <textarea  name="nots" {{-- class="mytextarea" --}}  placeholder="Nots"   class="form-control"></textarea>
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
                            
                                   
                        </div>
                      
                    </div> 
                    <hr class="m-0" style='border-top: ridge ;' >
                    <h4 style='padding: 24px 10px 0px 10px;'>Student Attachments:</h4>
                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                        <div class="uk-grid-margin uk-first-column">
                            <h5 class="uk-text-bold mb-2">Birth Document</h5>
                            <div class="uk-margin"> 
                                <div uk-form-custom="target: true" class="uk-form-custom uk-first-column">
                                    <input type="file" name='actdenaissance'>
                                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Birth Document" disabled="">
                                </div>
                            </div> 
                        </div>
                        <div class="uk-grid-margin uk-first-column">
                            <h5 class="uk-text-bold mb-2">Cin Document</h5>
                            <div class="uk-margin"> 
                                <div uk-form-custom="target: true" class="uk-form-custom uk-first-column">
                                    <input type="file" name='cincopie'>
                                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Cin Document" disabled="">
                                </div>
                            </div> 
                        </div>
                        <div class="uk-grid-margin uk-first-column">
                            <h5 class="uk-text-bold mb-2">Ramid document</h5>
                            <div class="uk-margin"> 
                                <div uk-form-custom="target: true" class="uk-form-custom uk-first-column">
                                    <input type="file" name='ramid'>
                                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Ramid document" disabled="">
                                </div>
                            </div> 
                        </div>

                    </div>
               
                    <hr class="m-0" style='border-top: ridge ;' >
                    <h4 style='padding: 24px 10px 0px 10px;'>Login Information:</h4>
                    <div style='margin: 10px;background-color: #ffab00;border-radius: 22px;' class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                        <div class="uk-first-column">
                            <h5 class="uk-text-bold mb-2"> Email</h5>
                            <input type="text" class="uk-input"   name="email" placeholder="email">
                        </div>
                        <div class="uk-first-column">
                            <h5 class="uk-text-bold mb-2"> Password</h5>
                            <input type="text" class="uk-input"  name="password" placeholder="Password">
                        </div> 
                    </div>
                    <div class="uk-child-width-2-6@s uk-grid-small p-4 uk-grid" uk-grid="" >
                        <button type="submit" class="btn btn-outline-dark">Save</button>
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
  language: 'en'
});
</script>

@endsection