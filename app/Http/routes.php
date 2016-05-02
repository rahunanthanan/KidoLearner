<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Subcategory;
use App\Feedback;
use App\Fileentry;

Route::group(['middleware' => ['web']], function () {


    /*----Jeyamaal Routes ----------*/

    //Route::get('about','PagesController');
    Route::get('/', 'WelcomeController@index');

    Route::get('subCategory/create/{catId}', 'subCategoryController@create');




    // course routes

    Route::resource('courses', 'CourseController');



    // category routes

    Route::resource('category', 'CategoryController');




    // subcategory routes

     Route::resource('subCategory','SubcategoryController');


    //feedback routes


     Route::resource('emails', 'FeedbackController');

     //Route:post('subCategory/create/{catId}','FeedbackController@destroy');





    Route::get('/emails/feedback', 'ContactController@getContactForm');

    Route::post('contact_request', 'ContactController@getContactUsForm');


    //file upload routes


    Route::get('viewentry','FileController@index');

    Route::post('addentry','FileController@add');

    Route::get('fileentry/get/{filename}','FileController@get');

    /*Route::get('fileentry/get/{filename}', ['as' => 'getentry', 'uses' => 'FileController@get']);*/



    /*    Route::get('receive','FileController@get');

        Route::get('getentry/{filename}','FileController@get');*/



    Route::get('/ajax-subcat',function(){

        $cat_id = Input::get('cat_id');

        $subcategories= Subcategory::where('category_id', '=' ,$cat_id)->get();

        return Response::json($subcategories);


    });
  //  Route::get('fileentry', 'FileEntryController@index');

  //  Route::get('fileentry/get/{filename}', ['as' => 'getentry', 'uses' => 'FileEntryController@get']);

    /*Route::post('fileentry/add',['as' => 'addentry', 'uses' => 'FileEntryController@add']);*/



    /*Route::get('/email',function(){

        $data = array(
            'name' => "Learning Laravel",
        );

        Mail::send('emails.test', $data, function ($message) {

            $message->from('rcholan11@gmail.com','Learning Laravel');

            $message->to('rcholan11@gmail.com')->subject('Learning Laravel test email');

        });

        return "Your email has been sent successfully";


    });*/

/*
    Route::get('feedback', 'FeedbackController@getFeed');

    Route::post('feedback_request', 'FeedbackController@getFeedform');*/


//Route::get('jobs','JobController@drag');


    Route::post('apply/upload', 'ApplyController@upload');


//Route::get('uploads','UploadController@index');

    Route::post('upload', 'UploadController@upload');
    /*Route::post('upload/add','UploadController@uploadFiles');


    Route::post('/jobs/create', function(){
        // Validation [...]
        Jobs::increment('position');
        $jobs = new Jobs;
        // [...]
        $jobs->position = 1;
        $jobs->save();
        return Redirect::route('home');
    });*/





    /*----Umatharsini Routes ----------*/

    Route::auth();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index');

    /*
    *   Redirect Auth Users to Respective Pages
    */
    Route::post('/login', 'SettingsController@authenticate');

    /*
     *CSRF protection group
     */
    Route::group(array('before'=>'csrf'), function(){
        /*
         * Change password (POST)
         */
        Route::post('/home/ChangePassword','SettingsController@postChangePassword');
    });


    /*
    *   Change password (GET) SettingsController@getViewChangePassword
    */
    Route::get('/home/ChangePassword', 'SettingsController@getViewChangePassword');

    /*
    *   ToDoList (GET) ToDoListController@getToDoList
    */
    // Route::get('/home/ToDoList', 'ToDoListController@getToDoList');

    /**
     * Show Task Dashboard
     */
    Route::get('/task', 'ToDoListController@getToDoList');

    /**
     * Add New Task
     */
    Route::post('/task','ToDoListController@postToDoList');

    /**
     * Delete Task
     */
    Route::delete('/task/{task}', 'ToDoListController@deleteTask');

    /**
     * To view Admin Panel
     */
    Route::get('/admin', 'AdminController@getViewAdminPage');

    /**
     * To view Child Form
     */
    Route::get('/AddChild', 'ChildController@getChildView');

    /**
     * Add New Child
     */
    Route::post('/AddChild','ChildController@postChild');

    /**
     * Delete Child
     */
    Route::delete('/AddChild/{child}', 'ChildController@deleteChild');

   /* Route::get('Success', 'SignUpController@success');

    Route::get('Success1', 'SignUpController@success1');

    Route::get('Success2', 'SignUpController@success2');

    Route::get('Success3', 'SignUpController@success3');

    Route::get('LoginUser', 'UserController@getViewLogin');
    Route::post('LoginUser', 'UserController@postLogin');//

    Route::get('MyProfile', 'UserController@getViewMyProfile');

    Route::get('ChangePassword', 'SettingsController@getViewChangePassword');
    Route::post('ChangePassword', 'SettingsController@changePassword');

    Route::get('MyDetails', 'SettingsController@loadMyDetails');
    Route::post('Logout', 'UserController@getSignOut');

    Route::get('Child', 'UserController@getViewChild');
    Route::post('Child', 'UserController@postChild');

    Route::get('MyChildDetails', 'SettingsController@loadMyChildDetails');

    Route::get('ProfilePicture', 'SettingsController@getViewProfilePicture');
    Route::post('ProfilePicture', 'SettingsController@uploadProfilePicture');

    Route::get('MyProfile', 'SettingsController@loadProfilePicture');

    Route::get('RecoverPassword', 'SettingsController@getViewRecoverPassword');
    Route::post('RecoverPassword', 'SettingsController@recoverPassword');

    Route::get('CreateProfile','SignUpController@getRegister');
//Route::get('/CreateProfile','SignUpController@postRegister');
    Route::post('CreateProfile','SignUpController@postRegister');*/

//Route::get('Fail','SignUpController@failure');



    Route::post('/jobs/reposition', function () {
        if (Input::has('item')) {
            $i = 0;
            foreach (Input::get('item') as $id) {
                $i++;
                $item = Jobs::find($id);
                $item->position = $i;
                $item->save();
            }
            return Response::json(array('success' => true));
        } else {
            return Response::json(array('success' => false));
        }
    });

});




/*----Rahu and Kavi ----------*/



Route::get('main','mainController@index');

Route::get('Login','LoginController@login');

Route::get('Student','StudentController@student');

Route::post('Login','LoginController@doLogin');

Route::get('Mycourse','MycourseController@course');


Route::get('Viewcourse','ViewcourseController@index');

Route::post('Viewcourse','ViewcourseController@add');





Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(['middleware' => ['web']], function () {

    /*rahu sep*/


    Route::get('quizmain','quizmainController@getmain');
    Route::get('addsubject','addsubjectController@getsubject');
    Route::get('managesub','managesubController@getmanage');
    Route::get('addquiz','addquizController@getquiz');
    Route::post('addsubject','addsubjectController@addsubject');
    Route::post('managesub','addsubjectController@editsubject');
    Route::post('addquiz','addquizController@addquiz');


//onchange function for excuse request form
    Route::get('/formc',function(){
        $category=Input::get('category');
        $zone=\App\subject::where('category','=',$category)->get();
        return Response::json($zone);
    });

    Route::get('/ques',function(){
        $id=Input::get('quID');
        $sub=\App\quiz::where('queID','=',$id)->get();

        return Response::json($sub);
    });


    /* Kavi */

    Route::get('bookupload', 'bookuploadController@viewupload');
    Route::get('librarycategory', 'bookuploadController@viewcategory');
    Route::get('viewcategory', 'bookuploadController@viewallcat');
    Route::get('viewcountcat', 'bookuploadController@viewcountcat');
    Route::get('LibraryUpload', 'bookuploadController@uploadmaterials');
    Route::get('librarytype', 'bookuploadController@viewtype');
    Route::get('viewmaterials', 'bookuploadController@viewmaterials');


    Route::post('LibraryUpload', 'bookuploadController@addcategory');

    Route::get('quizpaper', 'quizpaperController@viewquizp');
    Route::get('attemptquiz', 'quizpaperController@attempt');

    Route::get('createquiz', 'createquizController@viewque');
    Route::post('createquiz', 'createquizController@createquiz');
    //
});