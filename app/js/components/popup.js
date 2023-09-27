

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
            <a class="popup__close" href="#" @click="close"> 
              <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M31 2L2 31" stroke="#7CA950" stroke-width="3" stroke-linecap="round"/>
                <path d="M2 2L31 31" stroke="#7CA950" stroke-width="3" stroke-linecap="round"/>
              </svg>
            </a>
        </div>
        <div class="popup__body">
             <slot></slot> 
        </div>
    </div>
    `
  }