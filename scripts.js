function btnEditCat(botao) {
  var celId = botao.getAttribute("id");
  celId = celId.slice(8);
  var categoria = "categoria-";
  var descricao = "descricao-";
  // document.getElementById(categoria.concat(celId)).contentEditable = true;
  var catText = document.getElementById(categoria.concat(celId)).innerText;
  var descText = document.getElementById(descricao.concat(celId)).innerText;
  var newCat = document.createElement("textarea");
  var newDesc = document.createElement("textarea");
  newCat.innerText = catText;
  newDesc.innerText = descText;

  document.getElementById(categoria.concat(celId)).innerText = "";
  document.getElementById(descricao.concat(celId)).innerText = "";

  document.getElementById(categoria.concat(celId)).append(newCat);
  document.getElementById(descricao.concat(celId)).append(newDesc);

  console.log(celId);
}
