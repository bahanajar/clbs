			<hr>
			<p class="text-right">
				2021 ~ SMKN 1 Buntok
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalBox" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
			<!-- isi modal -->
			</div>
		</div>
	</div>
</div>

<script src="inc/js/jquery.min.js"></script>
<script src="inc/js/jquery.dataTables.min.js"></script>
<script src="inc/js/bootstrap.min.js"></script>

<script type="text/javascript">
function kotakModal(file) {
	var myfile = file;
	$('#modalBox').modal('show');
	$('#modalBox .modal-body').load(myfile);
}

$(document).ready(function() {
	$('#dt').DataTable({
		"order": [[ 0, "asc" ]],
		"info": true	
	});
});
</script>

</body>
</html>
