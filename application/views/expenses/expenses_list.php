 <!-- /row -->
 <div class="row">
                    
                   
                    <div class="col-sm-12">
                    
                        <div class="white-box">
                        <div class="col-lg-2 col-sm-4 col-xs-12" style="position: absolute; right: 0;">
                            <ul>
                           

                            </ul>
                       
                        </div>
                            <!-- <h3 class="box-title m-b-0">Expenses list</h3> -->
                            <button class="btn  btn-info" style="margin: 7px;"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-plus m-r-5"></i>add expenses</button>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>repate</th>
                                            <th>reminder</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>food and drink</td>
                                            <td>2011/04/25</td>
                                            <td>3000</td>
                                            <td>every day</td>
                                            <td>same day</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>food and drink</td>
                                            <td>2012/04/25</td>
                                            <td>4000</td>
                                            <td>every day</td>
                                            <td>same day</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>food and drink</td>
                                            <td>2012/04/25</td>
                                            <td>4000</td>
                                            <td>every day</td>
                                            <td>same day</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>shopping</td>
                                            <td>2012/04/25</td>
                                            <td>5000</td>
                                            <td>every two day</td>
                                            <td>same day</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>shopping</td>
                                            <td>2012/04/25</td>
                                            <td>5000</td>
                                            <td>every two day</td>
                                            <td>same day</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel1">New expenses</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                            <div class="form-group row">
                                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                   
                                        <input class="form-control" type="date" value="<?php echo date('dd-mm-YY');?>" id="example-date-input">
                                    
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
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">reminder:</label>
                                                    <select class="form-control" id="reminder">
                                                    <option value="food and drink">same day</option>
                                                    <option value="shopping">A day before</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="<?php echo base_url('doc/assets/js/add_expenses.js') ?>"></script>
                </div>
                <!-- /.row -->