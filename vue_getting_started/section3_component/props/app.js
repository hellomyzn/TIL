

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title></title>
    <script src="https://unpkg.com/vue@2.5.17"></script>
  </head>
  <body>
    

    <div id="fruits-component">
      <ol>
        <fruits-item-name v-for="fruit in fruitsItems" :key="fruit.name" :fruits-item="fruit"></fruits-item-name>
      </ol>
    </div>
    
  </body>
  </html>

<script>
  Vue.component('fruits-item-name', {
    props: {
      fruitsItem: {
        type: Object,
        required: true
      }
    },
    template: '<li>{{ fruitsItem.name }}</li>'
  })

  new Vue({
    el: '#fruits-component',
    data: {
      fruitsItems: [
        {name: 'nashi'},
        {name: 'ichigo'},
        {name: 'hoge'}
      ]
    }
  })
</script>




