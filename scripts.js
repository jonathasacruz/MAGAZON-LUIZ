function editBtn(btn) {
  var tabela = document.getElementById("tabela");

  for (var i = 0, row; (row = tabela.rows[i]); i++) {
    //iterate through rows
    //rows would be accessed using the "row" variable assigned in the for loop
    for (var j = 0, col; (col = row.cells[j]); j++) {
      //iterate through columns
      //columns would be accessed using the "col" variable assigned in the for loop
      var elements = col.getElementsByTagName("i");
      console.log(elements[0], elements[1], elements[2]);
    }
  }
}
