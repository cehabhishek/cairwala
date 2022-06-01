 <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

        <!--====== Plugins js ======-->
        <!-- <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/plugins/popper.min.js"></script>
        <script src="assets/js/plugins/meanmenu.js"></script>
        <script src="assets/js/plugins/owl-carousel.js"></script>
        <script src="assets/js/plugins/jquery.nice-select.js"></script>
        <script src="assets/js/plugins/countdown.js"></script>
        <script src="assets/js/plugins/elevateZoom.js"></script>
        <script src="assets/js/plugins/jquery-ui.min.js"></script>
        <script src="assets/js/plugins/slick.js"></script>
        <script src="assets/js/plugins/scrollup.js"></script>
        <script src="assets/js/plugins/range-script.js"></script> -->

        <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->

        <script src="assets/js/plugins.min.js"></script>

        <!-- Main Activation JS -->
        <script src="assets/js/main.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type='text/javascript'>
  $(document).ready(function(){
  
     $( "#fullname" ).autocomplete({
        source: function( request, response ) 
        {
             $.ajax({
                url: "search.php",
                type: 'post',
                dataType: "json",
                data: {
                  search: request.term
                },
                success: function( data ) 
                {// alert(JSON.stringify(data));
                  response( data );
                }
             });
        },
        select: function (values, ui) {
             $('#fullname').val(ui.item.value);
             return false;
        }
     });
	 
	 
	 
	 $( "#fullname1" ).autocomplete({
        source: function( request, response ) 
        {
             $.ajax({
                url: "search.php",
                type: 'post',
                dataType: "json",
                data: {
                  search: request.term
                },
                success: function( data ) 
                {// alert(JSON.stringify(data));
                  response( data );
                }
             });
        },
        select: function (values, ui) {
             $('#fullname1').val(ui.item.value);
             return false;
        }
     });
	 

  });
  function count_cart(){
	  
	   $.ajax({
				url: "count_cart.php",
                type: 'post',
                data: '',
                success: function( data ) 
                {
                  $("#p_count").html(data);
				  
                },
		  
	  });
  }
  function searcing_pro(){
	  $('#ser_f_id').submit();
  }
  
  function addtocart(id,pc,qt){
	  $.ajax({
				url: "addtocart.php",
                type: 'post',
                data: 'id='+id+'&pc='+pc+'&qt='+qt,
                success: function( data ) 
                {
                  $("#c_out").html(data);
				  $(".count-cart").click();
				   count_cart();
                },
		  
	  });
	  
  }
  
  function del_cart(id){
	  $.ajax({
				url: "delcart.php",
                type: 'post',
                data: 'id='+id,
                success: function( data ) 
                {
                  $("#c_out").html(data);
				   $(".count-cart").click();
				   count_cart();
                },
		  
	  });
	  
  }
  
  function call_modal(id){
	  
	  $('#exampleModal').modal('show');
	  $('#p_ids').val(id);
  }
  function search_pin(){
	 var pid=$('#p_ids').val();
	 var pin=$.trim($('#p_pincode').val());
	  // var no_of_digits = pin.toString().length;
	// if((!isNaN(pin))&&(no_of_digits==6)){
	 if(pin!=''){
	 $.ajax({
		 url:'pincode_check.php',
		 type:'post',
		 data:'id='+pid+'&pin='+pin,
		 success:function(e){
			 $('#error').html('');
			 $("#result").html(e);
			 
			 
		 }
	 });
	// }else{
	//	 $("#result").html('');
	//	 $('#error').html('Please Enter The Right Format Of Pincode');
	// }
	}
  }
  
  function check_coupon(){
	  
	  var coup_code=$('#coupon_code_id').val();
	  
	  $.ajax({
				url: "check_coupon_code.php",
                type: 'post',
                data: 'coupon_code='+coup_code,
				dataType:'json',
                success: function( data ) 
                { swal(data.message);
                 if(data.status==true){
					 var dis=data.discount_per;
					// var tot_amt_p = $("#chn_tot").html();
					 var delvi_charge = parseFloat($("#delchg").val());
					 var tot_amt_p = $("#totl_org_charge").val();
					  var tot=parseFloat(tot_amt_p);
					   var discount=parseFloat(dis);
					     var dis_tot_amt= tot - ((discount/100)*tot);
						 
					      $("#chn_tot").html(dis_tot_amt+delvi_charge);
						  
						  $(".kit").hide();
					 swal(data.message);
					 
				 }
				 if(data.status==false){
					 swal(data.message);
				 }
                },
		  
	  });
	  
  }
 
  </script>
  