<div class="ViewRatingVet">
    <div class="section2">
        <p class="header m-">Ratings</p>
            
        <div class="ratingTab">
            <div class="container">
                <!-- <div class='clearfix'>
                    <a href='<?= base_url('ReviewVet/'.$vetData->vetId); ?>' class="btn mb-5 pull-right">Add Review</a>
                </div> -->
                
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