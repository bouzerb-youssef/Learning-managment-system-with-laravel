@extends('front.layouts.app')
@section('content')
    <br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">نتائج الاختبار</div>
    
                    <div class="card-body">
                        @if(session('status'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        <p>{{ session('status') }}</p>
    
                                       
                                    </div>
                                </div>
                            </div>
                        @endif
    
                        <p>   عدد النقاط : {{ $result->total_points}} نقطة   </p>
    
                        <a href="/profile" class="btn btn-primary">الصفحة الشخصية

                        </a>
    
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection