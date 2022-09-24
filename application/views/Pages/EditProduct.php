<div class="addProduct">
    <div class="banner">
        <p class="greeting">Edit Product</p>
        <p class="clock"id="ct7"><?php echo date('m/d/Y - g:i:s A') ?></p>
    </div>
    <div class="section1">
        <p class="header m-0">Product Form</p>
        <div class="employeeform m-0">

             <!-- RESULT NOTIFICATION  -->
             <?php if($this->session->flashdata('successEditProduct')){ ?>
                <div class="alert alert-success" > 
                    <?php  echo $this->session->flashdata('successEditProduct'); $this->session->unset_userdata ( 'successEditProduct' );?>
                </div>
            <?php } ?>  

            <?php if ($this->session->flashdata('failEditProduct')){ ?>
                <div class="alert alert-danger" > 
                    <?php  echo $this->session->flashdata('failEditProduct'); $this->session->unset_userdata ( 'failEditProduct' );?>
                </div>
            <?php } ?>
            <?php echo form_open_multipart('Pages/AddProduct/saveEdit') ?>
                
                <div class="form-label-group">
                    <label for="productName" class="labelDesign spacing">Product Name</label>
                    <input name="productName" type="text" id="productName" class="inputDesign form-control" placeholder="Product Name" value="<?php echo !empty($productData) ? $productData->name : null ?>">
                </div>
                <div class="form-label-group d-none">
                    <label for="productId" class="labelDesign spacing">Product Id</label>
                    <input name="productId" type="text" id="productId" class="inputDesign form-control" placeholder="Product Id" value="<?php echo !empty($productData) ? $productData->productId : null ?>">
                </div>
                <div class="form-label-group d-none">
                    <label for="filename" class="labelDesign spacing">File Name</label>
                    <input name="filename" type="text" id="filename" class="inputDesign form-control" placeholder="File Name" value="<?php echo !empty($productData) ? $productData->pictureUrl : null ?>">
                </div>
                <div class="form-label-group">
                    <label for="categoryField" class="mt-3">Product Category</label>
                    <div>
                        <?php
                                $category = array(
                                    '' => 'Select',
                                    "Lighting Fixtures" => "Lighting Fixtures",
                                    "Transformers" => "Transformers",
                                    "Accessories" => "Accessories",
                                ); 
                                echo form_dropdown('categoryField', $category,   !empty($productData) ? $productData->category : null , 'class="form-control " id="categoryField"');
                            ?>
                    </div>
                </div>
                <div class="form-label-group mt-3">
                    <label for="prodDesc" class="">Product Description</label>
                    <div class="">
                        <textarea placeholder="Input Product Desc" class="form-control" id="prodDesc" name="prodDesc"><?php echo !empty($productData) ? $productData->desc : null ?></textarea>
                    </div>
                </div>
                <div class="form-label-group mt-3">
                    <label for="prodPrice" class="">Product Price</label>
                    <div class="">
                        <input name="prodPrice"  type="number" class="form-control" id="prodPrice" placeholder="Input Product Price" value="<?php echo !empty($productData) ? $productData->productPrice : null ?>">
                    </div>
                </div>
                <div class="form-label-group">
                    <label for="attachment" class="mt-3">Attach Picture for the Product</label>
                    <div>
                        <input type="file" name="attachment" id="attachment">
                    </div>
                </div>

                <button type="submit" class="btn my-3" >Submit</button>
            <?php echo form_close() ?>
        </div>
    </div>
  
</div>