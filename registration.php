<?php   
    include_once "Classes/Admins/Admin.php";
    $obj = new Admin;
?>

<!DOCTYPE html>
<html lang="en" class=" ">
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Scale | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">





    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Create an account</a>
            <section class="m-b-lg">
                

                <?php  


                    if( isset($_POST['submit']) ){

                        // get form data 
                        $uname = $_POST['uname'];
                        $check_username = $obj -> checkUsername($uname);


                        // Email manage 
                        $uemail = $_POST['uemail'];
                        $check_email = $obj -> checkEmail($uemail);

                        // Password Hash
                        $upass = $_POST['upass'];
                        $hash_pass = password_hash( $upass , PASSWORD_DEFAULT);


                        //Agree manage 
                        if(isset($_POST['uagree'])){
                            $agree = true;
                        }else{
                            $agree = false;
                        }






                        if( empty($uname) || empty($uemail) || empty($upass) ){
                           $mess = "<p class='alert alert-danger'>Field must not be empty !<button class='close' data-dismiss='alert'>&times;</button></p>";
                        }elseif( $agree == false ){
                            $mess = "<p class='alert alert-danger'>You must check agree to go !<button class='close' data-dismiss='alert'>&times;</button></p>";
                        }elseif( $check_username == false ){
                            $mess = "<p class='alert alert-danger'>Username already exist !<button class='close' data-dismiss='alert'>&times;</button></p>";
                        }elseif( $check_email == false ){
                            $mess = "<p class='alert alert-danger'>Email already exist !<button class='close' data-dismiss='alert'>&times;</button></p>";
                        }else{

                            $data = $obj -> adminRegistration($uname, $uemail, $hash_pass);

                            if($data == true){
                                $mess = "<p class='alert alert-success'>Admin registration successfull !<button class='close' data-dismiss='alert'>&times;</button></p>";
                            }

                        }


                    }



                ?>
                
                <div class="mess">
                    <?php  

                      if( isset($mess) ){
                        echo $mess;
                      }

                    ?>
                </div>


                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">


                    <div class="list-group">
                        
                        <div class="list-group-item">
                            <input name="uname" placeholder="Username" type="text" class="form-control no-border"> 
                        </div>
                        <div class="list-group-item">
                            <input name="uemail" type="text" placeholder="Email" type="text" class="form-control no-border"> 
                        </div>
                        <div class="list-group-item">
                            <input name="upass" type="password" placeholder="Password" type="password" class="form-control no-border"> 
                        </div>
                    </div>


                    <div class="checkbox m-b">
                        <label>
                            <input name="uagree" value="agree" type="checkbox"> Agree the <a href="#">terms and policy</a> </label>
                    </div>


                    <button name="submit" type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>


                    <div class="line line-dashed"></div>


                    <p class="text-muted text-center"><small>Already have an account?</small></p> <a href="index.php" class="btn btn-lg btn-default btn-block">Sign in</a> 
                </form>





            </section>
        </div>
    </section>



















    <!-- Bootstrap -->
    <!-- App -->
    <script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>
</body>
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

</html>