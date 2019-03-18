$(document).ready(function() {
  
  var data = { gallery: [
    /*{title: "Ella me quiso, a veces yo también la quería", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/murra.jpg", alt: "lorem" },
    {title: "Puedo escribir los versos más tristes esta noche", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/g1.jpg", alt: "lorem" },
    {title: "Mi voz buscaba el viento para tocar su oído", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/g2.jpg", alt: "lorem" },
    {title: "Mi alma no se contenta con haberla perdido", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/g3.jpg", alt: "lorem" },
    {title: "El viento de la noche gira en el cielo y canta", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/g4.jpg", alt: "lorem" },
    */{title: "La noche está estrellada, y tiritan, azules, los astros, a lo lejos", img: "s1.jpg", alt: "lorem" },
    {title: "Cómo no haber amado sus grandes ojos fijos", img: "s2.jpg", alt: "lorem" },
    {title: "De otro. Será de otro. Como antes de mis besos.", img: "s3.jpg", alt: "lorem" }
  ]};
  
  var source   = $('#template').html();
  var template = Handlebars.compile(source);
  $('#content').html(template(data));
  
});

$(window).load(function(){
  var $items = $('.item');
  $items.on({
    mousemove: function(e) {
      var $that = $(this);
      $that.find('.overflow > img').velocity({
        translateZ: 0,
        translateX: Math.floor((e.pageX - $that.offset().left) - ($that.width() / 2)),
        translateY: Math.floor((e.pageY - $that.offset().top) - ($that.height() / 2)),
        scale: '2'
      }, {
        duration: 400,
        easing: 'linear',
        queue: false
      });
    },
    mouseleave: function() {
      $(this).find('.overflow > img').velocity({
        translateZ: 0,
        translateX: 0,
        translateY: 0,
        scale: '1'
      }, {
        duration: 1000,
        easing: 'easeOutSine',
        queue: false
      });
    }
  });
});