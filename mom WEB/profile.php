 	<?php
   include("config.php");
   $db = new PDO("mysql:localhost;MOM","root","");
   session_start();
   $error="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $sql = "SELECT * FROM mother WHERE email = '$myemail' and password = '$mypassword' as name
      		  SELECT age FROM mother as age
      		  SELECT status FROM mother as status";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //  $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) 
      {
     //    session_register("email");
         $_SESSION['email'] = $myemail;
         //go to the mom profile page
        header("location: page.php");
      }
      else 
      {
      	  $sql = "SELECT * FROM doctor WHERE email = '$myemail' and password = '$mypassword'as name";
	      $result = mysqli_query($db,$sql);
	      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     	  $c = mysqli_num_rows($result);
     	  if($c == 1) 
     	  {
     	  	$_SESSION['email'] = $myemail;
     	  	//go to the doctor profile page
       		 header("location: page.php");
     	  }
     	  else
         	$error = "Your Login email or Password is invalid";
      }
   }
?> 



 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
<link rel=¨stylesheet¨ type=¨css¨ href=¨profile.css¨>


<body>
	<div class="mainbody container-fluid" style="background-color:#8f2950;">
    <div class="row" >
        <div class="navbar-wrapper">
            <div class="container-fluid" >
                <div class="navbar navbar-default navbar-static-top" role="navigation">
                    <div class="container-fluid" style="background-color:#8f2950; ">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                                    class="icon-bar"></span><span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="MOM.html" style="margin-right:-8px; margin-top:-5px;">
                                <img alt="Brand" src="logo.png" width="40px" height="40px" style="margin-right: 30px; font-weight: bold">
                            </a>
                            <a class="navbar-brand" href="MOM.html" style="color: white">HOME</a>
                           <!-- <i class="brand_network"><small><small>diaspora* Network</small></small></i>-->
                        </div>
                        <div class="navbar-collapse collapse" style="color: white">
                        	<ul class="nav navbar-nav" style="color: white">
                                <li><a href="index.html" style="color: white">Chat</a></li>
                                <li><a href="#" style="color: white">My Activity</a></li>
                                <li><a href="nutrition.html" style="color: white">Nutrition</a></li>
                                <li><a href="exercises.html" style="color: white">Exercises</a></li>
                                <li><a href="babies.html" style="color: white">Babies</a></li>
                                <li><!--<span class="badge badge-important">2</span>--><a href="#"><i class="fa fa-bell-o fa-lg" aria-hidden="true" style="color: white"></i></a></li>
                                <!--<li><a href="#"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i></a></li>-->
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                        <img src="logo.png" class="img-responsive img-circle" title="John Doe" alt="John Doe" width="30px" height="30px">
                                    </span>
                                    <span class="user-name">
                                        Name
                                    </span>
                                    <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-content">
                                                <div class="row">
                                                    <div class="col-md-5" style="color: white">
                                                        <img src="logo.png" alt="Alternate Text" class="img-responsive" width="120px" height="120px" />
                                                        <p class="text-center small">
                                                            <a href="./3X6zm">Change Photo</a></p>
                                                    </div>
                                                    <div class="col-md-7" style="color: white">
                                                        <span  style="color: white"><?php echo $row["name"] ?></span> 
                                                        <div class="divider">
                                                        <ul class="dropdown-menu"  style="color: white">
                                                        <li><a href="nutrition.html" class="btn btn-default btn-xs" style="color: white"><i class="fa fa-user-o" aria-hidden="true" style="color: white"></i> Nutrition</a></li>
                                                        <li><a href="exercises.html" class="btn btn-default btn-xs" style="color: white"><i class="fa fa-address-card-o" aria-hidden="true" style="color: white"></i> Exercises</a></li>
                                                        <li><a href="babies.html" class="btn btn-default btn-xs" style="color: white"><i class="fa fa-cogs" aria-hidden="true" style="color: white"></i> Babies</a></li>
                                                    	</ul>
                                                      <!--  <a href="#" class="btn btn-default btn-xs"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Help!</a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="navbar-footer">
                                                <div class="navbar-footer-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a href="#" class="btn btn-default btn-sm"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Passowrd</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="#" class="btn btn-default btn-sm pull-right"><i class="fa fa-power-off" aria-hidden="true"></i> Sign Out</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="padding-top:50px;"> </div>
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div style="display: inline-block;">
                        <!--<div align="center">
                            <img class="thumbnail img-responsive" src="logo.png">
                            <div class="p-image">
                          <i class="fa fa-camera upload-button"></i>
                          <input class="file-upload" type="file" accept="image/*"/>
                        </div>
                        </div>-->
                        
                        </div>
                        <div class="media-body">
                            <hr>
                            <h3><strong><?php echo $row["name"] ?></strong></h3>
                            <hr>
                            <h3><strong><a class="navbar-brand" href="calc.php">MY INFO</a></strong></h3>
                            <hr>
                            <!--<h3><strong></strong></h3>
                            <p></p>
                            <hr>
                            <h3><strong></strong></h3>
                            <p></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <span>
                        <h1 class="panel-title pull-left" style="font-size:30px;"><?php echo $row["name"] ?> <i class="fa fa-check text-success" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="John Doe is sharing with you"></i></h1>
                        <div class="dropdown pull-right">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Friends
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">Family</a></li>
                                <li><a href="#"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Friends</a></li>
                                <li><a href="#">Work</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Add a new aspect</a></li>
                            </ul>
                        </div>
                    </span>
                    <br><br><hr>
                    <span class="pull-left">
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-files-o" aria-hidden="true"></i> Posts</a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-picture-o" aria-hidden="true"></i> Photos <span class="badge">20</span></a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-users" aria-hidden="true"></i> Contacts <span class="badge">42</span></a>
                    </span>
                </div>
            </div>
            <hr>
            <!-- Simple post content example. -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left">
                        <a href="#">
                            <img class="media-object img-circle" src="logo.png" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
                        </a>
                    </div>
                    <h4><a href="#" style="text-decoration:none;"><strong><?php echo $row["name"] ?></strong></a> – <small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i> 42 minutes ago</i></a></small></small></h4>
                    <span>
                        <div class="navbar-right">
                            <div class="dropdown">
                                <button class="btn btn-link btn-xs dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dd1" style="float: right;">
                                    <li><a href="#"><i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i> Report</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-ban" aria-hidden="true"></i> Ignore</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-bell" aria-hidden="true"></i> Enable notifications for this post</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-eye-slash" aria-hidden="true"></i> Hide</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="fa fa-fw fa-trash" aria-hidden="true"></i> Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </span>
                    <hr>
                    <div class="post-content">
                        <p>Simple post content example.</p>
                        <p>This is my first post in this website.</p>
                    </div>
                    <hr>
                    <div>
                        <div class="pull-right btn-group-xs">
                            <a class="btn btn-default btn-xs"><i class="fa fa-heart" aria-hidden="true"></i> Like</a>
                            <a class="btn btn-default btn-xs"><i class="fa fa-retweet" aria-hidden="true"></i> Reshare</a>
                            <a class="btn btn-default btn-xs"><i class="fa fa-comment" aria-hidden="true"></i> Comment</a>
                        </div>
                        <div class="pull-left">
                            <p class="text-muted" style="margin-left:5px;"><i class="fa fa-globe" aria-hidden="true"></i> Public</p>
                        </div>
                        <br>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#">
                                <img class="media-object img-circle" src="logo.png" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <textarea class="form-control" rows="1" placeholder="Comment"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="Profile.js"></script>
</body>