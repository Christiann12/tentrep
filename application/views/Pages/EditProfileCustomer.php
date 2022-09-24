<div class="editProfileCustomer">
    <div class="banner">
        <p class="greeting">Edit Profile</strong></p>
        <p class="clock"id="ct7"><?php echo date('m/d/Y - g:i:s A') ?></p>
    </div>
    <div class="section1">
        
        <div class="userform m-0">

             <!-- RESULT NOTIFICATION  -->
            <?php if($this->session->flashdata('successEditVet')){ ?>
                <div class="alert alert-success mt-3" > 
                    <?php  echo $this->session->flashdata('successEditVet'); $this->session->unset_userdata ( 'successEditVet' );?>
                </div>
            <?php } ?>  
            <?php if ($this->session->flashdata('failEditVet')){ ?>
                <div class="alert alert-danger mt-3" > 
                    <?php  echo $this->session->flashdata('failEditVet'); $this->session->unset_userdata ( 'failEditVet' );?>
                </div>
            <?php } ?>
            
            <?php echo form_open_multipart('Pages/EditProfileCustomer/saveEdit') ?>
                <p class="header m-0">Personal Information</p>

                <div class="form-label-group">
                    <label for="userFirstname" class="labelDesign">First Name</label>
                    <input name="userFirstname" type="text" id="userFirstname" class="inputDesign form-control" placeholder="First Name" value="<?php echo !empty($userData) ? $userData->fname : null ?>">
                </div>
        
                <div class="form-label-group mt-3">
                    <label for="userLastname" class="labelDesign">Last Name</label>
                    <input name="userLastname" type="text" id="userLastname" class="inputDesign form-control" placeholder="Last Name" value="<?php echo !empty($userData) ? $userData->lname : null ?>">
                </div>

                <div class="form-label-group mt-3">
                    <label for="userPassword" class="labelDesign">Password</label>
                    <input name="userPassword" type="password" id="userPassword" class="inputDesign form-control" placeholder="Password">
                </div>

                <div class="form-label-group mt-3">
                    <label for="userRePassword" class="labelDesign">Confirm Password</label>
                    <input name="userRePassword" type="password" id="userRePassword" class="inputDesign form-control" placeholder="Confirm Password">
                </div>
                
                <div class="form-label-group d-none">
                    <label for="filename" class="labelDesign">File Name</label>
                    <input readonly name="filename" type="text" id="filename" class="inputDesign form-control" placeholder="File Name" value="<?php echo !empty($userData) ? $userData->pictureUrl : null ?>">
                </div>

                <div class="form-label-group mt-3">
                    <label for="attachment" class="labelDesign mt-3">Change Profile Picture: </label>
                    <input type="file" name="attachment" id="attachment" class="">
                </div> 

                <p class="header m-0">Address Information</p>
                
                <div class="form-group">                      
                    <div class="form-group"> 
                        <label>Region </label>
                            <?php
                                $regionList = array(''=>'Select Region');
                            
                                $json = file_get_contents(base_url('application/assets/json/list.json'));
                                $locationlist = json_decode($json,true);
                        
                                foreach ($locationlist as $locationlists){
                                    
                                    $regionList[$locationlists['region_name']] = $locationlists['region_name'];
                                }
                                echo form_dropdown('region_group', $regionList, 'Select Region', 'class="form-control" id="region_group" '); 
                            ?>
                    </div>
                </div>
                <div class="form-group">                      
                    <div class="form-group"> 
                        <label>Province </label>
                            <?php
                                $provinceList = array(''=>'Select Province');
                                echo form_dropdown('province_group', $provinceList, 'Select Province', 'class="form-control" id="province_group" '); 
                            ?>
                    </div>
                </div>
                <div class="form-group">                      
                    <div class="form-group"> 
                        <label>Municipality </label>
                            <?php
                                $muniList = array(''=>'Select Municipality');
                                echo form_dropdown('muni_group', $muniList, 'Select Municipality', 'class="form-control" id="muni_group" '); 
                            ?>
                    </div>
                </div>
                <div class="form-group">                      
                    <div class="form-group"> 
                        <label>Barangay </label>
                            <?php
                                $brgyList = array(''=>'Select Barangay');
                                echo form_dropdown('barangay_group', $brgyList, 'Select Barangay', 'class="form-control" id="barangay_group" '); 
                            ?>
                    </div>
                </div>
                
                <button type="submit" class="btn my-3" >Submit</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>