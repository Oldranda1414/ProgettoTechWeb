                    <div class="modal-body">
                    <?php
			            foreach ($templateParams["notifications"] as $notification){
                            if($notification["Notification_type"] == "comment"){
                                require "notificationComment.php";
                            }
                            if($notification["Notification_type"] == "follower"){
                                require "notificationFollower.php";
                            }
                            if($notification["Notification_type"] == "like"){
                                require "notificationLike.php";
                            }
                            echo "<hr>";
                        }
		            ?>
                    </div>