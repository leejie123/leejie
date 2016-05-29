angular.module('starter.controllers', [])

.controller('DashCtrl', function($scope) {})

.controller('ChatsCtrl', function($scope, Chats) {
  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //
  //$scope.$on('$ionicView.enter', function(e) {
  //});

  $scope.chats = Chats.all();
  $scope.remove = function(chat) {
    Chats.remove(chat);
  };
})

.controller('ChatDetailCtrl', function($scope, $stateParams, Chats) {
  $scope.chat = Chats.get($stateParams.chatId);
})

.controller('AccountCtrl', function($scope) {
  $scope.settings = {
    enableFriends: true
  }
})

  .controller('testing', function($scope){
   $scope.items = [
   'sfsofi', 'sdisof', 'sifo'
    ]; 
  })

  .controller('imageYear', function($scope) {})
  .controller('imageSelected', function($scope) {

alert();    hljs.initHighlightingOnLoad();

    $scope.items = [
      {url: 'http://placehold.it/40x40?text=sdfasodifiasod'},
      {url: 'http://placehold.it/40x40?text=sdfasodifiasod'},
      {url: 'http://placehold.it/40x40?text=sdfasodifiasod'},
      {url: 'http://placehold.it/40x40?text=sdfasodifiasod'},
      {url: 'http://placehold.it/40x40?text=sdfasodifiasod'},
      {url: 'http://placehold.it/40x40?text=sdfasodifiasod'}
    ];
  })

  .controller('showpopup', function($scope, $ionicPopup,$ionicLoading, $timeout){
    $scope.data = {}
    $scope.pup1 = function () {
      var mypopup = $ionicPopup.show({
        template: '<input type="password" ng-model="data.wifi">',
        title: 'enter wifi password',
        subTItle: 'please use a normal ',
        scope: $scope, 
        buttons: [
          {text: 'cancel'},
          {text: 'save',
            type: 'button-positive',
            onTap: function (e) {
              if (!$scope.data.wifi) {
                e.preventDefault();
              } else {
                return $scope.data.wifi;
              }
            }
          }
        ]
      });
      mypopup.then(function(res) {
        console.log('Tapped', res);
      })
      // $timeout(function() {
      //   mypopup.close();
      // })
    }

    $scope.loading = function() {
      var loading = $ionicLoading.show({
        template: 'loading...',
        noBackdrop: true,
        duration:6000
      })
      $timeout(function() {
        loading.hide()
      }, 5000)
    }

    

    $scope.showAlert = function() {
      var alertpopup = $ionicPopup.alert({
        title: 'dont eat that',
        template: 'ite miigijosfio'
      });
      alertpopup.then(function(res) {
        console.log('thank you for <not></not>')
      })
    }
    
  });
