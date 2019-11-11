$(function() {
    $('#category_all').on('click', function() {
      $('.category').prop('checked', this.checked);
    });

    $('.category').on('click', function() {
      if ($('#categories :checked').length == $('#categories :input').length){
        $('#category_all').prop('checked', 'checked');
      }else{
        $('#category_all').prop('checked', false);
      }
    });
  });
