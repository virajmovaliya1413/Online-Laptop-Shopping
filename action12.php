<?php
    //Connection 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wpsem6";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn)
    {
        echo "Hello ";  
    }
    else
    {
        echo "Connection Failed".mysqli_connect_error();
    }


    error_reporting(E_ALL);
    //First query
    // var_dump($_POST);
    if(isset($_POST['sub'])) 
    {
        $Fname = $_POST['fname'];
        $Lname = $_POST['lname'];
        $Email    = $_POST['email'];
        $Password  = $_POST['pwd'];
        $CPassword  = $_POST['cpwd'];
        $DOB     = $_POST['trip-start'];

        $query1  =  "INSERT INTO register(Fname, Lname, Email, Password, CPassword, DOB) VALUES('$Fname','$Lname','$Email','$Password','$CPassword','$DOB')";
        $data1   =  mysqli_query($conn,$query1);
        if($data1)
        {
            //echo "welcome $Fullname";
            echo "<script>
            alert('Registered Successfully in the TechCartShop');
            window.location='login.html';
            </script>";
            // header('Location:login.html');
        }
        else
        {
            echo "<script>
            alert('Please Try Again Later');
            window.location='signup.html';
            </script>";
        }

    }

    //Second query
    if(isset($_POST['login'])) 
    {
        $email1  = $_POST['email'];
        $passw    = $_POST['pwd'];

        $query2  =  "SELECT * FROM register WHERE Email = '$email1' and Password = '$passw'";
        $data2   =  mysqli_query($conn,$query2);
        $row = mysqli_fetch_array($data2,MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($data2);
        
        if($count == 1)
        {
            session_start();
            $_SESSION['login_user'] = $email1;
            echo "<script>
            alert('Welcome To TechCartShop');
            window.location='index.html';
            </script>";
            // header('Location:index.html');
        }
        else
        {
            echo "<script>
            alert('Your Email Id/Password is Incorrect');
            window.location='login.html';
            </script>";
        }
    }


    //Forth query
    if(isset($_POST['loginadmin'])) 
    {
        $email2  = $_POST['email2'];
        $passw2    = $_POST['pwd2'];

        $query3  =  "SELECT * FROM adminlogin WHERE email1 = '$email2' and passw = '$passw2'";
        $data3   =  mysqli_query($conn,$query3);
        $row = mysqli_fetch_array($data3,MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($data3);
        
        if($count == 1)
        {
            session_start();
            $_SESSION['login_user'] = $email2;
            echo "<script>
            alert('Welcome To TechCartShop');
            window.location='Addproduct.html';
            </script>";
            // header('Location:Addproduct.html');
        }
        else
        {
            echo "<script>
            alert('Your Email Id/Password is Incorrect');
            window.location='adminlogin.html';
            </script>";
        }
    }


     //Third query
     if(isset($_POST['add'])) 
     {
         $pname   = $_POST['pname'];
         $pcategory  = $_POST['category'];
         $pdescription  = $_POST['description'];
         $pprice  = $_POST['price'];

         $filename = $_FILES["imgnew"]["name"];
         $tempname = $_FILES["imgnew"]["tmp_name"];
         $folder = "./newproducts/" . $filename;
        

         $query4  =  "INSERT INTO addproduct(pname, pcategory, pdescription, pprice, img1) VALUES('$pname','$pcategory','$pdescription', '$pprice', '$filename')";
         $data4   =  mysqli_query($conn,$query4);
    
            if(move_uploaded_file($tempname, $folder)){
                echo "<script>
             alert('Product Added Successfully!!!');
             window.location='ProductManagement.html';
             </script>";
            }
            else
            {
             echo "<script>
             alert('Please Try Again Later');
             window.location='Addproduct.html';
             </script>";
            }
              
     }

     if(isset($_GET['delete'])) 
     {
         $query  =  "DELETE FROM addproduct WHERE UID = ".$_GET['id'];
         $data   =  mysqli_query($conn,$query);
            if($data){
                header("Location:ProductManagement.php");
                die();              
            }
            else{
                echo "Error: " .$query ."<br>" .mysqli_error($conn);
            }
     }



    //  //Fifth query
    //  if(isset($_POST['edit'])) 
    //  {
    //      $pname   = $_POST['pname'];
    //      $pcategory  = $_POST['category'];
    //      $pdescription  = $_POST['description'];
    //      $pprice  = $_POST['price'];
         
    //      if(isset($_FILES)){
    //         $location = "newproducts/";
    //         $filename = $_FILES["imgnew"]["name"];
    //         $tempname = $_FILES["imgnew"]["tmp_name"];

    //         $query5 = "UPDATE addproduct SET pname = '"$pname" 
    //      }
         
    //      $folder = "./newproducts/" . $filename;
        

    //      $query4  =  "INSERT INTO addproduct(pname, pcategory, pdescription, pprice, img1) VALUES('$pname','$pcategory','$pdescription', '$pprice', '$filename')";
    //      $data4   =  mysqli_query($conn,$query4);
    
    //         if(move_uploaded_file($tempname, $folder)){
    //             echo "<script>
    //          alert('Product Added Successfully!!!');
    //          window.location='ProductManagement.html';
    //          </script>";
    //         }
    //         else
    //         {
    //          echo "<script>
    //          alert('Please Try Again Later');
    //          window.location='Addproduct.html';
    //          </script>";
    //         }
              
    //  }
 
?>