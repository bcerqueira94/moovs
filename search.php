<?php
include('conexao.php');
if($_POST)
{

$q=$_POST['searchword'];

$sql_res=mysql_query("select * from usuario where nome like '%$q%' or sobrenome like '%$q%' order by cod_usuario LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$fname=$row['nome'];
$lname=$row['sobrenome'];
$img=$row['foto'];
$country=$row['country'];

$re_fname='<b>'.$q.'</b>';
$re_lname='<b>'.$q.'</b>';

$final_fname = str_ireplace($q, $re_fname, $fname);

$final_lname = str_ireplace($q, $re_lname, $lname);


?>
<div class="display_box" align="left">

<img src="../<?php echo $img; ?>" style="width:25px; float:left; margin-right:6px" /><?php echo $fname; ?>&nbsp;<?php echo $lname; ?><br/>
</div>



<?php
}

}
else
{

}


?>
