(()=>{var e={616:(e,a,o)=>{var r=o(428);r(document).ready((function(){function e(){if(r(window).width()<1023){let e=window.scrollY,a=r("header"),o=r("header .header__mobile-logo");e>0||a.hasClass("other-page")?(a.addClass("start-scroll"),o.addClass("show")):(a.removeClass("start-scroll"),o.removeClass("show"))}}r("header .header__burger-button").on("click",(function(){r(this).hasClass("active")?r(this).removeClass("active"):r(this).addClass("active");let e=r("header .emerging-block");e.hasClass("active")?e.removeClass("active"):e.addClass("active"),e.hasClass("active")?r("body").css("overflow","hidden"):r("body").css("overflow","auto")})),r("header .additional-button").on("click",(function(){r("header .emerging-block").removeClass("active"),r("body").css("overflow","auto"),r("header .header__burger-button").removeClass("active")})),e(),window.addEventListener("scroll",(function(){e()}))}))},428:e=>{"use strict";e.exports=window.jQuery}},a={};function o(r){var s=a[r];if(void 0!==s)return s.exports;var t=a[r]={exports:{}};return e[r](t,t.exports,o),t.exports}o.n=e=>{var a=e&&e.__esModule?()=>e.default:()=>e;return o.d(a,{a}),a},o.d=(e,a)=>{for(var r in a)o.o(a,r)&&!o.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:a[r]})},o.o=(e,a)=>Object.prototype.hasOwnProperty.call(e,a),(()=>{"use strict";o(616)})()})();