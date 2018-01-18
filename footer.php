<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div>
    <footer class="site-footer u-textAlignCenter">
        Puma by <a href="https://fatesinger.com">bigfa</a>.  <br>
      	Depth modification by <a href="https://finer04.pw">Finer04</a> |
        <?php echo 'Page loading used ',timer_stop(), 's';?> 
    </footer>

</div>

<script src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script src="https://cdn.bootcss.com/smoothscroll/1.4.6/SmoothScroll.min.js"></script>



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

});
</script>

<?php $this->footer(); ?>
<script>new WOW().init();</script>


<div id="loading" >
	<div id="loading-center">
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
	</div>
</div>

</body>
</html>

