
import 'jquery';

$(document).ready(() => {

  $('.dashboard__sidebar--account li.active').click(function(e){
    if ($(window).width() < 900) {
      e.preventDefault();
      $('.dashboard__nav').hide();
      $('.dashboard__mobile-nav, .dashboard__edit-profile').show();
    }
  });

  $('.dashboard__switch').click(function(e){
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
        $this.toggleClass('off');
      }
    });
  });

  $('.dashboard__body .brands__item li a').click(function(e){
    e.preventDefault();
    let $this = $(this),
      brand = $this.attr('data-brand'),
      user_id = $this.attr('data-user-id');
    $.ajax({
      type: 'POST',
      dataType: 'html',
      url: window.siteOptions.ajaxurl,
      data: {
        action: 'tt_favourite_brands',
        user_id: user_id,
        brand: brand
      },
      success: function(data) {
        $this.toggleClass('active');
      }
    });
  });

});
