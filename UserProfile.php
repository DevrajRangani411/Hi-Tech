<?php include('php/header.php')?>

<!-- breadcrumb part start-->
 <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>User Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- breadcrumb part end-->

<!--================Single Product Area =================-->

    <div class="container">
        <div class="row justify-content-center">
           <?php
                $qry = "SELECT * FROM users where EmailAddress='".$_SESSION['Email']."'";
                $qry1 = "SELECT * FROM  appartment where AppartmentId='".$_SESSION['a_id']."'";
                   $result1=$con->query($qry1);
                    $row1 = $result1->fetch_assoc();
                $result = $con->query($qry);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                }
            ?>
            <div class="col-lg-8">
                <div class="single_product_text text-center">
                   <br><br>


                  <div class="card card border-secondary">


                <div class="card-body">

                    <h5 class="card-title">Flat No - <?php echo $row['BlockNumber'] ?></h5>
                    <strong>
                        <p><?php echo $row['FirstName'];echo "  ";echo $row['LastName']  ?></p>
                    </strong>
                    <strong>
                        <p>Appartment Name : <?php echo $row1['Appartment_Name']?></p>
                    </strong>
                    <strong>
                        <p>Secretary Name : <?php echo $row1['Secretary_Name']?></p>
                    </strong>
                    <strong>
                        <p>Email Address  : <?php echo $row['EmailAddress']?></p>
                    </strong>

 <strong>
                        <p>
                            <b>Contact Detail: <?php echo $row['MobileNumber'] ?></b></p></strong>
                      <div class="box-tools"><br>
			<button class="btn_3" data-toggle="modal" data-target="#modal-new-event">Edit</button>

		</div>

                </div>
            </div>
<br><br>



                </div>
            </div>

        </div>
    </div>
<div class="modal fade" id="modal-new-event">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Fill Product details</h4>
	  </div>
	  <form action="" method="post" enctype="multipart/form-data">
	  <div class="modal-body">
            <div class="input-group">
                <span class="input-group-addon">Image</span>
                <input type="file" class="form-control" placeholder="Event Image" name="new_image">
            </div><br/>
            <div class="input-group">
                <span class="input-group-addon">Heading</span>
                <input type="text" class="form-control" placeholder="Event Title" name="new_heading">
            </div><br/>

            <div class="input-group">
                <span class="input-group-addon">Descrption</span>
                        <textarea id="fullDesc" placeholder="Full Description" name="new_desc"></textarea>
            </div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
		<button type="submit" class="btn btn-primary" name="createproduct">Add New Product</button>
	  </div>
	  </form>
	</div>
  </div>
</div>



<!--================End Single Product Area =================-->
<!-- subscribe part here -->

<!-- subscribe part end -->
<?php include('php/footer.php')?>
