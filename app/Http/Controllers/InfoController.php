<?php namespace App\Http\Controllers;

use Request;
use Auth;
use Goutte\Client;
use Validator;

class InfoController extends Controller {

	public function __construct()
	{
		parent:: __construct();
		
		$this->middleware('auth', ['only' => ['store', 'destroy']]);
	}

	public function index()
	{
		$infos = Info::orderBy('created_at', 'desc')->paginate(1);

		return view('infos.index', ['info' => $info, 'current_page' => 'infos.index']);

	}

	public function store()
	{
		// validation
		$input = Request::all();

		$rules = [
			'content' => 'required|min:5'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			
			$image = Request::file('image');

			// file name factory
			$fileName = time() . md5($image->getClientOriginalName());
			$fileExt = $image->getClientOriginalExtension();

			// image path
			$originalImagePath = public_path().'/upload/gallery/' . $fileName . '.' . $fileExt;
			
			// save original
			Image::make($image)
				->widen(1024)
				->save($originalImagePath);

			$info = new Info;
		
			$info->title = $input['title'];

			$info->content = $input['content'];

			$info->file_name = $fileName;

			$info->file_extension = $fileExt;

			$info->user_id = Auth::user()->id;

			$info->save();

			return redirect('infos/index')->with('message', 'Post Created!');
		}	

		return redirect('infos/index')->withErrors($validation);
	}
