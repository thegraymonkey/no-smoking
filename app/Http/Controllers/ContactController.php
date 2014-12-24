<?php namespace App\Http\Controllers;

use App\Forum;
use View;
use Request;
use Mail;
use Validator;

class ContactController extends Controller {

	public function __construct()
	{
		parent:: __construct();
		
		View::share('current_page', 'contacts.show');
	}

	public function getShow()
	{
		return view('contacts.show');
	}

	public function postSend()
	{
		$input = Request::all();
		
		$rules = [
			'subject' => 'required',
			'message' => 'required|min:5',
			'email' => 'required|email'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{		
			$subject = $input['subject'];
			$messageContent = $input['message'];
			$from = $input['email']; // email onoga ko ti salje poruku

			Mail::send('emails.contact_form', ['from' => $from, 'message_content' => $messageContent], function($message) use ($subject)
			{
				$message->to('thegraymonkey@gmail.com', 'Admin')->subject($subject);
			});

			return redirect('/')->with('message', 'Vaša poruka je poslata. Hvala!');
		}

		return redirect('contacts/show')->withErrors($validation);

	}
	
}