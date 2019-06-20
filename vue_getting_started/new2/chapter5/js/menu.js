var PullDownMenu ={
  data: function(){
    return {
      isShown: false,
      name: 'メニュー',
      items: [
        '1-1',
        '1-2',
        '1-3'
      ]
    }
  },
  template: `
    <div @mouseleave="isShown=false">
      <p @mouseover="isShown=true"><a href="#" class="menu">{{ name }}</a></p>
      <transition
        @before-enter="beforeEnter"
        @enter="enter"
        @leave="leave"
        :css="false"
      >

      </transition>
    </div>
  `
}
