
<?php $this->load->view('admin/header');?>

<body>
<?php $this->load->view('admin/navbar');?>


	<div class="uk-container uk-container-large">

		<div class="uk-card uk-card-default uk-card-body">
			
			<h2>Data Konfirmasi</h2>
			
			<table id="myTable2" class="table table-striped table-sm">
				
				<thead class="thead-dark">
					<tr>
<th>ID</th>
						<th>NAMA</th>
						<th>KONFIRMASI</th>
						
					</tr>
				</thead>
				<tbody>
					<?php foreach($data->result() as $row):?>
					<tr>
						<td style="vertical-align: middle;"><?php echo $row->id;?></td>
						<td style="vertical-align: middle;"><?php echo $row->nama;?></td>

						
						<td style="vertical-align: middle;"><?php echo $row->konfirmasi2;?></td>

						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
	<?php $this->load->view('admin/footer');?>