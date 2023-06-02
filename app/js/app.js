// // Import vendor jQuery plugin example
// import '~/app/libs/mmenu/dist/mmenu.js'
import Swiper, { Autoplay, Navigation, Parallax } from 'swiper';
import { CountUp } from 'countup.js';
import axios from 'axios'
import IMask from 'imask';

Swiper.use([ Parallax, Navigation, Autoplay ])

document.addEventListener('DOMContentLoaded', () => {
	const countUpJS = () => {
		var countEls = document.querySelectorAll('.countUp');
		countEls.forEach((el)=>{
			var value =  parseInt(el.innerHTML.match(/\d+/));
			var countUp = new CountUp(el, value, { enableScrollSpy: true });
			countUp.start();
		});
		
	}
	countUpJS();

	const menuToggle = () => {
		const containers = document.querySelectorAll('.header-navigation');
		containers.forEach((el)=>{
			const toggleBtn =  el.querySelector('.header-navigation__menu-toggle');
			const links = el.querySelectorAll('.header-menu__link');

			const toggle = () => {
				el.classList.toggle("show");
			}

			links.forEach((link)=>{
				link.addEventListener('click', toggle)
			})
			
			toggleBtn.addEventListener('click', toggle)
			
		});
		
	}
	menuToggle();

	const stickyHeader = () => {
		const header = document.querySelector('header');
		const body = document.querySelector('body');
		let offset = header.offsetHeight;
		const sticky = () => {
			if (window.pageYOffset >= offset) {
				header.classList.add("sticky");
				body.style.marginTop = offset +'px';
			} else {
				header.classList.remove("sticky");
				body.style.marginTop = 0;
			}
		}
	
		window.onscroll = sticky;
		
	}
	stickyHeader();

	const popUpInit = (popupSelector, openLinkSelector, overlaySelector) => {
		const popUps = document.querySelectorAll(popupSelector);
		const openPopupBtns = document.querySelectorAll(openLinkSelector);
		const overlay = document.querySelector(overlaySelector);

		const overlayToggle = () => {
			overlay.classList.toggle((overlaySelector+'_active').slice(1))
		}

		const init = (popUp) => {
			const closeBtns = popUp.querySelectorAll('.popup__close');
			const close  = (event) => {
				popUp.classList.remove((popupSelector+'_active').slice(1));
				overlayToggle()
				event.preventDefault();
			}
	
			closeBtns.forEach(element => {
				element.addEventListener('click', close);
			});
		}
		
		const openPopup = (event) => {
			const popupTargetSelector = event.target.attributes.href.nodeValue;
			const targetPopup = document.querySelector(popupTargetSelector);
			const open = (targetPopup) => {
				targetPopup.classList.add((popupSelector+'_active').slice(1));				
			}
			open(targetPopup);
			overlayToggle()
			event.preventDefault();
		}

		popUps.forEach(popup => {
			init(popup)
		})

		openPopupBtns.forEach(element => {
			element.addEventListener('click', openPopup)
		});



	}

	popUpInit('.popup', '.popup_btn', '.popup-background')


	const formHandler = () =>{
		const forms = document.querySelectorAll('form');
		const sendData = ( event ) =>{
			const formData = new FormData(event.target)
			const setMessage = (message) => {
				let messageLabel = event.target.querySelector('.message');
				messageLabel.style.display = 'block';
				messageLabel.innerHTML = message;
			}
			axios({
				method: "post",
				url: "https://courses.viel-center.ru/api/forms",
				data: formData,
				headers: { "Content-Type": "multipart/form-data" },
			  })
				.then(function (response) {
				  //handle success
				  console.log(response.data);
				  setMessage('Отправлено')
				})
				.catch(function (response) {
				  //handle error
				  console.log(response.data);
				  setMessage('Ошибка')
				});
				event.preventDefault()
		}

		forms.forEach(form => {
			form.addEventListener('submit', sendData)
		})
	}

	formHandler()

	const phoneMask = () => {
		const elements = document.querySelectorAll("input[name='phone']");
		const mask = (e) => {
			const maskOptions = {
				mask: '+{7}0000000000'
			};
		
			IMask(e, maskOptions);
		}
		elements.forEach((e) =>mask(e))
	}

	phoneMask()

	// Custom JS
	const promo = new Swiper('.promo-slider', {
		direction: 'horizontal',
		loop: true,
		slidesPerView: 1,
		autoplay: {
			delay: 3000,
		  },

		navigation: {
		  nextEl: '.swiper-button-next',
		  prevEl: '.swiper-button-prev',
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
