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

<div class="Clinics">
    <div class="banner">
        <p class="greeting">Clinic List</strong></p>
    </div>
    <div class="section1">
        <p class="header m-0">Browse Other Clinics</p>
        <div class="row">
            <?php if($result): ?>
                <?php foreach($result as $test): ?>
                    <?php $counter++; ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-5">

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
            <?php endif;?>
        </div>
        <div class="mt-5">
            <?= $this->pagination_bootstrap->render(); ?>
        </div>
       
        <?php //echo form_open_multipart('test/test') ?>
           
            <!-- <div class="form-label-group">
                <label for="storeName" class="labelDesign">Store Name</label>
                <input name="storeName" type="text" id="storeName" class="inputDesign form-control" placeholder="Store Name" value="<?php echo !empty($userData) ? $userData->storeName : null ?>">
            </div> -->
            <!-- <button class="btn btn-danger" type="submit">yes</button>
        <?php //echo form_close() ?> -->

    </div>
</div>