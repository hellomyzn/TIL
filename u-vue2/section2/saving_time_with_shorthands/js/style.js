window.onload = function(){
  new Vue({
    el:'#app',
    data: {
      link: 'https://google.com'
    },
    methods: {
      changeLink: function(){
        this.link = 'https://apple.com'
      }
    }
  });
}
