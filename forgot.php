<?php
    require_once "config/header2.php";
?>

<style>

::placeholder { 

    color: #000;
    opacity: 1; 
}
    input[type="text"], input[type="email"], input[type="password"], input[type="number"] {
    -webkit-box-shadow: inset 0px -1px 0px 0px rgba(217,63,135,1);
    -moz-box-shadow: inset 0px -1px 0px 0px rgba(217,63,135,1);
    box-shadow: inset 0px -1px 0px 0px rgba(217,63,135,1);
    width: 100%;
    height: 50px;
    padding: 0 15px;
    border-radius: 0;
    border: none;
    outline: none;
    font-size: 15px;
    color: #000;
    background: none;
    font-family: "open Sans", sans-serif;
}
table tbody td {
    text-align: left;
    font-size: 16px;
    color: #000;
    font-weight: normal;
    padding: 15px 15px;
    white-space: nowrap;
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    background: rgb(242, 244, 248);
}
</style>
<section id="inner_page_infor" class="innerpage_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">
                        <div class="inner_page_info wow bounceIn">
                            <h3>Forgot <span>password</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="inner-bg">
<div class="container">
	<div class="box6">


<center>



<form method=post id=forgot-form >
    <div id="forgotAlert" class="text-center text-danger "></div>

<table cellspacing=0 cellpadding=2 border=0 style="color:#555;">
<tr>
 <td>Type your username or e-mail:</td>
 <td style="padding-bottom: 20px;"><input type=text name='email'  required value="" class="form-control inpts" id="inputdefault" size=30></td>
</tr>
<tr>
 <td>&nbsp;</td>
<!--              -->
 <td><input style="    margin-left: 18px;" type=submit value="Forgot" id="forgot-btn" class=sbmt></td>
</tr>
</table>
</form>
</center>

</div></div>
</section>




<?php
    require_once "config/footer.php";
?>

