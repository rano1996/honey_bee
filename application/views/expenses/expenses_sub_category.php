  <!-- row -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script> -->
 <?php
 
 if($result['code']==1){
 ?>
  <div class="row">
                    <!-- Left sidebar -->
                   <?php foreach($result['data'] as $datum){ ?>
                    <div class="col-md-6 col-sm-12">
                        <div class="white-box">
                        <!-- <h3 class="box-title"><?php echo $datum['sub_category_name']?></h3> -->
                              <ul class="list-inline two-part">
                              <li ><i class="icon-people text-info"></i></li>
                              <li class="text-right"><span class="counter"><?php echo $datum['sub_category_name']?></span></li>
                              </ul> 
                           <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">add expenses</button></center></center>
                        </div>
                    </div>
                   <?php } ?>
                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel1">New expenses</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <form id="ajax_form" method="post" action="<?php echo base_url('Expenses/add_expenses'); ?>">
                                            <div class="form-group row">
                                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                   
                                        <input class="form-control" type="date" value="<?php echo date('Y-d-m')?>" id="date" name="date">
                                    
                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Amount:</label>
                                                    <input type="text" class="form-control" id="recipient-name1" require name="amount">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">note:</label>
                                                    <textarea class="form-control" id="message-text1" name="note"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">category:</label>
                                                    <select class="form-control" id="category" name="category">
                                                    <option value="default">please choose</option>
                                                    <?php if($category['code']==1) {?>
                                                    <?php foreach($category['data'] as $category1){?>
                                                    <option value="<?php echo $category1['category_id']?>"><?php echo $category1['category_name']?></option>
                                                    <?php } }?>
                                                    </select>
                                                </div>
                                                <div id="sub">
                                                
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label" >repeatedly:</label>
                                                    <select class="form-control" id="Weekends" name="repeatedly">
                                                    <option value="food and drink">every day</option>
                                                    <option value="shopping">every two days</option>
                                                    <option>Weekends</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label" >reminder:</label>
                                                    <select class="form-control" id="reminder" name="reminder">
                                                    <option value="food and drink">same day</option>
                                                    <option value="shopping">A day before</option>
                                                    </select>
                                                </div>
      <div id="category"></div>
 
      <div class="alert alert-success d-none" id="msg_div">
          <span id="res_message"></span>
      </div>
      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
      <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" id="send_form" class="btn btn-success">Submit</button>
                                        </div>
     
    </form>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                           
                          


                    <script src="<?php echo base_url('doc/assets/js/add_expenses.js') ?>"></script> 
                    </div>
                   <?php } ?>
                   <!-- <div class="container">
    <h2 style="margin-top: 10px;">Codeigniter Ajax Form Submission Example - <a href="https://www.tutsmake.com" target="_blank">TutsMake</a></h2>
    <br>
    <br>
    
    <form id="ajax_form" method="post" action="javascript:void(0)">
      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
      </div>
 
      <div class="form-group">
        <label for="email">Email Id</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
      </div>   
 
      <div class="form-group">
        <label for="mobile_number">Mobile Number</label>
        <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Please enter mobile number" maxlength="10">
      </div>
 
      <div class="alert alert-success d-none" id="msg_div">
          <span id="res_message"></span>
      </div>
 
      <div class="form-group">
       <button type="submit" id="send_form" class="btn btn-success">Submit</button>
      </div>
    </form>
  
</div>
</body>
</html> -->
                  
                    