let otpSent = false; // Global variable to track OTP status

// Form Validation and AJAX Signup Request
$('#signupForm').submit(function(e) {
    e.preventDefault();
    $('.error-message').remove(); // Remove previous error messages
    let isValid = true;

    // Field Validation
    $('#signupForm input').each(function() {
        const field = $(this);
        const value = field.val()?.trim();
        const label = field.closest('div').find('label').text();

        if (field.attr('id') === 'signupEmail') {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (value === '') {
                field.after(`<span class="error-message" style="color: red; font-size: 0.9rem;">${label} is required</span>`);
                isValid = false;
            } else if (!emailPattern.test(value)) {
                field.after(`<span class="error-message" style="color: red; font-size: 0.9rem;">Invalid email format</span>`);
                isValid = false;
            }
        } else if (value === '') {
            field.after(`<span class="error-message" style="color: red; font-size: 0.9rem;">${label} is required</span>`);
            isValid = false;
        }
    });

    if (!isValid) return;

    $('#submitButton').prop('disabled', true);
    $('.loader').css('display', 'inline-block');

    const formData = {
        name: $('#signupName').val()?.trim(),
        email: $('#signupEmail').val()?.trim(),
        password: $('#signupPassword').val()?.trim()
    };

    $.ajax({
        url: '/signup', 
        type: 'POST',
        data: formData,
        success: function() {
            alert("Signup Successful!");
            $('#signupForm')[0].reset();
        },
        error: function(xhr, status, error) {
            alert("An error occurred: " + error);
        },
        complete: function() {
            $('#submitButton').prop('disabled', false);
            $('.loader').css('display', 'none');
        }
    });
});

// Real-time Email Validation and Display OTP Button
$(document).ready(function() {
    function isValidEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }

    $('#email').on('input', function() {
        const emailValue = $(this).val().trim();

        if (isValidEmail(emailValue)) {
            if (!$('#getotp_button').length) {
                $('#mobileContainer').html(`
                    <button type="button" class="btn btn-primary" id="getotp_button" style="padding: 10px;">Get OTP <span class="loaderOtp"></span></button>
                `);
            }
        } else {
            $('#getotp_button').remove();
        }
    });
});

// Get OTP Button Click - Trigger OTP Request
$(document).on('click', '#getotp_button', function(e) {
    $('#submitButton').prop('disabled', true);
    $('#getotp_button').remove();

    let email = $('#email').val().trim();
    let name = $('input[name="first_name"]').val() + ' ' + $('input[name="last_name"]').val();

    function isValidEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }

    if (isValidEmail(email) && !otpSent) {
        otpSent = true;
        $('#email').prop('readonly', true);
        $('#otp_section').css('display', 'block');

        $.ajax({
            url: `https://program.srikaya.org/whatsapp-send-otp`,
            type: 'POST',
            data: { 'email': email, 'module': 'signup', 'name': name },
            headers: { 'X-CSRF-TOKEN': 'SkgDCZ2oA2O5OUZY3qfZHcLI86En3nFbMKmvRhCa' },
            success: function(res) {
                Toastify({
                    text: 'An OTP has been shared with you on Email.',
                    duration: 3000,
                    className: 'bg-success',
                    style: { background: 'none' }
                }).showToast();

                otp_id = res.otp;
                $('#email_hidden').val(email);
                $('#countdown').css('display', 'block');
                startCountdown(600);
            },
            error: function(res) {
                Toastify({
                    text: res.responseJSON.message,
                    duration: 3000,
                    className: 'bg-danger',
                    style: { background: 'none' }
                }).showToast();

                $('#email').prop('readonly', false);
                $('#otp_section').css('display', 'none');
                otpSent = false;
            }
        });
    } else if (!isValidEmail(email)) {
        $('#email').prop('readonly', false);
        $('#otp_section').css('display', 'none');
        otpSent = false;
    }
});
