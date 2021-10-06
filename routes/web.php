<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Website\WebsiteController;
use App\Models\Role;

// use App\Http\Controllers\Admin\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[WebsiteController::class, 'index'])->name('website.index');

// Webstite routes
Route::get('about', [WebsiteController::class, 'about'])->name('website.about');
Route::get('contact', [WebsiteController::class,'contact'])->name('website.contact');
Route::get('course', [WebsiteController::class, 'course'])->name('website.course');
Route::get('blog', [WebsiteController::class, 'blog'])->name('website.blog');
Route::get('single-course', [WebsiteController::class, 'singleCourse'])->name('website.single-course');
Route::get('show-course/{id}', [WebsiteController::class, 'showCourse'])->name('website.show-course');
Route::post('store', [WebsiteController::class, 'store'])->name('website.store');
Route::get('instructors', [WebsiteController::class, 'instructors'])->name('website.instructors');
Route::post('send-message', [WebsiteController::class, 'sendMessage'])->name('website.send-message');


Auth::routes(['verify'=>true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); $syllabus->id

Route::group(['as'=>'admin.','prefix'=>'admin', 'namespace'=>'App\Http\Controllers\Admin','middleware'=>[
    'web','verified','auth','admin']], function() {
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
            Route::resource('user', UserController::class);
            Route::get('admins', 'UserController@admin')->name('user.admin');
            Route::get('lecturers', 'UserController@lecturers')->name('user.lecturers');
            Route::get('students', 'UserController@students')->name('user.students');
            Route::resource('syllabus', SyllabusController::class); 
        //     Route::patch('/syllabus-approve/{id}', [App\Http\Controllers\Admin\SyllabusController::class, 'approve'])->name('syllabus.approve');
            Route::put('syllabus-approve/{id}', 'SyllabusController@approve')->name('syllabus.approve');
            Route::resource('courses', CourseController::class);
            Route::resource('exercise', ExcerciseController::class);
            Route::patch('approve/{id}', 'ExcerciseController@approve')->name('exercise.approve');
            Route::resource('lesson', LessonController::class);
            Route::resource('subscribers', SubscriptionController::class);
            Route::resource('scheme', SchemeController::class);
            Route::put('approve/{id}', 'SchemeController@approve')->name('scheme.approve');
            Route::resource('unit', UnitController::class);
            Route::resource('course-outline', CourseOutlineController::class);
            Route::get('approve/{id}', 'CourseOutlineController@approve')->name('course-outline.approve');
            Route::resource('question', QuestionController::class);
            Route::get('pending', 'QuestionController@pending')->name('question.pending');
            Route::patch('ignore/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'ignoreQuestion'])->name('question.ignore');
            Route::resource('message', MessageController::class);
            Route::put('student-message-show/{id}', 'MessageController@showStudentMessage')->name('message.student-message-show');
            Route::put('ignore/{id}', 'MessageController@ignoreMessage')->name('message.ignore');
            Route::resource('contact-us', ContactUsController::class);
            Route::get('read', 'ContactUsController@read')->name('contact-us.read');
            Route::get('unread', 'ContactUsController@unRead')->name('contact-us.unread');
            Route::resource('instructor-unit', InstructorUnitController::class);
            Route::resource('payments', PaymentController::class);
            Route::get('payments/student-payments/{id}', 'PaymentController@studentPayments')->name('student-payments');
    });

Route::group(['as'=>'lecturer.','prefix'=>'lecturer', 'namespace'=>'App\Http\Controllers\Lecturer', 'middleware'=>[
    'web','verified','auth', 'lecturer']], function() {
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
            Route::get('read-message/{id}', 'DashboardController@readMessage')->name('message.read');
            Route::post('request-unit', 'DashboardController@requestUnit')->name('message.store');
            Route::resource('scheme', SchemeController::class);
            Route::resource('syllabus', SyllabusController::class);
            Route::resource('lesson', LessonController::class);
            Route::resource('user', UserController::class);
            Route::resource('question', QuestionController::class);
            Route::get('answered', 'QuestionController@answered')->name('question.answered');
            Route::get('all-question', 'QuestionController@allQuestion')->name('question.all-question');
            Route::resource('instructor-unit', InstructorUnitController::class);
            Route::resource('exercise', ExerciseController::class);
    });

Route::group(['as'=>'student.','prefix'=>'student', 'namespace'=>'App\Http\Controllers\Student', 'middleware'=>[
    'web','verified','auth', 'student']], function() {
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
            Route::get('show-course/{id}', 'DashboardController@showCourse')->name('show-course');
            Route::post('enroll-course/{id}', 'DashboardController@enrollCourse')->name('enroll-course');
            Route::get('completed-course', 'DashboardController@completedCourse')->name('completed-course');
            Route::get('success', 'DashboardController@success')->name('success');
            Route::get('course-unit/{id}', 'DashboardController@courseUnit')->name('course-unit');
            Route::get('show-unit/{id}', 'DashboardController@showUnit')->name('show-unit');
            Route::get('lesson-list/{id}', 'DashboardController@showLessons')->name('lesson-list');
            Route::post('view-lesson/{id}', 'DashboardController@viewLesson')->name('view-lesson');
            Route::get('view-assignment/{id}', 'DashboardController@viewAssignment')->name('view-assignment');
            Route::get('units', 'DashboardController@units')->name('units');
            Route::resource('question', QuestionController::class);
            Route::get('all-questions','QuestionController@allQuestions')->name('question.all-questions');
            Route::post('create-message','DashboardController@createMessage')->name('create-message');
            Route::get('student-course', 'DashboardController@studentCourse')->name('student-course');
            Route::resource('message', MessageController::class);
            Route::post('request-unit', 'MessageController@requestUnit')->name('message.request-unit');
            Route::get('my-messages', 'MessageController@myMessages')->name('message.my-messages');
            Route::resource('payments', PaymentController::class)->only(['index', 'store']); 
    });