<?php namespace App\Http\Controllers;


use Request;
use Auth;
use Validator;
use View;
use Image;
use App\Photo;
use Intervention\Image\ImageManager;

class PhotoController extends Controller {	

	public function __construct()
	{
		parent:: __construct();

		$this->middleware('auth', ['only' => ['postStore']]);
	}

	public function getIndex()
	{
		$photos = Photo::orderBy('created_at', 'desc')->paginate(24);

		return view('photos.index', ['current_page' => 'photos.index', 'photos' => $photos]);
	}


	public function postStore()
	{
		$input = Request::all();
	
		// validacija
		$rules = 
		[
			'image' => 'required|image|max:1024',
			'description' => 'min:5'
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
			
			$imager = new ImageManager;
			$imager->make($image)
				   ->widen(1024)				  
				   ->save($originalImagePath);
			// save original
			//Image::make($image)
			//	->widen(1024)
			//	->save($originalImagePath);
			
			// save and resize large
			$largeImagePath = public_path().'/upload/gallery/' . $fileName . '-large.' . $fileExt;
			
			$imager = new ImageManager;
			$imager->make($image)
				   ->widen(800)
				   ->save($largeImagePath);

			// save and resize thumb
			$imager = new ImageManager;
			$imager->make($image)
				   ->fit(120, 120)
				   ->save(public_path().'/upload/gallery/' . $fileName . '-thumb.' . $fileExt);

			// snimi u bazu
			// description, file_name, file_extension
			$photo = new Photo;

			$photo->description = $input['description'];
			$photo->file_name = $fileName;
			$photo->file_extension = $fileExt;
			$photo->user_id = Auth::user()->id;

			$photo->save();

			return redirect('photos/index')->withMessage('Slika snimljena.');
		}

		return redirect('photos/index')->withErrors($validation);

	}

}

