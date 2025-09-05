<?php $__env->startSection('content'); ?>




    <div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Product Information
                </div>
                <div class="basic-info-body">
                    <form action="<?php echo e(route('seller.products.store')); ?>" method="POST" class="form-"  enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">

                                <div class="form-group long">
                                    <label for="email">Product Category</label>
                                    <select  class="form-control <?php if ($errors->has('category')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="category" name="category" placeholder="Category" value="" >
                                            <option value=""><?php echo e('Category'); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->category); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if ($errors->has('category')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group long" id="select-product">
                                    <label for="Product">Product</label>
                                    <select  class="form-control <?php if ($errors->has('product')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="product" name="product" placeholder="Product"  >
                                        <option value=""></option>
                                    </select>
                                    <?php if ($errors->has('product')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group long">
                                    <div class="form-inline">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="new_product" id="new_product"   >
                                            <label class="form-check-label" for="remember">
                                                <?php echo e(__('Custom Product')); ?>
                                            </label>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group long" id="custom-product-container">
                                    <label for="Product">Product</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('new_product_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('new_product_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="custom-product" name="new_product_name" placeholder="Product" value="" >

                                    <?php if ($errors->has('new_product_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('new_product_name'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group long">
                                    <div class="form-inline">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="featured" id="featured"  value="1">
                                            <label class="form-check-label" for="remember">
                                                <?php echo e(__('Featured')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group short">
                                    <label for="Product">Stock or Quantity</label>
                                    <input type="number"
                                           class="form-control <?php if ($errors->has('stock')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stock'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                           id="stock" name="stock"
                                           placeholder="Stock"
                                           value="" >

                                    <?php if ($errors->has('stock')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stock'); ?>
                                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>


                                <div class="form-group long" id="description-container">
                                    <label for="Product">Custom Product Name</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('custom_title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('custom_title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="custom-title" name="custom_title" placeholder="Product" value="" >

                                    <?php if ($errors->has('custom_title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('custom_title'); ?>
                                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group long" id="description-container">
                                    <label for="Product">Description</label>
                                    <textarea  class="form-control <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="description" rows="10" name="description" placeholder="Product" ></textarea>

                                    <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?>
                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group long  stall-image">
                                    <label for="image">Image</label>
                                    <input type="file"  class="form-control <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        id="image"
                                        name="image"
                                        placeholder="" value="" >

                                    <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?>
                                        <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div id="stall_image_1" class="form-group long  stall-image hide">
                                    <label for="image">Image</label>
                                    <input type="file"  class="form-control <?php if ($errors->has('image_1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        id="image_1"
                                        name="image_1"
                                        placeholder="" value="" >

                                    <?php if ($errors->has('image_1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_1'); ?>
                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div id="stall_image_2" class="form-group long  stall-image hide">
                                    <label for="image">Image</label>
                                    <input type="file"  class="form-control <?php if ($errors->has('image_2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_2'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        id="image_2"
                                        name="image_2"
                                        placeholder="" value="" >

                                    <?php if ($errors->has('image_2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_2'); ?>
                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div id="stall_image_3" class="form-group long  stall-image hide">
                                    <label for="image">Image</label>
                                    <input type="file"  class="form-control <?php if ($errors->has('image_3')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_3'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        id="image_3"
                                        name="image_3"
                                        placeholder="" value="" >

                                    <?php if ($errors->has('image_3')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_3'); ?>
                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div id="stall_image_4" class="form-group long  stall-image hide">
                                    <label for="image">Image</label>
                                    <input type="file"  class="form-control <?php if ($errors->has('image_4')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_4'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        id="image_4"
                                        name="image_4"
                                        placeholder="" value="" >

                                    <?php if ($errors->has('image_4')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_4'); ?>
                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div id="stall_image_5" class="form-group long  stall-image hide">
                                    <label for="image">Image</label>
                                    <input type="file"  class="form-control <?php if ($errors->has('image_5')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_5'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        id="image_5"
                                        name="image_5"
                                        placeholder="" value="" >

                                    <?php if ($errors->has('image_5')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_5'); ?>
                                    <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>



                                <div class="form-group short">
                                    <button type="button" id="addImage" class="btn option-btn"><span class="fa fa-plus-circle"> </span> Add Image</button>
                                </div>

                                <div class="form-group long">
                                    <label for="Product">Price</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="price" name="price" placeholder="Price" value="" onchange="validatePrice()">

                                    <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="alert alert-info" role="alert">
                                    Maximum Price: <input type="text"  id="max_price" name="max_price" placeholder="" value="" style="text-align: center;" readonly>
                                </div>

                                <div class="form-group long">
                                    <label for="type">Type</label>
                                     <select  class="form-control <?php if ($errors->has('type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('type'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="type" name="type" placeholder="Type"  >
                                        <option value=""></option>
                                        <option value="Retail">Retail</option>
                                        <option value="Wholesale">Wholesale</option>
                                    </select>
                                    
                                    <?php if ($errors->has('type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('type'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>


                        </div>
                        <div class="row-btn">
                            <div class="btn-container" style="padding: 0 10px 15px;">
                                <button type="submit" class="btn btn-primary" style="font-size: 11px; padding: 8px;">
                                    <?php echo e(__('Submit')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validatePrice() {
        var price = parseInt(document.getElementById("price").value);
        var maxPrice = parseInt(document.getElementById("max_price").value);

            if (price > maxPrice) {
                 alert("Price cannot exceed maximum price.");
                /*Swal.fire({
                    title: 'Error!',
                    text: 'Price cannot exceed maximum price.',
                    icon: 'error',
                    confirmButtonText: 'Ok',

                }).then((result) => {

                });*/
                document.getElementById("price").value = "";
            }
        }
        const products = {
            init: function(  ){
                products.initCategories($('#category'));
                products.initProductDetails($('#product'));
                products.initCustomProduct($('#new_product'));
                products.addImage($('#addImage'));
            },
            initCategories: function( trigger ){
                trigger.change(function () {
                    var options = '';
                    console.log(this.value);
                    $.ajax({
                        type:'POST',
                        dataType: 'JSON',
                        url:'<?php echo e(route('seller.products.find.category')); ?>',
                        data: {
                            id: this.value,
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success:function(data) {


                            options = '<option value="">Products</option>';
                            for( i = 0; i < data.length; i++){

                                options += '<option value="'+ data[i].id +'">' + data[i].product_name + '</option>';

                            }

                            $('#product').html(options);
                        }
                    });
                })
            },
            initProductDetails: function( trigger ){
                trigger.change(function () {
                    $.ajax({
                        type:'POST',
                        dataType: 'JSON',
                        url:'<?php echo e(route('seller.products.details')); ?>',
                        data: {
                            id: this.value,
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success:function(data) {
                            console.log(data[0].type);
                            $('#type').val(data[0].type);
                            $('#max_price').val(data[0].max_price);
                        }
                    });

                })
            },
            initCustomProduct: function( trigger ){
                trigger.change(function () {
                    if ($(this).is(":checked")){
                        $('#select-product').hide();
                        $('#custom-product-container').show();


                    }else{
                        $('#select-product').show();
                        $('#custom-product-container').hide();
                    }
                });

            },
            addImage: function (trigger) {
                trigger.click(function () {

                    var counter  = $('.stall-image').not('.hide').length;

                    console.log(counter);

                    $('#stall_image_' + counter).removeClass('hide');


                    /* var counter = $('.stall-image').length;

                     if(counter <= 5){

                         var clone = $('.stall-image:last').clone().insertAfter('.stall-image:last');
                         clone.find('input[type="file"]').attr('name', 'image_' + parseInt(parseInt(counter - 1) + 1));
                     }else{

                     }*/

                })
            }
        };

        $(window).on('load', function(){
            products.init();
            $('#select-product').show();
            $('#custom-product-container').hide();
        });

    </script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/products/create.blade.php ENDPATH**/ ?>