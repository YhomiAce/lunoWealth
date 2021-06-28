<?php 
    require_once "config/header2.php";
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
                            <h3>Member <span>Login</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="inner-bg">
<div class="container">
	<div class="box6">

<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
            	 
                <div class="form_box">
                	 
             <div class="main_title text-center">
            <h2 class="pink_title"> Login Your Account</h2>
          </div>
          
          
          

   
                              
       <div class="row">
                  
                
 
        








                            

<form method=post name=mainform id="login-form">
    <div id="loginAlert" class="text-center text-danger"></div>


  
    <div class="col-md-12">
        <div class="form_block">
            <span>                                  
                <i class="fa fa-user"></i>
                <input placeholder="Username" type=text required name=username value='' class=inpts size=30>
            </span>
        </div>
    </div>

<div class="col-md-12">
    <div class="form_block">
        <span>                                   
            <i class="fa fa-key"></i>
            <input placeholder="Password" type=password required name="login-password" value='' class=inpts size=30>
        </span>
    </div>
</div>
 





  
    <div class="col-md-12">
         <div class="form_block forgot_pwd text-center">
               <span>
                   <div class="pull-left"> <a  href="signup.php"> Register</a></div>
                          <div class="pull-right"><a href="forgot.php" >Forgot Password ?</a> </div>
                              </span>
                            </div>
                        </div>

       
    
                                  



<div class="col-md-12">
     <div class="submit_btn text-center">
                          
<input type=submit value="Login" id="login-btn" class=sbmt>

  </div></div>
                        
                        

     

</form>


     
                                
          </div>


</div></div>
        
        
     </div>
	</div>
</section>


<?php
    require_once "config/footer.php";
?>

