<script>
var counterValue = parseInt($('.bubble').html());
	function removeAnimation(){
		setTimeout(function() {
			$('.bubble').removeClass('animating')
		}, 1000);			
	}
</script>

	<div id="rounded">


	<div id="main" class="container">

    <ul id="navigation">
    <li><?php echo anchor('home', "Home"); ?></li>
	<li><?php echo anchor('home/inbox', "Inbox"); ?></li>
	<li><?php echo anchor("send", 'Send'); ?></li>
    </ul>

    <div class="clear"></div>
    
    <div id="pageContent">