<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', '<?php global $st_op_promote; echo $st_op_promote->option['st_g_analytics_ua']; ?>']);
<?php if ($st_op_promote->option['ganalyticsdomain'] != '') { ?>_gaq.push(['_setDomainName', '<?php echo $st_op_promote->option['st_g_analytics_sub']; ?>']);<?php } ?>

_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>