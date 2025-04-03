Vue.component('fruits-list-title', {
  template: '<h1>フルーツ一覧</h1>'
})

Vue.component('fruits-list-description', {
  template: '<p>季節の代表的なフルーツの一覧です</p>'
})


Vue.component('fruits-list-table', {
  template: `
  <table>
    <tr>
      <th>季節</th>
      <th>フルーツ</th>
    </tr>
    <tr>
      <td>春</td>
      <td>いちご</td>
    </tr>
    <tr>
      <td>夏</td>
      <td>スイカ</td>
    </tr>
    <tr>
      <td>秋</td>
      <td>ぶどう</td>
    </tr>
    <tr>
      <td>冬</td>
      <td>みかん</td>
    </tr>
  </table>
`
})

Vue.component('fruits-item-name', {
  props: {
    fruitsItem: { // テンプレート中ではケバブケース
      type: Object, // オブジェクトかどうか
      required: true // このコンポーネントには必須なのでtrue
    }
  },
  template: '<li>{{fruitsItem.name}}</li>'
})

new Vue({
  el: '#fruits-component',
  data: { // 親では配列だが、v-forでObjectとして渡している
    fruitsItems: [
      {name: '梨'},
      {name: 'いちご'}
    ]
  }
})

new Vue ({
  el: '#fruits-list'
})
