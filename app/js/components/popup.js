

export default {
  inheritAttrs: false,
  data() {
    return {
      isOpen: false,
    }
  },
  methods: {
    open() {
        this.isOpen = true
    },
    close(){
        this.isOpen = false
    }
  },
    template: `
    <div v-if="isOpen" @click="close" class="popup-background"></div>
    <div v-if="isOpen" v-bind="$attrs" class="popup">
        <div class="popup__top-bar">
            <a class="popup__close" href="#" @click="close"> <img src="images/close.svg" alt="close"></a>
        </div>
        <div class="popup__body">
             <slot></slot> 
        </div>
    </div>
    `
  }