const searchInput = document.querySelector("#search");
const searchResult = document.querySelector(".table-results");

var haut = false;
let dataArray;
var filteredArr;
var results;
var id2;

async function getUsers() {
  const res = await fetch("http://localhost/big/test/api.php");

  results = await res.json();
  dataArray = orderList_nom(results);
  createUserListUP(dataArray);
}

getUsers();
function orderList_nom(data) {
  const orderedData = data.sort((a, b) => {
    if (a.nom.toLowerCase() < b.nom.toLowerCase()) {
      return -1;
    }
    if (a.nom.toLowerCase() > b.nom.toLowerCase()) {
      return 1;
    }
    return 0;
  });

  return orderedData;
}

function orderList_nomUP(data, id) {
  console.log("order");
  const orderedData = data.sort((a, b) => {
    if (a[id].toLowerCase() < b[id].toLowerCase()) {
      return -1;
    }
    if (a[id].toLowerCase() > b[id].toLowerCase()) {
      return 1;
    }
    return 0;
  });

  return orderedData;
}

function orderList_numberUP(data, id) {
  const orderedData = data.sort((a, b) => {
    return a[id] - b[id];
  });

  return orderedData;
}

function orderList_numberDOWN(data, id) {
  const orderedData = data.sort((a, b) => {
    return b[id] - a[id];
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
      "table-item d-flex border border-black  justify-content-center flex-wrap rounded"
    );
    listItem.setAttribute(
      "style",
      `background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url('${user.img}') center ; background-size:contain; `
    );
    if (user.price_moyen_buy >= 1000){
      user.price_moyen_buy = Math.floor(user.price_moyen_buy/1000) + 'K';
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
    <div class=" d-flex flex-grow-1 justify-content-center " >
    <table class="text-center">
        <tbody>
          <tr class="bordero" class ="text-center">
            <td colspan="2" class=" p-1 m-2 text-white rounded  "rowspan="3">Info</td>
            <td style="width: 66.4%!important" class=" text-center" colspan="4"> <a class="nom me-1" href="./index2.php?nom=${user.nom}">${user.nom}</a></td>
          </tr>
          <tr class="bordero" class="bordero">
            <td colspan="2" class=""> <span class = "perso text-white m-1 me-1">${user.perso}</span>
            </td>
            <td colspan="2" class=""><span class ="rarity text-white m-1 me-1">${user.rarity}</span>
            </td>
          </tr>
          <tr class="bordero"> 
          <td colspan="2" class=""> <span class = "text-white m-1 me-1">BUY</span>
          </td>
          <td colspan="2" class=""><span class =" text-white m-1 me-1">RENT</span>
          </td>
          <tr class="bordero">
            <td colspan="2" class="text-center  p-1 m-2 text-white rounded   ">Price</td>
            <td class=""> <span class ="price_moyen_buy text-white m-1 p-1 me-1">${user.price_moyen_buy}</span>
            </td>
            <td class="${success[0]}"> <span class ="diff_price_moyen_buy text-white rounded-pill me-1  m-1 p-1"> ${user.diff_price_moyen_buy} </span>
            </td>
            <td class=""><span class ="text-white price_moyen_rent m-1 p-1 me-1">${user.price_moyen_rent}</span>
            </td>
            <td class="${success[1]}"><span class ="text-white diff_price_moyen_rent rounded-pill me-1  m-1 p-1"> ${user.diff_price_moyen_rent} </span>
            </td>
          </tr>
          <tr class="bordero">
            <td style="width: 33.2%!important" colspan="2" class="text-center p-1 m-2 text-white rounded   ">Stock</td>
            <td style="width: 16.6%!important" colspan="1"><span class ="text-white m-1 p-1 me-1">${user.stock_buy}</span>
            </td>
            <td class="${success[2]}"style="width: 16.6%!important" colspan="1">  <span class ="text-white rounded-pill me-1  m-1 p-1"> ${user.diff_stock_buy} </span>
            </td>
            <td style="width: 16.6%!important" colspan="1"> <span class ="text-white m-1 p-1 me-1">${user.stock_rent}</span>
            </td> 
            <td class="${success[3]} text-center" style="width: 16.6%!important" colspan="1"><span class ="text-white text-center  rounded-pill me-1  m-1 p-1"> ${user.diff_stock_rent} </span>
    
            </td>
          </tr>
        </tbody>
      </table>
    
    </div>
    `;
    searchResult.appendChild(listItem);
  });
}

searchInput.addEventListener("input", filterData);

var regExp = /[a-zA-Z]/g



function filterData(e,id) {
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
  console.log(filteredArr)
  createUserListUP(filteredArr);
}

function orderList_nomDown(data, id) {
  const orderedData = data.sort((a, b) => {
    if (a[id].toLowerCase() < b[id].toLowerCase()) {
      return 1;
    }
    if (a[id].toLowerCase() > b[id].toLowerCase()) {
      return -1;
    }
    return 0;
  });

  return orderedData;
}

var Nom = (id) => {
  var vide = document.getElementById("search").value;
  if (id == "nom" || id == "rarity" || id == "perso") {
    if (haut) {
      
      if (regExp.test(vide)) {
        searchResult.innerHTML = "";
        console.log(filteredArr)
        var data = orderList_nomUP(filteredArr, id);
        console.log(filteredArr)
        createUserListUP(data);
      } else {
        var data = orderList_nomUP(results, id);
        
        createUserListUP(data);
      }
      haut = false;
    } else {
      if (regExp.test(vide)) {
        searchResult.innerHTML = "";
        var data = orderList_nomDown(filteredArr, id);
        createUserListUP(data);
      } else {
        var data = orderList_nomDown(results, id);
        
        createUserListUP(data);
      }

      haut = true;
    }
  } else {
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
  }
};
