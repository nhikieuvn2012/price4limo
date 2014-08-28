
<script type="text/javascript">
	var g_uniteDirPlagin = "<?php echo self::$dir_plugin?>";
</script>


<div id="div_debug"></div>

<div class='unite_error_message' id="error_message" style="display:none;"></div>

<div class='unite_success_message' id="success_message" style="display:none;"></div>

<?php
	self::requireView($view);
	
?>