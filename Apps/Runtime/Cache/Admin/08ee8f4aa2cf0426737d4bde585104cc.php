<?php if (!defined('THINK_PATH')) exit();?><form action="" method="post">
	<input type="text" name="id" />
	<input type="submit" value="find" />
</form>
    <?php echo W('Table/order',array('orderlist'=>$orderlist));?>