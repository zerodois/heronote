<!DOCTYPE html>
<html lang="pt-br" ng-app="heronote">
<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Note</title>
  <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/icomoon/css/style.css">
	<link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/geral.css">
	<link rel="stylesheet" href="/css/scrollbar.css">
</head>
<body ng-controller="NoteController as Note">
	<nav id="navbar" class="navbar navbar-default navbar-static-top primary">
	  <div class="container">
	  	<div class="row">
		    <div class="col-lg-10">
					<i ng-show="Note.wait" class="fa fa-circle-o-notch fa-spin fa-fw wait white-text"></i>
					<a href="/" class="white-text link-white ghost">
						<i class="icon-heronote"></i>			
					</a>
				</div>
				<div class="col-lg-2">
					@if( count($data['subnotes']) )
						<span class="link-white white-text ghost" data-toggle="modal" data-target=".subfiles"><i class="fa fa-folder-open" aria-hidden="true"></i></span>
					@endif
					@if( $data['logged'] )
						&nbsp;<a href="/logout" class="white-text link-white ghost"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
					@endif
				</div>
	  	</div>
	  </div>
	</nav>
	<input type="hidden" name="_uri" id="_uri" value="{{ $data['uri'] }}">
	<input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}">
	<header class="primary">
		
	</header>

	@if( count($data['subnotes']) )
		<div class="subfiles modal fade" ng-click="Note.close()" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-md">
		    <div class="modal-content">
		      <div class="header primary-text">
							<i class="fa fa-folder" aria-hidden="true"></i>
							<h4>
								Subpastas e arquivos
							</h4>
						</div>
						@foreach( $data['subnotes'] as $note )
							<a href="/{{ $note['uri'] }}" class="primary-link">{{ $note['name'] }}</a>
						@endforeach
		    </div>
		  </div>
		</div>
	@endif
	<textarea 
		class="note"
		ng-change="Note.up()"
		ng-keydown="Note.detect($event)"
		ng-keydown="Note.undetect()"
		ng-model="Note.area"
		ng-init="Note.mark('{{ $data['note'] }}')">
	</textarea>

	<div class="note-pdf" ng-bind-html="Note.text">
	</div>

	@include('footer')
</body>
<script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/showdownjs/showdown/1.7.6/dist/showdown.min.js"></script>
<script type="text/javascript" src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/vendor/angular/angular.min.js"></script>
<script type="text/javascript" src="/vendor/angular-resource/angular-resource.min.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" src="/js/services/noteService.js"></script>
<script type="text/javascript" src="/js/controllers/noteController.js"></script>
</html>