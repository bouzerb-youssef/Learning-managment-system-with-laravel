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
                            <h5 class="mb-0"> تسجيل الطالب</h5>
                        </div>
                        <hr class="m-0">
                        <form  wire:submit.prevent='storestudent' method="POST" enctype="multipart/form-data" class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">
                                        {{ csrf_field() }}
                            @if ($currentPage === 1)
                                        <div class="uk-first-column">
                                            <h5 class="uk-text-bold mb-2"> الاسم الكامل</h5>
                                            <input type="text" class="uk-input" wire:model.lazy="name" placeholder="الاسم الكامل">
                                        </div> 
                                        <div class="uk-first-column">
                                            <h5 class="uk-text-bold mb-2"> الايميل</h5>
                                            <input type="text" class="uk-input" wire:model.lazy="email" placeholder="الايميل">
                                        </div>
                                        <div class="uk-first-column">
                                            <h5 class="uk-text-bold mb-2"> كلمة السر</h5>
                                            <input type="password" class="uk-input" wire:model.lazy="password" placeholder="كلمة السر">
                                        </div> 
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> الجنس </h5>
                                        <select  wire:model.lazy="sex"  class="uk-select">
                                            <option value="أنثي"
                                             >انثي</option>
                                            <option value="مذكر"
                                            >مذكر</option>
                                        </select>
                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> رقم البطاقة الوطنية </h5>
                                        <input type="text" class="uk-input" wire:model.lazy="cin" placeholder="رقم البطاقة الوطنية">
                                    </div>
                                    <div class="uk-grid-margin">
                                        <h5 class="uk-text-bold mb-2"> رقم الهاتف </h5>
                                        <input type="text" class="uk-input"  wire:model.lazy="phone" placeholder="رقم الهاتف">
                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> العمر</h5>
                                        <input type="text" class="uk-input" placeholder="العمر"  wire:model.lazy="age">
                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> الحالة الاجتماعية </h5>
                                        <select wire:model.lazy="familySituation" class="uk-select">
                                            <option value="عازب" 
                                            >عازب</option>
                                            <option value="متزوج"
                                            >متزوج</option>
                                            <option value="مطلق"
                                            >مطلق</option>
                                        </select>
                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> عدد الاطفال</h5>
                                        <input type="text" class="uk-input" wire:model.lazy="childrenNmb" placeholder="عدد الاطفال ">
                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> المستوي التعليمي</h5>
                                        <input type="text" class="uk-input" wire:model.lazy="educationLevel" placeholder="المستوي التعليمي">
                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> العنوان</h5>
                                        <textarea  wire:model.lazy="address" placeholder="العنوان" {{-- class="mytextarea"  --}} class="form-control"></textarea>
                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> الملاحضات</h5>
                                        <textarea  wire:model.lazy="nots" {{-- class="mytextarea" --}}  placeholder="الملاحضات"   class="form-control"></textarea>
                                    </div>
                                 
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2">الصورة الشخصية</h5>
                                        <div class="uk-margin"> 
                                            <div uk-form-custom> 
                                                <input type="file" wire:model.lazy="photo"> 
                                                <button class="uk-uk-button uk-button-default" type="button" tabindex="-1">اختر صورة شخصية</button> 
                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> اختر مجموعة </h5>
                                        <select wire:model.lazy="group_id" class="uk-select">
                                            @if (isset($studentgroups) && $studentgroups->count()>0)
                                            @foreach ($studentgroups as $studentgroup)
                                            <option value="{{$studentgroup->id}}">{{$studentgroup->title}} </option>
    
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>  
                              {{-- ############################################################################## --}}
                              @elseif ($currentPage === 2)
                            {{-- <div uk-grid="" class="uk-grid"> --}}
        

                                <div class="uk-width-2-4@m"> 
                                    <button   type='button'  class="btn btn-default mb-3"  wire:click.prevent="add({{$i}})" >    اضافة الاحتياجات </button>                 
                                        @foreach($inputs as $key => $value)
                                        <div class="card rounded">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                            <hr class="m-0">
                                                            <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">                      
                                                                    <div class="uk-first-column">
                                                                        <h5 class="uk-text-bold mb-2"> نوع الوثيقة</h5>
                                                                        <input type="text" class="uk-input" wire:model="genre.{{ $value }}" placeholder="الاسم">
                                                                        <input type="hidden" class="uk-input"  wire:model="user_id" >
                                                                    </div>
                                                                    <div class="uk-grid-margin uk-first-column">
                                                                        <h5 class="uk-text-bold mb-2">الوثيقة </h5>
                                                                    {{--    <div class="uk-margin"> 
                                                                            <div uk-form-custom> --}}
                                                                                <input type="file"  wire:model="file.{{ $value }}"> 
{{--                                                                                 <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر وثيقة </button> 
 --}}                                                                       {{--      </div> 
                                                                        </div>  --}} 
                                                                    </div>
                                                                    <a   uk-tooltip="حدف " wire:click.prevent="remove({{$key}})" aria-expanded="false">
                                                                    <i class="uil-trash-alt text-danger"  ></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
                                   
                                </div>
                            {{-- </div> --}}
                            @elseif ($currentPage === 3)
                              {{-- ############################################################################### --}}
                              
                          {{--   <div class="row">--}}
                                <div class="col-12 my-lg-5"> 
                                    <div class="text-center">
                                        <h2 class="mt-0"><i class="icon-feather-check-circle text-success"></i></h2>
                                        <h3 class="mt-0">شكرا لك ل ملأ جميع المراحل !</h3>
    
                                        <p class="w-75 mb-2 mx-auto"> أضغط علي زر حفظ لتخزين الكورس  </p>
    
                                        <div class="mb-3 mt-3">
                                            
                                    {{--  <button type="submit" wire:click="storestudent">حفظ</button> --}}
                                
                                    </div>
                                </div> <!-- end col -->
                           </div>
                       {{--   </div> --}}
                               {{-- ############################################################################### --}}
                               @endif
                               <div class="flex items-center justify-between px-4 py-3 bg-gray-50 text-right sm:px-6">
                                @if ($currentPage === 1)
                                    <div></div>
                                @else
                                    <button wire:click="goToPreviousPage" type="button" class="btn-warning"  >
                                        الرجوع
                                    </button>
                                @endif
                                @if ($currentPage === count($pages))
                                    <button type="submit"   class='btn-dark'   >
                                        حفظ
                                    </button>
                                @else
                                    <button wire:click="goToNextPage" type="button" class="btn-success" >
                                        التالي
                                    </button>
                                @endif
                            </div>
                            </div>
                         </form>
                   
                    </div>
    
                </div>
    
    
            </div>
    
        </div>
    
    </div>    
</div>
