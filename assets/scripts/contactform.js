

  /*** CONTACT FORM ******/
  $('#contact_form').on('submit', function(ev,frm) {
    ev.preventDefault();
    //alert("Form is submitted, finally!");


    //get input field values
    var user_name = $('input[name=message_name]').val();
    var user_email = $('input[name=message_email]').val();
    var user_subject = $('input[name=message_subject]').val();
    var user_msg = $('textarea[name=message_text]').val();

    var proceed = true;
    if (user_name === '') {
        //$('input[name=message_name]').css('border-color', '#e41919');
        proceed = false;
    }
    if (user_email === '') {
        //$('input[name=message_email]').css('border-color', '#e41919');
        proceed = false;
    }

    if (user_msg === '') {
        //$('input[name=message_tel]').css('border-color', '#e41919');
        proceed = false;
    }

    //everything looks good! proceed...
    if (proceed) {
        //data to be sent to server
        post_data = {
            'userName': user_name,
            'userEmail': user_email,
            'userSubject': user_subject,
            'userMsg': user_msg
        };

        //Ajax post data to server
        $.post($('#contact_form').attr('action'), post_data, function(response){

            //load json data from server and output message
            if (response.type === 'error') {
                output = '<div class="callout alert"><p>' + response.text + '</p></div>';
            }
            else {

                output = '<div class="callout success"><p>' + response.text + '</p></div>';

                //reset values in all input fields
                $('#contact_form input').val('');
                $('#contact_form textarea').val('');
                $('#contact_form textarea').hide();
                $('.formactions').hide();
            }

            $('#result').hide().html(output).slideDown();
        }, 'json');

    }

    return false;
  });

  $('contact_form input, #contact_form textarea').keyup(function(){
    //$("#contact_form input, #contact_form textarea").css('border-color', '');
    $('#result').slideUp();
  });

