/**
 * Personio block functionalitu
 *
 * This shows the job positions from personio
 */
( function() {
//link to request open positions 
const xmlBase = "https://brighter-ai-jobs.personio.de/xml?language=en"; 
//base for career page; just add job id after for direct link
const jobBase = "https://brighter-ai-jobs.personio.de/job/";
//https://brighter-ai-jobs.personio.de/
//global arrays for position information 
//vice president of sales and business 
var posAry = [];
//class for positions 
class openPosition {
  constructor(name, dep, loc, type, id){
    this.name = name;
    this.dep = dep;
    this.loc = loc;
    this.type = type; 
    this.id = id; 
  }
  getLink(){
    var link = jobBase.concat(this.id); 
    return link;
  }
}
//create an instance for xml requests 
const xdata = new XMLHttpRequest();  
//function when state is changed 
xdata.onreadystatechange = function() {
  //xml status codes, dont worry 
  if ((this.readyState == 4) && (this.status == 200)) {
    //check response data 
    const inst = this.responseXML;
    //get number of returned positions 
    var posNum = inst.getElementsByTagName("position").length;
    //loop positions to init each 
    for(i = 0; i < posNum; i++){
      thisPos = inst.getElementsByTagName("position")[i];
      let temp = new openPosition(
        thisPos.getElementsByTagName("name")[0].textContent, 
        thisPos.getElementsByTagName("recruitingCategory")[0].textContent, 
        thisPos.getElementsByTagName("office")[0].textContent, 
        thisPos.getElementsByTagName("employmentType")[0].textContent, 
        thisPos.getElementsByTagName("id")[0].textContent
      );
      posAry.push(temp);
    }
    putContent();
  }
}
//add get request 
xdata.open("GET", xmlBase, true); 
//only send request on company page load 
if(window.location.pathname.includes('company') || window.location.pathname.includes('unternehmen')){
  xdata.send();
}
//build a post for every xml post
function putContent(){
  //for every job opening
  for(i = 0; i < posAry.length; i ++){
    //create text nodes for text 
    var name, dep, loc, type, id;
    name = document.createTextNode(posAry[i].name);
    dep = document.createTextNode(posAry[i].dep);
    loc = document.createTextNode(posAry[i].loc);
    type = document.createTextNode(posAry[i].type);
    var position = document.createElement("div");
    var poslink = document.createElement("a");
    poslink.href = posAry[i].getLink();
    poslink.target = "_blank";
    position.appendChild(poslink);
    position.classList.add("j-bai-position");
    var namediv = document.createElement("div");
    namediv.classList.add("j-bai-name");
    namediv.appendChild(name);
    var depdiv = document.createElement("div");
    depdiv.classList.add("j-bai-dep");
    depdiv.appendChild(dep);
    var locdiv = document.createElement("div");
    locdiv.classList.add("j-bai-loc");
    locdiv.appendChild(loc);
    var typediv = document.createElement("div");
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
