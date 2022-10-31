const searchInput = document.querySelector("#search")
const searchResult = document.querySelector(".table-results")

var haut = true 
let dataArray;

var results

async function getUsers(){

  const res = await fetch("http://localhost/big/test/api.php")

   results   = await res.json()
  dataArray = orderList_nomUP(results)
  createUserListUP(dataArray)
}

getUsers()

function orderList_nomUP(data) {

  const orderedData = data.sort((a,b) => {
    if(a.nom.toLowerCase() < b.nom.toLowerCase()) {
      return -1;
    }
    if(a.nom.toLowerCase() > b.nom.toLowerCase()) {
      return 1;
    }
    return 0;
  })
  
  return orderedData;
}


function createUserListUP(usersList) {
  console.log(usersList)

  usersList.forEach(user => {

    const listItem = document.createElement("div");
    listItem.setAttribute("class", "table-item");

    listItem.innerHTML = `
    <div class="container-img">
    <img src="${user.img}" alt="${user.img}">
    <a class="nom" href="./filter.php?nom=${user.nom}">${user.nom}</a>
    <span class = "text-white">${user.perso}</span>
    <span class ="text-white">${user.rarity}</span>
    </div>
    `
    searchResult.appendChild(listItem);
  })

}

searchInput.addEventListener("input", filterData)

function filterData(e) {

  searchResult.innerHTML = ""

  const searchedString = e.target.value.toLowerCase().replace(/\s/g, "");

  const filteredArr = dataArray.filter(el => 
    el.nom.toLowerCase().includes(searchedString) || 
    el.nom.toLowerCase().includes(searchedString) ||
    `${el.nom + el.nom}`.toLowerCase().replace(/\s/g, "").includes(searchedString) ||
    `${el.nom + el.nom}`.toLowerCase().replace(/\s/g, "").includes(searchedString)
    )
   
  createUserListUP(filteredArr)
}


function orderList_nomDown(data){
  const orderedData = data.sort((a,b) => {
    if(a.nom.toLowerCase() < b.nom.toLowerCase()) {
      return 1;
    }
    if(a.nom.toLowerCase() > b.nom.toLowerCase()) {
      return -1;
    }
    return 0;
  })
  
  return orderedData;
}



function orderList_rarity(data) {

  const orderedData = data.sort((a,b) => {
    if(a.rarity.toLowerCase() < b.rarity.toLowerCase()) {
      return -1;
    }
    if(a.rarity.toLowerCase() > b.rarity.toLowerCase()) {
      return 1;
    }
    return 0;
  })
  
  return orderedData;
}

function orderList_perso(data) {

  const orderedData = data.sort((a,b) => {
    if(a.perso.toLowerCase() < b.perso.toLowerCase()) {
      return -1;
    }
    if(a.perso.toLowerCase() > b.perso.toLowerCase()) {
      return 1;
    }
    return 0;
  })
  
  return orderedData;
}

var  Nom = () => {
  
  if( haut ){
    searchResult.innerHTML = ""
    var data = orderList_nomUP(results)
    createUserListUP(data)
    haut = false;
  }else{
    searchResult.innerHTML = ""
    var data = orderList_nomDown(results)
    createUserListUP(data)
    haut = true
  }
  
} 

var  rarity =() => {
 var data = oderlist_rarity(results)
  if( haut ){
    createUserListUP(data)
    haut = false;
  }else{
    
    haut = true
  } }

var perso =() =>{
  var data = oderlist_perso(results)
  if( haut ){
    createUserListUP(data)
    haut = false
  }else{
    
    haut = true
  }
}