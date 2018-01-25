<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Post;
use Mail;
use Session;

class PageController extends Controller
{

	public function home() {
		$posts = Post::orderBy('created_at', 'DESC')->limit(4)->get();
		return view('pages.home', ['posts' => $posts]);
	}

	public function getAbout() {
		return view('pages.about');
	}

	public function getContact() {
		return view('pages.contact');
	}

	public function sendMail(Request $request) {
		Mail::to($request->email)->send(new ContactMail($request));

		Session::flash('success', 'Mail has been sent successfully!');

		return redirect()->route('contact');
	}

	public function getIndex() {

		$firstName = 'Samiul Alim';
		$lastName = 'Pratik';
		$fullName = $firstName . " " . $lastName;
		$email = 'pratik.anwar@gmail.com';
		$friends = ['Pratik', 'Himel', 'Affan'];

		return view('test', ['name' => $fullName, 'mail_address' => $email, 'friends' => $friends]);
	}

}
