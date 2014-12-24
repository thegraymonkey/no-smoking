<?php namespace App\Http\Controllers\Admin;

use Request;
use Auth;
use Validator;
use App\Article;
use Image;
use View;
use App\User;
use App\Http\Controllers\Controller;
use App;
use App\Photo;

class PhotoController extends Controller {

	public function __construct()
	{
		parent:: __construct();

		$this->middleware('auth', ['only' => ['postStore']]);
	}

	public function index()
	{
		$photos = Photo::orderBy('created_at', 'desc')->paginate(100);

		return view('admin.photos.index', ['photos' => $photos, 'current_page' => 'photos.index']);
	}

	public function destroy($photoId)
	{
		$redirectTo = route('admin.photos.index');

		if ($photo = Photo::find($photoId))
		{
			if (Auth::user()->id)
			{

				$photo->delete();

				return redirect($redirectTo)->with('message', 'Slika obrisana!');
			}
			
			else
			{
				return redirect($redirectTo)->with('message', 'Slika ne postoji!');
			}
		}

		App::abort(404);
	}

}