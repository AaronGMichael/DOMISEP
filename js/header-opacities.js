window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
        document.querySelector('.header-left').style.opacity = 0;
        document.querySelector('.header').style.opacity = 0.3;
    } else {
        document.querySelector('.header-left').style.opacity = 1;
        document.querySelector('.header').style.opacity = 1;
    }
});

document.querySelector('.header').addEventListener("mouseover", function () {
  this.style.opacity = 1;
})

document.querySelector('.header').addEventListener("mouseleave", function () {
  if (window.scrollY > 50) this.style.opacity = 0.3;
})