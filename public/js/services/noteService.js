/*
* @Author: felipelopesrita
* @Date:   2016-08-02 12:36:26
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-08-02 20:36:17
*/

angular.module('heronote')
	.factory('NoteService', function( $http, $q ){

		var post = function( data, func ){

      var canceller = $q.defer();
      var active   = true;
      var cancel = function(reason){
      	active   = false;
        canceller.resolve(reason);
      };
      var promise =
      	$q(function(resolve, reject){
			    setTimeout(function(){
			    	if( active )
            {
              func();
  		      	$http.post('/api/save', data, { timeout: canceller.promise})
			          .then(function(response){
									resolve(response.data);
          			});
            }
		      	else 
		      		reject('Requisição rejeitada');
			    }, 1000);
			  })
			   .then(function(response){
						return response;
          });
      return {
        promise: promise,
        cancel: cancel
      };
    };
    return {
      post: post
    };
	});