// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js
angular.module('starter', ['ionic', 'starter.controllers', 'starter.services'])

.run(function($ionicPlatform) {
  console.log(hljs)
  hljs.initHighlightingOnLoad();
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);

    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
  });
})

.config(function($stateProvider, $urlRouterProvider) {

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider

  // setup an abstract state for the tabs directive
  .state('tab', {
    url: '/tab',
    abstract: true,
    templateUrl: 'templates/tabs.html'
  })

  // Each tab has its own nav history stack:

  .state('tab.dash', {
    url: '/dash',
    views: {
      'tab-dash': {
        templateUrl: 'templates/tab-dash.html',
        controller: 'DashCtrl'
      }
    }
  })

  .state('tab.chats', {
      url: '/chats',
      views: {
        'tab-chats': {
          templateUrl: 'templates/tab-chats.html',
          controller: 'ChatsCtrl'
        }
      }
    })
    .state('tab.chat-detail', {
      url: '/chats/:chatId',
      views: {
        'tab-chats': {
          templateUrl: 'templates/chat-detail.html',
          controller: 'ChatDetailCtrl'
        }
      }
    })
    .state('tab.nottest', {
    url: '/nottest', 
    views: {
      'tab-chats': {
        templateUrl: 'templates/nottesting.html',
        controller: 'testing'
      }
    }
  })

  .state('tab.account', {
    url: '/account',
    views: {
      'tab-account': {
        templateUrl: 'templates/tab-account.html',
        controller: 'AccountCtrl'
      }
    }
  })

  .state('tab.testing', {
    url: '/testing',
    views: {
      'testing': {
        templateUrl: 'templates/testing.html',
        controller: 'testing'
      }
    }
  })

  .state('tab.imageYear', {
    url: '/imageYear',
    views: {
      'tab-imageYear': {
        templateUrl: 'templates/imageYear.html',
        controller: 'imageYear'
      }
    }
  })

  .state('tab.imageSelected', {
    url: '/imageSelected',
    views: {
      'tab-imageYear': {
        templateUrl: 'templates/imageSelected.html',
        controller: 'imageSelected'
      }
    }
  })

  .state('tab.imageMoment', {
    url: '/imageMoment',
    views: {
      'tab-imageYear': {
        templateUrl: 'templates/imageMoment.html',
        controller: 'imageSelected'
      }
    }
  })

  .state('tab.highRecommand', {
    url: '/highRecommand',
    views: {
      'tab-highRecommand': {
        templateUrl: 'templates/highRecommand.html',
        controller: 'highRecommand'
      }
    }
  })

  .state('tab.ranking', {
    url: '/ranking',
    views: {
      'tab-ranking': {
        templateUrl: 'templates/ranking.html',
        controller: 'ranking'
      }

    }
  })

  .state('tab.ranking1', {
    url: '/ranking1',
    views: {
      'tab-ranking': {
        templateUrl: 'rankTpl.html',
        controller: 'rankTpl'
      }
    }
  })

  

  // .state('tab.nottest', {
  //   url: '/nottest',
  //   // templateUrl: 'templates/nottesting.html',
  //   // controller: 'testing'
  //   views: {
  //     'tab-nottest': {
  //       templateUrl: 'templates/nottesting.html',
  //       controller: 'testing'
  //     }
  //   }
  // })


  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/tab/dash');

});
