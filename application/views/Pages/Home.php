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
    <div class="section1">
        <p class="header m-0">Veterinary clinics near you</p>
        <div class="vetClinics">
            <?php if($userData->region != 'region' || $userData->province != 'province' || $userData->municipality != 'municipality' || $userData->barangay != 'barangay') : ?>
                <div class="row equal ">

                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name A very Long Name A very Long NameA very Long Name</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>

                    </div>
                    <div class="row  equal mt-3">

                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>

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
                <div class="row equal ">

                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name A very Long Name A very Long NameA very Long Name</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>

                    </div>
                    <div class="row  equal mt-3">

                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="col-12 card"  style="background: url(<?php echo base_url('application/assets/images/loginbackground.png'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <p class="cardTitle">A very Long Name</p>
                        </div>
                    </div>

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