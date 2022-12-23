const mobileNav = document.querySelector('ul');
const burgerBtn = document.querySelector('.burger');

burgerBtn.addEventListener('click', function(){
    mobileNav.classList.toggle('active');
    burgerBtn.classList.toggle('active');
})