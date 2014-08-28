function hasClass(e, c) {
if (typeof e == "string") e = document.getElementById(e);
var classes = e.className;
if (!classes) return false;
if (classes == c) return true;
return e.className.search("\\b" + c + "\\b") != -1;
};
function affLnks(){
var theURL, theAnchorText, theTitle, theId;
var spans = document.getElementsByTagName('span');
for (var i = 0; i<spans.length; i++){
if (hasClass(spans[i], 'testing|affst')){
theAnchorText = spans[i].innerHTML;
theTitle = spans[i].title.toLowerCase().replace(/^\s+|\s+$/g,"");
theId = spans[i].id.replace(/^\s+|\s+$/g,"");
switch (theTitle) {
case 'tests': theURL = ''; break;
case 'tests2': theURL = 'http://www.45-year-old-millionaire.co.uk/tracking/track.php?id='; break;
case 'testing': theURL = 'http://www.45-year-old-millionaire.co.uk/tracking/track.php?id='; break;
case 'testing2': theURL = 'http://www.45-year-old-millionaire.co.uk/tracking/track.php?id='; break;
default: theURL = '/#';
}
spans[i].innerHTML = '<a target="_blank" href="' + theURL + '' + theId + '" class="' + spans[i].className + '">' + theAnchorText + '</a>';
spans[i].removeAttribute('title');
}
}
}
window.onload = function(){
affLnks();
}