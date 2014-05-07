$(document).ready(function() {
	
	$("#sortby").children("select").change(function() {
		vars = { "sortby": $("select[name='sortby']").val(), "top": $("select[name='top']").val() }
		var pathArray = window.location.pathname.split( '/' );
		var pathArrayLen = pathArray.length;
		$.get( "ajax/" + pathArray[pathArrayLen-1], vars, function(data) {
			$("#entry_list").html(data);
			window.history.pushState({"html":document.innerHTML,"pageTitle":document.title},"", pathArray[pathArrayLen-1] + "?" + $.param(vars));
		});
	});

	$(".info_holder a").click(function(e) {
		$(this).parent().parent().next('.entry_info').slideToggle();
		e.preventDefault();
	});

	$("li.entry").each(function() {
		var entry_id = $(this).data('entry-id');
		$(this).find(".body").find("img").each(function() {
			if($(this).parent().is("a")) {
				$(this).parent().attr('data-lightbox', 'entry_'+entry_id);
			}
		});
	});

});