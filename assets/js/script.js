//бургер-меню
function toggleNavbar() {
    const overlay = document.getElementById("overlay");
    const panel = document.getElementById("panel");
    overlay.style.display = "block";
    panel.style.display = "block";
}

function closeNavbar() {
    const overlay = document.getElementById("overlay");
    const panel = document.getElementById("panel");
    overlay.style.display = "none";
    panel.style.display = "none";
}
//смена цвета svg
var defaultFillColor = "#000";
var defaultMobileFillColor = "#DEDEDE";
var defaultToolFillColor = "#898989";
var hoverFillColor = "#FF3A3A";
var defaultStrokeColor = "#000";
var hoverStrokeColor = "#FF3A3A";

function changeSvgStroke(element) {
    element.style.stroke = hoverStrokeColor;
}

function restoreSvgStroke(element) {
    element.style.stroke = defaultStrokeColor;
}

function changeSvgColors(element) {
    element.style.fill = hoverFillColor;
}

function restoreToolSvgColors(element) {
    element.style.fill = defaultToolFillColor;
}

function restoreSvgColors(element) {
    element.style.fill = defaultFillColor;
}

function restoreMobileSvgColors(element) {
    element.style.fill = defaultMobileFillColor;
}
//всплывающая подсказка у аккаунта
const accountIcon = document.querySelector('.account-icon');
const accountTooltip = document.querySelector('.account-tooltip');


accountIcon.addEventListener('click', function() {
    if (accountTooltip.style.display === 'block') {
        accountTooltip.style.display = 'none';
    } else {
        accountTooltip.style.display = 'block';
    }
});

document.addEventListener('click', function(event) {
    const isClickInsideAccountIcon = accountIcon.contains(event.target);
    const isClickInsideAccountTooltip = accountTooltip.contains(event.target);

    if (!isClickInsideAccountIcon && !isClickInsideAccountTooltip) {
        accountTooltip.style.display = 'none';
    }
});

//модальное окно




document.querySelector(".close-icon").addEventListener("click", function() {
    document.querySelector(".modal-contact").style.display = "none";
});

document.querySelector(".contact").addEventListener("click", function() {
    document.querySelector(".modal-contact").style.display = "block";
});



//свайпер
var swiper = new Swiper(".swiper", {
    slidesPerView: 1,
  loop: true,
  pagination: {
    el: '.swiper-pagination',
  },
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
});