import 'jquery';

import { wpAjax } from '../utils/misc';

const feeds = {
  latest: {},
  popular: {},
  trending: {},
}

const getArticleCards = function(post_ids, success) {
  wpAjax({
    action: "get_article_card",
    nonce: siteOptions.nonce,
    type: "html",
    post_ids : post_ids,
  }, success)
}

/*!
 * type Endpoint
 * page Int
 * extra Params
 * success Callback
 */
const getFeed = function(type, page, extra, success) {
  if (typeof feeds[type][page] !== 'undefined') {
    return success(feeds[type][page])
  }
  let url = `/wp-json/feed/v1/${type}?page=${page}`

  if (extra) {
    for (let k in extra) {
      url += `&${k}=${extra[k]}`
    }
  }

  $.get(url, (data) => {
    if (data.success) {
      getArticleCards(data.list, (response) => {
        feeds[type][page] = response
        success(response)
      });
    }
  })
}

$(document).ready(() => {

  if ($('.archive__posts').length && $('.archive__posts .card').length === 0) {
    let extra = $('.archive__posts').data()

    getFeed('latest', 1, extra, (response) => {
      // Hide load more button if no more to load
      if ($(`<div>${response}</div>`).find('.card').length < 6) {
        $('.archive__posts__load-more').hide();
      }
      $('.archive__posts__feed').append(response);
    })
  }

  if ($('.archive__trending').length && $('.archive__trending .card').length === 0) {
    let extra = $('.archive__trending').data()

    getFeed('trending', 1, extra, (response) => {
      $('.archive__trending').append(response);
    })
  }

  $('.archive__filters ul li a').click(function(e){
    e.preventDefault();

    $('.archive__filters ul li a').removeClass('active');
    let id = $(this).attr('data-id');
    $(this).addClass('active');
    $('.archive__posts__load-more').show();

    if (id == 'you') {
      $('.archive__posts').removeClass('active');
      $('.archive__you').addClass('active');
    } else {
      $('.archive__you').removeClass('active');
      $('.archive__posts').addClass('active');
      let extra = $('.archive__posts').data()
      getFeed(id, 1, extra, (response) => {
        // Hide load more button if no more to load
        if ($(`<div>${response}</div>`).find('.card').length < 6) {
          $('.archive__posts__load-more').hide();
        }
        $('.archive__posts__feed').empty().append(response);
        $('.archive__posts__load-more').data('page', 2);
        $('.archive__posts__load-more').data('id', id);
      })
    }
  });

  $('.archive__posts__load-more').click(function(e) {
    let data = $(this).data()
    let extra = $('.archive__posts').data()
    getFeed(data.id, data.page, extra, (response) => {
      // Hide load more button if no more to load
      if ($(`<div>${response}</div>`).find('.card').length < 6) {
        $(this).hide();
      }
      $('.archive__posts__feed').append(response)
      $('.archive__posts__load-more').data('page', data.page + 1);
    })
  });

});
