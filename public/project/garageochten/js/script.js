$(document).ready(function() {

  $('.container-full').each(function () {
    offset = $(this).offset().left;
    $(this).css('margin-left', -offset).css('width', $(this).outerWidth() + offset);
  });

});