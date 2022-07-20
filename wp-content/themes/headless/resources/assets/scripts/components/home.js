
import 'jquery';

import { wpAjax } from '../utils/misc';

const getArticleCards = function(post_ids, success) {
  wpAjax({
    action: "get_article_card",
    nonce: siteOptions.nonce,
    type: "html",
    post_ids : post_ids,
  }, success)
}

const selectPartner = function (e) {
  e && e.preventDefault && e.preventDefault();
  // Hide last
  $('.our-partners__toggle li, .our-partners__content').removeClass('active')

  let data = $(this).data()
  console.log(data)

  // Show current
  $(this).addClass('active')
  $(`.our-partners #${data.id}`).addClass('active')

  // If already fetched, bail out
  if (data.complete) return false;
  $(this).data('complete', true);

  // Fetch feed data
  let latestUrl = `/wp-json/feed/v1/partner?term_id=${data.termId}`
  let trendingUrl = `/wp-json/feed/v1/trending?tax=partner&cat=${data.termId}`

  $.get(latestUrl, (res) => {
    if (res.success) {
      getArticleCards(res.list, (html) => {
        $(`#${data.id} .our-partners__posts__feed`).append(html);
      });
    }
  })

  $.get(trendingUrl, (res) => {
    if (res.success) {
      getArticleCards(res.list, (html) => {
        $(`#${data.id} .our-partners__trending`).append(html);
      });
    }
  });
}

$(document).ready(() => {

  if (!$('body').hasClass('home')) {
    return;
  }

  // CTA Video 
  if ($('.cta__media-wrapper iframe').length) {
    $('.cta__media-wrapper').click(() => {
      $('.cta__media-wrapper iframe')[0].src += '?autoplay=1';
      $('.cta__media-wrapper').addClass('active');
    });
  }

  // Our Partners Home
  $('.our-partners__toggle li').click(selectPartner);
  selectPartner.bind($('.our-partners__toggle li').first())()
});


