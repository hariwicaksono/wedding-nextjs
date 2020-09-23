</div>
</div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.transit.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/notyf.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/script.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/status.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/notification.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/datatables.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/pdfmake.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/vfs_fonts.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.buttons.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/buttons.html5.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jszip.min.js'?>"></script>


<script type="text/javascript">
$(document).ready(function() {
$('#myTable2').DataTable({
    dom: 'Blfrtip',
buttons: [
    'copyHtml5',
    'excelHtml5',
    'csvHtml5',
    'pdfHtml5'
],
    lengthMenu: [[10, 100, -1], [10, 100, "All"]]
} );
} );

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        
        var table = $("#myTable").DataTable({
            initComplete: function() {
                var api = this.api();
                $('#myTable_filter input')
                        .off('.DT')
                        .on('input.DT', function() {
                            
                                api.search(this.value).draw();
                    
                });
            },
            dom: 'Blfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            stateSave: true,
            lengthMenu: [[5, 10, 50, 100, -1], [5, 10, 50, 100, "All"]],
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            order: [], 
            ajax: {"url": "<?php echo site_url()?>admin/json", "type": "POST"},
            columns: [
                {"data": "id"},
                {"data": "nama"},
                
                {"data": "nohp",
                    "render": function ( data, type, row ) {
                    return '<a data-id="'+row.id+'" id="kirim" href="https://web.whatsapp.com/send?phone='+row.nohp+'?text='+baseUrl+'/confirm/u/' + row.id + '" alt="Kirim WA" title="Kirim WA" uk-tooltip="Kirim WA" target="_blank">'+row.nohp+'</a>';
                        }
                },
                {"data": "id","orderable": false,
                    "render": function ( data, type, row ) {
                    return '<a href="confirm/u/'+data+'" target="_blank" title="Link untuk Tamu" alt="Link untuk Tamu" uk-tooltip="Link untuk Tamu">'+baseUrl+'/confirm/u/' + data + '</a>';
                        }
                },
                {"data": "qr_code","orderable": false,
                    "render": function ( data, type, row ) {
                    return '<img style="width: 80px;" src="'+baseUrl+'/assets/images/qrcode/'+data+'">';
                        }
                },
                {"data": "opsi","orderable": false}

            ],
            
            order: [[0, 'asc']]
        });
        
        $('#btn-filter').click(function(){ 
            table.ajax.reload(); 
        });

        $('#myTable tbody').on( 'click', '#confirm', function (){
            var retVal = confirm("Do you want to continue ?");
                if( retVal == true ) {

                return true;
                } else {

                    return false;
                }


        });
        
    });
</script>

</body>
</html>
