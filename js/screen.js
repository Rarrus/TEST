function validate() {
  var msg;
  var str = document.getElementById("P1").value;
  var str2 = document.getElementById("P2").value;
  if (str == str2) {
    if (
      str.match(/[0-9]/g) &&
      str.match(/[A-Z]/g) &&
      str.match(/[a-z]/g) &&
      str.match(/[^a-zA-Z\d]/g) &&
      str.length >= 10
    ) {
      document.location.href = "./inscription_traitement.php";
    }
  }
}

var check_mdp = () => {
  var str3 = document.getElementById("P1").value;
  var str4 = document.getElementById("P2").value;
  if (str3 != ''){
  if (
    str3.match(/[0-9]/g) &&
    str3.match(/[A-Z]/g) &&
    str3.match(/[a-z]/g) &&
    str3.match(/[^a-zA-Z\d]/g) &&
    str3.length >= 8
  ) {
    msg = " ";
  } else {
    msg = "<p style='color:red'>Mot de passe faible.</p>";
  }
  document.getElementById("msg").innerHTML = msg;
}else msg = " ";document.getElementById("msg").innerHTML = msg;

  if (str3 != ''){

  if (str3 == str4 && str3 != '' ) {
    document.getElementById("P1").className =
      "text-center  mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient bg-success";
    document.getElementById("P2").className =
      "text-center  mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient bg-success";
  } else {
    document.getElementById("P1").className =
      "text-center  mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient bg-danger";
    document.getElementById("P2").className =
      "text-center  mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient bg-danger";
  }}else{
    document.getElementById("P1").className =
      "text-center  mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient";
    document.getElementById("P2").className =
      "text-center  mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient";
  

  }
};

var check_mail = () => {
  var str3 = document.getElementById("M1").value;
  if (
    str3.match(
      /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    )
  ) {
    document.getElementById("M1").className =
      "text-center  mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient bg-success";
  } else {
    document.getElementById("M1").className =
      "text-center  mt-2   text-bg-dark rounded border p-1 m-1 bg-gradient bg-danger";
  }
};


var  reveal =() => {
  var x = document.getElementById("P1");
  var y = document.getElementById("P2");
  if (x.type === "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
} 


async function crypto() {
    var response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=tap-fantasy&vs_currencies=usd');
    var data = await response.text();
    var data2 = data.replace('{"tap-fantasy":{"usd":','').replace('}}','');
    document.getElementById("TAP").innerHTML = " TAP/USD : " + data2 + " ";
    var response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=busd&vs_currencies=usd');
    var data = await response.text();
    var data2 = data.replace('{"busd":{"usd":','').replace('}}','');
    document.getElementById("BUSD").innerHTML = " BUSD/USD : " + data2 + " ";
    var response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=tap-fantasy-mc&vs_currencies=usd');
    var data = await response.text();
    var data2 = data.replace('{"tap-fantasy-mc":{"usd":','').replace('{"tap-fantasy-mc":{"usd":','').replace('}}','');
    document.getElementById("MC").innerHTML = " MC/USD : " + data2 + " ";
    var response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=binancecoin&vs_currencies=usd');
    var data = await response.text();
    var data2 = data.replace('{"binancecoin":{"usd":','').replace('}}','');
    document.getElementById("BNB").innerHTML = " BNB/USD : " + data2 + " ";
    var response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=solana&vs_currencies=usd');
    var data = await response.text();
    var data2 = data.replace('{"solana":{"usd":','').replace('}}','')
    document.getElementById("SOL").innerHTML = " SOL/USD : " + data2 + " ";
    setTimeout(crypto,60000);
}
 

  
