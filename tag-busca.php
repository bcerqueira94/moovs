
<h1 id="tag"><?php 
if ($bairro != "")
	$tag = $atipo . " para " . $anegocio . " em " . $abairro . ", " . $acidade . " - ";
else
	$tag = $atipo . " para " . $anegocio . " em " . $acidade . " - ";
	
echo $tag . strtoupper($uf);  
?>
</h1>
