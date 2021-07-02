@extends('admin.layouts.app')
@section('content')
<div>
    <div class="page-content">
        <div class="page-content-inner">
    
            <div class="d-flex">
                <nav id="breadcrumbs" class="mb-3">
                    <ul>
                        <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                        <li><a href="#"> Setting </a></li>
                        <li>Account Setting</li>
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
                            <h5 class="mb-0"> اضافة فصل</h5>
                        </div>
                       
                        <div class="">
                       <br> <br>           
                            <div>{!!$result['body']['embed']['html']!!}</div>       
                        </div> 
                    </div>
    
                    
                    </div>
    
                </div>
    
    
            </div>
    
        </div>
    
    </div>    
    

</div> 
        

@endsection