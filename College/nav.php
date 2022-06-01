
<!--
<body>

<a href="student.php"><button>Students</button></a>
<a href="Teacher.php"><button>Teachers</button></a>
<a href="MyProfile.php"><button>Profile</button></a>
<a href="EditProfile.php"><button>Edit Profile</button></a>
<a href="ChangePassword.php"><button>Change Password</button></a>
<a href="Complaint.php"><button>Complaints</button></a>
<a href="feedback.php"><button>Feedbacks</button></a>
</body>
</html>-->






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
   <link rel="stylesheet" href="../files/css/themify-icons.css">
   <style>
    ul li ul.dropdown{
        min-width: 100%; /* Set width of the dropdown */
        background: #1e2019;
        display: none;
        position: absolute;
        z-index: 999;
        left: 0;
    }
    ul li:hover ul.dropdown{
        display: block;	/* Display the dropdown */
    }
    ul li ul.dropdown li{
        display: block;
    }
    </style>
</head>
<body>


    <!--bgcolor="#efefef"-->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2 class="sidebar-brand">
            &nbsp;
                <span class="ti-package"></span>
                <span>Uni Hub</span>
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
            <li>
                &nbsp;
                    <a href="Homepage.php">
                        <span class="ti-home"></span>
                        <span>&nbsp;Home</span>
                    </a>
                </li>
                <li>
                &nbsp;
                    <a href="teachers_info.php">
                        <span class="ti-blackboard"></span>
                        <span>Teachers Info</span>
                    </a>
                </li>
                <li>
                &nbsp;
                <a href="GiveComplaint.php">
                <span class="ti-heart-broken"></span>    
                <span>Complaints</span>
                </a>
                <ul class="dropdown">
                <li>&nbsp;&nbsp;<span class="ti-hand-open"><a href="GiveComplaint.php"> Give Complaints</a></span></li>
                <li>&nbsp;&nbsp;<span class="ti-eye"><a href="ViewComplaint.php"> View Complaints</a></span></li>
                </ul>
                </li>

                <!--<li>
                &nbsp;
                    <a href="">
                        <span class="ti-pencil-alt"></span>
                        <span>Feedbacks</span>
                    </a>
                </li>-->
                <li>
                &nbsp;
                    <a href="MyProfile.php">
                        <span class="ti-info-alt"></span>
                        <span>College Info</span>
                    </a>
                </li>
                <li>
                &nbsp;
                    <a href="studentsinfo.php">
                        <span class="ti-info-alt"></span>
                        <span>Students Info</span>
                    </a>
                </li>
                <li>
                &nbsp;
                    <a href="../logout.php" onClick="javascript:return confirm ('Do you really want to logout ?');">
                        <span class="ti-power-off"></span>
                        <span>Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>