
function edit(data){

	let tr = data.parentElement.parentElement;
	let tdPosition = tr.childNodes.length - 2;
	let td = tr.childNodes[tdPosition];
	let button = data;
	
	console.log(tr.childNodes);
	//產生input元件 <input class="form-control" value="null">
	let inputElement = document.createElement("input");
	inputElement.setAttribute("class", "form-control");
	inputElement.setAttribute("value", td.innerHTML);
	inputElement.setAttribute("type","text");

	//清除name的內容
	td.innerHTML = "";
	//插入input元件
	td.appendChild(inputElement);

	//改變button元件 <input type="button" class="btn btn-outline-info" value="Edit" onclick="confirmEdit(this)">
	button.setAttribute("class", "btn btn-outline-success mr-1");
	button.setAttribute("value", "Done");
	button.setAttribute("onclick", "confirmEdit(this)");//按下完成的動作
	
}

async function confirmEdit(data){

	let table = data.parentElement.parentElement.parentElement.parentElement;
	let tr = data.parentElement.parentElement;
	let tdPosition = tr.childNodes.length - 2;
	let td = tr.childNodes[tdPosition];
	let inputElement = td.childNodes[0];
	let button = data;
	
	let table_type = table.getAttribute("id");
	let id = tr.childNodes[0].innerHTML;
	let value = inputElement.value;

	/*   這邊要寫按下完成的動作  */
	/*	 這邊要寫按下完成的動作  */
	/*	 這邊要寫按下完成的動作  */
	
	await fetch('life_mdysave.php?table_type='+table_type+'&id='+id+'&value='+value, {
		method: 'GET',
		headers: {
		  'Accept': 'application/html',
		  'Content-Type': 'application/html',
		}
		}).then( response => {
		console.log(response);
		}).catch( error => {
		console.log(error);
	});

	



	//將name欄位的內容設成input的值
	td.innerHTML = inputElement.value;

	//改變button元件 <input type="button" class="btn btn-outline-info" value="Edit" onclick="edit(this)">
	button.setAttribute("class", "btn btn-outline-info mr-1");
	button.setAttribute("value", "Edit");
	button.setAttribute("onclick", "edit(this)");//按下Edit的動作
	location.reload();
}

async function deleteData(data){

	//console.log("Press delete");
	
	let table = data.parentElement.parentElement.parentElement.parentElement;
	let tr = data.parentElement.parentElement;
	let tdPosition = tr.childNodes.length - 2;
	let td = tr.childNodes[tdPosition];
	let inputElement = td.childNodes[0];
	let button = data;
	
	let table_type = table.getAttribute("id");
	let id = tr.childNodes[0].innerHTML;
	let value = inputElement.value;
	
	await fetch('life_delsave.php?table_type='+table_type+'&id='+id, {
		method: 'GET',
		headers: {
		  'Accept': 'application/html',
		  'Content-Type': 'application/html',
		}
		}).then( response => {
		console.log(response);
		}).catch( error => {
		console.log(error);
	});
	location.reload();
	/*

	//將name欄位的內容設成input的值
	td.innerHTML = inputElement.value;

	//改變button元件 <input type="button" class="btn btn-outline-info" value="Edit" onclick="edit(this)">
	button.setAttribute("class", "btn btn-outline-info");
	button.setAttribute("value", "Edit");
	button.setAttribute("onclick", "edit(this)");//按下Edit的動作*/
}