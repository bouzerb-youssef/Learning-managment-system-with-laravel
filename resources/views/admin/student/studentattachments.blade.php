@extends('admin.layouts.app')

@section('content')

<br><br><br><br>
<div class="page-content">
<div class="page-content-inner">


    <nav id="breadcrumbs" class="mb-3">
        <ul>
            <li><a href="#"> <i class="uil-home-alt"></i> Students</a></li>
            <li> Student Attachments </li>

        </ul>
    </nav>

    <div class="d-flex justify-content-between mb-3">
        <h4>  </h4>

        <div>
            <a href="{{route('admin.addstudent')}}" class="btn btn-outline-dark">
                <i class="uil-plus"> </i> Add New Student
            </a>
        </div>
    </div>

    <div class="uk-child-width-1-6@m uk-grid" uk-grid="" uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div ; delay: 200">
       
        <div class="uk-first-column uk-scrollspy-inview uk-animation-slide-bottom-small" style="">
            <a href="#">
                </a><div class="card animate-this uk-inline-clip" ><a href="#">
                 @if (!$student->actdenaissance== null)
                            @if (pathinfo($student->actdenaissance, PATHINFO_EXTENSION) == 'docx')
                        
                            <img src="{{asset('../assets/images/course/1.png')}}"  alt="">
                            @elseif(pathinfo($student->actdenaissance, PATHINFO_EXTENSION) == 'txt')
                            <img src="{{asset('../assets/images/course/2.png')}}" alt="">
                            @elseif(pathinfo($student->actdenaissance, PATHINFO_EXTENSION) == 'pdf')
                            <img src="{{asset('../assets/images/course/4.png')}}" alt="">
                            @else
                            <img src="{{asset('../assets/images/course/3.png')}}" alt="">
                            @endif
                    @else 
                    <img src="{{asset('../assets/images/course/2.png')}}" alt="">
                    @endif 
                
                    <div class="card-body text-center pb-3">
                        <h6 class=" mb-0"><a href="{{asset('student-attachment/'.$student->name."/".$student->actdenaissance)}}">Act De Naissance</a> </h6>
                    </div>
                    </a>
                </div>
        </div>
        <div class="uk-first-column uk-scrollspy-inview uk-animation-slide-bottom-small" style="">
            <a href="#">
                </a><div class="card animate-this uk-inline-clip" ><a href="#">

                    @if (!$student->cincopie== null)
                    @if (pathinfo($student->cincopie, PATHINFO_EXTENSION) == 'docx')
                    <img src="{{asset('../assets/images/course/1.png')}}"  alt="">
                    @elseif(pathinfo($student->cincopie, PATHINFO_EXTENSION) == 'txt')
                    <img src="{{asset('../assets/images/course/2.png')}}" alt="">
                    @elseif(pathinfo($student->cincopie, PATHINFO_EXTENSION) == 'pdf')
                    <img src="{{asset('../assets/images/course/4.png')}}" alt="">
                    @else
                    <img src="{{asset('../assets/images/course/3.png')}}" alt="">
                    @endif
            @else 
            <img src="{{asset('../assets/images/course/2.png')}}" alt="">
            @endif 
                    <div class="card-body text-center pb-3">
                        <h6 class=" mb-0"><a href="{{asset('student-attachment/'.$student->name."/".$student->cincopie)}}">CIN Copie</a> </h6>
                    </div>
                    </a>
                 
                </div>
        </div>
        <div class="uk-first-column uk-scrollspy-inview uk-animation-slide-bottom-small" style="">
            <a href="#">
                </a><div class="card animate-this uk-inline-clip" ><a href="#">
                    @if (!$student->ramid== null)
                    @if (pathinfo($student->ramid, PATHINFO_EXTENSION) == 'docx')
                    <img src="{{asset('../assets/images/course/1.png')}}"  alt="">
                            @elseif(pathinfo($student->ramid, PATHINFO_EXTENSION) == 'txt')
                            <img src="{{asset('../assets/images/course/2.png')}}" alt="">
                            @elseif(pathinfo($student->ramid, PATHINFO_EXTENSION) == 'pdf')
                            <img src="{{asset('../assets/images/course/4.png')}}" alt="">
                            @else
                            <img src="{{asset('../assets/images/course/3.png')}}" alt="">
                            @endif
                    @else 
                    <img src="{{asset('../assets/images/course/2.png')}}" alt="">
                    @endif 
                
                
                    <div class="card-body text-center pb-3">
                        <h6 class=" mb-0"><a href="{{asset('student-attachment/'.$student->name."/".$student->ramid)}}">ramid</a> </h6>
                    </div>
                    </a>
                 
                </div>
            
        </div>
     
      

    </div>


    
@endsection
@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                    $('.delete-confirm').on('click', function (event) {
                        event.preventDefault();
                        const url = $(this).attr('href');
                        swal({
                            title: 'هل انت متأكد؟',
                            text: 'هذا الشئ سيمحي من قاعدة البيانات نهائيا.',
                            icon: 'warning',
                            buttons: ["تراجع", "نعم"],
                        }).then(function(value) {
                            if (value) {
                                window.location.href = url;
                            }
                        });
                    });
            </script>

@endsection