import 'jquery';

$(document).ready(() => {
  // Clock
  let dialLinesWrap = document.getElementsByClassName('diallines__wrap')[0];
  let dialLines = document.getElementsByClassName('diallines');
  let clockEl = document.getElementsByClassName('clock')[0];

  for (let i = 1; i < 60; i++) {
    dialLinesWrap.innerHTML += "<div class='diallines'></div>";
    dialLines[i].style.transform = "rotate(" + 6 * i + "deg)";
  }

  function clock() {
    let d = new Date(),
      h = d.getHours(),
      m = d.getMinutes(),
      s = d.getSeconds(),

      hDeg = h * 30 + m * (360/720) + 180,
      mDeg = m * 6 + s * (360/3600) + 180,
      sDeg = s * 6 + 180,

      hEl = document.querySelector('.hour-hand'),
      mEl = document.querySelector('.minute-hand'),
      sEl = document.querySelector('.second-hand');


    hEl.style.transform = "rotate("+hDeg+"deg)";
    mEl.style.transform = "rotate("+mDeg+"deg)";
    sEl.style.transform = "rotate("+sDeg+"deg)";
  }

  setInterval(clock, 100);
})
