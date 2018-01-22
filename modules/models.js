angular.module('modules-module',[]).factory('models',function($http,$compile,$timeout) {
	
	function models() {
		
		var self = this;

		self.data = function(scope) {
			
			scope.views = {};			
			
		};

		self.load = function(scope) {			
			
			$http({
				method: 'GET',
				url: 'views/structures.html',
				params: {table: scope.views.table}
			}).then(function success(response) {
				
				$('#structures').html(response.data);				
				// $timeout(function() {
					$compile($('#structures')[0])(scope);					
				// },100);				
				
			}, function error(response) {
				
			});
			
		};
		
	};
	
	return new models();
	
});