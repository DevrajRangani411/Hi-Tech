<?php include('php/header.php');
if($_SESSION['status']==1)
{
     header('Location: login.php');
     session_destroy();
}
?>

<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Create New Building</h2>
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
                            if(isset($_POST['Building_Reg']))
                                    {
                                require("php/connect_db.php");
                                $str='';
                    $qry = "INSERT INTO appartment(Appartment_Name,FLOOR,Total_Blocks,City,Address,Secretary_Name,Secretary_Email) VALUES ('".$_POST['Build_Name']."','".$_POST['Num_floor']."','".$_POST['Total_Block']."','".$_POST['City']."','".$_POST['Address']."','".$_SESSION['name']."','".$_SESSION['Email']."')";

                        if($con->query($qry)){

                              $qry3 = "SELECT * FROM appartment WHERE Secretary_Email='".$_SESSION['Email']."'";
                                                    $result3 = $con->query($qry3);
                                               $row3 = $result3->fetch_assoc();
                            if($result3->num_rows >0){
                               $qryblk="insert into block(BlockNumber,AppartmentId) Values ('".$_POST['block']."','".$row3['AppartmentId']."')";
                                $con->query($qryblk);

                                  $qrysecphone="select * from users where EmailAddress='".$_SESSION['Email']."'";
                                $resultp = $con->query($qrysecphone);
                              $rowp = $resultp->fetch_assoc();
                                 $qrysec="insert into secretary(Secretary_Name,Phone,AppartmentId) Values ('".$_SESSION['name']."','".$rowp['MobileNumber']."','".$row3['AppartmentId']."')";
                                $con->query($qrysec);

                                $qry1 = "UPDATE users set status=1,AppartmentId='".$row3['AppartmentId']."',BlockNumber='".$_POST['block']."',Secretary_Name='".$row3['Secretary_Name']."',isSecretary=1 where EmailAddress='".$_SESSION['Email']."'";
                                    if($con->query($qry1))
                                    {
                                                  $_SESSION['a_id']=$row3['AppartmentId'];
                                         $str = '<div class="callout callout-success"><h3>You Successfully Register Building.</h3></div>';
                                         header('Location: index.php');
                                    }
                                else{echo "Internal error";}
                            }
                            else{
                                echo "error Please Try Again";
                            }



                        }else{
                            $str = '<div class="callout callout-danger"><h3><p>Problem occurred. Please try again.</p></h3></div>';
                                            }
                            include("php/close_db.php");
                            echo $str;
                          }?>


                        <form name="register" class="row contact_form" action="" method="post" onsubmit="return validate()">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="Build_Name" value="" placeholder="Building Name" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control"  name="Num_floor" value="" placeholder="Number of Floors" required>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control"  name="Total_Block" value="" placeholder="Total Number of Blocks" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="City" value="" placeholder="City" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="Address" value="" placeholder="Address" required>
                            </div>
                             <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="block" value="" placeholder="Enter Your Block Number" required>
                            </div>
                            <div class="col-md-12 form-group">

                                <button type="submit" value="submit" name="Building_Reg" class="btn_3" >
                                    Register
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
<?php include('php/footer.php')?>
<script>
function validate()
{
var Build_Name = document.register.Build_Name.value;
var Num_floor = document.register.Num_floor.value;
var Total_Block = document.register.Total_Block.value;
var City = document.register.City.value;
var Address= document.register.Address.value;
    var block= document.register.block.value;
if (fullname==null || fullname=="")
{
alert("Full Name can't be blank");
return false;
}
else if (email==null || email=="")
{
alert("Email can't be blank");
return false;
}
else if (username==null || username=="")
{
alert("Username can't be blank");
return false;
}
else if(password.length&amp;lt;6)
{
alert("Password must be at least 6 characters long.");
return false;
}
else if (password!=conpassword)
{
alert("Confirm Password should match with the Password");
return false;
}
}
</script>
