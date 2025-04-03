
      var getUsers = function (callback){
        setTimeout(function() {
          callback(null, userData)
         }, 1000)
       }

      var UserList = {
        template: '#user-list',
        data: function() {
          return {
            loading: false,
            users: function() {return []},
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

            getUsers((function(err, users){
              this.loading = false
              if(err){
                this.error = err.toString()
              } else {
                this.users = users
              }
            }).bind(this))
          }
        }
      }

