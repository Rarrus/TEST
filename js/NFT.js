const mysql = require('mysql');
const db = mysql.createConnection({   host: "localhost",   user: "root",   password: "", database: "users" });


  
async function crypto() {
  var response = await fetch(
    "https://api.tapfantasy.io/web2/market/list/56/0/300000/?order=-o1&filter="
  );
  var data = await response.json();
  len = Object.keys(data.data.list).length;
  for (let pas = 0; pas < len; pas++) {
    nom = data.data.list[pas].name;
    prix = data.data.list[pas].price;
    level = data.data.list[pas].level;
    wind = data.data.list[pas].wind;
    water = data.data.list[pas].water;
    fire = data.data.list[pas].fire;
    earth = data.data.list[pas].earth;
    character = data.data.list[pas].character;
    rarity = data.data.list[pas].rarity;



  }
}

crypto();
