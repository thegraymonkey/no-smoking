<?php namespace App\Http\Controllers;

use Request;
use Auth;
use Validator;
use App\Article;
use Image;
use View;

class ArticleController extends Controller {

	public function __construct()
	{
		parent:: __construct();
		
		$this->middleware('auth', ['only' => ['store', 'destroy']]);
	}

	public function index()
	{
		$articles = Article::orderBy('created_at', 'desc')->paginate(1);

		return view('articles.index', ['articles' => $articles, 'current_page' => 'articles.index']);

	}

	public function store()
	{
		// validation
		$input = Request::all();

		$rules = [
			'photo' => 'required|image|max:1024',
			'content' => 'required|min:5'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			
			$image = Request::file('photo');
		
			// file name factory
			$fileName = time() . md5($image->getClientOriginalName());
			$fileExt = $image->getClientOriginalExtension();

			// image path
			$originalImagePath = public_path().'/upload/article/' . $fileName . '.' . $fileExt;
			
			// save original
			Image::make($image)
				->widen(400)
				->save($originalImagePath);

			$article = new Article;
		
			$article->title = $input['title'];

			$article->content = $input['content'];

			$article->file_name = $fileName;

			$article->file_extension = $fileExt;

			$article->user_id = Auth::user()->id;

			$article->save();

			return redirect('articles')->with('message', 'Post Created!');
		}	

		return redirect('articles')->withErrors($validation);
	}
}
