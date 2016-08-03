/*
* @Author: felipelopesrita
* @Date:   2016-08-02 02:13:12
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-08-03 01:03:22
*/

angular.module('heronote')
 .controller( 'NoteController', NoteController );

function NoteController( NoteService ) {
	var vm = this;

	vm.up  = function() {
		
		if( vm.req ) vm.req.cancel('Requisição cancelada');
		data 				= { text:vm.area };
		data._token = document.getElementById('_token').value;
		data.id 		= document.getElementById('_uri').value;
		vm.req 			= NoteService.post( data, function(){
			vm.wait = true;
		});
		vm.req.promise.then(function(){
			vm.wait 	= false;
		});
	};

};
NoteController['$inject'] = [ 'NoteService' ];