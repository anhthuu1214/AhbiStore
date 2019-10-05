<a href="upload.php" style="font-size: 20pt; background: gray; color: white; padding: 10px 40px;">ADD ITEMS</a>
<p>
<?php 
	 include('connect.php');

	if($_POST['type'] == 'search')
	{
		$timkiem = $_POST['timkiem'];
		 $sql = "SELECT * FROM items where name like '%$timkiem%' or color like '%$timkiem%'";
         $result = $conn->query($sql);
       
         $temp = "<table width='100%' border='1'>
	            <tr bgcolor='black' style='color: white; font-size: 20pt;'>
	              <td>CODE</td>
	              <td>NAME</td>
	              <td>COLOUR</td>
	              <td>QTY</td>
	              <td>PRICE</td>
	              <td>PIC</td>
	              <td colspan='2'>ACT</td></tr>";
        
        while ($data = mysqli_fetch_assoc($result)) 
        {
            
            $temp .= "<tr style='font-size: 20pt;'><td>".$data['id']."</td>";
            $temp .= "<td>".$data['name']."</td>";
            $temp .= "<td>".$data['color']."</td>";
            $temp .= "<td>".$data['qty']."</td>";
            $temp .= "<td>".$data['price']."</td>";
            $temp .= "<td><img src='".$data['pic']."' width='100px' /></td>";
            $temp .= "<td><a href='edit.php?id=".$data['id']."' style='font-size: 20pt; background: gray; color: white; padding: 20px;'>EDIT</a></td>";
             $temp .= "<td><a href='delsp.php?id=".$data['id']."' style='font-size: 20pt; background: gray; color: white; padding: 20px;'>DELETE</a></td>";
            $temp .= "</tr>";  
        }
        echo $temp;
	}

?>