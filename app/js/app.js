// // Import vendor jQuery plugin example
// import '~/app/libs/mmenu/dist/mmenu.js'
import Swiper from 'swiper'
import { Autoplay, Navigation, Pagination, Parallax } from 'swiper/modules'
import {createApp} from 'vue/dist/vue.esm-browser.js'
import schedule from './components/schedule.js'
import popup from './components/popup.js'
import formWrapper from './components/formWrapper.js'
import countUp from './utils/countUp.js'
import menuToggle from './utils/menuToggle.js'
import stickyHeader from './utils/stickyHeader.js'
import videoSection from './components/videoSection.js';


document.addEventListener('DOMContentLoaded', () => {
	const app = createApp({
		data() {
			return {
			  form: {},
			}
		  },
		components: {
			'schedule': schedule,
			'popup': popup,
			'formwrapper': formWrapper,
			'videosection': videoSection,
		},
		methods: {
			openPopup(ref, params = {}) {
				this.$refs[ref].open(event, params)
			},
		  },
		created() {
		}
	  })
	app.mount('#application')

	menuToggle();
	countUp();
	stickyHeader('header');

	const promo = new Swiper('.promo-slider', {
		modules: [Autoplay, Navigation],
		direction: 'horizontal',
		loop: true,
		slidesPerView: 1,
		autoplay: {
			delay: 3000,
		  },

		navigation: {
		  nextEl: '.promo-slider__next',
		  prevEl: '.promo-slider__prev',
		},
	  
	  });

	  const employee = new Swiper('.employee-slider', {
		modules: [Autoplay, Pagination, Parallax],
		direction: 'horizontal',
		slidesPerView: 3,
		speed: 2400,
		parallax: true,
		loop: false,
		autoplay: {
			delay: 3000,
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
			  },
			900: {
				slidesPerView: 2,
			},
			1200: {
				slidesPerView: 3,
			}
		},
	  
	  });

	  const testimonials = new Swiper('.testimonials-slider', {
		modules: [Autoplay, Navigation, Parallax],
		direction: 'horizontal',
		slidesPerView: 3,
		spaceBetween: 55,
		speed: 2400,
		parallax: true,
		loop: false,
		autoplay: {
			delay: 3000,
		  },
		breakpoints: {
			320: {
				slidesPerView: 1,
				spaceBetween: 40
			  },

			1200: {
				slidesPerView: 3,
			}
		},
	  
		navigation: {
		  nextEl: '.swiper-button-next',
		  prevEl: '.swiper-button-prev',
		},
	  
	  });

})
