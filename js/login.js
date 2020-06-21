'use strict';
var KTLogin = (function() {
  var t;
  var i = function(i) {
    var o = 'login-' + i + '-on';
    i = 'kt_login_' + i + '_form';
    t.removeClass('login-forgot-on');
    t.removeClass('login-signin-on');
    t.removeClass('login-signup-on');
    t.removeClass('login-otp-on');
    t.addClass(o);
    KTUtil.animateClass(
      KTUtil.getById(i),
      'animate__animated animate__backInUp'
    );
  };
  return {
    init: function() {
      t = $('#kt_login');
      var o = FormValidation.formValidation(
        KTUtil.getById('kt_login_signin_form'),
        {
          fields: {
            username: {
              validators: { notEmpty: { message: 'Username is required' } },
            },
            password: {
              validators: { notEmpty: { message: 'Password is required' } },
            },
          },
          plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            submitButton: new FormValidation.plugins.SubmitButton(),
            bootstrap: new FormValidation.plugins.Bootstrap(),
          },
        }
      );
      $('#kt_login_signin_submit').on('click', function(t) {
        t.preventDefault();
        o.validate().then(function(t) {
          if (t == 'Valid') {
            var form=document.getElementById('kt_login_signin_form');
            $.ajax({
              url:'../php/login.php',
              type:"POST",
              data:{
                email:form.username.value,
                password:form.password.value
              },
              success:function(result,status){
                  if(result=="wrong email"){
                    swal
                      .fire({
                        text:
                          'Email not found!',
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'Try Again!',
                        customClass: {
                          confirmButton: 'btn font-weight-bold btn-light-primary',
                        },
                      })
                      .then(function() {
                        KTUtil.scrollTop();
                      });
                  }else if(result=="wrong password"){
                    swal
                      .fire({
                        text:
                          'Wrong Password!',
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'Try Again!',
                        customClass: {
                          confirmButton: 'btn font-weight-bold btn-light-primary',
                        },
                      })
                      .then(function() {
                        KTUtil.scrollTop();
                      });
                  }else if(result=="success"){
                      var time=new Date(new Date().getTime()+9999999999999).toGMTString();
                      var cuki = "key1="+form.username.value+"; expires="+time+"; path=/harsh/LeadManager/;";
                      document.cookie=cuki;
                        swal
                          .fire({
                            text: 'Login successful.',
                            icon: 'success',
                            buttonsStyling: false,
                            confirmButtonText: 'Ok',
                            customClass: {
                              confirmButton: 'btn font-weight-bold btn-light-primary',
                            },
                          })
                          .then(function() {
                            KTUtil.scrollTop();
                          window.location.replace("../");
                          });
                  }else{
                    console.log(result);
                  }
              },
              error:function(er){
                  console.log(er);
              }
            });
          } else {
            swal
              .fire({
                text:
                  'Sorry, looks like there are some errors detected, please try again.',
                icon: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Ok, got it!',
                customClass: {
                  confirmButton: 'btn font-weight-bold btn-light-primary',
                },
              })
              .then(function() {
                KTUtil.scrollTop();
              });
          }
        });
      });
      $('#kt_login_forgot').on('click', function(t) {
        t.preventDefault();
        i('forgot');
      });
      $('#kt_login_signup').on('click', function(t) {
        t.preventDefault();
        i('signup');
      });
      (function(t) {
        var n = KTUtil.getById('kt_login_signup_form');
        var o = FormValidation.formValidation(n, {
          fields: {
            fullname: {
              validators: { notEmpty: { message: 'Username is required' } },
            },
            email: {
              validators: {
                notEmpty: { message: 'Email address is required' },
                emailAddress: {
                  message: 'The value is not a valid email address',
                },
              },
            },
            password: {
              validators: { notEmpty: { message: 'The password is required' } },
            },
            cpassword: {
              validators: {
                notEmpty: { message: 'The password confirmation is required' },
                identical: {
                  compare: function() {
                    return n.querySelector('[name="password"]').value;
                  },
                  message: 'The password and its confirm are not the same',
                },
              },
            }
            // agree: {
            //   validators: {
            //     notEmpty: {
            //       message: 'You must accept the terms and conditions',
            //     },
            //   },
            // },
          },
          plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap(),
          },
        });
        $('#kt_login_signup_submit').on('click', function(t) {
          t.preventDefault();
          o.validate().then(function(t) {
            if (t == 'Valid') {
              $.ajax({
                url:'../php/verify.php',
                type:"POST",
                data:{mail:document.getElementById('kt_login_signup_form').email.value},
                success:function(result,status){
                  var ar=result.split('\n');
                  if(ar.length==2 && ar[0]=="success")
                    globalOtpVariable=ar[1];
                }
              });
              swal
                .fire({
                  text: 'All is cool! Verfication code has been send to your Email.',
                  icon: 'success',
                  buttonsStyling: false,
                  confirmButtonText: 'Ok, got it!',
                  customClass: {
                    confirmButton: 'btn font-weight-bold btn-light-primary',
                  },
                })
                .then(function() {
                  KTUtil.scrollTop();
                  i('otp');
                });
            } else {
              swal
                .fire({
                  text:
                    'Sorry, looks like there are some errors detected, please try again.',
                  icon: 'error',
                  buttonsStyling: false,
                  confirmButtonText: 'Ok, got it!',
                  customClass: {
                    confirmButton: 'btn font-weight-bold btn-light-primary',
                  },
                })
                .then(function() {
                  KTUtil.scrollTop();
                });
            }
          });
        });
      (function(t) {
        var o = FormValidation.formValidation(
          KTUtil.getById('kt_login_otp_form'),
          {
            fields: {
              otp: {
                validators: { notEmpty: { message: 'Verification code is required' } },
              },
             
            },
            plugins: {
              trigger: new FormValidation.plugins.Trigger(),
              submitButton: new FormValidation.plugins.SubmitButton(),
              bootstrap: new FormValidation.plugins.Bootstrap(),
            },
          }
        );
        $('#kt_login_otp_submit').on('click', function(t) {
          t.preventDefault();
          o.validate().then(function(t) {
            if (t == 'Valid') {
              KTUtil.scrollTop();
              if(document.getElementById('otp_hidden').value==globalOtpVariable){
                submitData();
              }else{
                swal
                  .fire({
                    text:
                      'Wrong verification code!',
                    icon: 'error',
                    buttonsStyling: false,
                    confirmButtonText: 'Try again!',
                    customClass: {
                      confirmButton: 'btn font-weight-bold btn-light-primary',
                    },
                  })
                  .then(function() {
                    KTUtil.scrollTop();
                  });
              }
            } else {
              swal
                .fire({
                  text:
                    'Sorry, looks like there are some errors detected, please try again.',
                  icon: 'error',
                  buttonsStyling: false,
                  confirmButtonText: 'Ok, got it!',
                  customClass: {
                    confirmButton: 'btn font-weight-bold btn-light-primary',
                  },
                })
                .then(function() {
                  KTUtil.scrollTop();
                });
            }
          });
        });
      })();
        $('#kt_login_signup_cancel').on('click', function(t) {
          t.preventDefault();
          i('signin');
        });
        $('#kt_login_otp_cancel').on('click', function(t) {
          t.preventDefault();
          i('signup');
        });
      })();
      (function(t) {
        var o = FormValidation.formValidation(
          KTUtil.getById('kt_login_forgot_form'),
          {
            fields: {
              email: {
                validators: {
                  notEmpty: { message: 'Email address is required' },
                  emailAddress: {
                    message: 'The value is not a valid email address',
                  },
                },
              },
            },
            plugins: {
              trigger: new FormValidation.plugins.Trigger(),
              bootstrap: new FormValidation.plugins.Bootstrap(),
            },
          }
        );
        $('#kt_login_forgot_submit').on('click', function(t) {
          t.preventDefault();
          o.validate().then(function(t) {
            if (t == 'Valid') {
              $.ajax({
                url:'../php/forgot.php',
                type:"POST",
                data:{mail:document.getElementById('kt_login_forgot_form').email.value},
                error:function(er){
                    console.log(er);
                },
                success:function(result,status){
                  if(result=="success"){
                      i('signin');
                      swal
                        .fire({
                          text: 'Password has been send to your Email.',
                          icon: 'success',
                          buttonsStyling: false,
                          confirmButtonText: 'Ok, got it!',
                          customClass: {
                            confirmButton: 'btn font-weight-bold btn-light-primary',
                          },
                        })
                        .then(function() {
                          KTUtil.scrollTop();
                        });
                  }else if(result=="wrong email"){
                      swal
                        .fire({
                          text:
                            'Sorry, Email Not Found!.',
                          icon: 'error',
                          buttonsStyling: false,
                          confirmButtonText: 'Try Again!',
                          customClass: {
                            confirmButton: 'btn font-weight-bold btn-light-primary',
                          },
                        })
                        .then(function() {
                          KTUtil.scrollTop();
                        });
                  }else
                    console.log(result);
                }
              });
            } else {
              swal
                .fire({
                  text:
                    'Sorry, looks like there are some errors detected, please try again.',
                  icon: 'error',
                  buttonsStyling: false,
                  confirmButtonText: 'Ok, got it!',
                  customClass: {
                    confirmButton: 'btn font-weight-bold btn-light-primary',
                  },
                })
                .then(function() {
                  KTUtil.scrollTop();
                });
            }
          });
        });
        $('#kt_login_forgot_cancel').on('click', function(t) {
          t.preventDefault();
          i('signin');
        });
      })();
    },
  };
})();
var globalOtpVariable='';
function submitData(){
  var form=document.getElementById('kt_login_signup_form');
  var data={
    username:form.fullname.value,
    email:form.email.value,
    password:form.password.value
  }
  $.ajax({
    url:'../php/register.php',
    data:data,
    type:"POST",
    success:function(result,status){
      if(result=="success"){
        var time=new Date(new Date().getTime()+9999999999999).toGMTString();
        var cuki = "key1="+form.email.value+"; expires="+time+"; path=/harsh/LeadManager/;";
        document.cookie=cuki;
        window.location.replace("../");
      }else
        console.log(result);
    }
  });
}
jQuery(document).ready(function() {
  KTLogin.init();
});
