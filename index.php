<?php
$servername="localhost";
$user="root";
$pass="";
$db="maw";
if(!@mysql_connect($servername,$user,$pass) || !@mysql_select_db($db) )
die ("Connection error");
else

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MAKE A WISH</title>
    <meta name="description" content="Your Description Here">
    <meta name="keywords" content="bootstrap themes, portfolio, responsive theme">
    <meta name="author" content="ThemeForces.Com">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="tf-home" style="background-image:url(img/cloth.png)">
        <div class="overlay" >
            <div id="sticky-anchor"></div>
            <nav id="tf-menu" class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand logo" href="index.html">MAKE A WISH</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="#tf-home">Home</a></li>
                        
                      
                      </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <div class="container">
                <div class="content">
                    <h1>MAKE A WISH</h1>
                    <h3>Fulfill a wish</h3>
                    <!--<h4 style="color:white">Enter the male clothing stock details in the respected sections</h4> -->
                    <br><br>                    
                </div>
            </div>
        </div>
    </div>

    <div id="tf-service" style="background:url(img/color.png)" >
        <div class="container" >
<div class="row main">
        <div class="main-login main-center" style="margin-top: 30px;
  margin: 0 auto;
  max-width: 400px;
    padding: 10px 40px;
  background:#ad0c3f;
      color: #FFF;
    text-shadow: none;
  -webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
">
        <h5 style="text-align:center">Enter the details for kid.</h5>
          <form class="" method="post" action="contact.php">
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Name</label>
              <div class="cols-sm-10">
                <div class="input-group" style="-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                </div>
              </div>
            </div>
			
			
			
            <div class="form-group" style=" margin-bottom: 15px">
              <label for="age" class="cols-sm-2 control-label">Age</label>
              <div class="cols-sm-10">
                <div class="input-group" style="-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="age" id="age"  placeholder="Enter your age"/>
                </div>
              </div>
            </div>

            <div class="form-group" style=" margin-bottom: 15px">
              <label for="username" class="cols-sm-2 control-label">Address</label>
              <div class="cols-sm-10">
                <div class="input-group" style="-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="address" id="address"  placeholder="Enter your Address"/>
                </div>
              </div>
            </div>

            <div class="form-group" style=" margin-bottom: 15px">
              <label for="password" class="cols-sm-2 control-label">Contact</label>
              <div class="cols-sm-10">
                <div class="input-group" style="-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="contact" id="contact"  placeholder="Enter your Contact"/>
                </div>
              </div>
            </div>
<!--
            <div class="form-group" style=" margin-bottom: 15px">
              <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
              <div class="cols-sm-10">
                <div class="input-group" style="-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                </div>
              </div>
            </div>-->

            <div class="form-group ">
              <input type="submit" name="Register">
            </div>
            
          </form>
        </div>
      </div>



            <!--<div class="col-md-4">

                <div class="media">
                  <div class="media-left media-middle">
                   <a href="addition.html"> <i class="	fa fa-plus-square"></i></a>
                  </div>
                  <div class="media-body">
                    <a href="addition.html"><h4 class="media-heading">ADDITION</h4></a>
                    <p>Here you can add new stocks to keep the database updated and maintain a global view of the clothing availablity.</p>
                  </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="media">
                  <div class="media-left media-middle">
                   <a href="updation.html"> <i class="fa fa-edit"></i></a>
                  </div>
                  <div class="media-body">
                    <a href="updation.html"><h4 class="media-heading">UPDATION</h4></a>
                    <p>You can update the data present in the distributed datatbase and maintain the global copy of the clothing and the brands present</p>
                  </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="media">
                  <div class="media-left media-middle">
                    <a href="replication.html"><i class="fa fa-copy"></i></a>
                  </div>
                  <div class="media-body">
                    <a href="replication.html"><h4 class="media-heading">REPLICATE</h4></a>
                    <p>Here you can acheieve the replication of the databases from the respective sites by either being a master or slave</p>
                  </div>
                </div>

            </div>
			
			 <div class="col-md-4">

                <div class="media">
                  <div class="media-left media-middle">
                    
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"></h4>
                    <p></p>
                  </div>
                </div>

            </div>

			 <div class="col-md-4">
                <div class="media">
                  <div class="media-left media-middle">
                   <a href="search.html"> <i class="fa fa-search"></i></a>
                  </div>
                  <div class="media-body">
                    <a href="search.html"><h4 class="media-heading">SEARCH</h4></a>
                    <p>You can search for the data present in the tables and retrive them from one or multiple tables </p>
                  </div>
                </div>

            </div>-->
            
        </div>
    </div>

    
   

   

   
    <nav id="tf-footer" >
        <div class="container">
             <div class="pull-center" >
                <p style="text-align:center">2017 © Dennis and Varun TEAM.</p>
            </div>
            
        </div>
    </nav>
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>

  </body>
</html>

