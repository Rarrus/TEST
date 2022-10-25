function checkPass()
{
var champA = document.getElementById("P1").value;
var champB = document.getElementById("P2").value;
 
if(champA == champB)
{
document.form.submit();
}
else
{
alert("Error");
}
}