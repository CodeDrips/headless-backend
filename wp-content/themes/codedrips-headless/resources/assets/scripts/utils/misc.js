import 'jquery';

const wpAjax = (data, success) => {
  $.ajax({
    type : "post",
    dataType : data.type || "json",
    url : siteOptions.ajaxurl,
    data : data,
    success: success,
    error: (err) => console.log(err)
  })
}

export { wpAjax }
