window.onload = function(){

  new Vue({
          el: '#exercise',
          data: {
              value: ''
          },
          methods: {
            aleartMe: function(){
              alert('Alert');
            },
            value_change: function(event){
              this.value = event.target.value;
            }
          }
  });
}

