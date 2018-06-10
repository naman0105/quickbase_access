function sortTable(number) {
    var table, rows, switching, i, x, y, shouldSwitch;
    if(number == 1){
        table = document.getElementById("projectsTable");
    } else if(number == 2){
        table = document.getElementById("achievmentsTable");
    }
    switching = true;

    while (switching) {
      switching = false;
      rows = table.getElementsByTagName("tr");
      for (i = 2; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("td")[1];
        y = rows[i + 1].getElementsByTagName("td")[1];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }



  function myFunction(number) {
    var input, filter, table, tr, td, i;
    if(number == 1){
        input = document.getElementById("projectsSearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("projectsTable");
    }else {
        input = document.getElementById("AchievSearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("achievmentsTable");
    }
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }