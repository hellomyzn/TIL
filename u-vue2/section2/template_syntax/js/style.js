console.log("hoge");


window.onload = function(){
  new Vue({
    el:'#app',
    data: {
      title:'Hello world!'
    },
    methods: {
      sayHello: function(){
        return 'Hello!!!';
      }
    }
  });
}
