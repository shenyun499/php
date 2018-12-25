function doMenu(obj) {
	var items = obj.parentNode.getElementsByTagName("ul");
	var itmUl;
	if(items.length > 0) {
		itmUl = items[0];
	}
	if(itmUl.className != "ex") {
		cxAll(obj);
		itmUl.className = "ex";
		obj.className = "ias";
	} else {
		itmUl.className = "cx";
		obj.className = "ia";
	}
}

function statUp() {
	cxAll();
}

function cxAll(obj) {
	var ulDom = document.getElementById("nav");
	var items = ulDom.getElementsByTagName("ul");
	for(var i = 0; i < items.length; i++) {
		items[i].className = "cx";
	}
}

