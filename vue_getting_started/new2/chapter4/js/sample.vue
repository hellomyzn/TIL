var Auth = {
  login: function(email, pass, cd){
    // ダミーデータを使った擬似ログイン
    setTimeout(function(){
      if(email === 'vue@example.com' && pass === 'vue'){
        // ログイン成功時はローカルストレージにtokenを保存する
        localStorage.token = Math.random().toString(36).substring(7)
        if(cd){cd(true)}
      }else{
        if(cd){cd(false)}
      }
    }, 0)
  },
  logout: function(){
    delete localStorage.token
  },

  loggedIn: function(){
    // ローカルストレージにtokenがあればログイン状態とみなす
    return !!localStorage.token
  }
}


// ダミーデータの定義、本来はデータベースの情報をAPI経由で取得
var userData = [
  {
    id: 1,
    name: 'Takuya Tejima',
    description: '東南アジアで働くエンジニアです。'
  },
  {
    id: 2,
    name: 'Yohei Noda',
    description: 'アウトドア、フットサルが趣味のエンジニアです'
  }
]




// JSONを返す関数
// この関数を用いて義人的web API経由で情報を取得したようにする。
var getUsers = function(callback){
  setTimeout(function(){
    callback(null, userData)
  }, 1000)
}


// 擬似的にAPI経由で情報を取得したようにする
var getUser = function(userId, callback){
  setTimeout(function(){
    var filteredUsers = userData.filter(function(user){
      return user.id === parseInt(userId, 10)
    })
    callback(null, filteredUsers && filteredUsers[0])
  }, 1000)
}



// 擬似的にAPI経由で情報を更新したようにする
// 実際のWebアプリケーションではServerへPOSTリクエストを行う
var postUser = function (params, callback){
  setTimeout(function(){
    // idは追加されるごとに自動的にicrementされていく
    params.id = userData.length + 1
    userData.push(params)
    callback(null, params)
  }, 1000)
}





// ログインコンポーネント
var Login = {
  template: '#login',
  data: function(){
    return {
      email: 'vue@example.com',
      pass: '',
      error: false
    }
  },
  methods: {
    login: function(){
      Auth.login(this.email, this.pass, (function(loggedIn){
        if(!loggedIn){
          this.error = true
        }else{
          // redirect パラメーターが付いている場合はそのパスに遷移
          this.$router.replace(this.$route.query.redirect || '/')
        }
      }), bind(this))
    }
  }
}




// UserListの改修
var UserList = {
  // HTML上のscriptタグのidを指定する
  template: '#user-list',
  data: function(){
    return {
      loading: false,
      users: function(){return []}, // 初期値の空配列
      error: null
    }
  },
  // 初期化時にデータ取得する
  created: function(){
    this.fetchData()
  },

  // $routeの変更をwatchすることでルーティングが変更された時に再度データを取得
  watch: {
    '$route': 'fetchData'
  },
  methods: {
    fetchData: function(){
      this.loading = true
      // 取得したデータの結果をusersに格納する
      // Function.prototype.bindはthisのスコープを渡すために利用
      getUsers((function(err, users){
        this.loading = false
        if(err){
          this.error = err.toString()
        }else{
          this.users = users
        }
      }).bind(this))
    }
  }
}








// 詳細ページのコンポーネント
var UserDetail = {
  template: '#user-detail',
  // 初期値のセット
  data: function(){
    return {
      loading: false,
      user: null,
      error: null
    }
  },
  created: function(){
    this.fetchData()
  },

  watch: {
    '$route': 'fetchData'
  },

  methods: {
    fetchData: function(){
      this.loading = true
      // this.$route.params.userIdに現在のURL上のパラメータに対応したuserIdが格納される
      getUser(this.$route.params.userId, (function (err, user){
        this.laoding = false
        if(err) {
          this.error = err.toString()
        } else{
          this.user = user
        }
      }).bind(this))
    }
  }
}






// 新規ユーザー作成コンポーネント
var UserCreate = {
  template: '#user-create',
  data: function(){
    return {
      sending: false,
      user: this.defaultUser(),
      error: null
    }
  },

  created: function(){

  },

  methods: {
    defaultUser: function(){
      return{
        name: '',
        description: ''
      }
    },

    createUser: function(){
      //入力パラメーターバリデーション
      if(this.user.name.trim() === ''){
        this.error = 'Nameは必須です'
        return
      }
      if(this.user.description.trim() == ''){
        this.error = 'Descriptionは必須です'
        return
      }
      postUser(this.user, (function(err, user){
        this.sending = false
        if(err){
          this.error = err.toString()
        } else{
          this.error  = null
          //デフォルトでフォームをリセット
          this.user = this.defaultUser()
          alert('新規ユーザーが登録されました')
          // ユーザー一覧ページに戻る
          this.$router.push('/users')
        }
      }).bind(this))
    }
  }
}






var User = {
  template:
    '<div class="user">' +
      '<h2>ユーザーIDは {{ $route.params.userId }}です。</h2>' +
      '<router-link :to="\'/user/\' + $route.params.userId + \'/profile\' ">ユーザーのプロフィールページを見る</router-link>' +
      '<router-link :to="\'/user/\' + $route.params.userId + \'/posts\' ">ユーザーの投稿ページを見る</router-link>' +
      '<router-view></router-view>' +
    '</div>'
}





// ユーザー詳細ページ内で部分的に表示されるユーザー投稿ページ
var UserProfile = {
template:
'<div class="user-profile">' +
  '<h3>こちらユーザー {{ $route.params.userId }}のプロフィールページです</h3>' +
'</div>'
}



var UserPosts = {
template:
  '<div class="user-posts">' +
    '<h3>こちらはユーザー {{ $route.params.userId }} の投稿ページです </h3>' +
  '</div>'

}








var router = new VueRouter({
  routes: [
    {
      path: '/top',
      component: {
        template: '<div>トップページです</div>'
      }
    },
    {
      path: '/users',
      component: UserList
    },
    { // ルート定義を追加
      path: '/users/new',
      component: UserCreate,
      beforeEnter: function(to, from, next){
        // 承認されていない状態でアクセスした時はloginページに遷移する
        if(!Auth.loggedIn()){
          next({
            path: '/login',
            query: {
              redirect: to.fullPath
            }
          })
        }else{
          // 承認済みであればそのまま新規ユーザー作成ページに進む
          next()
        }
      }
    },
    { // ルート定義の追加
      path: '/users/:userId',
      component: UserDetail
    },
    {
      path: '/login',
      component: Login
    },
    {
      path: '/logout',
      beforeEnter: function(to, from, next){
        Auth.logout()
        next('/')
      }
    },
    {
      // 定義されていないパスへの対応、トップページへのリダイレクト
      path: '*',
      redirect: '/top'
    },
    {
      path: '/user/:userId',
      name: '/user',
      component: User,
      children: [
       {
         // /user/:userId/profileがマッチした時に
         // UserProfileコンポーネントはUserコンポーネントの<router-view>内部でレンダリングされます。
         path: 'profile',
         component: UserProfile
       },
       {
         // /user/:userId/postsがマッチした時に
         // UserPostsコンポーネントはUserコンポーネントの<router-view>内部でレンダリングされる
         path: 'posts',
         component: UserPosts
       }
      ]
    }
  ]
})

var app = new Vue({
  data: {
    Auth: Auth
  },
  router: router
}).$mount('#app')
