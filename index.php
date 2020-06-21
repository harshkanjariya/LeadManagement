<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <title>Way2Advertize</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="css/home_style.css" rel="stylesheet">
        <link href="css/home_gstyle.css" rel="stylesheet">
        <link href="css/home_connect.css" rel="stylesheet">
        <link href="css/dark-theme.css" rel="stylesheet">

    </head>
    <body>
	    <?php
		    if(!isset($_COOKIE['key1'])){
			    // echo "<script>window.location.replace('html/signup.html');</script>";
		        // header('Location:html/signup.html');
		       $name="Harsh";
		    }else{
		        include 'php/database.php';
		        $cuki=$_COOKIE['key1'];
		        $sql="select * from lead_users where email='".$cuki."'";
		        $result=mysqli_query($db,$sql);
		        $result=mysqli_fetch_assoc($result);
		        mysqli_close($db);
		        $name=$result['username'];
		    }
	    ?>
	    <script type="text/javascript">
	    	var name='<?php echo $name;?>';
	    	function logout() {
				var cuki = "key1=; expires="+new Date(new Date().getTime()-100).toGMTString()+"; path=/harsh/LeadManager/;";
	            document.cookie=cuki;
	            window.location.reload();
	    	}
	    </script>
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="page-sidebar">
                <div class="logo-box"><a href="#" class="logo-text" style="font-size: 1.5rem">Way2Advertize</a><a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
                <div class="page-sidebar-inner slimscroll">
                    <ul class="accordion-menu">
                        
                        <li class="active-page">
                            <a href="index.html" class="active"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
                        </li>
                        <li>
                            <a href="$"><i class="material-icons-outlined">settings</i>Users Management<i class="material-icons has-sub-menu">add</i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="styles-typography.html">New Users</a>
                                </li>
                                <li>
                                    <a href="styles-code.html">All Users</a>
                                </li>
                                <li>
                                    <a href="styles-tables.html">Organization</a>
                                </li>
                                <li>
                                    <a href="styles-icons.html">Channel Partenrs</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="creat_lead.html" targer="myfrm"><i class="material-icons-outlined">account_circle</i>Create Lead</a>
                        </li>
                        <li>
                            <a href="file-manager.html"><i class="material-icons">cloud_queue</i>Manage Leads</a>
                        </li>
                        <li>
                            <a href="#"><i class="material-icons">text_format</i>Transactions History<i class="material-icons has-sub-menu">add</i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="styles-typography.html">Today's Transaction</a>
                                </li>
                                <li>
                                    <a href="styles-code.html">All Transactions</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="material-icons">apps</i>Create Invoice</a>
                        <li>
                            <a href="#"><i class="material-icons">card_giftcard</i>Wallet<i class="material-icons has-sub-menu">add</i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="extended-select2.html">Total Earn</a>
                                </li>
                                <li>
                                    <a href="extended-datatables.html">Redeemable</a>
                                </li>
                              
                            </ul>
                        </li>
                        <li>
                            <a href="charts.html"><i class="material-icons">bar_chart</i>Rewards</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="material-icons">input</i>Support Area</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="page-container">
                <div class="page-header">
                    <nav class="navbar navbar-expand">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav">
                            <li class="nav-item small-screens-sidebar-link">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                            </li>
                            <li class="nav-item nav-profile dropdown" style="margin-left: 25px;">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="image/user.png" alt="profile image">
                                    <span><?php echo $name;?></span></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"></a>
                            </li>
                        </ul>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"></a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"></a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"></a>
                                </li>
                            </ul>
                        </div>
                        <ul style="list-style-type: none;" class="nav-right-list">
                             <li class="nav-item">
                                <a href="#" class="nav-link" id="dark-theme-toggle">
                                    <i class="material-icons-outlined">brightness_2</i><i class="material-icons">brightness_2</i></a>
                                 </li>
                             <li class="nav-item">
                                <a href="#" class="nav-link" onclick="logout()">
                                    <i class="material-icons">power_settings_new</i></a>
                                 </li>
                       </ul>
<!--                         <div class="navbar-search">
                            <form>
                                <div class="form-group">
                                    <input type="text" name="search" id="nav-search" placeholder="Search...">
                                </div>
                            </form>
                        </div>
 -->                    </nav>
                </div>
                <iframe src="http://jeet.shreekhodiyarind.co.in/jeet/eventalk/" id="myfrm" name="myfrm"></iframe>
        </div>
        <!-- Javascripts -->
        <script src="jquery/jquery-3.4.1.min.js"></script>
        <script src="bootstrap/popper.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>
        <script src="js/jquery.sparkline.min.js"></script>
        <script src="js/apexcharts.min.js"></script>
        <!-- <script src="../js/jquery.blockUI.js"></script> -->
        <script src="js/jquery.flot.min.js"></script>
        <!-- <script src="../js/jquery.flot.time.min.js"></script> -->
        <!-- <script src="../js/jquery.flot.symbol.min.js"></script> -->
        <!-- <script src="../js/jquery.flot.resize.min.js"></script> -->
        <!-- <script src="../js/jquery.flot.tooltip.min.js"></script> -->
        <script src="js/connect.min.js"></script>
        <!-- <script src="../js/dashboard.js"></script> -->
    </body>
</html>