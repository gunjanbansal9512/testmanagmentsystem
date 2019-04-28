$(function () {
    $(".btnSubmit").click(function () {
        var password = $("#new").val();
        var confirmPassword = $("#cnew").val();
        if (password != confirmPassword) {
            alert("Password and Confirm Password do not match.");
            return false;
        }
        return true;
    });
  });
function validate()
{

  var a1=parseInt(document.getElementById('1a').value);
var b1=parseInt(document.getElementById('1b').value);
var c1=parseInt(document.getElementById('1c').value);
var a2=parseInt(document.getElementById('2a').value);
var b2=parseInt(document.getElementById('2b').value);
var c2=parseInt(document.getElementById('2c').value);
var a3=parseInt(document.getElementById('3a').value);
var b3=parseInt(document.getElementById('3b').value);
var c3=parseInt(document.getElementById('3c').value);
var a4=parseInt(document.getElementById('4a').value);
var b4=parseInt(document.getElementById('4b').value);
var c4=parseInt(document.getElementById('4c').value);
var sum=0;
if((a1+b1+c1)>(a2+b2+c2))
{
sum=a1+b1+c1;
}
else {
  sum=a2+b2+c2;
}

if((a3+b3+c3)>(a4+b4+c4))
{
sum+=a3+b3+c3;
}
else {
  sum+=a4+b4+c4;
}
if(sum>40)
{
  alert("Marks can not be greater then 40");
  return false;
}
else {
if (sum<20) {
var cond=confirm("Total is less then 20 are you sure??");
return cond;
} else {
return true;
}
}
}

function checkIsNotEmpty(val){
  if(val ===undefined || val===0){
    return true;
  }
  return false;
}
function validate2()
{
  console.log("submit");
  var sem=parseInt(document.getElementById('sem').value);
  var sub=document.getElementById('sub').value;
  var ia=document.getElementById('ia').value;
  console.log(`${sem} - ${sub} - ${ia}`);
if(checkIsNotEmpty(sem) || checkIsNotEmpty(sub) || checkIsNotEmpty(ia))
{
  return false;
}
return true;

}
