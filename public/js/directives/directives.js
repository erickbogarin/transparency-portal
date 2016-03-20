angular.module('directives', [])
	.directive('pageTitle', function() {

		var ddo = {};

		ddo.restrict = 'EA',
		ddo.link = function($scope, $element) {
		
			var el = $element[0];
	            el.hidden = true; // So the text not actually visible on the page

	            var text = function() {
	            	return el.innerHTML;
	            };
	            var setTitle = function(title) {
	            	document.title = title;
	        };
	    
	        $scope.$watch(text, setTitle);
	    }

	    return ddo;
	})
	.directive('searchFormMenu', function() {

		var ddo = {};

		ddo.restrict = 'EA';

		ddo.templateUrl = 'js/directives/searchFormMenu.html';

		return ddo;
	})
	.directive('content', function() {

		var ddo = {};

		ddo.restrict = 'EA';
		ddo.transclude = true;

		ddo.templateUrl = 'js/directives/content.html';

		return ddo;
	})
	.directive('fileModel', ['$parse', function ($parse) {
	    return {
	        restrict: 'A',
	        link: function(scope, element, attrs) {
	            var model = $parse(attrs.fileModel);
	            var modelSetter = model.assign;
	            
	            element.bind('change', function(){
	                scope.$apply(function(){
	                    modelSetter(scope, element[0].files[0]);
	                });
	            });
	        }
	    }
	}]);    