<?php 
include 'db.php';
			     $query="select * from chat order by id desc";
			     $run=$db->query($query);

			     while($row=$run->fetch_array()):
			?>
			<div class="chat_data">
				<span style="color:green"><?=$row['name']?></span> :
				<span style="color:brown"><?=$row['msg']?></span>
				<span style="float:right"><?=formatDate($row['date'])?></span>
			</div>
		<?php endwhile;?>