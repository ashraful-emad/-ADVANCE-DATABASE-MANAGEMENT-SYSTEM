
function validatename(){
    var ptrn = /^([^0-9]*)$/;
    var name = document.getElementById("name");
    if(name.value ==""){
    document.getElementById("alert").innerHTML = "*Name can't be empty";
    
    }else if(!ptrn.test(document.regform.name.value)){
        document.getElementById("alert").innerHTML = "*Name can't have digit";

    } else if(name.value.length<2){
        document.getElementById("alert").innerHTML = "*Name can't have less than 2 two digits";

    }else if(name.value.length>20){
        document.getElementById("alert").innerHTML = "*Name can't be more than 20 two digits";

    }else{
        document.getElementById("alert").innerHTML = "";
       
    } 

} document.regform.name.addEventListener("keyup",validatename);


function validateemail(){
    var ptrn = /^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+[\.][a-zA-Z\d\._]+$/;
    var email = document.getElementById("email");
    if(email.value ==""){
    document.getElementById("alert1").innerHTML = "*Email can't empty";
    }else if(!ptrn.test(document.regform.email.value)){
    document.getElementById("alert1").innerHTML = "*Wrong email formation";
    }else{
    document.getElementById("alert1").innerHTML = "";
    
    } 

} document.regform.email.addEventListener("keyup",validateemail);


function validatepassword(){
    var ptrn = /^[A-Z]+[a-zA-Z\d]+[a-zA-Z\d@$#%&(()?]+$/;
    var password = document.getElementById("password");
    if(password.value ==""){
    document.getElementById("alert4").innerHTML = "*Password can't be empty";
    }else if(ptrn.test(document.regform.user_name.value)){
    document.getElementById("alert4").innerHTML = "*Wrong password formation";
    }else if(password.value.length<8){
    document.getElementById("alert4").innerHTML = "*Password can't have less than 4 two digits";
    }else if(password.value.length>32){
    document.getElementById("alert4").innerHTML = "*Password can't be more than 15 two digits";
    }else{
    document.getElementById("alert4").innerHTML = "";
    
    } 
} document.regform.password.addEventListener("keyup",validatepassword);


function validateconfirmpassword(){
var cpassword = document.getElementById("cpassword");
var password = document.getElementById("password").value;
var confirmpassword = document.getElementById("cpassword").value;
if(cpassword.value == ""){
    document.getElementById("alert5").innerHTML = "This field can't be empty";
}
else if(password !=confirmpassword){
    document.getElementById("alert5").innerHTML = "Password not matched";
}else{
    document.getElementById("alert5").innerHTML = "";
    
}
} document.regform.cpassword.addEventListener("keyup",validateconfirmpassword);


function validateForm() {
    let x = document.forms["regform"]["name"].value;
    let xx = document.forms["regform"]["email"].value;
    
    let x2 = document.forms["regform"]["password"].value;
    let x3= document.forms["regform"]["cpassword"].value;
    var ptrn = /^([^0-9]*)$/;
    var ptrn1 = /^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+[\.][a-zA-Z\d\._]+$/;
        if (x == ""){
        document.getElementById("alert").innerHTML = "*Name must be filled out";
        return false}
        else if(xx ==""){
            document.getElementById("alert1").innerHTML = "*Email can't be empty";
            return false;}
        else if(x1 == ""){
            document.getElementById("alert2").innerHTML = "*Username can't be empty";
            return false;}
        else if(x2 ==""){
            document.getElementById("alert4").innerHTML = "*Password must be filled out";
            return false;
        }
        else if(x3==""){
        document.getElementById("alert5").innerHTML = "*this field must be filled out";
        return false;
        }else if(!ptrn.test(document.regform.name.value)){
        document.getElementById("alert").innerHTML = "*Name can't have digit";
        return false;
        }else if(x.length<2){
            document.getElementById("alert").innerHTML = "*Name can't have less than 2 two digits";
            return false;
        }else if(!ptrn1.test(document.regform.email.value)){
            document.getElementById("alert1").innerHTML = "*Wrong email formation";
            return false;
        }else if (x2 != x3){
            document.getElementById("alert5").innerHTML = "Password didn't match";
            return false;
        }
    
   
  }




