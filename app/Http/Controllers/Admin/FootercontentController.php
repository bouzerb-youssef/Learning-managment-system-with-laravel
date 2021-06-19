<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\footercontent;

class FootercontentController extends Controller
{
  

    public function editfooter()
        {
                $footercontent =footercontent::find(1);
               // dd( $content);
            return view('admin.footer.editfooter',compact("footercontent"));

        }

        public function updatecontenttitle(Request $request){

            $createdcontent = footercontent::find(1)->update([
                'title' => request('title'),
                ]);
                toastr()->success('.لقد تم التعديل  بنجاح');
                
                           return redirect()->route('admin.editfooter');
    
         }

         public function updatecontentdescription(Request $request){
    
            $createdcontent = footercontent::find(1)->update([
                'description' => request('description'),
    
                
                ]);
                toastr()->success('.لقد تم التعديل  بنجاح');
                           return redirect()->route('admin.editfooter');
    
         }

         public function updatecontentfacebook(Request $request){
    
            $createdcontent = footercontent::find(1)->update([
                'facebook' => request('facebook'),
                ]);
                toastr()->success('.لقد تم التعديل  بنجاح');
                           return redirect()->route('admin.editfooter');
    
         }

         public function updatecontenttwitter(Request $request){
    
            $createdcontent = footercontent::find(1)->update([
                'twitter' => request('twitter'),
                ]);
                toastr()->success('.لقد تم التعديل  بنجاح');
                           return redirect()->route('admin.editfooter');
    
         }

         public function updatecontentinstagram(Request $request){
    
            $createdcontent = footercontent::find(1)->update([
                'instagram' => request('instagram'),
                ]);
                toastr()->success('.لقد تم التعديل  بنجاح');
                           return redirect()->route('admin.editfooter');
    
         }

         public function updatecontentyoutube(Request $request){
    
            $createdcontent = footercontent::find(1)->update([
                'youtube' => request('youtube'),
                ]);
                toastr()->success('.لقد تم التعديل  بنجاح');
                           return redirect()->route('admin.editfooter');
    
         }
}
