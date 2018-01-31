<font color="orange">
<?php echo $this->session->flashdata('hasil'); ?>
</font>
<table border="1">
    <tr><th>ID</th><th>NAMA</th><th>Status</th><th></th></tr>
    <?php
    foreach ($user as $row){
        echo "<tr>
              <td>$row->id</td>
              <td>$row->nama</td>
              <td>$row->status</td>
              <td>".anchor('user/edit/'.$row->id,'Edit')."
                  ".anchor('user/delete/'.$row->id,'Delete')."</td>
              </tr>";
    }
    ?>
</table>
<a href="http://localhost:8080/Tes-client/index.php/user/create">+ Tambah data<a>