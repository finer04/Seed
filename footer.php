<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

    <footer class="site-footer u-textAlignCenter">
		<div class="container">
		<div class="row">
			<div class="col-md-12 ">
			<p class="text-muted">Puma by <a href="https://fatesinger.com">bigfa</a> /  
			Depth modification by <a href="https://finer04.pw">Finer04</a> / 
			<a class="text-muted" href="http://typecho.org/">由 Typecho 强力驱动</a></p>
			</div>
		</div>
    </footer>
</div>
</div>

<script src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script src="https://cdn.bootcss.com/smoothscroll/1.4.6/SmoothScroll.min.js"></script>
<script src="https://cdn.bootcss.com/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
<script src="https://cdn.bootcss.com/headroom/0.9.4/headroom.min.js"></script>
<script src="https://cdn.bootcss.com/headroom/0.9.4/jQuery.headroom.min.js"></script>

<script>
$(document).pjax('a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"], a[no-pjax])', {
    container: '#page',
    fragment: '#page',
    timeout: 8000
}).on('pjax:send',
function() {
    $('#loading').fadeIn(300);

}).on('pjax:complete',
function() {
	$("#loading").fadeOut(600);
	$("img.lazy").lazyload({effect:"fadeIn"});
	$(".navbar").headroom(); 
	$("table").addClass("table table-hover");
});
</script>

<?php $this->footer(); ?>
<script> $(".navbar").headroom(); </script>
<script>
new WOW().init();
$(function() {
    $("img").lazyload({
        effect : "fadeIn",
        threshold : 200
    });
});
</script>
<script>
$(document).ready(function(){
    $("table").addClass("table table-hover");
});</script>

<div id="loading" >
	<div id="loading-center">
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
	</div>
</div>

<script>

</script>
</body>
</html>

