<?php
if($_POST['files']=="show"){
?>
<table width="100%">
	<tr>
		<td>Name</td>
		<td>Size</td>
		<td><input type="checkbox" name="choose-all" id="choose-all"><label for="choose-all">All</label></td>
	</tr>

	<?php
	include "function.php";
	$location = "../../../files/";
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
			<td class="list" id="folder-'.convertChars($entry).'" onclick="openFolder('.html_entity_decode('&apos;../../../files/'.$entry.'/&apos;').')"><span><i class="fa fa-folder" style="color:#008dd3"></i>&nbsp;&nbsp;'.$entry.'</span></td>
			<td></td>
			<td><button class="choose-folder white waves-effect" onclick="chooseFolder('.html_entity_decode('&apos;../../../files/'.$entry.'/&apos;').')"></button></td>
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
	$location = '../../../files/';
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
			<td class="list" id="file-'.convertChars($entry).'" onclick="openFile('.html_entity_decode('&apos;../files/'.$entry.'&apos;').')">'.file_type($entry).'</td>
			<td>'.byte_convert(filesize("../../../files/$entry")).'</td>
			<td><button class="choose-file white waves-effect" onclick="chooseFile('.html_entity_decode('&apos;../../../files/'.$entry.'/&apos;').')"></button></td>
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
function chooseFolder(folder){
	$(this).css("display", "none");
}
</script>
<?php }?>