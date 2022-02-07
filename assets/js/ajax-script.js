jQuery(document).ready(function ($) {
	$(".post__category").on("click", function () {
		const clickedElem = this;
		let termID = clickedElem.className.match(/\d+/);
		let lastestPost = $(".post--hero")
			.attr("class")
			.split(/\s+/)[1]
			.match(/\d+/);

		jQuery.ajax({
			type: "post",
			dataType: "json",
			url: ajax_object.ajax_url,
			data: {
				action: "get_post_by_category",
				term_id: termID[0],
				lastest_post_id: lastestPost[0],
			},
			success: function (response) {
				console.log(clickedElem);
				$(".posts-grid").html(response.data.html);
				$(".post__category").removeClass("post__category--current");
				$(clickedElem).addClass("post__category--current");
			},
		});
	});
});
