<?php

namespace heronote\Http\Controllers;

use Storage;

class FileController extends Controller
{
	public static $disk = 'dropbox';
	public static $ext 	= '.txt';

	public static function getNote( $path ) {
		$path .= FileController::$ext;
		$disk  = Storage::disk( FileController::$disk );
		if( !$disk->exists( $path ) )
			return '';
		return $disk->get( $path );
	}

	public static function saveNote( $path, $data ) {
		$path .= FileController::$ext;
		$disk  = Storage::disk( FileController::$disk );
		$disk->put( $path, $data );
	}

	public static function getSubNotes( $path ) {
		$disk  = Storage::disk( FileController::$disk );
		$files = $disk->files( $path );
		$cont  = count( $files );
		$resp  = [];
		for( $i=0; $i<$cont; $i++ ) {
			$files[ $i ] 				= str_replace( FileController::$ext, '', $files[ $i ] );
			$resp[ $i ]['uri']  = $files[ $i ];
			$resp[ $i ]['name'] = str_replace( $path.'/', '', $files[ $i ] );
		}
		return $resp;
	}

}
