<?php namespace App\Http\Controllers;

use Request;
use Auth;
use Validator;
use App\Article;
use Image;
use View;
use App\User;

class ArticleController extends Controller {

	public function __construct()
	{
		parent:: __construct();
	}

	public function index()
	{
		$articles = Article::orderBy('created_at', 'desc')->paginate(10);

		return view('articles.index', ['articles' => $articles, 'current_page' => 'articles.index']);

	}

	public function show($id)
	{
		$article = Article::find($id);

		return view('articles.show', ['article' => $article, 'current_page' => 'articles.index']);

	}

}
