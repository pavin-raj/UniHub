<?php 
include("../Connection/connection.php");
?>
 <option value="">-----Select------</option> 
         <?php
		 				
						
							
						
		 				$sel="select * from  tbl_location  where  place_id='".$_GET["pid"]."'";
						
						$row=mysql_query($sel);
						//echo $sel;
						while($data=mysql_fetch_array($row))
						{
						
					
						
		  ?>
           <option value="<?php echo $data['location_id'];?>"  ><?php  echo $data["location_name"]; ?></option>
                    <?php 
						}
					?>