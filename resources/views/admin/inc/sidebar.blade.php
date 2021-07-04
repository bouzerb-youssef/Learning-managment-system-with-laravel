
<div class="page-menu">
    <!-- btn close on small devices -->
    <span class="btn-menu-close" uk-toggle="target: #wrapper ; cls: mobile-active"></span>
    <!-- traiger btn -->
    <span class="btn-menu-trigger" uk-toggle="target: .page-menu ; cls: menu-large"></span>

    <!-- logo -->
    <div class="logo  uk-visible@s  ">
        <a href="/admin"> <i class=" uil-graduation-hat"></i> <span>Amal Tadrib     </span> </a>
    </div>
    <div class="page-menu-inner" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="left: 0px; bottom: -17px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: scroll hidden;">
            <ul class="mt-0">
                <br><br>
                    <li><a href="/admin"><i class="uil-home-alt"></i> <span>Dashboard</span></a> </li>
                    @php
                    use App\Models\Category;
                    $category=Category::first();
                    
                @endphp
              @if (isset($category))
              <ul data-submenu-title="Cource Managment" class='sidebar-submenu-title'>
                <li><a href="{{route("admin.categories",$category->id)}}"><i class="uil-layers"></i><span>Categories</span> </a> </li> 

                    @else
                <li><a href="{{route("admin.categorylist")}}"><i class="uil-layers"></i>><span>Categories</span> </a> </li>

                    @endif 
            
                    <li class="#"><a href="#""><i class="uil-layers"></i> <span> Cources
                    </span></a>
                    <ul>
                        <li><a href="{{route("admin.index")}}" class='sidebardropdown'>All Cources</a>
                        </li>
                        <li><a href="{{route("admin.addcource")}}" class='sidebardropdown'> Add Cource </a></li>
                    </ul>
                    </li>
                    <li class="#"><a href="#""><i class="uil-layers"></i> <span> Videos
                    </span></a>
                    <ul>
                        <li><a href="{{route("admin.lessons")}}" class='sidebardropdown'>All Videos</a>
                        </li>
                        <li><a href="{{route("admin.lesson.add")}}" class='sidebardropdown'> Add Video </a></li>
                    </ul>
                    </li>
                    <li class="#"><a href="#""><i class="uil-layers"></i> <span> Materials
                    </span></a>
                    <ul>
                        <li><a href="{{route("admin.materials")}}" class='sidebardropdown'>All Material</a>
                        </li>
                        <li><a href="{{route("admin.material.add")}}" class='sidebardropdown'> Add Material </a></li>
                    </ul>
                    </li>  
                    <li class="#"><a href="#""><i class="uil-layers"></i> <span> Podcasts
                    </span></a>
                    <ul>
                        <li><a href="{{route("admin.podcasts")}}" class='sidebardropdown'>All Podcast</a>
                        </li>
                        <li><a href="{{route("admin.podcast.add")}}" class='sidebardropdown'> Add Podcast </a></li>
                    </ul>
                    </li> 
                </ul>
                <ul data-submenu-title="Student Managment" class='sidebar-submenu-title'>

                    <li class="#"><a href="#""><i class="uil-layers"></i> <span> Students
                    </span></a>
                    <ul>
                        <li><a href="{{route("admin.students")}}" class='sidebardropdown'>All Students</a>
                        </li>
                        <li><a href="{{route("admin.addstudent")}}" class='sidebardropdown'> Add Student </a></li>
                        <li><a href="{{route("admin.studentAttachments")}}" class='sidebardropdown'>Student Attachments</a>
                        </li>
                      
                    </ul>
                    </li>
                </ul>
                <li class="#"><a href="#""><i class="uil-layers"></i> <span> Traineeship
                </span></a>
                <ul>
                    <li><a href="{{route("admin.podcasts")}}" class='sidebardropdown'>All Traineeship</a>
                    </li>
                    <li><a href="{{route("admin.podcast.add")}}" class='sidebardropdown'> Add Traineeship </a></li>
                </ul>
                </li> 
              
                    <li><a href="{{route("admin.years")}}" > <i class="uil-layers"> </i><span>Years</span></a>
                    </li>
                    <li><a href="{{route("admin.centres")}}" ><i class="uil-layers"></i>  <span>Centres </span></a></li>
                    <li><a href="{{route("admin.formations")}}" > <i class="uil-layers"></i> <span>Formations </span></a></li>
                    <li><a href="{{route("admin.studentgroups")}}" ><i class="uil-layers"> </i><span> Groups</span> </a></li>
                    <li><a href="{{route("admin.teacher")}}"><i class="uil-layers"></i> <span> Teachers</span></a> </li>                    
                    <li><a href="{{route("admin.students")}}"><i class="uil-layers"></i> <span> Students</span></a> </li>
                  <!-- <ul data-submenu-title="Lessons Managment">-->
                  

                </ul>

                 <!-- </ul>-->
        

        <ul data-submenu-title="logout" class='sidebar-submenu-title'>
        
            <li><a href="/login"><i class="uil-sign-out-alt"></i> <span><form method="POST" action="{{ route('logout') }}">
                @csrf

                <dropdown-link href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                this.closest('form').submit();">
                 Log Out
                </dropdown-link>
            </form></span></a> </li>
        </ul>

    </div></div></div><div class="simplebar-placeholder" style="width: 251px; height: 842px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="width: 25px; transform: translate3d(-25px, 0px, 0px); visibility: visible;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>
</div>