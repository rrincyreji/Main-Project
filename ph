<div class="row">
                        <form method="post" id="payment">
                            </br></br>
                            <?php
                             $grand_total=0;
                            $sql3 = mysqli_query($con,"SELECT * FROM cart c, product p where p.product_id = c.product_id and c.is_checked_out=0");
                                while ($row = mysqli_fetch_array($sql3)) {
                                $sub_total = $row['cart_qty'] * $row['price'];
                                $grand_total += $sub_total;
                            ?>
                            <input type="hidden" name="items[]" value="<?= $row['product_id'] ?>">
                            <input type="hidden" name="quantity[]" value="<?= $row['cart_qty'] ?>">
                            <input type="hidden" name="price[]" value="<?= $row['price'] ?>">
                            <input type="hidden" name="brand[]" value="<?= $row['reg_id'] ?>">
                            <input type="hidden" name="entry_ids[]" value="<?= $row['entry_id'] ?>">
                            <p><?= $row['p_name'] ?> <span class="price">₹ <?= $sub_total ?></span></p>
                            </hr>

                            <?php
                            } 
                            
                            ?>
                            <p>Total <span class="price">₹ <?= $grand_total ?></span></p>


                            <input type="hidden" id="amt"name="total_amount" id="total" value="<?= $grand_total; ?>">
                            </br>
                            <?php
                                $email=$_SESSION['email'];
                                $sq = "SELECT * FROM registration_s r,ship_address s where r.registration_id=s.reg_id and r.registration_id=(select registration_id from registration_s where email='$email')";
                                $res = $con-> query($sq);
                                if ($res-> num_rows > 0){
                                while($ro = $res-> fetch_assoc()){
                            ?>
                            <div class="form-group">
                            
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"  value = "<?= $ro['Name_'] ?>" minlength="5" maxlength="50" pattern="\S(.*\S)?" required>
                            </div>
                            </br>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" value = "<?= $ro['email'] ?>" required>
                            </div>
                            </br>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value = "<?= $ro['phone'] ?>" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 6-9 and remaing 9 digit with 0-9" required>
                            </div>
                            </br>
                            <div class="form-group">
                                <input type="text" class="form-control" value="Select Address" disabled></br></br>
                           
                            <input type="radio" name="address" id="address" value="<?php echo $row['id']?>"> <span><?php echo $row['housename'];?>(H), <?php echo $row['state_'];?>, <?php echo $row['district'];?>, <?php echo $row['pincode'];?> </span> </label></br></br>
                                     
                            <?php
                                }
                                }
                            ?>
                            </div>
                            <div class="form-group">
                            <button type="submit" name="submit"class="btn btn-primary" value="Place Order">Place Order</button>
                            </a>
                            </div>
                            
                        </form>
                    </div>











                    <?php
if (isset($_POST['submit'])) {
    $order_date = date("Y-m-d H:i:s");
    $customer_name = $_POST['name'];
    $customer_email = $_POST['email'];
    $customer_phone = $_POST['phone'];
    $customer_address = $_POST['address'];
    
    $total_amount = $_POST['total_amount'];
    
    //Insert to orders table
    $sql = "INSERT INTO orders (user_id, address_id, order_date, payment_mode, payment_id, total_amount,status) VALUES ($user, $address,'$order_date',1,'$total_amount',0)";
    $result = mysqli_query($con, $sql);
    $order_id = mysqli_insert_id($con);
    if (!empty($order_id)) {
        foreach ($_POST['items'] as $key => $product_id) {
            $id = $_POST['entry_ids'][$key];
            $quantity = $_POST['quantity'][$key];
            $price = $_POST['price'][$key];
         
            $brand = $_POST['brand'][$key];
            $total_price = $quantity * $price;
            $sql = "INSERT INTO order_items (order_id, product_id, brand, quantity, price, total_price) 
            VALUES ($order_id, $product_id, $brand, $quantity, $price, $total_price)";
            $result = mysqli_query($conn, $sql);
            // update cart table status
            $sql = "UPDATE cart SET is_checked_out = 1 WHERE entry_id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // reduce Total_quantity from product table
                $sql = "UPDATE product SET qty = qty - $quantity WHERE product_id = $product_id";
                $res = mysqli_query($conn, $sql);
            //     $s="SELECT * from product_var where product_var.product_id=$product_id  and product_var.size_id=$size";
            //     $r = $conn-> query($s);
            //     if ($r-> num_rows > 0){
            //     while($r1 = $r-> fetch_assoc()){ 
            //         $qty=$r1['quantity'];
            //                 if($qty <= 3)
            //                 {
            //                     $notif = mysqli_query($conn,"INSERT INTO notification(receiver, notif_id, read_status) VALUES ($brand,2,0)");
         
                              
            //                 }
            //     }
                
            // }
        }
            else
            echo'<script>alert("Error in placing order!")</script>';
        }
        
        echo'<script>alert("Order is placed successfully!")</script>';
  
        
     header("location:seller-checkout.php?id=<?php echo $order_id;?>");   
    }
}
?>