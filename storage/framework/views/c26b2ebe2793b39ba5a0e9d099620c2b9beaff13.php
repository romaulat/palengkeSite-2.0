<?php $__env->startSection('content'); ?>
    <div class="profile">
       <div class="profile-wrapper">
           <div class="card basic-info" style="width: 18rem;">
               <div class="card-header basic-info-header">
                   Basic Information

                   <a href="<?php echo e(route('buyer.edit')); ?>" class="info-header-edit"> <i class="fa fa-edit"></i></a>
               </div>
                <div class="basic-info-body">
                    <div class="info-body-flex">
                        <div class="form-group info-item short">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name"  placeholder="First Name" value="<?php echo e(auth()->user()->first_name); ?>" readonly>
                        </div>
                        <div class="form-group info-item short">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name"  placeholder="Last Name" value=" <?php echo e(auth()->user()->last_name); ?>" readonly>
                        </div>

                        <div class="form-group info-item short">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email"  placeholder="Email" value=" <?php echo e(auth()->user()->email); ?>" readonly>
                        </div>

                        <div class="form-group info-item short prepend">
                            <label for="mobile">Mobile</label>
                            <div class="input-group-prepend info-item-prepend">
                                <span class="input-group-text" id="basic-addon1">+63</span>
                            </div>
                            <input type="text" class="form-control" id="mobile"  placeholder="Mobile" value=" <?php echo e(auth()->user()->mobile); ?>" readonly>
                        </div>


                        <?php if(auth()->user()->buyer()->exists()): ?>
                            <div class="form-group info-item xshort">
                                <label for="birthday">Birthday</label>
                                <input type="text" class="form-control" id="birthday"  placeholder="Birthday" value="<?php echo e(date('m/d/Y', strtotime(auth()->user()->buyer->birthday))); ?>" readonly>
                            </div>

                            <div class="form-group info-item xshort">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age"  placeholder="Age" value="<?php echo e(auth()->user()->buyer->age); ?>" readonly>
                            </div>

                            <div class="form-group info-item short">
                                <label for="gender">Gender</label>
                                <input type="text" class="form-control" id="age"  placeholder="Age" value="<?php echo e(auth()->user()->buyer->gender); ?>" readonly>
                            </div>


                            <div class="form-group info-item long">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="age"  placeholder="Age" value="<?php echo e(auth()->user()->buyer->stnumber  .' '. auth()->user()->buyer->barangay .', '. auth()->user()->buyer->city .', '.  auth()->user()->buyer->province .', '.  auth()->user()->buyer->country .' '.  auth()->user()->buyer->zip); ?>" readonly>

                            </div>

                            <!-- <a href="<?php echo e(route('buyer.switch.seller')); ?>" class="btn btn-primary">Switch as Seller</a> -->

                         <?php endif; ?>
                    </div>

                    <div class="info-item long">
                        <div id="map" style="width: 100%; height: 480px"></div>

                        
                        <script
                                src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('apikeys.keys')); ?>&callback=initMap&v=weekly"
                                defer
                        ></script>
                        <script>
                            let map, activeInfoWindow, markers = [];
                            let marker;
                            let defaultPosition = {
                                lat: <?php echo e(( auth()->user()->buyer->latitude  ? auth()->user()->buyer->latitude : '13.749684')); ?>,
                                lng: <?php echo e(( auth()->user()->buyer->latitude  ? auth()->user()->buyer->longitude : '120.9395233')); ?>,
                            };
                            /* ----------------------------- Initialize Map ----------------------------- */
                            function initMap() {
                                map = new google.maps.Map(document.getElementById("map"), {
                                    center: {
                                        lat: <?php echo e(( auth()->user()->buyer->latitude  ? auth()->user()->buyer->latitude : '13.749684')); ?>,
                                        lng: <?php echo e(( auth()->user()->buyer->latitude  ? auth()->user()->buyer->longitude : '120.9395233')); ?>,
                                    },
                                    zoom: 15
                                });

                                marker =  new google.maps.Marker({
                                    position: defaultPosition,
                                    label:'<?php echo e(auth()->user()->first_name); ?>',
                                    map: map,
                                });


                                /*map.addListener("click", function(event) {

                                    addMarker(event.latLng, map)
                                });*/

                            }


                            /* --------------------------- Initialize Markers --------------------------- */
                            function addMarker(location, map) {
                                // Add the marker at the clicked location, and add the next-available label
                                // from the array of alphabetical characters.




                                if ( marker ) {
                                    marker.setPosition(location);
                                } else {
                                    marker =  new google.maps.Marker({
                                        position: location,
                                        label: 'A',
                                        map: map,
                                    });
                                }

                            }

                        </script>

                        <!--
                          The `defer` attribute causes the callback to execute after the full HTML
                          document has been parsed. For non-blocking uses, avoiding race conditions,
                          and consistent behavior across browsers, consider loading using Promises
                          with https://www.npmjs.com/package/@googlemaps/js-api-loader.
                          -->


                    </div>
                </div>
           </div>
       </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.buyer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/buyer/profile.blade.php ENDPATH**/ ?>