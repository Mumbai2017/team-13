<?php
$httpreferer = $_SERVER['HTTP_REFERER'];

{
  echo ("inside");
 if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['address']) && isset($_POST['contact']))
    {
    $name = $_POST['name'];
    $age = $_POST['age']; 
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    echo ("inside");
    if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['address']) && isset($_POST['contact']))
 { 
  echo ("inside");
        $query1 = "SELECT `name` FROM  `kid` WHERE `contact`='$contact'";
        if($query_run = mysql_query($query1))
        {
          if(mysql_num_rows($query_run) == 1)
            echo '<script type="text/javascript">alert("This child is already registered");</script>';
          else if(mysql_num_rows($query_run) == 0)
          {
              $query2 = "INSERT INTO `kid`(`name`,`age`,`address`,`contact`) VALUES( '$name' ,'$age','$address' ,'$contact' )";
                if($query_run = mysql_query($query2))
                {
                     echo '<script type="text/javascript">alert("Signed up successfully!!");window.location="'.$httpreferer3.'";</script>';
      
                           }
                 		
               
                else
                {
                     echo '<script type="text/javascript">alert("Sorry,some error has occurred"); window.location="'.$httpreferer3.'";</script>';
                }
          }
        }
    
}
                 
}
}
?>