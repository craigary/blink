<footer>
  <p>Copyright © 2018 <a href="http://craigary.net">Craig Hart</a>. | Powered by Blink | <a href="./admin/">Admin</a></p>
  <p>Theme by Craig Hart, inspired by Pieter Robberechts.</p>
</footer>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.1/dist/ionicons.js"></script>
<script>

$("img").each(function() {
	$(this).attr("data-src",$(this).attr("src"));
	$(this).removeAttr("src");
	$(this).attr("class","lazyload")
});

if ('loading' in HTMLImageElement.prototype) {
	const images = document.querySelectorAll("img.lazyload");
	images.forEach(img => {
		img.src = img.dataset.src;
	});
} else {
	let script = document.createElement("script");
	script.src = "/js/lazysizes.min.js";;
	document.body.appendChild(script)
}

  //search interface
  $(document).on('keypress', function(e) {
    if (e.which == 13) {
      event.preventDefault();
      var searchtext = $("#searchinput").val();
      window.location.href = "/filter.php?method=search&s=" + searchtext;
    }
  });

  $(".modal-button").click(function() {
    var target = $(this).data("target");
    $("html").addClass("is-clipped");
    $(target).addClass("is-active");
  });

  $(".modal-close, .modal-background").click(function() {
    $("html").removeClass("is-clipped");
    $(this).parent().removeClass("is-active");
  });
</script>
</body>

</html>