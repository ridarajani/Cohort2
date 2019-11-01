<?php
    $query = "SELECT * FROM info_list";
    $query = $this->db->query($query);

    if(!$query){
        echo $this->db->error();
    }else{
?>
<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Email Address</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($query->result() as $row){
                ?>
            <tr>
            <td><?php echo $row->first_name; ?></td>
            <td><?php echo $row->last_name; ?></td>
            <td><?php echo $row->age; ?></td>
            <td><?php echo $row->email_address; ?></td>
            </tr>
<?php
            }
?>
    </tbody>
</table>
<?php
    }
?>