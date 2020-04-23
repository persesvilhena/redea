function CarregaDadosJanela(iduser, ua) {
      var elmnt = document.getElementById("pfdialog");
      lnm = parseInt(document.documentElement.clientWidth /2);
      anm = parseInt(document.documentElement.clientHeight /2);
      ljm = parseInt(320);
      ajm = parseInt(50);
      x = parseInt(lnm - ljm);
      y = parseInt(anm - ajm - 80);
      document.getElementById('pfdialog').style.top = y;
      document.getElementById('pfdialog').style.left = x;
detailDiv1 = document.getElementById("conteudobox");
detailDiv1.innerHTML = "<center><img src=\"engine/imgs/loader.gif\"></center>";
PegarDetalhesJanela(iduser, ua);
}

function PegarDetalhesJanela(iduser, ua) {
  request = createRequest();
  if (request == null) {
    alert("Unable to create request");
    return;
  }
  var url= "engine/getDetails.php?id=" + escape(iduser) + "&ua=" + escape(ua);
  request.open("GET", url, true);
  request.onreadystatechange = displayDetails;
  request.send(null);
}

function displayDetails() {
  if (request.readyState == 4) {
    if (request.status == 200) {
      detailDiv = document.getElementById("conteudobox");
      detailDiv.innerHTML = request.responseText;
      var elmnt = document.getElementById("pfdialog");
      var de = document.documentElement;
      var w = window.innerWidth || self.innerWidth || (de&&de.clientWidth) || document.body.clientWidth;
      var h = window.innerHeight || self.innerHeight || (de&&de.clientHeight) || document.body.clientHeight
      lnm = parseInt(w /2);
      anm = parseInt(h /2);
      ljm = parseInt(elmnt.offsetWidth /2);
      ajm = parseInt(elmnt.offsetHeight /2);
      x = parseInt(lnm - ljm);
      y = parseInt(anm - ajm);
      document.getElementById('pfdialog').style.top = y;
      document.getElementById('pfdialog').style.left = x;
    }
  }
}








function BtnLike(tip, id, like) {
  request2 = createRequest();
  if (request2 == null) {
    alert("Unable to create request");
    return;
  }
  var url2= "engine/eng_like.php?tip=" + escape(tip) + "&id=" + escape(id) + "&like=" + escape(like);
  if(like == 1){
    vlobj = escape(tip) + escape(id) + "1";
    nvlobj = escape(tip) + escape(id) + "0";
  }else{
    vlobj = escape(tip) + escape(id) + "0";
    nvlobj = escape(tip) + escape(id) + "1";
  }
  request2.open("GET", url2, true);
  request2.onreadystatechange = displayDetails2;
  request2.send(null);
}

function displayDetails2() {
  if (request2.readyState == 4) {
    if (request2.status == 200) {
      document.getElementById(vlobj).className = 'selected';
      document.getElementById(nvlobj).className = 'classe4';
    }
  }
}