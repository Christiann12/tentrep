<?php
if( isset($_POST['selectedRegion']) && isset($_POST['selectedProvince']) && isset($_POST['selectedMuni']) ){
    $json2 = file_get_contents(base_url('application/assets/json/list.json'));
    $BrgyLocationlist = json_decode($json2,true);
    // echo json_encode($munilocationlist['01']['province_list']['ILOCOS NORTE']['municipality_list']);
    if($_POST['selectedRegion'] != "Default" && $_POST['selectedProvince'] !=="Default" && $_POST['selectedMuni'] != "Default"){
        // echo json_encode($BrgyLocationlist['01']['province_list']['PANGASINAN']['municipality_list']);
        echo json_encode($BrgyLocationlist[
            $_POST['selectedRegion'] == 'REGION I'?'01': 
            ($_POST['selectedRegion'] == 'REGION II'?'02': 
            ($_POST['selectedRegion'] == 'REGION III'?'03': 
            ($_POST['selectedRegion'] == 'REGION IV-A'?'4A': 
            ($_POST['selectedRegion'] == 'REGION IV-B'?'4B': 
            ($_POST['selectedRegion'] == 'REGION V'?'05': 
            ($_POST['selectedRegion'] == 'REGION VI'?'06': 
            ($_POST['selectedRegion'] == 'REGION VII'?'07': 
            ($_POST['selectedRegion'] == 'REGION VIII'?'08': 
            ($_POST['selectedRegion'] == 'REGION IX'?'09': 
            ($_POST['selectedRegion'] == 'REGION X'?'10': 
            ($_POST['selectedRegion'] == 'REGION XI'?'11': 
            ($_POST['selectedRegion'] == 'REGION XII'?'12': 
            ($_POST['selectedRegion'] == 'REGION XIII'?'13': 
            $_POST['selectedRegion'])))))))))))))
        ]['province_list'][$_POST['selectedProvince']]['municipality_list'][$_POST['selectedMuni']]['barangay_list']);
    }
    else{
        echo $_POST['selectedMuni'];
    }
    exit;
   }
else if( isset($_POST['selectedRegion']) && isset($_POST['selectedProvince']) ){
    $json2 = file_get_contents(base_url('application/assets/json/list.json'));
    $munilocationlist = json_decode($json2,true);
    // echo json_encode($munilocationlist['01']['province_list']['ILOCOS NORTE']['municipality_list']);
    if($_POST['selectedRegion'] != "Default" && $_POST['selectedProvince'] !=="Default"){
        //echo json_encode($munilocationlist['01']['province_list']['PANGASINAN']['municipality_list']);
        echo json_encode($munilocationlist[
            $_POST['selectedRegion'] == 'REGION I'?'01': 
            ($_POST['selectedRegion'] == 'REGION II'?'02': 
            ($_POST['selectedRegion'] == 'REGION III'?'03': 
            ($_POST['selectedRegion'] == 'REGION IV-A'?'4A': 
            ($_POST['selectedRegion'] == 'REGION IV-B'?'4B': 
            ($_POST['selectedRegion'] == 'REGION V'?'05': 
            ($_POST['selectedRegion'] == 'REGION VI'?'06': 
            ($_POST['selectedRegion'] == 'REGION VII'?'07': 
            ($_POST['selectedRegion'] == 'REGION VIII'?'08': 
            ($_POST['selectedRegion'] == 'REGION IX'?'09': 
            ($_POST['selectedRegion'] == 'REGION X'?'10': 
            ($_POST['selectedRegion'] == 'REGION XI'?'11': 
            ($_POST['selectedRegion'] == 'REGION XII'?'12': 
            ($_POST['selectedRegion'] == 'REGION XIII'?'13': 
            $_POST['selectedRegion'])))))))))))))
        ]['province_list'][$_POST['selectedProvince']]['municipality_list']);
    }
    else{
        echo $_POST['selectedProvince'];
    }
    exit;
   }
else if( isset($_POST['selectedRegion']) ){
 //echo $_POST['selectedRegion'];
 $json1 = file_get_contents(base_url('application/assets/json/list.json'));
 $provincelocationlist = json_decode($json1,true);
//  echo json_encode($provincelocationlist['01']['province_list']['ILOCOS NORTE']['municipality_list']['BANGUI']['barangay_list']);
//  echo json_encode($provincelocationlist['01']['province_list']);
    if($_POST['selectedRegion'] != "Default"){
        echo json_encode($provincelocationlist[
            $_POST['selectedRegion'] == 'REGION I'?'01': 
            ($_POST['selectedRegion'] == 'REGION II'?'02': 
            ($_POST['selectedRegion'] == 'REGION III'?'03': 
            ($_POST['selectedRegion'] == 'REGION IV-A'?'4A': 
            ($_POST['selectedRegion'] == 'REGION IV-B'?'4B': 
            ($_POST['selectedRegion'] == 'REGION V'?'05': 
            ($_POST['selectedRegion'] == 'REGION VI'?'06': 
            ($_POST['selectedRegion'] == 'REGION VII'?'07': 
            ($_POST['selectedRegion'] == 'REGION VIII'?'08': 
            ($_POST['selectedRegion'] == 'REGION IX'?'09': 
            ($_POST['selectedRegion'] == 'REGION X'?'10': 
            ($_POST['selectedRegion'] == 'REGION XI'?'11': 
            ($_POST['selectedRegion'] == 'REGION XII'?'12': 
            ($_POST['selectedRegion'] == 'REGION XIII'?'13': 
            $_POST['selectedRegion'])))))))))))))
            ]['province_list']);
    }
    else{
        echo $_POST['selectedRegion'];
    }
 exit;
}

// Handle AJAX request (end)
?>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div class="sidebar-heading mb-3">
            <center>
                <img src="<?php echo base_url(); ?>application/assets/images/logo1.png" alt="logo"class="d-none">
                <h6 class="mt-5">Alagang Pilipinas</h6>
            </center>
            <p class="text-center">
               <!-- AppEATite -->
            </p>
        </div>
        <div class="list-group list-group-flush" >

            <?php if (strtolower($this->session->userdata('userRole')) == "customer" ){?>
                <a href="<?php echo base_url('Home')?>" class=" <?php echo ((strtolower($this->uri->segment(1)) == 'home') ? "active" : null) ?> list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Home">Home</a>
                <a href="<?php echo base_url('EditProfileCustomer')?>" class=" <?php echo ((strtolower($this->uri->segment(1)) == 'editprofilecustomer') ? "active" : null) ?> list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Home">Edit Profile</a>
                <a href="<?php echo base_url('Clinics')?>" class=" <?php echo ((strtolower($this->uri->segment(1)) == 'clinics') ? "active" : null) ?> list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Home">Clinics</a>
                <a href="<?php echo base_url('Home')?>" class=" <?php echo ((strtolower($this->uri->segment(1)) == 'stores') ? "active" : null) ?> list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Home">Stores</a>
            <?php } ?>

            <?php if (strtolower($this->session->userdata('userRole')) == "vet" ){?>
                <a href="<?php echo base_url('ProfileVet')?>" class=" <?php echo ((strtolower($this->uri->segment(1)) == 'profilevet') ? "active" : null) ?> list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Home">Profile</a>
                <a href="<?php echo base_url('EditProfileVet')?>" class=" <?php echo ((strtolower($this->uri->segment(1)) == 'editprofilevet') ? "active" : null) ?> list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Home">Edit Profile</a>
            <?php } ?>
            
            <?php if (strtolower($this->session->userdata('userRole')) == "seller" ){?>
                <a href="<?php echo base_url('ProfileSeller')?>" class=" <?php echo ((strtolower($this->uri->segment(1)) == 'profileseller') ? "active" : null) ?> list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Home">Profile</a>
                <a href="<?php echo base_url('EditProfileSeller')?>" class=" <?php echo ((strtolower($this->uri->segment(1)) == 'editprofileseller') ? "active" : null) ?> list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Home">Edit Profile</a>
                <a href="<?php echo base_url('AddProduct')?>" class=" <?php echo ((strtolower($this->uri->segment(1)) == 'addproduct' || strtolower($this->uri->segment(1)) == 'editproduct') ? "active" : null) ?> list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Home">Add Product</a>
            <?php } ?>

            <a href="<?php echo base_url('Common/Login/signout')?>" class="list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Log Out" style=" position: absolute; bottom: 0;">Sign Out</a>
        </div>
        
    </div>
    <!-- /#sidebar-wrapper -->

   <!-- Admin Navbar -->
    <div id="page-content-wrapper">
        <!-- Page content -->
        <?php include $page.".php";?> 
        <!-- end of page content -->
    </div>
    <!-- /#page-content-wrapper -->

</div>
  <!-- /#wrapper -->