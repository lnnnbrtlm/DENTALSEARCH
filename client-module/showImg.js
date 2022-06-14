function triggerClick(){
	document.querySelector('#profileImg').click();
}

function displayImg(e){
	if (e.files[0]){
		var reader = new FileReader();

		reader.onload = function(e){
			document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
	}
}