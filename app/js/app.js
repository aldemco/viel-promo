// // Import vendor jQuery plugin example
// import '~/app/libs/mmenu/dist/mmenu.js'
import Swiper, { Autoplay, Navigation, Parallax } from 'swiper';
import { CountUp } from 'countup.js';
import axios from 'axios'
import IMask from 'imask';
import { Input } from 'postcss';

Swiper.use([ Parallax, Navigation, Autoplay ])

document.addEventListener('DOMContentLoaded', () => {
	const countUpJS = () => {
		var countEls = document.querySelectorAll('.countUp');
		countEls.forEach((el)=>{
			var value =  parseInt(el.innerHTML.match(/\d+/));
			var countUp = new CountUp(el, value, { enableScrollSpy: true, separator: '' });
			countUp.start();
		});
		
	}

	const menuToggle = () => {
		const containers = document.querySelectorAll('.header-navigation');
		containers.forEach((el)=>{
			const toggleBtn =  el.querySelector('.header-navigation__menu-toggle');
			const links = el.querySelectorAll('.header-menu__link');

			const toggle = (event) => {
				el.classList.toggle("show");
				event.preventDefault();
			}

			const toggleLink = (event) => {
				el.classList.toggle("show");
			}

			links.forEach((link)=>{
				link.addEventListener('click', toggleLink)
			})
			
			toggleBtn.addEventListener('click', toggle)
			
		});
		
	}

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

	const popUpInit = (popupSelector, openLinkSelector, overlaySelector) => {
		const popUps = document.querySelectorAll(popupSelector);
		const openPopupBtns = document.querySelectorAll(openLinkSelector);
		const overlay = document.querySelector(overlaySelector);

		const overlayToggle = (event) => {
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
			const popupTargetSelector = event.currentTarget.getAttribute('href');
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
			element.addEventListener('click', openPopup, true)
		});

	}

	const formHandler = () =>{
		const forms = document.querySelectorAll('form');
		const sendData = ( event ) =>{
			const formInputs = event.target.querySelectorAll("[type='text'],textarea")
			const formData = new FormData(event.target)
			const goal = event.target.dataset.goal ?? 'successform'
			const setMessage = (message) => {
				let messageLabel = event.target.querySelector('.message');
				messageLabel.style.display = 'block';
				messageLabel.innerHTML = message;
			}
			const clearInputs = (formInputs) => {
				formInputs.forEach(formInput=>{
					formInput.value = ''
				})
			}
			axios({
				method: "post",
				url: "https://courses.viel-center.ru/api/forms",
				data: formData,
				headers: { "Content-Type": "multipart/form-data" },
			  })
				.then(function (response) {
				  if(response.data.status == 'success'){
					setMessage('Ваше сообщение отправлено')
					let counterId = Number(Object.keys(window.Ya._metrika.counters)[0].slice(0, -2))
					console.log(counterId, goal)
					ym(counterId,'reachGoal', goal)
					clearInputs(formInputs)
					VK.Goal('lead')
				  }

				})
				.catch(function (response) {
				  switch(response.code) {
					case 'ERR_BAD_REQUEST': 
						if(response.response.data.message){
							setMessage(response.response.data.message)
							break
						}
						setMessage('Ошибка сервера')
					 	break

					case 'ERR_NETWORK':
						setMessage('Ошибка, проверьте соединение')
						break
				  
					default:
						break
				  }

				});

				event.preventDefault()
		}

		forms.forEach(form => {
			form.addEventListener('submit', sendData)
		})
	}

	const phoneMask = () => {
		const elements = document.querySelectorAll("input[name='phone']");
		const mask = (e) => {
			const maskOptions = {
				mask: '+{7} (000) 000-00-00'
			};
		
			IMask(e, maskOptions);
		}
		elements.forEach((e) =>mask(e))
	}

	menuToggle();
	countUpJS();
	popUpInit('.popup', '.popup_btn', '.popup-background')
	formHandler()
	phoneMask()
	stickyHeader();

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
