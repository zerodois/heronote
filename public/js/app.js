/*
* @Author: felipelopesrita
* @Date:   2016-08-02 02:11:16
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-08-02 02:50:33
*/

angular.module('heronote', ['ngResource'])
	.config(function( $interpolateProvider ){

		//Troca de chaves especiais do Angular (Conflito com o Blade do Laravel)
		$interpolateProvider.startSymbol('@{');
		$interpolateProvider.endSymbol('}');
	});