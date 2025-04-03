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
      Auth.login(this.email, this.pass, (function (loggedIn){
        if(!loggedIn){
          this.error = true
        } else{
          this.$router.replace(this.$route.query.redirect || '/')
        }
      }).bind(this))
    }
  }
}
