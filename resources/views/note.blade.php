<!DOCTYPE html>
<html lang="pt-br" ng-app="heronote">
<head>
  <meta charset="utf-8">
  <title>Note</title>
  <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/icomoon/css/style.css">
	<link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/geral.css">
</head>
<body ng-controller="NoteController as Note">
	<input type="hidden" name="_uri" id="_uri" value="{{ $data['uri'] }}">
	<input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}">
	<div class="logo">
		<i ng-show="Note.wait" class="fa fa-circle-o-notch fa-spin fa-3x fa-fw wait"></i>
		@if( count($data['subnotes']) )
			<span class="link-red" data-toggle="modal" data-target=".subfiles"><i class="fa fa-folder-open" aria-hidden="true"></i></span>
		@endif
		<a href="/">
			<i class="icon-heronote"></i>			
		</a>
	</div>

	@if( count($data['subnotes']) )
		<div class="subfiles modal fade" ng-click="Note.close()" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-md">
		    <div class="modal-content">
		      <div class="header red-text">
							<i class="fa fa-folder" aria-hidden="true"></i>
							<h4>
								Subpastas e arquivos
							</h4>
						</div>
						@foreach( $data['subnotes'] as $note )
							<a href="/{{ $note['uri'] }}" class="link-red">{{ $note['name'] }}</a>
						@endforeach
		    </div>
		  </div>
		</div>
	@endif
	<textarea 
		class="note"
		ng-change="Note.up()"
		ng-model="Note.area"
		ng-init="Note.area='{{ $data['note'] }}'">
	</textarea>
	@include('footer')
</body>
<script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/vendor/angular/angular.min.js"></script>
<script type="text/javascript" src="/vendor/angular-resource/angular-resource.min.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" src="/js/services/noteService.js"></script>
<script type="text/javascript" src="/js/controllers/noteController.js"></script>
</html>