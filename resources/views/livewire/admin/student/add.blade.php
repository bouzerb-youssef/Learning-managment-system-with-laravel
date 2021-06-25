<div>
    <div class="page-content">
        <div class="page-content-inner">
    
            <div class="d-flex">
                <nav id="breadcrumbs" class="mb-3">
                    <ul>
                        <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                        <li><a href="#"> الطلاب </a></li>
                        <li>أضافة طالب</li>
                    </ul>
                </nav>
            </div>
    
            @if ($createAccountError)
            <div class="uk-alert-danger" uk-alert>   <p>{{ $createAccountError }} </p> </div>
            
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
                                            @error('name')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                        </div> 
                                        <div class="uk-first-column">
                                            <h5 class="uk-text-bold mb-2"> الايميل</h5>
                                            <input type="text" class="uk-input" wire:model.lazy="email" placeholder="الايميل">
                                            @error('email')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                        </div>
                                        <div class="uk-first-column">
                                            <h5 class="uk-text-bold mb-2"> كلمة السر</h5>
                                            <input type="password" class="uk-input" wire:model.lazy="password" placeholder="كلمة السر">
                                            @error('password')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                        </div> 
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> الجنس </h5>
                                        <select  wire:model.lazy="sex"  class="uk-select">
                                            <option value="أنثي"
                                             >انثي</option>
                                            <option value="مذكر"
                                            >مذكر</option>
                                        </select>
                                        @error('sex')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> رقم البطاقة الوطنية </h5>
                                        <input type="text" class="uk-input" wire:model.lazy="cin" placeholder="رقم البطاقة الوطنية">
                                        @error('cin')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                    </div>
                                    <div class="uk-grid-margin">
                                        <h5 class="uk-text-bold mb-2"> رقم الهاتف </h5>
                                        <input type="text" class="uk-input"  wire:model.lazy="phone" placeholder="رقم الهاتف">
                                        @error('phone')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> العمر</h5>
                                        <input type="text" class="uk-input" placeholder="العمر"  wire:model.lazy="age">
                                        @error('age')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

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
                                        @error('familySituation')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> عدد الاطفال</h5>
                                        <input type="text" class="uk-input" wire:model.lazy="childrenNmb" placeholder="عدد الاطفال ">
                                        @error('childrenNmb')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> المستوي التعليمي</h5>
                                        <input type="text" class="uk-input" wire:model.lazy="educationLevel" placeholder="المستوي التعليمي">
                                        @error('educationLevel')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> العنوان</h5>
                                        <textarea  wire:model.lazy="address" placeholder="العنوان" {{-- class="mytextarea"  --}} class="form-control"></textarea>
                                        @error('العنوان')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> الملاحضات</h5>
                                        <textarea  wire:model.lazy="nots" {{-- class="mytextarea" --}}  placeholder="الملاحضات"   class="form-control"></textarea>
                                        @error('nots')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                    </div>
                                 
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2">الصورة الشخصية</h5>
                                        <div class="uk-margin"> 
                                            <div uk-form-custom> 
                                                <input type='file' style='height:58px;border:0px;'  wire:model.debounce.1000ms="photo"> 
                                                <button class="uk-uk-button uk-button-default" type="button" tabindex="-1">اختر صورة شخصية</button> 
                                                @error('photo')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="uk-grid-margin uk-first-column">
                                        <label class="uk-text-bold mb-2">اختر مجموعة</label>

                                        <select wire:model.lazy="group_id" class="uk-select">    
                                            <option value="">--أختر مجموعة--</option>
                                                @if (isset($groups) && $groups->count()>0)
                                                @foreach ($groups as $group)
                                                <option value="{{$group->id}}">{{$group->title}} </option>
        
                                                @endforeach
                                                @endif
                                        </select>
                                        
                                        @error('group_id')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                    </div>  
                                    <div class="uk-grid-margin uk-first-column">
                                        <h5 class="uk-text-bold mb-2"> </h5>
                                       
                                    </div>
                              {{-- ############################################################################## --}}
                              @elseif ($currentPage === 2)
                            {{-- <div uk-grid="" class="uk-grid"> --}}
        

                                <div class="uk-width-2-4@m"> 
                                    <button   type='button'  class="btn btn-default mb-3"  wire:click.prevent="add({{$i}})" >    اضافة الاحتياجات </button>  
                                    <div class="card rounded">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">
                                                        <hr class="m-0">
                                                        <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">                      
                                                                <div class="uk-first-column">
                                                                    <h5 class="uk-text-bold mb-2"> نوع الوثيقة</h5>
                                                                    <input type="text" class="uk-input" wire:model="genre.0" placeholder="الاسم">
                                                                    @error('genre.0')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                                   
                                                                </div>
                                                                <div class="uk-grid-margin uk-first-column">
                                                                    <h5 class="uk-text-bold mb-2">الوثيقة </h5>
                                                                {{--    <div class="uk-margin"> 
                                                                        <div uk-form-custom> --}}
                                                                            <input type='file' style='height:58px;border:0px;'   wire:model="file.0"> 
                                                                            @error('file.0')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

{{--                                                                                 <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر وثيقة </button> 
--}}                                                                       {{--      </div> 
                                                                    </div>  --}} 
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                         
                                        @foreach($inputs as $key => $value)
                                        <div class="card rounded">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                            <hr class="m-0">
                                                            <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid="">                      
                                                                    <div class="uk-first-column">
                                                                        <h5 class="uk-text-bold mb-2"> نوع الوثيقة</h5>
                                                                        <input type="text" class="uk-input" wire:model="genre.{{ $value }}" placeholder="الاسم">
                                                                        @error('genre.{{ $value }}')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                                       
                                                                    </div>
                                                                    <div class="uk-grid-margin uk-first-column">
                                                                        <h5 class="uk-text-bold mb-2">الوثيقة </h5>
                                                                    {{--    <div class="uk-margin"> 
                                                                            <div uk-form-custom> --}}
                                                                                <input type='file' style='height:58px;border:0px;'   wire:model="file.{{ $value }}"> 
                                                                                @error('file.{{ $value }}')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

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
                               <div class="d-flex justify-content-between mb-3 px-4 py-3 bg-gray-50 text-right sm:px-6">
                                   @if ($currentPage === 1)
                                       <div></div>
                                   @else
                                       <button wire:click="goToPreviousPage" type="button" class="btn btn-outline-warning"  >
                                           الرجوع
                                       </button>
                                   @endif
                                   @if ($currentPage === count($pages))
                                 
                                
                                       <button type="submit"   class='btn btn-outline-dark'   >
                                           حفظ
                                       </button>
                                   @else
                                   
                                       <button wire:click="goToNextPage" type="button" class="btn btn-outline-success" >
                                           التالي
                                       </button>
                               
                               </div>
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
