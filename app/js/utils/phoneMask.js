import IMask from 'imask';

export default function(input = "input[name='phone']", maskExpression = '+{7} (000) 000-00-00'){
    const elements = document.querySelectorAll(input);
    const mask = (e) => {
        const maskOptions = {
            mask: maskExpression
        };

        IMask(e, maskOptions);
    }
    elements.forEach((e) =>mask(e))
}