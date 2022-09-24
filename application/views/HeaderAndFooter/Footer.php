

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>		
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
	
		
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src='<?= base_url() ?>application/assets/starrating/js/star-rating.min.js' type='text/javascript'></script>
		<!-- developer js -->
		<script src="<?php echo base_url('application/assets/js/clock.js') ?>"></script>
		<!-- DYNAMIC ADDRESS SCRIPT  -->
		<script>
			$(document).ready(function(){
				$("#region_group").change(function(){
					var temp = $("#region_group").val();
					$.ajax({
						type: 'post',
						data: {selectedRegion: temp},
						success:function(response){
						//    $('#response').text('name : ' + response);
							if(response != ""){
								var html = '<option value="">Select Province</option>';
								var obj = JSON.parse(response);
								for(var key in obj){
									if (obj.hasOwnProperty(key)){
										var value=obj[key];
										html += '<option value="'+key+'">'+key+'</option>';
									}
								}
								$('#province_group').html(html);
								var html2 = '<option value="">Select Municipality</option>';
								var html3 = '<option value="">Select Barangay</option>';
								$('#muni_group').html(html2);
								$('#barangay_group').html(html3);
							}
							else{
								var html1 = '<option value="">Select Province</option>';
								var html2 = '<option value="">Select Municipality</option>';
								var html3 = '<option value="">Select Barangay</option>';
								$('#province_group').html(html1);
								$('#muni_group').html(html2);
								$('#barangay_group').html(html3);
							}
						}
					});
				});
				$("#province_group").change(function(){
					var temp1 = $("#region_group").val();
					var temp2 = $("#province_group").val();
					$.ajax({
						type: 'post',
						data: {selectedRegion: temp1, selectedProvince: temp2},
						success:function(response){
						//    $('#response').text('name : ' + response);
							if(response != ""){
								var html = '<option value="">Select Municipality</option>';
								var obj = JSON.parse(response);
								for(var key in obj){
									if (obj.hasOwnProperty(key)){
										var value=obj[key];
										html += '<option value="'+key+'">'+key+'</option>';
									}
								}
								$('#muni_group').html(html);
								var html3 = '<option value="">Select Barangay</option>';
								$('#barangay_group').html(html3);
							}
							else{
								var html = '<option value="">Select Municipality</option>';
								var html3 = '<option value="">Select Barangay</option>';
								$('#muni_group').html(html);
								$('#barangay_group').html(html3);
							}
						}
					});
				});
				$("#muni_group").change(function(){
					var temp1 = $("#region_group").val();
					var temp2 = $("#province_group").val();
					var temp3 = $("#muni_group").val();
					$.ajax({
						type: 'post',
						data: {selectedRegion: temp1, selectedProvince: temp2, selectedMuni: temp3},
						success:function(response){
						//  $('#response').text('name : ' + response);
							if(response != ""){
								var html = '<option value="">Select Barangay</option>';
								var obj = JSON.parse(response);
									
								// for(i=0; i<obj.length; i++){
								// 	html += '<option value='+obj[i]+'>'+obj[i]+'</option>';
								// }
								for(var key in obj){
									if (obj.hasOwnProperty(key)){
										var value=obj[key];
										html += '<option value="'+value+'">'+value+'</option>';
									}
								}
								$('#barangay_group').html(html);
							}
							else{
								var html = '<option value="">Select Barangay</option>';
								$('#barangay_group').html(html);
							}
						}
					});
				});
			});
		</script>
		<!-- PRODUCT TABLE  -->
		<script>
			$(document).ready( function () {
				
				$('#productTable').DataTable().destroy();
				// var VtxtSearch=$("#txtSearchChild").val();
				loadproductTable();
			});	
			// $("#childSearch").submit(function(event){
			// 	event.preventDefault();
			// 	$('#productTable').DataTable().destroy();
			// 	var VtxtSearch=$("#txtSearchChild").val();
			// 	loadproductTable(VtxtSearch);
			// });
			function loadproductTable(txtSearch=''){
				// alert('thiswork');
				var dataTable = $('#productTable').DataTable({
					
					"lengthMenu": [[10, 25, 100, 1000, 3000, -1], [10, 25, 100, 1000, 3000]],
					"processing":true,
					"language": {
						processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
					},
					// "serverSide":true,
					"responsive": true,
					// "bPaginate": true,
					// "sPaginationType": "full_numbers",
					"ajax": {
						"url": "<?php echo base_url('Pages/AddProduct/TableAjax')?>",
						"type": "POST",
						// "data": {txtSearch:''}
					},
					columns: [
						{
							data: 'productId',
							className: 'data'
						},
						{
							data: 'name',
							className: 'data'
						},
						{
							data: 'productPrice',
							className: 'data'
						},
						{
							data: 'category',
							className: 'data'
						},
						{
							data: null,
							orderable: false,
							className: 'data',
							render: function(data) {
								// console.log()
								var editLink = '<?php  echo base_url('EditProduct/') ?>' + data.productId;
								var deleteLink = '<?php  echo base_url('Pages/AddProduct/delete/') ?>' + data.productId;
								return '<a class="btn btn-success rounded-1 " href="'+editLink+'">Edit</a><a class="btn btn-danger rounded-1 ml-1" href="'+deleteLink+'">Delete</a>';
							}
						}
					],
					// "order":[],
					"searching": true,
				});
			}
		</script>
		<script>
			$('.kv-uni-star').rating({
            theme: 'krajee-uni',
            filledStar: '&#x2605;',
            emptyStar: '&#x2606;',
			showCaption:false,
	    	showClear: false,
        });
		</script>
    </body>
</html>