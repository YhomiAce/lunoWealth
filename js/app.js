$(document).ready(() => {
  //Register script
  $("#register-btn").click((e) => {
    if ($("#register-form")[0].checkValidity()) {
      e.preventDefault();
      $("#register-btn").val("Please wait...");
      if ($("#password").val() !== $("#cpassword").val()) {
        $("#register-btn").val("Sign Up");
        $("#regAlert").text("Passwords do not match");
        setTimeout(()=>{
          $("#regAlert").text("");
        },5000)
      } else {
        $("#regAlert").text("");
        $.ajax({
          url: "config/controller.php",
          method: "post",
          data: $("#register-form").serialize() + "&action=register",
          success: function (res) {
            console.log(res);
            if (res === "Registered SuccessFully") {
              console.log(res);
              swal.fire({
                  title:res,
                  icon:"info", 
              }).then(()=>{
                window.location = "admin/home.php";
              })
              
            } else {
              console.log(res);
              $("#regAlert").html(res);
              setTimeout(()=>{
                $("#regAlert").text("");
              },5000)
              $("#register-btn").val("Sign Up");
            }
            
            
          },
        });
      }
    }
  });

  // Login script
  $("#login-btn").click((e) => {
    if ($("#login-form")[0].checkValidity()) {
      e.preventDefault();
      $("#login-btn").val("Please wait...");
      $.ajax({
        url: "config/controller.php",
        method: "post",
        data: $("#login-form").serialize() + "&action=login",
        success: (res) => {
          console.log(res);
          $("#loginAlert").html(res);
           $("#login-btn").val("Sign in");
            if (res === "login") {
              swal.fire({
                title:"Login Successful",
                icon:"success", 
            }).then(()=>{
              window.location = "admin/home.php";
            })
            } else {
              $("#loginAlert").html(res);
              $("#login-btn").val("Sign in");
            }
        },
      });
    }
  });

  // forgot script
  $("#forgot-btn").click((e) => {
    
    if ($("#forgot-form")[0].checkValidity()) {
      e.preventDefault();
      $("#forgot-btn").val("Please wait...");
      $.ajax({
        url: "config/controller.php",
        method: "post",
        data: $("#forgot-form").serialize() + "&action=forgot",
        success: function (res) {
          console.log(res);
          $("#forgot-btn").val("Reset Password");
          $("#forgot-form")[0].reset();
          $("#forgotAlert").html(res);
        },
      });
    }
  });

  $('#contactForm').click(e=>{
        
    if($('#contact_form')[0].checkValidity()){
        e.preventDefault()
        $('#contactForm').val('Sending Message...')
        $.ajax({
            url:'config/sendMail.php',
            type:'post',
            data:$('#contact_form').serialize()+'&action=send_email',
            success:(res)=>{
                console.log(res)
                $('#contactForm').val('Send Message')
                $('#contact_form')[0].reset()
                swal.fire({
                    title:"Your mail has been sent successfully",
                    icon:"success"
                })
            }
        })
    }
    
  })

});
