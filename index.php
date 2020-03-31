<?php include('php/header.php')?>

    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                $qry = "SELECT * FROM appartment where AppartmentId='".$_SESSION['a_id']."'";

                $result = $con->query($qry);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){

            ?>
                      <div class="breadcrumb_iner">

                        <h2><?php echo $row['Appartment_Name'] ?></h2>
                    </div>
                    <?php
                    }
                }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
if(isset($_POST['add']))
{
    $qrycheckblock="select * from block where AppartmentId='".$_SESSION['a_id']."'";
    $checkresult=$con->query($qrycheckblock);
    $flag=0;
    if($checkresult->num_rows >0){
    while($rowresult=$checkresult->fetch_assoc())
    {
     if($rowresult['BlockNumber'] == $_POST['blockno'])
     {
         $flag=1;
     }
    }
    }
    if($flag==0){
    $qryblockadd="insert into block (BlockNumber,AppartmentID) values ('".$_POST['blockno']."','".$_SESSION['a_id']."')";
    $con->query($qryblockadd);}
    else
    {
        echo '<script type="text/javascript">
            test();
        </script>';
    }
}

?>
<script type="text/javascript">
            test();
        </script>
    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">

            <div class="row justify-content-center">
                 <div class="col-lg-3 col-sm-6">
                      <a href="Announcement.php">
                    <div class="single_feature_part">
                        <img src="img/icon/megaphone.svg" alt="#">
                        <h4>Annoucement</h4>
                          </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                      <a href="userBill.php">
                    <div class="single_feature_part">
                        <img src="img/icon/bill.svg" alt="">
                        <h4>My Bills</h4>
                          </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="Emerg-ppl.php">

                    <div class="single_feature_part">
                        <img src="img/icon/call.svg" alt="#">
                        <h4>Emergency Directory</h4>
                        </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="buildingMaintenance.php">
                    <div class="single_feature_part">
                        <img src="img/icon/wallet.svg" alt="#">
                        <h4>Society Maintenance</h4>
                        </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="members.php"><div class="single_feature_part">
                        <img src="img/icon/team-building%20(1).svg" alt="#">
                        <h4>Members</h4><br>
                        </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="Gate-Pass.php">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_1.svg" alt="#">
                        <h4>Gate Pass</h4><br>
                        </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                   <a href="parkingreserve.php">
                    <div class="single_feature_part">
                        <img src="img/icon/parking.svg" alt="#">
                        <h4>Parking</h4>
                       </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                     <a href="complain.php">
                    <div class="single_feature_part">
                        <img src="img/icon/customer.svg" alt="#">
                        <h4>Complains</h4>
                    </div>
                    </a>
                </div>
                 <?php
                        $qry1="select * from users where EmailAddress='".$_SESSION['Email']."'";
                        $result1=$con->query($qry1);
                         if($result1->num_rows > 0){
                                            $row1 = $result1->fetch_assoc();
                        if($row1['isSecretary'] == 1){

                ?>
                 <div class="col-lg-3 col-sm-6">
                                          <a href="" data-toggle="modal" data-target="#modal-new-event">
                    <div class="single_feature_part">
                        <img src="img/icon/appartment.svg" alt="#">
                        <h4>Block Add</h4>
                    </div>
                    </a>
                </div>

                <?php }}?>
                <div class="col-lg-3 col-sm-6">
                      <a href="UserProfile.php">
                    <div class="single_feature_part">
                        <img src="img/icon/team-building.svg" alt="#">
                        <h4>Profile</h4>
                          </div></a>
                </div>

                <div class="col-lg-3 col-sm-6">
                     <a href="Vehical.php">
                    <div class="single_feature_part">
                        <img src="img/icon/car.svg" alt="#">
                        <h4>Vehical Information</h4>
                         </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                                          <a href="SocietyInfo.php">
                    <div class="single_feature_part">
                        <img src="img/icon/address.svg" alt="#">
                        <h4>Society Information</h4>
                    </div>
                    </a>
                </div>
            </div>
        </div>

    </section>
<div class="modal fade" id="modal-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Add Block</h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Block No</h3>
                        </span>
                        <input type="text" class="form-control" placeholder="Block No" name="blockno" required>
                    </div><br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="add" >Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script type="text/javascript">
     function test()
    {
        alert('In test Function');
    }
    </script>

    <!-- feature part end -->

    <!--::footer_part start::-->
   <?php include('php/footer.php')?>
