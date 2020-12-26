<!-- View file -->
<tbody class="row_position">
   <?php $i=1;
      foreach($allVideos as $alv){  ?>
   <tr class="tablerow" id="<?=$alv['video_id'];?>">
      <td><?= $i++;?></td>
      <td><?= $alv['category_name'];?></td>
      <td><?= $alv['gallery_name']?></td>
      <td>
         <video width="70%" height="100px;" controls>
            <source src="<?= base_url();?>/assets/appvideos/<?= $alv['video_url']?>" type="video/mp4">
         </video>
      </td>
      <td>
         <div id="123<?= $alv['video_id']?>">
            <?php if($alv['video_status'] == 1) { ?>
            <button class="btn btn-sm btn-success" data-id="<?= $alv['video_status'];?>" value="<?= $alv['video_id']?>">Active</button>
            <?php } else { ?>
            <button class="btn btn-sm btn-danger" data-id="<?= $alv['video_status'];?>" value="<?= $alv['video_id']?>">Inctive</button>
            <?php } ?>
         </div>
      </td>
      <td>
         <button class="btn btn-link btn-danger btn-just-icon remove deleteButton" data-id="delete<?= $alv['video_id'];?>" value="<?= $alv['video_id']?>"><i class="fas fa-window-close"></i></button>
         <a href="<?= base_url()?>view-gallery-videos/<?= $alv['gallery_titles_id']?>" class="btn btn-link btn-danger btn-just-icon remove" title="Edit Vendor Info"><i class="fas fa-edit"></i></a>
      </td>
   </tr>
   <?php } ?>
</tbody>
<tfoot>
   <tr>
      <th>SN</th>
      <th>Category Name</th>
      <th>Gallery Title</th>
      <th>Video</th>
      <th>Status</th>
      <th>Action</th>
   </tr>
</tfoot>
</table>
<!-- script to change order -->
<script type="text/javascript">
        $( ".row_position" ).sortable({
            delay: 150,
                stop: function() {
                var selectedData = new Array();
                $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
                });
                updateOrder(selectedData);
                }
                });
                function updateOrder(data) {
                $.ajax({
                url:"<?php echo base_url();?>Dashboard/sorting",
                type:'post',
                data:{position:data},
                success:function(){
                alert('your change successfully saved');
            }
        })
        }
    </script>

    <!-- sort model -->
    function sortvideo($position)
    {  
        $i=1;
        foreach($position as $k=>$v){
                $this->db->set('video_sort_order',$i);
                $this->db->where('video_id',$v); 
                $this->db->update('app_videos');
            $i++;
        }
        return true;
    }

    <!-- view all data list -->
    function getAllVideos(){
        $this->db->select(array('*'));
        $this->db->from('app_videos as av', 'left');
        $this->db->join('categories as c', 'c.cat_id = av.category_id');
        $this->db->join('gallery_titles as gt', 'gt.gt_id = av.gallery_titles_id', 'left');
        $this->db->order_by('av.video_sort_order', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }