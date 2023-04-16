<?php
                            
                                        $sql="SELECT * from notification, notif_type where notification.receiver=1 and notification.notif_id=notif_type.notif_id and notification.read_status=0";
                                        $result=$con-> query($sql);
                                        $count=1;
                                        if ($result-> num_rows > 0){
                                        while ($row=$result-> fetch_assoc()) {
                                        $entry=$row['entry_id'];
                                    ?>
                                <a href="admin_reg_user.php?id=<?php echo $entry;?>" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                    
                                    </div>
                                    
                                    <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal"><?php echo $row['notification'];?></h6>
                                    
                    
                                    </div>
                                </a>
                                <?php
                                }
                                }
                                ?>