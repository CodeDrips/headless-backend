import 'jquery';

$(document).ready(() => {

  $('.header__search').click(function(e){
    e.preventDefault();
    $('.search-form').toggleClass('active');
    setTimeout(function(){
      $('.search-form input').focus();
    }, 100)
  });

  $('.header__hamburger').click(function(e){
    e.preventDefault();
    $('.header__hamburger, .off-canvas').toggleClass('active');
  });

  $('.off-canvas .has-dropdown > a').click(function(e){
    e.preventDefault();
    $(this).parent().toggleClass('active');
  });

  $('.header__nav ul li').mouseenter(function(e) {
    //$('.header__nav ul li').removeClass('active');
    $(this).addClass('active');
  });
  $('.header__nav ul li').mouseleave(function(e) {
    setTimeout(() => {
      $(this).removeClass('active');
    }, 300);
  });

})


