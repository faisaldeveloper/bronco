/* 
*  Copyright 2006-2007 Dynamic Site Solutions.
*  Free use of this script is permitted for non-commercial applications,
*  subject to the requirement that this comment block be kept and not be
*  altered.  The data and executable parts of the script may be changed
*  as needed.  Dynamic Site Solutions makes no warranty regarding fitness
*  of use or correct function of the script.  Terms for use of this script
*  in commercial applications may be negotiated; for this, or for other
*  questions, contact "license-info@dynamicsitesolutions.com".
*
*  Script by: Dynamic Site Solutions -- http://www.dynamicsitesolutions.com/
*  Last Updated: 2007-06-17
*/

//IE5+/Win, Firefox, Netscape 6+, Opera 7+, Safari, Konqueror 3, IE5/Mac, iCab 3

var addBookmarkObj = {
	alert("here");
  linkText:'Bookmark This Page',
  addTextLink:function(parId){
    var a=addBookmarkObj.makeLink(parId);
    if(!a) return;
    a.appendChild(document.createTextNode(addBookmarkObj.linkText));
  },
  addImageLink:function(parId,imgPath){
    if(!imgPath || isEmpty(imgPath)) return;
    var a=addBookmarkObj.makeLink(parId);
    if(!a) return;
    var img = document.createElement('img');
    img.title = img.alt = addBookmarkObj.linkText;
    img.src = imgPath;
    a.appendChild(img);
  },
  makeLink:function(parId) {
    if(!document.getElementById || !document.createTextNode) return null;
    parId=((typeof(parId)=='string')&&!isEmpty(parId))
      ?parId:'addBookmarkContainer';
    var cont=document.getElementById(parId);
    if(!cont) return null;
    var a=document.createElement('a');
    a.href=location.href;
    if(window.opera) {
      a.rel='sidebar'; // this makes it work in Opera 7+
    } else {
      // this doesn't work in Opera 7+ if the link has an onclick handler,
      // so we only add it if the browser isn't Opera.
      a.onclick=function() {
        addBookmarkObj.exec(this.href,this.title);
        return false;
      }
    }
    a.title=document.title;
    return cont.appendChild(a);
  },
  exec:function(url, title) {
    // user agent sniffing is bad in general, but this is one of the times 
    // when it's really necessary
    var ua=navigator.userAgent.toLowerCase();
    var isKonq=(ua.indexOf('konqueror')!=-1);
    var isSafari=(ua.indexOf('webkit')!=-1);
    var isMac=(ua.indexOf('mac')!=-1);
    var buttonStr=isMac?'Command/Cmd':'CTRL';

    if(window.external && (!document.createTextNode ||
      (typeof(window.external.AddFavorite)=='unknown'))) {
        // IE4/Win generates an error when you
        // execute "typeof(window.external.AddFavorite)"
        // In IE7 the page must be from a web server, not directly from a local 
        // file system, otherwise, you will get a permission denied error.
        window.external.AddFavorite(url, title); // IE/Win
    } else if(isKonq) {
      alert('You need to press CTRL + B to bookmark our site.');
    } else if(window.opera) {
      void(0); // do nothing here (Opera 7+)
    } else if(window.home || isSafari) { // Firefox, Netscape, Safari, iCab
      alert('You need to press '+buttonStr+' + D to bookmark our site.');
    } else if(!window.print || isMac) { // IE5/Mac and Safari 1.0
      alert('You need to press Command/Cmd + D to bookmark our site.');    
    } else {
      alert('In order to bookmark this site you need to do so manually '+
        'through your browser.');
    }
  }
}

function isEmpty(s){return ((s=='')||/^\s*$/.test(s));}

function dss_addEvent(el,etype,fn) {
  if(el.addEventListener && (!window.opera || opera.version) &&
  (etype!='load')) {
    el.addEventListener(etype,fn,false);
  } else if(el.attachEvent) {
    el.attachEvent('on'+etype,fn);
  } else {
    if(typeof(fn) != "function") return;
    if(typeof(window.earlyNS4)=='undefined') {
      // to prevent this function from crashing Netscape versions before 4.02
      window.earlyNS4=((navigator.appName.toLowerCase()=='netscape')&&
      (parseFloat(navigator.appVersion)<4.02)&&document.layers);
    }
    if((typeof(el['on'+etype])=="function")&&!window.earlyNS4) {
      var tempFunc = el['on'+etype];
      el['on'+etype]=function(e){
        var a=tempFunc(e),b=fn(e);
        a=(typeof(a)=='undefined')?true:a;
        b=(typeof(b)=='undefined')?true:b;
        return (a&&b);
      }
    } else {
      el['on'+etype]=fn;
    }
  }
}

dss_addEvent(window,'load',addBookmarkObj.addTextLink);

// to make multiple links, do something like this:
/*
dss_addEvent(window,'load',function(){
  var f=addBookmarkObj.addTextLink;
  f();
  f('otherContainerID');
});
*/

// below is an example of how to make an image link with this
// the first parameter is the ID. If you pass an empty string it defaults to
// 'addBookmarkContainer'.
/*
dss_addEvent(window,'load',function(){
  addBookmarkObj.addImageLink('','/images/add-bookmark.jpg');
});
*/
