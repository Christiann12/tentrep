<div class="addProduct">
    <div class="banner">
        <p class="greeting">Add Product</p>
        <p class="clock"id="ct7"><?php echo date('m/d/Y - g:i:s A') ?></p>
    </div>
    <div class="section1">
        <p class="header m-0">Product Form</p>
        <div class="employeeform m-0">

             <!-- RESULT NOTIFICATION  -->
             <?php if($this->session->flashdata('successAddProduct')){ ?>
                <div class="alert alert-success" > 
                    <?php  echo $this->session->flashdata('successAddProduct'); $this->session->unset_userdata ( 'successAddProduct' );?>
                </div>
            <?php } ?>  

            <?php if ($this->session->flashdata('failAddProduct')){ ?>
                <div class="alert alert-danger" > 
                    <?php  echo $this->session->flashdata('failAddProduct'); $this->session->unset_userdata ( 'failAddProduct' );?>
                </div>
            <?php } ?>
            <?php echo form_open_multipart('Pages/AddProduct/saveProduct') ?>
                
                <div class="form-label-group">
                    <label for="productName" class="labelDesign spacing">Product Name</label>
                    <input name="productName" type="text" id="productName" class="inputDesign form-control" placeholder="Product Name" value="">
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
                                echo form_dropdown('categoryField', $category, "", 'class="form-control " id="categoryField"');
                            ?>
                    </div>
                </div>
                <div class="form-label-group mt-3">
                    <label for="prodDesc" class="">Product Description</label>
                    <div class="">
                        <textarea placeholder="Input Product Desc" class="form-control" id="prodDesc" name="prodDesc"></textarea>
                    </div>
                </div>
                <div class="form-label-group mt-3">
                    <label for="prodPrice" class="">Product Price</label>
                    <div class="">
                        <input name="prodPrice"  type="number" class="form-control" id="prodPrice" placeholder="Input Product Price" value="">
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
    <div class="section2">
        <p class="header m-0">Product Table</p>
        <div class="employeetable m-0">
            <table id="productTable" class="responsive display nowrap cell-border hover" width="100%">
                <thead>
                    <tr>
                        <th class="headertable">ID</th>
                        <th class="headertable">Name</th>
                        <th class="headertable">Price</th>
                        <th class="headertable">Category</th>
                        <th class="headertable">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>