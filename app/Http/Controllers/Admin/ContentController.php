<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\content;


class ContentController extends Controller
{
    
   
        public function editcontent()
        {
                $content =Content::find(1);
               // dd( $content);
            return view('admin.content.editcontent',compact("content"));

        }
        
   

     public function updatecontenttitle1(Request $request){

        $createdcontent = Content::find(1)->update([
            'title1' => request('title1'),
            ]);
            toastr()->success('.لقد تم التعديل  بنجاح');
                       return redirect()->route('admin.editcontent');

     }
     public function updatecontentdescription1(Request $request){

        $createdcontent = Content::find(1)->update([
            'description1' => request('description1'),

            
            ]);
            toastr()->success('.لقد تم التعديل  بنجاح');
                       return redirect()->route('admin.editcontent');

     }
     public function updatecontentbutton1(Request $request){

        $createdcontent = Content::find(1)->update([
            'button1' => request('button1'),
            ]);
            toastr()->success('.لقد تم التعديل  بنجاح');
                       return redirect()->route('admin.editcontent');

     }
     public function updatecontentheroimage1(Request $request){
         $content=Content::find(1);
         Storage::disk('content')->delete($content->hero_image1);
        $img1  = ImageManagerStatic::make($request->hero_image1)->resize(1350,665)->encode('jpg');
        $name1  = Str::random() .'hero_image_section1'.'jpg';
        Storage::disk('content')->put($name1, $img1);
        $createdcontent = Content::find(1)->update([
            'hero_image1' =>  $name1,
            ]);
            toastr()->success('.لقد تم التعديل  بنجاح');
                       return redirect()->route('admin.editcontent');

     }
     public function updatecontenttitle2(Request $request){

        $createdcontent = Content::find(1)->update([
            'title2' => request('title2'),
            ]);
            toastr()->success('.لقد تم التعديل  بنجاح');
                       return redirect()->route('admin.editcontent');

     }
     public function updatecontentdescription2(Request $request){

        $createdcontent = Content::find(1)->update([
            'description2' => request('description2'),
            ]);
            toastr()->success('.لقد تم التعديل  بنجاح');
                       return redirect()->route('admin.editcontent');

     }
     public function updatecontentbutton2(Request $request){

        $createdcontent = Content::find(1)->update([
            'button2' => request('button2'),
            ]);
            toastr()->success('.لقد تم التعديل  بنجاح');
                       return redirect()->route('admin.editcontent');

     }
     public function updatecontentimage2(Request $request){
        $content=Content::find(1);
        Storage::disk('content')->delete($content->image2);
        $img2   = ImageManagerStatic::make($request->image2)->resize(380,290)->encode('jpg');
        $name2  = Str::random() .'image_section2'.'jpg';
        Storage::disk('content')->put($name2, $img2);
        $createdcontent = Content::find(1)->update([
            'image2' => $name2,
            ]);
            toastr()->success('.لقد تم التعديل  بنجاح');
                       return redirect()->route('admin.editcontent');

     }
     public function updatecontenttitle3(Request $request){

        $createdcontent = Content::find(1)->update([
            'title3' => request('title3'),
            ]);
            toastr()->success('.لقد تم التعديل  بنجاح');
                       return redirect()->route('admin.editcontent');

     }
     public function updatecontentdescription3(Request $request){

        $createdcontent = Content::find(1)->update([
            'description3' => request('description3'),
            ]);
            toastr()->success('.لقد تم التعديل  بنجاح');
                       return redirect()->route('admin.editcontent');

     }
     public function updatecontentbutton3(Request $request){

        $createdcontent = Content::find(1)->update([
            'button3' => request('button3'),
            ]);
            toastr()->success('.لقد تم التعديل  بنجاح');
                       return redirect()->route('admin.editcontent');

     }

    }
