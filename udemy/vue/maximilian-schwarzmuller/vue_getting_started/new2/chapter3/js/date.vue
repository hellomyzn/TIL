Vue.component('input-date-with-today', {
  render: function (createElement) {
    return createElement(
      'input',
      {
          attrs: {
            type: 'date',
            value: new Date().toISOString().substring(0,10)
          }
      }
    )
  }
})


new Vue({el: '#app'})
