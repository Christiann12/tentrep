<div class="clinicProfile">
    <div class="design" <?php echo $productData->storepicture != 'empty' ? 'style="background: url('.base_url('application/assets/images/storeimage/'.$productData->storepicture).'); background-size: cover; background-repeat: no-repeat;  background-position: center;"  ' : 'style="background: url('.base_url('application/assets/images/customerbackground.png').'); background-size: cover; background-repeat: no-repeat;  background-position: center;"  ' ; ?>>

    </div>
    <div class="banner">
        <div class="row">
            <div class="" style="background-size: cover; margin-top:-130px;">
                <img class="border border-white rounded-circle" src="<?php 

                    if(empty($productData)){
                        echo base_url('application/assets/images/defaultprofile.png');
                    }
                    else if($productData->profilepic != 'empty'){
                        echo base_url('application/assets/images/profilepic/'.$productData->profilepic);
                    }
                    else{
                        echo base_url('application/assets/images/defaultprofile.png');
                    }
                
                ?>" alt="" width="250" height="250">
            </div>
            <div class="ml-3 ml-lg-5 mt-5 mt-lg-0">
                <p class="greeting"><strong><?php echo $productData->storeName;?></strong></p>
                <p class="clock"><?php echo 'Store Owner: '.$productData->fname.' '.$productData->lname;?></p>
            </div>
        </div>
    </div>
    <div class="section1">
        <p class="header m-0">Product Information</p>
        <div class="clinicInformation">
            <?php echo form_open_multipart('') ?>
                <img class="rounded"src="<?php echo $productData->productImage != 'empty' ? base_url('application/assets/images/productimage/'.$productData->productImage) : base_url('application/assets/images/noimage.png')  ?>" width="250" height="250"alt="">
                <div class="form-label-group mt-3">
                    <label for="rating" class="labelDesign">Product Rating [<?= sizeof($reviews); ?>]</label>
                    <input name="rating" type="text" class="kv-uni-star rating-loading" readonly value="<?= empty($avgRating->averageRating) ? 0 : $avgRating->averageRating ; ?>" data-size="md" title="">
                    
                </div>
                <div class="mt-3 form-label-group">
                    <label for="productName" class="labelDesign">Product Name</label>
                    <input readonly name="productName" type="text" id="productName" class="inputDesign form-control" placeholder="Product Name" value="<?php echo !empty($productData) ? $productData->name : null ?>">
                </div>
                <div class="form-label-group">
                    <label for="prodDesc" class="labelDesign mt-3">Product Description</label>
                    <textarea readonly name="prodDesc" id="prodDesc" class="inputDesign form-control" placeholder="Product Description"><?php echo !empty($productData) ? $productData->productdesc : null ?></textarea>
                </div>
                <div class="form-label-group">
                    <label for="Category" class="labelDesign mt-3">Product Category</label>
                    <textarea readonly name="Category" id="Category" class="inputDesign form-control" placeholder="Category"><?php echo !empty($productData) ? $productData->category : null ?></textarea>
                </div>
                <div class="form-label-group">
                    <label for="Price" class="labelDesign mt-3">Product Price</label>
                    <textarea readonly name="Price" id="Price" class="inputDesign form-control" placeholder="Price"><?php echo !empty($productData) ? $productData->productPrice : null ?></textarea>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
    <div class="section1">
        <p class="header m-0">Store Information</p>
        <div class="clinicInformation">
            <?php echo form_open_multipart('') ?>
                <div class="row">

                    <div class="col-6 form-label-group">
                        <label for="region" class="labelDesign">Region</label>
                        <input readonly name="region" type="text" id="region" class="inputDesign form-control" placeholder="Region" value="<?php echo !empty($productData) ? $productData->region : null ?>">
                    </div>

                    <div class="col-6 form-label-group">
                        <label for="province" class="labelDesign">Province</label>
                        <input readonly name="province" type="text" id="province" class="inputDesign form-control" placeholder="Province" value="<?php echo !empty($productData) ? $productData->province : null ?>">
                    </div>

                    <div class="col-6 form-label-group">
                        <label for="municipality" class="labelDesign mt-3">Municipality</label>
                        <input readonly name="municipality" type="text" id="municipality" class="inputDesign form-control" placeholder="Municipality" value="<?php echo !empty($productData) ? $productData->municipality : null ?>" >
                    </div>

                    <div class="col-6 form-label-group">
                        <label for="barangay" class="labelDesign mt-3">Barangay</label>
                        <input readonly name="barangay" type="text" id="barangay" class="inputDesign form-control" placeholder="Barangay" value="<?php echo !empty($productData) ? $productData->barangay : null ?>">
                    </div>

                </div>
                <div class="mt-3 form-label-group">
                    <label for="address" class="labelDesign">Address</label>
                    <input readonly name="address" type="text" id="address" class="inputDesign form-control" placeholder="Address" value="<?php echo !empty($productData) ? $productData->address : null ?>">
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
    <div class="section2">
        <p class="header m-">Ratings</p>
            
        <div class="ratingTab">
            <div class="container">
                <div class='clearfix'>
                    <a href='<?= base_url('ReviewProduct/'.$productData->productId); ?>' class="btn mb-5 pull-right">Add Review</a>
                </div>
                
                <?php if(!empty($reviews)):?>
                    <?php foreach($reviews as $item): ?>
                        <div class="ratingPanel card mt-3">
                            <div class="row ">
                                <div class="col-3" style="border-right: 1px solid grey;">
                                    <center>
                                        <img class="border border-white rounded-circle mt-3" src="<?= empty($item->pictureUrl) ? base_url('application/assets/images/defaultprofile.png') : base_url('application/assets/images/profilepic/'.$item->pictureUrl) ; ?>" alt="profilePic" width="50" height="50">
                                        <p><?= $item->fname.' '.$item->lname?></p>
                                        <p><?= $item->date ?></p>
                                    </center>
                                </div>
                                <div class="col-9">
                                    <input name="rating" type="text" class="kv-uni-star rating-loading" readonly value="<?= $item->rating ?>" data-size="md" title="">
                                    <p class="">
                                        <?= $item->comment ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>    
                <?php else: ?>
                    <div class="ratingPanel card mt-3">
                       <center>
                            <p>
                                No Review Available!
                            </p>
                       </center>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>