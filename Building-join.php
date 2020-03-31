<?php include('php/header.php')?>

<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Join Building</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->
<?php
                                        if(isset($_POST['join']))
                                    {

                                          require("php/connect_db.php");
                                            $qry = "SELECT * FROM users WHERE EmailAddress='".$_SESSION['Email']."'";
                                                    $result = $con->query($qry);
                                               $row = $result->fetch_assoc();
                                            $qry2="SELECT * FROM appartment WHERE AppartmentId='".$_POST["name"]."'";
                                            $result1 = $con->query($qry2);
                                               $row1 = $result1->fetch_assoc();

                                            if($result1->num_rows > 0)
                                            {

                                                $qry3 = "SELECT * FROM block WHERE AppartmentId='".$row1['AppartmentId']."'";
                                                    $result3 = $con->query($qry3);
                                               $row3 = $result3->fetch_assoc();
                                                if($result3->num_rows>0)
                                                {
                                                    $qry4="select * from block where BlockNumber = '".$_POST['block_num']."' and AppartmentId='".$row1['AppartmentId']."'";
                                                    $result4=$con->query($qry4);
                                                    if($result4->num_rows==1)
                                                    {
                                                            $qry1 = "UPDATE users set status=1,AppartmentId='".$row1['AppartmentId']."',BlockNumber='".$_POST['block_num']."',Secretary_Name='".$row1['Secretary_Name']."' where EmailAddress='".$_SESSION['Email']."'";

                                                        if($con->query($qry1))
                                                        {
                                                            echo '<h3>Appartment Code is Right</h3>';
                                                             session_start();
                                                            $_SESSION['a_id']=$row1['AppartmentId'];
                                                            $_SESSIONs['bno']=$row1['BlockNumber'];
                                                             header("Location: index.php");
                                                        }else{
                                                           echo "Server Error Please try Again later ..";

                                                            }
                                                    }
                                                    else
                                                    {
                                                        echo "<h3>Please Contact Your Secretary To Add Your Block or Make Sure You enter right block Number</h3>";
                                                    }
                                                }

                                               }
                                        else{
                                           echo '<h3>Appartment Code is Wrong please check again</h3>';
                                       }
                                                require("php/close_db.php");

                                        }

?>
<!--================login_part Area =================-->
<section class="login_part section_padding ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Enter Your Building Code<br></h3>
                        <form class="row contact_form" action="" method="post">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="name" value="" placeholder="Building Code" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="block_num" value="" placeholder="Block Number" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" name="join" class="btn_3">
                                    Join Your Building
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--================login_part end =================-->

<!--::footer_part start::-->
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
    <?php include('php/footer.php')?>
