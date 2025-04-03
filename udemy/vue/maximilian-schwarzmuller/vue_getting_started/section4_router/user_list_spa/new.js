var postUser = function(params, callback){
  setTimeout(function(){
    params.id = userData.length + 1
    userData.push(params)
    callback(null, params)
  }, 1000)
}

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
      return {
        name: '',
        description: ''
      }
    },

    createUser: function(){
      if(this.user.name.trim() === ''){
        this.error = 'Nameは必須です'
        return 
      }
      if(this.user.description.trim() === ''){
        this.error = 'Descriptionは必須です'
        return
      }
      postUser(this.user, (function (err,user){
        this.sending = false
        if(err){
          this.error = err.toString()
        } else {
          this.error = null
          this.user = this.defaultUser()
          alert('新規ユーザが登録されました')
          this.$router.push('/users')
        }
      }).bind(this))
    }
  }
}
