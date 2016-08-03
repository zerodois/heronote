<?php

namespace heronote\Http\Controllers;

use Request;
use Session;
use Auth;
use heronote\User;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk as Facebook;

class FacebookController extends Controller
{
  public function login(Facebook $fb) {
    
    $token = $fb->getAccessTokenFromRedirect();

    // Access token will be null if the user denied the request
    // or if someone just hit this URL outside of the OAuth flow.
    if (!$token) {
      // Get the redirect helper
      $helper = $fb->getRedirectLoginHelper();
      if (! $helper->getError()) {
        abort(403, 'Unauthorized action.');
      }
      // User denied the request
      dd(
        $helper->getError(),
        $helper->getErrorCode(),
        $helper->getErrorReason(),
        $helper->getErrorDescription()
      );
    }

    if (! $token->isLongLived()) {
      // OAuth 2.0 client handler
      $oauth_client = $fb->getOAuth2Client();
      // Extend the access token.
      $token = $oauth_client->getLongLivedAccessToken($token);
    }

    $fb->setDefaultAccessToken($token);

    // Save for later
    Session::put('fb_user_access_token', (string) $token);
    // Get basic info on the user from Facebook.
    $response = $fb->get('/me?fields=id,name,email');

    // Create the user if it does not exist or update the existing entry.
    // This will only work if you've added the SyncableGraphNodeTrait to your User model.
    $user = User::createOrUpdateGraphNode( $response->getGraphUser() );

    // Log the user into Laravel
    Auth::login($user);

    return redirect('/')->with('message', 'Successfully logged in with Facebook');
	}
}
