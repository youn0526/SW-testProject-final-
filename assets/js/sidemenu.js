var menuBtn = document.querySelector('.menu-btn');
var nav = document.querySelector('menu');
var lineOne = document.querySelector('menu .menu-btn .line--1');
var lineTwo = document.querySelector('menu .menu-btn .line--2');
var lineThree = document.querySelector('menu .menu-btn .line--3');
var link = document.querySelector('menu .nav-links');
menuBtn.addEventListener('click', () => {
    nav.classList.toggle('nav-open');
    lineOne.classList.toggle('line-cross');
    lineTwo.classList.toggle('line-fade-out');
    lineThree.classList.toggle('line-cross');
    link.classList.toggle('fade-in');
})