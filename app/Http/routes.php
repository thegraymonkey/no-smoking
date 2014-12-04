<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$router->get('feed', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Authentication & Password Reset Controllers
|--------------------------------------------------------------------------
|
| These two controllers handle the authentication of the users of your
| application, as well as the functions necessary for resetting the
| passwords for your users. You may modify or remove these files.
|
*/

$router->controllers([
	'auth' => 'AuthController',
	'password' => 'PasswordController',
]);


$router->resource('forums', 'ForumController', ['only' => ['index', 'show']]);
$router->resource('threads', 'ThreadController', ['only' => ['show', 'create', 'store','destroy', 'edit', 'update']]);
$router->resource('replies', 'ReplyController', ['only' => ['create', 'store', 'destroy', 'edit', 'update']]);
$router->controller('contacts', 'ContactController');
$router->controller('profile', 'ProfileController');
$router->controller('photos', 'PhotoController');
$router->resource('posts', 'PostController', ['only' => ['store', 'destroy', 'edit', 'update']]);
$router->resource('articles', 'ArticleController', ['only' => ['index']]);
$router->get('/', function() {

	$lastPhoto = App\Photo::orderBy('created_at', 'desc')->first();
	$lastThread = App\Thread::orderBy('created_at', 'desc')->first();
	

	return View::make('common.enter', ['current_page' => 'enter', 'last_photo' => $lastPhoto, 'last_thread' => $lastThread]);

});

$router->group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function($router)
{
	$router->resource('articles', 'Admin\ArticleController', ['only' => ['index', 'show', 'create', 'store','destroy', 'edit', 'update']]);

	$router->resource('photos', 'Admin\PhotoController', ['only' => ['index', 'destroy']]);

	$router->get('dashboard', function() {

		return View::make('admin.dashboard');
	});
});


//$router->get('test', function(){

	// MODEL: App\Reply

	// 1: get all
	//$replies = App\Reply::all();

	// 2: get all order by date
	//$replies = App\Reply::orderBy('created_at', 'desc')->get();
	// 3: get all limit 3
	//$replies = App\Reply::take(3)->get();
	// 4: create new
	//App\Reply::create([
	//	'thread_id'=>1,
		
	//	'content'=>'brand new content'
	//	]);
	
	// 5: update one
	//$reply = App\Reply::find(6);
	//$reply->content = 'prmenjen sadrzaj';
	//$reply->save();
	// 6: delete one
	//$reply = App\Reply::find(6);
	//$reply->delete(); 



	//$replies = App\Reply::all();
	//return $replies;

//});