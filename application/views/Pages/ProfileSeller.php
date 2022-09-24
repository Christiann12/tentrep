<div class="profileSeller">
    <div class="design" <?php echo $userData->storepicture != 'empty' ? 'style="background: url('.base_url('application/assets/images/storeimage/'.$userData->storepicture).'); background-size: cover; background-repeat: no-repeat;  background-position: center;"  ' : 'style="background: url('.base_url('application/assets/images/customerbackground.png').'); background-size: cover; background-repeat: no-repeat;  background-position: center;"  '; ?>>
       
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
        <p class="header m-0">User Information</p>
        <div class="userInformation">
            <?php echo form_open_multipart('Common/RegistrationCustomer/saveUser') ?>
                
                <div class="row">

                    <div class="col-6 form-label-group">
                        <label for="userFirstname" class="labelDesign">First Name</label>
                        <input readonly name="userFirstname" type="text" id="userFirstname" class="inputDesign form-control" placeholder="First Name" value="<?php echo !empty($userData) ? $userData->fname : null ?>">
                    </div>
            
                    <div class="col-6 form-label-group">
                        <label for="userLastname" class="labelDesign">Last Name</label>
                        <input readonly name="userLastname" type="text" id="userLastname" class="inputDesign form-control" placeholder="Last Name" value="<?php echo !empty($userData) ? $userData->lname : null ?>">
                    </div>

                    <div class="col-6 form-label-group">
                        <label for="userName" class="labelDesign mt-3">User Name</label>
                        <input readonly name="userName" type="text" id="userName" class="inputDesign form-control" placeholder="User Name" value="<?php echo !empty($userData) ? $userData->userName : null ?>" >
                    </div>

                    <div class="col-6 form-label-group">
                        <label for="userId" class="labelDesign mt-3">User Id</label>
                        <input readonly name="userId" type="text" id="userId" class="inputDesign form-control" placeholder="User Id" value="<?php echo !empty($userData) ? $userData->sellerId : null ?>">
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
    <div class="section2">
        <p class="header m-0">Clinic Information </p>
        <?php 
        if(empty($userData)){
            echo null;
        }
        else if($userData->region == 'region' || $userData->province == 'province' || $userData->municipality == 'municipality' || $userData->barangay == 'barangay' || $userData->address == 'address' || $userData->storeName == 'store name' || $userData->desc == 'description'){
            echo '<p class="spacing"> It looks like you haven\'t set this up properly! Kindly go to Edit Profile right now.</p>';
        }
        else{
            echo null;
        }
        ?>
        
        <div class="addressInformation">
            <?php echo form_open_multipart('Common/RegistrationCustomer/saveUser') ?>
                
                <div class="w-100">

                    <div class="form-label-group">
                        <label for="storeName" class="labelDesign">Store Name</label>
                        <input readonly name="storeName" type="text" id="storeName" class="inputDesign form-control" placeholder="Store Name" value="<?php echo !empty($userData) ? $userData->storeName : null ?>">
                    </div>

                    <div class="form-label-group">
                        <label for="description" class="labelDesign mt-3">Description</label>
                        <textarea readonly name="description" id="description" class="inputDesign form-control" placeholder="Description"><?php echo !empty($userData) ? $userData->desc : null ?></textarea>
                    </div>

                    <div class="form-label-group">
                        <label for="userRegion" class="labelDesign mt-3">Region</label>
                        <input readonly name="userRegion" type="text" id="userRegion" class="inputDesign form-control" placeholder="Region" value="<?php echo !empty($userData) ? $userData->region : null ?>">
                    </div>
            
                    <div class="form-label-group">
                        <label for="userProvince" class="labelDesign mt-3">Province</label>
                        <input readonly name="userProvince" type="text" id="userProvince" class="inputDesign form-control" placeholder="Province" value="<?php echo !empty($userData) ? $userData->province : null ?>">
                    </div>

                    <div class="form-label-group">
                        <label for="userMuni" class="labelDesign mt-3">Municipality</label>
                        <input readonly name="userMuni" type="text" id="userMuni" class="inputDesign form-control" placeholder="Municipality" value="<?php echo !empty($userData) ? $userData->municipality : null ?>">
                    </div>

                    <div class="form-label-group">
                        <label for="userBrngy" class="labelDesign mt-3">Barangay</label>
                        <input readonly name="userBrngy" type="text" id="userBrngy" class="inputDesign form-control" placeholder="Barangay" value="<?php echo !empty($userData) ? $userData->barangay : null ?>">
                    </div>

                    <div class="form-label-group">
                        <label for="userAddrs" class="labelDesign mt-3">Address</label>
                        <input readonly name="userAddrs" type="text" id="userAddrs" class="inputDesign form-control" placeholder="Address" value="<?php echo !empty($userData) ? $userData->address : null ?>">
                    </div>

                </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>