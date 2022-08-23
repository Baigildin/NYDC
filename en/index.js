$(function(){
  $('.callback-main').on('submit', function(event){
    event.preventDefault();
    name = $('input[name="name"]').val();
    phone = $('input[name="phone"]').val();
    let requiredInputs = $(this).find('input.required');
    let errors = false;
    requiredInputs.each(function(){
      const input = $(this)
      if(input.val().length <= 0){
        input.addClass('error');
        errors = true;
      }
    })
    if(!errors){
      $.ajax(
      {
        url: '/ajax/submitForm.php',
        type: 'post',
        dataType: 'html',
        data: { name: name, phone: phone },
        success: function(data)
        {
          $('.modal-success-feedback').modal('show');
        }
      });
    }
  })
  $('.form-callback-send').on('submit', function(event){
    event.preventDefault();
    name = $('.modal-callback input[name="name"]').val();
    phone = $('.modal-callback input[name="phone"]').val();
    let requiredInputs = $(this).find('input.required');
    let errors = false;
    requiredInputs.each(function(){
      const input = $(this)
      if(input.val().length <= 0){
        input.addClass('error');
        errors = true;
      }
    })
    if(!errors){
      $.ajax(
      {
        url: '/ajax/submitForm.php',
        type: 'post',
        dataType: 'html',
        data: { name: name, phone: phone },
        success: function(data)
        {
          var modal = $('.modal-callback');
          modal.modal('hide');
          $('.modal-success-feedback').modal('show');
        }
      });
    }
  })
  $('.form-writetous-send').on('submit', function(event){
    event.preventDefault();
    name = $('.modal-callback-writetous input[name="name"]').val();
    phone = $('.modal-callback-writetous input[name="phone"]').val();
    text = $('.modal-callback-writetous textarea[name="text"]').val();
    let requiredInputs = $(this).find('input.required');
    let errors = false;
    requiredInputs.each(function(){
      const input = $(this)
      if(input.val().length <= 0){
        input.addClass('error');
        errors = true;
      }
    })
    if(!errors){
      $.ajax(
      {
        url: '/ajax/writeToUs.php',
        type: 'post',
        dataType: 'html',
        data: { name: name, phone: phone, text: text},
        success: function(data)
        {
          var modal = $('.modal-callback-writetous');
          modal.modal('hide');
          $('.modal-success-writeToUs').modal('show');
        }
      });
    }
  })
  $(document).on('input', 'input.required', function(){
    const input = $(this)
    if(input.val().length > 0){
      input.removeClass('error');
      errors = false;
    }
  })
})