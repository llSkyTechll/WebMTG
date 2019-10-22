// JavaScript Document
$.validator.setDefaults({
    highlight: function (element, errorClass, validClass) {       
            $(element).closest('.pure-control-group').removeClass('has-success').addClass('has-error has-feedback');
            $(element).closest('.pure-control-group').append('<i class="pure-control-group"></i>');  
    },
    unhighlight: function (element, errorClass, validClass) {       
            $(element).closest('.pure-control-group').removeClass('has-error').addClass('has-success has-feedback');
            $(element).closest('.pure-control-group').append('<i class="pure-control-group"></i>');
    }
});