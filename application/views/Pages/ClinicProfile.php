<div class="clinicProfile">
    <div class="design" <?php echo $vetData->clinicpicture != 'empty' ? 'style="background: url('.base_url('application/assets/images/clinicpicture/'.$vetData->clinicpicture).'); background-size: cover; background-repeat: no-repeat;  background-position: center;"  ' : 'style="background: url('.base_url('application/assets/images/customerbackground.png').'); background-size: cover; background-repeat: no-repeat;  background-position: center;"  ' ; ?>>

    </div>
    <div class="banner">
        <div class="row">
            <div class="" style="background-size: cover; margin-top:-130px;">
                <img class="border border-white rounded-circle" src="<?php 

                    if(empty($vetData)){
                        echo base_url('application/assets/images/defaultprofile.png');
                    }
                    else if($vetData->pictureUrl != 'empty'){
                        echo base_url('application/assets/images/profilepic/'.$vetData->pictureUrl);
                    }
                    else{
                        echo base_url('application/assets/images/defaultprofile.png');
                    }
                
                ?>" alt="" width="250" height="250">
            </div>
            <div class="ml-3 ml-lg-5 mt-5 mt-lg-0">
                <p class="greeting"><strong><?php echo $vetData->fname.' '.$vetData->lname ;?></strong></p>
                <!-- <p class="clock"id="ct7"><?php echo date('m/d/Y - g:i:s A') ?></p> -->
            </div>
        </div>
    </div>
    <div class="section1">
        <p class="header m-0">Clinic Information</p>
        <div class="clinicInformation">
            <?php echo form_open_multipart('Common/RegistrationCustomer/saveUser') ?>
                <div class="form-label-group">
                    <label for="rating" class="labelDesign">Clinic Rating [<?= sizeof($reviews); ?>]</label>
                    <input name="rating" type="text" class="kv-uni-star rating-loading" readonly value="<?= empty($avgRating->averageRating) ? 0 : $avgRating->averageRating ; ?>" data-size="md" title="">
                </div>
                <div class="mt-3 form-label-group">
                    <label for="clinicName" class="labelDesign">Clinic Name</label>
                    <input readonly name="clinicName" type="text" id="clinicName" class="inputDesign form-control" placeholder="Clinic Name" value="<?php echo !empty($vetData) ? $vetData->clinicName : null ?>">
                </div>
                <div class="form-label-groupmt-3">
                    <label for="description" class="labelDesign mt-3">Description</label>
                    <textarea readonly name="description" id="description" class="inputDesign form-control" placeholder="Description"><?php echo !empty($vetData) ? $vetData->desc : null ?></textarea>
                </div>
                <div class="row mt-3">

                    <div class="col-6 form-label-group">
                        <label for="region" class="labelDesign">Region</label>
                        <input readonly name="region" type="text" id="region" class="inputDesign form-control" placeholder="Region" value="<?php echo !empty($vetData) ? $vetData->region : null ?>">
                    </div>
            
                    <div class="col-6 form-label-group">
                        <label for="province" class="labelDesign">Province</label>
                        <input readonly name="province" type="text" id="province" class="inputDesign form-control" placeholder="Province" value="<?php echo !empty($vetData) ? $vetData->province : null ?>">
                    </div>

                    <div class="col-6 form-label-group">
                        <label for="municipality" class="labelDesign mt-3">Municipality</label>
                        <input readonly name="municipality" type="text" id="municipality" class="inputDesign form-control" placeholder="Municipality" value="<?php echo !empty($vetData) ? $vetData->municipality : null ?>" >
                    </div>

                    <div class="col-6 form-label-group">
                        <label for="barangay" class="labelDesign mt-3">Barangay</label>
                        <input readonly name="barangay" type="text" id="barangay" class="inputDesign form-control" placeholder="Barangay" value="<?php echo !empty($vetData) ? $vetData->barangay : null ?>">
                    </div>
                </div>
                <div class="mt-3 form-label-group">
                    <label for="address" class="labelDesign">Address</label>
                    <input readonly name="address" type="text" id="address" class="inputDesign form-control" placeholder="Address" value="<?php echo !empty($vetData) ? $vetData->address : null ?>">
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
    <div class="section2">
        <p class="header m-">Ratings</p>
            
        <div class="ratingTab">
            <div class="container">
                <div class='clearfix'>
                    <a href='<?= base_url('ReviewVet/'.$vetData->vetId); ?>' class="btn mb-5 pull-right">Add Review</a>
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