<?php

namespace heronote\Http\Controllers;

use heronote\Http\Controllers\FileController;
use Request;

class NoteController extends Controller
{
	
	public function listen($route) {
		return view('note')->withData([
			'note' => FileController::getNote($route),
			'subnotes' => FileController::getSubNotes($route),
			'uri'  => $route
		]);
	}

	public function save( ) {
		$path = Request::input('id');
		$text = Request::input('text');
		FileController::saveNote( $path, $text );
	}
}
