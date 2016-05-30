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
  .controller('highRecommand', function($scope) {})
  .controller('ranking', function($scope, $stateParams, $ionicModal) {
    $ionicModal.fromTemplateUrl('rankTpl.html', {
      scope: $scope,
      animate: 'slide-in-up'
    }).then(function(modal){
      $scope.modal = modal;
    })

    $scope.openModal = function() {
      $scope.modal.show()
    }
    $scope.closeModal = function() {
      $scope.modal.hide();
    }
    $scope.tplItems = [
      {
        'hasparent': true,
        'child': {'link': '#/tab/ranking/children', 'name': 'has not p'},
      },
      {
        'hasparent': true,
        'child': {'name': '所有类别', 'link': '#/tab/ranking/allsort'},
      },
      {
        'hasparent': false,
        'child': {
          'name': '儿童',
          'subChild': [
            {'name': 'sfio'},
            {'name': 'sfio'},
            {'name': 'sfio'}
          ]},
      },
      {
        'hasparent': false,
        'child': {'name': '教育', 'link': '#/tab/ranking/education'},
      },
      {
        'hasparent': false,
        'child': {'name': '购物', 'link': '#/tab/ranking/shopping'},
      },
      {
        'hasparent': false,
        'child': {'name': '摄影与录像'},
      },
      {
        'hasparent': false,
        'child': {'name': '效率'},
      },
      {
        'hasparent': false,
        'child': {'name': '美食佳饮'},
      },
      {
        'hasparent': false,
        'child': {'name': '生活'},
      },
      {
        'hasparent': false,
        'child': {'name': '健康健美'},
      },
      {
        'hasparent': false,
        'child': {'name': '旅游'},
      },
      {
        'hasparent': false,
        'child': {'name': '音乐'},
      },
      {
        'hasparent': false,
        'child': {'name': '体育'},
      },
      {
        'hasparent': false,
        'child': {'name': '商务'},
      },
      {
        'hasparent': false,
        'child': {'name': '新闻'},
      },
      {
        'hasparent': false,
        'child': {'name': '工具'},
      },
      {
        'hasparent': false,
        'child': {'name': '娱乐'},
      },
      {
        'hasparent': false,
        'child': {'name': '社交'},
      },
      {
        'hasparent': false,
        'child': {'name': '报刊杂志'},
      },
      {
        'hasparent': false,
        'child': {'name': '财务'},
      },
      {
        'hasparent': false,
        'child': {'name': '参考'},
      },
      {
        'hasparent': false,
        'child': {'name': '导航'},
      },
      {
        'hasparent': false,
        'child': {'name': '医疗'},
      },
      {
        'hasparent': false,
        'child': {'name': '读书'},
      },
      {
        'hasparent': false,
        'child': {'name': '天气'},
      },
      {
        'hasparent': false,
        'child': {'name': '商品指南'},
      },

    ];
    switch($stateParams.sort){
      case 'children':
        $scope.items = [
          {
            'title': 'china',
            'subtitle': 'lohas乐活',
            'link': '',
            'tag': '生活 free rank top 健康',
            'img': 'http://placehold.it/200x200',
            'rank': '100'
          },
          {
            'title': 'enghlist',
            'subtitle': 'lohas乐活',
            'link': '',
            'tag': ['生活', 'free', ' rank',' top',' 健康'],
            'img': 'http://placehold.it/200x200',
            'rank': '100'
          },
          {
            'title': 'sfsf healthy somethingss',
            'subtitle': 'lohas乐活',
            'link': '',
            'tag': ['生活',' free',' rank',' something',' healthy',' 健康'],
            'img': 'http://placehold.it/200x200',
            'rank': '100',
          },
          {
            'title': 'lohas乐2323232活',
            'subtitle': 'lohas乐活',
            'link': '',
            'tag': '生活 free rank top 健康',
            'img': 'http://placehold.it/200x200',
            'rank': '100'
          },
          {
            'title': 'lohas42423525434乐活',
            'subtitle': 'lohas乐活',
            'link': '',
            'tag': '生活 free rank top 健康',
            'img': 'http://placehold.it/200x200',
            'rank': '100'
          },
        ];
        break;
      case 'shopping':
        $scope.items = [
          {
            'title': '玩具熊',
            'subtitle': '商场里的文具熊都没那么熊。。',
            'link': '',
            'tag': '生活 free rank top 健康',
            'img': 'http://placehold.it/200x200',
            'rank': '100'
          },
        ]
    };

    $scope.select = function(str) {

      $scope.rank = str;
      $scope.rankStyle="button-dark"
      $scope.unRank = 'button-stable';
      $scope.$watch($scope.rank, function(z) {
        $scope.isActive = true;
      });

    } 
    
    // $scope.items = [
    //   {
    //     'title': 'lohas乐活',
    //     'subtitle': 'lohas乐活',
    //     'link': '',
    //     'tag': '生活 free rank top 健康',
    //     'img': 'http://placehold.it/200x200',
    //     'rank': '100'
    //   },
    //   {
    //     'title': 'lohas乐活',
    //     'subtitle': 'lohas乐活',
    //     'link': '',
    //     'tag': '生活 free rank top 健康',
    //     'img': 'http://placehold.it/200x200',
    //     'rank': '100'
    //   },
    //   {
    //     'title': 'lohas乐活lohas乐活lohas乐活lohas乐活lohas乐活lohas乐活',
    //     'subtitle': 'lohas乐活',
    //     'link': '',
    //     'tag': '生活 free rank top 健康',
    //     'img': 'http://placehold.it/200x200',
    //     'rank': '100'
    //   },

    // ]
  }) 

  .controller('imageSelected', function($scope) {
   hljs.initHighlightingOnLoad();

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
    
  })
 