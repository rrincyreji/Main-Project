<?php 
  $con=mysqli_connect("localhost","root","","project");

if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
  /*if(!isset($_SESSION["email"]))
  {
   header("location:login.php");
  }
  */
  if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
    
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        //$password = md5($password); //password matching
        $sql="SELECT * from registration_s where email='".$email."' AND password='".$password."'";
        $res=$con->query($sql);
        if($res->num_rows > 0)
        {
          foreach($res as $data)
          {
            $email=$data['email'];
            $password=$data['password'];
            $role=$data['role'];
          } 
          $_SESSION['email'] = $email;
          $_SESSION['msg']="Login Successful. ";
          echo "<p id='d'>" .$_SESSION['msg']."</p>" ;

          if($role === "Customer")
          {
            header("location:customerhome.php");  
          }
          else if($role === "Seller")
          {
            header("location:sellerhome.php");  
          }
          else if($role === "Company")
          {
            header("location:suppilerhome.php");  
          }
          else if($role === "Admin")
          {  
            header("location:adminhome.php");  
          }
          exit(0); 
        }
        else
        {
          $_SESSION['msg']="Invalid email or password. ";
          echo "<p id='d'>" .$_SESSION['msg']."</p>" ;
          exit();
        }
      } 
    }
  
  $con->close();
?>
