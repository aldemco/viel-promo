
import axios from 'axios'

export default function(options = {
    method:'POST',
    url:'https://courses.viel-center.ru/api/forms',
    formSelector:"form[method='POST']",
    clearInputsSelector:"[type='text'],textarea",
}){
    const forms = document.querySelectorAll(options.formSelector);
    const sendData = ( event ) =>{
        const formInputs = event.target.querySelectorAll(options.clearInputsSelector)
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
            method: options.method,
            url: options.url,
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

