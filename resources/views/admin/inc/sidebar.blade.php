
<div class="page-menu">
    <!-- btn close on small devices -->
    <span class="btn-menu-close" uk-toggle="target: #wrapper ; cls: mobile-active"></span>
    <!-- traiger btn -->
    <span class="btn-menu-trigger" uk-toggle="target: .page-menu ; cls: menu-large"></span>

    <!-- logo -->
    <div class="logo  uk-visible@s  ">
        <a href="/admin"> <i class=" uil-graduation-hat"></i> <span> أمل سونتر       </span> </a>
    </div>
    <div class="page-menu-inner" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="left: 0px; bottom: -17px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: scroll hidden;">
            <ul class="mt-0">
                <br><br>
                    <li><a href="/admin"><i class="uil-home-alt"></i> <span>{{trans('sidebar.dashboard')}}</span></a> </li>
                    <li><a href="{{route("admin.years")}}" > <i class="uil-layers"> </i><span>{{trans('sidebar.years')}}</span></a>
                    </li>
                    <li><a href="{{route("admin.centres")}}" ><i class="uil-layers"></i>  <span>{{trans('sidebar.centres')}} </span></a></li>
                    <li><a href="{{route("admin.formations")}}" > <i class="uil-layers"></i> <span>{{trans('sidebar.formations')}} </span></a></li>
                    <li><a href="{{route("admin.studentgroups")}}" ><i class="uil-layers"> </i><span> {{trans('sidebar.groupstudents')}}</span> </a></li>
                    @php
                        use App\Models\Category;
                        $category=Category::first();
                        
                    @endphp
                    <li><a href="{{route("admin.categories",$category->id)}}"><i class="uil-tag-alt"></i><span>{{trans('sidebar.category')}}</span> </a> </li>
                  {{--   <li class="#"><a href="#"><i class="uil-layers"></i> <span> {{trans('sidebar.manager')}}
                    </span></a>
                        <ul>
                        <li><a href="{{route("admin.years")}}" >{{trans('sidebar.years')}}</a>
                        </li>
                        <li><a href="{{route("admin.centres")}}" > {{trans('sidebar.centres')}} </a></li>
                        <li><a href="{{route("admin.formations")}}" > {{trans('sidebar.formations')}} </a></li>
                        <li><a href="{{route("admin.studentgroups")}}" > {{trans('sidebar.groupstudents')}} </a></li>
                        </ul>
                    </li>  --}}
                    <li><a href="{{route("admin.index")}}"><i class="uil-youtube-alt"></i> <span> {{trans('sidebar.cources')}}</span></a> </li>
                    <li><a href="{{route("admin.teacher")}}"><i class="uil-users-alt"></i> <span> الأساثذة</span></a> </li>                    
                    <li><a href="{{route("admin.students")}}"><i class="uil-youtube-alt"></i> <span> {{trans('sidebar.student')}}</span></a> </li>

{{--                     <li><a href="{{route("admin.question.add")}}"><i class="uil-users-alt"></i> <span> {{trans('sidebar.quizs')}}</span></a> </li>
                 
                    <li><a href=" {{route("admin.categorybook")}} "><i class="uil-file-alt"></i> <span> {{trans('sidebar.BookCategory')}}</span></a> </li>
                    <li><a href="{{route("admin.books")}}"><i class="uil-layers"></i> <span> {{trans('sidebar.books')}}</span></a> </li>
{{--                     <li><a href="{{route("admin.addcontent")}}"><i class="uil-chart-line"></i> <span> {{trans('sidebar.edit')}}</span></a> </li>
 --}}                   {{--  <li class="#"><a href="#"><i class="uil-layers"></i> <span> {{trans('sidebar.edit')}}
                            </span></a>
                            <ul>
                                <li><a href="{{route("admin.editcontent")}}" >{{trans('sidebar.editContent')}}</a>
                                </li>
                                <li><a href="{{route("admin.editfooter")}}" > {{trans('sidebar.editFooter')}} </a></li>
                            </ul>
                        </li>  --}}
                </ul>
     
        

        <ul data-submenu-title="{{trans('sidebar.manager')}}">
        
            <li><a href="/login"><i class="uil-sign-out-alt"></i> <span><form method="POST" action="{{ route('logout') }}">
                @csrf

                <dropdown-link href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                this.closest('form').submit();">
                  {{trans('sidebar.logout')}}
                </dropdown-link>
            </form></span></a> </li>
        </ul>

    </div></div></div><div class="simplebar-placeholder" style="width: 251px; height: 842px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="width: 25px; transform: translate3d(-25px, 0px, 0px); visibility: visible;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>
</div>