<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/x-icon" href="icon.png">
<style>
body {margin:0;font-family:Poppins}

.topnav {
  overflow: hidden;
  /*background-color: #ba9fc6;*/
}

.topnav a {
  float: right;
  display: block;
  color: black;
  text-align: center;
  padding: 50px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  color: pink;
  text-decoration: underline;
  font-weight: bold;
}

.topnav .icon {
  display: none;
}
.logo1{
  float: left;
  display: block;
  color: #f2f2f2;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.dropdown {
  float: right;
  overflow: hidden;
  color: black;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: black;
  padding: 50px 20px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
 color: red;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  color: #d54474;
  text-decoration-color: black;
  text-decoration:underline;
}

.dropdown-content a:hover {
  background-color: #ba9fc6;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
  background-color: #ba9fc6;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
header{
  width: 100vw;
  height: 100vh;
  background-image: url('draft42.jpg');
  background-position: bottom;
  background-color: rosybrown;
  background-size: cover;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  color: red;

}
.header-content{
  margin-bottom: 150px;
  color:whitesmoke;
  text-align: center;
}
.header-content h2{
  font-size: 4vmin;
}
.line{
width: 150px;
height: 4px;
background: #fc036b;
margin: 10px auto;
border-radius: 7px;
}
.header-content h1{
  font-size: 7vmin;
  margin-top: 50px;
  margin-bottom: 30px;

}
.ctn{
  position: 8px 15px;
  background: #fc036b;
  border-radius: 30px;
  color:whitesmoke;
}
.logo1{
  
  align-content: right;
  align-items: center;
  display: flex;
  margin: 0 30px;
  align-items: center;
  justify-content: left;
}
.logo1 img{
  width: 10%;
  height:10%;

}

/*Events*/
section .event{
  width: 80%;
  margin: 80px auto;
}
.title{
  text-align: center;
  font-size: 4vmin;
  color:#47egab;
}
.row{

  display:grid;
  grid-template-columns: 100px 100px;
  width: 100%;
  justify-content: center;
  background-color: red;

}
.col {
  display: flex;
  align-items: left;
  flex-direction: column;
  justify-content: space-between;
  
}
.row .col img{
  width: 500px;

  

}
.events .row{
  margin-top: 50px;

}
h4{
  font-size:3vmin;
  color: #484873;
  margin: 20px auto;
}
.explore{
  width:100%;
  height: 70vh;
  background-image: url('gift.jpg');
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
  flex-direction: column;
}
.exp{
margin-bottom: 150px;
margin-top:200px;
  color:black;
  text-align: center;
}
.footer{
  width: 100%;
  height: 100px;
  padding: 20px 80px;
  margin: 0;
  background-color: #85929E;
  text-align: center;
}
.footer p{
  color: whitesmoke;
  margin: 20px auto;
}
.grid3{
      
      display:grid;
      grid-template-columns:300px 300px 300px 300px;
      grid-column-gap:10px;
      grid-row-gap: 10px;
      padding: 10px;
      background-color: #CCD1D1 ;
      justify-content: center;
      align-items: center;

}
.grid{
  background-color: #EBF5FB ;
  padding: 20px;
  text-align: center;
  justify-content: center;
  }
.grid img{
  margin-top: 40px;
  width: 100%;
  height: 100%;
  padding: 5px;
}
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  margin: 0;
  background-color: #85929E;
 /* height: 250px;*/
}

.column a {
  float: none;
  color: black;
  padding: 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.column a:hover {
  background-color: #7c7ce9;
}

/* Clear floats after the columns */
.row-grid:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
<div class="logo1"><h4>stitches</h4>
</div>
<div class="dropdown">
    <button class="dropbtn">Profile 
    </button>
    <div class="dropdown-content">
      <a href="reg.php">create accounts</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#store">Store</a>
   
  <a href="#home"class="active">Home</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<header>
  <!---<img src="D:\Project\Project papers\project code\pics\emb1.jpg">-->

  <div class="header-content">

    <!---<img src="D:\Project\Project papers\project code\pics\emb1.jpg">-->
    
    <h2>Live sale on</h2>
    <div>
      <h1>Weekend</h1>
      <a href="" class="ctn">learn more</a>
    </div>
  </div>
</header>
<section class="events">
  <div class="title">
    <h1> Shop here</h1>
    <div class="line"></div>
  </div>

<section>
    
    <div class="grid3">
      <div class="grid">
        <a href="#" class="inside">
         <img src="pics\emb1.jpg"></a>
         <p>Embroidery </p>
         <button><a href="shop.html"> explore more</a></button>
      </div>
      <div class="grid">
        <a href="#" class="inside">
         <img src="pics\mac1.jpg"></a>
         <p>Machrame arts</p>
         <button><a href="tshirt.html"> explore more</a></button>
      </div>
      <div class="grid">
        <a href="#" class="inside">
         <img src="pics\hair7.jpg"></a>
         <p>Hair accesories</p>
         <button><a href="pillows.html">explore more</a></button>
      </div>
      <div class="grid">
        <a href="#" class="inside">
         <img src="pics\dress4.jpg" height="200px"width="200"></a>
         <p>Women clothes</p>
         <button><a href="potrait.html">explore more</a></button>
      </div>
    </div>
  </section>
<section class="explore">
<div class="exp">
  <h1>Christmas Gift guide</h1>
  <div class="line"></div>
<p>Unique Christmas gifts sure to impress every personality</p>
<br>
<a href="" class="ctn">Learn more</a>
</div>
</section>

<!--<div class="row-grid">
        <div class="column">
          <h3>About</h3>
          <a href="#">About us</a>
          <a href="#">contact</a>
          <a href="#">Stitches India</a>
          <a href="#">Categories</a>
        </div>
        <div class="column">
          <h3>Seller</h3>
          <a href="#">Seller account</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
          <a href="#">Link 4</a>
        </div>
        <div class="column">
          <h3>Supplier</h3>
          <a href="#">Supplier account</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
          <a href="#">Link 4</a>
        </div>
    </div>-->
<section class="footer">
  <p>Email id:abc@gmail.com | Contact us:+91 00000 00000</p>
  <p>copyright@2021 </p>
</section>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>
