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

class ArticleController extends Controller {

	public function index()
	{
		$articles = Article::orderBy('created_at', 'desc')->paginate(10);

		return view('admin.articles.index', ['articles' => $articles, 'current_page' => 'articles.index']);
	}

	public function store()
	{
		// validation
		$input = Request::all();

		$rules = [
			'photo' => 'image|max:5024',
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

			return redirect('admin.articles')->with('message', 'Članak snimljen!');
		}	

		return redirect('admin.articles')->withErrors($validation);
	}

	public function destroy($articleId)
	{
		$redirectTo = route('admin.articles.index');

		if ($article = Article::find($articleId))
		{
			if (Auth::user()->id)
			{

				$article->delete();

				return redirect($redirectTo)->with('message', 'Članak obrisan!');
			}
			
			else
			{
				return redirect($redirectTo)->with('message', 'Članak ne postoji!');
			}
		}

		App::abort(404);
	}


	public function edit($id)
	{
		$article = Article::find($id);

		return view('admin.articles.edit')->with('article', $article);
	}

	public function update($id)
	{
		$input = Request::all();

		$rules = [
			'photo' => 'image|max:1024',
			'content' => 'required|min:5'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$article = Article::find($id);

			$photo = Request::file('photo');

			if ($article)
			{
				$article->fill($input);

				$article = $this->assignImage($article, $photo);

				$article->save();

				return redirect(route('admin.articles.index'));
			}

			App::abort(400);
		}

		return redirect(route('admin.articles.index'))->withErrors($validation);
	}

	protected function assignImage(Article $article, $file)
	{
		
		if ($file)
		{
			$ext = $file->getClientOriginalExtension();

			//!!
			$article->file_extension = $ext;

			$path = public_path() . '/upload/article/';

			$filename = time() . md5($image->getClientOriginalName());

			//!!
			$article->file_name = $filename;
			
			// save original
			Image::make($image)
				->widen(400)
				->save($originalImagePath);
		}


		return $article;
	}

}
