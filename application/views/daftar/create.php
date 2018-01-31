<?php echo form_open_multipart('user/create');?>
<table>
    <tr><td>NAMA</td><td><?php echo form_input('nama');?></td></tr>
    <tr><td>STATUS</td><td><?php echo form_input('status');?></td></tr>        
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('user','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>