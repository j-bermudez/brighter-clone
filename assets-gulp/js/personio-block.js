/**
 * Personio block functionalitu
 *
 * This shows the job positions from personio
 */
( function() {
function putContent() {
    //for every job opening
    for (i = 0; i < posAry.length; i++) {
      //console.log(i);
      //create text nodes for text 
      var name, dep, loc, type, id;
      name = document.createTextNode(posAry[i].name);
      dep = document.createTextNode(posAry[i].dep);
      loc = document.createTextNode(posAry[i].loc);
      type = document.createTextNode(posAry[i].type);
      var position = document.createElement("div");
      var poslink = document.createElement("a");
      poslink.href = posAry[i].getLink();
      poslink.target = "_blank";
      position.appendChild(poslink);
      position.classList.add("j-bai-position");
      var namediv = document.createElement("div");
      namediv.classList.add("j-bai-name");
      namediv.appendChild(name);
      var depdiv = document.createElement("div");
      depdiv.classList.add("j-bai-dep");
      depdiv.appendChild(dep);
      var locdiv = document.createElement("div");
      locdiv.classList.add("j-bai-loc");
      locdiv.appendChild(loc);
      var typediv = document.createElement("div");
      typediv.classList.add("j-bai-type");
      typediv.appendChild(type);
      poslink.appendChild(namediv);
      poslink.appendChild(depdiv);
      poslink.appendChild(locdiv);
      poslink.appendChild(typediv);
      document.getElementById("positions").appendChild(position);
    }
  }

	
} )();
