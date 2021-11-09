function link_zap(){
    location.href='https://api.whatsapp.com/send?phone=5513997191911';
}

var tel_zap = document.getElementsByClassName("zap")[0];
    tel_zap.addEventListener("click", link_zap);

var link_face = document.getElementsByClassName("dropdown-item")[0];
    link_face.setAttribute('href', 'https://facebook.com');
var link_twt = document.getElementsByClassName("dropdown-item")[1];
    link_twt.setAttribute('href', 'https://twitter.com');
var link_insta = document.getElementsByClassName("dropdown-item")[2];
    link_insta.setAttribute('href', 'https://instagram.com');


    var el = document.getElementsByClassName("contato_itens")[0];
    el.children[3].innerHTML = "<i class='fa fa-envelope'></i> anibal@masterradios.com.br";
    