var data = '{"id":["1","2","3","4","5","6","7","8","9"],' +
  '"nazwa":["Chleb zwykły","Bułka","Bagietka","Prycel","Kleks","Pączek","Chrust","Gracamka","Chleb razowy"],' +
  '"netto":["4.5","2.5","3.00","2.75","1.75","2.5","4.5","3.75","7.25"],' +
  '"vat":["1.0","0.25","1.25","0.75","0.95","1.24","1.55","0.12","0.36"],' +
  '"brutto":["5.50","2.75","4.25","3.50","2.70","3.74","6.05","3.87","7.61"]' +
  '}';


function tableRun() {
  var t = JSON.parse(data);
  var table = document.getElementById('table');
  var tbody = table.getElementsByTagName("tbody")[0];
  for (i = 0; i < t.id.length; i++) {
    var tr = document.createElement("tr");
    tbody.appendChild(tr);
    var id = document.createElement("td");
    tr.appendChild(id);
    id.innerHTML = t.id[i];
    var nazwa = document.createElement("td");
    tr.appendChild(nazwa);
    nazwa.innerHTML = t.nazwa[i];
    var netto = document.createElement("td");
    tr.appendChild(netto);
    netto.innerHTML = t.netto[i];
    var vat = document.createElement("td");
    tr.appendChild(vat);
    vat.innerHTML = t.vat[i];
    var brutto = document.createElement("td");
    tr.appendChild(brutto);
    brutto.innerHTML = t.brutto[i];
  }
  sum();
  average();
}

function search() {

  // Declare variables
  var input, filter, table, tbody, tr, i, t,
    txtId, txtNazwa, txtNetto, txtVat, txtBrutto;
  t = JSON.parse(data);
  input = document.getElementById("input");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tbody = table.getElementsByTagName("tbody")[0];
  tr = tbody.getElementsByTagName("tr");
  for (var x = tr.length - 1; x >= 0; x--) {
    tbody.removeChild(tr[x]);
  }
  for (i = 0; i < t.id.length; i++) {
    txtId = t.id[i];
    txtNazwa = t.nazwa[i];
    txtNetto = t.netto[i];
    txtVat = t.vat[i];
    txtBrutto = t.brutto[i];
    if (txtId.toUpperCase().indexOf(filter) > -1 ||
      txtNazwa.toUpperCase().indexOf(filter) > -1 ||
      txtNetto.toUpperCase().indexOf(filter) > -1 ||
      txtVat.toUpperCase().indexOf(filter) > -1 ||
      txtBrutto.toUpperCase().indexOf(filter) > -1) {
      tr = document.createElement("tr");
      tbody.appendChild(tr);
      var id = document.createElement("td");
      tr.appendChild(id);
      id.innerHTML = t.id[i];
      var nazwa = document.createElement("td");
      tr.appendChild(nazwa);
      nazwa.innerHTML = t.nazwa[i];
      var netto = document.createElement("td");
      tr.appendChild(netto);
      netto.innerHTML = t.netto[i];
      var vat = document.createElement("td");
      tr.appendChild(vat);
      vat.innerHTML = t.vat[i];
      var brutto = document.createElement("td");
      tr.appendChild(brutto);
      brutto.innerHTML = t.brutto[i];
    }
  }
  sum();
  average();
}
function sum() {
  var table, tfoot, tbody, trF, td, i,
    valNetto = 0,
    valVat = 0,
    valBrutto = 0;
  table = document.getElementById('table');
  tfoot = table.getElementsByTagName("tfoot")[0];
  tbody = table.getElementsByTagName("tbody")[0];
  tr = tbody.getElementsByTagName("tr");
  trF = tfoot.getElementsByTagName("tr");
  //wyliczenie sumy
  for (i = 0; i < tr.length; i++) {
    valNetto += Number(tr[i].getElementsByTagName('td')[2].innerText)
    valVat += Number(tr[i].getElementsByTagName('td')[3].innerText)
    valBrutto += Number(tr[i].getElementsByTagName('td')[4].innerText)
  }

  td = trF[1].getElementsByTagName('td')[1];
  td.innerHTML = "<b><i>" + valNetto.toFixed(2) + "</i></b>";
  td = trF[1].getElementsByTagName('td')[2];
  td.innerHTML = "<b><i>" + valVat.toFixed(2) + "</i></b>";
  td = trF[1].getElementsByTagName('td')[3];
  td.innerHTML = "<b><i>" + valBrutto.toFixed(2) + "</i></b>";


}
function average() {
  var table, tfoot, tbody, trF, td, i,
    valNetto = 0,
    valVat = 0,
    valBrutto = 0;
  table = document.getElementById('table');
  tfoot = table.getElementsByTagName("tfoot")[0];
  tbody = table.getElementsByTagName("tbody")[0];
  tr = tbody.getElementsByTagName("tr");
  trF = tfoot.getElementsByTagName("tr");
  //wyliczenie sredniej
  for (i = 0; i < tr.length; i++) {
    valNetto += Number(tr[i].getElementsByTagName('td')[2].innerText)
    valVat += Number(tr[i].getElementsByTagName('td')[3].innerText)
    valBrutto += Number(tr[i].getElementsByTagName('td')[4].innerText)
  }
  valNetto = valNetto / i;
  valVat = valVat / i;
  valBrutto = valBrutto / i;

  td = trF[0].getElementsByTagName('td')[1];
  td.innerHTML = !isNaN(valNetto)?valNetto.toFixed(2):"0.00";
  td = trF[0].getElementsByTagName('td')[2];
  td.innerHTML = !isNaN(valVat)?valVat.toFixed(2):"0.00";
  td = trF[0].getElementsByTagName('td')[3];
  td.innerHTML = !isNaN(valBrutto)?valBrutto.toFixed(2):"0.00";

}
function sortTableUp(id) {
  var table, rows, switching, i, x, y, shouldSwitch, tbody;
  table = document.getElementById("table");
  tbody = table.getElementsByTagName('tbody')[0];
  switching = true;

  while (switching) {

    switching = false;
    rows = tbody.rows;

    for (i = 0; i < (rows.length - 1); i++) {

      shouldSwitch = false;

      x = rows[i].getElementsByTagName("td")[id];
      y = rows[i + 1].getElementsByTagName("td")[id];

      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {

        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {

      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
function sortTableDown(id) {
  var table, rows, switching, i, x, y, shouldSwitch, tbody;
  table = document.getElementById("table");
  tbody = table.getElementsByTagName('tbody')[0];
  switching = true;

  while (switching) {

    switching = false;
    rows = tbody.rows;

    for (i = 0; i < (rows.length - 1); i++) {

      shouldSwitch = false;

      x = rows[i].getElementsByTagName("td")[id];
      y = rows[i + 1].getElementsByTagName("td")[id];

      if (y.innerHTML.toLowerCase() > x.innerHTML.toLowerCase()) {

        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {

      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

tableRun();