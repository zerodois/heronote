<?php

namespace heronote\Http\Controllers;

use heronote\Note;
use heronote\User;
use Storage;

class FileController extends Controller
{
	public static $disk = 'dropbox';
	public static $ext 	= '.txt';

	public static function getNote( $path ) {
		$note = Note::show($path);
		if( !$note )
			return '';
		return $note->text;
	}

	public static function getPrivateNote( $email, $path ) {
		$note = Note::show($path, $email);
		if( !$note )
			return '';
		return $note->text;
	}

	public static function saveNote( $path, $data, $user = 0 ) {
		$arr = [ 'name' => $path, 'text' => $data, 'user_id' => $user ];
		Note::updateOrCreate([ 'name' => $path, 'user_id' => $user ], $arr);
		return new Note($arr);
	}

	public static function savePrivateNote( $email, $path, $data ) {
		$user = User::findByMail($email);
		self::saveNote($path, $data, $user->id);
	}

	public static function getSubNotes( $path ) {
		$sub = Note::subnotes($path);
		$arr = [];
		foreach ($sub as $note) {
			$name = preg_split("/\//", $note->name);
			$arr[] = [ 'uri' => $note->name, 'name' => $name[ count($name)-1 ] ];
		}

		return $arr;
	}

	public static function getPrivateSubNotes( $email, $path ) {
		$sub = Note::subnotes($path, $email);
		$arr = [];
		foreach ($sub as $note) {
			$name = preg_split("/\//", $note->name);
			$arr[] = [ 'uri' => $note->name, 'name' => $name[ count($name)-1 ] ];
		}

		return $arr;
	}

}
