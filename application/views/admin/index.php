<?php include 'layout/css.php'; ?>
<!-- <h1>dffdfd</h1> -->
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="icon-grid"></i></a>
            <div class="top-left-part"><a class="logo" href="<?php echo base_url('admin/dashboard/') ?>"><b><span class="hidden-xs"><img src="<?php echo base_url();?>optimum/67275800_513268602774596_8227127322843545600_n.png" alt="Codeig" style="height:60px;width:220px" /></span></b></a></div>
            <ul class="nav navbar-top-links navbar-left hidden-xs">
                <li><a href="javascript:void(0)" class="open-close hidden-xs"><i class="icon-grid"></i></a></li>

            </ul>

            <ul class="nav navbar-top-links navbar-right pull-right">


                <div class=""><span class=""></span><span class="point"></span></div>
                </a>

                <ul class="dropdown-menu  animated bounceInDown">


                    <!-- calculator-->
                    <style>
                        .calculator_button{
                            border : 1px solid #303641;
                            width: 50px;
                            background-color: #5A606C;
                            color: #F5FAFC;
                            cursor:auto;
                        }
                        .calculator_button:hover{
                            border : 1px solid #303641;
                            background-color: #5A606C;
                            color: #F5FAFC;
                        }
                        .calculator_button:focus{
                            border : 1px solid #303641;
                            background-color: #5A606C;
                            color: #F5FAFC;
                        }
                    </style>



                </ul>



                <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->




                <ul class="nav navbar-top-links navbar-right pull-right">

                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-language"></i>

                            <div class=""><span class=""></span><span class="point"></span></div>
                        </a>

                        <ul class="dropdown-menu  animated bounceInDown">


                            <li class="active">
                                <a href="<?php echo base_url().'Langswitcher/change_lang/en'?>"
                                   name="lang" value="en"
                                   data-lang='en' >
                                    <input type="image" src="<?php echo base_url(); ?>optimum/flag/english.png" style="width:16px; height:16px;"  name="lang" value="en"/>
                                    <span>English</span>
                                </a>
                            </li>
                            <li class="">
                                <a  href="<?php echo base_url().'Langswitcher/change_lang/ar'?>" name="lang1" value="ar" data-lang='ar'>
                                    <img src="<?php echo base_url(); ?>optimum/flag/arabic.png" style="width:16px; height:16px;" />
                                    <span>عربي</span>
                                </a>
                            </li>

                            <li class="">
                                <a href="">
                                    <img src="<?php echo base_url(); ?>optimum/flag/german.png" style="width:16px; height:16px;" />
                                    <span>German</span>
                                </a>
                            </li>

                            <li class="">
                                <a href="">
                                    <img src="<?php echo base_url(); ?>optimum/flag/dutch.png" style="width:16px; height:16px;" />
                                    <span>Dutch</span>
                                </a>
                            </li>



                        </ul>



                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->





                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-screen-desktop"></i>
                                <div class="notify"><span class=""></span><span class=""></span></div>
                            </a>
                            <ul class="dropdown-menu mailbox animated bounceInRight">
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <a href="#">
                                            <div class="user-img"> <img src="<?php echo base_url();?>optimum/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <a href="#">
                                            <div class="user-img"> <img src="<?php echo base_url();?>optimum/plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <a href="#">
                                            <div class="user-img"> <img src="<?php echo base_url();?>optimum/plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <a href="#">
                                            <div class="user-img"> <img src="<?php echo base_url();?>optimum/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-messages -->
                        </li>
                        <!-- /.dropdown -->



                        <!-- /.dropdown-tasks -->

                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?php echo base_url();?>optimum/images/admin.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $this->session->userdata('name'); ?></b> </a>
                            <ul class="dropdown-menu dropdown-user animated flipInY">
                                <!-- <li><a href="javascript:void(0)"><i class="ti-user"></i>  My Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i>  Inbox</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i>  Account Setting</a></li> -->
                                <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-power-off"></i>  Logout</a></li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!--<li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>-->
                        <!-- /.dropdown -->
                    </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- Left navbar-header -->
    <!-- <div id="wrapper" class="toggled"> -->

    <!-- Left navbar-header end -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar side-width" id="sidebar-wrapper" style="overflow: hidden;width: auto;height: 100%;width: 220px;">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                    <!-- input-group -->

                    <!-- /input-group -->
                </li>
                <li class="user-pro">
                    <a href="#" class="waves-effect"><img src="<?php echo base_url();?>optimum/images/admin.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"><?php echo $this->session->userdata('name'); ?><span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">

                        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-power-off float_rtl"></i> Logout</a></li>
                    </ul>
                </li>
                <li> <a href="<?php echo base_url('admin/dashboard') ?>" class="waves-effect"><i class="ti-dashboard p-r-10 float_rtl"></i> <span class="hide-menu">Dashboard</span></a> </li>

                <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-envelope p-r-10 float_rtl"></i> <span class="hide-menu"> Expenses <span class="fa arrow arrow_right" ></span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="<?php echo base_url('expenses/expenses_category') ?>">expenses category</a></li>
                        <li> <a href="<?php echo base_url('expenses/expenses_list') ?>">expenses list</a></li>
                        <li> <a href="<?php echo base_url('upload') ?>">upload file</a></li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-envelope p-r-10 float_rtl"></i> <span class="hide-menu"> Revenues <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="<?php echo base_url('admin/revenues/revenue_category') ?>">revenue category</a></li>
                        <li> <a href="<?php echo base_url('admin/revenues/revenue_list') ?>">revenue list</a></li>
                    </ul>
                </li>










                <li><a href="<?php echo base_url('auth/logout') ?>" class="waves-effect"><i class="icon-logout fa-fw float_rtl"></i> <span class="hide-menu">Log out</span></a></li>
            </ul>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-wrapper" >
        <div class="container-fluid">

            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Honey Bee</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url();?>admin/dashboard/">Home</a></li>
                        <li class="active"> <?php echo $page_title; ?></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>




            <!--  row    ->
               <?php echo $main_content; ?>
                <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
        <?php include 'layout/footer.php'; ?>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<?php include 'layout/js.php'; ?>
