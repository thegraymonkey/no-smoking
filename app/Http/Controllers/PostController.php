<?php namespace App\Http\Controllers;

use Request;
use Auth;
use App\Post;
use Goutte\Client;
use Validator;

class PostController extends Controller {

	public function __construct()
	{
		parent:: __construct();
		
		$this->middleware('auth', ['only' => ['store', 'destroy']]);
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
			$post = new Post;
		
			$post->content = $input['content'];

			$post = $this->parseContent($post);

			$post->user_id = Auth::user()->id;

			$post->save();

			return redirect('/feed')->with('message', 'Post snimljen!');
		}	

		return redirect('/feed')->withErrors($validation);
	}

	public function destroy($postId)
	{
		if ($post = Post::find($postId))
		{
			if ($post->isDeletable(Auth::user()))
			{
				$post->delete();

				return redirect('/feed')->with('message', 'Post obrisan!');
			}						
				return redirect('/feed')->with('message', 'Nemate prava da obrisete ovaj post!');		
		}
			return redirect('/feed')->with('message', 'Post ne postoji!');	
	}

	protected function parseContent(Post $post)
	{
		$content = $post->content;

		preg_match('/(http(s?):\/\/.+?)($|\s)/i', $content, $matches);

		if (count($matches))
		{
			$url = trim($matches[0]);

			$client = new Client;
			$crawler = $client->request('GET', $url);
			$post->link_title = $crawler->filter('title')->first()->text();
			$crawler->filter('meta')->each(function($node) use ($post) {
				if ($node->attr('name') == 'description' or $node->attr('name') == 'Description')
				{
					$post->link_description = $node->attr('content');
				}
			});

			$post->link_url = $url;
		}

		return $post;
	}

	public function edit($id)
	{
		$post = Post::find($id);
		return view('posts.edit')->with('post', $post);
	}

	public function update($id)
	{
		$input = Request::all();

		$rules = [
			'content' => 'required|min:5'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{

			$data = Request::all();

			$post = Post::find($id);

			if ($post instanceof Post)
			{
				$post->fill($data);
				$post->save();
				return redirect('/feed')->withMessage('Post izmenjen!');
			}
			
			return redirect('/feed')->withMessage('Nemate prava da to menjate!');
		}

		return redirect('/feed')->withErrors($validation);
	}

	


}