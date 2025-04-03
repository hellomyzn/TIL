window.onload = function(){
  new Vue({
    el:'#app',
    data: {
      title:'Hello world!',
      link: 'https://google.com'
    },
    methods: {
      sayHello: function(){
        return this.title;
      }
    }
  });
}
