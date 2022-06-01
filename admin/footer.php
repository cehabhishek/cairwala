 <footer class="main-footer">
    <div class="pull-right hidden-xs"></div>
   <a href="" target="_blank"> Developed by Webazu Technology(OPC) Pvt. Ltd</a></footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script> 

<!-- Chartjs JavaScript --> 
<script src="dist/plugins/chartjs/chart.min.js"></script>
<script src="dist/plugins/chartjs/chart-int.js"></script>

<!-- Chartist JavaScript --> 
<script src="dist/plugins/chartist-js/chartist.min.js"></script> 
<script src="dist/plugins/chartist-js/chartist-plugin-tooltip.js"></script> 
<script src="dist/plugins/functions/chartist-init.js"></script>
<!--<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>-->
<script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script>
 <!--<script>
    	 $('.jqte-test').jqte();
   </script>-->
				<script>
				  CKEDITOR.replace('editor');
				  $(document).ready( function() {
					if (Cookies('pop') == null) {
						 $('#alerthide').delay(2000).fadeOut();
						 
							 
					 }
						
					  }); 

				</script>
				<script>
				  CKEDITOR.replace('about');
				  $(document).ready( function() {
					if (Cookies('pop') == null) {
						 $('#alerthide').delay(2000).fadeOut();
						 
							 
					 }
						
					  }); 

				</script>
				<script>
				 // CKEDITOR.replace('about1');
				   CKEDITOR.replace('about1', {
					 extraPlugins: 'colorbutton'
					});
				  $(document).ready( function() {
					if (Cookies('pop') == null) {
						 $('#alerthide').delay(2000).fadeOut();
						 
							 
					 }
						
					  }); 

				</script>
				<script>
				function recall(){
				   $.ajax({
					   url:'call_ax.php',
					   data:'',
					   type:'post',
					   success:function(d){
						  if(d==1){
							 window.location.href='new_order.php';
						  }
					   }
					   
				   });
				}
				</script>
<!-- summernote
<script src="dist/plugins/summernote/summernote-bs4.js"></script> 
<script>
      $('#summernote').summernote({
            height: 300, // set editor height
			placeholder: 'Hello default Summernote',
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
        var edit = function() {
  		$('.click2edit').summernote({focus: true});
		};

		var save = function() {
  		var markup = $('.click2edit').summernote('code');
  		$('.click2edit').summernote('destroy');
};
</script>-->
<script src="dist/plugins/bootstrap-switch/bootstrap-switch.js"></script> 
<script src="dist/plugins/bootstrap-switch/highlight.js"></script> 
<script src="dist/plugins/bootstrap-switch/main.js"></script>
<!-- DataTable --> 
<script src="dist/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script>
  $(function () {
    $('#example1').DataTable();
    $('#example3').DataTable();
    $('#example4').DataTable();
    $('#example5').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>

<script src="dist/plugins/table-expo/filesaver.min.js"></script>
<script src="dist/plugins/table-expo/xls.core.min.js"></script>
<script src="dist/plugins/table-expo/tableexport.js"></script>
<script>
$("table").tableExport({formats: ["xlsx","xls", "csv", "txt"],    });
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</body>

<!-- Mirrored from uxliner.com/niche/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2020 04:35:37 GMT -->
</html>
