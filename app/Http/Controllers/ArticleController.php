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
		$articles = Article::orderBy('created_at', 'desc')->paginate(1);

		return view('articles.index', ['articles' => $articles, 'current_page' => 'articles.index']);

	}

}
