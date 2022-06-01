<?php 
include("../Connection/connection.php");
?>
 <option value="">-----Select------</option> 
         <?php
		 				
						
							
						
		 				$sel="select * from  tbl_place  where  district_id='".$_GET["did"]."'";
						
						$row=mysql_query($sel);
						//echo $sel;
						while($data=mysql_fetch_array($row))
						{
						
					
						
		  ?>
           <option value="<?php echo $data['place_id'];?>"  ><?php echo $data['place_name']; ?></option>
                    <?php 
						}
					?>