function editBtn(btn) {
  var tabela, elements, categoria, descricao;

  elements = btn.parentElement.parentElement.parentElement.getElementsByTagName("td");
 

  categoria = elements[0].innerText;
  descricao = elements[1].innerText;
  console.log(elements[1].innerText);
  

  document.getElementById("nomeCategoria").innerHTML = categoria;
  document.getElementById("descricaoCategoria").innerHTML = descricao;
  

  
}

M.AutoInit();

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.modal');
  var instances = M.Modal.init(elems, options);
});
