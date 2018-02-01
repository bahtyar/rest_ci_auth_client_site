<font color="orange">
	<?php echo $this->session->flashdata('hasil'); ?>
</font>
<?php echo form_open_multipart('login/do_login');?>

<table>
	<tr>
		<td>Username</td>
		<td><?php echo form_input('username');?></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><?php echo form_input('password');?></td>
	</tr>
	<tr><td colspan="2">
		<?php echo form_submit('login','Login');?>		
	</table>
