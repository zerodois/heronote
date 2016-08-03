<?php

namespace heronote\Http\Controllers;

use Request;
use Auth;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk as Facebook;

class RequestController extends Controller
{
  public function welcome(Facebook $fb) {
  	
  	$data = [ ];
  	if( Auth::guest() )
	  	$data['url'] = $fb->getLoginUrl(['email']);
  	else
  		$data['user'] = Auth::user();

  	return view('welcome')->withData( $data );
  }
}
