<?php include('php/header.php')?>
<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Gate Pass</h2>
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
    if(isset($_POST['Visitor'])){
        $gatepass_num=rand(999,10000);
        $qry1 = "SELECT * FROM  appartment where AppartmentId='".$_SESSION['a_id']."'";
                   $result1=$con->query($qry1);
                    $row1 = $result1->fetch_assoc();


  $qry=" insert into visitors (gatepass_id,Name,MobileNumber,Address,AppartmentId,Appartment_Name,BlockNumber) values
 ('".$gatepass_num."','".$_POST['name']."','".$_POST['mobile']."','".$_POST['city']."','".$_SESSION['a_id']."','".$row1['Appartment_Name']."','".$_POST['bno']."')";
                                 if($con->query($qry)){
                                     echo "<h3>Your Gate Pass is Succesfully Generated.Gate Pass Number is : ";echo $gatepass_num;echo"</h3>";
                                 }


        else{echo "<h3>GatePass Not Generated.Invalid Block No.....</h3>";}
    }
if(isset($_POST['leave'])){
    $qry3="select * from visitors where gatepass_id='".$_POST['up_gate']."' and AppartmentId='".$_SESSION['a_id']."'";
    $result=$con->query($qry3);
    if($result->num_rows == 1){


     $t=time();
                                    $timestamp = date("Y-m-d h:i:s",strtotime(date("Y-m-d h:i:s",$t)));

    $qry3="update visitors set LeaveTime='".$timestamp."' where gatepass_id='".$_POST['up_gate']."'";
    $con->query($qry3);}else{echo '<h3 color="red">Invalid Gate Pass Number</h3>';}
}
?>
                        <form class="row contact_form" action="" method="post">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="name" value="" placeholder="Name" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="name_owner" value="" placeholder="Name of Flate owner" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="password" name="bno" value="" placeholder="Block no" required>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="mobile no" name="mobile" pattern="[0-9]{10}" value="" placeholder="Mobile No" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email" value="" placeholder="Email(Optional)">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="password" name="city" value="" placeholder="City" required>
                            </div>

                            <div class="col-md-12 form-group">

                                <button type="submit" value="submit" class="btn_3" name="Visitor">
                                    Create Gate Pass
                                </button>


                            </div>

                        </form>
                        <div class="col-md-12 form-group">

                            <button type="submit" value="submit" class="btn_3" name="Visitor" data-toggle="modal" data-target="#modal-new-event">
                                Leave Entry
                            </button>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<div class="modal fade" id="modal-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Leave Entry Register</h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Gate Pass Number</h3>
                        </span>
                        <input type="text" class="form-control" placeholder="Gate Pass Number" name="up_gate" required>
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="leave">Done</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--================login_part end =================-->

<?php include('php/footer.php')?>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

</script>
