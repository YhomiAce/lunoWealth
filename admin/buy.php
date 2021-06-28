<?php include('adminHeader.php')?>



<div class="addNewProduct">
        <div class="div1 div1Up">
            <h2>Product Details</h2>

            <div class="productDetails">
                <form action="#" method="post">
                    <input type="text" placeholder="Product Name"><br>
                    <textarea name="" id="" placeholder="Summary (short description)"></textarea><br>
                    <textarea name="" id="" placeholder="Description" class="textarea2"></textarea>
                </form>
            </div>
            <div class="div1">
                <h2>Pricing</h2>
    
                <div class="productDetails">
                    <form action="#" method="post">
                        <input type="text" placeholder="Product Name"><br><br>
                    </form>
                </div>
            </div>
        </div>

        <div class="div1 div1Up">
            <h2>Product Details</h2>

            <div class="productDetails">
                <form action="#" method="post">
                    <br>
                    <div class="uploadPicturesSec">
                        <p><i class="fa fa-file"></i> Upload A Photo</p>
                        <div class="previewImageSide">
                        <div class="previewImage tumaDiv" id="excossecblab">
                            <i class="fa fa-camera-retro myexcosCme"></i>
                            <img id='excosblab' src='#' class='tuma' style="display:none">      
                        </div>
                    </div>
                    </div>
                    <br>
                    <form id="form" action="home.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="8000000">
                        <h4><label class="new-button upLabel1" for="upload" title="Choose picture"><i class="fa fa-upload"></i>  Add Picture</label></h4>
                        <input type="file" name='upload[]' id="upload" onchange="uploadd(this)" class="new-button" multiple="multiple" style="padding:10px;"> 

                    </form>
                    <p class="picUploadNote">
                        Upload photos of your Product (first photo will be set as main feature image).
                         Be sure to upload high quality & focused images in good lighting where possible. Max file size per image  is 2 MB <br><br><br><br>
                    </p>
                </form>
            </div>

            <div class="div1">
                <h2>Shipping</h2>
    
                <div class="productDetails">
                    <form action="#" method="post">
                        <input type="text" placeholder="Shipping from (Your country)*"><br>
                        <input type="text" placeholder="Domestic Price"><br>
                        <input type="text" placeholder="International Price"><br>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
<script>
        function uploadd(input) {      
        var excosblab = document.getElementById('excosblab');
        var excossecblab = document.getElementById('excossecblab');
            if (input.files && input.files[0]) {
                document.querySelector('.myexcosCme').style.display="none"
                excossecblab.style.display = "block";
                excosblab.style.display = "block";
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#excosblab')
                            .attr('src', e.target.result)
                            .width(150)
                            .height(200);
                            };
                        reader.readAsDataURL(input.files[0]);
            }
    }
</script>

    <?php include('adminFooter.php') ?>