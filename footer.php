<script type="text/javascript">
	$.ajaxSetup({ cache: false });
     $("#index>ul a").click(function(){
     	$("#index>ul a.selected").removeClass("selected");
		var path = "/docs/"+$(this).attr("file")+".php";
		$.ajax({
			url: path,
			success: function( data ) {
            $('#doc').html(data);
			SyntaxHighlighter.highlight();
			},
			});
		 $(this).addClass("selected");
	 });
	 $("#index>ul a[file='methods']").click();
	 
</script>
</div>
</body>
</html>