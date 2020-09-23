<?php $this->load->view('admin/header');?>


<body>
<?php $this->load->view('admin/navbar');?>


	<div class="uk-container uk-container-large">
		<div class="uk-card uk-card-default uk-card-body">
			
			<h2>Data Rekap Kehadiran</h2>
			
			<table id="myTable2" class="table table-striped table-sm">
				
				<thead class="thead-dark">
					<tr>

						<th>NAMA</th>
						<th>TANGGAL</th>
						
					</tr>
				</thead>
				<tbody>
					<?php foreach($data->result() as $row):?>
					<tr>
					
						<td style="vertical-align: middle;"><?php echo $row->nama;?></td>

						
						<td style="vertical-align: middle;"><?php echo $row->tanggal;?></td>

						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>

	<?php $this->load->view('admin/footer');?>