var x =true;
function showSearch(){
    var  iconlogin=document.querySelector('.icon-login');
    var showSearch=document.querySelector('.header__notify');
    if(x){
        showSearch.style="display:block";
        return x=false;
    }
    else{
        showSearch.style.display="none";
        return x=true;
    }
}