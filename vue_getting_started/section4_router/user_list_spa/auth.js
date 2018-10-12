var Auth = {
  login: function (email, pass, cd){
    setTimeout(function(){
      if(email === 'vue@example.com' && pass ==='vue'){
        localStorage.token = Math.random().toString(36).substring(7)
        if(cd){cd(true)}
      } else {
        if(cd){cd(false)}
      }
    }, 0)
  },

  logout: function(){
    delete localStorage.token
  },
  loggedIn: function(){
    return !!localStorage.token
  }
}
