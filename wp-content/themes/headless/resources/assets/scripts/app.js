/**
 * External Dependencies
 */
import 'jquery';
import AOS from 'aos';

import { wpAjax } from './utils/misc';
import './components/clock';
import './components/header';
import './components/home';
import './components/dashboard';
import './components/article';
import './components/archive';

$(document).ready(() => {

  document.addEventListener('scroll', function() {
    $('.header').toggleClass('header--scroll', window.scrollY > 0);
  });

  AOS.init({
    duration: 1000, // values from 0 to 3000, with step 50ms
    delay: 0,
    offset: 40,
  });

  $('.popup__close, .popup__buttons a:last-of-type').click(function(e){
    e.preventDefault();
    localStorage.setItem('popup', 1);
    $('.popup').fadeOut();
  });

  let popup = localStorage.getItem('popup');

  if (popup === null) {
    setTimeout(function(){
      $('.popup').fadeIn();
    }, 4000)
  }

  $('.btn--in-brief').click(function(e){
    e.preventDefault();
    let title = $(this).attr('data-title');
    $('.enquire__post').text(title);
    $('.enquire').fadeIn();
  });

  $('.enquire__close').click(function(e){
    e.preventDefault();
    $('.enquire').fadeOut();
  });

  $('.partner-dropdown__current').click(function(e){
    e.preventDefault();
    $(this).toggleClass('active');
    $('.partner-dropdown ul').slideToggle();
  });

  $('.article__save').click(function(e){
    e.preventDefault();
    let $this = $(this),
      post_id = $this.attr('data-post-id'),
      user_id = $this.attr('data-user-id');
    $.ajax({
      type: 'POST',
      dataType: 'html',
      url: window.siteOptions.ajaxurl,
      data: {
        action: 'tt_save_article',
        user_id: user_id,
        post_id: post_id
      },
      success: function(data) {
        $this.toggleClass('active');
      }
    });
  });

  $('.btn--email-login').click(function(e){
    e.preventDefault();
    $('.registration__email').slideToggle();
    setTimeout(function(){
      $('.registration__email input[type="text"').focus();
    }, 100)
  });

  if ( $('.registration .validation_message').length > 0 ) {
    $('.btn--email-login').click();
  }

  window.addEventListener('load', AOS.refresh)

});
