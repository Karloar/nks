function FCKeditor_OnComplete(){
	var oEditor = FCKeditorAPI.GetInstance("content");
	oEditor.SetHTML(document.getElementById("detail").value);
}