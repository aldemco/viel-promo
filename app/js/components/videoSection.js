export default {
  props: {
    placement: {
      type: [String, Array],
      default: 'ucheba'
    },
    provider: {
      type: String,
      default: null
    },
    perPage: {
      type: Number,
      default: 3
    }
  },
  data() {
    return {
      videos: [],
      isLoading: false,
      error: null
    }
  },
  methods: {
    getVideos() {
      this.isLoading = true
      this.error = null

      let url = 'https://courses.viel-center.ru/api/videos?per_page=' + this.perPage

      if (this.placement) {
        const placements = Array.isArray(this.placement)
          ? this.placement
          : [this.placement]

        placements.forEach(p => {
          url += '&placement[]=' + encodeURIComponent(p)
        })
      }

      if (this.provider) {
        url += '&provider=' + encodeURIComponent(this.provider)
      }

      fetch(url, { headers: { Accept: 'application/json' } })
        .then(response => {
          if (!response.ok) {
            throw new Error('Ошибка загрузки: ' + response.status)
          }
          return response.json()
        })
        .then(data => {
          // API отдаёт пагинатор: { data: [...] }
          this.videos = Array.isArray(data) ? data : (data.data || [])
          this.isLoading = false
        })
        .catch(e => {
          this.error = e.message || 'Не удалось загрузить видео'
          this.isLoading = false
        })
    }
  },
  mounted() {
    this.getVideos()
  },
  template: `
    <p class="loading" v-if="isLoading">Загрузка видео...</p>

    <p class="error" v-else-if="error">{{ error }}</p>

    <p class="empty" v-else-if="!videos.length">Видео пока нет</p>

    <div class="video-section__videos" v-else>
      <div v-for="v in videos" :key="v.id" class="video-section__video">
        <div style="position: relative; padding-top: 56.25%; width: 100%">
          <iframe
            :src="v.embed_url"
            :title="v.title"
            allow="autoplay; fullscreen; picture-in-picture; encrypted-media; gyroscope; accelerometer; clipboard-write; screen-wake-lock;"
            frameborder="0"
            allowfullscreen
            loading="lazy"
          ></iframe>
        </div>
      </div>
    </div>
  `
}