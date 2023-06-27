jQuery("#email_form").validate({
    rules: {
        name: {
            required: true,
            minlength: 3
        },
        email: {
            required: true,
            email: true
        },
        cars: {
            required: true
        },
        fav_language: {
            required: true
        },
        vehicle: {
            required: true
        },
        birthday: {
            required: true,
            date: true,
        },
        image: {
            required: true,
        },
        message: {
            required: true,
            minlength: 5
        }
    },
    messages: {
        name: {
            minlength: "Name should be at least 3 characters"
        },
        email: {
            email: "The email should be in the format: abc@domain.tld"
        },
        birthday: {
            dateFormat: "The date is invalid. Please enter a date in the format DD/MM/YYYY.",
            date: "Can contain digits only"
        },
        message: {
            minlength: "Name should be at least 5 characters"
        }
    }
});

// Ajax Form Submit

jQuery(document).ready(function ($) {
    $('#email_form').submit(function (e) {
        e.preventDefault();

        if(!$("#email_form").valid()) return;

        var formData = new FormData(this);
        formData.append('file', $('#image')[0].files[0]);
        formData.append('featuredImage', $('#featuredImage')[0].files[0]); 
        formData.append('action', 'send_form');
        
        $.ajax({
            url: url_ajax_admin.ajaxurl,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert('Success');
                $('#data').html(response);
                $("#email_form")[0].reset();

            }, error: function() {
                alert('Error');
            },
        });
    });
});

