<?php $__env->startSection('content'); ?>



    <section class="cart">


        <form class="cart-container" action="<?php echo e(route('cart.checkout.selectDeliveryAddress')); ?>" method="POST">
            <h3>Choose Delivery Address</h3>
            <?php echo csrf_field(); ?>

            <?php $userAddress = auth()->user()->barangay  ?>
            <?php if($userAddress != ''): ?>

                <div class="delivery-addresses">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="delivery_address" value="<?php echo e(auth()->user()->id); ?>">
                        <label class="form-check-label">
                            <?php echo e(auth()->user()->stnumber); ?> <?php echo e(auth()->user()->stname); ?> <?php echo e(auth()->user()->barangay); ?>, <?php echo e(auth()->user()->city); ?> <?php echo e(auth()->user()->province); ?>

                        </label>
                    </div>
                </div>
            <?php endif; ?>
            <?php $__currentLoopData = auth()->user()->delivery_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="delivery-addresses">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery_address" value="<?php echo e($address->id); ?>">
                    <label class="form-check-label">
                        <?php echo e($address->stnumber); ?> <?php echo e($address->stname); ?> <?php echo e($address->barangay); ?>, <?php echo e($address->city); ?> <?php echo e($address->province); ?>

                    </label>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="delivery-addresses">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery_address" value="others">
                    <label class="form-check-label">
                        Add New Address
                    </label>
                </div>

                <div class="info-body-flex">

                    


                    <div class="info-item short">
                        <label for="stnumber">Street Number</label>
                        <input type="text" class="form-control <?php if ($errors->has('stnumber')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stnumber'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="stnumber" name="stnumber" placeholder="Example: 123" value="">
                        <?php if ($errors->has('stnumber')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stnumber'); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                    </div>

                    <div class="info-item short">
                        <label for="stname">Sreet Name</label>
                        <input type="text" class="form-control <?php if ($errors->has('stname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stname'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="stname" name="stname" placeholder="Example: Dalipit East" value="">
                        <?php if ($errors->has('stname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stname'); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                    </div>

                    <div class="info-item short">
                        <label for="city">City/Municipality</label>
                        <select class="form-control <?php if ($errors->has('city')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                id="city"
                                name="city"
                                placeholder="Example: Alitagtag">
                            <option value="">Please select City</option>
                        </select>
                        <?php if ($errors->has('city')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city'); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>

                    <div class="info-item short">
                        <label for="city">Barangay</label>
                        <select class="form-control <?php if ($errors->has('barangay')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('barangay'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                id="barangay"
                                name="barangay"
                                placeholder="Example: Alitagtag">
                            <option value="">Please select Barangay</option>
                        </select>
                        <?php if ($errors->has('city')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city'); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>

                    <div class="info-item short">
                        <label for="province">Province</label>
                        <input type="text" class="form-control <?php if ($errors->has('province')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('province'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="province" name="province" placeholder="Example: Batangas" value="Batangas" readonly>
                        <?php if ($errors->has('province')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('province'); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                    </div>

                    <div class="info-item short">
                        <label for="country">Country</label>
                        <input type="text" class="form-control <?php if ($errors->has('country')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('country'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="country" name="country" placeholder="Example: Philippines" value="Philippines" readonly>
                        <?php if ($errors->has('country')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('country'); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                    </div>

                    <div class="info-item short">
                        <label for="zip">Zip Code</label>
                        <input type="number" class="form-control <?php if ($errors->has('zip')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('zip'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="zip" name="zip" placeholder="Example: 123" value="" readonly>
                        <?php if ($errors->has('zip')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('zip'); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                    </div>

                    <div class="form-group info-item hidden">
                        <input type="hidden" class="form-control " id="longitude" name="longitude" placeholder="Example: 123" value="<?php echo e(old('longitude')); ?>" readonly>
                        <input type="hidden" class="form-control " id="latitude" name="latitude" placeholder="Example: 123" value="<?php echo e(old('latitude')); ?>" readonly>
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
                                lat: <?php echo e(old('latitude') ?? 13.749684); ?>,
                                lng: <?php echo e(old('longitude') ?? 120.9395233); ?>

                            };
                            /* ----------------------------- Initialize Map ----------------------------- */
                            function initMap() {
                                map = new google.maps.Map(document.getElementById("map"), {
                                    center: defaultPosition,
                                    zoom: 15
                                });

                                marker =  new google.maps.Marker({
                                    position: defaultPosition,
                                    label:'<?php echo e(auth()->user()->first_name); ?>',
                                    map: map,
                                });


                                map.addListener("click", function(event) {
                                    addMarker(event.latLng, map)
                                });

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

                                markerClicked(marker)
                            }
                            /* ------------------------- Handle Map Click Event ------------------------- */
                            function mapClicked(event) {
                                console.log(map);
                                console.log(event.latLng.lat(), event.latLng.lng());
                            }

                            /* ------------------------ Handle Marker Click Event ----------------------- */
                            function markerClicked(marker, index) {
                                console.log(map);
                                console.log(marker);
                                console.log(marker.position.lat());
                                console.log(marker.position.lng());


                                $('#longitude').val(marker.position.lng());
                                $('#latitude').val(marker.position.lat());
                                $.ajax({
                                    type:'GET',
                                    dataType:"json",
                                    url:'https://maps.googleapis.com/maps/api/geocode/json?latlng='+marker.position.lat()+','+marker.position.lng()+'&sensor=true&key=<?php echo e(config('apikeys.keys')); ?>',
                                    crossDomain:true,
                                    data: {
                                        _token: "<?php echo e(csrf_token()); ?>"
                                    },
                                    success:function(data) {


                                        $('#city').val(data.results[1].address_components[2].long_name);
                                        support.loadBarangaysByCity($('#city').val());

                                        setTimeout(
                                            function () {
                                                $('#barangay').val(data.results[5].address_components[0].long_name);
                                            }, 100
                                        )

                                        console.log(data.results);
                                        console.log(data.results[5].address_components[0].long_name);
                                    },
                                });
                            }

                            /* ----------------------- Handle Marker DragEnd Event ---------------------- */
                            function markerDragEnd(event, index) {
                                console.log(map);
                                console.log(event.latLng.lat());
                                console.log(event.latLng.lng());
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

            

            <div class="button-area">
                <button type="submit">Checkout</button>
            </div>
        </form>
    </section>
    <script>

        var doc = $(document);
        const support = {
            init: function () {
                support.loadCities();
                support.loadBarangays($('#city'));
                $('.info-body-flex input[type="text"]').prop("readonly", true);
                $('.info-body-flex select').prop("readonly", true);
                $('#map').hide();
                support.selectAddress($('input[name="delivery_address"]'));

                $('#barangay').change(function () {
                    $(this).closest('.delivery-addresses').find('input[name="delivery_address"]').click();
                });
            },
            selectAddress: function (trigger) {
                trigger.change(function () {
                    var self = $(this);

                    if(self.val() == 'others'){
                        $('.info-body-flex input[type="text"]:not("#province, #zip, #country")').prop("readonly", false);
                        $('.info-body-flex select').prop("readonly", false);
                        $('#map').show();
                    }else{
                        $('.info-body-flex input[type="text"], .info-body-flex select').prop("readonly", true);
                        $('.info-body-flex select').prop("readonly", true);
                        $('#map').hide();
                    }
                })
            },
            loadCities: function () {
                $.ajax({
                    type:'GET',
                    dataType:"jsonp",
                    url:'https://tools.gabc.biz/address_finder.php?PROVINCE='+$('#province').val()+'&callback=Cities&_=1672914361845',
                    jsonpCallback:"Cities",
                    crossDomain:true,
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>"
                    },
                    success:function(data) {
                        var options = '<option value="">Please select City</option>';
                        var cities = data[0].CITY;


                        for(var i = 0; i < cities.length; i++){
                            options += '<option value="'+ cities[i].CITY +'">' + cities[i].CITY + '</option>';
                        }

                        $('#city').html(options);

                    },
                });
            },
            loadBarangays: function (trigger) {
                trigger.change(function (e) {

                    $(this).closest('.delivery-addresses').find('input[name="delivery_address"]').click();
                    $.ajax({
                        type:'GET',
                        dataType:"jsonp",
                        url:'https://tools.gabc.biz/address_finder.php?PROVINCE='+$('#province').val()+'&CITY='+trigger.val()+'&callback=Barangays&_=1673020893849',
                        jsonpCallback:"Barangays",
                        crossDomain:true,
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success:function(data) {

                            var options = '<option value="">Please select Barangay</option>';

                            var barangays = data[0].CITY[0].BARANGAY;
                            var zipcode = barangays[0].ZIP;
                            for(var i = 0; i < barangays.length; i++){
                                options += '<option value="'+ barangays[i].BARANGAY +'">' + barangays[i].BARANGAY + '</option>';
                            }

                            $('#barangay').html(options);
                            $('#zip').val(zipcode);
                        },
                    });
                });

            },
            loadBarangaysByCity: function (city) {

                $.ajax({
                    type:'GET',
                    dataType:"jsonp",
                    url:'https://tools.gabc.biz/address_finder.php?PROVINCE='+$('#province').val()+'&CITY='+city+'&callback=Barangays&_=1673020893849',
                    jsonpCallback:"Barangays",
                    crossDomain:true,
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>"
                    },
                    success:function(data) {

                        var options = '<option value="">Please Select Barangay</option>';

                        var user_barangay = '';
                        var barangays = data[0].CITY[0].BARANGAY;
                        var zipcode = barangays[0].ZIP;
                        for(var i = 0; i < barangays.length; i++){
                            options += '<option value="'+ barangays[i].BARANGAY +'"' + ( user_barangay == barangays[i].BARANGAY ? 'selected': '' ) + ' >' + barangays[i].BARANGAY + '</option>';
                        }

                        $('#barangay').html(options);
                        $('#zip').val(zipcode);
                    },
                });


            },
        };

        doc.ready(function () {
            support.init();
        })

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/cart/chooseDeliveryAddress.blade.php ENDPATH**/ ?>