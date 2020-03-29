<!--::header part start::-->
<?php include 'php/header.php'?>

<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Society Vehical</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- feature part here -->
<br><br>
<div class="container">
      <?php
                $qry = "SELECT * FROM vehicle  INNER JOIN users  on vehicle.BlockNumber=users.BlockNumber where vehicle.AppartmentId='".$_SESSION['a_id']."'";

                $result = $con->query($qry);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){

            ?>
       <div class="row">
        <div class="col-sm-3">
            <div class="card card border-secondary">
                <div class="card-body">
                    <h5 class="card-title">Flat No - <?php echo $row['BlockNumber'] ?></h5>
                    <strong>
                        <p><?php echo $row['FirstName'];echo "  ";echo $row['LastName']  ?></p>
                    </strong>
                    <strong>
                        <p><?php echo $row['VehicleNumber'] ?></p>

                    </strong>


                    <b>Contact Detail: <?php echo $row['MobileNumber'] ?></b>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <?php
                    }
                }
    ?>
</div>

<!-- feature part end -->



<?php include('php/footer.php')?>
