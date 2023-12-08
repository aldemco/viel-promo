// // Import vendor jQuery plugin example
// import '~/app/libs/mmenu/dist/mmenu.js'
import Swiper, { Autoplay, Navigation, Pagination, Parallax } from 'swiper';
import {createApp} from 'vue/dist/vue.esm-browser.js'
import schedule from './components/schedule.js'
import popup from './components/popup.js'
import formWrapper from './components/formWrapper.js'
import countUp from './utils/countUp.js'
import menuToggle from './utils/menuToggle.js'
import stickyHeader from './utils/stickyHeader.js'



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
		},
		methods: {
			openPopup(ref) {
				this.$refs[ref].open()
			},
		  },
		created() {
		}
	  })
	app.mount('#application')

	menuToggle();
	countUp();
	stickyHeader('header');

	Swiper.use([ Parallax, Navigation, Autoplay, Pagination ])
	const promo = new Swiper('.promo-slider', {
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
