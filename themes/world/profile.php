{if $profile == true}
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="ROBOTS" content="All" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="keywords" content="{$keywords}" />
<link href="{$sitepath}/themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
{if $frontext == 'rtl'}
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/rtl/bootstrap.min.css" />
{else}
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/bootstrap.min.css" />
{/if}
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/font-awesome.css" />
<link rel="stylesheet" href="{$sitepath}/themes/{$themes}/styles/basic.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
{section name="profile" loop=$profile}
{if $profile[profile].thumbs eq true}
<link href="{$sitepath}/maxthumb/{$profile[profile].thumbs}" type="image/x-icon" rel="shortcut icon" />
{else}
<link href="{$sitepath}/themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
{/if}
<title>{$profile[profile].username} - {$sitetitle}</title>
<meta name="description" content="{$profile[profile].username}, {$metadesc}" />
{/section}
</head> 
<body>
{include file="themes/$themes/maindir.php"}
<div class="container minheight">
{if $adsoffon eq 2}
<div class="row mt-2">
<div class="col-md-12 text-center">
{$senseup}
</div>
</div>
{/if}
<div class="row mt-4">
<div class="col-md-8">
<div class="row mt-1">
<div class="col-md-12 mb-3">
{if $fullname eq false}
<h4>{$username} {$lang.175}</h4>
{else}
<h4>{$fullname} {$lang.175}</h4>
{/if}
</div>
</div>
<div class="row mt-1 row-eq-height">
{foreach $newser as $le}
<div class="col-md-4 mb-3">
<div class="firstblock">
{if $rewritemod == 1}<a href="{$sitepath}/news/{$le.univer}/{$le.idblog}/{$le.helper}.html">
{if $le.image neq 0}
<img src="{$sitepath}/minthumb/{$le.image}" width="222" height="135" alt="{$le.title}" />
{else}
<img src="{$sitepath}/themes/{$themes}/styles/images/noimage.png" width="222" height="135" alt="{$le.title}" />
{/if}
</a>{/if}
{if $rewritemod == 2}<a href="{$sitepath}/news.php?name={$le.univer}&amp;cat={$le.idblog}">
{if $le.image neq 0}
<img src="{$sitepath}/minthumb/{$le.image}" width="222" height="135" alt="{$le.title}" />
{else}
<img src="{$sitepath}/themes/{$themes}/styles/images/noimage.png" width="222" height="135" alt="{$le.title}" />
{/if}
</a>
{/if}
<div class="p-3">
{if $rewritemod == 1}<h5><a href="{$sitepath}/news/{$le.univer}/{$le.idblog}/{$le.helper}.html">{$le.title|truncate:70}</a></h5>{/if}
{if $rewritemod == 2}<h5><a href="{$sitepath}/news.php?name={$le.univer}&amp;cat={$le.idblog}">{$le.title|truncate:70}</a></h5>{/if}
<span class="firstline">{$le.date|timeAgo} {$lang.116}</span>
</div>
</div>
</div>
{foreachelse}
<div class="alert alert-primary m-3">{$lang.290}</div>
{/foreach}
</div>
<div class="row mt-5 text-center">
<div class="col-md-12 mb-5 text-center">
<nav aria-label="Page navigation">
<ul class="pagination text-center">
<li class="page-item">{paginate_prev}</li>
<li class="page-item"><span class="page-link">{$lang.120} {$paginate.first} - {$paginate.last} {$lang.121} {$paginate.total}</span></li>
<li class="page-item">{paginate_next}</li>
</ul>
</nav>
</div>
</div>
</div>
<div class="col-md-4">
<div class="row mt-1 mb-3">
<div class="col-md-12">
<div class="menuliner">{$lang.133}</div>
</div>
</div>
{foreach from=$profile item=m}
<div class="topright">
<div class="row mb-3">
<div class="col-sm-2">
{if $m.thumbs neq false}
<span class="gallery">
<a href="{$sitepath}/uploads/{$m.thumbs}"><img src="{$sitepath}/maxthumb/{$m.thumbs}" alt="{$m.username}" height="50" width="50" /></a>
</span>
{else}
<img src="{$sitepath}/themes/{$themes}/styles/images/noimage.jpg" alt="{$m.username}" height="50" width="50" />
{/if}
</div>
<div class="col-sm-10">
{if $m.fullname eq false}
{if $rewritemod == 1}<h5><a href="{$sitepath}/profile/{$m.usid}">{$m.username}</a></h5>{/if}
{if $rewritemod == 2}<h5><a href="{$sitepath}/profile.php?id={$m.usid}">{$m.username}</a></h5>{/if}
{else}
{if $rewritemod == 1}<h5><a href="{$sitepath}/profile/{$m.usid}">{$m.fullname}</a></h5>{/if}
{if $rewritemod == 2}<h5><a href="{$sitepath}/profile.php?id={$m.usid}">{$m.fullname}</a></h5>{/if}
{/if}
{$lang.161} {$m.date|date_format:"%a, %b %e, %Y"}
<br />
{$lang.162} {if $m.lastime eq '0000-00-00 00:00:00'}{$m.date|date_format:"%a, %b %e, %Y"}{else}{$m.lastime|date_format:"%a, %b %e, %Y"}{/if}
<br />
{if $m.biosi eq true}{$m.biosi}{else}{$lang.163}{/if}
</div>
</div>
{/foreach}
{if $adsoffon eq '2'}
<div class="row mt-4 mb-3">
<div class="col-md-12">
<div class="menuliner">{$lang.246}</div>
</div>
</div>
<div class="row mt-4 mb-3 text-center">
<div class="col-md-12">
{$sensedown}
</div>
</div>
{/if}
</div>
</div>
</div>
</div>
<script src="{$sitepath}/scripts/jquery.min.js"></script>
<script src="{$sitepath}/scripts/bootstrap.min.js"></script>
<script>{literal}
/*!* baguetteBox.js* @author  feimosi* @version 1.11.0* @url https://github.com/feimosi/baguetteBox.js*/
!function(e,t){"use strict";"function"==typeof define&&define.amd?define(t):"object"==typeof exports?module.exports=t():e.baguetteBox=t()}(this,function(){"use strict";var r,s,l,u,n,o='<svg width="44" height="60"><polyline points="30 10 10 30 30 50" stroke="rgba(255,255,255,0.5)" stroke-width="4"stroke-linecap="butt" fill="none" stroke-linejoin="round"/></svg>',i='<svg width="44" height="60"><polyline points="14 10 34 30 14 50" stroke="rgba(255,255,255,0.5)" stroke-width="4"stroke-linecap="butt" fill="none" stroke-linejoin="round"/></svg>',a='<svg width="30" height="30"><g stroke="rgb(160,160,160)" stroke-width="4"><line x1="5" y1="5" x2="25" y2="25"/><line x1="5" y1="25" x2="25" y2="5"/></g></svg>',d={},c={captions:!0,buttons:"auto",fullScreen:!1,noScrollbars:!1,bodyClass:"baguetteBox-open",titleTag:!1,async:!1,preload:2,animation:"slideIn",afterShow:null,afterHide:null,onChange:null,overlayBackgroundColor:"rgba(0,0,0,.8)"},f={},g=[],p=0,b=!1,m={},v=!1,h=/.+\.(gif|jpe?g|png|webp)/i,y={},w=[],t=null,k=function(e){-1!==e.target.id.indexOf("baguette-img")&&Y()},x=function(e){e.stopPropagation?e.stopPropagation():e.cancelBubble=!0,X()},C=function(e){e.stopPropagation?e.stopPropagation():e.cancelBubble=!0,q()},E=function(e){e.stopPropagation?e.stopPropagation():e.cancelBubble=!0,Y()},B=function(e){m.count++,1<m.count&&(m.multitouch=!0),m.startX=e.changedTouches[0].pageX,m.startY=e.changedTouches[0].pageY},T=function(e){if(!v&&!m.multitouch){e.preventDefault?e.preventDefault():e.returnValue=!1;var t=e.touches[0]||e.changedTouches[0];40<t.pageX-m.startX?(v=!0,X()):t.pageX-m.startX<-40?(v=!0,q()):100<m.startY-t.pageY&&Y()}},N=function(){m.count--,m.count<=0&&(m.multitouch=!1),v=!1},L=function(){N()},A=function(e){"block"===r.style.display&&r.contains&&!r.contains(e.target)&&(e.stopPropagation(),I())};function P(e){if(y.hasOwnProperty(e)){var t=y[e].galleries;[].forEach.call(t,function(e){[].forEach.call(e,function(e){U(e.imageElement,"click",e.eventHandler)}),g===e&&(g=[])}),delete y[e]}}function S(e){switch(e.keyCode){case 37:X();break;case 39:q();break;case 27:Y();break;case 36:!function(e){e&&e.preventDefault();D(0)}(e);break;case 35:!function(e){e&&e.preventDefault();D(g.length-1)}(e)}}function F(e,t){if(g!==e){for(g=e,function(e){e=e||{};for(var t in c)d[t]=c[t],void 0!==e[t]&&(d[t]=e[t]);s.style.transition=s.style.webkitTransition="fadeIn"===d.animation?"opacity .4s ease":"slideIn"===d.animation?"":"none","auto"===d.buttons&&("ontouchstart"in window||1===g.length)&&(d.buttons=!1);l.style.display=u.style.display=d.buttons?"":"none";try{r.style.backgroundColor=d.overlayBackgroundColor}catch(e){}}(t);s.firstChild;)s.removeChild(s.firstChild);for(var n,o=[],i=[],a=w.length=0;a<e.length;a++)(n=G("div")).className="full-image",n.id="baguette-img-"+a,w.push(n),o.push("baguetteBox-figure-"+a),i.push("baguetteBox-figcaption-"+a),s.appendChild(w[a]);r.setAttribute("aria-labelledby",o.join(" ")),r.setAttribute("aria-describedby",i.join(" "))}}function H(e){d.noScrollbars&&(document.documentElement.style.overflowY="hidden",document.body.style.overflowY="scroll"),"block"!==r.style.display&&(V(document,"keydown",S),m={count:0,startX:null,startY:null},j(p=e,function(){R(p),z(p)}),O(),r.style.display="block",d.fullScreen&&(r.requestFullscreen?r.requestFullscreen():r.webkitRequestFullscreen?r.webkitRequestFullscreen():r.mozRequestFullScreen&&r.mozRequestFullScreen()),setTimeout(function(){r.className="visible",d.bodyClass&&document.body.classList&&document.body.classList.add(d.bodyClass),d.afterShow&&d.afterShow()},50),d.onChange&&d.onChange(p,w.length),t=document.activeElement,I(),b=!0)}function I(){d.buttons?l.focus():n.focus()}function Y(){d.noScrollbars&&(document.documentElement.style.overflowY="auto",document.body.style.overflowY="auto"),"none"!==r.style.display&&(U(document,"keydown",S),r.className="",setTimeout(function(){r.style.display="none",document.fullscreen&&(document.exitFullscreen?document.exitFullscreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitExitFullscreen&&document.webkitExitFullscreen()),d.bodyClass&&document.body.classList&&document.body.classList.remove(d.bodyClass),d.afterHide&&d.afterHide(),t&&t.focus(),b=!1},500))}function j(t,n){var e=w[t],o=g[t];if(void 0!==e&&void 0!==o)if(e.getElementsByTagName("img")[0])n&&n();else{var i=o.imageElement,a=i.getElementsByTagName("img")[0],r="function"==typeof d.captions?d.captions.call(g,i):i.getAttribute("data-caption")||i.title,s=function(e){var t=e.href;if(e.dataset){var n=[];for(var o in e.dataset)"at-"!==o.substring(0,3)||isNaN(o.substring(3))||(n[o.replace("at-","")]=e.dataset[o]);for(var i=Object.keys(n).sort(function(e,t){return parseInt(e,10)<parseInt(t,10)?-1:1}),a=window.innerWidth*window.devicePixelRatio,r=0;r<i.length-1&&i[r]<a;)r++;t=n[i[r]]||t}return t}(i),l=G("figure");if(l.id="baguetteBox-figure-"+t,l.innerHTML='<div class="baguetteBox-spinner"><div class="baguetteBox-double-bounce1"></div><div class="baguetteBox-double-bounce2"></div></div>',d.captions&&r){var u=G("figcaption");u.id="baguetteBox-figcaption-"+t,u.innerHTML=r,l.appendChild(u)}e.appendChild(l);var c=G("img");c.onload=function(){var e=document.querySelector("#baguette-img-"+t+" .baguetteBox-spinner");l.removeChild(e),!d.async&&n&&n()},c.setAttribute("src",s),c.alt=a&&a.alt||"",d.titleTag&&r&&(c.title=r),l.appendChild(c),d.async&&n&&n()}}function q(){return D(p+1)}function X(){return D(p-1)}function D(e,t){return!b&&0<=e&&e<t.length?(F(t,d),H(e),!0):e<0?(d.animation&&M("left"),!1):e>=w.length?(d.animation&&M("right"),!1):(j(p=e,function(){R(p),z(p)}),O(),d.onChange&&d.onChange(p,w.length),!0)}function M(e){s.className="bounce-from-"+e,setTimeout(function(){s.className=""},400)}function O(){var e=100*-p+"%";"fadeIn"===d.animation?(s.style.opacity=0,setTimeout(function(){f.transforms?s.style.transform=s.style.webkitTransform="translate3d("+e+",0,0)":s.style.left=e,s.style.opacity=1},400)):f.transforms?s.style.transform=s.style.webkitTransform="translate3d("+e+",0,0)":s.style.left=e}function R(e){e-p>=d.preload||j(e+1,function(){R(e+1)})}function z(e){p-e>=d.preload||j(e-1,function(){z(e-1)})}function V(e,t,n,o){e.addEventListener?e.addEventListener(t,n,o):e.attachEvent("on"+t,function(e){(e=e||window.event).target=e.target||e.srcElement,n(e)})}function U(e,t,n,o){e.removeEventListener?e.removeEventListener(t,n,o):e.detachEvent("on"+t,n)}function W(e){return document.getElementById(e)}function G(e){return document.createElement(e)}return[].forEach||(Array.prototype.forEach=function(e,t){for(var n=0;n<this.length;n++)e.call(t,this[n],n,this)}),[].filter||(Array.prototype.filter=function(e,t,n,o,i){for(n=this,o=[],i=0;i<n.length;i++)e.call(t,n[i],i,n)&&o.push(n[i]);return o}),{run:function(e,t){return f.transforms=function(){var e=G("div");return void 0!==e.style.perspective||void 0!==e.style.webkitPerspective}(),f.svg=function(){var e=G("div");return e.innerHTML="<svg/>","http://www.w3.org/2000/svg"===(e.firstChild&&e.firstChild.namespaceURI)}(),f.passiveEvents=function(){var e=!1;try{var t=Object.defineProperty({},"passive",{get:function(){e=!0}});window.addEventListener("test",null,t)}catch(e){}return e}(),function(){if(r=W("baguetteBox-overlay"))return s=W("baguetteBox-slider"),l=W("previous-button"),u=W("next-button"),n=W("close-button");(r=G("div")).setAttribute("role","dialog"),r.id="baguetteBox-overlay",document.getElementsByTagName("body")[0].appendChild(r),(s=G("div")).id="baguetteBox-slider",r.appendChild(s),(l=G("button")).setAttribute("type","button"),l.id="previous-button",l.setAttribute("aria-label","Previous"),l.innerHTML=f.svg?o:"&lt;",r.appendChild(l),(u=G("button")).setAttribute("type","button"),u.id="next-button",u.setAttribute("aria-label","Next"),u.innerHTML=f.svg?i:"&gt;",r.appendChild(u),(n=G("button")).setAttribute("type","button"),n.id="close-button",n.setAttribute("aria-label","Close"),n.innerHTML=f.svg?a:"&times;",r.appendChild(n),l.className=u.className=n.className="baguetteBox-button",function(){var e=f.passiveEvents?{passive:!0}:null;V(r,"click",k),V(l,"click",x),V(u,"click",C),V(n,"click",E),V(s,"contextmenu",L),V(r,"touchstart",B,e),V(r,"touchmove",T,e),V(r,"touchend",N),V(document,"focus",A,!0)}()}(),P(e),function(e,a){var t=document.querySelectorAll(e),n={galleries:[],nodeList:t};return y[e]=n,[].forEach.call(t,function(e){a&&a.filter&&(h=a.filter);var t=[];if(t="A"===e.tagName?[e]:e.getElementsByTagName("a"),0!==(t=[].filter.call(t,function(e){if(-1===e.className.indexOf(a&&a.ignoreClass))return h.test(e.href)})).length){var i=[];[].forEach.call(t,function(e,t){function n(e){e.preventDefault?e.preventDefault():e.returnValue=!1,F(i,a),H(t)}var o={eventHandler:n,imageElement:e};V(e,"click",n),i.push(o)}),n.galleries.push(i)}}),n.galleries}(e,t)},show:D,showNext:q,showPrevious:X,hide:Y,destroy:function(){!function(){var e=f.passiveEvents?{passive:!0}:null;U(r,"click",k),U(l,"click",x),U(u,"click",C),U(n,"click",E),U(s,"contextmenu",L),U(r,"touchstart",B,e),U(r,"touchmove",T,e),U(r,"touchend",N),U(document,"focus",A,!0)}(),function(){for(var e in y)y.hasOwnProperty(e)&&P(e)}(),U(document,"keydown",S),document.getElementsByTagName("body")[0].removeChild(document.getElementById("baguetteBox-overlay")),y={},g=[],p=0}}});
$(function(){
$('#coolMenu').find('> li').hover(function(){
$(this).find('ul')
.removeClass('noJS')
.stop(true, true).toggle('fast');
});
});
$(function(){
baguetteBox.run('.gallery');
});
{/literal}</script>
{include file="themes/$themes/footer.php"}
{/if}