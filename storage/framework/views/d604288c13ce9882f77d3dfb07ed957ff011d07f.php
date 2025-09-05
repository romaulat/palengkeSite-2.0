<?php $__env->startSection('content'); ?>
    <div class="profile" style="padding: 60px;">
        <div class="profile-wrapper" >


            <form action="" class="form-group col-5" method="GET" id="sale-filter">

                <div class="" style="width: 100%; display: flex">


                    <!-- <div class="form-group short    ">
                        <label for="">Category</label>
                        <select  class="form-control" id="category" name="category" placeholder="Category"  >
                            <option value=""></option>
                            <?php $__currentLoopData = \App\Categories::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->category); ?>" <?php echo e((isset($_GET['category']) && $_GET['category'] == $category->category ? 'selected' : '')); ?>><?php echo e($category->category); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div> -->
                    <div class="form-group short    ">
                        <label for="">Sort</label>
                        <select  class="form-control" id="sort" name="sort" placeholder="Category"  >
                            <option value="desc" <?php echo e((isset($_GET['sort']) && $_GET['sort'] == 'desc' ? 'selected' : '')); ?>>Ratings (Highest - Lowest)</option>
                            <option value="asc" <?php echo e((isset($_GET['sort']) && $_GET['sort'] == 'asc' ? 'selected' : '')); ?>>Ratings (Lowest - Highest)</option>
                        </select>
                    </div>


                </div>

            </form>


            <canvas id="myChart" height="100px"></canvas>

            <a class="pal-button btn-green" href="<?php echo e(route('seller.analytics.product.ratings.export')); ?>" id="downloadCSV"><i class="fa fa-download"></i> Download </a>
            <script>
                var labels =   <?php echo json_encode($labels, 15, 512) ?> ;
                var sales =  <?php echo json_encode($data, 15, 512) ?> ;

                var count = <?php echo e(count($data)); ?>



                var color_array = [];
                function getRandomColor() {
                    var letters = '0123456789ABCDEF'.split('');
                    var color = '#';

                    for (var i = 1; i <= count; i++ ) {
                        let maxVal = 0xFFFFFF; // 16777215
                        let randomNumber = Math.random() * maxVal;
                        randomNumber = Math.floor(randomNumber);
                        randomNumber = randomNumber.toString(16);
                        let randColor = randomNumber.padStart(6, 0);
                        color = `#${randColor.toUpperCase()}`;

                        color_array.push(color);
                    }


                    console.log(color_array);
                    return color_array;
                }

                var backgroundColors =  getRandomColor();
                const data = {

                    labels: labels,


                    datasets: [
                        {
                            dataPercentage: 0.1,
                            fill: true,
                            label: 'Product Ratings',
                            data: sales,
                            backgroundColor: backgroundColors,
                            borderColor: backgroundColors,
                            borderWidth: 1
                        },

                    ]
                };

                const config = {
                    type: 'bar',
                    data: data,

                    options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                };

                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );



                const filter = {
                    onInit: function () {
                        filter.initPalengkeFilter( $('select') );
                    },

                    initPalengkeFilter: function(trigger){
                        trigger.change(function(e){

                            $('#sale-filter').submit();
                        });
                    },
                }

                $(document).ready(function () {
                    filter.onInit();
                })
            </script>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/analytics/ratings-by-products.blade.php ENDPATH**/ ?>