<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="icon" type="image/x-icon" href="icon.png">
<style>
#mySidenav a {
  position: absolute;
  left: -80px;
  transition: 0.3s;
  padding: 15px;
  width: 100px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
  left: 0;
}

.profile {
  top: 20px;
  background-color: #9FE2BF;
}

.orders {
  top: 100px;
  background-color: #40E0D0;
}

.Analytics {
  top: 180px;
  background-color: #6495ED;
}

.feedback {
  top: 260px;
  background-color: #66C479;
}

.logout {
  top: 320px;
  background-color: #DE3163;
}
.customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.customers td, .customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

.customers tr:nth-child(even){background-color: #f2f2f2;}

.customers tr:hover {background-color: #ddd;}

.customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<?php include 'profile.php'?>

<div id="mySidenav" class="sidenav">
  <a href="customer_dashboard.php" class="profile">Create profile</a>
  <a href="customerProfileView.php" class="orders">view profile</a>
  <a href="cust_orders.php" class="Analytics">View Orders</a>
  <!-- <a href="#" class="feedback">feedback</a> -->
  <a href="index.php" class="logout">logout</a>
</div> 
 
</body>
</html> 
