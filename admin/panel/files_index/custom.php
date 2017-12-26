<?php
if($_POST['showfiles']=="yes"){
?>
<table width="100%">
	<tr>
		<td>Name</td>
		<td>Size</td>
		<td><input type="checkbox" name="choose-all" id="choose-all"><label for="choose-all">All</label></td>
	</tr>
	<?php
	include "function.php";
	$getCurrentDir = $_POST['folder'];
	$explodeDir = explode("/", substr($getCurrentDir, 0, -1));
	$lastDir = end($explodeDir);
	?>
	<tr class="folder-list">
		<td class="list" id="folder-aa" <?php echo 'onclick="backFolder('.html_entity_decode("&apos;".preg_replace("/(\/)\\1+/", "$1", str_replace($lastDir, "", $getCurrentDir))."&apos;").')"';?>><span><i class="fa fa-folder" style="color:#008dd3"></i>&nbsp;&nbsp;..</span></td>
		<td>-</td>
		<td>-</td>
	</tr>
	<?php
	$location = $getCurrentDir;
	$dir = dir($location);

	while ($entry = $dir->read())
	{
	if($entry == "." || $entry == ".."){
		continue;
	}
	if (is_dir($location . $entry))
		{
			echo '
			<tr class="folder-list">
			<td class="list" id="folder-'.convertChars($entry).'" onclick="openFolder('.html_entity_decode('&apos;'.$getCurrentDir.$entry.'/&apos;').')"><span><i class="fa fa-folder" style="color:#008dd3"></i>&nbsp;&nbsp;'.$entry.'</span></td>
			<td>-</td>
			<td><input type="checkbox" name="choose-file" id="choose-file-'.convertChars($entry).'"><label for="choose-file-'.convertChars($entry).'"></label></td>
			<td style="display:none">
				
				<a href="javascript:void(0)" id="del-link1" class="a'.convertChars($entry).'"><i class="fa fa-trash"></i></a>
				<a class="rename-file" href="../files/'.$entry.'"><i class="fa fa-edit"></i></a>
			</td>
			</tr>
			';
		}
	}
	$dir->close();
	?>
	<?php
	$location = $getCurrentDir;
	$dir = dir($location);

	while ($entry = $dir->read())
	{
	if($entry == "." || $entry == ".."){
		continue;
	}
	if (is_file($location . $entry))
		{
			echo '
			<tr class="file-list">
			<td class="list" id="file-'.convertChars($entry).'" onclick="openFile('.html_entity_decode('&apos;'.str_replace("../../", "", $getCurrentDir).$entry.'&apos;').')">'.file_type($entry).'</td>
			<td>'.byte_convert(filesize($_POST['folder'].$entry)).'</td>
			<td><input type="checkbox" name="choose-file" id="choose-file-'.convertChars($entry).'"><label for="choose-file-'.convertChars($entry).'"></label></td>
			<td style="display:none">
				
				<a href="javascript:void(0)" id="del-link1" class="'.str_replace(".", "-", $entry).'"><i class="fa fa-trash"></i></a>
				<a class="rename-file" href="../files/'.$entry.'"><i class="fa fa-edit"></i></a>
				<a class="copy-link" href="../files/'.$entry.'"><i class="fa fa-chain"></i></a>
			</td>
			</tr>
			';
		}
	}
	$dir->close();
	?>
</table>
<script>
function backFolder(folder){
	if(folder == "../../../files/"){
		$.ajax({
			url: "./panel/files_index/home.php",
			type: "POST",
			dataType: "html",
			data: "files=show",
			success: function(response){
				$(".files").html(response);
				setTimeout(function(){
					$(".folder-list, .file-list").fadeIn("slow");
				}, 50)
			},
		});
	}else{
		$.ajax({
			url: "./panel/files_index/custom.php",
			type: "POST",
			dataType: "html",
			data: "folder="+folder+"&showfiles=yes",
			success: function(response){
				$(".files").html(response);
				setTimeout(function(){
					$(".folder-list, .file-list").fadeIn("slow");
				}, 50)
			},
		});
	}
}
	function openFolder(folder){
		$.ajax({
			url: "./panel/files_index/custom.php",
			type: "POST",
			dataType: "html",
			data: "folder="+folder+"&showfiles=yes",
			success: function(response){
				$(".files").html(response);
				setTimeout(function(){
					$(".folder-list, .file-list").fadeIn("slow");
				}, 50)
			},
		});
	}
	function openFile(file){
		window.open(file, "_blank");
	}
</script>
<?php }?>