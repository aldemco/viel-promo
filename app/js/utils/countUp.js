
import { CountUp } from 'countup.js';

export default function() {
    var countEls = document.querySelectorAll('.countUp');
    countEls.forEach((el)=>{
        var value =  parseInt(el.innerHTML.match(/\d+/));
        var countUp = new CountUp(el, value, { enableScrollSpy: true, separator: '' });
        countUp.start();
    });
    
}