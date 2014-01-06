// ##### CONTROLLER #####
// functions that can be triggered by button clicks and events
function create_div_id() {
}

function replace_div(controller, divID) {
	url = 'index.php?controller=' + controller + '&divid=' + divID;
	model_load_div(url, view_replace_div, divID);
}

function append_div(controller, divID, parentID) {
	url = 'index.php?controller=' + controller + '&divid=' + divID;
	model_load_div(url, view_append_div, divID, parentID);
}

// ##### VIEW #####
// functions that return new html that goes into tags
function view_replace_div(divID, responseText) {
	document.getElementById(divID).innerHTML = responseText;
}

function view_append_div(divID, responseText, parentID) {
	document.getElementById(parentID).innerHTML += responseText;
}


// ##### MODEL #####
// functions that return data stored from local storage and AJAX calls
function model_load_div(url, callback, divID, parentID) {
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = ensureReadiness;
	function ensureReadiness() {
		if(xmlhttp.readyState < 4) {
			return;
		}
		if(xmlhttp.status != 200) {
			return;
		}
		if(xmlhttp.readyState === 4) {
			callback(divID, xmlhttp.responseText, parentID);
		}
	}
	xmlhttp.open('GET', url, true);
	xmlhttp.send('');
}