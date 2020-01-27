   <!DOCTYPE html>
   <html lang = "en">

      <head>
         <meta charset = "utf-8">
         <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/main.css">
         <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script> <!--jquery-->
         <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script><!--validation plugin-->
         <script src='https://www.google.com/recaptcha/api.js'></script>
         <script>
         function captchaCallback() {
               $("#submit").show();
            }
         </script>
         <!-- Latest compiled and minified CSS -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

         <!-- jQuery library -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

         <!-- Latest compiled JavaScript -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

         <title>Users Register</title>
      </head>
      <body>
      <header class='page-header header container'> 
      <div class='description'>
      <h1>Welcome to Registration Page!</h1>
      <p>just enter your username and email and enjoy the ride, tottaly free subscribtion.</p>

     
            <?php
               if (isset($msg)) {
                  echo "<div style='background:red'>".$msg."</div>";
               }
               $attributes = array('class' => 'px-4 py-3');
               echo form_open('User_controller/add_user',$attributes);
               echo "<div class='form-group'>";
               echo form_label('username');
               echo form_input (array('id'=>'username','name'=>'username','required'=>'required', 'value'=>(isset($username) ? $username : ""),'class'=>'form-control'));
                echo "<br/>";
               echo "</div>";
               echo "<div class='form-group'>";
               echo form_label('email');
               $email33=form_input(array('id'=>'email','name'=>'email','required'=>'required' ,"type"=>"email", 'value'=>(isset($email) ? $email : ""),'class'=>'form-control'));
               echo $email33;
               echo "<br/>";
               echo "</div>";
               $Gkey=$this->config->item('google_key');
               echo "<div class='g-recaptcha' data-sitekey=$Gkey data-callback='captchaCallback'> </div>";
               echo form_submit(array('id'=>'submit','value'=>'Add','class'=> 'btn btn-primary'));
               echo form_close();

            ?>
         
           

            </div>
         </header>
     

  <script> $(function() {
      $("#submit").hide(); 
   });
      </script>

 <!--<script>
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
      </script>-->
      </body>
   </html>
