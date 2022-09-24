<!DOCTYPE html>
<html>
	<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- end bootstrap css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>

    <!-- Developer Created Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/Common/Registration.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <title>Alagang Pilipinas</title>
    
    </head>
    <body style="font-family: Raleway;" class="registrationBody" >
        <!-- ---------------------------------------------HEADER--------------------------------------------- -->

        <div class="primaryContainer" style="background: url(<?php echo base_url('application/assets/images/loginbackground.png')?>); background-repeat: no-repeat; background-size: cover; background-blend-mode: darken;">
            <div class="registrationPanel">
                <center>
                    <p class="subtitle1">WELCOME TO</p>
                    <P class="title">Alagang Pilipinas</P>
                    <p class="subtitle2 mt-5">Sign Up as Seller</p>
                </center>
                <?php echo form_open_multipart('Common/RegistrationSeller/saveUser') ?>
                
                    <div class="m-auto w-50">

                        <!-- RESULT NOTIFICATION  -->
                        <?php if($this->session->flashdata('successSellerCreate')){ ?>
                            <div class="alert alert-success" > 
                                <?php  echo $this->session->flashdata('successSellerCreate'); $this->session->unset_userdata ( 'successSellerCreate' );?>
                            </div>
                        <?php } ?>  
                        <?php if ($this->session->flashdata('errorSellerCreate')){ ?>
                            <div class="alert alert-danger" > 
                                <?php  echo $this->session->flashdata('errorSellerCreate'); $this->session->unset_userdata ( 'errorSellerCreate' );?>
                            </div>
                        <?php } ?>

                        <div class="form-label-group">
                            <input name="userFirstname" type="text" id="userFirstname" class="inputDesign form-control" placeholder="First Name" value="">
                            <label for="userFirstname" class="labelDesign spacing">First Name</label>
                        </div>
                
                        <div class="form-label-group mt-3">
                            <input name="userLastname" type="text" id="userLastname" class="inputDesign form-control" placeholder="Last Name" value="">
                            <label for="userLastname" class="labelDesign spacing">Last Name</label>
                        </div>

                        <div class="form-label-group mt-3">
                            <input name="userName" type="text" id="userName" class="inputDesign form-control" placeholder="User Name">
                            <label for="userName" class="labelDesign">User Name</label>
                        </div>
                        <div class="form-label-group mt-3">
                            <?php
                                $userRoles = array(
                                    '' => 'User Role',
                                    "Admin" => "Admin", //all
                                    "Operations" => "Operations", //support, ping
                                    "Finance" => "Finance", //inventory product, iventory services
                                    "HumanResource" => "HumanResource", //transactions
                                ); 
                                echo form_dropdown('userRole', $userRoles, '', 'class="form-control dropdown d-none" id="userRole"');
                                ?>
                                <!-- <label for="userRole">User Role</label> -->
                        </div>  
                        <div class="form-label-group mt-3">
                            <input name="userPassword" type="password" id="userPassword" class="inputDesign form-control" placeholder="Password">
                            <label for="userPassword" class="labelDesign">Password</label>
                        </div>

                        <div class="form-label-group mt-3">
                            <input name="userRePassword" type="password" id="userRePassword" class="inputDesign form-control" placeholder="Confirm Password">
                            <label for="userRePassword" class="labelDesign">Confirm Password</label>
                        </div>

                        <center>
                            <button type="submit" class="btn my-3" >Submit</button>
                        </center>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>

        <!-- ---------------------------------------------SCRIPT--------------------------------------------- -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>		
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
	
		
		<script src="https://code.highcharts.com/highcharts.js"></script>

		<!-- developer js -->

    </body>
</html>