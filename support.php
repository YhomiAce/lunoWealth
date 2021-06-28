<?php
    require_once "config/header2.php";
?>
<style>

::placeholder { 

    color: #fff;
    opacity: 1; 
}
.google-maps {
        position: relative;
        padding-bottom: 50%; // This is the aspect ratio
        height: 0;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
	.location {
	
	margin-top:30px;
}

.location b {
	
	font-size: 16px;
    color: #e73cc6;
}

.location p {
	
    color: #000;
	padding:0px;
}

.sup-img {
	
	padding:0px 0px 0px 0px;
}

</style>

<section id="inner_page_infor" class="innerpage_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">
                        <div class="inner_page_info wow bounceIn">
                            <h3>SUPPORT <span>form</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<section class="inner-bg">
<div class="container">
	<div class="box6">

<div class="col-lg-12">
            	 
                <div class="form_box">
                	 
             <div class="main_title text-center">
            <h2 class="pink_title"> Contact our support </h2>
          </div>
          
                    
                    
                    
                    
             <div class="row">           
          
     
<div class="col-lg-6">





<script language=javascript>

function checkform() {
  if (document.mainform.name.value == '') {
    alert("Please type your full name!");
    document.mainform.name.focus();
    return false;
  }
  if (document.mainform.Phone.value == '') {
    alert("Please enter your e-mail address!");
    document.mainform.Phone.focus();
    return false;
  }
  if (document.mainform.message.value == '') {
    alert("Please type your message!");
    document.mainform.message.focus();
    return false;
  }
  return true;
}

</script>


<form method=post id="contact_form" name=mainform onsubmit="return checkform()">

<input type=hidden name=a value=support>

<input type=hidden name=action value=send>




 




  <div class="col-md-12">
                        	<div class="form_block">
                            	<span>




<input placeholder="Your Name" type="text" name="name" value="" size=30 class=inpts>

   <i class="fa fa-user"></i>
      
                                </span>
                            </div>
                        </div>
                        
                        

  <div class="col-md-12">
                        	<div class="form_block">
                            	<span>




<input placeholder="Your Phone" type="text" name="Phone" value="" size=30 class=inpts>
     <i class="fa fa-phone"></i>    
                                </span>
                            </div>
                        </div>
                        
                        
                        

<div class="col-md-12">
                        	<div class="form_block textarea_block">
                            	<span>

<textarea placeholder="Message" name=message class=inpts ></textarea>
   <i class="fa fa-comment"></i>
      
                                </span>
                            </div>
                        </div>
                        
                        



    <div class="col-md-12">
                        	<div class="submit_btn text-center">


<input type=submit id="contactForm" value="Send" class="sbmt btn btn-default">

</div>
                        </div>
                        
                        
 </div>




 
 <div class="col-lg-6">
 	<div class="sup-img">
    <img src="images/support2.jpg" class="img-responsive">
    </div>
                    
    <div class="location">
     <!--   <p><b>Address:</b> 78a Fouberts Place West Central, London, United Kingdom, W1F 7PQ</p>-->
        <p><b>E-mail:</b> admin@lunowealth.com</p>
    </div>
 </div>
 
</div>
</div>

        </form>
    
            
            
       </div></div>
       
       </div>
	</div>
</section>


<?php
    require_once "config/footer.php";
?>
