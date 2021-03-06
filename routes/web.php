<?php

use Illuminate\Support\Facades\Route;
use Vimeo\Laravel\VimeoManager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){  */ 
        Route::get('/user/profile', function () {
            return view('profile.show');
        });
     /*    Route::get('/login', function () {
            return view('auth.login');
        }); */
        Route::get('/quiz', function () {
            return view('quiz');
        });
        Route::get('/video', [App\Http\Controllers\DashboardFrontController::class, 'video'])->name('vedio');
        
        Route::get('/modal', function () {
            return view('backup');
        });
        Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        
        Route::get('/', [App\Http\Controllers\DashboardFrontController::class, 'index'])->name('home');
        Route::get('/cources', [App\Http\Controllers\CourceController::class, 'index'])->name('cources')->middleware('auth');
        Route::get('/cources/detail/{id}', [App\Http\Controllers\CourceController::class, 'show'])->name('cources.show')->middleware('auth');
        
        Route::get('/cources/lessons/{id}', [App\Http\Controllers\CourceController::class, 'lessons'])->name('cources.lessons')->middleware('auth');
        
        Route::get('/cources/lessons/vedio/{id}', [App\Http\Controllers\CourceController::class, 'episode'])->name('cources.lessons.vedio')->middleware('auth');
        
        /* enroll */
        Route::get('/cources/enroll/{id}', [App\Http\Controllers\EnrollController::class, 'store'])->name('cource.enroll')->middleware('auth');
        Route::get('/test', [App\Http\Controllers\DashboardFrontController::class, 'test'])->name('test')->middleware('auth');
        
        /* category */
        
        Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show')->middleware('auth');
        
        
        /* quiz front*/
        Route::get('/takequiz/{id}', [App\Http\Controllers\Admin\QuizController::class, 'index'])->name('quiz.index')->middleware('auth');
        Route::post('/takequiz/store', [App\Http\Controllers\Admin\QuizController::class, 'store'])->name('quiz.store')->middleware('auth');
        
        Route::get('/takequiz/showresult/{id}', [App\Http\Controllers\Admin\QuizController::class, 'show'])->name('quiz.results.show')->middleware('auth');
        
        
        /* profile student */
        Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile')->middleware('auth');
        
        
        
        /* role redirects */
        Route::get('/redirests', [App\Http\Controllers\HomeController::class, 'check'])->name('check.auth');
        
        
        
        /* #######################################################bOOKS################################################################################################## */
        Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books')->middleware('auth');
        Route::get('/books/detail/{id}', [App\Http\Controllers\BookController::class, 'show'])->name('books.show')->middleware('auth');
        
        Route::group(["middleware"=>"admin","prefix"=>"admin"],function(){
            /* ########################################################begin admin############################################################################################## */
         
                Route::get('/', [App\Http\Controllers\DashboardFrontController::class, 'admin'])->name('admin');
        
             
                Route::get('/delete', function () {
                    return view('delete');
                });
                Route::get('/deleteall', [App\Http\Controllers\Controller::class, 'delete'])->name('delete');
        
                Route::get('/addcource', [App\Http\Controllers\Admin\CourceController::class, 'addcource'])->name('admin.addcource');
                Route::Post('/addcource', [App\Http\Controllers\Admin\CourceController::class, 'store'])->name('admin.addcource.store');
                Route::get('/courcedetail/{id}', [App\Http\Controllers\Admin\CourceController::class, 'addcourcedetail'])->name('admin.addcourcedetail');
                Route::Post('/courcedetail', [App\Http\Controllers\Admin\CourceController::class, 'addcourcedetailstore'])->name('admin.addcourcedetail.store');
        
                /* ################################################cources################################################################################################ */
                Route::get('/cources', [App\Http\Controllers\Admin\CourceController::class, 'index'])->name('admin.index');
                Route::get('/cources/edit/{id}', [App\Http\Controllers\Admin\CourceController::class, 'edit'])->name('admin.editcource');
                Route::post('/cources/edit/update/{id}', [App\Http\Controllers\Admin\CourceController::class, 'updatecource'])->name('admin.updatecource');
        
               



                Route::get('/cources/remove/{id}', [App\Http\Controllers\Admin\CourceController::class, 'remove'])->name('admin.remove');
                /*  section */
              // Route::get('/cources/addcourcesection/{id}', [App\Http\Controllers\Admin\CourceController::class, 'addcourcesection'])->name('admin.addcourcesection');
               // Route::get('/cources/editsection/{id}', [App\Http\Controllers\Admin\SectionController::class, 'editsection'])->name('admin.editsection');
               // Route::post('/category/updatesection/{id}', [App\Http\Controllers\Admin\SectionController::class, 'updatesection'])->name('admin.updatesection');
               Route::get('/sections/{id}', [App\Http\Controllers\Admin\SectionController::class, 'sections'])->name('admin.sections');

                Route::get('/addsection/{id}', [App\Http\Controllers\Admin\SectionController::class, 'addsection'])->name('admin.addsection');
                Route::post('/addsection/store', [App\Http\Controllers\Admin\SectionController::class, 'storesection'])->name('admin.section.store');
                Route::get('/editsection/{id}', [App\Http\Controllers\Admin\SectionController::class, 'editsection'])->name('admin.editsection');
                Route::get('/showsection/{id}', [App\Http\Controllers\Admin\SectionController::class, 'showsection'])->name('admin.showsection');


                Route::post('/updatesection/update/{id}', [App\Http\Controllers\Admin\SectionController::class, 'updatesection'])->name('admin.section.update');
                Route::get('/section/remove/{id}', [App\Http\Controllers\Admin\SectionController::class, 'removesection'])->name('admin.section.remove');

              
                    /* lesson */
                    Route::get('/vediofetsh', function (VimeoManager $vimeo) {
                        $vedio='/videos/569999168';
                        $result=  $vimeo->request($vedio, ['per_page' => 2], 'GET');
                      dd( $result/* ['embed']['html'] */);
                       return view('admin.lessons.showvedio',compact('result')); 
                    });   
                  

                    Route::get('/vediocreate', [App\Http\Controllers\Admin\LessonController::class, 'create'])->name('vedio.create');
                    Route::post('/vediocreate', [App\Http\Controllers\Admin\LessonController::class, 'store'])->name('admin.video.store');
                    Route::get('/lessons', [App\Http\Controllers\Admin\LessonController::class, 'index'])->name('admin.lessons');

                Route::get('/addlesson', [App\Http\Controllers\Admin\LessonController::class, 'addlesson'])->name('admin.lesson.add');
                Route::post('/storelesson', [App\Http\Controllers\Admin\LessonController::class, 'store'])->name('admin.lesson.store');
                Route::post('/storelesson/{id}', [App\Http\Controllers\Admin\LessonController::class, 'update'])->name('admin.lesson.update');

                Route::get('/editlesson/{id}', [App\Http\Controllers\Admin\LessonController::class, 'editlesson'])->name('admin.lesson.edit');
                Route::get('/removelesson/{id}', [App\Http\Controllers\Admin\LessonController::class, 'remove'])->name('admin.lesson.remove');
                /* material */
             //   Route::get('/cources/addmaterialtosection/{id}', [App\Http\Controllers\Admin\CourceController::class, 'addmaterialtosection'])->name('admin.addmaterialtosection');
             Route::get('/materials', [App\Http\Controllers\Admin\MaterialController::class, 'index'])->name('admin.materials');

                Route::get('/addmaterial', [App\Http\Controllers\Admin\MaterialController::class, 'addmaterial'])->name('admin.material.add');
                Route::post('/storematerial', [App\Http\Controllers\Admin\MaterialController::class, 'store'])->name('admin.material.store');
                Route::get('/editmaterial/{id}', [App\Http\Controllers\Admin\MaterialController::class, 'editmaterial'])->name('admin.material.edit');
                Route::post('/updatematerial/{id}', [App\Http\Controllers\Admin\MaterialController::class, 'update'])->name('admin.material.update');
                Route::get('/removematerial/{id}', [App\Http\Controllers\Admin\MaterialController::class, 'remove'])->name('admin.material.remove');

/* podcasts */
Route::get('/podcasts', [App\Http\Controllers\Admin\PodcastController::class, 'index'])->name('admin.podcasts');

Route::get('/addpodcast', [App\Http\Controllers\Admin\PodcastController::class, 'addpodcast'])->name('admin.podcast.add');
Route::post('/storepodcast', [App\Http\Controllers\Admin\PodcastController::class, 'store'])->name('admin.podcast.store');
Route::get('/editpodcast/{id}', [App\Http\Controllers\Admin\PodcastController::class, 'editpodcast'])->name('admin.podcast.edit');
Route::post('/updatepodcast/{id}', [App\Http\Controllers\Admin\PodcastController::class, 'update'])->name('admin.podcast.update');
Route::get('/removepodcast/{id}', [App\Http\Controllers\Admin\PodcastController::class, 'remove'])->name('admin.podcast.remove');


                /* ################################################categories################################################################################################ */
                Route::get('/categories/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories');
                Route::get('/categorylist', [App\Http\Controllers\Admin\CategoryController::class, 'categorylist'])->name('admin.categorylist');
               
                Route::get('/category/remove/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'remove'])->name('admin.category.remove');
        
                Route::get('/category/addcategory', [App\Http\Controllers\Admin\CategoryController::class, 'addcategory'])->name('admin.addcategory');
                Route::post('/category/addcategory/store', [App\Http\Controllers\Admin\CategoryController::class, 'storecategory'])->name('admin.addcategory.store');
        
                Route::get('/category/editcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editcategory'])->name('admin.editcategory');
                Route::post('/category/editcategory/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editcategoryupdate'])->name('admin.editcategory.update');
        
                                /* ####################adminbooks################# */
                Route::get('/categorybook', [App\Http\Controllers\Admin\BookController::class, 'showcategory'])->name('admin.categorybook');
                Route::get('/addcategorybook', [App\Http\Controllers\Admin\BookController::class, 'addcategorybook'])->name('admin.addcategorybook');
                Route::get('/books', [App\Http\Controllers\Admin\BookController::class, 'showbook'])->name('admin.books');
                Route::get('/addbook', [App\Http\Controllers\Admin\BookController::class, 'addbook'])->name('admin.addbook');
                Route::Post('/addbook/store', [App\Http\Controllers\Admin\BookController::class, 'addbookstore'])->name('admin.addbook.store');
                Route::get('/editbook/{id}', [App\Http\Controllers\Admin\BookController::class, 'editbook'])->name('admin.editbook');
                Route::Post('/editbook/update/{id}', [App\Http\Controllers\Admin\BookController::class, 'updatebook'])->name('admin.book.update');
                Route::get('/books/remove/{id}', [App\Http\Controllers\Admin\BookController::class, 'remove'])->name('admin.book.remove');
        
                /* students */
          /*       Route::get('/student', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('admin.student');
                Route::get('/addstudent', [App\Http\Controllers\Admin\StudentController::class, 'addstudent'])->name('admin.addstudent');
                Route::get('/showstudent/{id}', [App\Http\Controllers\Admin\StudentController::class, 'showstudent'])->name('admin.showstudent');

            */
               
     

                /* quiz admin */
                /* question */
               // Route::post('/cources/addquestion', [App\Http\Controllers\Admin\QuetionController::class, 'addquestion'])->name('admin.addquestion');
        
                Route::get('/questionadd/{id}', [App\Http\Controllers\Admin\QuizController::class, 'addquestion'])->name('admin.question.add');
                Route::post('/addquestion/store', [App\Http\Controllers\Admin\QuizController::class, 'storequestion'])->name('admin.addquestion.store');
                Route::get('/showquestion/{id}', [App\Http\Controllers\Admin\QuizController::class, 'showquestion'])->name('admin.showquestion');
                Route::get('/editquestion/{id}', [App\Http\Controllers\Admin\QuizController::class, 'editquestion'])->name('admin.editquestion');
                Route::post('/updatequestion/update/{id}', [App\Http\Controllers\Admin\QuizController::class, 'updatequestion'])->name('admin.updatequestion.update');
                Route::get('/question/remove/{id}', [App\Http\Controllers\Admin\QuizController::class, 'remove'])->name('admin.question.remove');
               
               
                /* option */
                
                Route::get('/addoption/{id}', [App\Http\Controllers\Admin\QuizController::class, 'addoption'])->name('admin.addoption');
                Route::post('/addoption/store', [App\Http\Controllers\Admin\QuizController::class, 'storeoption'])->name('admin.addoption.store');
                Route::get('/showoption/{id}', [App\Http\Controllers\Admin\QuizController::class, 'showoption'])->name('admin.showoption');
                Route::get('/editoption/{id}', [App\Http\Controllers\Admin\QuizController::class, 'editoption'])->name('admin.editoption');
                Route::post('/updateoption/update/{id}', [App\Http\Controllers\Admin\QuizController::class, 'updateoption'])->name('admin.updateoption.update');
                Route::get('/option/remove/{id}', [App\Http\Controllers\Admin\QuizController::class, 'removeoption'])->name('admin.option.remove');
                
                /* add job or stage */
        
                Route::get('/stages', [App\Http\Controllers\Admin\StageController::class, 'stages'])->name('admin.stages');
        
                Route::get('/addstage/{id}', [App\Http\Controllers\Admin\StageController::class, 'addstage'])->name('admin.stage.add');
                Route::post('/addstage/store', [App\Http\Controllers\Admin\StageController::class, 'storestage'])->name('admin.stage.store');
                Route::get('/editstage/{id}', [App\Http\Controllers\Admin\StageController::class, 'editstage'])->name('admin.editstage');
                Route::post('/updatestage/update/{id}', [App\Http\Controllers\Admin\StageController::class, 'updatestage'])->name('admin.stage.update');
                Route::get('/stage/remove/{id}', [App\Http\Controllers\Admin\StageController::class, 'remove'])->name('admin.stage.remove');
                
               

               /* year */
               Route::get('/years', [App\Http\Controllers\Admin\YearController::class, 'years'])->name('admin.years');

               Route::get('/addyear', [App\Http\Controllers\Admin\YearController::class, 'addyear'])->name('admin.addyear');
               Route::post('/addyear/store', [App\Http\Controllers\Admin\YearController::class, 'storeyear'])->name('admin.year.store');
               Route::get('/edityear/{id}', [App\Http\Controllers\Admin\YearController::class, 'edityear'])->name('admin.edityear');
               Route::post('/updateyear/update/{id}', [App\Http\Controllers\Admin\YearController::class, 'updateyear'])->name('admin.year.update');
               Route::get('/year/remove/{id}', [App\Http\Controllers\Admin\YearController::class, 'removeyear'])->name('admin.year.remove');
               /* center */
               Route::get('/centres', [App\Http\Controllers\Admin\CentreController::class, 'centres'])->name('admin.centres');

               Route::get('/addcentre', [App\Http\Controllers\Admin\CentreController::class, 'addcentre'])->name('admin.addcentre');
               Route::post('/addcentre/store', [App\Http\Controllers\Admin\CentreController::class, 'storecentre'])->name('admin.centre.store');
               Route::get('/editcentre/{id}', [App\Http\Controllers\Admin\CentreController::class, 'editcentre'])->name('admin.editcentre');
               Route::post('/updatecentre/update/{id}', [App\Http\Controllers\Admin\CentreController::class, 'updatecentre'])->name('admin.centre.update');
               Route::get('/centre/remove/{id}', [App\Http\Controllers\Admin\CentreController::class, 'removecentre'])->name('admin.centre.remove');
               /* formation */
               Route::get('/formations', [App\Http\Controllers\Admin\FormationController::class, 'formations'])->name('admin.formations');

               Route::get('/addformation', [App\Http\Controllers\Admin\FormationController::class, 'addformation'])->name('admin.addformation');
               Route::post('/addformation/store', [App\Http\Controllers\Admin\FormationController::class, 'storeformation'])->name('admin.formation.store');
               Route::get('/editformation/{id}', [App\Http\Controllers\Admin\FormationController::class, 'editformation'])->name('admin.editformation');
               Route::post('/updateformation/update/{id}', [App\Http\Controllers\Admin\FormationController::class, 'updateformation'])->name('admin.formation.update');
               Route::get('/formation/remove/{id}', [App\Http\Controllers\Admin\FormationController::class, 'removeformation'])->name('admin.formation.remove');
                /* student group */
               Route::get('/studentgroups', [App\Http\Controllers\Admin\StudentgroupController::class, 'studentgroups'])->name('admin.studentgroups');

                Route::get('/addstudentgroup', [App\Http\Controllers\Admin\StudentgroupController::class, 'addstudentgroup'])->name('admin.addstudentgroup');
                Route::post('/addstudentgroup/store', [App\Http\Controllers\Admin\StudentgroupController::class, 'storestudentgroup'])->name('admin.studentgroup.store');
                Route::get('/editstudentgroup/{id}', [App\Http\Controllers\Admin\StudentgroupController::class, 'editstudentgroup'])->name('admin.editstudentgroup');
                Route::post('/updatestudentgroup/update/{id}', [App\Http\Controllers\Admin\StudentgroupController::class, 'updatestudentgroup'])->name('admin.studentgroup.update');
                Route::get('/studentgroup/remove/{id}', [App\Http\Controllers\Admin\StudentgroupController::class, 'removestudentgroup'])->name('admin.studentgroup.remove');

 /* student  */
                Route::get('/students', [App\Http\Controllers\Admin\studentController::class, 'students'])->name('admin.students');
                Route::get('/studentattachment/{id}', [App\Http\Controllers\Admin\studentController::class, 'studentattachment'])->name('admin.studentattachment');

                Route::get('/addstudent', [App\Http\Controllers\Admin\StudentController::class, 'addstudent'])->name('admin.addstudent');
                Route::post('/addstudent/store', [App\Http\Controllers\Admin\StudentController::class, 'storestudent'])->name('admin.student.store');
                Route::get('/editstudent/{id}', [App\Http\Controllers\Admin\StudentController::class, 'editstudent'])->name('admin.editstudent');
                Route::get('/showstudent/{id}', [App\Http\Controllers\Admin\StudentController::class, 'showstudent'])->name('admin.showstudent');

                Route::post('/updatestudent/update/{id}', [App\Http\Controllers\Admin\StudentController::class, 'updatestudent'])->name('admin.student.update');
                Route::get('/student/remove/{id}', [App\Http\Controllers\Admin\StudentController::class, 'removestudent'])->name('admin.student.remove');
                Route::get('/searchstudent', [App\Http\Controllers\Admin\StudentController::class, 'searchstudent'])->name('search.student');

/* teacher  */
                 Route::get('/teachers', [App\Http\Controllers\Admin\TeacherController::class, 'teachers'])->name('admin.teacher');

                 Route::get('/addteacher', [App\Http\Controllers\Admin\TeacherController::class, 'addteacher'])->name('admin.addteacher');
                 Route::post('/addteacher/store', [App\Http\Controllers\Admin\TeacherController::class, 'storeteacher'])->name('admin.teacher.store');
                 Route::get('/editteacher/{id}', [App\Http\Controllers\Admin\TeacherController::class, 'editteacher'])->name('admin.editteacher');
                 Route::get('/showteacher/{id}', [App\Http\Controllers\Admin\TeacherController::class, 'showteacher'])->name('admin.showteacher');
 
                 Route::post('/updateteacher/update/{id}', [App\Http\Controllers\Admin\TeacherController::class, 'updateteacher'])->name('admin.teacher.update');
                 Route::get('/teacher/remove/{id}', [App\Http\Controllers\Admin\TeacherController::class, 'removeteacher'])->name('admin.teacher.remove');

                /* studentattachment  */
                Route::get('/studentattachments', [App\Http\Controllers\Admin\StudentAttachmentController::class, 'studentAttachments'])->name('admin.studentAttachments');
                Route::get('/addstudentattachment', [App\Http\Controllers\Admin\StudentAttachmentController::class, 'addstudentAttachment'])->name('admin.studentAttachment.add');
                Route::post('/addstudentattachment/store', [App\Http\Controllers\Admin\StudentAttachmentController::class, 'storestudentAttachment'])->name('admin.studentAttachment.store');
                Route::get('/editstudentattachment/{id}', [App\Http\Controllers\Admin\StudentAttachmentController::class, 'editstudentAttachment'])->name('admin.studentAttachment.edit');
                Route::get('/showstudentattachment/{id}', [App\Http\Controllers\Admin\StudentAttachmentController::class, 'showstudentAttachment'])->name('admin.showstudentAttachment');

                Route::post('/updatestudentattachment/update/{id}', [App\Http\Controllers\Admin\StudentAttachmentController::class, 'updatestudentAttachment'])->name('admin.studentAttachment.update');
                Route::get('/studentattachment/remove/{id}', [App\Http\Controllers\Admin\StudentAttachmentController::class, 'removestudentAttachment'])->name('admin.studentAttachment.remove');
                            /* trainship */
                Route::get('/trainships', [App\Http\Controllers\Admin\TrainshipController::class, 'trainships'])->name('admin.trainships');

                Route::get('/addtrainship', [App\Http\Controllers\Admin\TrainshipController::class, 'addtrainship'])->name('admin.addtrainship');
                Route::post('/addtrainship/store', [App\Http\Controllers\Admin\TrainshipController::class, 'storetrainship'])->name('admin.trainship.store');
                Route::get('/edittrainship/{id}', [App\Http\Controllers\Admin\TrainshipController::class, 'edittrainship'])->name('admin.edittrainship');
                Route::post('/updatetrainship/update/{id}', [App\Http\Controllers\Admin\TrainshipController::class, 'updatetrainship'])->name('admin.trainship.update');
                Route::get('/trainship/remove/{id}', [App\Http\Controllers\Admin\TrainshipController::class, 'removetrainship'])->name('admin.trainship.remove');

               /*  Route::get('/chat', function () {
                    return view('chat');
                }); */
              

                        });
                        Route::get('/chat', [App\Http\Controllers\Admin\ChatController::class, 'index'])->name('chat')->middleware('auth');  
                        Route::get('/chatshow/{group}', [App\Http\Controllers\Admin\ChatController::class, 'show'])->name('chat.show')->middleware('auth');  
        Route::get('/showstage/{id}', [App\Http\Controllers\Admin\StageController::class, 'showstage'])->name('admin.showstage');  
    /* }); */ 


