$(function() {

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
        },
        submitSuccess: function($form, event) {
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            var name = $("input#name").val();
            var institution= $("input#institution").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
            var exper = $("textarea#exper").val();
            var pref1 = $("input#pref1").val();
            var pref2 = $("input#pref2").val();
            var pref3 = $("input#pref3").val();
            var firstName = name; 
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "././mail/individual.php",
                type: "POST",
                data: {
                    name: name,
                    institution: institution,
                    email: email,
                    phone: phone,
                    exper: exper,
                    pref1: pref1,
                    pref2: pref2,
                    pref3: pref3
                },
                cache: false,
                success: function() {
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that our mail server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    $('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

$('#name').focus(function() {
    $('#success').html('');
});
