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
                    <form  action="{{route("admin.student.store")}}" method="POST" enctype="multipart/form-data" >
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
                                        <option value="0" >femmel</option>
                                        <option value="1">male</option>
                                    </select>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> CIN</h5>
                                    <input type="text" class="uk-input"   name="cin" placeholder="cin">
                                </div>
                                <div class="uk-grid-margin">
                                    <h5 class="uk-text-bold mb-2">phone </h5>
                                    <input type="text" class="uk-input"    name="phone" placeholder="phone">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Age</h5>
                                    <input type="text" class="uk-input" placeholder="Age"    name="age">
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
                                    <input type="text" class="uk-input" name="childrenNmb"   placeholder="Children Number">
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <h5 class="uk-text-bold mb-2"> Education Level</h5>
                                    <input type="text" class="uk-input" name="educationLevel"  placeholder="Education Level">
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
                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                        <div class="uk-grid-margin uk-first-column">
                            <h5 class="uk-text-bold mb-2">act de naissance</h5>
                            <div class="uk-margin"> 
                                <div uk-form-custom="target: true" class="uk-form-custom uk-first-column">
                                    <input type="file" name='actdenaissance'>
                                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Photo" disabled="">
                                </div>
                            </div> 
                        </div>
                        <div class="uk-grid-margin uk-first-column">
                            <h5 class="uk-text-bold mb-2">cin copie</h5>
                            <div class="uk-margin"> 
                                <div uk-form-custom="target: true" class="uk-form-custom uk-first-column">
                                    <input type="file" name='cincopie'>
                                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Photo" disabled="">
                                </div>
                            </div> 
                        </div>
                        <div class="uk-grid-margin uk-first-column">
                            <h5 class="uk-text-bold mb-2">ramid</h5>
                            <div class="uk-margin"> 
                                <div uk-form-custom="target: true" class="uk-form-custom uk-first-column">
                                    <input type="file" name='ramid'>
                                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Select Photo" disabled="">
                                </div>
                            </div> 
                        </div>

                    </div>
               
                    <hr class="m-0" style='border-top: ridge ;' >
                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                        <div class="uk-first-column">
                            <h5 class="uk-text-bold mb-2"> Email</h5>
                            <input type="text" class="uk-input"   name="email" placeholder="email">
                        </div>
                        <div class="uk-first-column">
                            <h5 class="uk-text-bold mb-2"> Password</h5>
                            <input type="text" class="uk-input"  name="password" placeholder="Password">
                        </div> 
                    </div>
                    <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="" >
                        <div class="uk-first-column">
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
  language: 'en'
});
</script>

@endsection