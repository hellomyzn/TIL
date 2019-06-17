var router = new VueRouter({
  routes: [
    {
      path: '/top',
      component: {
        template: '<div>トップページです。</div>'
      }
    },
    {
      path: '/users',
      component: {
        template: '<div>ユーザー一覧ページです。</div>'
      }
    },
    {
      // コロンで始まるパターンマッチング
      path: '/user/:userId',
      component: {
        template: '<div>ユーザーIDは {{ $route.params.userId }}です。</div>'
      }
    },
    	// 名前付きルート
    {
      path: '/user/:userId',
      name: 'user',
      component: {
        template: '<div>ユーザーIDは {{ $route.params.userId }}です。 </div>'
      }
    }
  ]
})

// ルーターのインスタンスをrootとなるVueインスタンスに渡す
var app = new Vue({
  router: router
}).$mount('#app')
