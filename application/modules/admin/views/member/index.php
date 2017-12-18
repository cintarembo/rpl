<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No Hp</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($member)):
          foreach($member as $m): ?>
        <tr data-id="<?php echo $m->id_member?>" class="member" style="
            background-color:<?php $bgcolor = ($m->status==0) ? '#f006' : '#FFF' ; echo $bgcolor;?>;
            color:<?php $color = ($m->status==0) ? '#FFF' : '#000' ;echo $color;?>"
        >
            <td><a href="#" style="text-decoration:none;color:#fff"><?php echo $m->username?></a></td>
            <td><?php echo $m->nama?></td>
            <td><?php echo $m->alamat?></td>
            <td><?php echo $m->email?></td>
            <td><?php echo $m->no_hp?></td>
            <td><?php 
            $status = ($m->status==1) ? 'Active' : 'Inactive' ;
            echo $status;
            ?></td>
        </tr>
    <?php endforeach; 
          else: ?>
    <h3>Maaf belum ada member untuk saat ini.</h3>
    <?php endif;?>
    </tbody>
</table>


<script>

const member = new DataTable('table',{
    searchable:true,
    sortable:true,
    perPage:10,
    plugins:{
        editable:{
            enabled:true,
            contextMenu:true,
            hiddenColumns: true,
            menuItems: [
                {
                    text: "Activate",
                    action: function() {
                        
                    }
                },
                {
                    text: "Deactivate",
                    action: function() {
                        
                    }
                }
            ],
        }
    }
});
topbar.hide();
</script>