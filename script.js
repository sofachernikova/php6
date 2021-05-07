var checkBox = document.getElementById('send');

checkBox.onchange = function(){
if (checkBox.checked){
    document.querySelector('.form-email').style.display = 'flex';
}
else {
    document.querySelector('.form-email').style.display = 'none';
}
} 
