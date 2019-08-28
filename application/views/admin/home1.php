
 <!--row -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
 <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">Slide show with owl Carousel</div> -->
                            <div class="panel-wrapper p-b-10 collapse in">
                                <div id="owl-demo" class="owl-carousel owl-theme">
                                    <div class="item"><img src="<?php echo base_url(); ?>optimum/plugins/images/heading-bg/slide2.jpg" alt="Owl Image"></div>
                                    <div class="item"><img src="<?php echo base_url(); ?>optimum/plugins/images/heading-bg/slide3.jpg" alt="Owl Image"></div>
                                    <div class="item"><img src="<?php echo base_url(); ?>optimum/plugins/images/heading-bg/slide4.jpg" alt="Owl Image"></div>
                                    <div class="item"><img src="<?php echo base_url(); ?>optimum/plugins/images/heading-bg/slide6.jpg" alt="Owl Image"></div>
                                    <div class="item"><img src="<?php echo base_url(); ?>optimum/plugins/images/heading-bg/slide1.jpg" alt="Owl Image"></div>
                                    <div class="item"><img src="<?php echo base_url(); ?>optimum/plugins/images/heading-bg/slide3.jpg" alt="Owl Image"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 <!-- <h1>gfgffg</h1>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-danger">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-danger"></i>
                                <div class="bodystate">
                  
                                    <h4 style="color:white">5</h4>
                                    <span class="text-muted"><a href="" style="color:white">
Total Admin</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-info">
                            <div class="r-icon-stats">
                                <i class="ti-shopping-cart bg-info"></i>
                                <div class="bodystate">
                                    <h4 style="color:white">2</h4>
                                    <span class="text-muted"><a href="" style="color:white">
Active Users</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-success">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                    <h4 style="color:white">1</h4>
                                    <span class="text-muted"><a href="" style="color:white">
Inactive User</a></span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-purple">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-purple"></i>
                                <div class="bodystate">
                                    <h4 style="color:white">6</h4>
                                    <span class="text-muted"><a href="" style="color:white">
Total Users</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					
					
					
					       <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-info">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info"></i>
                                <div class="bodystate">
                                    <h4 style="color:white">3</h4>
                                    <span class="text-muted"><a href="" style="color:white">
Total Admin</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-danger">
                            <div class="r-icon-stats">
                                <i class="ti-shopping-cart bg-danger"></i>
                                <div class="bodystate">
                                    <h4 style="color:white">2</h4>
                                    <span class="text-muted"><a href="" style="color:white">
Active Users</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-purple">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-purple"></i>
                                <div class="bodystate">
                                    <h4 style="color:white">2</h4>
                                    <span class="text-muted"><a href="" style="color:white">
Inactive User</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-success">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                    <h4 style="color:white">1</h4>
                                    <span class="text-muted"><a href="" style="color:white">
Total Users</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
                </div> -->
                <!--/row -->
                <!-- /.row -->
                <div class="row">
                <h3>schedule work</h3>
        <div class="col-lg-12">
            <div class="white-box">
                <div class="card-body">
                    <div id="calendar"></div>
                    <!-- BEGIN MODAL -->
                    <div class="modal fade none-border" id="my-event">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Add Event</strong></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Add Category -->
                    <div class="modal fade none-border" id="add-new-event">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">Category Name</label>
                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Choose Category Color</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Success</option>
                                                    <option value="danger">Danger</option>
                                                    <option value="info">Info</option>
                                                    <option value="primary">Primary</option>
                                                    <option value="warning">Warning</option>
                                                    <option value="inverse">Inverse</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                    <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END MODAL -->
                </div>
            </div>
        </div>
        </div>
                <div class="row">
                <div class="col-lg-12">
                <script src="https://www.powr.io/powr.js?platform=html"></script><div class="powr-weather" id="0e1d3ec5_1563981670"></div>
                </div>
                </div>
                 <!-- <h3>Learn new words</h3>
                <div class="row">
                <div>
                
                </div> -->
                <!-- <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                        <h3 class="box-title">test</h3> -->
                              
                           <!-- <center> <a href="<?php echo base_url('admin/expenses/expenses_sub_category') ?>" class="btn btn-default">add expenses</a></center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                        <h3 class="box-title">grocery</h3>
                              
                        </div>
                    </div>
                    
					
                  
                </div>  -->
                <h3>Money management</h3>
                <div class="row">
                                <div class="col-md-4">
                                <div class="card">
                                    <center><h4 class="card-title">car</h4></center>
                                        <div class="card-block">
                                        <canvas id="myChart1" width=200 height=200></canvas>
                                            <center><h4 class="card-title">Total:290000 S.P</h4></center>
                                            <center><h4 class="card-title">Remain:145000 S.P</h4></center>
                                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                    <center><h4 class="card-title">House</h4></center>
                                        <div class="card-block">
                                        <canvas id="myChart2" width=200 height=200></canvas>
                                        <center><h4 class="card-title">Total:290000 S.P</h4></center>
                                            <center><h4 class="card-title">Remain:145000 S.P</h4></center>
                                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <div class="card">
                                    <center><h4 class="card-title">Food</h4></center>
                                        <div class="card-block">
                                        <canvas id="myChart3" width=200 height=200></canvas>
                                        <center><h4 class="card-title">Total:290000 S.P</h4></center>
                                            <center><h4 class="card-title">Remain:145000 S.P</h4></center>
                                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">





 <h3 class="box-title">Healthy</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top image-responsive" src="<?php echo base_url(); ?>optimum/plugins/images/cards/9.png" alt="Card image cap">
                                        <div class="card-block">
                                        <center><h4 class="card-title">Total:5 Times</h4></center>
                                            <center><h4 class="card-title">Remain:2 Times</h4></center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top image-responsive" src="<?php echo base_url(); ?>optimum/plugins/images/cards/10.png" alt="Card image cap">
                                        <div class="card-block">
                                        <center><h4 class="card-title">Total:5 Times</h4></center>
                                            <center><h4 class="card-title">Remain:2 Times</h4></center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top image-responsive" src="<?php echo base_url(); ?>optimum/plugins/images/cards/11.png" alt="Card image cap">
                                        <div class="card-block">
                                        <center><h4 class="card-title">Total:5 Times</h4></center>
                                            <center><h4 class="card-title">Remain:2 Times</h4></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <!-- </div>
                    </div>
                </div> -->
                      
                <!-- <div class="row">
                
                <div class="col-md-4">
                <canvas id="myChart1" width=200 height=200></canvas>
                    <center><h3>food</h3></center>
                </div>
                <div class="col-md-4">
                <canvas id="myChart3" width=200 height=200></canvas>
                <h3>shopping</h3>
                </div>
                <div class="col-md-4">
                <canvas id="myChart2" width=200 height=200></canvas>
                </div>
                </div> -->
                <!--row -->
               <!-- .row -->
                <!-- <div class="row">
                    <div class="col-md-12 col-lg-4  col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Visits from countries</h3>
                            <ul class="country-state">
                                <li>
                                    <h2>6350</h2> <small>From India</small>
                                    <div class="pull-right">48% <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%;"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2>3250</h2> <small>From UAE</small>
                                    <div class="pull-right">98% <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:98%;"> <span class="sr-only">98% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2>1250</h2> <small>From Australia</small>
                                    <div class="pull-right">75% <i class="fa fa-level-down text-danger"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:75%;"> <span class="sr-only">75% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2>1350</h2> <small>From USA</small>
                                    <div class="pull-right">48% <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%;"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                            </ul>
							<br><br>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="white-box">
                            <h3 class="box-title">You have 5 new messages</h3>
                            <div class="message-center">
                                <a href="#">
                                    <div class="user-img"> <img src="<?php echo base_url(); ?>optimum/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="<?php echo base_url(); ?>optimum/plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="<?php echo base_url(); ?>optimum/plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="<?php echo base_url(); ?>optimum/plugins/images/users/genu.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Genelia Deshmukh</h5> <span class="mail-desc">I love to do acting and dancing</span> <span class="time">9:08 AM</span> </div>
                                </a>
                                <a href="#" class="b-none">
                                    <div class="user-img"> <img src="<?php echo base_url(); ?>optimum/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Chat</h3>
                            <div class="chat-box">
                                <ul class="chat-list slimscroll" style="overflow: hidden;" tabindex="5005">
                                    <li>
                                        <div class="chat-image"> <img alt="male" src="<?php echo base_url(); ?>optimum/plugins/images/users/sonu.jpg"> </div>
                                        <div class="chat-body">
                                            <div class="chat-text">
                                                <h4>Sonu Nigam</h4>
                                                <p> Hi, All! </p> <b>10.00 am</b> </div>
                                        </div>
                                    </li>
                                    <li class="odd">
                                        <div class="chat-image"> <img alt="Female" src="<?php echo base_url(); ?>optimum/plugins/images/users/genu.jpg"> </div>
                                        <div class="chat-body">
                                            <div class="chat-text">
                                                <h4>Genelia</h4>
                                                <p> Hi, How are you Sonu? ur next concert? </p> <b>10.03 am</b> </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chat-image"> <img alt="male" src="<?php echo base_url(); ?>optimum/plugins/images/users/ritesh.jpg"> </div>
                                        <div class="chat-body">
                                            <div class="chat-text">
                                                <h4>Ritesh</h4>
                                                <p> Hi, Sonu and Genelia, </p> <b>10.05 am</b> </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Say something"> <span class="input-group-btn">
                    <button class="btn btn-success" type="button">Send</button>
                    </span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
               <!--row -->
                <!-- <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent Comments</h3>
                            <div class="comment-center">
                                <div class="comment-body ">
                                    <div class="user-img"> <img src="<?php echo base_url(); ?>optimum/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span> <span class="label label-rouded label-info">PENDING</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2017</span></div>
                                </div>
                                <div class="comment-body">
                                    <div class="user-img"> <img src="<?php echo base_url(); ?>optimum/plugins/images/users/sonu.jpg" alt="user" class="img-circle"> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span><span class="label label-rouded label-success">APPROVED</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2017</span></div>
                                </div>
                                <div class="comment-body">
                                    <div class="user-img"> <img src="<?php echo base_url(); ?>optimum/plugins/images/users/arijit.jpg" alt="user" class="img-circle"> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. </span><span class="label label-rouded label-danger">REJECTED</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2017</span></div>
                                </div>
                                <div class="comment-body b-none">
                                    <div class="user-img"> <img src="<?php echo base_url(); ?>optimum/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span> <span class="label label-rouded label-info">PENDING</span> <a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2017</span></div>
                                </div>
								<br>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent sales
                              <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                <select class="form-control pull-right row b-none">
                                  <option>March 2017</option>
                                  <option>April 2017</option>
                                  <option>May 2017</option>
                                  <option>June 2017</option>
                                  <option>July 2017</option>
                                </select>
                              </div>
                            </h3>
                            <div class="row sales-report">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h2>March 2017</h2>
                                    <p>SALES REPORT</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <h1 class="text-right text-success m-t-20">$3,690</h1> </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NAME</th>
                                            <th>STATUS</th>
                                            <th>DATE</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="txt-oflo">Elite admin</td>
                                            <td><span class="label label-success label-rouded">SALE</span> </td>
                                            <td class="txt-oflo">April 18, 2017</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="txt-oflo">Real Homes WP Theme</td>
                                            <td><span class="label label-info label-rouded">EXTENDED</span></td>
                                            <td class="txt-oflo">April 19, 2017</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td class="txt-oflo">Medical Pro WP Theme</td>
                                            <td><span class="label label-danger label-rouded">TAX</span></td>
                                            <td class="txt-oflo">April 20, 2017</td>
                                            <td><span class="text-danger">-$24</span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td class="txt-oflo">Hosting press html</td>
                                            <td><span class="label label-warning label-rouded">SALE</span></td>
                                            <td class="txt-oflo">April 21, 2017</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td class="txt-oflo">Helping Hands WP Theme</td>
                                            <td><span class="label label-success label-rouded">member</span></td>

                                            <td class="txt-oflo">April 22, 2017</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td class="txt-oflo">Digital Agency PSD</td>
                                            <td><span class="label label-success label-rouded">SALE</span> </td>
                                            <td class="txt-oflo">April 23, 2017</td>
                                            <td><span class="text-danger">-$14</span></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td class="txt-oflo">Helping Hands WP Theme</td>
                                            <td><span class="label label-warning label-rouded">member</span></td>
                                            <td class="txt-oflo">April 22, 2017</td>
                                            <td><span class="text-success">$64</span></td>
                                        </tr>
                                    </tbody>
                                </table> <a href="#">Check all the sales</a> </div>
                        </div>
                    </div>
                </div> --> 
                <!-- /.row -->
				
				 <!-- Row -->
   
        <!-- <script src="<?php echo base_url('optimum/js/Chart.min.js')?>"></script> -->
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>  -->
  <!-- Page level custom scripts -->

  <script src="<?php echo base_url('optimum/js/chart-pie-demo.js')?>"></script>
    </div>

    