function menuToggle() {
  if($('#main-menu').hasClass('menu-closed')) {
    $('#main-menu').removeClass('menu-closed');
  }
  else {
    $('#main-menu').addClass('menu-closed');
  }
}

$('body').on('click', function(e) {
  if (!$(e.target).closest('header').length) {
    $('#main-menu').addClass('menu-closed');
  }
});

$(document).ready(function() {

  $(window).scroll(function () {
    if((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
      $('#bottom-bar').css('transform', 'unset');
    }
    else {
      $('#bottom-bar').css('transform', 'translateY(' + $('#bottom-bar').outerHeight() + 'px)');
    }
  });

});
