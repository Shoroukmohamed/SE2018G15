function Check() {
  var anemia = document.getElementById("anemia").value;
  var suger = document.getElementById("suger").value;
  var pressure = document.getElementById("pressure").value;
  var weight = document.getElementById("weight").value;
  var week = document.getElementById("week").value;
  if (anemia == "" | suger == "" | pressure == "" | weight == "" | week == "")
      {
        alert("please fill the test");
        return false; }
      else{
        var result_anemia , result_suger, result_pressure ;
  if(Number(anemia)> 9 & Number(anemia)<11){
     result_anemia = "your anemia analysis is perfect";}
  else {
     result_anemia = "we suggest you see the Doctor";}
  document.getElementById('anemia-output').innerHTML = result_anemia;
  if(Number(suger)> 80 & Number(suger)<120){
     result_suger = "your suger analysis is perfect";}
  else {
     result_suger = "we suggest you see the Doctor";}
  document.getElementById('suger-output').innerHTML = result_suger;
 if(pressure == "90/120"){
    result_pressure = "your pressure is perfect";  }
  else {
    result_pressure = "we suggest you see the Doctor";}
  document.getElementById('pressure-output').innerHTML = result_pressure;
}
}
