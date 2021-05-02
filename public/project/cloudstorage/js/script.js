$(document).ready(function() {

  // sticky header
  $(window).scroll(function() {
      var height = $(window).scrollTop();

      if(height > 100) {
        $('#header').addClass('floating');
      }
      else {
        $('#header').removeClass('floating');
      }
  });

  // login submit
  $('#login-form').submit(function(e) {
    var request;
    e.preventDefault();

    if (request) {
      request.abort();
    }

    var form = $(this);
    var inputs = form.find("input, select, button, textarea");
    var serializedData = form.serialize();

    inputs.prop("disabled", true);

    request = $.ajax({
      url: "php/ajax/login_submit.php",
      type: "post",
      data: serializedData
    });

    request.done(function () {
      window.location.href = 'documents';
    });

    request.always(function () {
      inputs.prop("disabled", false);
    });
  });

  // register submit
  $('#register-form').submit(function(e) {
    var request;
    e.preventDefault();

    if (request) {
      request.abort();
    }

    var form = $(this);
    var inputs = form.find("input, select, button, textarea");
    var serializedData = form.serialize();

    inputs.prop("disabled", true);

    request = $.ajax({
      url: "php/ajax/register.php",
      type: "post",
      data: serializedData
    });

    request.done(function () {
      window.location.href = 'documents';
    });

    request.always(function () {
      inputs.prop("disabled", false);
    });
  });

  // delete document
  $('#documents .card .btn-delete').on('click', function() {
    let document_id = $(this).parent().parent().find('input[type="hidden"]').val();

    $.ajax({
      url: "php/ajax/delete_document.php",
      type: "post",
      data: { document_id:document_id },
      success: (json) => {
        $(this).parent().parent().fadeOut();
      }
    });
  });

  // open share document tab
  $('#documents .card .btn-share, #shares .card .btn-share').on('click', function() {
    let share = $(this).parent().parent().find('.share');
    let visibility;

    if (share.is(':visible')) { visibility = true; } else { visibility = false; }

    $('.share').each(function() { $(this).slideUp('fast'); });

    if (visibility) { share.slideUp('fast'); } else { share.slideDown('fast'); }
  });

  // remove a shared user
  $('#documents .card .btn-remove-share').on('click', function() {
    let document_id = $(this).closest('.card').find('input[type="hidden"]').val();
    let user_id = $(this).closest('.container').find('input[type="hidden"]').val();

    $.ajax({
      url: "php/ajax/remove_share.php",
      type: "post",
      data: { document_id:document_id, user_id:user_id },
      success: (json) => {
        $(this).closest('.container').fadeOut();
      }
    });
  });

  // remove a share from other user
  $('#shares .card .btn-delete').on('click', function() {
    let document_id = $(this).closest('.card').find('input[name="document_id"]').val();

    $.ajax({
      url: "php/ajax/remove_shared_file.php",
      type: "post",
      data: { document_id:document_id },
      success: (json) => {
        $(this).closest('.card').fadeOut();
      }
    });
  });

  // give user access to a file through sharing the document
  $('#documents .card .add-share .btn').on('click', function() {
    let document_id = $(this).closest('.card').find('input[type="hidden"]').val();
    let mail = $(this).closest('.add-share').find('input[type="text"]').val();

    $.ajax({
      url: "php/ajax/add_share.php",
      type: "post",
      data: { document_id:document_id, mail:mail },
      success: () => {
        clear_errors();
        $(this).closest('.share').find('.current-share').append('<div class="container mb-1"><p>' + mail + '</p></div>');
        $(this).closest('.add-share').find('input[type="text"]').val('');
      },
      error: (error) => {
        clear_errors();
        $(this).closest('.share').find('.current-share').prepend('<div class="alert alert-warning mb-1">' + error.statusText + '</div>');
      }
    });
  });

});
