
import axios from 'axios'
export default {
    inheritAttrs: false,
    data() {
      return {
        form: {},
        errors: {},
        isLoading: false,
        isSend: false,
        message: null,
      }
    },
    props: {
        site: String,
        from: String,
        goal: {
          type: String,
          default: 'successform',
        },
        endpoint: {
          type: String,
          default: 'https://courses.viel-center.ru/api/forms',
        },
        method: {
            type: String,
            default: 'POST',
        },
    },
    methods: {
      submit(event) {
        this.isLoading = true
        axios({
            method: this.method,
            url: this.endpoint,
            data: this.form,
            headers: { "Content-Type": "multipart/form-data" },
        }).then(response => {
          if(response.data.status == 'success'){
            this.isSend = true
            this.isLoading = false
            this.message = 'Отправлено' 
            this.sendStatistics()
            this.isSend = true
            this.form = {};
          }
        }).catch(response=>{
          this.isLoading = false
          switch(response.code) {
            case 'ERR_BAD_REQUEST': 
                if(response.response.data.message){
                  this.message = response.response.data.message
                  break
                }
                if(response.response.data.errors){
                  this.errors = response.response.data.errors
                  break
                }
                this.message = 'Ошибка сервера'
                break
  
            case 'ERR_NETWORK':
                this.message = 'Ошибка подключения'
                break
                
            }
        })

        event.preventDefault()
      },
      sendStatistics(){
        const counterId = Number(Object.keys(window.Ya._metrika.counters)[0].slice(0, -2))
        console.log(counterId, this.goal)
        ym(counterId,'reachGoal', this.goal)
        VK.Goal('lead')
      }
    },
    created() {
      this.form.site = this.site
      this.form.from = this.from
    },
    template: `
      <form v-bind:class="{ form_loading: this.isLoading }" :method="this.method" v-bind="$attrs" @submit.prevent="submit">
        <slot :form="form" v-if="this.isSend == false"></slot>
        <div class="popup__form-row">
          <div class="alert" v-if="this.message">{{this.message}}</div>
        </div>
      </form>
      `
}