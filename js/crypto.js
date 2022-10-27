const res1 = fetch('https://api.coingecko.com/api/v3/simple/price?ids=tap-fantasy&vs_currencies=usd');
console.log(res1.text);
const res2 = fetch('https://api.coingecko.com/api/v3/simple/price?ids=busd&vs_currencies=usd');
console.log(res2);
const res3 = fetch('https://api.coingecko.com/api/v3/simple/price?ids=tap-fantasy-mc&vs_currencies=usd');
console.log(res3);
const res4 = fetch('https://api.coingecko.com/api/v3/simple/price?ids=binancecoin&vs_currencies=usd');
console.log(res4);
const res5 = fetch('https://api.coingecko.com/api/v3/simple/price?ids=solana&vs_currencies=usd');
console.log(res5);





