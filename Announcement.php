<?php include('php/header.php')?>

<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Society Announcement</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->

<section>
    <div class="container">
        <div class="row">    
            <div class="col-sm-6">
                <br>
         
                <h3 class="widget_title">Create Announcement</h3>
                <hr>
                <div class="media post_item">
                    <div class="media-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="comment">Write Here:</label>
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                            </div>
                            <hr>
                            <button type="button" class="btn btn-success">Create Announcement</button> <br><br>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <br>

                <h3 class="widget_title">List of Announcement</h3>
                <hr>
                <?php
                $qry="select * from announcement where Appartment_Id='".$_SESSION['a_id']."'";
                    $result=$con->query($qry);
                     if($result->num_rows > 0){ $counter=1;
                    while($row = $result->fetch_assoc()){
                         $t=$row['time'];
                                    $timestamp = date("d-m-Y",strtotime($row['time']));


                ?>
                <div class="media post_item">
                    <div class="media-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Announcement Date : <?php echo $timestamp;?></label>
                                <textarea class="form-control" rows="5" id="comment" disabled><?php echo $row['Description'];?></textarea>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
                 <?php

                    }}
                ?>
            </div>
        </div>
    </div>

</section>
<!--================Blog Area end =================-->

<!--::footer_part start::-->
<?php include('php/footer.php')?>
