angular.module('starter.directive', [])
.directive('helloWorld', ['version', function(version) {
	return function(scope, elem, attrs) {
		elem.text(version);
	}
}])