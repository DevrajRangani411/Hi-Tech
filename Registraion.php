<?php include('header.php')?>

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
                            <form class="row contact_form" action="Registraion-choise.html" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value=""
                                        placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="re-password" name="password" value=""
                                        placeholder="Re-Password">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="mobile no" name="password" value=""
                                        placeholder="Mobile no">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="password" value=""
                                        placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group">

                                    <button type="submit" value="submit" class="btn_3">
                                        log in
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
<?php include('footer.php')?>