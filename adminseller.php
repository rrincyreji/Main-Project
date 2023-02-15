	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>adminseller</title>
	</head>
	<body>
	<h4 class="title">Add Supplier</h4>
    <form action="adminsellerphp.php" class="form" method="POST">
</div>
<div class="content">

<div class="row">
<div class="col-md-5">
   <div class="form-group">
       <label>Supplier Name</label>
       <input type="text" id="form_dname" class="form-control"placeholder="Supplier Name"  name="suppliername" autocomplete="off">
       <span class="error_form" id="dname_error_message" style="color:red; font-size :13px; "></span>
   </div>
</div>
<div class="col-md-3">
   <div class="form-group"><br>
       <label>Supplier proof</label>
       <input type="file" class="form-control" id="form_proof" placeholder="Supplier Proof" value="proof"  name="supplier_proof" autocomplete="off" >
       <span class="error_form" id="pincode_error_message" style="color:red; font-size :13px; "></span>
   </div>
</div>
<div class="col-md-4">
   <div class="form-group"><br>
       <label>Photo</label>
       <input type="file" class="form-control" id="form_photo" placeholder="Degree Proof" value="photo" name="photo" autocomplete="off">
       <span class="error_form" id="photo_error_message" style="color:red; font-size :13px; "></span>
    </div>
</div>
<div class="row">
<div class="col-md-12">
   <div class="form-group"><br>
  
       <textarea id="form_address"class="form-control" placeholder="Home Address" value="Address" name="address" autocomplete="off"></textarea>
       <span class="error_form" id="address_error_message" style="color:red; font-size :13px; "></span>
   </div>
</div>
</div>
<div class="row">
<div class="col-md-6">
   <div class="form-group"><br>
       <label>Phone number</label>
       <input type="phone" id="form_phone" class="form-control" placeholder="Phone number" maxlength="10" name="phoneno" autocomplete="off">
       <span class="error_form" id="phone_error_message" style="color:red; font-size :13px; "></span>
   </div>
</div>
</div>
<div class="row">
<div class="col-md-5">
   <div class="form-group"><br>
       <label>Comapany Name</label>
       <input type="text" id="form_dname" class="form-control"placeholder="Company Name"  name="company_name" autocomplete="off">
       <span class="error_form" id="dname_error_message" style="color:red; font-size :13px; "></span>
   </div>
</div>
</div>
<div class="col-md-6">
   <div class="form-group"><br>
       <label for="exampleInputEmail1">Email address</label>
       <input type="email" id="form_email" class="form-control" placeholder="Email" name="email" autocomplete="off" required>
       <span class="error_form" id="email_error_message"  style="color:red; font-size :13px; "></span>
   </div>
</div>
<div class="col-md-8">
   <div class="form-group"><br>
       <label for="exampleInputEmail1">
       Password</label>
       <input type="password" id="form_password" class="form-control" placeholder="password" name="password">
       <span class="error_form" id="password_error_message"  style="color:red; font-size :13px; "></span>
   </div>
</div>
</div>
<br>
<button type="submit" value="add" class="btn btn-info btn-fill pull-right" name="add">Add</button>
<div class="clearfix"></div>

</div>
</div>
</div>


</div>
</div>
</div>
</div>
</form>
	</body>
	</html>