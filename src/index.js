import "bootstrap";
import "bootstrap/dist/css/bootstrap-grid.min.css";
// // import "font-awesome/css/font-awesome.css";
// // import "wowjs/css/libs/animate.css";
// // import { WOW } from "wowjs";
// // new WOW().init();
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import "slick-carousel/slick/slick.js";
jQuery(document).ready(function ($) {
  $(".single-item").slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
  });
});

// $(document).ready(function () {
//   $(".sl").slick({
//     dots: true,
//   });
// });
// import "./scripts/btnUp/btnUp";
import "./style/scss/main.scss";
