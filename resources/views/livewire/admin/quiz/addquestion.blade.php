<div>

        <div class="page-content">
            <div class="page-content-inner">

                <div class="d-flex">
                    <nav id="breadcrumbs" class="mb-3">
                        <ul>
                            <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                            <li><a href="#"> الكورسات </a></li>
                            <li>الاسئلة</li>
                        </ul>
                    </nav>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong></strong> There were some problems with your input.<br><br><br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                    @if ($createAccountError)
                    <div class="uk-alert-danger" uk-alert>   <p>{{ $createAccountError }} </p> </div>

                @endif

                <div uk-grid="" class="uk-grid">
        

                    <div class="uk-width-2-4@m">
                    
                        <div class="card rounded">
                            <div class="p-3">
                                <h5 class="mb-0"> اضافة سؤال</h5>
                            </div>
                            <hr class="m-0">
                        <form wire:submit.prevent="storequestion">
                                            {{ csrf_field() }} 
                                            <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                            
                                                <div class="uk-first-column">
                                                    <h5 class="uk-text-bold mb-2"> السؤال</h5>
                                                    <input type="text" class="uk-input" wire:model.lazy="question" placeholder="السؤال">
                                                    @error('question')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                </div>
                                            
                                                <div class="uk-grid-margin uk-first-column">
                                                    <h5 class="uk-text-bold mb-2">التسجيل </h5>
                                                    <div class="uk-margin"> 
                                                        <div uk-form-custom> 
                                                            <input type="file" wire:model.lazy="audio"> 
                                                            <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر تسجيل </button> 
                                                            @error('audio')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                        </div> 
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                            
                                                <div class="uk-first-column">
                                                    <div style='padding-right:150px;'> <button  class="uk-uk-button uk-button-default" type="button"  tabindex="-1"> الخيار 1</button> </div>
                                                    

                                                    <h5 class="uk-text-bold mb-2">نوع الجواب </h5>
                                                    <select wire:model.lazy="points.0" class="uk-select">    
                                                        <option>من فضلك حدد الاجابة</option>
                                                            <option value="0">جواب صحيح </option>
                                                            <option value="1">جواب خطأ</option>
                                                    </select>
                                                    @error('points.0')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                    <br><br>
                                                    <h5 class="uk-text-bold mb-2">الصورة </h5>
                                                    <div class="uk-margin"> 
                                                        <div uk-form-custom> 
                                                            <input type="file" wire:model.lazy="image.0"> 
                                                            <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر الصورة </button> 
                                                            @error('image.0')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror


                                                        </div> 
                                                    </div> 

                                                </div>
                                              <div class="uk-grid-margin uk-first-column">
                                                    <div class="uk-first-column">
                                                        <div style='padding-right:150px;'> <button  class="uk-uk-button uk-button-default" type="button"  tabindex="-1"> الخيار 2</button> </div>
                                                       

                                                        <h5 class="uk-text-bold mb-2">نوع الجواب </h5>
                                                        <select wire:model.lazy="points.1" class="uk-select">    
                                                            <option value="">من فضلك حدد الاجابة</option>
                                                                <option value="0">جواب صحيح </option>
                                                                <option value="1">جواب خطأ</option>
                                                        </select>
                                                        @error('points.1')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                        <br><br>
                                                        <h5 class="uk-text-bold mb-2">الصورة </h5>
                                                        <div class="uk-margin"> 
                                                            <div uk-form-custom> 
                                                                <input type="file" wire:model.lazy="image.1"> 
                                                                <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر الصورة </button> 
                                                                @error('image.1')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                            
                                                            </div> 
                                                        </div> 
                        
                                                    </div>
                                                
                                                </div>
                                            </div>
                                       
                                        <div class="uk-child-width-1-2@s uk-grid-small p-4 uk-grid" uk-grid=""> 
                                            
                                            <div class="uk-first-column">
                                                <div style='padding-right:150px;'> <button  class="uk-uk-button uk-button-default" type="button"  tabindex="-1"> الخيار 3</button> </div>
                                                

                                                <h5 class="uk-text-bold mb-2">نوع الجواب </h5>
                                                <select wire:model.lazy="points.2" class="uk-select">    
                                                    <option value="">من فضلك حدد الاجابة</option>
                                                        <option value="0">جواب صحيح </option>
                                                        <option value="1">جواب خطأ</option>
                                                </select>
                                                @error('points.2')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                <br><br>
                                                <h5 class="uk-text-bold mb-2">الصورة </h5>
                                                <div class="uk-margin"> 
                                                    <div uk-form-custom> 
                                                        <input type="file" wire:model.lazy="image.2"> 
                                                        <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر الصورة </button> 
                                                        @error('image.2')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                    
                                                    </div> 
                                                </div> 

                                            </div>
                                            <div class="uk-grid-margin uk-first-column">
                                                <div class="uk-first-column">
                                                    <div style='padding-right:150px;'> <button  class="uk-uk-button uk-button-default" type="button"  tabindex="-1"> الخيار 4</button> </div>
                                                    
                                                    <h5 class="uk-text-bold mb-2">نوع الجواب </h5>
                                                    <select wire:model.lazy="points.3" class="uk-select">    
                                                        <option value="">من فضلك حدد الاجابة</option>
                                                            <option value="0">جواب صحيح </option>
                                                            <option value="1">جواب خطأ</option>
                                                    </select>
                                                    @error('points.3')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                    <br><br>
                                                    <h5 class="uk-text-bold mb-2">الصورة </h5>
                                                    <div class="uk-margin"> 
                                                        <div uk-form-custom> 
                                                            <input type="file" wire:model.lazy="image.3"> 
                                                            <button class="uk-uk-button uk-button-default" type="button" tabindex="-1"> اختر الصورة </button> 
                                                            @error('image.3')<div class="uk-alert-danger" uk-alert>   <p>{{ $message }} </p> </div> @enderror

                                                        </div> 
                                                    </div> 
                                                </div>
                                            
                                            </div> 
                                            
                                        
                                            <div class="uk-grid-margin uk-first-column">

                                                <div class="mb-3 mt-3">
                                                    <button   type='submit' class="btn btn-default">حفظ</button>
                                                </div>
                                            </div>
                                            </div>
                        </form> 
                    
                        </div>

                    </div>


                </div>

            </div>

        </div>    

            


</div>
