
<!DOCTYPE html>
<html lang="ja">
<?php
require_once __DIR__ . '/../header.php';
?>
<section>
 
</section>

<section>
    <h2>詳細</h2>
    
<table border="1">
    <tr>
        <th>
    START TIME
</th>
<th>
    END TIME
</th>
<th>
    ITEM
</th>


<tr>
        <td>
    <?php
    $name =  $_POST['starttime'];
  echo ($name);
    
    
    ?>
</td>
<td>
    <?php
    $name =  $_POST['endtime'];
  echo ($name);
    
    
    ?>
</td>
<td>
    <?php
    $name =  $_POST['item'];
  echo ($name);
    
    
    ?>
</td>
</tr>




  </table>  

 

</section>
</html>