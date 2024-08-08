let body = document.querySelector('body');
let modalSubscribe = document.querySelector('.modal-subscribe');
let openModalSubscribe = document.querySelectorAll('.open-modal-subscribe');
let closeModalSubscribe = document.querySelector('.modal-subscribe .modal-close');

if (openModalSubscribe.length>0 && modalSubscribe) {
    openModalSubscribe.forEach(item=> {
        item.addEventListener('click', function () {
            if (!modalSubscribe.classList.contains('active')) {
                modalSubscribe.classList.add('active')
                body.classList.add('overflow-hidden')
            }
        })
    })
    closeModalSubscribe.addEventListener('click', function () {
        if (modalSubscribe.classList.contains('active')) {
            modalSubscribe.classList.remove('active')
            body.classList.remove('overflow-hidden')
        } 
    })
}