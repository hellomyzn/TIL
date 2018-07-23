window.onload = function(){
  new Vue({
    el: '#app',
    data: {
      ingredients: ['meat', 'fruit', 'cookies'],
      persons: [
        {name: 'Max', age: 27, color: 'red'},
        {name: 'Anna', age: 'unknow', color: 'blue'}
      ]
    }
  });
}
