
      var userData = [
        {
          id: 1,
          name: 'Takuya Tejima',
          description: '東南アジアで働くエンジニアです。'
        },
        {
          id: 2,
          name: 'Yohei Noda',
          description: 'アウトドア、フットサルが趣味のエンジニアです。'
        }
      ]

      var getUser = function (userId, callback){
        setTimeout(function() {
          var filteredUsers = userData.filter(function(user){
            return user.id === parseInt(userId, 10)
          })
          callback(null, filteredUsers && filteredUsers[0])
        }, 1000)
      }


      var UserDetail = {
        template: '#user-detail',
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
          '$route' : 'fetchData'
        },

        methods: {
          fetchData: function(){
            this.loading = true
            getUser(this.$route.params.userId, (function (err, user){
              this.loading = false
              if(err){
                this.error = err.toString()
              } else {
                this.user = user
              }
            }).bind(this))
          }
        }
      }


