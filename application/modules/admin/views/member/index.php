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
    <?php if (!empty($member)) :
        foreach ($member as $m) : ?>
        <tr data-id="<?php echo $m->id?>" class="member" style="
            background-color:<?php $bgcolor = ($m->active==0) ? '#f006' : '#FFF' ;
            echo $bgcolor;?>;
            color:<?php $color = ($m->active==0) ? '#FFF' : '#000' ;
            echo $color;?>"
        >
            <td><a href="#" style="text-decoration:none;color:#000"><?php echo $m->username?></a></td>
            <td><?php echo $m->first_name, $m->last_name?></td>
            <td><?php echo $m->address?></td>
            <td><?php echo $m->email?></td>
            <td><?php echo $m->phone?></td>
            <td><?php
            $status = ($m->active==1) ? 'Active' : 'Inactive' ;
            echo $status;
            ?></td>
        </tr>
        <?php endforeach;
    else : ?>
    <h3>Maaf belum ada member untuk saat ini.</h3>
    <?php endif;?>
    </tbody>
</table>


<script type="text/javascript" defer="defer">
setTimeout(() => {
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
}, 20);
</script>