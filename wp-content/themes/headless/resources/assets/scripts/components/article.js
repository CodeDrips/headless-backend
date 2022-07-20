
import 'jquery';

import { wpAjax } from '../utils/misc';

const DISTANCE_FROM_BOTTOM = 500
const ARTICLE_LIMIT = 50

const viewCounter = function(post_id) {
  wpAjax({
    action: "update_article_views",
    nonce: siteOptions.nonce,
    post_id : post_id
  }, (response) => {
    console.log(response)
  })
}

const getArticle = function(post_id, success) {
  wpAjax({
    action: "get_article",
    nonce: siteOptions.nonce,
    type: "html",
    post_id : post_id
  }, success)
}

const getArticleCards = function(post_ids, success) {
  wpAjax({
    action: "get_article_card",
    nonce: siteOptions.nonce,
    type: "html",
    post_ids : post_ids,
  }, success)
}

const ArticleClass = {

  base_slug: window.location.pathname,
  post_id: -1,
  waiting: false,

  scrollPos: 0,
  ticking: 0,

  article_index: 0,
  articles: {
    initial: [],
    appended: [],
  },

  init: function() {
    document.body.classList.forEach((el) => {
      if (el.indexOf('postid-') !== -1) {
        let item_arr = el.split('-');
        this.post_id = Number(item_arr[item_arr.length - 1]);
        this.articles.appended.push(this.post_id);
        return false;
      }
    })

    document.querySelectorAll('.article__content a > img').forEach((el, i) => {
      el.parentElement.addEventListener('click', (event) => event.preventDefault())
    })

    $.get('/wp-json/feed/v1/trending', (data) => {
      if (data.success) {
        this.articles.initial = this.articles.initial.concat(data.list)
        // Make sure articles are unique
        this.articles.initial = this.articles.initial.filter((item, pos, self) => self.indexOf(item) === pos)
      }
    })

    return this
  },

  scrollHandle: function() {


    this.onScroll = (event) => {

      this.scrollPos = window.scrollY

      if (this.ticking) return

      window.requestAnimationFrame(() => {
        let body = document.body
        let html = document.documentElement
        let height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight)
        let footer = DISTANCE_FROM_BOTTOM

        // Check if URL should update
        let nodes = document.querySelectorAll('.article')
        for (let i = nodes.length - 1; i >= 0; i--) {
          if (nodes[i].offsetTop - 100 < this.scrollPos) {
            let current = this.articles.appended[0]
            if (i !== 0) current = this.articles.appended[i - 1]
            if (typeof current === 'undefined') break

            let url = `/${nodes[i].dataset.slug}/`

            if (window.location.pathname !== url) {
              window.history.replaceState(window.history.state, '', url)
              // TODO : push page view ?
            }

            break
          }
        }

        // Check if article should be appended
        if (this.scrollPos >= height - window.innerHeight - footer) {
          if (this.articles.initial.length && this.articles.appended.length < ARTICLE_LIMIT && !this.waiting) {
            this.waiting = true
            let next = this.articles.initial.pop()
            this.articles.appended.push(next)
            getArticle(next, (response) => {
              //console.log(response)
              $('.article').last().after(response);
              setTimeout(() => this.waiting = false, 100)
            })
          }
        }

        this.ticking = false
      })

      this.ticking = true
    }
    window.addEventListener('scroll', this.onScroll);
  }
}


$(document).ready(() => {

  if (!$('body').hasClass('single-post')) {
    return;
  }

  const ArticlePage = ArticleClass.init()

  viewCounter(ArticlePage.post_id)

  ArticlePage.scrollHandle()

});
