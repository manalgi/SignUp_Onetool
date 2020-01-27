<!DOCTYPE html>
<html lang = "en">

   <head>
      <meta charset = "utf-8">
      <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script> <!--jquery-->
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script><!--validation plugin-->
      <script src='https://www.google.com/recaptcha/api.js'></script>
      <script>
        function captchaCallback() {
            $("#submit").show();
         }
      </script>
      <title>Users Example</title>
   </head>
   <body>
   

         <?php
            if (isset($msg)) {
               echo "<div style='background:red'>".$msg."</div>";
            }
            
            echo form_open('User_controller/add_user');
            echo form_label('username');
            echo form_input (array('id'=>'username','name'=>'username', 'value'=>(isset($username) ? $username : "")));
            echo "<br/>";

            echo form_label('email');
            $email33=form_input(array('id'=>'email','name'=>'email', "type"=>"email", 'value'=>(isset($email) ? $email : "")));
            echo $email33;
            echo "<br/>";
            $Gkey=$this->config->item('google_key');
            echo "<div class='g-recaptcha' data-sitekey=$Gkey data-callback='captchaCallback'> </div>";
            echo form_submit(array('id'=>'submit','value'=>'Add','class'=> 'btn'));
            echo form_close();

            
         ?>




   <script>

$(function() {
   $("#submit").hide();

  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
   $("form").validate({
      // Specify validation rules
      rules: {
         username:"required",
         email: {
            required: true,
            email:true
         }
      },
      // Specify validation error messages
      messages: {
         username: "Please provide a username",
         email:"Please provide a valid email",
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
         form.submit();
      }  
  });
});
   </script>
   </body>
</html>
