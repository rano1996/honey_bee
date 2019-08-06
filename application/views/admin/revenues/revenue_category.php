  <!-- row -->
 
  <div class="row">
                    <!-- Left sidebar -->
                    <?php
                    foreach($result['data'] as $category){
                       
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box <?php echo $category['color']; ?>">
                            <div class="r-icon-stats">
                                <i class="ti-user <?php echo $category['color']; ?>"></i>
                                <div class="bodystate">
                  
                                    
                                    <span class="text-muted"><a href="" style="color:white">
                                    <?php echo $category['category_name']; ?></a></span>
                                </div>
                                
                            </div>
                           <center> <a href="<?php echo base_url('admin/revenues/revenue_sub_category') ?>" class="btn btn-default">view detailes</a></center>
                        </div>
                    </div>
                    <?php } 
           
                    ?>
                    
                    </div>
                    