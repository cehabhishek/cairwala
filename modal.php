<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
					    <p>Search</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
					<div class="container">
                        <div class="row">
                             <div class="col-md-12"><h5>Check Whether Product Is Available In Your Location Or Not.</h5></div>
							
							   <div class="col-md-12"><p>Please enter the city name </p></div>
                               
							   <div class="col-sm-8">
							
                                        <!--<input class="form-control" type="tel" pattern='[0-9]{6}' id="p_pincode" name="pincode" value="" required />-->
                                        <input class="form-control" type="text"  id="p_pincode" name="pincode" value="" required />
										<input class="" type="hidden" id="p_ids" value="" />
										<p id="error" style="color:red"></p>	
                                </div> 
								<div class="col-sm-4 ">
								 <a class="btn btn-primary pull-right" type='submit'  href="javascript:void(0)" onclick="search_pin()"> Check Availability</a>
								</div>
                                
                                <div class="col-md-12" id="result"></div>    
                       
                        </div>
						</div>
                    </div>
                </div>
            </div>
        </div>