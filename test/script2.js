const searchInput = document.querySelector("#search");
const searchResult = document.querySelector(".table-results");

var haut = false;
let dataArray;
var filteredArr;
var results;
var id2;
var res;


var buy_rent = async function (nom) {
  res = await fetch(`http://localhost/big/test/api2.php?nom=${nom}`);
  results = await res.json();
  document.querySelector("main").setAttribute('style',`background:linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url("${results.preview}") center no-repeat;`)
  dataArray = orderList_numberUP(results.data, 1);
  createUserListUP(dataArray);
};

function orderList_numberUP(data, ordre) {
  console.log(data)
  const orderedData = data.sort((a, b) => {
    return a.nom.split("§")[ordre] - b.nom.split("§")[ordre];
  });
  console.log(orderedData)
  return orderedData;
}

function orderList_numberDOWN(data, ordre) {
  const orderedData = data.sort((a, b) => {
    return a.nom.split("§")[ordre] - b.nom.split("§")[ordre];
  });

  return orderedData;
}

function createUserListUP(usersList) {
  searchResult.innerHTML = "";
  usersList.forEach((user) => {
    var success = [];

    const listItem = document.createElement("div");
    listItem.setAttribute(
      "class",
      "table-item d-flex rounded"
    );
    if (user.price_moyen_buy >= 1000){
      user.price_moyen_buy = user.price_moyen_buy.html(Math.floor(data.followers_count/1000) + 'K');
    }
    if (user.diff_price_moyen_buy > 0) {
      success[0] = "bg-success";
    } else {
      success[0] = "bg-danger";
    }
    if (user.diff_price_moyen_rent > 0) {
      success[1] = "bg-success";
    } else {
      success[1] = "bg-danger";
    }
    if (user.diff_stock_buy > 0) {
      success[2] = "bg-success";
    } else {
      success[2] = "bg-danger";
    }
    if (user.diff_stock_rent > 0) {
      success[3] = "bg-success";
    } else {
      success[3] = "bg-danger";
    }
    listItem.innerHTML = `
    
         
    `;
    searchResult.appendChild(listItem);
  });
}

var regExp = /[a-zA-Z]/g;

function filterData(e, id) {
  searchResult.innerHTML = "";

  const searchedString = e.target.value.toLowerCase().replace(/\s/g, "");

  filteredArr = dataArray.filter(
    (el) =>
      el.nom.toLowerCase().includes(searchedString) ||
      el.nom.toLowerCase().includes(searchedString) ||
      `${el.nom + el.nom}`
        .toLowerCase()
        .replace(/\s/g, "")
        .includes(searchedString) ||
      `${el.nom + el.nom}`
        .toLowerCase()
        .replace(/\s/g, "")
        .includes(searchedString)
  );
  console.log(filteredArr);
  createUserListUP(filteredArr);
}

var Nom = (id) => {
  var vide = document.getElementById("search").value;

  if (haut) {
    if (regExp.test(vide)) {
      searchResult.innerHTML = "";
      var data = orderList_numberUP(filteredArr, id);
      createUserListUP(data);
    } else {
      var data = orderList_numberUP(results, id);
      createUserListUP(data);
    }
    haut = false;
  } else {
    if (regExp.test(vide)) {
      searchResult.innerHTML = "";
      var data = orderList_numberDOWN(filteredArr, id);
      createUserListUP(data);
    } else {
      var data = orderList_numberDOWN(results, id);
      createUserListUP(data);
    }

    haut = true;
  }
};
