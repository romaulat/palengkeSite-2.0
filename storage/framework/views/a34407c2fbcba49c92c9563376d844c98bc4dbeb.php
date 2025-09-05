<?php $__env->startSection('content'); ?>

<div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Basic Information
                </div>
                <div class="basic-info-body">
                     <?php if(isset($message)): ?>
                         <strong><?php echo e($message); ?></strong>
                     <?php endif; ?>
                    <form action="<?php echo e(route('buyer.update')); ?>" method="POST" class="form-control" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">
                            <div class="form-group info-item short">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control <?php if ($errors->has('first_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('first_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> " id="first_name" name="first_name" placeholder="First Name" value="<?php echo e(auth()->user()->first_name); ?>" >
                                <?php if ($errors->has('first_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('first_name'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="form-group info-item short">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> " id="last_name" name="last_name" placeholder="Last Name" value=" <?php echo e(auth()->user()->last_name); ?>" >
                                <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>

                            <div class="form-group info-item short">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value=" <?php echo e(auth()->user()->email); ?>">
                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>

                            <div class="form-group info-item short input-group mb-3 prepend">
                                <label for="email">Mobile</label>
                                    <div class="input-group-prepend info-item-prepend">
                                        <span class="input-group-text" id="basic-addon1">+63</span>
                                    </div>
                                    <input type="text" class="form-control <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="mobile" name="mobile" placeholder="9123456789" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="<?php echo e(auth()->user()->mobile); ?>">
                                    <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>


                            <?php if(auth()->user()->buyer()->exists()): ?>
                            <div class="form-group info-item short">
                                <label for="birthday">Birthday</label>
                                <input type="date" class="form-control <?php if ($errors->has('birthday')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('birthday'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> " id="birthday" name="birthday" placeholder="Birthday" value="<?php echo e(date(auth()->user()->buyer->birthday)); ?>" >
                                 <?php if ($errors->has('birthday')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('birthday'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                 <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>

                            <div class="form-group info-item xshort">
                                <label for="age">Age</label>
                                <input type="number" class="form-control <?php if ($errors->has('age')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('age'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="age" name="age" placeholder="Age" value="<?php echo e(auth()->user()->buyer->age); ?>" readonly>
                                <?php if ($errors->has('age')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('age'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>

                            <div class="form-group info-item xshort">
                                <label for="gender">Gender</label>
                                

                                <select   class="form-control <?php if ($errors->has('gender')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('gender'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="gender"
                                         name="gender">
                                        <option value="Male" <?php echo e(('Male' == auth()->user()->buyer->gender) ? 'selected' : ''); ?>>Male</option>
                                        <option value="Female" <?php echo e(('Female' == auth()->user()->buyer->gender) ? 'selected' : ''); ?>>Female</option>
                                </select>

                            </div>

                            <!-- <div class="form-group info-item short">
                                <label for="contact">Contact Number</label>
                                <input type="text" class="form-control <?php if ($errors->has('contact')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="contact" name="contact" placeholder="Enter your contact number" value="<?php echo e(auth()->user()->buyer->contact); ?>">
                                <?php if ($errors->has('contact')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div> -->

                            <div class="form-group info-item xshort">
                                <label for="stnumber">Street Number</label>
                                <input type="text" class="form-control <?php if ($errors->has('stnumber')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stnumber'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="stnumber" name="stnumber" placeholder="Ex: 123" value="<?php echo e(auth()->user()->buyer->stnumber); ?>">
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

                            <div class="form-group info-item medium">
                                <label for="stname">Street Name</label>
                                <input type="text" class="form-control <?php if ($errors->has('stname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stname'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="stname" name="stname" placeholder="" value="<?php echo e(auth()->user()->buyer->stname); ?>">
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

                            <div class="form-group info-item short">
                                    <label for="city">City/Municipality</label>
                                    <select class="form-control <?php if ($errors->has('city')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                            id="city"
                                            name="city"
                                            data-city="<?php echo e(auth()->user()->buyer->city); ?>"
                                            placeholder="Example: Alitagtag">
                                            
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

                                <div class="form-group info-item short">
                                    <label for="city">Barangay</label>
                                    <select class="form-control <?php if ($errors->has('barangay')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('barangay'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                            id="barangay"
                                            name="barangay"
                                            placeholder="">
                                            <option value="">Please Select Barangay</option>
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

                                <div class="form-group info-item short">
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

                            <div class="form-group info-item short">
                                    <label for="country">Country</label>

                                    <input type="text" class="form-control <?php if ($errors->has('country')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('country'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="country" name="country"  placeholder="Example: Philippines" value="Philippines" readonly>

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

                                <div class="form-group info-item short">
                                    <label for="zip">Zip Code</label>
                                    <input type="number" class="form-control <?php if ($errors->has('zip')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('zip'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="zip" name="zip" placeholder="Example: 123" value="<?php echo e(auth()->user()->buyer->zip); ?>" readonly>
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



                                <div class="form-group info-item short">
                                    <label for="profile_image">Profile Image</label>
                                    <input type="file" class="form-control <?php if ($errors->has('profile_image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('profile_image'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="profile_image" name="profile_image" placeholder="Example: 123" value="" readonly>
                                    <?php if ($errors->has('profile_image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('profile_image'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>
                                <div class="form-group info-item hidden">
                                    <input type="hidden" class="form-control " id="longitude" name="longitude" placeholder="Example: 123" value="<?php echo e(auth()->user()->buyer->longitude); ?>" readonly>
                                    <input type="hidden" class="form-control " id="latitude" name="latitude" placeholder="Example: 123" value="<?php echo e(auth()->user()->buyer->latitude); ?>" readonly>
                                </div>
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
                                            support.loadBarangays($('#city').val());

                                            $('#barangay').val(data.results[6].address_components[0].long_name);
                                            console.log(data.results);
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
                        <div class="row-btn">
                            <div class="btn-container" style="padding: 0 10px 15px;">
                                <button type="submit" class="btn btn-primary" style="font-size: 11px; padding: 8px;">
                                    <?php echo e(__('Update')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<script>
        function getAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        $('#birthday').on('change', function () {

            var age = getAge( $(this).val());
            $('#age').val( age );
        });
        
        const support = {
            init: function () {
                support.loadCities();
                support.loadBarangays('<?php echo e(auth()->user()->buyer->city); ?>');
                support.previewProfileImage($('#profile_image'));
                support.loadMaps();
               // support.initJsonFunction();
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
                        var options = '';
                        var user_city = '<?php echo e(auth()->user()->buyer->city); ?>';
                        var cities = data[0].CITY;


                        for(var i = 0; i < cities.length; i++){
                            options += '<option value="'+ cities[i].CITY +'"' + ( user_city == cities[i].CITY ? 'selected' : '') +'>' + cities[i].CITY + '</option>';
                        }

                       $('#city').html(options);

                        support.loadBarangays($('#city').val());

                    },
                });
            },
            loadBarangays: function (city) {

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

                            var user_barangay = '<?php echo e(auth()->user()->buyer->barangay); ?>';
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
            previewProfileImage: function (trigger) {
                trigger.change(function () {
                    const file = $(this).get(0).files[0];
                    const image = $('#profileImg');
                    if (file) {
                        var reader = new FileReader();

                        reader.onload = function(){
                            image.attr("src", reader.result);
                        };

                        reader.readAsDataURL(file);

                    }
                });
            },

            loadMaps: function () {



            }

            // get
        

        };

        $(document).ready(function () {
            $('#city').val( $('#city').attr('data-city')) ;
            support.init();


            $('#city').change(function () {
                support.loadBarangays($('#city').val())
            })
        })



    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.buyer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/buyer/edit.blade.php ENDPATH**/ ?>