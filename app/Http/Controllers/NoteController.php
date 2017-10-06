<?php

namespace heronote\Http\Controllers;

use heronote\Http\Controllers\FileController;
use Request;
use Auth;

class NoteController extends Controller
{
	
	public function listen($route) {

		if( Auth::guest() )
			return view('note')->withData([
				'logged' => false,
				'note' => FileController::getNote($route),
				'subnotes' => FileController::getSubNotes($route),
				'uri'  => $route
			]);

		$user = Auth::user();
		return view('note')->withData([
			'logged' => true,
			'note' => FileController::getPrivateNote($user->email, $route),
			'subnotes' => FileController::getPrivateSubNotes($user->email, $route),
			'uri'  => $route
		]);
	}

	public function save( ) {
		$path = Request::input('id');
		$text = Request::input('text');

		if( Auth::guest() )
			FileController::saveNote( $path, $text );
		else
			FileController::savePrivateNote( Auth::user()->email, $path, $text );
	}
}
