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
