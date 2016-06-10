$(document).ready(function () {


$('#loginform').validate({
    rules:{
        UserName:{
            required:true,
            email:true
        },
        Password:{
            required:true,
            minlength:8
        }
    },
    messages:{
        UserName:{
            required:"Enter a UserName to login",
            email:"User Name should be registered email address"
        },
        Password:{
            required:"Please Enter Password to login",
            minlenght:"Password should be minimum 8 characters"
        }
    }
    
});
    $('#registrationform').validate({
        rules: {
            FirstName: {
                required: true,
                regex: true
            },
            LastName: {
                required: true,
                regex: true
            },
            
            UserName: {
                required: true,
                email:true
            },
            Password: {
                required: true,
                minlength:8
            },
            ConfirmPassword: {
                required: true,
                equalTo:"#Password"
            }
        },
        messages: {
            FirstName: {
                required: "First Name is Required",
                regex: "It should be a valid First Name"
            },
            LastName: {
                required: "Last Name is Required",
                regex: "It should be a valid Last Name"
            },
            
            UserName: {
                required: "User Name is required",
                email:"Enter Valid Email for UserName field"
            },
            Password: {
                required: "Password is required",
                minlength:"minimum 8 characters"
            },
            ConfirmPassword: {
                required: "Field is required",
                equalTo:"It should match with Password"
            }
        }

    });
    

    jQuery.validator.addMethod("capstwo", function (value, element) {
        return this.optional(element) || /^[A-Z]+$/.test(value);
    }, "Capital alphabets only");

    jQuery.validator.addMethod("ContinentName", function (value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
    }, "Enter Valid Continent Name");

    jQuery.validator.addMethod("regex", function (value, element) {
        return this.optional(element) || /^([a-zA-Z]+[,.]?[ ]?|[a-zA-Z]+['-]?[()]?)+$/.test(value);
    }, "Enter Valid Country Name");



});