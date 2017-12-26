<div class="fm">

	<nav id="fm-menu" class="white">
		<button id="af-btn">All files</button><button id="doc-btn">Documents</button><button id="img-btn">Images</button><button id="music-btn">Music</button><button id="vid-btn">Videos</button><button id="arch-btn">Archive</button><button id="etc-btn">Others</button>
	</nav>

	<div class="files">
		<div id="loading-files">Loading Files..</div>
	</div>
	<div id="fm-nav">
		<button class="waves-effect" id="fm-newfile"><i class="fa fa-file"></i><br>New file</button>
		<button class="waves-effect" id="fm-newfolder" onclick="newFolder()"><i class="fa fa-folder"></i><br>New Folder</button>
		<button class="waves-effect" id="fm-rename" disabled><i class="fa fa-pencil"></i><br>Rename</button>
		<button class="waves-effect" id="fm-delete" disabled><i class="fa fa-edit"></i><br>Edit</button>
		<button class="waves-effect" id="fm-copy" disabled><i class="fa fa-copy"></i><br>Copy</button>
		<button class="waves-effect" id="fm-cut" disabled><i class="fa fa-cut"></i><br>Cut</button>
		<button class="waves-effect" id="fm-paste" disabled><i class="fa fa-paste"></i><br>Paste</button>
		<button class="waves-effect" id="fm-delete" disabled><i class="fa fa-trash"></i><br>Delete</button>
		<button class="waves-effect" id="fm-copylink" disabled><i class="fa fa-link"></i><br>Copy Link</button>
		<button class="waves-effect" id="fm-prop"><i class="fa fa-info-circle"></i><br>Properties</button>
	</div>
	<div class="fm-dialog">
		<div id="dialog-newfolder">
			<span>New Folder</span><br>
			<form id="newfolder-form">
				<input type="text" name="newfolder-name" id="newfolder-name" class="" placeholder="Folder Name">
				<button type="submit" class="btn blue white-text waves-effect">Create</button>
			</form>
		</div>
	</div>
	<script>
	$(document).ready(function(){
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
		jQuery.fn.cleanWhitespace = function(){
			textNodes = this.contents().filter(function() {return (this.nodeType == 3 && !/\S/.test(this.nodeValue));}).remove();
			return this;
		}
		$("#fm-nav").cleanWhitespace();

	});
	function newfolder(){

	}
	</script>

</div>