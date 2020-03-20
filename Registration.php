<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>pillloMart</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">



</head>



    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Registration</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Please fille the form<br></h3>
                            <?php
                                        if(isset($_POST['create_user']))
                                    {
                                          require("php/connect_db.php");
                                        $str='';
                                        $file_name = date("m-d-H-i").$_FILES['P_Image']['name'];
                                        $file_type = $_FILES['P_Image']['type'];
                                        $file_size = $_FILES['P_Image']['size'];
                                        if(strstr($file_name,".exe")){
                                            $str = '<div class="callout callout-danger"><p>.EXE files are not allowed</p></div>';
                                        }
                                        if($file_size > 350000)
                                        {
                                            $str = '<div class="callout callout-danger"><p>File is too large...</p></div>';
                                        }

                                            $target = "img/users/".$file_name;

                                          if(move_uploaded_file($_FILES['P_Image']['tmp_name'],$target))
                                        {

                                            $qry = "INSERT INTO users_reg(UserName,password,MobileNumber,EmailAddress,BloodGroup,UserImage) VALUES ('".$_POST['name']."','".$_POST['upass']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['bgroup']."','".$_FILES['P_Image']['name']."')";
                                            if($con->query($qry)){
                                                $str = '<div class="callout callout-success"><h3>You Successfully Register</h3></div>';
                                                session_start();
                                            $_SESSION['name']=$_POST['name'];
                                            }else{
                                                $str = '<div class="callout callout-danger"><p>Problem occurred while uploading image. Please try again.</p></div>';
                                            }
                                          }
                                          else{
                                            $str = '<div class="callout callout-danger"><p>Problem occurred while uploading image.</p></div>';
                                        }

                                     require("php/close_db.php");
                                            echo $str;
                                    }?>
                            <form class="row contact_form" action="" method="post" enctype="multipart/form-data">
                                  <div class="col-md-12 form-group p_star">
                                    <input type="file" class="form-control" name="P_Image" placeholder="Image">
                                </div><br/>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                </div><br/>
                                 <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name="upass" placeholder="Password" required>
                                </div><br/>
                                <div class="col-md-12 form-group p_star">

                                    <input type="tel" class="form-control" name="mobile" placeholder="Phone Number" pattern="[0-9]{10}"  required>
                                </div><br/>
                                 <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" name="bgroup" placeholder="Blood Group" required>
                                </div><br/>
                                 <div class="col-md-12 form-group p_star">
                                    <input type="Email" class="form-control" name="email" placeholder="Email Address">
                                </div><br/>


                                <div class="col-md-12 form-group">

                                    <button type="submit" value="submit" name="create_user"class="btn_3">
                                       Register
                                    </button>


                                </div>
                            </form>
                            <H4>After Registration Please Login</H4>
                               <div class="col-md-12 form-group">
                                   <form action="Registration-choise.php">
                                       <button type="submit" value="submit" name="create_user"class="btn_3">
                                       Login
                                    </button>
                                   </form>
                                </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================login_part end =================-->
<footer class="footer_part">


    <div class="copyright_part">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());

                            </script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </P>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
