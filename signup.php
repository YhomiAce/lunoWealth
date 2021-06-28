<?php
  require_once "config/header2.php";
  session_start();
  if (isset($_SESSION['user'])) {
    header("Location: index.php");
  }
  
?>

<style>

::placeholder { 

    color: #fff;
    opacity: 1; 
}

</style>

<section id="inner_page_infor" class="innerpage_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">
                        <div class="inner_page_info wow bounceIn">
                            <h3>Sign <span>Up</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="inner-bg">
<div class="container">
	<div class="box6">


<div class="col-md-10 col-md-offset-1">
<div class="form_box">



      <div class="main_title text-center">
              <h2 class="pink_title"> Register Your Account</h2>
            </div>

<div class="row">
  
 
<form method="post" id="register-form" name="regform">
   <div id="regAlert" class="text-center text-danger regAlert"></div>
 
  <div class="col-sm-6">
    <div class="form_block">
      <span>
        <input placeholder="Your Full Name"  type="text" required name="name" value="" class="inpts" size=30>
        <i class="fa fa-user"></i>
      </span>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form_block">
        <span>
          <input placeholder="Your E-mail Address" required type="email" name="email" value="" class="inpts" size=30>
          <i class="fa fa-envelope"></i>
        </span>
    </div>
</div>


<div class="col-sm-6">
  <div class="form_block">
    <span>                
      <input autocomplete="off" placeholder="Define Password" required  type=password name=password id="password" class=inpts size=30>
      <i class="fa fa-key"></i>
    </span>
  </div>
</div>	


<div class="col-sm-6">
  <div class="form_block">
    <span>
      <input autocomplete="off" placeholder="Retype Password" required  type=password name=password2 id="cpassword" class=inpts size=30>
      <i class="fa fa-key"></i>
    </span>
  </div>
</div>	

<div class="col-sm-6">
  <div class="form_block">
    <span>
      <input autocomplete="off" placeholder="Token given" required  type=text name="token" value="" class=inpts size=30>
      <i class="fa  fa-question"></i>
    </span>
  </div>
</div>

 <div class="col-sm-12">
    <div class="form_block check_block text-center">
      <span>
       <input autocomplete="off" type=checkbox name=agree value=1  > I agree with <a href=terms.php>Terms and conditions</a>
      </span> 
    </div>
</div>
                        
                        
                        
                        
                         <div class="col-sm-12">
                        	<div class="form_block check_block text-center">
                            	<span>
                          
                        
                        
Already Registered <a href="login.php">Login</a>

 </span> </div>
                        </div>
                        
                        
                        
                        
                        

    <div class="col-sm-12">
                        	<div class="submit_btn text-center">
                            
                          
                        

<input type=submit value="Register" name="Register" id="register-btn" class=sbmt>


  </div>     </div>	
                   
                        
                        
                        

</form>



  </div>



</div></div>

</div>
</div>
</section>


<?php
  require_once "config/footer.php";
?>