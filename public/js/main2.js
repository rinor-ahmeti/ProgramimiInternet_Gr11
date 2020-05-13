//https://thevirustracker.com/free-api?global=stats
async function getCorona() {
  const rez = await (await fetch('https://api.covid19api.com/summary')).json();
  document.getElementById('totalConfirmed').textContent = (rez.Global.TotalConfirmed);
  document.getElementById('deadConfirmed').textContent = (rez.Global.TotalDeaths);
  document.getElementById('recv').textContent = (rez.Global.TotalRecovered);

}
getCorona();


function showCustomer(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  if(!(str instanceof String))
  return;
  xhttp.open("GET", "http://localhost:8080/shareposts/pages/details" + str, true);
  xhttp.send();

}
