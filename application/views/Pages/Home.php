<style>
    .row {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display:         flex;
    flex-wrap: wrap;
    }
    .row > [class*='col-'] {
        display: flex;
        flex-direction: column;
    }
    
</style>
<div class="customerHomepage" >
    <div class="design" style="background: url(<?php echo base_url('application/assets/images/customerbackground.png')?>); background-repeat: no-repeat; background-size: cover;">
       
    </div>
    <div class="banner">
        <div class="row">
            <div class="" style="background-size: cover; margin-top:-130px;">
                <img class="border border-white rounded-circle" src="<?php 

                    if(empty($userData)){
                        echo base_url('application/assets/images/defaultprofile.png');
                    }
                    else if($userData->pictureUrl != 'empty'){
                        echo base_url('application/assets/images/profilepic/'.$userData->pictureUrl);
                    }
                    else{
                        echo base_url('application/assets/images/defaultprofile.png');
                    }
                
                ?>" alt="" width="250" height="250">
            </div>
            <div class="ml-3 ml-lg-5 mt-5 mt-lg-0">
                <p class="greeting"><strong><?php echo $this->session->userdata('firstName').' '.$this->session->userdata('lastName');?></strong></p>
                <p class="clock"id="ct7"><?php echo date('m/d/Y - g:i:s A') ?></p>
            </div>
        </div>
    </div>
    <div class="section2">
        <p class="header m-0">Veterinary clinics near you</p>
        <div class="vetClinics">
            <?php if($userData->region != 'region' || $userData->province != 'province' || $userData->municipality != 'municipality' || $userData->barangay != 'barangay') : ?>
                <div class="row">

                <?php if($recommendedClinics): ?>
                        <?php foreach($recommendedClinics as $test): ?>
                                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-3">

                                    <div class="col-12 card"  onclick="window.location='<?= base_url('ClinicProfile/'.$test->vetId); ?>'" style="background: url(<?php echo $test->clinicpicture == 'empty' ? base_url('application/assets/images/customerbackground.png') : base_url('application/assets/images/clinicpicture/'.$test->clinicpicture); ?>); background-size: cover; background-repeat: no-repeat;">
                                        <div class="cardBody">
                                            <p class="cardTitle"><?= $test->clinicName; ?></p>
                                            <div class="spacing">
                                                <input name="rating" type="text" class="kv-uni-star rating-loading" readonly value="<?= empty($test->averageRating) ? 0 : $test->averageRating ; ?>" data-size="sm" title="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        <?php  endforeach; ?>
                    <?php else: ?>
                        <div class="container">
                            <center>
                                <h5 class="text-muted">
                                    No veterinary clinics near you
                                </h5>
                            </center>
                        </div>
                    <?php endif;?>
                    
                </div>
                
            <?php else : ?>
                <div class="container">
                   <center>
                   <h5 class="text-muted">
                        Please Setup your account first. Go to Edit Profile!
                    </h5>
                   </center>
                </div>
            <?php endif; ?>
           
          
        </div> 
    </div>
    <div class="section2">
        <p class="header m-0">Recommended Products</p>
        <div class="vetClinics">
           
            <?php if($userData->region != 'region' || $userData->province != 'province' || $userData->municipality != 'municipality' || $userData->barangay != 'barangay') : ?>
                <div class="row">

                    <?php if($recommendedProducts): ?>
                        <?php foreach($recommendedProducts as $test): ?>
                                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-3">

                                    <div class="col-12 card"  onclick="window.location='<?= base_url('ProductInformation/'.$test->productId); ?>'" style="background: url(<?php echo $test->pictureUrl == 'empty' ? base_url('application/assets/images/noimage.png') : base_url('application/assets/images/productimage/'.$test->pictureUrl); ?>); background-size: cover; background-repeat: no-repeat;">
                                        <div class="cardBody">
                                            <p class="cardTitle"><?= $test->name; ?></p>
                                            <div class="spacing">
                                                <input name="rating" type="text" class="kv-uni-star rating-loading" readonly value="<?= empty($test->averageRating) ? 0 : $test->averageRating ; ?>" data-size="sm" title="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        <?php  endforeach; ?>
                    <?php else: ?>
                        <div class="container">
                            <center>
                                <h5 class="text-muted">
                                    No recommended products
                                </h5>
                            </center>
                        </div>
                    <?php endif;?>
                </div>
            
            <?php else : ?>
                <div class="container">
                   <center>
                   <h5 class="text-muted">
                        Please Setup your account first. Go to Edit Profile!
                    </h5>
                   </center>
                </div>
            <?php endif; ?>
          
        </div> 
    </div>
</div>