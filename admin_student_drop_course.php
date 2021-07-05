<?php
  session_start();
  $check_auth=$_SESSION['email'];
  $connection=mysqli_connect('localhost','root','','rms');
  $auth_query="select * from admin where email='$check_auth'";
  $check_result=mysqli_query($connection, $auth_query);
  $count_auth=mysqli_num_rows($check_result);
  if($count_auth==0)
  {
    echo'<br>Unauthorized Access!! Permission Denied!!!! <br> <a href="sign_out.php"> Destroy Session </a>';
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Drop Courses</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sty">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="admin_homepage.php">
          <img src="logo.png" height="75" class="d-inline-block" alt="Business"> <b><font color="red"> EWU RESULT MANAGEMENT SYSTEM </font>  </b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a class="nav-link" href="admin_homepage.php">Home</a>
             </li>
             
             <li class="nav-item">
               <a class="nav-link" href="sign_out.php">Sign out</a>
             </li>
           </ul>
         </div>
     </div>
   </nav>

   <style media="screen">
    
   </style>

   <div class="container">
   </div>
   <br><br>
   <div class="container">
       <h1>Course Drop</h1>
     <hr/>

   </div>
   <br>
   <div class="container">
       <?php
       if($_SERVER["REQUEST_METHOD"] == "POST")
       {
         $falsemsg="";
         $truemsg="";
         $connection=mysqli_connect('localhost','root','','rms');
         $email= $_POST['stdemail'];
         $query="select * from courseinfo where stdemail='$email'";
         $result=mysqli_query($connection,$query);
             if($result)
                {
                  if(mysqli_num_rows($result)>0)
                      {
                        echo'<div class="row">';
                        while($ans=mysqli_fetch_array($result))
                          {
                                        $cname=$ans['coursename'];
                                        echo'<div class="col-md-4"><div class="card"><div class="cardcontainer">';
                                        $query2="select teacher, teacher_email, routine, start, end from courses where coursename='$cname'";
                                        $result2=mysqli_query($connection,$query2);
                                        $ans2=mysqli_fetch_array($result2);
                                        $teacher=$ans2['teacher'];
                                        $teacher_email=$ans2['teacher_email'];
                                        $routine=$ans2['routine'];
                                        $start=$ans2['start'];
                                        $end=$ans2['end'];
                                        $drop_req=$ans['drop_req'];
                                        echo'<b><h1>'.$ans['coursename'].'</h1></b>';
                                        echo'<b>By,</b> '.$teacher.'<br>';
                                        echo'<b>Routine:</b> '.$routine.'<br>';
                                        echo'<b>Start Time:</b> '.$start.'<br>';
                                        echo'<b>End Time:</b> '.$end.'<br>';
                                        echo'<b>Drop Request:</b> '.$drop_req.'<br>';
                                        echo'<form class="drop" method="POST" action="admin_student_drop_course_2.php">
                                        <input type="hidden" name="course" value="'.$cname.'"><br>
                                        <input type="hidden" name="stdemail" value="'.$email.'"><br>
                                        <input type="submit" class="btn5 btn-primary btn-block" value="Drop Course">
                                        </form>';
                                        echo'</div></div><br><br></div>';
                          }
                          echo'</div>';
                      }

                  }
            else
            {
                 echo "Nothing to show Here <br>";
            }

       }

                          ?>


                      </div>
                      <script>
  										$(document).ready(function(){
  											$('.drop').on('submit', function(){
  												if(confirm("<h1>Are You sure want drop this course for selected student?</h1>"))
  												{
  													return true;
  												}
  												else
  												{
  													return false;
  												}

  											});
  										});

  										</script>

   <br><br><br>

 </body>
 </html>
