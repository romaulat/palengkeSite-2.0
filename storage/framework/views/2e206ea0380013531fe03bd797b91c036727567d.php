<?php $__env->startSection('content'); ?>




    <div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Product Information
                </div>
                <div class="basic-info-body">

                    <?php if(isset($message)): ?>
                        <strong><?php echo e($message); ?></strong>
                    <?php endif; ?>
                    <form action="<?php echo e(route('seller.products.update')); ?>" method="POST" enctype="multipart/form-data" class="form-group">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">

                                <div class="info-item form-group short">
                                    <label for="email">Product Categories</label>
                                    <select  class="form-control <?php if ($errors->has('category')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="category" name="category" placeholder="Category">
                                        <option value="<?php echo e($seller_product->product->category->id); ?>"><?php echo e($seller_product->product->category->category); ?></option>
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
                                <div class="info-item form-group short">
                                    <label for="Product">Product</label>
                                    <select  class="form-control <?php if ($errors->has('product')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="product" name="product" placeholder="Product" value="" >
                                        <option value="<?php echo e($seller_product->product->id); ?>"><?php echo e($seller_product->product->product_name); ?></option>
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

                                <div class="info-item form-group short">
                                    <label for="Product">Custom Name</label>
                                    <input type="text"
                                           class="form-control <?php if ($errors->has('custom_title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('custom_title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                           id="custom_title" name="custom_title"
                                           placeholder=""
                                           value="<?php echo e($seller_product->custom_title); ?>" >

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

                                <div class="info-item form-group short">
                                    <label for="Product">Description</label>
                                    <textarea type="text"
                                           class="form-control <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                           id="description" name="description" rows="10"
                                           placeholder=""
                                              value="" ><?php echo e($seller_product->description); ?></textarea>

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
                                <div class="info-item form-group xshort">
                                    <label for="Product">Price</label>
                                    <input type="text"
                                           class="form-control <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                           id="price" name="price"
                                           placeholder="Price"
                                           value="<?php echo e($seller_product->price); ?>"
                                            onchange="validatePrice()">

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
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($product->id == $seller_product->product_id): ?>
                                            Maximum Price: <input type="text"  id="max_price" name="max_price" placeholder="" value="<?php echo e($product->max_price); ?>" style="text-align: center;" readonly>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="info-item form-group xshort">
                                    <label for="Product">Stocks</label>
                                    <input type="number"
                                           class="form-control <?php if ($errors->has('stock')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stock'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                           id="stock" name="stock"
                                           placeholder="Stocks"
                                           value="<?php echo e($seller_product->stock); ?>" >

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

                                <div class="info-item form-group short">
                                    <label for="type">Type</label>
                                    <select  class="form-control <?php if ($errors->has('type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('type'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="type" name="type" placeholder="Type"  >
                                        <option value="Retail" <?php echo e(( $seller_product->type == 'Retail' ) ? 'selected' : ''); ?>>Retail</option>
                                        <option value="Wholesale" <?php echo e(($seller_product->type == 'Wholesale' ) ? 'selected' : ''); ?>>Wholesale</option>
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

                                <div class="info-item form-check-inline short">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="featured" id="featured"  value="1" <?php echo e(($seller_product->featured) ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="remember">
                                            <?php echo e(__('Featured')); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="form-group long  stall-image">

                                        <label class=" " for="image">Image</label>
                                        <input type="file"  class="<?php if ($errors->has('image')) :
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
                                </div>


                                <input type="hidden"
                                       class="form-control <?php if ($errors->has('id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="id" name="id"
                                       placeholder="id"
                                       value="<?php echo e($seller_product->id); ?>" >
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
            var price = document.getElementById("price").value;
            var maxPrice = document.getElementById("max_price").value;

            if (price > maxPrice) {
                 alert("Price cannot exceed maximum price.");
               /* Swal.fire({
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
                products.addImage($('#addImage'));
            },
            initCategories: function( trigger ){

                    var options = '';
                    console.log($('#category').val());
                    $.ajax({
                        type:'POST',
                        dataType: 'JSON',
                        url:'<?php echo e(route('seller.products.find.category')); ?>',
                        data: {
                            id: $('#category').val(),
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success:function(data) {


                            for( i = 0; i < data.length; i++){

                                options += '<option value="'+ data[i].id +'">' + data[i].product_name + '</option>';

                            }

                            $('#product').append(options);
                        }
                    });

            },
            addImage: function (trigger) {
                trigger.click(function () {

                    var counter  = $('.stall-image').not('.hide').length;

                    console.log(counter);

                    $('#stall_image_' + counter).removeClass('hide');

                })
            }
        };

        $(window).on('load', function(){
            products.init();
        });

    </script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/products/edit.blade.php ENDPATH**/ ?>