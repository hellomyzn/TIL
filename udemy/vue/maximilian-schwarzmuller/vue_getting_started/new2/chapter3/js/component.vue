var headerTemplate = `
  <div style="color: red;">
    <slot name="header">*親から何も帰ってこない場合、この文章が表示される</slot>
  </div>
`
var headerTemplate2 = `
  <div>
    <slot name="header2">No Title</slot>
  </div>
`


var contentTemplate = `
  <div>
    <slot name="content">No Title</slot>
  </div>
`



Vue.component('page-header', {
  template: headerTemplate
})

Vue.component('page-header2', {
  template: headerTemplate2
})

Vue.component('page-content', {
  template: contentTemplate
})

new Vue({
  el: '#fruits-list2'
})

new Vue({
  el: "#fruits-list"
})
