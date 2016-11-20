angular.module('starter.service', [])
.factory('Book', ['$http', function($http) {
  function Book(bookData) {
    if(bookData) {
      this.setData(bookData);
    }
  }
  Book.prototype = {
    setData: function(bookData) {
      angular.extend(this, bookData)
    },
    load: function(id) {
      var scope = this;
      $http.get('ourserver/books/' + bookId).success(function(bookData) {
        scope.setData(bookData);
      })
    },
    delete: function() {
      $http.delete('ourserver/books/' + bookId);
    },
    getImageUrl: function(width, height) {
      return 'our/image/service/' + this.book.id + 'width/height';
    },
    isAvailable: function() {
      if(!this.book.stores || this.book.stores.length === 0) {
        return false;
      }
      return this.book.stores.some(function(store) {
        return store.quantity > 0;
      })
    }
  }
  return Book;
}])
.directive('showContent', ['$compile',function($compile) {
	return {
		restrict: 'E',
		scope: true,
		link: function($scope, $element, $attr) {
			var el;
			$attr.$observe('template', function(tpl) {
				el = $compile(tpl)($scope);
				$element.html("");	
				$element.append(el);
			})
			console.log($element)
		}
	}
}])


