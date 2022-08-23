$(function(){
  $('form').on('submit', function(event){
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
  $(document).on('input', 'input.required', function(){
    const input = $(this)
    if(input.val().length > 0){
      input.removeClass('error');
      errors = false;
    }
  })
})
