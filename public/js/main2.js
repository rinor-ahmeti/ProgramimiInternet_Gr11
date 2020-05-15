//https://thevirustracker.com/free-api?global=stats
async function getCorona() {
  const rez = await (await fetch('https://api.covid19api.com/summary')).json();
  document.getElementById('totalConfirmed').textContent = (rez.Global.TotalConfirmed);
  document.getElementById('deadConfirmed').textContent = (rez.Global.TotalDeaths);
  document.getElementById('recv').textContent = (rez.Global.TotalRecovered);

}
 if(window.location.href.match('about'))
getCorona();

async function showCustomer(str) {
const rez = await (await fetch('http://localhost:8080/shareposts/pages/ajax/'+str)).text();

var parser = new DOMParser();

var doc = parser.parseFromString(rez, "text/html");

console.log(doc);
document.getElementById('txtHint').innerHTML=doc.body.innerHTML;

}


