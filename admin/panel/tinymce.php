<textarea>
</textarea>
<script src="script/jquery.min.js"></script>
<script src="script/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
	selector: 'textarea',
	plugins: 'link image preview searchreplace table emoticons textcolor media code',
	menubar: 'edit',
	toolbar: 'undo redo | styleselect | bold italic underline | strikethrough superscript subscript | alignleft aligncenter aligntright alignjustify | bullist numlist outdent indent | link image media | table | code |',
	width: 800,
	height: 200,

});
</script>