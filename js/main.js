(function() {
	var xmlLink = document.getElementsByTagName("a")[0];

	xmlLink.onclick = function() {
		// Create XHR Object
		var xhr = new XMLHttpRequest();

		// preparing the request
		xhr.onreadystatechange = function() {
			if ((xhr.readyState == 4) && (xhr.status == 200) || (xhr.status == 304)) {
				var body = document.getElementsByTagName("body")[0];
				var ul = document.createElement("ul");
				var heading = xhr.responseXML.getElementsByTagName("heading")[0].firstChild.nodeValue;
				var cast = xhr.responseXML.getElementsByTagName("cast")[0];
				var h2 = document.createElement("h2");
				var ul = document.createElement("ul");
				var h2Text = document.createTextNode(heading);

				cast = cast.getElementsByTagName("name");

				for(var i=0; i<cast.length; i++) {
					var name = cast[i].firstChild.nodeValue;
					var li = document.createElement("li");
					var liText = document.createTextNode(name);
					li.appendChild(liText);
					ul.appendChild(li);

				}
				
				h2.appendChild(h2Text);
				body.appendChild(h2);
				body.appendChild(ul);
			}
		};
	// open the request
	xhr.open("GET", "files/alice_characters.xml", true);

	// send the request
	xhr.send(null);
	return false;
};
})();