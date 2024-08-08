import {getCookie, removeCookieValue, setCookie} from './functions';

let saveItem = document.querySelectorAll('.save-item');
let saveCount = document.querySelector('.save-count');

if (saveItem.length > 0 && saveCount) {
    saveItem.forEach(e => {
        e.addEventListener('click', function () {
            let id = this.dataset.id;
            let cookie = getCookie('save');
            if (!this.classList.contains('added')) {
                this.classList.add('added')
                setCookie('save', id)
            } else { 
                this.classList.remove('added');
                removeCookieValue('save', id)
            }
            setSaveCount()
        })
    })
}
if ( saveCount) {
    setSaveCount();
}


function setSaveCount() {
    let cookie = getCookie('save');
    if(cookie){
        const stringToNumberArray = cookie.split(',').map(number => parseInt(number.trim(), 10)).filter(number => !isNaN(number));
        if( stringToNumberArray.length > 0){
            saveCount.textContent = stringToNumberArray.length;
            saveCount.classList.remove('!hidden');
        } else {
            if(!saveCount.classList.contains('!hidden')){
                saveCount.classList.add('!hidden');
            }
        }
    }

}

document.querySelectorAll('.stories-fillter input[type=checkbox]').forEach(function(checkbox) {
  checkbox.addEventListener('click', function() {
     document.querySelector(".stories-fillter").submit();
  }); 
}); 
