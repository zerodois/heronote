/*
* @Author: felipelopesrita
* @Date:   2016-08-02 02:13:12
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-08-03 01:03:22
*/

angular.module('heronote')
 .controller( 'NoteController', NoteController );

function NoteController( NoteService, $sce, $scope ) {
	var vm = this;
	var converter = new showdown.Converter();

	vm.up  = function() {
		if( vm.req ) vm.req.cancel('Requisição cancelada');
		data 				= { text: vm.area };
		data._token = document.getElementById('_token').value;
		data.id 		= document.getElementById('_uri').value;
		vm.req 			= NoteService.post( data, function(){
			vm.mark()
			vm.wait = true;
		});
		vm.req.promise.then(function(){
			vm.wait 	= false;
		});
	};


	var ctrl = false;
	vm.detect = function ($e) {
		if (ctrl && $e.keyCode == 83) { // Ctrl+S Detected
			vm.mark()
			vm.up();
			$e.preventDefault()
			return false;
		}
		ctrl = $e.keyCode == 17
	}
	vm.undetect = function () { ctrl = false }

	vm.mark = function (text) {
		if (text)
			vm.area = text
		vm.text = $sce.trustAsHtml(converter.makeHtml(vm.area))
	}

};
NoteController['$inject'] = [ 'NoteService', '$sce' ];