  <!-- row -->
 
  <div class="row">
                    <!-- Left sidebar -->
                   
                    <div class="col-md-6 col-sm-12">
                        <div class="white-box">
                        <h3 class="box-title">Cafes</h3>
                              <ul class="list-inline two-part">
                              <li><i class="icon-people text-info"></i></li>
                              <li class="text-right"><span class="counter">120 S.P</span></li>
                              </ul> 
                           <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">add revenue</button></center>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="white-box">
                        <h3 class="box-title">restaurants</h3>
                              <ul class="list-inline two-part">
                              <li><i class="icon-people text-info"></i></li>
                              <li class="text-right"><span class="counter">2000 S.P</span></li>
                              </ul> 
                           <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">add revenue</button></center>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="white-box">
                        <h3 class="box-title">grocery</h3>
                              <ul class="list-inline two-part">
                              <li><i class="icon-people text-info"></i></li>
                              <li class="text-right"><span class="counter">1500 S.P</span></li>
                              </ul> 
                           <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">add revenue</button></center>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="white-box">
                        <h3 class="box-title">general</h3>
                              <ul class="list-inline two-part">
                              <li><i class="icon-people text-info"></i></li>
                              <li class="text-right"><span class="counter">400 S.P</span></li>
                              </ul> 
                           <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">add revenue</button></center>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel1">New revenue</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                            <div class="form-group row">
                                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                   
                                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                    
                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Amount:</label>
                                                    <input type="text" class="form-control" id="recipient-name1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">note:</label>
                                                    <textarea class="form-control" id="message-text1"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">category:</label>
                                                    <select class="form-control" id="category">
                                                    <option value="food and drink">food and drink</option>
                                                    <option value="shopping">shopping</option>
                                                    </select>
                                                </div>
                                                <div id="sub"></div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">repeatedly:</label>
                                                    <select class="form-control" id="Weekends">
                                                    <option value="food and drink">every day</option>
                                                    <option value="shopping">every two days</option>
                                                    <option>Weekends</option>
                                                    </select>
                                                </div>
                                                
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                    <script src="<?php echo base_url('doc/assets/js/add_expenses.js') ?>"></script>
                    </div>
                    