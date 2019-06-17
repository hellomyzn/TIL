// JSONを返す関数
// この関数を用いて義人的web API経由で情報を取得したようにする。
var getUsers = function(callback){
  setTimeout(function(){
    callback(null, [
      {
        id: 1,
        name: 'Takuya Tejima'
      },
      {
        id: 2,
        name: 'Yohei Noda'
      }
    ])
  }, 1000)
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


// 擬似的にAPI経由で情報を取得したようにする
var getUser = function(userId, callback){
  setTimeout(function(){
    var filteredUsers = userData.filter(function(user){
      return user.id === parseInt(userId, 10)
    })
    callback(null, filteredUsers && filteredUsers[0])
  }, 1000)
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
      component: UserCreate
    },
    { // ルート定義の追加
      path: '/users/:userId',
      component: UserDetail
    }
  ]
})

var app = new Vue({
  router: router
}).$mount('#app')
