<div class="reviewPage">
    <div class="banner">
        <p class="greeting"><?= $productData->name ?></p>
        <p class="content">Location:<span class='notbold'><?= $productData->address.', '.$productData->region.', '.$productData->province.', '.$productData->municipality.', '.$productData->barangay ?></span></p>
    </div>
    <div class="section1">
        <p class="header m-0">How was your experience in this place?</p>
        <?php echo form_open_multipart('Pages/Review/saveReviewProduct') ?>

             <!-- RESULT NOTIFICATION  -->
             <?php if($this->session->flashdata('successReview')){ ?>
                <div class="alert alert-success mt-3" > 
                    <?php  echo $this->session->flashdata('successReview'); $this->session->unset_userdata ( 'successReview' );?>
                </div>
            <?php } ?>  
            <?php if ($this->session->flashdata('failReview')){ ?>
                <div class="alert alert-danger mt-3" > 
                    <?php  echo $this->session->flashdata('failReview'); $this->session->unset_userdata ( 'failReview' );?>
                </div>
            <?php } ?>

            <div class="form-label-group mt-5">
                <label for="rating" class="labelDesign ml-2 mb-0"><h5>Rating</h5></label>
                <input name="rating" type="text" class="kv-uni-star rating-loading" value="0" data-size="xl" title="">
            </div>
            <div class="form-label-group d-none">
                <label for="vetId" class="labelDesign">VetId</label>
                <input name="vetId" type="text" id="vetId" class="inputDesign form-control" placeholder="VetId" value="<?php echo !empty($productData) ? $productData->productId : null ?>">
            </div>
            <div class="form-label-group mt-5">
                <!-- <label for="comment" class="labelDesign spacing">Product Name</label> -->
                <textarea rows="10" name="comment" type="text" id="comment" class="inputDesign form-control" placeholder="Tell us more about your experience."></textarea>
            </div>

           <center>
                <button type="submit" class="btn my-3" >Post your review</button>
           </center>
        <?php echo form_close() ?>
    </div>
</div>