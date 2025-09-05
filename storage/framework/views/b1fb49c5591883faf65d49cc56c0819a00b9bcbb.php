<?php $__env->startSection('content'); ?>


    <?php echo e($message ?? ''); ?>


    <div class="chat">
        <div class="chat-wrapper">
            <div class="chat-list">

                <ul class="chat">

                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        
                        <li class="<?php echo e(($message->where('sender', 'buyer')->where('status',  'unread')->count() > 0 ? 'unread' : '')); ?> left clearfix">
                            <a href="<?php echo e(route('seller.chat.buyer', ['id' => $message->last()->buyer->id])); ?>"><?php echo e($message->last()->buyer->user->first_name); ?></a>
                        </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="chat-messages">
                <?php if(isset($chats)): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 ></h3>
                        </div>
                        <div class="panel-body">

                            <ul class="chat" id="chatboard" data-action="<?php echo e(route('seller.chat.fetchAllMessages', ['id' => $buyer_id])); ?>">
                                <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="left clearfix <?php echo e(($chat->sender == 'seller' ? 'user' : '')); ?>">
                                        <div class="chat-body clearfix ">
                                            <div class="">
                                                <strong class="primary-font">
                                                    <?php if($chat->sender == 'seller'): ?>
                                                        <span class="fa fa-user-alt"></span> Me
                                                    <?php else: ?>
                                                        <span class="fa fa-store"></span> <?php echo e($chat->buyer->user->first_name); ?>

                                                    <?php endif; ?>

                                                </strong>
                                            </div>
                                            <p>
                                                <?php echo e($chat->message); ?>

                                            </p>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>
                    </div>
                    <div class="panel-footer">
                        <form action="<?php echo e(route('seller.chat.sendMessage', ['id' => $buyer_id])); ?>" method="POST" id="chatform">
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <input id="btn-input" type="text"
                                       name="message"
                                       class="form-control input-sm"
                                       placeholder="Type your message here..." >

                                <input type="hidden" name="seller_id" id="<?php echo e(auth()->user()->seller->id); ?>">
                                <input type="hidden" name="buyer_id" id="<?php echo e($buyer_id); ?>">
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

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/chat.blade.php ENDPATH**/ ?>