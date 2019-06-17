			<!-- Main Footer -->
			<footer class="main-footer no-print">
				<small>Copyright © 2019 | Derechos reservados.</small>
			</footer>
		</div>

		<!-- jquery-2.2.3.min.js?v=31 -->
		<script src="{{ url('/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
		<!-- jquery-ui.min.js?v=31 -->
		<script src="{{ url('/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
		<!-- bootstrap.min.js?v=31 -->
		<script src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>
		<!-- AdminLTE-app.js?v=31 -->
		<script src="{{ url('/js/AdminLTE-app.js') }}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

		<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script> -->
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

		<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
		<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>
		<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table-locale-all.min.js"></script>
		<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/extensions/export/bootstrap-table-export.min.js"></script>
		@foreach ($listScriptSrc as $src)
		<script type="text/javascript" src="{{ URL::asset($src) }}"></script>
		@endforeach

		<script type="text/javascript">{{ $fnEntityInit }}();</script>

		<!--  Autor. SYLAR.JM -->
		<!-- ..................... -->

	</body>
</html>
