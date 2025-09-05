<?php $__env->startSection('content'); ?>


    <?php echo e($message ?? ''); ?>


    <div class="chat">
       <div class="chat-wrapper">
           <div class="chat-list">


                <ul class="chat">




                    <?php if(count($titles) > 0): ?>
                        <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                            
                           <li class="left clearfix <?php echo e(($title->where('sender', 'seller')->where('status', 'unread')->count() > 0 ? 'unread' : '')); ?>">
                                    <a href="<?php echo e(route('buyer.chat.seller', ['id' => $title->seller->seller_stalls['id']])); ?>"> <?php echo e($title->seller->seller_stalls['name'] ?? $title->seller->user->first_name); ?> </a>
                            </li>



                         

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
           </div>
           <div class="chat-messages">
               <?php if(isset($chats)): ?>
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <h3 ></h3>
                   </div>
                   <div class="panel-body">
                            <!-- <h3><strong><?php echo e($seller_stall->name); ?></strong></h3>
                       <hr> -->
                           <ul class="chat" id="chatboard" data-action="<?php echo e(route('buyer.chat.fetchAllMessages', ['id' => $seller_id])); ?>">
                               <?php if($chats->count()): ?>
                                   <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="left clearfix <?php echo e(($chat->sender == 'buyer' ? 'user' : '')); ?>">
                                           <div class="chat-body clearfix ">
                                               <div class="">
                                                   <strong class="primary-font">
                                                     <?php if($chat->sender == 'buyer'): ?>
                                                           <span class="fa fa-user-alt"></span> Me
                                                     <?php else: ?>
                                                         <span class="fa fa-store"></span> <?php echo e($chat->seller->seller_stalls->name ?? $chat->seller->user->first_name); ?>

                                                     <?php endif; ?>

                                                   </strong>
                                               </div>
                                               <p>
                                                   <?php echo e($chat->message); ?>

                                               </p>
                                           </div>
                                        </li>

                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               <?php else: ?>

                                           <h3>No Messages</h3>

                               <?php endif; ?>
                           </ul>

                    </div>
               </div>
               <div class="panel-footer">
                   <form action="<?php echo e(route('buyer.chat.sendMessage', ['id' => $seller_id])); ?>" method="POST" id="chatform">
                        <?php echo csrf_field(); ?>
                       <div class="input-group">
                           <input id="btn-input" type="text"
                                  name="message"
                                  class="form-control input-sm"
                                  placeholder="Type your message here..." >

                           <input type="hidden" name="seller_id" id="<?php echo e($seller_id); ?>">
                           <input type="hidden" name="buyer_id" id="<?php echo e(auth()->user()->buyer->id); ?>">
                           <span class="input-group-btn">
                                <button class="btn btn-primary btn-sm" type="submit" id="btn-chat">
                                    Send
                                </button>
                            </span>
                       </div>
                   </form>

                </div>
               <?php endif; ?>
           </div>
       </div>
    </div>

    <script>

        let doc = $(document);
        var chat = {
            onInit: function () {
                chat.sendMessageOnSubmit($('#btn-chat'));
                // chat.submitForm($('#chat-form'));
                setInterval( function () {
                    chat.fetchAllMessage();
                }, 10000)

                $('#chatform').submit( function (e) {
                    e.preventDefault();
                    var data = $(this).serialize();

                    // alert(dataString); return false;
                    $.ajax({
                        type: "POST",
                        url: $( "#chatform" ).attr('action'),
                        data: data,
                        success: function (data) {
                            // $("#contact_form").html("<div id='message'></div>");

                            chat.fetchAllMessage();

                        }
                    });

                    let h = $(document).height();
                    $('#chatboard').animate({ scrollTop:  $("#chatboard").scrollTop() }, 1000);
                });

            },

            sendMessageOnSubmit: function(trigger){

                trigger.click(function(){

                    console.log('test');

                });
            },
            fetchAllMessage: function () {
                $.ajax({
                    type: "GET",
                    url: $( "#chatboard" ).attr('data-action'),
                    data: '',
                    success: function (data) {

                        $("#chatboard").html(data);
                    }
                });
            },

            submitMessageForm: function (trigger) {

            }
        }
        doc.ready(function () {
            chat.onInit()
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.buyer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/buyer/chat.blade.php ENDPATH**/ ?>