<?php echo form_open('user/edit');?>
<?php echo form_hidden('id',$user[0]->id);?>

<table>
    <tr><td>ID</td><td><?php echo form_input('',$user[0]->id,"disabled");?></td></tr>
    <tr><td>NAMA</td><td><?php echo form_input('nama',$user[0]->nama);?></td></tr>
    <tr><td>STATUS</td><td><?php echo form_input('status',$user[0]->status);?></td></tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('user','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>