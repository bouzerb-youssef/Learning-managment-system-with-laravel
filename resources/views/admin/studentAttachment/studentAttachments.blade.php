@extends('admin.layouts.app')

@section('content')

<br><br><br><br>
<div class="page-content-inner">


    <nav id="breadcrumbs" class="mb-3">
        <ul>
            <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
            <li> Student Attachments </li>

        </ul>
    </nav>

    <div class="d-flex justify-content-between mb-3">
        <h4>  Student Attachments :{{$studentAttachments->count()}} </h4>

        <div>
            <a href="{{route('admin.studentAttachment.add')}}" class="btn btn-outline-dark">
                <i class="uil-plus"> </i> Add New studentAttachment
            </a>
        </div>
    </div>

    <div class="uk-child-width-1-6@m uk-grid" uk-grid="" uk-scrollspy="cls: uk-animation-slide-bottom-small; target: > div ; delay: 200">
        @foreach ($studentAttachments as $studentAttachment)
        <div class="uk-first-column uk-scrollspy-inview uk-animation-slide-bottom-small" style="">
            <a href="#">
                </a><div class="card animate-this uk-inline-clip" ><a href="#">
                    @if (!$studentAttachment->file== null)
                    @if (pathinfo($studentAttachment->file, PATHINFO_EXTENSION) == 'docx')
                    <img src="../assets/images/course/1.png"  alt="">
                    @elseif(pathinfo($studentAttachment->file, PATHINFO_EXTENSION) == 'txt')
                    <img src="../assets/images/course/2.png" alt="">
                    @elseif(pathinfo($studentAttachment->file, PATHINFO_EXTENSION) == 'pdf')
                    <img src="../assets/images/course/4.png" alt="">
                    @else
                    <img src="../assets/images/course/3.png" alt="">
                    @endif
                    @else
                    <img src="../assets/images/course/2.png" alt="">
                    @endif
                
                    <div class="card-body text-center pb-3">
                      
                        <h6 class=" mb-0"><a href="{{asset('student-attachment/'.$studentAttachment->student->name."/".$studentAttachment->file)}}">{{$studentAttachment->genre}}</a> </h6>
                        <h6 class=" mb-4">{{$studentAttachment->student->name}} </h6>

                                    
                      
                     
                    
                        <div class="actions ml-3">
                                   
                            <a href="{{route('admin.studentAttachment.edit',$studentAttachment->id)}}"  uk-tooltip="Edit " title="" aria-expanded="false">
                                <i class="uil-pen" style="padding-right:20px;" ></i> </a>
                               <a href="{{route('admin.studentAttachment.remove',$studentAttachment->id)}}"  class="delete-confirm"  uk-tooltip="Delete " title="" aria-expanded="false">
                                <i class="uil-trash-alt text-danger" style="padding-right:20px;" ></i> </a>
                               {{--  <a href="{{route('admin.sections',$studentAttachment->id)}}"  uk-tooltip="الدروس" title="" aria-expanded="false">
                                    <i class="icon-line-awesome-outdent " style="padding-right:20px;" ></i> </a>
                                    <a href="{{route('admin.showquestion',$studentAttachment->id)}}" uk-tooltip="اسئلة الاختبار" title="" aria-expanded="false">
                                        <i class="icon-studentAttachment-outline-library-books " style="padding-right:20px;" ></i> </a> --}}
                        </div>
                    </div>
                    </a>
                 
                </div>
            
        </div>
        @endforeach
      

    </div>


    <ul class="uk-pagination my-5 uk-flex-center" uk-margin="">
       {{ $studentAttachments->links() }}
    </ul>
    
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