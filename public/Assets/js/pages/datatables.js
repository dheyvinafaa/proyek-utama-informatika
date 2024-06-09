let jquery_datatable = $("#table1").DataTable({
	dom: "Bfrtip",
	buttons: ["copy", "csv", "excel", "pdf", "print"],
	// filter on export do not include last column
	columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
	// filter on export do not include last column
	columnDefs: [
		{
			targets: -1,
			visible: false,
		},
		
});
	
