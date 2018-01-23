angular.module('modules-module',[]).factory('models',function($http,$compile,$timeout) {
	
	function models() {
		
		var self = this;

		self.data = function(scope) {
			
			scope.formHolder = {};
			scope.views = {};
			scope.iterates = [];
			
		};

		function validate(scope,form) {
			
			var controls = scope.formHolder[form].$$controls;
			
			angular.forEach(controls,function(elem,i) {
				
				if (elem.$$attr.$attr.required) elem.$touched = elem.$invalid;
									
			});

			return scope.formHolder[form].$invalid;
			
		};		
		
		self.table = function(scope) {

			$http({
			  method: 'POST',
			  url: 'handlers/iterates.php',
			  data: scope.views
			}).then(function mySucces(response) {
				
				scope.iterates = response.data;
				
			}, function myError(response) {
				
			});				
		
		};
		
		self.load = function(scope) {			
			
			if (validate(scope,'model')) return;
			
			$http({
				method: 'POST',
				url: 'views/structures.html',
				data: scope.views
			}).then(function success(response) {
				
				$('#structures').html(response.data);				
				/* $timeout(function() {
					$compile($('#structures')[0])(scope);					
				},100); */
				
			}, function error(response) {
				
			});
			
		};
		
	};
	
	return new models();
	
});