@extends('admin.layouts.app')

@section('content')
<br><br><br>
<div class="page-content-inner">

    <div class="d-flex">
        <nav id="breadcrumbs" class="mb-3">
            <ul>
                <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                <li><a href="#"> الاصناف </a></li>
                <li>لائحة الاصناف</li>
            </ul>
        </nav>
    </div>


    <div class="d-flex justify-content-between mb-3">
        <h3> عدد الاصناف :{{$categorybooks->count()}} </h3>

        <div>
            <a href="{{route('admin.addcategorybook')}}" class="btn btn-default">
                <i class="uil-plus"> </i> اضافة صنف جديد
            </a>
        </div>
    </div>

    <div class="card">
        <!-- Card header -->
        <div class="card-header actions-toolbar border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="d-inline-block mb-0">الاصناف</h4>
                <div class="d-flex">

                    <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="Search product" title="" aria-expanded="false">
                        <i class="uil-search"></i>
                    </a>
                    <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                        <form class="uk-search uk-search-navbar uk-width-1-1">
                            <input class="uk-search-input shadow-0 uk-form-small" type="search" placeholder="Search..." autofocus="">
                        </form>
                    </div>

                    <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="filter" title="" aria-expanded="false">
                        <i class="uil-filter"></i>
                    </a>
                


                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead>
                    <tr>
                        <th scope="col">##</th>
                        <th scope="col">الاسم</th>
                       
                     
                    </tr>
                </thead>
                <tbody class="list">
                    @php
                    $i=1
                @endphp
                    @foreach ($categorybooks as  $category)
                    <tr>
                      
                           
                        <td>{{$i++}}</td>
                        <th scope="row">
                            <div class="media align-items-center">
                                <div>
                                    <div class="avatar-parent-child" style="width: max-content">
                                        <img alt="Image placeholder" src="../assets/images/avatars/avatar-2.jpg" class="avatar  rounded-circle">
                                        <span class="avatar-child avatar-badge bg-success"></span>
                                    </div>
                                </div>
                                <div class="media-body mr-4">
                                    <a href="#" class="name h6 mb-0 text-sm">{{$category->title}}

                                    </a>
                                   
                                </div>
                            </div>
                        </th>
                      
                        <td class="text-right">
                            <!-- Actions -->
                            <div class="actions ml-3">
                             
                            </div>
                        </td>
                        
                      
                    </tr>  
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>



<br><br><br>
@endsection