<div class="navbar-default sidebar" role="navigation" >
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search<?php echo base_url();?>optimum."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="<?php echo base_url();?>optimum/images/admin.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"><?php echo $this->session->userdata('name'); ?><span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                        
                            <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li> <a href="<?php echo base_url('admin/dashboard') ?>" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu">Dashboard</span></a> </li>
                   
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-envelope p-r-10"></i> <span class="hide-menu"> Expenses <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url('expenses/expenses_category') ?>">expenses category</a></li>
                            <li> <a href="<?php echo base_url('expenses/expenses_list') ?>">expenses list</a></li>
                            <li> <a href="<?php echo base_url('admin/welcome_message') ?>">expenses list</a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-envelope p-r-10"></i> <span class="hide-menu"> Revenues <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?php echo base_url('admin/revenues/revenue_category') ?>">revenue category</a></li>
                            <li> <a href="<?php echo base_url('admin/revenues/revenue_list') ?>">revenue list</a></li>
                        </ul>
                    </li>
                    <li> <a href="<?php echo base_url('projects/projects_list') ?>"
                            class="waves-effect"><i class="icon-envelope p-r-10"></i>
                            <span class="hide-menu"> Projects <span class="fa arrow"></span></span>
                        </a>
                    </li>
                    
					
					
					
				
				
                    
                    
                    
                    
                    <li><a href="<?php echo base_url('auth/logout') ?>" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                </ul>
            </div>
        </div>
