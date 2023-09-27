export default {
  data() {
    return {
      events: [],
      isLoading: false,
      start: null,
      end: null
    }
  },
  methods: {
    getPosts() {
      this.isLoading = true
      fetch('https://courses.viel-center.ru/api/events?start='+this.start+'&end='+this.end)
        .then(response => response.json())
        .then(data => {
          this.events = data
          this.isLoading = false
        })
    },
    setDate(){
      let date = new Date();
      this.start = date.toISOString()
      date.setMonth(date.getMonth() + 2);
      this.end = date.toISOString();
    },
    openPopup(ref) {
      this.$parent.$refs[ref].open()
    },
  },
  mounted() {
    this.setDate()
    this.getPosts()
  },
  updated(){

  },
    template: `
    <p class="loading" v-if="isLoading">Загрузка актуальтного расписания...</p>
    <div class="booking-section__menu booking-menu">
      <div v-for="e in events" :key="e.id" class="booking-menu__item">
        <div class="booking-menu__name">
            {{ e.short_title }}
        </div>
        <div class="booking-menu__date">
          {{ e.period }}
        </div>
        <div class="booking-menu__actions">
            <a href="#callback" class="popup_btn booking-menu__btn btn  btn_warning btn_small" @click="openPopup('callback')">
                Забронировать место
            </a>
        </div>
      </div>
    </div>
    `
  }