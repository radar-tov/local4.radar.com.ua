function initRating(){$(".rating_1").rating({fx:"full",image:"/frontend/images/stars2.png",loader:"/frontend/images/ajax-loader.gif",url:"/rate",readOnly:!0,callback:function(t){this.vote_success.fadeOut(2e3)}}),$(".rating_2").each(function(){var t=$(this);t.rating({fx:"full",image:"/frontend/images/hover-stars.png",loader:"/frontend/images/ajax-loader.gif",url:"/rate",readOnly:!0,callback:function(t){this.vote_success.fadeOut(2e3)}})})}!function(t,e){"object"==typeof module&&"object"==typeof module.exports?module.exports=t.document?e(t,!0):function(t){if(!t.document)throw new Error("jQuery requires a window with a document");return e(t)}:e(t)}("undefined"!=typeof window?window:this,function(t,e){function i(t){var e=t.length,i=Z.type(t);return"function"===i||Z.isWindow(t)?!1:1===t.nodeType&&e?!0:"array"===i||0===e||"number"==typeof e&&e>0&&e-1 in t}function n(t,e,i){if(Z.isFunction(e))return Z.grep(t,function(t,n){return!!e.call(t,n,t)!==i});if(e.nodeType)return Z.grep(t,function(t){return t===e!==i});if("string"==typeof e){if(at.test(e))return Z.filter(e,t,i);e=Z.filter(e,t)}return Z.grep(t,function(t){return X.call(e,t)>=0!==i})}function o(t,e){for(;(t=t[e])&&1!==t.nodeType;);return t}function r(t){var e=ft[t]={};return Z.each(t.match(pt)||[],function(t,i){e[i]=!0}),e}function s(){K.removeEventListener("DOMContentLoaded",s,!1),t.removeEventListener("load",s,!1),Z.ready()}function a(){Object.defineProperty(this.cache={},0,{get:function(){return{}}}),this.expando=Z.expando+a.uid++}function l(t,e,i){var n;if(void 0===i&&1===t.nodeType)if(n="data-"+e.replace(xt,"-$1").toLowerCase(),i=t.getAttribute(n),"string"==typeof i){try{i="true"===i?!0:"false"===i?!1:"null"===i?null:+i+""===i?+i:bt.test(i)?Z.parseJSON(i):i}catch(o){}yt.set(t,e,i)}else i=void 0;return i}function c(){return!0}function u(){return!1}function h(){try{return K.activeElement}catch(t){}}function d(t,e){return Z.nodeName(t,"table")&&Z.nodeName(11!==e.nodeType?e:e.firstChild,"tr")?t.getElementsByTagName("tbody")[0]||t.appendChild(t.ownerDocument.createElement("tbody")):t}function p(t){return t.type=(null!==t.getAttribute("type"))+"/"+t.type,t}function f(t){var e=Mt.exec(t.type);return e?t.type=e[1]:t.removeAttribute("type"),t}function m(t,e){for(var i=0,n=t.length;n>i;i++)vt.set(t[i],"globalEval",!e||vt.get(e[i],"globalEval"))}function g(t,e){var i,n,o,r,s,a,l,c;if(1===e.nodeType){if(vt.hasData(t)&&(r=vt.access(t),s=vt.set(e,r),c=r.events)){delete s.handle,s.events={};for(o in c)for(i=0,n=c[o].length;n>i;i++)Z.event.add(e,o,c[o][i])}yt.hasData(t)&&(a=yt.access(t),l=Z.extend({},a),yt.set(e,l))}}function v(t,e){var i=t.getElementsByTagName?t.getElementsByTagName(e||"*"):t.querySelectorAll?t.querySelectorAll(e||"*"):[];return void 0===e||e&&Z.nodeName(t,e)?Z.merge([t],i):i}function y(t,e){var i=e.nodeName.toLowerCase();"input"===i&&Ct.test(t.type)?e.checked=t.checked:("input"===i||"textarea"===i)&&(e.defaultValue=t.defaultValue)}function b(e,i){var n,o=Z(i.createElement(e)).appendTo(i.body),r=t.getDefaultComputedStyle&&(n=t.getDefaultComputedStyle(o[0]))?n.display:Z.css(o[0],"display");return o.detach(),r}function x(t){var e=K,i=Wt[t];return i||(i=b(t,e),"none"!==i&&i||(Lt=(Lt||Z("
<iframe frameborder='0' width='0'
        height='0'/>")).appendTo(e.documentElement),e=Lt[0].contentDocument,e.write(),e.close(),i=b(t,e),Lt.detach()),Wt[t]=i),i}function w(t,e,i){var n,o,r,s,a=t.style;return i=i||zt(t),i&&(s=i.getPropertyValue(e)||i[e]),i&&(""!==s||Z.contains(t.ownerDocument,t)||(s=Z.style(t,e)),Rt.test(s)&&Ht.test(e)&&(n=a.width,o=a.minWidth,r=a.maxWidth,a.minWidth=a.maxWidth=a.width=s,s=i.width,a.width=n,a.minWidth=o,a.maxWidth=r)),void 0!==s?s+"":s}function _(t,e){return{get:function(){return t()?void delete this.get:(this.get=e).apply(this,arguments)}}}function k(t,e){if(e in t)return e;for(var i=e[0].toUpperCase()+e.slice(1),n=e,o=Ut.length;o--;)if(e=Ut[o]+i,e in t)return e;return n}function C(t,e,i){var n=Qt.exec(e);return n?Math.max(0,n[1]-(i||0))+(n[2]||"px"):e}function T(t,e,i,n,o){for(var r=i===(n?"border":"content")?4:"width"===e?1:0,s=0;4>r;r+=2)"margin"===i&&(s+=Z.css(t,i+_t[r],!0,o)),n?("content"===i&&(s-=Z.css(t,"padding"+_t[r],!0,o)),"margin"!==i&&(s-=Z.css(t,"border"+_t[r]+"Width",!0,o))):(s+=Z.css(t,"padding"+_t[r],!0,o),"padding"!==i&&(s+=Z.css(t,"border"+_t[r]+"Width",!0,o)));return s}function S(t,e,i){var n=!0,o="width"===e?t.offsetWidth:t.offsetHeight,r=zt(t),s="border-box"===Z.css(t,"boxSizing",!1,r);if(0>=o||null==o){if(o=w(t,e,r),(0>o||null==o)&&(o=t.style[e]),Rt.test(o))return o;n=s&&(G.boxSizingReliable()||o===t.style[e]),o=parseFloat(o)||0}return o+T(t,e,i||(s?"border":"content"),n,r)+"px"}function $(t,e){for(var i,n,o,r=[],s=0,a=t.length;a>s;s++)n=t[s],n.style&&(r[s]=vt.get(n,"olddisplay"),i=n.style.display,e?(r[s]||"none"!==i||(n.style.display=""),""===n.style.display&&kt(n)&&(r[s]=vt.access(n,"olddisplay",x(n.nodeName)))):(o=kt(n),"none"===i&&o||vt.set(n,"olddisplay",o?i:Z.css(n,"display"))));for(s=0;a>s;s++)n=t[s],n.style&&(e&&"none"!==n.style.display&&""!==n.style.display||(n.style.display=e?r[s]||"":"none"));return t}function E(t,e,i,n,o){return new E.prototype.init(t,e,i,n,o)}function A(){return setTimeout(function(){Gt=void 0}),Gt=Z.now()}function O(t,e){var i,n=0,o={height:t};for(e=e?1:0;4>n;n+=2-e)i=_t[n],o["margin"+i]=o["padding"+i]=t;return e&&(o.opacity=o.width=t),o}function N(t,e,i){for(var n,o=(ie[e]||[]).concat(ie["*"]),r=0,s=o.length;s>r;r++)if(n=o[r].call(i,e,t))return n}function D(t,e,i){var n,o,r,s,a,l,c,u,h=this,d={},p=t.style,f=t.nodeType&&kt(t),m=vt.get(t,"fxshow");i.queue||(a=Z._queueHooks(t,"fx"),null==a.unqueued&&(a.unqueued=0,l=a.empty.fire,a.empty.fire=function(){a.unqueued||l()}),a.unqueued++,h.always(function(){h.always(function(){a.unqueued--,Z.queue(t,"fx").length||a.empty.fire()})})),1===t.nodeType&&("height"in e||"width"in e)&&(i.overflow=[p.overflow,p.overflowX,p.overflowY],c=Z.css(t,"display"),u="none"===c?vt.get(t,"olddisplay")||x(t.nodeName):c,"inline"===u&&"none"===Z.css(t,"float")&&(p.display="inline-block")),i.overflow&&(p.overflow="hidden",h.always(function(){p.overflow=i.overflow[0],p.overflowX=i.overflow[1],p.overflowY=i.overflow[2]}));for(n in e)if(o=e[n],Jt.exec(o)){if(delete e[n],r=r||"toggle"===o,o===(f?"hide":"show")){if("show"!==o||!m||void 0===m[n])continue;f=!0}d[n]=m&&m[n]||Z.style(t,n)}else c=void 0;if(Z.isEmptyObject(d))"inline"===("none"===c?x(t.nodeName):c)&&(p.display=c);else{m?"hidden"in m&&(f=m.hidden):m=vt.access(t,"fxshow",{}),r&&(m.hidden=!f),f?Z(t).show():h.done(function(){Z(t).hide()}),h.done(function(){var e;vt.remove(t,"fxshow");for(e in d)Z.style(t,e,d[e])});for(n in d)s=N(f?m[n]:0,n,h),n in m||(m[n]=s.start,f&&(s.end=s.start,s.start="width"===n||"height"===n?1:0))}}function P(t,e){var i,n,o,r,s;for(i in t)if(n=Z.camelCase(i),o=e[n],r=t[i],Z.isArray(r)&&(o=r[1],r=t[i]=r[0]),i!==n&&(t[n]=r,delete t[i]),s=Z.cssHooks[n],s&&"expand"in s){r=s.expand(r),delete t[n];for(i in r)i in t||(t[i]=r[i],e[i]=o)}else e[n]=o}function I(t,e,i){var n,o,r=0,s=ee.length,a=Z.Deferred().always(function(){delete l.elem}),l=function(){if(o)return!1;for(var e=Gt||A(),i=Math.max(0,c.startTime+c.duration-e),n=i/c.duration||0,r=1-n,s=0,l=c.tweens.length;l>s;s++)c.tweens[s].run(r);return a.notifyWith(t,[c,r,i]),1>r&&l?i:(a.resolveWith(t,[c]),!1)},c=a.promise({elem:t,props:Z.extend({},e),opts:Z.extend(!0,{specialEasing:{}},i),originalProperties:e,originalOptions:i,startTime:Gt||A(),duration:i.duration,tweens:[],createTween:function(e,i){var n=Z.Tween(t,c.opts,e,i,c.opts.specialEasing[e]||c.opts.easing);return c.tweens.push(n),n},stop:function(e){var i=0,n=e?c.tweens.length:0;if(o)return this;for(o=!0;n>i;i++)c.tweens[i].run(1);return e?a.resolveWith(t,[c,e]):a.rejectWith(t,[c,e]),this}}),u=c.props;for(P(u,c.opts.specialEasing);s>r;r++)if(n=ee[r].call(c,t,u,c.opts))return n;return Z.map(u,N,c),Z.isFunction(c.opts.start)&&c.opts.start.call(t,c),Z.fx.timer(Z.extend(l,{elem:t,anim:c,queue:c.opts.queue})),c.progress(c.opts.progress).done(c.opts.done,c.opts.complete).fail(c.opts.fail).always(c.opts.always)}function j(t){return function(e,i){"string"!=typeof e&&(i=e,e="*");var n,o=0,r=e.toLowerCase().match(pt)||[];if(Z.isFunction(i))for(;n=r[o++];)"+"===n[0]?(n=n.slice(1)||"*",(t[n]=t[n]||[]).unshift(i)):(t[n]=t[n]||[]).push(i)}}function M(t,e,i,n){function o(a){var l;return r[a]=!0,Z.each(t[a]||[],function(t,a){var c=a(e,i,n);return"string"!=typeof c||s||r[c]?s?!(l=c):void 0:(e.dataTypes.unshift(c),o(c),!1)}),l}var r={},s=t===be;return o(e.dataTypes[0])||!r["*"]&&o("*")}function F(t,e){var i,n,o=Z.ajaxSettings.flatOptions||{};for(i in e)void 0!==e[i]&&((o[i]?t:n||(n={}))[i]=e[i]);return n&&Z.extend(!0,t,n),t}function q(t,e,i){for(var n,o,r,s,a=t.contents,l=t.dataTypes;"*"===l[0];)l.shift(),void 0===n&&(n=t.mimeType||e.getResponseHeader("Content-Type"));if(n)for(o in a)if(a[o]&&a[o].test(n)){l.unshift(o);break}if(l[0]in i)r=l[0];else{for(o in i){if(!l[0]||t.converters[o+" "+l[0]]){r=o;break}s||(s=o)}r=r||s}return r?(r!==l[0]&&l.unshift(r),i[r]):void 0}function L(t,e,i,n){var o,r,s,a,l,c={},u=t.dataTypes.slice();if(u[1])for(s in t.converters)c[s.toLowerCase()]=t.converters[s];for(r=u.shift();r;)if(t.responseFields[r]&&(i[t.responseFields[r]]=e),!l&&n&&t.dataFilter&&(e=t.dataFilter(e,t.dataType)),l=r,r=u.shift())if("*"===r)r=l;else if("*"!==l&&l!==r){if(s=c[l+" "+r]||c["* "+r],!s)for(o in c)if(a=o.split(" "),a[1]===r&&(s=c[l+" "+a[0]]||c["* "+a[0]])){s===!0?s=c[o]:c[o]!==!0&&(r=a[0],u.unshift(a[1]));break}if(s!==!0)if(s&&t["throws"])e=s(e);else try{e=s(e)}catch(h){return{state:"parsererror",error:s?h:"No conversion from "+l+" to "+r}}}return{state:"success",data:e}}function W(t,e,i,n){var o;if(Z.isArray(e))Z.each(e,function(e,o){i||Ce.test(t)?n(t,o):W(t+"["+("object"==typeof o?e:"")+"]",o,i,n)});else if(i||"object"!==Z.type(e))n(t,e);else for(o in e)W(t+"["+o+"]",e[o],i,n)}function H(t){return Z.isWindow(t)?t:9===t.nodeType&&t.defaultView}var R=[],z=R.slice,V=R.concat,Q=R.push,X=R.indexOf,B={},Y=B.toString,U=B.hasOwnProperty,G={},K=t.document,J="2.1.3",Z=function(t,e){return new Z.fn.init(t,e)},tt=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,et=/^-ms-/,it=/-([\da-z])/gi,nt=function(t,e){return e.toUpperCase()};Z.fn=Z.prototype={jquery:J,constructor:Z,selector:"",length:0,toArray:function(){return z.call(this)},get:function(t){return null!=t?0>t?this[t+this.length]:this[t]:z.call(this)},pushStack:function(t){var e=Z.merge(this.constructor(),t);return e.prevObject=this,e.context=this.context,e},each:function(t,e){return Z.each(this,t,e)},map:function(t){return this.pushStack(Z.map(this,function(e,i){return t.call(e,i,e)}))},slice:function(){return this.pushStack(z.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(t){var e=this.length,i=+t+(0>t?e:0);return this.pushStack(i>=0&&e>i?[this[i]]:[])},end:function(){return this.prevObject||this.constructor(null)},push:Q,sort:R.sort,splice:R.splice},Z.extend=Z.fn.extend=function(){var t,e,i,n,o,r,s=arguments[0]||{},a=1,l=arguments.length,c=!1;for("boolean"==typeof s&&(c=s,s=arguments[a]||{},a++),"object"==typeof s||Z.isFunction(s)||(s={}),a===l&&(s=this,a--);l>a;a++)if(null!=(t=arguments[a]))for(e in t)i=s[e],n=t[e],s!==n&&(c&&n&&(Z.isPlainObject(n)||(o=Z.isArray(n)))?(o?(o=!1,r=i&&Z.isArray(i)?i:[]):r=i&&Z.isPlainObject(i)?i:{},s[e]=Z.extend(c,r,n)):void 0!==n&&(s[e]=n));return s},Z.extend({expando:"jQuery"+(J+Math.random()).replace(/\D/g,""),isReady:!0,error:function(t){throw new Error(t)},noop:function(){},isFunction:function(t){return"function"===Z.type(t)},isArray:Array.isArray,isWindow:function(t){return null!=t&&t===t.window},isNumeric:function(t){return!Z.isArray(t)&&t-parseFloat(t)+1>=0},isPlainObject:function(t){return"object"!==Z.type(t)||t.nodeType||Z.isWindow(t)?!1:t.constructor&&!U.call(t.constructor.prototype,"isPrototypeOf")?!1:!0},isEmptyObject:function(t){var e;for(e in t)return!1;return!0},type:function(t){return null==t?t+"":"object"==typeof t||"function"==typeof t?B[Y.call(t)]||"object":typeof t},globalEval:function(t){var e,i=eval;t=Z.trim(t),t&&(1===t.indexOf("use strict")?(e=K.createElement("script"),e.text=t,K.head.appendChild(e).parentNode.removeChild(e)):i(t))},camelCase:function(t){return t.replace(et,"ms-").replace(it,nt)},nodeName:function(t,e){return t.nodeName&&t.nodeName.toLowerCase()===e.toLowerCase()},each:function(t,e,n){var o,r=0,s=t.length,a=i(t);if(n){if(a)for(;s>r&&(o=e.apply(t[r],n),o!==!1);r++);else for(r in t)if(o=e.apply(t[r],n),o===!1)break}else if(a)for(;s>r&&(o=e.call(t[r],r,t[r]),o!==!1);r++);else for(r in t)if(o=e.call(t[r],r,t[r]),o===!1)break;return t},trim:function(t){return null==t?"":(t+"").replace(tt,"")},makeArray:function(t,e){var n=e||[];return null!=t&&(i(Object(t))?Z.merge(n,"string"==typeof t?[t]:t):Q.call(n,t)),n},inArray:function(t,e,i){return null==e?-1:X.call(e,t,i)},merge:function(t,e){for(var i=+e.length,n=0,o=t.length;i>n;n++)t[o++]=e[n];return t.length=o,t},grep:function(t,e,i){for(var n,o=[],r=0,s=t.length,a=!i;s>r;r++)n=!e(t[r],r),n!==a&&o.push(t[r]);return o},map:function(t,e,n){var o,r=0,s=t.length,a=i(t),l=[];if(a)for(;s>r;r++)o=e(t[r],r,n),null!=o&&l.push(o);else for(r in t)o=e(t[r],r,n),null!=o&&l.push(o);return V.apply([],l)},guid:1,proxy:function(t,e){var i,n,o;return"string"==typeof e&&(i=t[e],e=t,t=i),Z.isFunction(t)?(n=z.call(arguments,2),o=function(){return t.apply(e||this,n.concat(z.call(arguments)))},o.guid=t.guid=t.guid||Z.guid++,o):void 0},now:Date.now,support:G}),Z.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),function(t,e){B["[object "+e+"]"]=e.toLowerCase()});var ot=function(t){function e(t,e,i,n){var o,r,s,a,l,c,h,p,f,m;if((e?e.ownerDocument||e:W)!==D&&N(e),e=e||D,i=i||[],a=e.nodeType,"string"!=typeof t||!t||1!==a&&9!==a&&11!==a)return i;if(!n&&I){if(11!==a&&(o=yt.exec(t)))if(s=o[1]){if(9===a){if(r=e.getElementById(s),!r||!r.parentNode)return i;if(r.id===s)return i.push(r),i}else if(e.ownerDocument&&(r=e.ownerDocument.getElementById(s))&&q(e,r)&&r.id===s)return i.push(r),i}else{if(o[2])return J.apply(i,e.getElementsByTagName(t)),i;if((s=o[3])&&w.getElementsByClassName)return J.apply(i,e.getElementsByClassName(s)),i}if(w.qsa&&(!j||!j.test(t))){if(p=h=L,f=e,m=1!==a&&t,1===a&&"object"!==e.nodeName.toLowerCase()){for(c=T(t),(h=e.getAttribute("id"))?p=h.replace(xt,"\\$&"):e.setAttribute("id",p),p="[id='"+p+"'] ",l=c.length;l--;)c[l]=p+d(c[l]);f=bt.test(t)&&u(e.parentNode)||e,m=c.join(",")}if(m)try{return J.apply(i,f.querySelectorAll(m)),i}catch(g){}finally{h||e.removeAttribute("id")}}}return $(t.replace(lt,"$1"),e,i,n)}function i(){function t(i,n){return e.push(i+" ")>_.cacheLength&&delete t[e.shift()],t[i+" "]=n}var e=[];return t}function n(t){return t[L]=!0,t}function o(t){var e=D.createElement("div");try{return!!t(e)}catch(i){return!1}finally{e.parentNode&&e.parentNode.removeChild(e),e=null}}function r(t,e){for(var i=t.split("|"),n=t.length;n--;)_.attrHandle[i[n]]=e}function s(t,e){var i=e&&t,n=i&&1===t.nodeType&&1===e.nodeType&&(~e.sourceIndex||B)-(~t.sourceIndex||B);if(n)return n;if(i)for(;i=i.nextSibling;)if(i===e)return-1;return t?1:-1}function a(t){return function(e){var i=e.nodeName.toLowerCase();return"input"===i&&e.type===t}}function l(t){return function(e){var i=e.nodeName.toLowerCase();return("input"===i||"button"===i)&&e.type===t}}function c(t){return n(function(e){return e=+e,n(function(i,n){for(var o,r=t([],i.length,e),s=r.length;s--;)i[o=r[s]]&&(i[o]=!(n[o]=i[o]))})})}function u(t){return t&&"undefined"!=typeof t.getElementsByTagName&&t}function h(){}function d(t){for(var e=0,i=t.length,n="";i>e;e++)n+=t[e].value;return n}function p(t,e,i){var n=e.dir,o=i&&"parentNode"===n,r=R++;return e.first?function(e,i,r){for(;e=e[n];)if(1===e.nodeType||o)return t(e,i,r)}:function(e,i,s){var a,l,c=[H,r];if(s){for(;e=e[n];)if((1===e.nodeType||o)&&t(e,i,s))return!0}else for(;e=e[n];)if(1===e.nodeType||o){if(l=e[L]||(e[L]={}),(a=l[n])&&a[0]===H&&a[1]===r)return c[2]=a[2];if(l[n]=c,c[2]=t(e,i,s))return!0}}}function f(t){return t.length>1?function(e,i,n){for(var o=t.length;o--;)if(!t[o](e,i,n))return!1;return!0}:t[0]}function m(t,i,n){for(var o=0,r=i.length;r>o;o++)e(t,i[o],n);return n}function g(t,e,i,n,o){for(var r,s=[],a=0,l=t.length,c=null!=e;l>a;a++)(r=t[a])&&(!i||i(r,n,o))&&(s.push(r),c&&e.push(a));return s}function v(t,e,i,o,r,s){return o&&!o[L]&&(o=v(o)),r&&!r[L]&&(r=v(r,s)),n(function(n,s,a,l){var c,u,h,d=[],p=[],f=s.length,v=n||m(e||"*",a.nodeType?[a]:a,[]),y=!t||!n&&e?v:g(v,d,t,a,l),b=i?r||(n?t:f||o)?[]:s:y;if(i&&i(y,b,a,l),o)for(c=g(b,p),o(c,[],a,l),u=c.length;u--;)(h=c[u])&&(b[p[u]]=!(y[p[u]]=h));if(n){if(r||t){if(r){for(c=[],u=b.length;u--;)(h=b[u])&&c.push(y[u]=h);r(null,b=[],c,l)}for(u=b.length;u--;)(h=b[u])&&(c=r?tt(n,h):d[u])>-1&&(n[c]=!(s[c]=h))}}else b=g(b===s?b.splice(f,b.length):b),r?r(null,s,b,l):J.apply(s,b)})}function y(t){for(var e,i,n,o=t.length,r=_.relative[t[0].type],s=r||_.relative[" "],a=r?1:0,l=p(function(t){return t===e},s,!0),c=p(function(t){return tt(e,t)>-1},s,!0),u=[function(t,i,n){var o=!r&&(n||i!==E)||((e=i).nodeType?l(t,i,n):c(t,i,n));return e=null,o}];o>a;a++)if(i=_.relative[t[a].type])u=[p(f(u),i)];else{if(i=_.filter[t[a].type].apply(null,t[a].matches),i[L]){for(n=++a;o>n&&!_.relative[t[n].type];n++);return v(a>1&&f(u),a>1&&d(t.slice(0,a-1).concat({value:" "===t[a-2].type?"*":""})).replace(lt,"$1"),i,n>a&&y(t.slice(a,n)),o>n&&y(t=t.slice(n)),o>n&&d(t))}u.push(i)}return f(u)}function b(t,i){var o=i.length>0,r=t.length>0,s=function(n,s,a,l,c){var u,h,d,p=0,f="0",m=n&&[],v=[],y=E,b=n||r&&_.find.TAG("*",c),x=H+=null==y?1:Math.random()||.1,w=b.length;for(c&&(E=s!==D&&s);f!==w&&null!=(u=b[f]);f++){if(r&&u){for(h=0;d=t[h++];)if(d(u,s,a)){l.push(u);break}c&&(H=x)}o&&((u=!d&&u)&&p--,n&&m.push(u))}if(p+=f,o&&f!==p){for(h=0;d=i[h++];)d(m,v,s,a);if(n){if(p>0)for(;f--;)m[f]||v[f]||(v[f]=G.call(l));v=g(v)}J.apply(l,v),c&&!n&&v.length>0&&p+i.length>1&&e.uniqueSort(l)}return c&&(H=x,E=y),m};return o?n(s):s}var x,w,_,k,C,T,S,$,E,A,O,N,D,P,I,j,M,F,q,L="sizzle"+1*new Date,W=t.document,H=0,R=0,z=i(),V=i(),Q=i(),X=function(t,e){return t===e&&(O=!0),0},B=1<<31,Y={}.hasOwnProperty,U=[],G=U.pop,K=U.push,J=U.push,Z=U.slice,tt=function(t,e){for(var i=0,n=t.length;n>i;i++)if(t[i]===e)return i;return-1},et="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",it="[\\x20\\t\\r\\n\\f]",nt="(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",ot=nt.replace("w","w#"),rt="\\["+it+"*("+nt+")(?:"+it+"*([*^$|!~]?=)"+it+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+ot+"))|)"+it+"*\\]",st=":("+nt+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+rt+")*)|.*)\\)|)",at=new RegExp(it+"+","g"),lt=new RegExp("^"+it+"+|((?:^|[^\\\\])(?:\\\\.)*)"+it+"+$","g"),ct=new RegExp("^"+it+"*,"+it+"*"),ut=new RegExp("^"+it+"*([>+~]|"+it+")"+it+"*"),ht=new RegExp("="+it+"*([^\\]'\"]*?)"+it+"*\\]","g"),dt=new RegExp(st),pt=new RegExp("^"+ot+"$"),ft={ID:new RegExp("^#("+nt+")"),CLASS:new RegExp("^\\.("+nt+")"),TAG:new RegExp("^("+nt.replace("w","w*")+")"),ATTR:new RegExp("^"+rt),PSEUDO:new RegExp("^"+st),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+it+"*(even|odd|(([+-]|)(\\d*)n|)"+it+"*(?:([+-]|)"+it+"*(\\d+)|))"+it+"*\\)|)","i"),bool:new RegExp("^(?:"+et+")$","i"),needsContext:new RegExp("^"+it+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+it+"*((?:-\\d)?\\d*)"+it+"*\\)|)(?=[^-]|$)","i")},mt=/^(?:input|select|textarea|button)$/i,gt=/^h\d$/i,vt=/^[^{]+\{\s*\[native \w/,yt=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,bt=/[+~]/,xt=/'|\\/g,wt=new RegExp("\\\\([\\da-f]{1,6}"+it+"?|("+it+")|.)","ig"),_t=function(t,e,i){var n="0x"+e-65536;return n!==n||i?e:0>n?String.fromCharCode(n+65536):String.fromCharCode(n>>10|55296,1023&n|56320)},kt=function(){N()};try{J.apply(U=Z.call(W.childNodes),W.childNodes),U[W.childNodes.length].nodeType}catch(Ct){J={apply:U.length?function(t,e){K.apply(t,Z.call(e))}:function(t,e){for(var i=t.length,n=0;t[i++]=e[n++];);t.length=i-1}}}w=e.support={},C=e.isXML=function(t){var e=t&&(t.ownerDocument||t).documentElement;return e?"HTML"!==e.nodeName:!1},N=e.setDocument=function(t){var e,i,n=t?t.ownerDocument||t:W;return n!==D&&9===n.nodeType&&n.documentElement?(D=n,P=n.documentElement,i=n.defaultView,i&&i!==i.top&&(i.addEventListener?i.addEventListener("unload",kt,!1):i.attachEvent&&i.attachEvent("onunload",kt)),I=!C(n),w.attributes=o(function(t){return t.className="i",!t.getAttribute("className")}),w.getElementsByTagName=o(function(t){return t.appendChild(n.createComment("")),!t.getElementsByTagName("*").length}),w.getElementsByClassName=vt.test(n.getElementsByClassName),w.getById=o(function(t){return P.appendChild(t).id=L,!n.getElementsByName||!n.getElementsByName(L).length}),w.getById?(_.find.ID=function(t,e){if("undefined"!=typeof e.getElementById&&I){var i=e.getElementById(t);return i&&i.parentNode?[i]:[]}},_.filter.ID=function(t){var e=t.replace(wt,_t);return function(t){return t.getAttribute("id")===e}}):(delete _.find.ID,_.filter.ID=function(t){var e=t.replace(wt,_t);return function(t){var i="undefined"!=typeof t.getAttributeNode&&t.getAttributeNode("id");return i&&i.value===e}}),_.find.TAG=w.getElementsByTagName?function(t,e){return"undefined"!=typeof e.getElementsByTagName?e.getElementsByTagName(t):w.qsa?e.querySelectorAll(t):void 0}:function(t,e){var i,n=[],o=0,r=e.getElementsByTagName(t);if("*"===t){for(;i=r[o++];)1===i.nodeType&&n.push(i);return n}return r},_.find.CLASS=w.getElementsByClassName&&function(t,e){return I?e.getElementsByClassName(t):void 0},M=[],j=[],(w.qsa=vt.test(n.querySelectorAll))&&(o(function(t){P.appendChild(t).innerHTML="
<a id='"+L+"'></a><select id='"+L+"-\f]' msallowcapture=''>
    <option selected=''></option>
</select>",t.querySelectorAll("[msallowcapture^='']").length&&j.push("[*^$]="+it+"*(?:''|\"\")"),t.querySelectorAll("[selected]").length||j.push("\\["+it+"*(?:value|"+et+")"),t.querySelectorAll("[id~="+L+"-]").length||j.push("~="),t.querySelectorAll(":checked").length||j.push(":checked"),t.querySelectorAll("a#"+L+"+*").length||j.push(".#.+[+~]")}),o(function(t){var e=n.createElement("input");e.setAttribute("type","hidden"),t.appendChild(e).setAttribute("name","D"),t.querySelectorAll("[name=d]").length&&j.push("name"+it+"*[*^$|!~]?="),t.querySelectorAll(":enabled").length||j.push(":enabled",":disabled"),t.querySelectorAll("*,:x"),j.push(",.*:")})),(w.matchesSelector=vt.test(F=P.matches||P.webkitMatchesSelector||P.mozMatchesSelector||P.oMatchesSelector||P.msMatchesSelector))&&o(function(t){w.disconnectedMatch=F.call(t,"div"),F.call(t,"[s!='']:x"),M.push("!=",st)}),j=j.length&&new RegExp(j.join("|")),M=M.length&&new RegExp(M.join("|")),e=vt.test(P.compareDocumentPosition),q=e||vt.test(P.contains)?function(t,e){var i=9===t.nodeType?t.documentElement:t,n=e&&e.parentNode;return t===n||!(!n||1!==n.nodeType||!(i.contains?i.contains(n):t.compareDocumentPosition&&16&t.compareDocumentPosition(n)))}:function(t,e){if(e)for(;e=e.parentNode;)if(e===t)return!0;return!1},X=e?function(t,e){if(t===e)return O=!0,0;var i=!t.compareDocumentPosition-!e.compareDocumentPosition;return i?i:(i=(t.ownerDocument||t)===(e.ownerDocument||e)?t.compareDocumentPosition(e):1,1&i||!w.sortDetached&&e.compareDocumentPosition(t)===i?t===n||t.ownerDocument===W&&q(W,t)?-1:e===n||e.ownerDocument===W&&q(W,e)?1:A?tt(A,t)-tt(A,e):0:4&i?-1:1)}:function(t,e){if(t===e)return O=!0,0;var i,o=0,r=t.parentNode,a=e.parentNode,l=[t],c=[e];if(!r||!a)return t===n?-1:e===n?1:r?-1:a?1:A?tt(A,t)-tt(A,e):0;if(r===a)return s(t,e);for(i=t;i=i.parentNode;)l.unshift(i);for(i=e;i=i.parentNode;)c.unshift(i);for(;l[o]===c[o];)o++;return o?s(l[o],c[o]):l[o]===W?-1:c[o]===W?1:0},n):D},e.matches=function(t,i){return e(t,null,null,i)},e.matchesSelector=function(t,i){if((t.ownerDocument||t)!==D&&N(t),i=i.replace(ht,"='$1']"),!(!w.matchesSelector||!I||M&&M.test(i)||j&&j.test(i)))try{var n=F.call(t,i);if(n||w.disconnectedMatch||t.document&&11!==t.document.nodeType)return n}catch(o){}return e(i,D,null,[t]).length>0},e.contains=function(t,e){return(t.ownerDocument||t)!==D&&N(t),q(t,e)},e.attr=function(t,e){(t.ownerDocument||t)!==D&&N(t);var i=_.attrHandle[e.toLowerCase()],n=i&&Y.call(_.attrHandle,e.toLowerCase())?i(t,e,!I):void 0;return void 0!==n?n:w.attributes||!I?t.getAttribute(e):(n=t.getAttributeNode(e))&&n.specified?n.value:null},e.error=function(t){throw new Error("Syntax error, unrecognized expression: "+t)},e.uniqueSort=function(t){var e,i=[],n=0,o=0;if(O=!w.detectDuplicates,A=!w.sortStable&&t.slice(0),t.sort(X),O){for(;e=t[o++];)e===t[o]&&(n=i.push(o));for(;n--;)t.splice(i[n],1)}return A=null,t},k=e.getText=function(t){var e,i="",n=0,o=t.nodeType;if(o){if(1===o||9===o||11===o){if("string"==typeof t.textContent)return t.textContent;for(t=t.firstChild;t;t=t.nextSibling)i+=k(t)}else if(3===o||4===o)return t.nodeValue}else for(;e=t[n++];)i+=k(e);return i},_=e.selectors={cacheLength:50,createPseudo:n,match:ft,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(t){return t[1]=t[1].replace(wt,_t),t[3]=(t[3]||t[4]||t[5]||"").replace(wt,_t),"~="===t[2]&&(t[3]=" "+t[3]+" "),t.slice(0,4)},CHILD:function(t){return t[1]=t[1].toLowerCase(),"nth"===t[1].slice(0,3)?(t[3]||e.error(t[0]),t[4]=+(t[4]?t[5]+(t[6]||1):2*("even"===t[3]||"odd"===t[3])),t[5]=+(t[7]+t[8]||"odd"===t[3])):t[3]&&e.error(t[0]),t},PSEUDO:function(t){var e,i=!t[6]&&t[2];return ft.CHILD.test(t[0])?null:(t[3]?t[2]=t[4]||t[5]||"":i&&dt.test(i)&&(e=T(i,!0))&&(e=i.indexOf(")",i.length-e)-i.length)&&(t[0]=t[0].slice(0,e),t[2]=i.slice(0,e)),t.slice(0,3))}},filter:{TAG:function(t){var e=t.replace(wt,_t).toLowerCase();return"*"===t?function(){return!0}:function(t){return t.nodeName&&t.nodeName.toLowerCase()===e}},CLASS:function(t){var e=z[t+" "];return e||(e=new RegExp("(^|"+it+")"+t+"("+it+"|$)"))&&z(t,function(t){return e.test("string"==typeof t.className&&t.className||"undefined"!=typeof t.getAttribute&&t.getAttribute("class")||"")})},ATTR:function(t,i,n){return function(o){var r=e.attr(o,t);return null==r?"!="===i:i?(r+="","="===i?r===n:"!="===i?r!==n:"^="===i?n&&0===r.indexOf(n):"*="===i?n&&r.indexOf(n)>-1:"$="===i?n&&r.slice(-n.length)===n:"~="===i?(" "+r.replace(at," ")+" ").indexOf(n)>-1:"|="===i?r===n||r.slice(0,n.length+1)===n+"-":!1):!0}},CHILD:function(t,e,i,n,o){var r="nth"!==t.slice(0,3),s="last"!==t.slice(-4),a="of-type"===e;return 1===n&&0===o?function(t){return!!t.parentNode}:function(e,i,l){var c,u,h,d,p,f,m=r!==s?"nextSibling":"previousSibling",g=e.parentNode,v=a&&e.nodeName.toLowerCase(),y=!l&&!a;if(g){if(r){for(;m;){for(h=e;h=h[m];)if(a?h.nodeName.toLowerCase()===v:1===h.nodeType)return!1;f=m="only"===t&&!f&&"nextSibling"}return!0}if(f=[s?g.firstChild:g.lastChild],s&&y){for(u=g[L]||(g[L]={}),c=u[t]||[],p=c[0]===H&&c[1],d=c[0]===H&&c[2],h=p&&g.childNodes[p];h=++p&&h&&h[m]||(d=p=0)||f.pop();)if(1===h.nodeType&&++d&&h===e){u[t]=[H,p,d];break}}else if(y&&(c=(e[L]||(e[L]={}))[t])&&c[0]===H)d=c[1];else for(;(h=++p&&h&&h[m]||(d=p=0)||f.pop())&&((a?h.nodeName.toLowerCase()!==v:1!==h.nodeType)||!++d||(y&&((h[L]||(h[L]={}))[t]=[H,d]),h!==e)););return d-=o,d===n||d%n===0&&d/n>=0}}},PSEUDO:function(t,i){var o,r=_.pseudos[t]||_.setFilters[t.toLowerCase()]||e.error("unsupported pseudo: "+t);return r[L]?r(i):r.length>1?(o=[t,t,"",i],_.setFilters.hasOwnProperty(t.toLowerCase())?n(function(t,e){for(var n,o=r(t,i),s=o.length;s--;)n=tt(t,o[s]),t[n]=!(e[n]=o[s])}):function(t){return r(t,0,o)}):r}},pseudos:{not:n(function(t){var e=[],i=[],o=S(t.replace(lt,"$1"));return o[L]?n(function(t,e,i,n){for(var r,s=o(t,null,n,[]),a=t.length;a--;)(r=s[a])&&(t[a]=!(e[a]=r))}):function(t,n,r){return e[0]=t,o(e,null,r,i),e[0]=null,!i.pop()}}),has:n(function(t){return function(i){return e(t,i).length>0}}),contains:n(function(t){return t=t.replace(wt,_t),function(e){return(e.textContent||e.innerText||k(e)).indexOf(t)>-1}}),lang:n(function(t){return pt.test(t||"")||e.error("unsupported lang: "+t),t=t.replace(wt,_t).toLowerCase(),function(e){var i;do if(i=I?e.lang:e.getAttribute("xml:lang")||e.getAttribute("lang"))return i=i.toLowerCase(),i===t||0===i.indexOf(t+"-");while((e=e.parentNode)&&1===e.nodeType);return!1}}),target:function(e){var i=t.location&&t.location.hash;return i&&i.slice(1)===e.id},root:function(t){return t===P},focus:function(t){return t===D.activeElement&&(!D.hasFocus||D.hasFocus())&&!!(t.type||t.href||~t.tabIndex)},enabled:function(t){return t.disabled===!1},disabled:function(t){return t.disabled===!0},checked:function(t){var e=t.nodeName.toLowerCase();return"input"===e&&!!t.checked||"option"===e&&!!t.selected},selected:function(t){return t.parentNode&&t.parentNode.selectedIndex,t.selected===!0},empty:function(t){for(t=t.firstChild;t;t=t.nextSibling)if(t.nodeType<6)return!1;return!0},parent:function(t){return!_.pseudos.empty(t)},header:function(t){return gt.test(t.nodeName)},input:function(t){return mt.test(t.nodeName)},button:function(t){var e=t.nodeName.toLowerCase();return"input"===e&&"button"===t.type||"button"===e},text:function(t){var e;return"input"===t.nodeName.toLowerCase()&&"text"===t.type&&(null==(e=t.getAttribute("type"))||"text"===e.toLowerCase())},first:c(function(){return[0]}),last:c(function(t,e){return[e-1]}),eq:c(function(t,e,i){return[0>i?i+e:i]}),even:c(function(t,e){for(var i=0;e>i;i+=2)t.push(i);return t}),odd:c(function(t,e){for(var i=1;e>i;i+=2)t.push(i);return t}),lt:c(function(t,e,i){for(var n=0>i?i+e:i;--n>=0;)t.push(n);return t}),gt:c(function(t,e,i){for(var n=0>i?i+e:i;++n
<e;)t.push(n);return t})}},_.pseudos.nth=_.pseudos.eq;for(x in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})_.pseudos[x]=a(x);for(x in{submit:!0,reset:!0})_.pseudos[x]=l(x);return h.prototype=_.filters=_.pseudos,_.setFilters=new h,T=e.tokenize=function(t,i){var n,o,r,s,a,l,c,u=V[t+" "];if(u)return i?0:u.slice(0);for(a=t,l=[],c=_.preFilter;a;){(!n||(o=ct.exec(a)))&&(o&&(a=a.slice(o[0].length)||a),l.push(r=[])),n=!1,(o=ut.exec(a))&&(n=o.shift(),r.push({value:n,type:o[0].replace(lt," ")}),a=a.slice(n.length));for(s in _.filter)!(o=ft[s].exec(a))||c[s]&&!(o=c[s](o))||(n=o.shift(),r.push({value:n,type:s,matches:o}),a=a.slice(n.length));if(!n)break}return i?a.length:a?e.error(t):V(t,l).slice(0)},S=e.compile=function(t,e){var i,n=[],o=[],r=Q[t+" "];if(!r){for(e||(e=T(t)),i=e.length;i--;)r=y(e[i]),r[L]?n.push(r):o.push(r);r=Q(t,b(o,n)),r.selector=t}return r},$=e.select=function(t,e,i,n){var o,r,s,a,l,c="function"==typeof t&&t,h=!n&&T(t=c.selector||t);if(i=i||[],1===h.length){if(r=h[0]=h[0].slice(0),r.length>2&&"ID"===(s=r[0]).type&&w.getById&&9===e.nodeType&&I&&_.relative[r[1].type]){if(e=(_.find.ID(s.matches[0].replace(wt,_t),e)||[])[0],!e)return i;c&&(e=e.parentNode),t=t.slice(r.shift().value.length)}for(o=ft.needsContext.test(t)?0:r.length;o--&&(s=r[o],!_.relative[a=s.type]);)if((l=_.find[a])&&(n=l(s.matches[0].replace(wt,_t),bt.test(r[0].type)&&u(e.parentNode)||e))){if(r.splice(o,1),t=n.length&&d(r),!t)return J.apply(i,n),i;break}}return(c||S(t,h))(n,e,!I,i,bt.test(t)&&u(e.parentNode)||e),i},w.sortStable=L.split("").sort(X).join("")===L,w.detectDuplicates=!!O,N(),w.sortDetached=o(function(t){return 1&t.compareDocumentPosition(D.createElement("div"))}),o(function(t){return t.innerHTML="
<a href='#'></a>","#"===t.firstChild.getAttribute("href")})||r("type|href|height|width",function(t,e,i){return i?void 0:t.getAttribute(e,"type"===e.toLowerCase()?1:2)}),w.attributes&&o(function(t){return t.innerHTML="
<input/>",t.firstChild.setAttribute("value",""),""===t.firstChild.getAttribute("value")})||r("value",function(t,e,i){return i||"input"!==t.nodeName.toLowerCase()?void 0:t.defaultValue}),o(function(t){return null==t.getAttribute("disabled")})||r(et,function(t,e,i){var n;return i?void 0:t[e]===!0?e.toLowerCase():(n=t.getAttributeNode(e))&&n.specified?n.value:null}),e}(t);Z.find=ot,Z.expr=ot.selectors,Z.expr[":"]=Z.expr.pseudos,
Z.unique=ot.uniqueSort,Z.text=ot.getText,Z.isXMLDoc=ot.isXML,Z.contains=ot.contains;var rt=Z.expr.match.needsContext,st=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,at=/^.[^:#\[\.,]*$/;Z.filter=function(t,e,i){var n=e[0];return i&&(t=":not("+t+")"),1===e.length&&1===n.nodeType?Z.find.matchesSelector(n,t)?[n]:[]:Z.find.matches(t,Z.grep(e,function(t){return 1===t.nodeType}))},Z.fn.extend({find:function(t){var e,i=this.length,n=[],o=this;if("string"!=typeof t)return this.pushStack(Z(t).filter(function(){for(e=0;i>e;e++)if(Z.contains(o[e],this))return!0}));for(e=0;i>e;e++)Z.find(t,o[e],n);return n=this.pushStack(i>1?Z.unique(n):n),n.selector=this.selector?this.selector+" "+t:t,n},filter:function(t){return this.pushStack(n(this,t||[],!1))},not:function(t){return this.pushStack(n(this,t||[],!0))},is:function(t){return!!n(this,"string"==typeof t&&rt.test(t)?Z(t):t||[],!1).length}});var lt,ct=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,ut=Z.fn.init=function(t,e){var i,n;if(!t)return this;if("string"==typeof t){if(i="<"===t[0]&&">"===t[t.length-1]&&t.length>=3?[null,t,null]:ct.exec(t),!i||!i[1]&&e)return!e||e.jquery?(e||lt).find(t):this.constructor(e).find(t);if(i[1]){if(e=e instanceof Z?e[0]:e,Z.merge(this,Z.parseHTML(i[1],e&&e.nodeType?e.ownerDocument||e:K,!0)),st.test(i[1])&&Z.isPlainObject(e))for(i in e)Z.isFunction(this[i])?this[i](e[i]):this.attr(i,e[i]);return this}return n=K.getElementById(i[2]),n&&n.parentNode&&(this.length=1,this[0]=n),this.context=K,this.selector=t,this}return t.nodeType?(this.context=this[0]=t,this.length=1,this):Z.isFunction(t)?"undefined"!=typeof lt.ready?lt.ready(t):t(Z):(void 0!==t.selector&&(this.selector=t.selector,this.context=t.context),Z.makeArray(t,this))};ut.prototype=Z.fn,lt=Z(K);var ht=/^(?:parents|prev(?:Until|All))/,dt={children:!0,contents:!0,next:!0,prev:!0};Z.extend({dir:function(t,e,i){for(var n=[],o=void 0!==i;(t=t[e])&&9!==t.nodeType;)if(1===t.nodeType){if(o&&Z(t).is(i))break;n.push(t)}return n},sibling:function(t,e){for(var i=[];t;t=t.nextSibling)1===t.nodeType&&t!==e&&i.push(t);return i}}),Z.fn.extend({has:function(t){var e=Z(t,this),i=e.length;return this.filter(function(){for(var t=0;i>t;t++)if(Z.contains(this,e[t]))return!0})},closest:function(t,e){for(var i,n=0,o=this.length,r=[],s=rt.test(t)||"string"!=typeof t?Z(t,e||this.context):0;o>n;n++)for(i=this[n];i&&i!==e;i=i.parentNode)if(i.nodeType<11&&(s?s.index(i)>-1:1===i.nodeType&&Z.find.matchesSelector(i,t))){r.push(i);break}return this.pushStack(r.length>1?Z.unique(r):r)},index:function(t){return t?"string"==typeof t?X.call(Z(t),this[0]):X.call(this,t.jquery?t[0]:t):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(t,e){return this.pushStack(Z.unique(Z.merge(this.get(),Z(t,e))))},addBack:function(t){return this.add(null==t?this.prevObject:this.prevObject.filter(t))}}),Z.each({parent:function(t){var e=t.parentNode;return e&&11!==e.nodeType?e:null},parents:function(t){return Z.dir(t,"parentNode")},parentsUntil:function(t,e,i){return Z.dir(t,"parentNode",i)},next:function(t){return o(t,"nextSibling")},prev:function(t){return o(t,"previousSibling")},nextAll:function(t){return Z.dir(t,"nextSibling")},prevAll:function(t){return Z.dir(t,"previousSibling")},nextUntil:function(t,e,i){return Z.dir(t,"nextSibling",i)},prevUntil:function(t,e,i){return Z.dir(t,"previousSibling",i)},siblings:function(t){return Z.sibling((t.parentNode||{}).firstChild,t)},children:function(t){return Z.sibling(t.firstChild)},contents:function(t){return t.contentDocument||Z.merge([],t.childNodes)}},function(t,e){Z.fn[t]=function(i,n){var o=Z.map(this,e,i);return"Until"!==t.slice(-5)&&(n=i),n&&"string"==typeof n&&(o=Z.filter(n,o)),this.length>1&&(dt[t]||Z.unique(o),ht.test(t)&&o.reverse()),this.pushStack(o)}});var pt=/\S+/g,ft={};Z.Callbacks=function(t){t="string"==typeof t?ft[t]||r(t):Z.extend({},t);var e,i,n,o,s,a,l=[],c=!t.once&&[],u=function(r){for(e=t.memory&&r,i=!0,a=o||0,o=0,s=l.length,n=!0;l&&s>a;a++)if(l[a].apply(r[0],r[1])===!1&&t.stopOnFalse){e=!1;break}n=!1,l&&(c?c.length&&u(c.shift()):e?l=[]:h.disable())},h={add:function(){if(l){var i=l.length;!function r(e){Z.each(e,function(e,i){var n=Z.type(i);"function"===n?t.unique&&h.has(i)||l.push(i):i&&i.length&&"string"!==n&&r(i)})}(arguments),n?s=l.length:e&&(o=i,u(e))}return this},remove:function(){return l&&Z.each(arguments,function(t,e){for(var i;(i=Z.inArray(e,l,i))>-1;)l.splice(i,1),n&&(s>=i&&s--,a>=i&&a--)}),this},has:function(t){return t?Z.inArray(t,l)>-1:!(!l||!l.length)},empty:function(){return l=[],s=0,this},disable:function(){return l=c=e=void 0,this},disabled:function(){return!l},lock:function(){return c=void 0,e||h.disable(),this},locked:function(){return!c},fireWith:function(t,e){return!l||i&&!c||(e=e||[],e=[t,e.slice?e.slice():e],n?c.push(e):u(e)),this},fire:function(){return h.fireWith(this,arguments),this},fired:function(){return!!i}};return h},Z.extend({Deferred:function(t){var e=[["resolve","done",Z.Callbacks("once memory"),"resolved"],["reject","fail",Z.Callbacks("once memory"),"rejected"],["notify","progress",Z.Callbacks("memory")]],i="pending",n={state:function(){return i},always:function(){return o.done(arguments).fail(arguments),this},then:function(){var t=arguments;return Z.Deferred(function(i){Z.each(e,function(e,r){var s=Z.isFunction(t[e])&&t[e];o[r[1]](function(){var t=s&&s.apply(this,arguments);t&&Z.isFunction(t.promise)?t.promise().done(i.resolve).fail(i.reject).progress(i.notify):i[r[0]+"With"](this===n?i.promise():this,s?[t]:arguments)})}),t=null}).promise()},promise:function(t){return null!=t?Z.extend(t,n):n}},o={};return n.pipe=n.then,Z.each(e,function(t,r){var s=r[2],a=r[3];n[r[1]]=s.add,a&&s.add(function(){i=a},e[1^t][2].disable,e[2][2].lock),o[r[0]]=function(){return o[r[0]+"With"](this===o?n:this,arguments),this},o[r[0]+"With"]=s.fireWith}),n.promise(o),t&&t.call(o,o),o},when:function(t){var e,i,n,o=0,r=z.call(arguments),s=r.length,a=1!==s||t&&Z.isFunction(t.promise)?s:0,l=1===a?t:Z.Deferred(),c=function(t,i,n){return function(o){i[t]=this,n[t]=arguments.length>1?z.call(arguments):o,n===e?l.notifyWith(i,n):--a||l.resolveWith(i,n)}};if(s>1)for(e=new Array(s),i=new Array(s),n=new Array(s);s>o;o++)r[o]&&Z.isFunction(r[o].promise)?r[o].promise().done(c(o,n,r)).fail(l.reject).progress(c(o,i,e)):--a;return a||l.resolveWith(n,r),l.promise()}});var mt;Z.fn.ready=function(t){return Z.ready.promise().done(t),this},Z.extend({isReady:!1,readyWait:1,holdReady:function(t){t?Z.readyWait++:Z.ready(!0)},ready:function(t){(t===!0?--Z.readyWait:Z.isReady)||(Z.isReady=!0,t!==!0&&--Z.readyWait>0||(mt.resolveWith(K,[Z]),Z.fn.triggerHandler&&(Z(K).triggerHandler("ready"),Z(K).off("ready"))))}}),Z.ready.promise=function(e){return mt||(mt=Z.Deferred(),"complete"===K.readyState?setTimeout(Z.ready):(K.addEventListener("DOMContentLoaded",s,!1),t.addEventListener("load",s,!1))),mt.promise(e)},Z.ready.promise();var gt=Z.access=function(t,e,i,n,o,r,s){var a=0,l=t.length,c=null==i;if("object"===Z.type(i)){o=!0;for(a in i)Z.access(t,e,a,i[a],!0,r,s)}else if(void 0!==n&&(o=!0,Z.isFunction(n)||(s=!0),c&&(s?(e.call(t,n),e=null):(c=e,e=function(t,e,i){return c.call(Z(t),i)})),e))for(;l>a;a++)e(t[a],i,s?n:n.call(t[a],a,e(t[a],i)));return o?t:c?e.call(t):l?e(t[0],i):r};Z.acceptData=function(t){return 1===t.nodeType||9===t.nodeType||!+t.nodeType},a.uid=1,a.accepts=Z.acceptData,a.prototype={key:function(t){if(!a.accepts(t))return 0;var e={},i=t[this.expando];if(!i){i=a.uid++;try{e[this.expando]={value:i},Object.defineProperties(t,e)}catch(n){e[this.expando]=i,Z.extend(t,e)}}return this.cache[i]||(this.cache[i]={}),i},set:function(t,e,i){var n,o=this.key(t),r=this.cache[o];if("string"==typeof e)r[e]=i;else if(Z.isEmptyObject(r))Z.extend(this.cache[o],e);else for(n in e)r[n]=e[n];return r},get:function(t,e){var i=this.cache[this.key(t)];return void 0===e?i:i[e]},access:function(t,e,i){var n;return void 0===e||e&&"string"==typeof e&&void 0===i?(n=this.get(t,e),void 0!==n?n:this.get(t,Z.camelCase(e))):(this.set(t,e,i),void 0!==i?i:e)},remove:function(t,e){var i,n,o,r=this.key(t),s=this.cache[r];if(void 0===e)this.cache[r]={};else{Z.isArray(e)?n=e.concat(e.map(Z.camelCase)):(o=Z.camelCase(e),e in s?n=[e,o]:(n=o,n=n in s?[n]:n.match(pt)||[])),i=n.length;for(;i--;)delete s[n[i]]}},hasData:function(t){return!Z.isEmptyObject(this.cache[t[this.expando]]||{})},discard:function(t){t[this.expando]&&delete this.cache[t[this.expando]]}};var vt=new a,yt=new a,bt=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,xt=/([A-Z])/g;Z.extend({hasData:function(t){return yt.hasData(t)||vt.hasData(t)},data:function(t,e,i){return yt.access(t,e,i)},removeData:function(t,e){yt.remove(t,e)},_data:function(t,e,i){return vt.access(t,e,i)},_removeData:function(t,e){vt.remove(t,e)}}),Z.fn.extend({data:function(t,e){var i,n,o,r=this[0],s=r&&r.attributes;if(void 0===t){if(this.length&&(o=yt.get(r),1===r.nodeType&&!vt.get(r,"hasDataAttrs"))){for(i=s.length;i--;)s[i]&&(n=s[i].name,0===n.indexOf("data-")&&(n=Z.camelCase(n.slice(5)),l(r,n,o[n])));vt.set(r,"hasDataAttrs",!0)}return o}return"object"==typeof t?this.each(function(){yt.set(this,t)}):gt(this,function(e){var i,n=Z.camelCase(t);if(r&&void 0===e){if(i=yt.get(r,t),void 0!==i)return i;if(i=yt.get(r,n),void 0!==i)return i;if(i=l(r,n,void 0),void 0!==i)return i}else this.each(function(){var i=yt.get(this,n);yt.set(this,n,e),-1!==t.indexOf("-")&&void 0!==i&&yt.set(this,t,e)})},null,e,arguments.length>1,null,!0)},removeData:function(t){return this.each(function(){yt.remove(this,t)})}}),Z.extend({queue:function(t,e,i){var n;return t?(e=(e||"fx")+"queue",n=vt.get(t,e),i&&(!n||Z.isArray(i)?n=vt.access(t,e,Z.makeArray(i)):n.push(i)),n||[]):void 0},dequeue:function(t,e){e=e||"fx";var i=Z.queue(t,e),n=i.length,o=i.shift(),r=Z._queueHooks(t,e),s=function(){Z.dequeue(t,e)};"inprogress"===o&&(o=i.shift(),n--),o&&("fx"===e&&i.unshift("inprogress"),delete r.stop,o.call(t,s,r)),!n&&r&&r.empty.fire()},_queueHooks:function(t,e){var i=e+"queueHooks";return vt.get(t,i)||vt.access(t,i,{empty:Z.Callbacks("once memory").add(function(){vt.remove(t,[e+"queue",i])})})}}),Z.fn.extend({queue:function(t,e){var i=2;return"string"!=typeof t&&(e=t,t="fx",i--),arguments.length
<i?Z.queue(this[0],t):void 0===e?this:this.each(function(){var i=Z.queue(this,t,e);Z._queueHooks(this,t),"fx"===t&&"inprogress"!==i[0]&&Z.dequeue(this,t)})},dequeue:function(t){return this.each(function(){Z.dequeue(this,t)})},clearQueue:function(t){return this.queue(t||"fx",[])},promise:function(t,e){var i,n=1,o=Z.Deferred(),r=this,s=this.length,a=function(){--n||o.resolveWith(r,[r])};for("string"!=typeof t&&(e=t,t=void 0),t=t||"fx";s--;)i=vt.get(r[s],t+"queueHooks"),i&&i.empty&&(n++,i.empty.add(a));return a(),o.promise(e)}});var wt=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,_t=["Top","Right","Bottom","Left"],kt=function(t,e){return t=e||t,"none"===Z.css(t,"display")||!Z.contains(t.ownerDocument,t)},Ct=/^(?:checkbox|radio)$/i;!function(){var t=K.createDocumentFragment(),e=t.appendChild(K.createElement("div")),i=K.createElement("input");i.setAttribute("type","radio"),i.setAttribute("checked","checked"),i.setAttribute("name","t"),e.appendChild(i),G.checkClone=e.cloneNode(!0).cloneNode(!0).lastChild.checked,e.innerHTML="
<textarea>x</textarea>",G.noCloneChecked=!!e.cloneNode(!0).lastChild.defaultValue}();var Tt="undefined";G.focusinBubbles="onfocusin"in t;var St=/^key/,$t=/^(?:mouse|pointer|contextmenu)|click/,Et=/^(?:focusinfocus|focusoutblur)$/,At=/^([^.]*)(?:\.(.+)|)$/;Z.event={global:{},add:function(t,e,i,n,o){var r,s,a,l,c,u,h,d,p,f,m,g=vt.get(t);if(g)for(i.handler&&(r=i,i=r.handler,o=r.selector),i.guid||(i.guid=Z.guid++),(l=g.events)||(l=g.events={}),(s=g.handle)||(s=g.handle=function(e){return typeof Z!==Tt&&Z.event.triggered!==e.type?Z.event.dispatch.apply(t,arguments):void 0}),e=(e||"").match(pt)||[""],c=e.length;c--;)a=At.exec(e[c])||[],p=m=a[1],f=(a[2]||"").split(".").sort(),p&&(h=Z.event.special[p]||{},p=(o?h.delegateType:h.bindType)||p,h=Z.event.special[p]||{},u=Z.extend({type:p,origType:m,data:n,handler:i,guid:i.guid,selector:o,needsContext:o&&Z.expr.match.needsContext.test(o),namespace:f.join(".")},r),(d=l[p])||(d=l[p]=[],d.delegateCount=0,h.setup&&h.setup.call(t,n,f,s)!==!1||t.addEventListener&&t.addEventListener(p,s,!1)),h.add&&(h.add.call(t,u),u.handler.guid||(u.handler.guid=i.guid)),o?d.splice(d.delegateCount++,0,u):d.push(u),Z.event.global[p]=!0)},remove:function(t,e,i,n,o){var r,s,a,l,c,u,h,d,p,f,m,g=vt.hasData(t)&&vt.get(t);if(g&&(l=g.events)){for(e=(e||"").match(pt)||[""],c=e.length;c--;)if(a=At.exec(e[c])||[],p=m=a[1],f=(a[2]||"").split(".").sort(),p){for(h=Z.event.special[p]||{},p=(n?h.delegateType:h.bindType)||p,d=l[p]||[],a=a[2]&&new RegExp("(^|\\.)"+f.join("\\.(?:.*\\.|)")+"(\\.|$)"),s=r=d.length;r--;)u=d[r],!o&&m!==u.origType||i&&i.guid!==u.guid||a&&!a.test(u.namespace)||n&&n!==u.selector&&("**"!==n||!u.selector)||(d.splice(r,1),u.selector&&d.delegateCount--,h.remove&&h.remove.call(t,u));s&&!d.length&&(h.teardown&&h.teardown.call(t,f,g.handle)!==!1||Z.removeEvent(t,p,g.handle),delete l[p])}else for(p in l)Z.event.remove(t,p+e[c],i,n,!0);Z.isEmptyObject(l)&&(delete g.handle,vt.remove(t,"events"))}},trigger:function(e,i,n,o){var r,s,a,l,c,u,h,d=[n||K],p=U.call(e,"type")?e.type:e,f=U.call(e,"namespace")?e.namespace.split("."):[];if(s=a=n=n||K,3!==n.nodeType&&8!==n.nodeType&&!Et.test(p+Z.event.triggered)&&(p.indexOf(".")>=0&&(f=p.split("."),p=f.shift(),f.sort()),c=p.indexOf(":")<0&&"on"+p,e=e[Z.expando]?e:new Z.Event(p,"object"==typeof e&&e),e.isTrigger=o?2:3,e.namespace=f.join("."),e.namespace_re=e.namespace?new RegExp("(^|\\.)"+f.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,e.result=void 0,e.target||(e.target=n),i=null==i?[e]:Z.makeArray(i,[e]),h=Z.event.special[p]||{},o||!h.trigger||h.trigger.apply(n,i)!==!1)){if(!o&&!h.noBubble&&!Z.isWindow(n)){for(l=h.delegateType||p,Et.test(l+p)||(s=s.parentNode);s;s=s.parentNode)d.push(s),a=s;a===(n.ownerDocument||K)&&d.push(a.defaultView||a.parentWindow||t)}for(r=0;(s=d[r++])&&!e.isPropagationStopped();)e.type=r>1?l:h.bindType||p,u=(vt.get(s,"events")||{})[e.type]&&vt.get(s,"handle"),u&&u.apply(s,i),u=c&&s[c],u&&u.apply&&Z.acceptData(s)&&(e.result=u.apply(s,i),e.result===!1&&e.preventDefault());return e.type=p,o||e.isDefaultPrevented()||h._default&&h._default.apply(d.pop(),i)!==!1||!Z.acceptData(n)||c&&Z.isFunction(n[p])&&!Z.isWindow(n)&&(a=n[c],a&&(n[c]=null),Z.event.triggered=p,n[p](),Z.event.triggered=void 0,a&&(n[c]=a)),e.result}},dispatch:function(t){t=Z.event.fix(t);var e,i,n,o,r,s=[],a=z.call(arguments),l=(vt.get(this,"events")||{})[t.type]||[],c=Z.event.special[t.type]||{};if(a[0]=t,t.delegateTarget=this,!c.preDispatch||c.preDispatch.call(this,t)!==!1){for(s=Z.event.handlers.call(this,t,l),e=0;(o=s[e++])&&!t.isPropagationStopped();)for(t.currentTarget=o.elem,i=0;(r=o.handlers[i++])&&!t.isImmediatePropagationStopped();)(!t.namespace_re||t.namespace_re.test(r.namespace))&&(t.handleObj=r,t.data=r.data,n=((Z.event.special[r.origType]||{}).handle||r.handler).apply(o.elem,a),void 0!==n&&(t.result=n)===!1&&(t.preventDefault(),t.stopPropagation()));return c.postDispatch&&c.postDispatch.call(this,t),t.result}},handlers:function(t,e){var i,n,o,r,s=[],a=e.delegateCount,l=t.target;if(a&&l.nodeType&&(!t.button||"click"!==t.type))for(;l!==this;l=l.parentNode||this)if(l.disabled!==!0||"click"!==t.type){for(n=[],i=0;a>i;i++)r=e[i],o=r.selector+" ",void 0===n[o]&&(n[o]=r.needsContext?Z(o,this).index(l)>=0:Z.find(o,this,null,[l]).length),n[o]&&n.push(r);n.length&&s.push({elem:l,handlers:n})}return a
<e.length&&s.push({elem:this,handlers:e.slice(a)}),s},props:"altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(t,e){return null==t.which&&(t.which=null!=e.charCode?e.charCode:e.keyCode),t}},mouseHooks:{props:"button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(t,e){var i,n,o,r=e.button;return null==t.pageX&&null!=e.clientX&&(i=t.target.ownerDocument||K,n=i.documentElement,o=i.body,t.pageX=e.clientX+(n&&n.scrollLeft||o&&o.scrollLeft||0)-(n&&n.clientLeft||o&&o.clientLeft||0),t.pageY=e.clientY+(n&&n.scrollTop||o&&o.scrollTop||0)-(n&&n.clientTop||o&&o.clientTop||0)),t.which||void 0===r||(t.which=1&r?1:2&r?3:4&r?2:0),t}},fix:function(t){if(t[Z.expando])return t;var e,i,n,o=t.type,r=t,s=this.fixHooks[o];for(s||(this.fixHooks[o]=s=$t.test(o)?this.mouseHooks:St.test(o)?this.keyHooks:{}),n=s.props?this.props.concat(s.props):this.props,t=new Z.Event(r),e=n.length;e--;)i=n[e],t[i]=r[i];return t.target||(t.target=K),3===t.target.nodeType&&(t.target=t.target.parentNode),s.filter?s.filter(t,r):t},special:{load:{noBubble:!0},focus:{trigger:function(){return this!==h()&&this.focus?(this.focus(),!1):void 0},delegateType:"focusin"},blur:{trigger:function(){return this===h()&&this.blur?(this.blur(),!1):void 0},delegateType:"focusout"},click:{trigger:function(){return"checkbox"===this.type&&this.click&&Z.nodeName(this,"input")?(this.click(),!1):void 0},_default:function(t){return Z.nodeName(t.target,"a")}},beforeunload:{postDispatch:function(t){void 0!==t.result&&t.originalEvent&&(t.originalEvent.returnValue=t.result)}}},simulate:function(t,e,i,n){var o=Z.extend(new Z.Event,i,{type:t,isSimulated:!0,originalEvent:{}});n?Z.event.trigger(o,null,e):Z.event.dispatch.call(e,o),o.isDefaultPrevented()&&i.preventDefault()}},Z.removeEvent=function(t,e,i){t.removeEventListener&&t.removeEventListener(e,i,!1)},Z.Event=function(t,e){return this instanceof Z.Event?(t&&t.type?(this.originalEvent=t,this.type=t.type,this.isDefaultPrevented=t.defaultPrevented||void 0===t.defaultPrevented&&t.returnValue===!1?c:u):this.type=t,e&&Z.extend(this,e),this.timeStamp=t&&t.timeStamp||Z.now(),void(this[Z.expando]=!0)):new Z.Event(t,e)},Z.Event.prototype={isDefaultPrevented:u,isPropagationStopped:u,isImmediatePropagationStopped:u,preventDefault:function(){var t=this.originalEvent;this.isDefaultPrevented=c,t&&t.preventDefault&&t.preventDefault()},stopPropagation:function(){var t=this.originalEvent;this.isPropagationStopped=c,t&&t.stopPropagation&&t.stopPropagation()},stopImmediatePropagation:function(){var t=this.originalEvent;this.isImmediatePropagationStopped=c,t&&t.stopImmediatePropagation&&t.stopImmediatePropagation(),this.stopPropagation()}},Z.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(t,e){Z.event.special[t]={delegateType:e,bindType:e,handle:function(t){var i,n=this,o=t.relatedTarget,r=t.handleObj;return(!o||o!==n&&!Z.contains(n,o))&&(t.type=r.origType,i=r.handler.apply(this,arguments),t.type=e),i}}}),G.focusinBubbles||Z.each({focus:"focusin",blur:"focusout"},function(t,e){var i=function(t){Z.event.simulate(e,t.target,Z.event.fix(t),!0)};Z.event.special[e]={setup:function(){var n=this.ownerDocument||this,o=vt.access(n,e);o||n.addEventListener(t,i,!0),vt.access(n,e,(o||0)+1)},teardown:function(){var n=this.ownerDocument||this,o=vt.access(n,e)-1;o?vt.access(n,e,o):(n.removeEventListener(t,i,!0),vt.remove(n,e))}}}),Z.fn.extend({on:function(t,e,i,n,o){var r,s;if("object"==typeof t){"string"!=typeof e&&(i=i||e,e=void 0);for(s in t)this.on(s,e,i,t[s],o);return this}if(null==i&&null==n?(n=e,i=e=void 0):null==n&&("string"==typeof e?(n=i,i=void 0):(n=i,i=e,e=void 0)),n===!1)n=u;else if(!n)return this;return 1===o&&(r=n,n=function(t){return Z().off(t),r.apply(this,arguments)},n.guid=r.guid||(r.guid=Z.guid++)),this.each(function(){Z.event.add(this,t,n,i,e)})},one:function(t,e,i,n){return this.on(t,e,i,n,1)},off:function(t,e,i){var n,o;if(t&&t.preventDefault&&t.handleObj)return n=t.handleObj,Z(t.delegateTarget).off(n.namespace?n.origType+"."+n.namespace:n.origType,n.selector,n.handler),this;if("object"==typeof t){for(o in t)this.off(o,e,t[o]);return this}return(e===!1||"function"==typeof e)&&(i=e,e=void 0),i===!1&&(i=u),this.each(function(){Z.event.remove(this,t,i,e)})},trigger:function(t,e){return this.each(function(){Z.event.trigger(t,e,this)})},triggerHandler:function(t,e){var i=this[0];return i?Z.event.trigger(t,e,i,!0):void 0}});var Ot=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,Nt=/<([\w:]+)/,Dt=/<|&#?\w+;/,Pt=/<(?:script|style|link)/i,It=/checked\s*(?:[^=]|=\s*.checked.)/i,jt=/^$|\/(?:java|ecma)script/i,Mt=/^true\/(.*)/,Ft=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,qt={option:[1,"
<select multiple='multiple'>","</select>"],thead:[1,"
<table>","</table>"],col:[2,"
<table>
    <colgroup>","</colgroup>
</table>"],tr:[2,"
<table>
    <tbody>","</tbody>
</table>"],td:[3,"
<table>
    <tbody>
    <tr>","</tr>
    </tbody>
</table>"],_default:[0,"",""]};qt.optgroup=qt.option,qt.tbody=qt.tfoot=qt.colgroup=qt.caption=qt.thead,qt.th=qt.td,Z.extend({clone:function(t,e,i){var n,o,r,s,a=t.cloneNode(!0),l=Z.contains(t.ownerDocument,t);if(!(G.noCloneChecked||1!==t.nodeType&&11!==t.nodeType||Z.isXMLDoc(t)))for(s=v(a),r=v(t),n=0,o=r.length;o>n;n++)y(r[n],s[n]);if(e)if(i)for(r=r||v(t),s=s||v(a),n=0,o=r.length;o>n;n++)g(r[n],s[n]);else g(t,a);return s=v(a,"script"),s.length>0&&m(s,!l&&v(t,"script")),a},buildFragment:function(t,e,i,n){for(var o,r,s,a,l,c,u=e.createDocumentFragment(),h=[],d=0,p=t.length;p>d;d++)if(o=t[d],o||0===o)if("object"===Z.type(o))Z.merge(h,o.nodeType?[o]:o);else if(Dt.test(o)){for(r=r||u.appendChild(e.createElement("div")),s=(Nt.exec(o)||["",""])[1].toLowerCase(),a=qt[s]||qt._default,r.innerHTML=a[1]+o.replace(Ot,"<$1></$2>")+a[2],c=a[0];c--;)r=r.lastChild;Z.merge(h,r.childNodes),r=u.firstChild,r.textContent=""}else h.push(e.createTextNode(o));for(u.textContent="",d=0;o=h[d++];)if((!n||-1===Z.inArray(o,n))&&(l=Z.contains(o.ownerDocument,o),r=v(u.appendChild(o),"script"),l&&m(r),i))for(c=0;o=r[c++];)jt.test(o.type||"")&&i.push(o);return u},cleanData:function(t){for(var e,i,n,o,r=Z.event.special,s=0;void 0!==(i=t[s]);s++){if(Z.acceptData(i)&&(o=i[vt.expando],o&&(e=vt.cache[o]))){if(e.events)for(n in e.events)r[n]?Z.event.remove(i,n):Z.removeEvent(i,n,e.handle);vt.cache[o]&&delete vt.cache[o]}delete yt.cache[i[yt.expando]]}}}),Z.fn.extend({text:function(t){return gt(this,function(t){return void 0===t?Z.text(this):this.empty().each(function(){(1===this.nodeType||11===this.nodeType||9===this.nodeType)&&(this.textContent=t)})},null,t,arguments.length)},append:function(){return this.domManip(arguments,function(t){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var e=d(this,t);e.appendChild(t)}})},prepend:function(){return this.domManip(arguments,function(t){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var e=d(this,t);e.insertBefore(t,e.firstChild)}})},before:function(){return this.domManip(arguments,function(t){this.parentNode&&this.parentNode.insertBefore(t,this)})},after:function(){return this.domManip(arguments,function(t){this.parentNode&&this.parentNode.insertBefore(t,this.nextSibling)})},remove:function(t,e){for(var i,n=t?Z.filter(t,this):this,o=0;null!=(i=n[o]);o++)e||1!==i.nodeType||Z.cleanData(v(i)),i.parentNode&&(e&&Z.contains(i.ownerDocument,i)&&m(v(i,"script")),i.parentNode.removeChild(i));return this},empty:function(){for(var t,e=0;null!=(t=this[e]);e++)1===t.nodeType&&(Z.cleanData(v(t,!1)),t.textContent="");return this},clone:function(t,e){return t=null==t?!1:t,e=null==e?t:e,this.map(function(){return Z.clone(this,t,e)})},html:function(t){return gt(this,function(t){var e=this[0]||{},i=0,n=this.length;if(void 0===t&&1===e.nodeType)return e.innerHTML;if("string"==typeof t&&!Pt.test(t)&&!qt[(Nt.exec(t)||["",""])[1].toLowerCase()]){t=t.replace(Ot,"<$1></$2>");try{for(;n>i;i++)e=this[i]||{},1===e.nodeType&&(Z.cleanData(v(e,!1)),e.innerHTML=t);e=0}catch(o){}}e&&this.empty().append(t)},null,t,arguments.length)},replaceWith:function(){var t=arguments[0];return this.domManip(arguments,function(e){t=this.parentNode,Z.cleanData(v(this)),t&&t.replaceChild(e,this)}),t&&(t.length||t.nodeType)?this:this.remove()},detach:function(t){return this.remove(t,!0)},domManip:function(t,e){t=V.apply([],t);var i,n,o,r,s,a,l=0,c=this.length,u=this,h=c-1,d=t[0],m=Z.isFunction(d);if(m||c>1&&"string"==typeof d&&!G.checkClone&&It.test(d))return this.each(function(i){var n=u.eq(i);m&&(t[0]=d.call(this,i,n.html())),n.domManip(t,e)});if(c&&(i=Z.buildFragment(t,this[0].ownerDocument,!1,this),n=i.firstChild,1===i.childNodes.length&&(i=n),n)){for(o=Z.map(v(i,"script"),p),r=o.length;c>l;l++)s=i,l!==h&&(s=Z.clone(s,!0,!0),r&&Z.merge(o,v(s,"script"))),e.call(this[l],s,l);if(r)for(a=o[o.length-1].ownerDocument,Z.map(o,f),l=0;r>l;l++)s=o[l],jt.test(s.type||"")&&!vt.access(s,"globalEval")&&Z.contains(a,s)&&(s.src?Z._evalUrl&&Z._evalUrl(s.src):Z.globalEval(s.textContent.replace(Ft,"")))}return this}}),Z.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(t,e){Z.fn[t]=function(t){for(var i,n=[],o=Z(t),r=o.length-1,s=0;r>=s;s++)i=s===r?this:this.clone(!0),Z(o[s])[e](i),Q.apply(n,i.get());return this.pushStack(n)}});var Lt,Wt={},Ht=/^margin/,Rt=new RegExp("^("+wt+")(?!px)[a-z%]+$","i"),zt=function(e){return e.ownerDocument.defaultView.opener?e.ownerDocument.defaultView.getComputedStyle(e,null):t.getComputedStyle(e,null)};!function(){function e(){s.style.cssText="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute",s.innerHTML="",o.appendChild(r);var e=t.getComputedStyle(s,null);i="1%"!==e.top,n="4px"===e.width,o.removeChild(r)}var i,n,o=K.documentElement,r=K.createElement("div"),s=K.createElement("div");s.style&&(s.style.backgroundClip="content-box",s.cloneNode(!0).style.backgroundClip="",G.clearCloneStyle="content-box"===s.style.backgroundClip,r.style.cssText="border:0;width:0;height:0;top:0;left:-9999px;margin-top:1px;position:absolute",r.appendChild(s),t.getComputedStyle&&Z.extend(G,{pixelPosition:function(){return e(),i},boxSizingReliable:function(){return null==n&&e(),n},reliableMarginRight:function(){var e,i=s.appendChild(K.createElement("div"));return i.style.cssText=s.style.cssText="-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0",i.style.marginRight=i.style.width="0",s.style.width="1px",o.appendChild(r),e=!parseFloat(t.getComputedStyle(i,null).marginRight),o.removeChild(r),s.removeChild(i),e}}))}(),Z.swap=function(t,e,i,n){var o,r,s={};for(r in e)s[r]=t.style[r],t.style[r]=e[r];o=i.apply(t,n||[]);for(r in e)t.style[r]=s[r];return o};var Vt=/^(none|table(?!-c[ea]).+)/,Qt=new RegExp("^("+wt+")(.*)$","i"),Xt=new RegExp("^([+-])=("+wt+")","i"),Bt={position:"absolute",visibility:"hidden",display:"block"},Yt={letterSpacing:"0",fontWeight:"400"},Ut=["Webkit","O","Moz","ms"];Z.extend({cssHooks:{opacity:{get:function(t,e){if(e){var i=w(t,"opacity");return""===i?"1":i}}}},cssNumber:{columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":"cssFloat"},style:function(t,e,i,n){if(t&&3!==t.nodeType&&8!==t.nodeType&&t.style){var o,r,s,a=Z.camelCase(e),l=t.style;return e=Z.cssProps[a]||(Z.cssProps[a]=k(l,a)),s=Z.cssHooks[e]||Z.cssHooks[a],void 0===i?s&&"get"in s&&void 0!==(o=s.get(t,!1,n))?o:l[e]:(r=typeof i,"string"===r&&(o=Xt.exec(i))&&(i=(o[1]+1)*o[2]+parseFloat(Z.css(t,e)),r="number"),void(null!=i&&i===i&&("number"!==r||Z.cssNumber[a]||(i+="px"),G.clearCloneStyle||""!==i||0!==e.indexOf("background")||(l[e]="inherit"),s&&"set"in s&&void 0===(i=s.set(t,i,n))||(l[e]=i))))}},css:function(t,e,i,n){var o,r,s,a=Z.camelCase(e);return e=Z.cssProps[a]||(Z.cssProps[a]=k(t.style,a)),s=Z.cssHooks[e]||Z.cssHooks[a],s&&"get"in s&&(o=s.get(t,!0,i)),void 0===o&&(o=w(t,e,n)),"normal"===o&&e in Yt&&(o=Yt[e]),""===i||i?(r=parseFloat(o),i===!0||Z.isNumeric(r)?r||0:o):o}}),Z.each(["height","width"],function(t,e){Z.cssHooks[e]={get:function(t,i,n){return i?Vt.test(Z.css(t,"display"))&&0===t.offsetWidth?Z.swap(t,Bt,function(){return S(t,e,n)}):S(t,e,n):void 0},set:function(t,i,n){var o=n&&zt(t);return C(t,i,n?T(t,e,n,"border-box"===Z.css(t,"boxSizing",!1,o),o):0)}}}),Z.cssHooks.marginRight=_(G.reliableMarginRight,function(t,e){return e?Z.swap(t,{display:"inline-block"},w,[t,"marginRight"]):void 0}),Z.each({margin:"",padding:"",border:"Width"},function(t,e){Z.cssHooks[t+e]={expand:function(i){for(var n=0,o={},r="string"==typeof i?i.split(" "):[i];4>n;n++)o[t+_t[n]+e]=r[n]||r[n-2]||r[0];return o}},Ht.test(t)||(Z.cssHooks[t+e].set=C)}),Z.fn.extend({css:function(t,e){return gt(this,function(t,e,i){var n,o,r={},s=0;if(Z.isArray(e)){for(n=zt(t),o=e.length;o>s;s++)r[e[s]]=Z.css(t,e[s],!1,n);return r}return void 0!==i?Z.style(t,e,i):Z.css(t,e)},t,e,arguments.length>1)},show:function(){return $(this,!0)},hide:function(){return $(this)},toggle:function(t){return"boolean"==typeof t?t?this.show():this.hide():this.each(function(){kt(this)?Z(this).show():Z(this).hide()})}}),Z.Tween=E,E.prototype={constructor:E,init:function(t,e,i,n,o,r){this.elem=t,this.prop=i,this.easing=o||"swing",this.options=e,this.start=this.now=this.cur(),this.end=n,this.unit=r||(Z.cssNumber[i]?"":"px")},cur:function(){var t=E.propHooks[this.prop];return t&&t.get?t.get(this):E.propHooks._default.get(this)},run:function(t){var e,i=E.propHooks[this.prop];return this.pos=e=this.options.duration?Z.easing[this.easing](t,this.options.duration*t,0,1,this.options.duration):t,this.now=(this.end-this.start)*e+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),i&&i.set?i.set(this):E.propHooks._default.set(this),this}},E.prototype.init.prototype=E.prototype,E.propHooks={_default:{get:function(t){var e;return null==t.elem[t.prop]||t.elem.style&&null!=t.elem.style[t.prop]?(e=Z.css(t.elem,t.prop,""),e&&"auto"!==e?e:0):t.elem[t.prop]},set:function(t){Z.fx.step[t.prop]?Z.fx.step[t.prop](t):t.elem.style&&(null!=t.elem.style[Z.cssProps[t.prop]]||Z.cssHooks[t.prop])?Z.style(t.elem,t.prop,t.now+t.unit):t.elem[t.prop]=t.now}}},E.propHooks.scrollTop=E.propHooks.scrollLeft={set:function(t){t.elem.nodeType&&t.elem.parentNode&&(t.elem[t.prop]=t.now)}},Z.easing={linear:function(t){return t},swing:function(t){return.5-Math.cos(t*Math.PI)/2}},Z.fx=E.prototype.init,Z.fx.step={};var Gt,Kt,Jt=/^(?:toggle|show|hide)$/,Zt=new RegExp("^(?:([+-])=|)("+wt+")([a-z%]*)$","i"),te=/queueHooks$/,ee=[D],ie={"*":[function(t,e){var i=this.createTween(t,e),n=i.cur(),o=Zt.exec(e),r=o&&o[3]||(Z.cssNumber[t]?"":"px"),s=(Z.cssNumber[t]||"px"!==r&&+n)&&Zt.exec(Z.css(i.elem,t)),a=1,l=20;if(s&&s[3]!==r){r=r||s[3],o=o||[],s=+n||1;do a=a||".5",s/=a,Z.style(i.elem,t,s+r);while(a!==(a=i.cur()/n)&&1!==a&&--l)}return o&&(s=i.start=+s||+n||0,i.unit=r,i.end=o[1]?s+(o[1]+1)*o[2]:+o[2]),i}]};Z.Animation=Z.extend(I,{tweener:function(t,e){Z.isFunction(t)?(e=t,t=["*"]):t=t.split(" ");for(var i,n=0,o=t.length;o>n;n++)i=t[n],ie[i]=ie[i]||[],ie[i].unshift(e)},prefilter:function(t,e){e?ee.unshift(t):ee.push(t)}}),Z.speed=function(t,e,i){var n=t&&"object"==typeof t?Z.extend({},t):{complete:i||!i&&e||Z.isFunction(t)&&t,duration:t,easing:i&&e||e&&!Z.isFunction(e)&&e};return n.duration=Z.fx.off?0:"number"==typeof n.duration?n.duration:n.duration in Z.fx.speeds?Z.fx.speeds[n.duration]:Z.fx.speeds._default,(null==n.queue||n.queue===!0)&&(n.queue="fx"),n.old=n.complete,n.complete=function(){Z.isFunction(n.old)&&n.old.call(this),n.queue&&Z.dequeue(this,n.queue)},n},Z.fn.extend({fadeTo:function(t,e,i,n){return this.filter(kt).css("opacity",0).show().end().animate({opacity:e},t,i,n)},animate:function(t,e,i,n){var o=Z.isEmptyObject(t),r=Z.speed(e,i,n),s=function(){var e=I(this,Z.extend({},t),r);(o||vt.get(this,"finish"))&&e.stop(!0)};return s.finish=s,o||r.queue===!1?this.each(s):this.queue(r.queue,s)},stop:function(t,e,i){var n=function(t){var e=t.stop;delete t.stop,e(i)};return"string"!=typeof t&&(i=e,e=t,t=void 0),e&&t!==!1&&this.queue(t||"fx",[]),this.each(function(){var e=!0,o=null!=t&&t+"queueHooks",r=Z.timers,s=vt.get(this);
if(o)s[o]&&s[o].stop&&n(s[o]);else for(o in s)s[o]&&s[o].stop&&te.test(o)&&n(s[o]);for(o=r.length;o--;)r[o].elem!==this||null!=t&&r[o].queue!==t||(r[o].anim.stop(i),e=!1,r.splice(o,1));(e||!i)&&Z.dequeue(this,t)})},finish:function(t){return t!==!1&&(t=t||"fx"),this.each(function(){var e,i=vt.get(this),n=i[t+"queue"],o=i[t+"queueHooks"],r=Z.timers,s=n?n.length:0;for(i.finish=!0,Z.queue(this,t,[]),o&&o.stop&&o.stop.call(this,!0),e=r.length;e--;)r[e].elem===this&&r[e].queue===t&&(r[e].anim.stop(!0),r.splice(e,1));for(e=0;s>e;e++)n[e]&&n[e].finish&&n[e].finish.call(this);delete i.finish})}}),Z.each(["toggle","show","hide"],function(t,e){var i=Z.fn[e];Z.fn[e]=function(t,n,o){return null==t||"boolean"==typeof t?i.apply(this,arguments):this.animate(O(e,!0),t,n,o)}}),Z.each({slideDown:O("show"),slideUp:O("hide"),slideToggle:O("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(t,e){Z.fn[t]=function(t,i,n){return this.animate(e,t,i,n)}}),Z.timers=[],Z.fx.tick=function(){var t,e=0,i=Z.timers;for(Gt=Z.now();e
<i.length;e++)t=i[e],t()||i[e]!==t||i.splice(e--,1);i.length||Z.fx.stop(),Gt=void 0},Z.fx.timer=function(t){Z.timers.push(t),t()?Z.fx.start():Z.timers.pop()},Z.fx.interval=13,Z.fx.start=function(){Kt||(Kt=setInterval(Z.fx.tick,Z.fx.interval))},Z.fx.stop=function(){clearInterval(Kt),Kt=null},Z.fx.speeds={slow:600,fast:200,_default:400},Z.fn.delay=function(t,e){return t=Z.fx?Z.fx.speeds[t]||t:t,e=e||"fx",this.queue(e,function(e,i){var n=setTimeout(e,t);i.stop=function(){clearTimeout(n)}})},function(){var t=K.createElement("input"),e=K.createElement("select"),i=e.appendChild(K.createElement("option"));t.type="checkbox",G.checkOn=""!==t.value,G.optSelected=i.selected,e.disabled=!0,G.optDisabled=!i.disabled,t=K.createElement("input"),t.value="t",t.type="radio",G.radioValue="t"===t.value}();var ne,oe,re=Z.expr.attrHandle;Z.fn.extend({attr:function(t,e){return gt(this,Z.attr,t,e,arguments.length>1)},removeAttr:function(t){return this.each(function(){Z.removeAttr(this,t)})}}),Z.extend({attr:function(t,e,i){var n,o,r=t.nodeType;return t&&3!==r&&8!==r&&2!==r?typeof t.getAttribute===Tt?Z.prop(t,e,i):(1===r&&Z.isXMLDoc(t)||(e=e.toLowerCase(),n=Z.attrHooks[e]||(Z.expr.match.bool.test(e)?oe:ne)),void 0===i?n&&"get"in n&&null!==(o=n.get(t,e))?o:(o=Z.find.attr(t,e),null==o?void 0:o):null!==i?n&&"set"in n&&void 0!==(o=n.set(t,i,e))?o:(t.setAttribute(e,i+""),i):void Z.removeAttr(t,e)):void 0},removeAttr:function(t,e){var i,n,o=0,r=e&&e.match(pt);if(r&&1===t.nodeType)for(;i=r[o++];)n=Z.propFix[i]||i,Z.expr.match.bool.test(i)&&(t[n]=!1),t.removeAttribute(i)},attrHooks:{type:{set:function(t,e){if(!G.radioValue&&"radio"===e&&Z.nodeName(t,"input")){var i=t.value;return t.setAttribute("type",e),i&&(t.value=i),e}}}}}),oe={set:function(t,e,i){return e===!1?Z.removeAttr(t,i):t.setAttribute(i,i),i}},Z.each(Z.expr.match.bool.source.match(/\w+/g),function(t,e){var i=re[e]||Z.find.attr;re[e]=function(t,e,n){var o,r;return n||(r=re[e],re[e]=o,o=null!=i(t,e,n)?e.toLowerCase():null,re[e]=r),o}});var se=/^(?:input|select|textarea|button)$/i;Z.fn.extend({prop:function(t,e){return gt(this,Z.prop,t,e,arguments.length>1)},removeProp:function(t){return this.each(function(){delete this[Z.propFix[t]||t]})}}),Z.extend({propFix:{"for":"htmlFor","class":"className"},prop:function(t,e,i){var n,o,r,s=t.nodeType;return t&&3!==s&&8!==s&&2!==s?(r=1!==s||!Z.isXMLDoc(t),r&&(e=Z.propFix[e]||e,o=Z.propHooks[e]),void 0!==i?o&&"set"in o&&void 0!==(n=o.set(t,i,e))?n:t[e]=i:o&&"get"in o&&null!==(n=o.get(t,e))?n:t[e]):void 0},propHooks:{tabIndex:{get:function(t){return t.hasAttribute("tabindex")||se.test(t.nodeName)||t.href?t.tabIndex:-1}}}}),G.optSelected||(Z.propHooks.selected={get:function(t){var e=t.parentNode;return e&&e.parentNode&&e.parentNode.selectedIndex,null}}),Z.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){Z.propFix[this.toLowerCase()]=this});var ae=/[\t\r\n\f]/g;Z.fn.extend({addClass:function(t){var e,i,n,o,r,s,a="string"==typeof t&&t,l=0,c=this.length;if(Z.isFunction(t))return this.each(function(e){Z(this).addClass(t.call(this,e,this.className))});if(a)for(e=(t||"").match(pt)||[];c>l;l++)if(i=this[l],n=1===i.nodeType&&(i.className?(" "+i.className+" ").replace(ae," "):" ")){for(r=0;o=e[r++];)n.indexOf(" "+o+" ")<0&&(n+=o+" ");s=Z.trim(n),i.className!==s&&(i.className=s)}return this},removeClass:function(t){var e,i,n,o,r,s,a=0===arguments.length||"string"==typeof t&&t,l=0,c=this.length;if(Z.isFunction(t))return this.each(function(e){Z(this).removeClass(t.call(this,e,this.className))});if(a)for(e=(t||"").match(pt)||[];c>l;l++)if(i=this[l],n=1===i.nodeType&&(i.className?(" "+i.className+" ").replace(ae," "):"")){for(r=0;o=e[r++];)for(;n.indexOf(" "+o+" ")>=0;)n=n.replace(" "+o+" "," ");s=t?Z.trim(n):"",i.className!==s&&(i.className=s)}return this},toggleClass:function(t,e){var i=typeof t;return"boolean"==typeof e&&"string"===i?e?this.addClass(t):this.removeClass(t):this.each(Z.isFunction(t)?function(i){Z(this).toggleClass(t.call(this,i,this.className,e),e)}:function(){if("string"===i)for(var e,n=0,o=Z(this),r=t.match(pt)||[];e=r[n++];)o.hasClass(e)?o.removeClass(e):o.addClass(e);else(i===Tt||"boolean"===i)&&(this.className&&vt.set(this,"__className__",this.className),this.className=this.className||t===!1?"":vt.get(this,"__className__")||"")})},hasClass:function(t){for(var e=" "+t+" ",i=0,n=this.length;n>i;i++)if(1===this[i].nodeType&&(" "+this[i].className+" ").replace(ae," ").indexOf(e)>=0)return!0;return!1}});var le=/\r/g;Z.fn.extend({val:function(t){var e,i,n,o=this[0];return arguments.length?(n=Z.isFunction(t),this.each(function(i){var o;1===this.nodeType&&(o=n?t.call(this,i,Z(this).val()):t,null==o?o="":"number"==typeof o?o+="":Z.isArray(o)&&(o=Z.map(o,function(t){return null==t?"":t+""})),e=Z.valHooks[this.type]||Z.valHooks[this.nodeName.toLowerCase()],e&&"set"in e&&void 0!==e.set(this,o,"value")||(this.value=o))})):o?(e=Z.valHooks[o.type]||Z.valHooks[o.nodeName.toLowerCase()],e&&"get"in e&&void 0!==(i=e.get(o,"value"))?i:(i=o.value,"string"==typeof i?i.replace(le,""):null==i?"":i)):void 0}}),Z.extend({valHooks:{option:{get:function(t){var e=Z.find.attr(t,"value");return null!=e?e:Z.trim(Z.text(t))}},select:{get:function(t){for(var e,i,n=t.options,o=t.selectedIndex,r="select-one"===t.type||0>o,s=r?null:[],a=r?o+1:n.length,l=0>o?a:r?o:0;a>l;l++)if(i=n[l],!(!i.selected&&l!==o||(G.optDisabled?i.disabled:null!==i.getAttribute("disabled"))||i.parentNode.disabled&&Z.nodeName(i.parentNode,"optgroup"))){if(e=Z(i).val(),r)return e;s.push(e)}return s},set:function(t,e){for(var i,n,o=t.options,r=Z.makeArray(e),s=o.length;s--;)n=o[s],(n.selected=Z.inArray(n.value,r)>=0)&&(i=!0);return i||(t.selectedIndex=-1),r}}}}),Z.each(["radio","checkbox"],function(){Z.valHooks[this]={set:function(t,e){return Z.isArray(e)?t.checked=Z.inArray(Z(t).val(),e)>=0:void 0}},G.checkOn||(Z.valHooks[this].get=function(t){return null===t.getAttribute("value")?"on":t.value})}),Z.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(t,e){Z.fn[e]=function(t,i){return arguments.length>0?this.on(e,null,t,i):this.trigger(e)}}),Z.fn.extend({hover:function(t,e){return this.mouseenter(t).mouseleave(e||t)},bind:function(t,e,i){return this.on(t,null,e,i)},unbind:function(t,e){return this.off(t,null,e)},delegate:function(t,e,i,n){return this.on(e,t,i,n)},undelegate:function(t,e,i){return 1===arguments.length?this.off(t,"**"):this.off(e,t||"**",i)}});var ce=Z.now(),ue=/\?/;Z.parseJSON=function(t){return JSON.parse(t+"")},Z.parseXML=function(t){var e,i;if(!t||"string"!=typeof t)return null;try{i=new DOMParser,e=i.parseFromString(t,"text/xml")}catch(n){e=void 0}return(!e||e.getElementsByTagName("parsererror").length)&&Z.error("Invalid XML: "+t),e};var he=/#.*$/,de=/([?&])_=[^&]*/,pe=/^(.*?):[ \t]*([^\r\n]*)$/gm,fe=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,me=/^(?:GET|HEAD)$/,ge=/^\/\//,ve=/^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,ye={},be={},xe="*/".concat("*"),we=t.location.href,_e=ve.exec(we.toLowerCase())||[];Z.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:we,type:"GET",isLocal:fe.test(_e[1]),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":xe,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":Z.parseJSON,"text xml":Z.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(t,e){return e?F(F(t,Z.ajaxSettings),e):F(Z.ajaxSettings,t)},ajaxPrefilter:j(ye),ajaxTransport:j(be),ajax:function(t,e){function i(t,e,i,s){var l,u,v,y,x,_=e;2!==b&&(b=2,a&&clearTimeout(a),n=void 0,r=s||"",w.readyState=t>0?4:0,l=t>=200&&300>t||304===t,i&&(y=q(h,w,i)),y=L(h,y,w,l),l?(h.ifModified&&(x=w.getResponseHeader("Last-Modified"),x&&(Z.lastModified[o]=x),x=w.getResponseHeader("etag"),x&&(Z.etag[o]=x)),204===t||"HEAD"===h.type?_="nocontent":304===t?_="notmodified":(_=y.state,u=y.data,v=y.error,l=!v)):(v=_,(t||!_)&&(_="error",0>t&&(t=0))),w.status=t,w.statusText=(e||_)+"",l?f.resolveWith(d,[u,_,w]):f.rejectWith(d,[w,_,v]),w.statusCode(g),g=void 0,c&&p.trigger(l?"ajaxSuccess":"ajaxError",[w,h,l?u:v]),m.fireWith(d,[w,_]),c&&(p.trigger("ajaxComplete",[w,h]),--Z.active||Z.event.trigger("ajaxStop")))}"object"==typeof t&&(e=t,t=void 0),e=e||{};var n,o,r,s,a,l,c,u,h=Z.ajaxSetup({},e),d=h.context||h,p=h.context&&(d.nodeType||d.jquery)?Z(d):Z.event,f=Z.Deferred(),m=Z.Callbacks("once memory"),g=h.statusCode||{},v={},y={},b=0,x="canceled",w={readyState:0,getResponseHeader:function(t){var e;if(2===b){if(!s)for(s={};e=pe.exec(r);)s[e[1].toLowerCase()]=e[2];e=s[t.toLowerCase()]}return null==e?null:e},getAllResponseHeaders:function(){return 2===b?r:null},setRequestHeader:function(t,e){var i=t.toLowerCase();return b||(t=y[i]=y[i]||t,v[t]=e),this},overrideMimeType:function(t){return b||(h.mimeType=t),this},statusCode:function(t){var e;if(t)if(2>b)for(e in t)g[e]=[g[e],t[e]];else w.always(t[w.status]);return this},abort:function(t){var e=t||x;return n&&n.abort(e),i(0,e),this}};if(f.promise(w).complete=m.add,w.success=w.done,w.error=w.fail,h.url=((t||h.url||we)+"").replace(he,"").replace(ge,_e[1]+"//"),h.type=e.method||e.type||h.method||h.type,h.dataTypes=Z.trim(h.dataType||"*").toLowerCase().match(pt)||[""],null==h.crossDomain&&(l=ve.exec(h.url.toLowerCase()),h.crossDomain=!(!l||l[1]===_e[1]&&l[2]===_e[2]&&(l[3]||("http:"===l[1]?"80":"443"))===(_e[3]||("http:"===_e[1]?"80":"443")))),h.data&&h.processData&&"string"!=typeof h.data&&(h.data=Z.param(h.data,h.traditional)),M(ye,h,e,w),2===b)return w;c=Z.event&&h.global,c&&0===Z.active++&&Z.event.trigger("ajaxStart"),h.type=h.type.toUpperCase(),h.hasContent=!me.test(h.type),o=h.url,h.hasContent||(h.data&&(o=h.url+=(ue.test(o)?"&":"?")+h.data,delete h.data),h.cache===!1&&(h.url=de.test(o)?o.replace(de,"$1_="+ce++):o+(ue.test(o)?"&":"?")+"_="+ce++)),h.ifModified&&(Z.lastModified[o]&&w.setRequestHeader("If-Modified-Since",Z.lastModified[o]),Z.etag[o]&&w.setRequestHeader("If-None-Match",Z.etag[o])),(h.data&&h.hasContent&&h.contentType!==!1||e.contentType)&&w.setRequestHeader("Content-Type",h.contentType),w.setRequestHeader("Accept",h.dataTypes[0]&&h.accepts[h.dataTypes[0]]?h.accepts[h.dataTypes[0]]+("*"!==h.dataTypes[0]?", "+xe+"; q=0.01":""):h.accepts["*"]);for(u in h.headers)w.setRequestHeader(u,h.headers[u]);if(h.beforeSend&&(h.beforeSend.call(d,w,h)===!1||2===b))return w.abort();x="abort";for(u in{success:1,error:1,complete:1})w[u](h[u]);if(n=M(be,h,e,w)){w.readyState=1,c&&p.trigger("ajaxSend",[w,h]),h.async&&h.timeout>0&&(a=setTimeout(function(){w.abort("timeout")},h.timeout));try{b=1,n.send(v,i)}catch(_){if(!(2>b))throw _;i(-1,_)}}else i(-1,"No Transport");return w},getJSON:function(t,e,i){return Z.get(t,e,i,"json")},getScript:function(t,e){return Z.get(t,void 0,e,"script")}}),Z.each(["get","post"],function(t,e){Z[e]=function(t,i,n,o){return Z.isFunction(i)&&(o=o||n,n=i,i=void 0),Z.ajax({url:t,type:e,dataType:o,data:i,success:n})}}),Z._evalUrl=function(t){return Z.ajax({url:t,type:"GET",dataType:"script",async:!1,global:!1,"throws":!0})},Z.fn.extend({wrapAll:function(t){var e;return Z.isFunction(t)?this.each(function(e){Z(this).wrapAll(t.call(this,e))}):(this[0]&&(e=Z(t,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&e.insertBefore(this[0]),e.map(function(){for(var t=this;t.firstElementChild;)t=t.firstElementChild;return t}).append(this)),this)},wrapInner:function(t){return this.each(Z.isFunction(t)?function(e){Z(this).wrapInner(t.call(this,e))}:function(){var e=Z(this),i=e.contents();i.length?i.wrapAll(t):e.append(t)})},wrap:function(t){var e=Z.isFunction(t);return this.each(function(i){Z(this).wrapAll(e?t.call(this,i):t)})},unwrap:function(){return this.parent().each(function(){Z.nodeName(this,"body")||Z(this).replaceWith(this.childNodes)}).end()}}),Z.expr.filters.hidden=function(t){return t.offsetWidth<=0&&t.offsetHeight<=0},Z.expr.filters.visible=function(t){return!Z.expr.filters.hidden(t)};var ke=/%20/g,Ce=/\[\]$/,Te=/\r?\n/g,Se=/^(?:submit|button|image|reset|file)$/i,$e=/^(?:input|select|textarea|keygen)/i;Z.param=function(t,e){var i,n=[],o=function(t,e){e=Z.isFunction(e)?e():null==e?"":e,n[n.length]=encodeURIComponent(t)+"="+encodeURIComponent(e)};if(void 0===e&&(e=Z.ajaxSettings&&Z.ajaxSettings.traditional),Z.isArray(t)||t.jquery&&!Z.isPlainObject(t))Z.each(t,function(){o(this.name,this.value)});else for(i in t)W(i,t[i],e,o);return n.join("&").replace(ke,"+")},Z.fn.extend({serialize:function(){return Z.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var t=Z.prop(this,"elements");return t?Z.makeArray(t):this}).filter(function(){var t=this.type;return this.name&&!Z(this).is(":disabled")&&$e.test(this.nodeName)&&!Se.test(t)&&(this.checked||!Ct.test(t))}).map(function(t,e){var i=Z(this).val();return null==i?null:Z.isArray(i)?Z.map(i,function(t){return{name:e.name,value:t.replace(Te,"\r\n")}}):{name:e.name,value:i.replace(Te,"\r\n")}}).get()}}),Z.ajaxSettings.xhr=function(){try{return new XMLHttpRequest}catch(t){}};var Ee=0,Ae={},Oe={0:200,1223:204},Ne=Z.ajaxSettings.xhr();t.attachEvent&&t.attachEvent("onunload",function(){for(var t in Ae)Ae[t]()}),G.cors=!!Ne&&"withCredentials"in Ne,G.ajax=Ne=!!Ne,Z.ajaxTransport(function(t){var e;return G.cors||Ne&&!t.crossDomain?{send:function(i,n){var o,r=t.xhr(),s=++Ee;if(r.open(t.type,t.url,t.async,t.username,t.password),t.xhrFields)for(o in t.xhrFields)r[o]=t.xhrFields[o];t.mimeType&&r.overrideMimeType&&r.overrideMimeType(t.mimeType),t.crossDomain||i["X-Requested-With"]||(i["X-Requested-With"]="XMLHttpRequest");for(o in i)r.setRequestHeader(o,i[o]);e=function(t){return function(){e&&(delete Ae[s],e=r.onload=r.onerror=null,"abort"===t?r.abort():"error"===t?n(r.status,r.statusText):n(Oe[r.status]||r.status,r.statusText,"string"==typeof r.responseText?{text:r.responseText}:void 0,r.getAllResponseHeaders()))}},r.onload=e(),r.onerror=e("error"),e=Ae[s]=e("abort");try{r.send(t.hasContent&&t.data||null)}catch(a){if(e)throw a}},abort:function(){e&&e()}}:void 0}),Z.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/(?:java|ecma)script/},converters:{"text script":function(t){return Z.globalEval(t),t}}}),Z.ajaxPrefilter("script",function(t){void 0===t.cache&&(t.cache=!1),t.crossDomain&&(t.type="GET")}),Z.ajaxTransport("script",function(t){if(t.crossDomain){var e,i;return{send:function(n,o){e=Z("
<script>").prop({async:!0,charset:t.scriptCharset,src:t.url}).on("
    load
    error
    ",i=function(t){e.remove(),i=null,t&&o("
    error
    "===t.type?404:200,t.type)}),K.head.appendChild(e[0])},abort:function(){i&&i()}}}});var De=[],Pe=/(=)\?(?=&|$)|\?\?/;Z.ajaxSetup({jsonp:"
    callback
    ",jsonpCallback:function(){var t=De.pop()||Z.expando+"
    _
    "+ce++;return this[t]=!0,t}}),Z.ajaxPrefilter("
    json
    jsonp
    ",function(e,i,n){var o,r,s,a=e.jsonp!==!1&&(Pe.test(e.url)?"
    url
    ":"
    string
    "==typeof e.data&&!(e.contentType||"
    ").indexOf("
    application / x - www - form - urlencoded
    ")&&Pe.test(e.data)&&"
    data
    ");return a||"
    jsonp
    "===e.dataTypes[0]?(o=e.jsonpCallback=Z.isFunction(e.jsonpCallback)?e.jsonpCallback():e.jsonpCallback,a?e[a]=e[a].replace(Pe,"
    $1
    "+o):e.jsonp!==!1&&(e.url+=(ue.test(e.url)?" & ":" ? ")+e.jsonp+" = "+o),e.converters["script
    json
    "]=function(){return s||Z.error(o+"
    was
    not
    called
    "),s[0]},e.dataTypes[0]="
    json
    ",r=t[o],t[o]=function(){s=arguments},n.always(function(){t[o]=r,e[o]&&(e.jsonpCallback=i.jsonpCallback,De.push(o)),s&&Z.isFunction(r)&&r(s[0]),s=r=void 0}),"
    script
    "):void 0}),Z.parseHTML=function(t,e,i){if(!t||"
    string
    "!=typeof t)return null;"
    boolean
    "==typeof e&&(i=e,e=!1),e=e||K;var n=st.exec(t),o=!i&&[];return n?[e.createElement(n[1])]:(n=Z.buildFragment([t],e,o),o&&o.length&&Z(o).remove(),Z.merge([],n.childNodes))};var Ie=Z.fn.load;Z.fn.load=function(t,e,i){if("
    string
    "!=typeof t&&Ie)return Ie.apply(this,arguments);var n,o,r,s=this,a=t.indexOf("
    ");return a>=0&&(n=Z.trim(t.slice(a)),t=t.slice(0,a)),Z.isFunction(e)?(i=e,e=void 0):e&&"
    object
    "==typeof e&&(o="
    POST
    "),s.length>0&&Z.ajax({url:t,type:o,dataType:"
    html
    ",data:e}).done(function(t){r=arguments,s.html(n?Z(" < div > ").append(Z.parseHTML(t)).find(n):t)}).complete(i&&function(t,e){s.each(i,r||[t.responseText,e,t])}),this},Z.each(["
    ajaxStart
    ","
    ajaxStop
    ","
    ajaxComplete
    ","
    ajaxError
    ","
    ajaxSuccess
    ","
    ajaxSend
    "],function(t,e){Z.fn[e]=function(t){return this.on(e,t)}}),Z.expr.filters.animated=function(t){return Z.grep(Z.timers,function(e){return t===e.elem}).length};var je=t.document.documentElement;Z.offset={setOffset:function(t,e,i){var n,o,r,s,a,l,c,u=Z.css(t,"
    position
    "),h=Z(t),d={};"
    static
    "===u&&(t.style.position="
    relative
    "),a=h.offset(),r=Z.css(t,"
    top
    "),l=Z.css(t,"
    left
    "),c=("
    absolute
    "===u||"
    fixed
    "===u)&&(r+l).indexOf("
    auto
    ")>-1,c?(n=h.position(),s=n.top,o=n.left):(s=parseFloat(r)||0,o=parseFloat(l)||0),Z.isFunction(e)&&(e=e.call(t,i,a)),null!=e.top&&(d.top=e.top-a.top+s),null!=e.left&&(d.left=e.left-a.left+o),"
    using
    "in e?e.using.call(t,d):h.css(d)}},Z.fn.extend({offset:function(t){if(arguments.length)return void 0===t?this:this.each(function(e){Z.offset.setOffset(this,t,e)});var e,i,n=this[0],o={top:0,left:0},r=n&&n.ownerDocument;return r?(e=r.documentElement,Z.contains(e,n)?(typeof n.getBoundingClientRect!==Tt&&(o=n.getBoundingClientRect()),i=H(r),{top:o.top+i.pageYOffset-e.clientTop,left:o.left+i.pageXOffset-e.clientLeft}):o):void 0},position:function(){if(this[0]){var t,e,i=this[0],n={top:0,left:0};return"
    fixed
    "===Z.css(i,"
    position
    ")?e=i.getBoundingClientRect():(t=this.offsetParent(),e=this.offset(),Z.nodeName(t[0],"
    html
    ")||(n=t.offset()),n.top+=Z.css(t[0],"
    borderTopWidth
    ",!0),n.left+=Z.css(t[0],"
    borderLeftWidth
    ",!0)),{top:e.top-n.top-Z.css(i,"
    marginTop
    ",!0),left:e.left-n.left-Z.css(i,"
    marginLeft
    ",!0)}}},offsetParent:function(){return this.map(function(){for(var t=this.offsetParent||je;t&&!Z.nodeName(t,"
    html
    ")&&"
    static
    "===Z.css(t,"
    position
    ");)t=t.offsetParent;return t||je})}}),Z.each({scrollLeft:"
    pageXOffset
    ",scrollTop:"
    pageYOffset
    "},function(e,i){var n="
    pageYOffset
    "===i;Z.fn[e]=function(o){return gt(this,function(e,o,r){var s=H(e);return void 0===r?s?s[i]:e[o]:void(s?s.scrollTo(n?t.pageXOffset:r,n?r:t.pageYOffset):e[o]=r)},e,o,arguments.length,null)}}),Z.each(["
    top
    ","
    left
    "],function(t,e){Z.cssHooks[e]=_(G.pixelPosition,function(t,i){return i?(i=w(t,e),Rt.test(i)?Z(t).position()[e]+"
    px
    ":i):void 0})}),Z.each({Height:"
    height
    ",Width:"
    width
    "},function(t,e){Z.each({padding:"
    inner
    "+t,content:e,"
    ":"
    outer
    "+t},function(i,n){Z.fn[n]=function(n,o){var r=arguments.length&&(i||"
    boolean
    "!=typeof n),s=i||(n===!0||o===!0?"
    margin
    ":"
    border
    ");return gt(this,function(e,i,n){var o;return Z.isWindow(e)?e.document.documentElement["
    client
    "+t]:9===e.nodeType?(o=e.documentElement,Math.max(e.body["
    scroll
    "+t],o["
    scroll
    "+t],e.body["
    offset
    "+t],o["
    offset
    "+t],o["
    client
    "+t])):void 0===n?Z.css(e,i,s):Z.style(e,i,n,s)},e,r?n:void 0,r,null)}})}),Z.fn.size=function(){return this.length},Z.fn.andSelf=Z.fn.addBack,"
    function
    "==typeof define&&define.amd&&define("
    jquery
    ",[],function(){return Z});var Me=t.jQuery,Fe=t.$;return Z.noConflict=function(e){return t.$===Z&&(t.$=Fe),e&&t.jQuery===Z&&(t.jQuery=Me),Z},typeof e===Tt&&(t.jQuery=t.$=Z),Z}),jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"
    easeOutQuad
    ",swing:function(t,e,i,n,o){return jQuery.easing[jQuery.easing.def](t,e,i,n,o)},easeInQuad:function(t,e,i,n,o){return n*(e/=o)*e+i},easeOutQuad:function(t,e,i,n,o){return-n*(e/=o)*(e-2)+i},easeInOutQuad:function(t,e,i,n,o){return(e/=o/2)<1?n/2*e*e+i:-n/2*(--e*(e-2)-1)+i},easeInCubic:function(t,e,i,n,o){return n*(e/=o)*e*e+i},easeOutCubic:function(t,e,i,n,o){return n*((e=e/o-1)*e*e+1)+i},easeInOutCubic:function(t,e,i,n,o){return(e/=o/2)<1?n/2*e*e*e+i:n/2*((e-=2)*e*e+2)+i},easeInQuart:function(t,e,i,n,o){return n*(e/=o)*e*e*e+i},easeOutQuart:function(t,e,i,n,o){return-n*((e=e/o-1)*e*e*e-1)+i},easeInOutQuart:function(t,e,i,n,o){return(e/=o/2)<1?n/2*e*e*e*e+i:-n/2*((e-=2)*e*e*e-2)+i},easeInQuint:function(t,e,i,n,o){return n*(e/=o)*e*e*e*e+i},easeOutQuint:function(t,e,i,n,o){return n*((e=e/o-1)*e*e*e*e+1)+i},easeInOutQuint:function(t,e,i,n,o){return(e/=o/2)<1?n/2*e*e*e*e*e+i:n/2*((e-=2)*e*e*e*e+2)+i},easeInSine:function(t,e,i,n,o){return-n*Math.cos(e/o*(Math.PI/2))+n+i},easeOutSine:function(t,e,i,n,o){return n*Math.sin(e/o*(Math.PI/2))+i},easeInOutSine:function(t,e,i,n,o){return-n/2*(Math.cos(Math.PI*e/o)-1)+i},easeInExpo:function(t,e,i,n,o){return 0==e?i:n*Math.pow(2,10*(e/o-1))+i},easeOutExpo:function(t,e,i,n,o){return e==o?i+n:n*(-Math.pow(2,-10*e/o)+1)+i},easeInOutExpo:function(t,e,i,n,o){return 0==e?i:e==o?i+n:(e/=o/2)<1?n/2*Math.pow(2,10*(e-1))+i:n/2*(-Math.pow(2,-10*--e)+2)+i},easeInCirc:function(t,e,i,n,o){return-n*(Math.sqrt(1-(e/=o)*e)-1)+i},easeOutCirc:function(t,e,i,n,o){return n*Math.sqrt(1-(e=e/o-1)*e)+i},easeInOutCirc:function(t,e,i,n,o){return(e/=o/2)<1?-n/2*(Math.sqrt(1-e*e)-1)+i:n/2*(Math.sqrt(1-(e-=2)*e)+1)+i},easeInElastic:function(t,e,i,n,o){var r=1.70158,s=0,a=n;if(0==e)return i;if(1==(e/=o))return i+n;if(s||(s=.3*o),a<Math.abs(n)){a=n;var r=s/4}else var r=s/(2*Math.PI)*Math.asin(n/a);return-(a*Math.pow(2,10*(e-=1))*Math.sin((e*o-r)*(2*Math.PI)/s))+i},easeOutElastic:function(t,e,i,n,o){var r=1.70158,s=0,a=n;if(0==e)return i;if(1==(e/=o))return i+n;if(s||(s=.3*o),a<Math.abs(n)){a=n;var r=s/4}else var r=s/(2*Math.PI)*Math.asin(n/a);return a*Math.pow(2,-10*e)*Math.sin((e*o-r)*(2*Math.PI)/s)+n+i},easeInOutElastic:function(t,e,i,n,o){var r=1.70158,s=0,a=n;if(0==e)return i;if(2==(e/=o/2))return i+n;if(s||(s=o*(.3*1.5)),a<Math.abs(n)){a=n;var r=s/4}else var r=s/(2*Math.PI)*Math.asin(n/a);return 1>e?-.5*(a*Math.pow(2,10*(e-=1))*Math.sin((e*o-r)*(2*Math.PI)/s))+i:a*Math.pow(2,-10*(e-=1))*Math.sin((e*o-r)*(2*Math.PI)/s)*.5+n+i},easeInBack:function(t,e,i,n,o,r){return void 0==r&&(r=1.70158),n*(e/=o)*e*((r+1)*e-r)+i},easeOutBack:function(t,e,i,n,o,r){return void 0==r&&(r=1.70158),n*((e=e/o-1)*e*((r+1)*e+r)+1)+i},easeInOutBack:function(t,e,i,n,o,r){return void 0==r&&(r=1.70158),(e/=o/2)<1?n/2*(e*e*(((r*=1.525)+1)*e-r))+i:n/2*((e-=2)*e*(((r*=1.525)+1)*e+r)+2)+i},easeInBounce:function(t,e,i,n,o){return n-jQuery.easing.easeOutBounce(t,o-e,0,n,o)+i},easeOutBounce:function(t,e,i,n,o){return(e/=o)<1/2.75?n*(7.5625*e*e)+i:2/2.75>e?n*(7.5625*(e-=1.5/2.75)*e+.75)+i:2.5/2.75>e?n*(7.5625*(e-=2.25/2.75)*e+.9375)+i:n*(7.5625*(e-=2.625/2.75)*e+.984375)+i},easeInOutBounce:function(t,e,i,n,o){return o/2>e?.5*jQuery.easing.easeInBounce(t,2*e,0,n,o)+i:.5*jQuery.easing.easeOutBounce(t,2*e-o,0,n,o)+.5*n+i}}),jQuery.extend(jQuery.easing,{easeInOutMaterial:function(t,e,i,n,o){return(e/=o/2)<1?n/2*e*e+i:n/4*((e-=2)*e*e+2)+i}}),!function(t){function e(t){var e=t.length,n=i.type(t);return"
    function
    "===n||i.isWindow(t)?!1:1===t.nodeType&&e?!0:"
    array
    "===n||0===e||"
    number
    "==typeof e&&e>0&&e-1 in t}if(!t.jQuery){var i=function(t,e){return new i.fn.init(t,e)};i.isWindow=function(t){return null!=t&&t==t.window},i.type=function(t){return null==t?t+"
    ":"
    object
    "==typeof t||"
    function
    "==typeof t?o[s.call(t)]||"
    object
    ":typeof t},i.isArray=Array.isArray||function(t){return"
    array
    "===i.type(t)},i.isPlainObject=function(t){var e;if(!t||"
    object
    "!==i.type(t)||t.nodeType||i.isWindow(t))return!1;try{if(t.constructor&&!r.call(t,"
    constructor
    ")&&!r.call(t.constructor.prototype,"
    isPrototypeOf
    "))return!1}catch(n){return!1}for(e in t);return void 0===e||r.call(t,e)},i.each=function(t,i,n){var o,r=0,s=t.length,a=e(t);if(n){if(a)for(;s>r&&(o=i.apply(t[r],n),o!==!1);r++);else for(r in t)if(o=i.apply(t[r],n),o===!1)break}else if(a)for(;s>r&&(o=i.call(t[r],r,t[r]),o!==!1);r++);else for(r in t)if(o=i.call(t[r],r,t[r]),o===!1)break;return t},i.data=function(t,e,o){if(void 0===o){var r=t[i.expando],s=r&&n[r];if(void 0===e)return s;if(s&&e in s)return s[e]}else if(void 0!==e){var r=t[i.expando]||(t[i.expando]=++i.uuid);return n[r]=n[r]||{},n[r][e]=o,o}},i.removeData=function(t,e){var o=t[i.expando],r=o&&n[o];r&&i.each(e,function(t,e){delete r[e]})},i.extend=function(){var t,e,n,o,r,s,a=arguments[0]||{},l=1,c=arguments.length,u=!1;for("
    boolean
    "==typeof a&&(u=a,a=arguments[l]||{},l++),"
    object
    "!=typeof a&&"
    function
    "!==i.type(a)&&(a={}),l===c&&(a=this,l--);c>l;l++)if(null!=(r=arguments[l]))for(o in r)t=a[o],n=r[o],a!==n&&(u&&n&&(i.isPlainObject(n)||(e=i.isArray(n)))?(e?(e=!1,s=t&&i.isArray(t)?t:[]):s=t&&i.isPlainObject(t)?t:{},a[o]=i.extend(u,s,n)):void 0!==n&&(a[o]=n));return a},i.queue=function(t,n,o){function r(t,i){var n=i||[];return null!=t&&(e(Object(t))?!function(t,e){for(var i=+e.length,n=0,o=t.length;i>n;)t[o++]=e[n++];if(i!==i)for(;void 0!==e[n];)t[o++]=e[n++];return t.length=o,t}(n,"
    string
    "==typeof t?[t]:t):[].push.call(n,t)),n}if(t){n=(n||"
    fx
    ")+"
    queue
    ";var s=i.data(t,n);return o?(!s||i.isArray(o)?s=i.data(t,n,r(o)):s.push(o),s):s||[]}},i.dequeue=function(t,e){i.each(t.nodeType?[t]:t,function(t,n){e=e||"
    fx
    ";var o=i.queue(n,e),r=o.shift();"
    inprogress
    "===r&&(r=o.shift()),r&&("
    fx
    "===e&&o.unshift("
    inprogress
    "),r.call(n,function(){i.dequeue(n,e)}))})},i.fn=i.prototype={init:function(t){if(t.nodeType)return this[0]=t,this;throw new Error("
    Not
    a
    DOM
    node.
    ")},offset:function(){var e=this[0].getBoundingClientRect?this[0].getBoundingClientRect():{top:0,left:0};return{top:e.top+(t.pageYOffset||document.scrollTop||0)-(document.clientTop||0),left:e.left+(t.pageXOffset||document.scrollLeft||0)-(document.clientLeft||0)}},position:function(){function t(){for(var t=this.offsetParent||document;t&&"
    html
    "===!t.nodeType.toLowerCase&&"
    static
    "===t.style.position;)t=t.offsetParent;return t||document}var e=this[0],t=t.apply(e),n=this.offset(),o=/^(?:body|html)$/i.test(t.nodeName)?{top:0,left:0}:i(t).offset();return n.top-=parseFloat(e.style.marginTop)||0,n.left-=parseFloat(e.style.marginLeft)||0,t.style&&(o.top+=parseFloat(t.style.borderTopWidth)||0,o.left+=parseFloat(t.style.borderLeftWidth)||0),{top:n.top-o.top,left:n.left-o.left}}};var n={};i.expando="
    velocity
    "+(new Date).getTime(),i.uuid=0;for(var o={},r=o.hasOwnProperty,s=o.toString,a="
    Boolean
    Number
    String
    Function
    Array
    Date
    RegExp
    Object
    Error
    ".split("
    "),l=0;l<a.length;l++)o["[object
    "+a[l]+"
    ]
    "]=a[l].toLowerCase();i.fn.init.prototype=i.fn,t.Velocity={Utilities:i}}}(window),function(t){"
    object
    "==typeof module&&"
    object
    "==typeof module.exports?module.exports=t():"
    function
    "==typeof define&&define.amd?define(t):t()}(function(){return function(t,e,i,n){function o(t){for(var e=-1,i=t?t.length:0,n=[];++e<i;){var o=t[e];o&&n.push(o)}return n}function r(t){return m.isWrapped(t)?t=[].slice.call(t):m.isNode(t)&&(t=[t]),t}function s(t){var e=d.data(t,"
    velocity
    ");return null===e?n:e}function a(t){return function(e){return Math.round(e*t)*(1/t)}}function l(t,i,n,o){function r(t,e){return 1-3*e+3*t}function s(t,e){return 3*e-6*t}function a(t){return 3*t}function l(t,e,i){return((r(e,i)*t+s(e,i))*t+a(e))*t}function c(t,e,i){return 3*r(e,i)*t*t+2*s(e,i)*t+a(e)}function u(e,i){for(var o=0;m>o;++o){var r=c(i,t,n);if(0===r)return i;var s=l(i,t,n)-e;i-=s/r}return i}function h(){for(var e=0;b>e;++e)k[e]=l(e*x,t,n)}function d(e,i,o){var r,s,a=0;do s=i+(o-i)/2,r=l(s,t,n)-e,r>0?o=s:i=s;while(Math.abs(r)>v&&++a<y);return s}function p(e){for(var i=0,o=1,r=b-1;o!=r&&k[o]<=e;++o)i+=x;--o;var s=(e-k[o])/(k[o+1]-k[o]),a=i+s*x,l=c(a,t,n);return l>=g?u(e,a):0==l?a:d(e,i,i+x)}function f(){C=!0,(t!=i||n!=o)&&h()}var m=4,g=.001,v=1e-7,y=10,b=11,x=1/(b-1),w="
    Float32Array
    "in e;if(4!==arguments.length)return!1;for(var _=0;4>_;++_)if("
    number
    "!=typeof arguments[_]||isNaN(arguments[_])||!isFinite(arguments[_]))return!1;t=Math.min(t,1),n=Math.min(n,1),t=Math.max(t,0),n=Math.max(n,0);var k=w?new Float32Array(b):new Array(b),C=!1,T=function(e){return C||f(),t===i&&n===o?e:0===e?0:1===e?1:l(p(e),i,o)};T.getControlPoints=function(){return[{x:t,y:i},{x:n,y:o}]};var S="
    generateBezier("+[t,i,n,o]+")
    ";return T.toString=function(){return S},T}function c(t,e){var i=t;return m.isString(t)?b.Easings[t]||(i=!1):i=m.isArray(t)&&1===t.length?a.apply(null,t):m.isArray(t)&&2===t.length?x.apply(null,t.concat([e])):m.isArray(t)&&4===t.length?l.apply(null,t):!1,i===!1&&(i=b.Easings[b.defaults.easing]?b.defaults.easing:y),i}function u(t){if(t){var e=(new Date).getTime(),i=b.State.calls.length;i>1e4&&(b.State.calls=o(b.State.calls));for(var r=0;i>r;r++)if(b.State.calls[r]){var a=b.State.calls[r],l=a[0],c=a[2],p=a[3],f=!!p,g=null;p||(p=b.State.calls[r][3]=e-16);for(var v=Math.min((e-p)/c.duration,1),y=0,x=l.length;x>y;y++){var _=l[y],C=_.element;if(s(C)){var T=!1;if(c.display!==n&&null!==c.display&&"
    none
    "!==c.display){if("
    flex
    "===c.display){var S=[" - webkit - box
    "," - moz - box
    "," - ms - flexbox
    "," - webkit - flex
    "];d.each(S,function(t,e){w.setPropertyValue(C,"
    display
    ",e)})}w.setPropertyValue(C,"
    display
    ",c.display)}c.visibility!==n&&"
    hidden
    "!==c.visibility&&w.setPropertyValue(C,"
    visibility
    ",c.visibility);for(var $ in _)if("
    element
    "!==$){var E,A=_[$],O=m.isString(A.easing)?b.Easings[A.easing]:A.easing;if(1===v)E=A.endValue;else{var N=A.endValue-A.startValue;if(E=A.startValue+N*O(v,c,N),!f&&E===A.currentValue)continue}if(A.currentValue=E,"
    tween
    "===$)g=E;else{if(w.Hooks.registered[$]){var D=w.Hooks.getRoot($),P=s(C).rootPropertyValueCache[D];P&&(A.rootPropertyValue=P)}var I=w.setPropertyValue(C,$,A.currentValue+(0===parseFloat(E)?"
    ":A.unitType),A.rootPropertyValue,A.scrollData);w.Hooks.registered[$]&&(s(C).rootPropertyValueCache[D]=w.Normalizations.registered[D]?w.Normalizations.registered[D]("
    extract
    ",null,I[1]):I[1]),"
    transform
    "===I[0]&&(T=!0)}}c.mobileHA&&s(C).transformCache.translate3d===n&&(s(C).transformCache.translate3d="(0
    px, 0
    px, 0
    px
    )
    ",T=!0),T&&w.flushTransformCache(C)}}c.display!==n&&"
    none
    "!==c.display&&(b.State.calls[r][2].display=!1),c.visibility!==n&&"
    hidden
    "!==c.visibility&&(b.State.calls[r][2].visibility=!1),c.progress&&c.progress.call(a[1],a[1],v,Math.max(0,p+c.duration-e),p,g),1===v&&h(r)}}b.State.isTicking&&k(u)}function h(t,e){if(!b.State.calls[t])return!1;for(var i=b.State.calls[t][0],o=b.State.calls[t][1],r=b.State.calls[t][2],a=b.State.calls[t][4],l=!1,c=0,u=i.length;u>c;c++){var h=i[c].element;if(e||r.loop||("
    none
    "===r.display&&w.setPropertyValue(h,"
    display
    ",r.display),"
    hidden
    "===r.visibility&&w.setPropertyValue(h,"
    visibility
    ",r.visibility)),r.loop!==!0&&(d.queue(h)[1]===n||!/\.velocityQueueEntryFlag/i.test(d.queue(h)[1]))&&s(h)){s(h).isAnimating=!1,s(h).rootPropertyValueCache={};var p=!1;d.each(w.Lists.transforms3D,function(t,e){var i=/^scale/.test(e)?1:0,o=s(h).transformCache[e];s(h).transformCache[e]!==n&&new RegExp(" ^
    \\
    ("+i+"[ ^.
    ]
    ").test(o)&&(p=!0,delete s(h).transformCache[e])}),r.mobileHA&&(p=!0,delete s(h).transformCache.translate3d),p&&w.flushTransformCache(h),
    w.Values.removeClass(h, "velocity-animating")
    }
    if (!e && r.complete && !r.loop && c === u - 1)try {
        r.complete.call(o, o)
    } catch (f) {
        setTimeout(function () {
            throw f
        }, 1)
    }
    a && r.loop !== !0 && a(o), s(h) && r.loop === !0 && !e && (d.each(s(h).tweensContainer, function (t, e) {
        /^rotate/.test(t) && 360 === parseFloat(e.endValue) && (e.endValue = 0, e.startValue = 360), /^backgroundPosition/.test(t) && 100 === parseFloat(e.endValue) && "%" === e.unitType && (e.endValue = 0, e.startValue = 100)
    }), b(h, "reverse", {loop: !0, delay: r.delay})), r.queue !== !1 && d.dequeue(h, r.queue)
    }
    b.State.calls[t] = !1;
    for (var m = 0, g = b.State.calls.length; g > m; m++)if (b.State.calls[m] !== !1) {
        l = !0;
        break
    }
    l === !1 && (b.State.isTicking = !1, delete b.State.calls, b.State.calls = [])
    }
    var d, p = function () {
        if (i.documentMode)return i.documentMode;
        for (var t = 7; t > 4; t--) {
            var e = i.createElement("div");
            if (e.innerHTML = "<!--[if IE " + t + "]><span></span><![endif]-->", e.getElementsByTagName("span").length)return e = null, t
        }
        return n
    }(), f = function () {
        var t = 0;
        return e.webkitRequestAnimationFrame || e.mozRequestAnimationFrame || function (e) {
                var i, n = (new Date).getTime();
                return i = Math.max(0, 16 - (n - t)), t = n + i, setTimeout(function () {
                    e(n + i)
                }, i)
            }
    }(), m = {
        isString: function (t) {
            return "string" == typeof t
        }, isArray: Array.isArray || function (t) {
            return "[object Array]" === Object.prototype.toString.call(t)
        }, isFunction: function (t) {
            return "[object Function]" === Object.prototype.toString.call(t)
        }, isNode: function (t) {
            return t && t.nodeType
        }, isNodeList: function (t) {
            return "object" == typeof t && /^\[object (HTMLCollection|NodeList|Object)\]$/.test(Object.prototype.toString.call(t)) && t.length !== n && (0 === t.length || "object" == typeof t[0] && t[0].nodeType > 0)
        }, isWrapped: function (t) {
            return t && (t.jquery || e.Zepto && e.Zepto.zepto.isZ(t))
        }, isSVG: function (t) {
            return e.SVGElement && t instanceof e.SVGElement
        }, isEmptyObject: function (t) {
            for (var e in t)return !1;
            return !0
        }
    }, g = !1;
    if (t.fn && t.fn.jquery ? (d = t, g = !0) : d = e.Velocity.Utilities, 8 >= p && !g)throw new Error("Velocity: IE8 and below require jQuery to be loaded before Velocity.");
    if (7 >= p)return void(jQuery.fn.velocity = jQuery.fn.animate);
    var v = 400, y = "swing", b = {
        State: {
            isMobile: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
            isAndroid: /Android/i.test(navigator.userAgent),
            isGingerbread: /Android 2\.3\.[3-7]/i.test(navigator.userAgent),
            isChrome: e.chrome,
            isFirefox: /Firefox/i.test(navigator.userAgent),
            prefixElement: i.createElement("div"),
            prefixMatches: {},
            scrollAnchor: null,
            scrollPropertyLeft: null,
            scrollPropertyTop: null,
            isTicking: !1,
            calls: []
        },
        CSS: {},
        Utilities: d,
        Redirects: {},
        Easings: {},
        Promise: e.Promise,
        defaults: {
            queue: "",
            duration: v,
            easing: y,
            begin: n,
            complete: n,
            progress: n,
            display: n,
            visibility: n,
            loop: !1,
            delay: !1,
            mobileHA: !0,
            _cacheValues: !0
        },
        init: function (t) {
            d.data(t, "velocity", {
                isSVG: m.isSVG(t),
                isAnimating: !1,
                computedStyle: null,
                tweensContainer: null,
                rootPropertyValueCache: {},
                transformCache: {}
            })
        },
        hook: null,
        mock: !1,
        version: {major: 1, minor: 2, patch: 2},
        debug: !1
    };
    e.pageYOffset !== n ? (b.State.scrollAnchor = e, b.State.scrollPropertyLeft = "pageXOffset", b.State.scrollPropertyTop = "pageYOffset") : (b.State.scrollAnchor = i.documentElement || i.body.parentNode || i.body, b.State.scrollPropertyLeft = "scrollLeft", b.State.scrollPropertyTop = "scrollTop");
    var x = function () {
        function t(t) {
            return -t.tension * t.x - t.friction * t.v
        }

        function e(e, i, n) {
            var o = {x: e.x + n.dx * i, v: e.v + n.dv * i, tension: e.tension, friction: e.friction};
            return {dx: o.v, dv: t(o)}
        }

        function i(i, n) {
            var o = {
                dx: i.v,
                dv: t(i)
            }, r = e(i, .5 * n, o), s = e(i, .5 * n, r), a = e(i, n, s), l = 1 / 6 * (o.dx + 2 * (r.dx + s.dx) + a.dx), c = 1 / 6 * (o.dv + 2 * (r.dv + s.dv) + a.dv);
            return i.x = i.x + l * n, i.v = i.v + c * n, i
        }

        return function n(t, e, o) {
            var r, s, a, l = {x: -1, v: 0, tension: null, friction: null}, c = [0], u = 0, h = 1e-4, d = .016;
            for (t = parseFloat(t) || 500, e = parseFloat(e) || 20, o = o || null, l.tension = t, l.friction = e, r = null !== o, r ? (u = n(t, e), s = u / o * d) : s = d; a = i(a || l, s), c.push(1 + a.x), u += 16, Math.abs(a.x) > h && Math.abs(a.v) > h;);
            return r ? function (t) {
                return c[t * (c.length - 1) | 0]
            } : u
        }
    }();
    b.Easings = {
        linear: function (t) {
            return t
        }, swing: function (t) {
            return .5 - Math.cos(t * Math.PI) / 2
        }, spring: function (t) {
            return 1 - Math.cos(4.5 * t * Math.PI) * Math.exp(6 * -t)
        }
    }, d.each([["ease", [.25, .1, .25, 1]], ["ease-in", [.42, 0, 1, 1]], ["ease-out", [0, 0, .58, 1]], ["ease-in-out", [.42, 0, .58, 1]], ["easeInSine", [.47, 0, .745, .715]], ["easeOutSine", [.39, .575, .565, 1]], ["easeInOutSine", [.445, .05, .55, .95]], ["easeInQuad", [.55, .085, .68, .53]], ["easeOutQuad", [.25, .46, .45, .94]], ["easeInOutQuad", [.455, .03, .515, .955]], ["easeInCubic", [.55, .055, .675, .19]], ["easeOutCubic", [.215, .61, .355, 1]], ["easeInOutCubic", [.645, .045, .355, 1]], ["easeInQuart", [.895, .03, .685, .22]], ["easeOutQuart", [.165, .84, .44, 1]], ["easeInOutQuart", [.77, 0, .175, 1]], ["easeInQuint", [.755, .05, .855, .06]], ["easeOutQuint", [.23, 1, .32, 1]], ["easeInOutQuint", [.86, 0, .07, 1]], ["easeInExpo", [.95, .05, .795, .035]], ["easeOutExpo", [.19, 1, .22, 1]], ["easeInOutExpo", [1, 0, 0, 1]], ["easeInCirc", [.6, .04, .98, .335]], ["easeOutCirc", [.075, .82, .165, 1]], ["easeInOutCirc", [.785, .135, .15, .86]]], function (t, e) {
        b.Easings[e[0]] = l.apply(null, e[1])
    });
    var w = b.CSS = {
        RegEx: {
            isHex: /^#([A-f\d]{3}){1,2}$/i,
            valueUnwrap: /^[A-z]+\((.*)\)$/i,
            wrappedValueAlreadyExtracted: /[0-9.]+ [0-9.]+ [0-9.]+( [0-9.]+)?/,
            valueSplit: /([A-z]+\(.+\))|(([A-z0-9#-.]+?)(?=\s|$))/gi
        },
        Lists: {
            colors: ["fill", "stroke", "stopColor", "color", "backgroundColor", "borderColor", "borderTopColor", "borderRightColor", "borderBottomColor", "borderLeftColor", "outlineColor"],
            transformsBase: ["translateX", "translateY", "scale", "scaleX", "scaleY", "skewX", "skewY", "rotateZ"],
            transforms3D: ["transformPerspective", "translateZ", "scaleZ", "rotateX", "rotateY"]
        },
        Hooks: {
            templates: {
                textShadow: ["Color X Y Blur", "black 0px 0px 0px"],
                boxShadow: ["Color X Y Blur Spread", "black 0px 0px 0px 0px"],
                clip: ["Top Right Bottom Left", "0px 0px 0px 0px"],
                backgroundPosition: ["X Y", "0% 0%"],
                transformOrigin: ["X Y Z", "50% 50% 0px"],
                perspectiveOrigin: ["X Y", "50% 50%"]
            }, registered: {}, register: function () {
                for (var t = 0; t < w.Lists.colors.length; t++) {
                    var e = "color" === w.Lists.colors[t] ? "0 0 0 1" : "255 255 255 1";
                    w.Hooks.templates[w.Lists.colors[t]] = ["Red Green Blue Alpha", e]
                }
                var i, n, o;
                if (p)for (i in w.Hooks.templates) {
                    n = w.Hooks.templates[i], o = n[0].split(" ");
                    var r = n[1].match(w.RegEx.valueSplit);
                    "Color" === o[0] && (o.push(o.shift()), r.push(r.shift()), w.Hooks.templates[i] = [o.join(" "), r.join(" ")])
                }
                for (i in w.Hooks.templates) {
                    n = w.Hooks.templates[i], o = n[0].split(" ");
                    for (var t in o) {
                        var s = i + o[t], a = t;
                        w.Hooks.registered[s] = [i, a]
                    }
                }
            }, getRoot: function (t) {
                var e = w.Hooks.registered[t];
                return e ? e[0] : t
            }, cleanRootPropertyValue: function (t, e) {
                return w.RegEx.valueUnwrap.test(e) && (e = e.match(w.RegEx.valueUnwrap)[1]), w.Values.isCSSNullValue(e) && (e = w.Hooks.templates[t][1]), e
            }, extractValue: function (t, e) {
                var i = w.Hooks.registered[t];
                if (i) {
                    var n = i[0], o = i[1];
                    return e = w.Hooks.cleanRootPropertyValue(n, e), e.toString().match(w.RegEx.valueSplit)[o]
                }
                return e
            }, injectValue: function (t, e, i) {
                var n = w.Hooks.registered[t];
                if (n) {
                    var o, r, s = n[0], a = n[1];
                    return i = w.Hooks.cleanRootPropertyValue(s, i), o = i.toString().match(w.RegEx.valueSplit), o[a] = e, r = o.join(" ")
                }
                return i
            }
        },
        Normalizations: {
            registered: {
                clip: function (t, e, i) {
                    switch (t) {
                        case"name":
                            return "clip";
                        case"extract":
                            var n;
                            return w.RegEx.wrappedValueAlreadyExtracted.test(i) ? n = i : (n = i.toString().match(w.RegEx.valueUnwrap), n = n ? n[1].replace(/,(\s+)?/g, " ") : i), n;
                        case"inject":
                            return "rect(" + i + ")"
                    }
                }, blur: function (t, e, i) {
                    switch (t) {
                        case"name":
                            return b.State.isFirefox ? "filter" : "-webkit-filter";
                        case"extract":
                            var n = parseFloat(i);
                            if (!n && 0 !== n) {
                                var o = i.toString().match(/blur\(([0-9]+[A-z]+)\)/i);
                                n = o ? o[1] : 0
                            }
                            return n;
                        case"inject":
                            return parseFloat(i) ? "blur(" + i + ")" : "none"
                    }
                }, opacity: function (t, e, i) {
                    if (8 >= p)switch (t) {
                        case"name":
                            return "filter";
                        case"extract":
                            var n = i.toString().match(/alpha\(opacity=(.*)\)/i);
                            return i = n ? n[1] / 100 : 1;
                        case"inject":
                            return e.style.zoom = 1, parseFloat(i) >= 1 ? "" : "alpha(opacity=" + parseInt(100 * parseFloat(i), 10) + ")"
                    } else switch (t) {
                        case"name":
                            return "opacity";
                        case"extract":
                            return i;
                        case"inject":
                            return i
                    }
                }
            }, register: function () {
                9 >= p || b.State.isGingerbread || (w.Lists.transformsBase = w.Lists.transformsBase.concat(w.Lists.transforms3D));
                for (var t = 0; t < w.Lists.transformsBase.length; t++)!function () {
                    var e = w.Lists.transformsBase[t];
                    w.Normalizations.registered[e] = function (t, i, o) {
                        switch (t) {
                            case"name":
                                return "transform";
                            case"extract":
                                return s(i) === n || s(i).transformCache[e] === n ? /^scale/i.test(e) ? 1 : 0 : s(i).transformCache[e].replace(/[()]/g, "");
                            case"inject":
                                var r = !1;
                                switch (e.substr(0, e.length - 1)) {
                                    case"translate":
                                        r = !/(%|px|em|rem|vw|vh|\d)$/i.test(o);
                                        break;
                                    case"scal":
                                    case"scale":
                                        b.State.isAndroid && s(i).transformCache[e] === n && 1 > o && (o = 1), r = !/(\d)$/i.test(o);
                                        break;
                                    case"skew":
                                        r = !/(deg|\d)$/i.test(o);
                                        break;
                                    case"rotate":
                                        r = !/(deg|\d)$/i.test(o)
                                }
                                return r || (s(i).transformCache[e] = "(" + o + ")"), s(i).transformCache[e]
                        }
                    }
                }();
                for (var t = 0; t < w.Lists.colors.length; t++)!function () {
                    var e = w.Lists.colors[t];
                    w.Normalizations.registered[e] = function (t, i, o) {
                        switch (t) {
                            case"name":
                                return e;
                            case"extract":
                                var r;
                                if (w.RegEx.wrappedValueAlreadyExtracted.test(o))r = o; else {
                                    var s, a = {
                                        black: "rgb(0, 0, 0)",
                                        blue: "rgb(0, 0, 255)",
                                        gray: "rgb(128, 128, 128)",
                                        green: "rgb(0, 128, 0)",
                                        red: "rgb(255, 0, 0)",
                                        white: "rgb(255, 255, 255)"
                                    };
                                    /^[A-z]+$/i.test(o) ? s = a[o] !== n ? a[o] : a.black : w.RegEx.isHex.test(o) ? s = "rgb(" + w.Values.hexToRgb(o).join(" ") + ")" : /^rgba?\(/i.test(o) || (s = a.black), r = (s || o).toString().match(w.RegEx.valueUnwrap)[1].replace(/,(\s+)?/g, " ")
                                }
                                return 8 >= p || 3 !== r.split(" ").length || (r += " 1"), r;
                            case"inject":
                                return 8 >= p ? 4 === o.split(" ").length && (o = o.split(/\s+/).slice(0, 3).join(" ")) : 3 === o.split(" ").length && (o += " 1"), (8 >= p ? "rgb" : "rgba") + "(" + o.replace(/\s+/g, ",").replace(/\.(\d)+(?=,)/g, "") + ")"
                        }
                    }
                }()
            }
        },
        Names: {
            camelCase: function (t) {
                return t.replace(/-(\w)/g, function (t, e) {
                    return e.toUpperCase()
                })
            }, SVGAttribute: function (t) {
                var e = "width|height|x|y|cx|cy|r|rx|ry|x1|x2|y1|y2";
                return (p || b.State.isAndroid && !b.State.isChrome) && (e += "|transform"), new RegExp("^(" + e + ")$", "i").test(t)
            }, prefixCheck: function (t) {
                if (b.State.prefixMatches[t])return [b.State.prefixMatches[t], !0];
                for (var e = ["", "Webkit", "Moz", "ms", "O"], i = 0, n = e.length; n > i; i++) {
                    var o;
                    if (o = 0 === i ? t : e[i] + t.replace(/^\w/, function (t) {
                            return t.toUpperCase()
                        }), m.isString(b.State.prefixElement.style[o]))return b.State.prefixMatches[t] = o, [o, !0]
                }
                return [t, !1]
            }
        },
        Values: {
            hexToRgb: function (t) {
                var e, i = /^#?([a-f\d])([a-f\d])([a-f\d])$/i, n = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i;
                return t = t.replace(i, function (t, e, i, n) {
                    return e + e + i + i + n + n
                }), e = n.exec(t), e ? [parseInt(e[1], 16), parseInt(e[2], 16), parseInt(e[3], 16)] : [0, 0, 0]
            }, isCSSNullValue: function (t) {
                return 0 == t || /^(none|auto|transparent|(rgba\(0, ?0, ?0, ?0\)))$/i.test(t)
            }, getUnitType: function (t) {
                return /^(rotate|skew)/i.test(t) ? "deg" : /(^(scale|scaleX|scaleY|scaleZ|alpha|flexGrow|flexHeight|zIndex|fontWeight)$)|((opacity|red|green|blue|alpha)$)/i.test(t) ? "" : "px"
            }, getDisplayType: function (t) {
                var e = t && t.tagName.toString().toLowerCase();
                return /^(b|big|i|small|tt|abbr|acronym|cite|code|dfn|em|kbd|strong|samp|var|a|bdo|br|img|map|object|q|script|span|sub|sup|button|input|label|select|textarea)$/i.test(e) ? "inline" : /^(li)$/i.test(e) ? "list-item" : /^(tr)$/i.test(e) ? "table-row" : /^(table)$/i.test(e) ? "table" : /^(tbody)$/i.test(e) ? "table-row-group" : "block"
            }, addClass: function (t, e) {
                t.classList ? t.classList.add(e) : t.className += (t.className.length ? " " : "") + e
            }, removeClass: function (t, e) {
                t.classList ? t.classList.remove(e) : t.className = t.className.toString().replace(new RegExp("(^|\\s)" + e.split(" ").join("|") + "(\\s|$)", "gi"), " ")
            }
        },
        getPropertyValue: function (t, i, o, r) {
            function a(t, i) {
                function o() {
                    c && w.setPropertyValue(t, "display", "none")
                }

                var l = 0;
                if (8 >= p)l = d.css(t, i); else {
                    var c = !1;
                    if (/^(width|height)$/.test(i) && 0 === w.getPropertyValue(t, "display") && (c = !0, w.setPropertyValue(t, "display", w.Values.getDisplayType(t))), !r) {
                        if ("height" === i && "border-box" !== w.getPropertyValue(t, "boxSizing").toString().toLowerCase()) {
                            var u = t.offsetHeight - (parseFloat(w.getPropertyValue(t, "borderTopWidth")) || 0) - (parseFloat(w.getPropertyValue(t, "borderBottomWidth")) || 0) - (parseFloat(w.getPropertyValue(t, "paddingTop")) || 0) - (parseFloat(w.getPropertyValue(t, "paddingBottom")) || 0);
                            return o(), u
                        }
                        if ("width" === i && "border-box" !== w.getPropertyValue(t, "boxSizing").toString().toLowerCase()) {
                            var h = t.offsetWidth - (parseFloat(w.getPropertyValue(t, "borderLeftWidth")) || 0) - (parseFloat(w.getPropertyValue(t, "borderRightWidth")) || 0) - (parseFloat(w.getPropertyValue(t, "paddingLeft")) || 0) - (parseFloat(w.getPropertyValue(t, "paddingRight")) || 0);
                            return o(), h
                        }
                    }
                    var f;
                    f = s(t) === n ? e.getComputedStyle(t, null) : s(t).computedStyle ? s(t).computedStyle : s(t).computedStyle = e.getComputedStyle(t, null), "borderColor" === i && (i = "borderTopColor"), l = 9 === p && "filter" === i ? f.getPropertyValue(i) : f[i], ("" === l || null === l) && (l = t.style[i]), o()
                }
                if ("auto" === l && /^(top|right|bottom|left)$/i.test(i)) {
                    var m = a(t, "position");
                    ("fixed" === m || "absolute" === m && /top|left/i.test(i)) && (l = d(t).position()[i] + "px")
                }
                return l
            }

            var l;
            if (w.Hooks.registered[i]) {
                var c = i, u = w.Hooks.getRoot(c);
                o === n && (o = w.getPropertyValue(t, w.Names.prefixCheck(u)[0])), w.Normalizations.registered[u] && (o = w.Normalizations.registered[u]("extract", t, o)), l = w.Hooks.extractValue(c, o)
            } else if (w.Normalizations.registered[i]) {
                var h, f;
                h = w.Normalizations.registered[i]("name", t), "transform" !== h && (f = a(t, w.Names.prefixCheck(h)[0]), w.Values.isCSSNullValue(f) && w.Hooks.templates[i] && (f = w.Hooks.templates[i][1])), l = w.Normalizations.registered[i]("extract", t, f)
            }
            if (!/^[\d-]/.test(l))if (s(t) && s(t).isSVG && w.Names.SVGAttribute(i))if (/^(height|width)$/i.test(i))try {
                l = t.getBBox()[i]
            } catch (m) {
                l = 0
            } else l = t.getAttribute(i); else l = a(t, w.Names.prefixCheck(i)[0]);
            return w.Values.isCSSNullValue(l) && (l = 0), b.debug >= 2 && console.log("Get " + i + ": " + l), l
        },
        setPropertyValue: function (t, i, n, o, r) {
            var a = i;
            if ("scroll" === i)r.container ? r.container["scroll" + r.direction] = n : "Left" === r.direction ? e.scrollTo(n, r.alternateValue) : e.scrollTo(r.alternateValue, n); else if (w.Normalizations.registered[i] && "transform" === w.Normalizations.registered[i]("name", t))w.Normalizations.registered[i]("inject", t, n), a = "transform", n = s(t).transformCache[i]; else {
                if (w.Hooks.registered[i]) {
                    var l = i, c = w.Hooks.getRoot(i);
                    o = o || w.getPropertyValue(t, c), n = w.Hooks.injectValue(l, n, o), i = c
                }
                if (w.Normalizations.registered[i] && (n = w.Normalizations.registered[i]("inject", t, n), i = w.Normalizations.registered[i]("name", t)), a = w.Names.prefixCheck(i)[0], 8 >= p)try {
                    t.style[a] = n
                } catch (u) {
                    b.debug && console.log("Browser does not support [" + n + "] for [" + a + "]")
                } else s(t) && s(t).isSVG && w.Names.SVGAttribute(i) ? t.setAttribute(i, n) : t.style[a] = n;
                b.debug >= 2 && console.log("Set " + i + " (" + a + "): " + n)
            }
            return [a, n]
        },
        flushTransformCache: function (t) {
            function e(e) {
                return parseFloat(w.getPropertyValue(t, e))
            }

            var i = "";
            if ((p || b.State.isAndroid && !b.State.isChrome) && s(t).isSVG) {
                var n = {
                    translate: [e("translateX"), e("translateY")],
                    skewX: [e("skewX")],
                    skewY: [e("skewY")],
                    scale: 1 !== e("scale") ? [e("scale"), e("scale")] : [e("scaleX"), e("scaleY")],
                    rotate: [e("rotateZ"), 0, 0]
                };
                d.each(s(t).transformCache, function (t) {
                    /^translate/i.test(t) ? t = "translate" : /^scale/i.test(t) ? t = "scale" : /^rotate/i.test(t) && (t = "rotate"), n[t] && (i += t + "(" + n[t].join(" ") + ") ", delete n[t])
                })
            } else {
                var o, r;
                d.each(s(t).transformCache, function (e) {
                    return o = s(t).transformCache[e], "transformPerspective" === e ? (r = o, !0) : (9 === p && "rotateZ" === e && (e = "rotate"), void(i += e + o + " "))
                }), r && (i = "perspective" + r + " " + i)
            }
            w.setPropertyValue(t, "transform", i)
        }
    };
    w.Hooks.register(), w.Normalizations.register(), b.hook = function (t, e, i) {
        var o = n;
        return t = r(t), d.each(t, function (t, r) {
            if (s(r) === n && b.init(r), i === n)o === n && (o = b.CSS.getPropertyValue(r, e)); else {
                var a = b.CSS.setPropertyValue(r, e, i);
                "transform" === a[0] && b.CSS.flushTransformCache(r), o = a
            }
        }), o
    };
    var _ = function () {
        function t() {
            return a ? $.promise || null : l
        }

        function o() {
            function t(t) {
                function h(t, e) {
                    var i = n, o = n, s = n;
                    return m.isArray(t) ? (i = t[0], !m.isArray(t[1]) && /^[\d-]/.test(t[1]) || m.isFunction(t[1]) || w.RegEx.isHex.test(t[1]) ? s = t[1] : (m.isString(t[1]) && !w.RegEx.isHex.test(t[1]) || m.isArray(t[1])) && (o = e ? t[1] : c(t[1], a.duration), t[2] !== n && (s = t[2]))) : i = t, e || (o = o || a.easing), m.isFunction(i) && (i = i.call(r, C, k)), m.isFunction(s) && (s = s.call(r, C, k)), [i || 0, o, s]
                }

                function p(t, e) {
                    var i, n;
                    return n = (e || "0").toString().toLowerCase().replace(/[%A-z]+$/, function (t) {
                        return i = t, ""
                    }), i || (i = w.Values.getUnitType(t)), [n, i]
                }

                function v() {
                    var t = {
                        myParent: r.parentNode || i.body,
                        position: w.getPropertyValue(r, "position"),
                        fontSize: w.getPropertyValue(r, "fontSize")
                    }, n = t.position === I.lastPosition && t.myParent === I.lastParent, o = t.fontSize === I.lastFontSize;
                    I.lastParent = t.myParent, I.lastPosition = t.position, I.lastFontSize = t.fontSize;
                    var a = 100, l = {};
                    if (o && n)l.emToPx = I.lastEmToPx, l.percentToPxWidth = I.lastPercentToPxWidth, l.percentToPxHeight = I.lastPercentToPxHeight; else {
                        var c = s(r).isSVG ? i.createElementNS("http://www.w3.org/2000/svg", "rect") : i.createElement("div");
                        b.init(c), t.myParent.appendChild(c), d.each(["overflow", "overflowX", "overflowY"], function (t, e) {
                            b.CSS.setPropertyValue(c, e, "hidden")
                        }), b.CSS.setPropertyValue(c, "position", t.position), b.CSS.setPropertyValue(c, "fontSize", t.fontSize), b.CSS.setPropertyValue(c, "boxSizing", "content-box"), d.each(["minWidth", "maxWidth", "width", "minHeight", "maxHeight", "height"], function (t, e) {
                            b.CSS.setPropertyValue(c, e, a + "%")
                        }), b.CSS.setPropertyValue(c, "paddingLeft", a + "em"), l.percentToPxWidth = I.lastPercentToPxWidth = (parseFloat(w.getPropertyValue(c, "width", null, !0)) || 1) / a, l.percentToPxHeight = I.lastPercentToPxHeight = (parseFloat(w.getPropertyValue(c, "height", null, !0)) || 1) / a, l.emToPx = I.lastEmToPx = (parseFloat(w.getPropertyValue(c, "paddingLeft")) || 1) / a, t.myParent.removeChild(c)
                    }
                    return null === I.remToPx && (I.remToPx = parseFloat(w.getPropertyValue(i.body, "fontSize")) || 16), null === I.vwToPx && (I.vwToPx = parseFloat(e.innerWidth) / 100, I.vhToPx = parseFloat(e.innerHeight) / 100), l.remToPx = I.remToPx, l.vwToPx = I.vwToPx, l.vhToPx = I.vhToPx, b.debug >= 1 && console.log("Unit ratios: " + JSON.stringify(l), r), l
                }

                if (a.begin && 0 === C)try {
                    a.begin.call(f, f)
                } catch (x) {
                    setTimeout(function () {
                        throw x
                    }, 1)
                }
                if ("scroll" === E) {
                    var _, T, S, A = /^x$/i.test(a.axis) ? "Left" : "Top", O = parseFloat(a.offset) || 0;
                    a.container ? m.isWrapped(a.container) || m.isNode(a.container) ? (a.container = a.container[0] || a.container, _ = a.container["scroll" + A], S = _ + d(r).position()[A.toLowerCase()] + O) : a.container = null : (_ = b.State.scrollAnchor[b.State["scrollProperty" + A]], T = b.State.scrollAnchor[b.State["scrollProperty" + ("Left" === A ? "Top" : "Left")]], S = d(r).offset()[A.toLowerCase()] + O), l = {
                        scroll: {
                            rootPropertyValue: !1,
                            startValue: _,
                            currentValue: _,
                            endValue: S,
                            unitType: "",
                            easing: a.easing,
                            scrollData: {container: a.container, direction: A, alternateValue: T}
                        }, element: r
                    }, b.debug && console.log("tweensContainer (scroll): ", l.scroll, r)
                } else if ("reverse" === E) {
                    if (!s(r).tweensContainer)return void d.dequeue(r, a.queue);
                    "none" === s(r).opts.display && (s(r).opts.display = "auto"), "hidden" === s(r).opts.visibility && (s(r).opts.visibility = "visible"), s(r).opts.loop = !1, s(r).opts.begin = null, s(r).opts.complete = null, y.easing || delete a.easing, y.duration || delete a.duration, a = d.extend({}, s(r).opts, a);
                    var N = d.extend(!0, {}, s(r).tweensContainer);
                    for (var D in N)if ("element" !== D) {
                        var P = N[D].startValue;
                        N[D].startValue = N[D].currentValue = N[D].endValue, N[D].endValue = P, m.isEmptyObject(y) || (N[D].easing = a.easing), b.debug && console.log("reverse tweensContainer (" + D + "): " + JSON.stringify(N[D]), r)
                    }
                    l = N
                } else if ("start" === E) {
                    var N;
                    s(r).tweensContainer && s(r).isAnimating === !0 && (N = s(r).tweensContainer), d.each(g, function (t, e) {
                        if (RegExp("^" + w.Lists.colors.join("$|^") + "$").test(t)) {
                            var i = h(e, !0), o = i[0], r = i[1], s = i[2];
                            if (w.RegEx.isHex.test(o)) {
                                for (var a = ["Red", "Green", "Blue"], l = w.Values.hexToRgb(o), c = s ? w.Values.hexToRgb(s) : n, u = 0; u < a.length; u++) {
                                    var d = [l[u]];
                                    r && d.push(r), c !== n && d.push(c[u]), g[t + a[u]] = d
                                }
                                delete g[t]
                            }
                        }
                    });
                    for (var M in g) {
                        var F = h(g[M]), q = F[0], L = F[1], W = F[2];
                        M = w.Names.camelCase(M);
                        var H = w.Hooks.getRoot(M), R = !1;
                        if (s(r).isSVG || "tween" === H || w.Names.prefixCheck(H)[1] !== !1 || w.Normalizations.registered[H] !== n) {
                            (a.display !== n && null !== a.display && "none" !== a.display || a.visibility !== n && "hidden" !== a.visibility) && /opacity|filter/.test(M) && !W && 0 !== q && (W = 0), a._cacheValues && N && N[M] ? (W === n && (W = N[M].endValue + N[M].unitType), R = s(r).rootPropertyValueCache[H]) : w.Hooks.registered[M] ? W === n ? (R = w.getPropertyValue(r, H), W = w.getPropertyValue(r, M, R)) : R = w.Hooks.templates[H][1] : W === n && (W = w.getPropertyValue(r, M));
                            var z, V, Q, X = !1;
                            if (z = p(M, W), W = z[0], Q = z[1], z = p(M, q), q = z[0].replace(/^([+-\/*])=/, function (t, e) {
                                    return X = e, ""
                                }), V = z[1], W = parseFloat(W) || 0, q = parseFloat(q) || 0, "%" === V && (/^(fontSize|lineHeight)$/.test(M) ? (q /= 100, V = "em") : /^scale/.test(M) ? (q /= 100, V = "") : /(Red|Green|Blue)$/i.test(M) && (q = q / 100 * 255, V = "")), /[\/*]/.test(X))V = Q; else if (Q !== V && 0 !== W)if (0 === q)V = Q; else {
                                o = o || v();
                                var B = /margin|padding|left|right|width|text|word|letter/i.test(M) || /X$/.test(M) || "x" === M ? "x" : "y";
                                switch (Q) {
                                    case"%":
                                        W *= "x" === B ? o.percentToPxWidth : o.percentToPxHeight;
                                        break;
                                    case"px":
                                        break;
                                    default:
                                        W *= o[Q + "ToPx"]
                                }
                                switch (V) {
                                    case"%":
                                        W *= 1 / ("x" === B ? o.percentToPxWidth : o.percentToPxHeight);
                                        break;
                                    case"px":
                                        break;
                                    default:
                                        W *= 1 / o[V + "ToPx"]
                                }
                            }
                            switch (X) {
                                case"+":
                                    q = W + q;
                                    break;
                                case"-":
                                    q = W - q;
                                    break;
                                case"*":
                                    q = W * q;
                                    break;
                                case"/":
                                    q = W / q
                            }
                            l[M] = {
                                rootPropertyValue: R,
                                startValue: W,
                                currentValue: W,
                                endValue: q,
                                unitType: V,
                                easing: L
                            }, b.debug && console.log("tweensContainer (" + M + "): " + JSON.stringify(l[M]), r)
                        } else b.debug && console.log("Skipping [" + H + "] due to a lack of browser support.")
                    }
                    l.element = r
                }
                l.element && (w.Values.addClass(r, "velocity-animating"), j.push(l), "" === a.queue && (s(r).tweensContainer = l, s(r).opts = a), s(r).isAnimating = !0, C === k - 1 ? (b.State.calls.push([j, f, a, null, $.resolver]), b.State.isTicking === !1 && (b.State.isTicking = !0, u())) : C++)
            }

            var o, r = this, a = d.extend({}, b.defaults, y), l = {};
            switch (s(r) === n && b.init(r), parseFloat(a.delay) && a.queue !== !1 && d.queue(r, a.queue, function (t) {
                b.velocityQueueEntryFlag = !0, s(r).delayTimer = {
                    setTimeout: setTimeout(t, parseFloat(a.delay)),
                    next: t
                }
            }), a.duration.toString().toLowerCase()) {
                case"fast":
                    a.duration = 200;
                    break;
                case"normal":
                    a.duration = v;
                    break;
                case"slow":
                    a.duration = 600;
                    break;
                default:
                    a.duration = parseFloat(a.duration) || 1
            }
            b.mock !== !1 && (b.mock === !0 ? a.duration = a.delay = 1 : (a.duration *= parseFloat(b.mock) || 1, a.delay *= parseFloat(b.mock) || 1)), a.easing = c(a.easing, a.duration), a.begin && !m.isFunction(a.begin) && (a.begin = null), a.progress && !m.isFunction(a.progress) && (a.progress = null), a.complete && !m.isFunction(a.complete) && (a.complete = null), a.display !== n && null !== a.display && (a.display = a.display.toString().toLowerCase(), "auto" === a.display && (a.display = b.CSS.Values.getDisplayType(r))), a.visibility !== n && null !== a.visibility && (a.visibility = a.visibility.toString().toLowerCase()), a.mobileHA = a.mobileHA && b.State.isMobile && !b.State.isGingerbread, a.queue === !1 ? a.delay ? setTimeout(t, a.delay) : t() : d.queue(r, a.queue, function (e, i) {
                return i === !0 ? ($.promise && $.resolver(f), !0) : (b.velocityQueueEntryFlag = !0, void t(e))
            }), "" !== a.queue && "fx" !== a.queue || "inprogress" === d.queue(r)[0] || d.dequeue(r)
        }

        var a, l, p, f, g, y, x = arguments[0] && (arguments[0].p || d.isPlainObject(arguments[0].properties) && !arguments[0].properties.names || m.isString(arguments[0].properties));
        if (m.isWrapped(this) ? (a = !1, p = 0, f = this, l = this) : (a = !0, p = 1, f = x ? arguments[0].elements || arguments[0].e : arguments[0]), f = r(f)) {
            x ? (g = arguments[0].properties || arguments[0].p, y = arguments[0].options || arguments[0].o) : (g = arguments[p], y = arguments[p + 1]);
            var k = f.length, C = 0;
            if (!/^(stop|finish)$/i.test(g) && !d.isPlainObject(y)) {
                var T = p + 1;
                y = {};
                for (var S = T; S < arguments.length; S++)m.isArray(arguments[S]) || !/^(fast|normal|slow)$/i.test(arguments[S]) && !/^\d/.test(arguments[S]) ? m.isString(arguments[S]) || m.isArray(arguments[S]) ? y.easing = arguments[S] : m.isFunction(arguments[S]) && (y.complete = arguments[S]) : y.duration = arguments[S]
            }
            var $ = {promise: null, resolver: null, rejecter: null};
            a && b.Promise && ($.promise = new b.Promise(function (t, e) {
                $.resolver = t, $.rejecter = e
            }));
            var E;
            switch (g) {
                case"scroll":
                    E = "scroll";
                    break;
                case"reverse":
                    E = "reverse";
                    break;
                case"finish":
                case"stop":
                    d.each(f, function (t, e) {
                        s(e) && s(e).delayTimer && (clearTimeout(s(e).delayTimer.setTimeout), s(e).delayTimer.next && s(e).delayTimer.next(), delete s(e).delayTimer)
                    });
                    var A = [];
                    return d.each(b.State.calls, function (t, e) {
                        e && d.each(e[1], function (i, o) {
                            var r = y === n ? "" : y;
                            return r === !0 || e[2].queue === r || y === n && e[2].queue === !1 ? void d.each(f, function (i, n) {
                                n === o && ((y === !0 || m.isString(y)) && (d.each(d.queue(n, m.isString(y) ? y : ""), function (t, e) {
                                    m.isFunction(e) && e(null, !0)
                                }), d.queue(n, m.isString(y) ? y : "", [])), "stop" === g ? (s(n) && s(n).tweensContainer && r !== !1 && d.each(s(n).tweensContainer, function (t, e) {
                                    e.endValue = e.currentValue
                                }), A.push(t)) : "finish" === g && (e[2].duration = 1))
                            }) : !0
                        })
                    }), "stop" === g && (d.each(A, function (t, e) {
                        h(e, !0)
                    }), $.promise && $.resolver(f)), t();
                default:
                    if (!d.isPlainObject(g) || m.isEmptyObject(g)) {
                        if (m.isString(g) && b.Redirects[g]) {
                            var O = d.extend({}, y), N = O.duration, D = O.delay || 0;
                            return O.backwards === !0 && (f = d.extend(!0, [], f).reverse()), d.each(f, function (t, e) {
                                parseFloat(O.stagger) ? O.delay = D + parseFloat(O.stagger) * t : m.isFunction(O.stagger) && (O.delay = D + O.stagger.call(e, t, k)), O.drag && (O.duration = parseFloat(N) || (/^(callout|transition)/.test(g) ? 1e3 : v), O.duration = Math.max(O.duration * (O.backwards ? 1 - t / k : (t + 1) / k), .75 * O.duration, 200)), b.Redirects[g].call(e, e, O || {}, t, k, f, $.promise ? $ : n)
                            }), t()
                        }
                        var P = "Velocity: First argument (" + g + ") was not a property map, a known action, or a registered redirect. Aborting.";
                        return $.promise ? $.rejecter(new Error(P)) : console.log(P), t()
                    }
                    E = "start"
            }
            var I = {
                lastParent: null,
                lastPosition: null,
                lastFontSize: null,
                lastPercentToPxWidth: null,
                lastPercentToPxHeight: null,
                lastEmToPx: null,
                remToPx: null,
                vwToPx: null,
                vhToPx: null
            }, j = [];
            d.each(f, function (t, e) {
                m.isNode(e) && o.call(e)
            });
            var M, O = d.extend({}, b.defaults, y);
            if (O.loop = parseInt(O.loop), M = 2 * O.loop - 1, O.loop)for (var F = 0; M > F; F++) {
                var q = {delay: O.delay, progress: O.progress};
                F === M - 1 && (q.display = O.display, q.visibility = O.visibility, q.complete = O.complete), _(f, "reverse", q)
            }
            return t()
        }
    };
    b = d.extend(_, b), b.animate = _;
    var k = e.requestAnimationFrame || f;
    return b.State.isMobile || i.hidden === n || i.addEventListener("visibilitychange", function () {
        i.hidden ? (k = function (t) {
            return setTimeout(function () {
                t(!0)
            }, 16)
        }, u()) : k = e.requestAnimationFrame || f
    }), t.Velocity = b, t !== e && (t.fn.velocity = _, t.fn.velocity.defaults = b.defaults), d.each(["Down", "Up"], function (t, e) {
        b.Redirects["slide" + e] = function (t, i, o, r, s, a) {
            var l = d.extend({}, i), c = l.begin, u = l.complete, h = {
                height: "",
                marginTop: "",
                marginBottom: "",
                paddingTop: "",
                paddingBottom: ""
            }, p = {};
            l.display === n && (l.display = "Down" === e ? "inline" === b.CSS.Values.getDisplayType(t) ? "inline-block" : "block" : "none"), l.begin = function () {
                c && c.call(s, s);
                for (var i in h) {
                    p[i] = t.style[i];
                    var n = b.CSS.getPropertyValue(t, i);
                    h[i] = "Down" === e ? [n, 0] : [0, n]
                }
                p.overflow = t.style.overflow, t.style.overflow = "hidden"
            }, l.complete = function () {
                for (var e in p)t.style[e] = p[e];
                u && u.call(s, s), a && a.resolver(s)
            }, b(t, h, l)
        }
    }), d.each(["In", "Out"], function (t, e) {
        b.Redirects["fade" + e] = function (t, i, o, r, s, a) {
            var l = d.extend({}, i), c = {opacity: "In" === e ? 1 : 0}, u = l.complete;
            l.complete = o !== r - 1 ? l.begin = null : function () {
                u && u.call(s, s), a && a.resolver(s)
            }, l.display === n && (l.display = "In" === e ? "auto" : "none"), b(this, c, l)
        }
    }), b
    }
    (window.jQuery || window.Zepto || window, window, document)
    }),
    !function (t, e, i, n) {
        "use strict";
        function o(t, e, i) {
            return setTimeout(u(t, i), e)
        }

        function r(t, e, i) {
            return Array.isArray(t) ? (s(t, i[e], i), !0) : !1
        }

        function s(t, e, i) {
            var o;
            if (t)if (t.forEach)t.forEach(e, i); else if (t.length !== n)for (o = 0; o < t.length;)e.call(i, t[o], o, t), o++; else for (o in t)t.hasOwnProperty(o) && e.call(i, t[o], o, t)
        }

        function a(t, e, i) {
            for (var o = Object.keys(e), r = 0; r < o.length;)(!i || i && t[o[r]] === n) && (t[o[r]] = e[o[r]]), r++;
            return t
        }

        function l(t, e) {
            return a(t, e, !0)
        }

        function c(t, e, i) {
            var n, o = e.prototype;
            n = t.prototype = Object.create(o), n.constructor = t, n._super = o, i && a(n, i)
        }

        function u(t, e) {
            return function () {
                return t.apply(e, arguments)
            }
        }

        function h(t, e) {
            return typeof t == ut ? t.apply(e ? e[0] || n : n, e) : t
        }

        function d(t, e) {
            return t === n ? e : t
        }

        function p(t, e, i) {
            s(v(e), function (e) {
                t.addEventListener(e, i, !1)
            })
        }

        function f(t, e, i) {
            s(v(e), function (e) {
                t.removeEventListener(e, i, !1)
            })
        }

        function m(t, e) {
            for (; t;) {
                if (t == e)return !0;
                t = t.parentNode
            }
            return !1
        }

        function g(t, e) {
            return t.indexOf(e) > -1
        }

        function v(t) {
            return t.trim().split(/\s+/g)
        }

        function y(t, e, i) {
            if (t.indexOf && !i)return t.indexOf(e);
            for (var n = 0; n < t.length;) {
                if (i && t[n][i] == e || !i && t[n] === e)return n;
                n++
            }
            return -1
        }

        function b(t) {
            return Array.prototype.slice.call(t, 0)
        }

        function x(t, e, i) {
            for (var n = [], o = [], r = 0; r < t.length;) {
                var s = e ? t[r][e] : t[r];
                y(o, s) < 0 && n.push(t[r]), o[r] = s, r++
            }
            return i && (n = e ? n.sort(function (t, i) {
                return t[e] > i[e]
            }) : n.sort()), n
        }

        function w(t, e) {
            for (var i, o, r = e[0].toUpperCase() + e.slice(1), s = 0; s < lt.length;) {
                if (i = lt[s], o = i ? i + r : e, o in t)return o;
                s++
            }
            return n
        }

        function _() {
            return ft++
        }

        function k(t) {
            var e = t.ownerDocument;
            return e.defaultView || e.parentWindow
        }

        function C(t, e) {
            var i = this;
            this.manager = t, this.callback = e, this.element = t.element, this.target = t.options.inputTarget, this.domHandler = function (e) {
                h(t.options.enable, [t]) && i.handler(e)
            }, this.init()
        }

        function T(t) {
            var e, i = t.options.inputClass;
            return new (e = i ? i : vt ? L : yt ? R : gt ? V : q)(t, S)
        }

        function S(t, e, i) {
            var n = i.pointers.length, o = i.changedPointers.length, r = e & Ct && 0 === n - o, s = e & (St | $t) && 0 === n - o;
            i.isFirst = !!r, i.isFinal = !!s, r && (t.session = {}), i.eventType = e, $(t, i), t.emit("hammer.input", i), t.recognize(i), t.session.prevInput = i
        }

        function $(t, e) {
            var i = t.session, n = e.pointers, o = n.length;
            i.firstInput || (i.firstInput = O(e)), o > 1 && !i.firstMultiple ? i.firstMultiple = O(e) : 1 === o && (i.firstMultiple = !1);
            var r = i.firstInput, s = i.firstMultiple, a = s ? s.center : r.center, l = e.center = N(n);
            e.timeStamp = pt(), e.deltaTime = e.timeStamp - r.timeStamp, e.angle = j(a, l), e.distance = I(a, l), E(i, e), e.offsetDirection = P(e.deltaX, e.deltaY), e.scale = s ? F(s.pointers, n) : 1, e.rotation = s ? M(s.pointers, n) : 0, A(i, e);
            var c = t.element;
            m(e.srcEvent.target, c) && (c = e.srcEvent.target), e.target = c
        }

        function E(t, e) {
            var i = e.center, n = t.offsetDelta || {}, o = t.prevDelta || {}, r = t.prevInput || {};
            (e.eventType === Ct || r.eventType === St) && (o = t.prevDelta = {
                x: r.deltaX || 0,
                y: r.deltaY || 0
            }, n = t.offsetDelta = {x: i.x, y: i.y}), e.deltaX = o.x + (i.x - n.x), e.deltaY = o.y + (i.y - n.y)
        }

        function A(t, e) {
            var i, o, r, s, a = t.lastInterval || e, l = e.timeStamp - a.timeStamp;
            if (e.eventType != $t && (l > kt || a.velocity === n)) {
                var c = a.deltaX - e.deltaX, u = a.deltaY - e.deltaY, h = D(l, c, u);
                o = h.x, r = h.y, i = dt(h.x) > dt(h.y) ? h.x : h.y, s = P(c, u), t.lastInterval = e
            } else i = a.velocity, o = a.velocityX, r = a.velocityY, s = a.direction;
            e.velocity = i, e.velocityX = o, e.velocityY = r, e.direction = s
        }

        function O(t) {
            for (var e = [], i = 0; i < t.pointers.length;)e[i] = {
                clientX: ht(t.pointers[i].clientX),
                clientY: ht(t.pointers[i].clientY)
            }, i++;
            return {timeStamp: pt(), pointers: e, center: N(e), deltaX: t.deltaX, deltaY: t.deltaY}
        }

        function N(t) {
            var e = t.length;
            if (1 === e)return {x: ht(t[0].clientX), y: ht(t[0].clientY)};
            for (var i = 0, n = 0, o = 0; e > o;)i += t[o].clientX, n += t[o].clientY, o++;
            return {x: ht(i / e), y: ht(n / e)}
        }

        function D(t, e, i) {
            return {x: e / t || 0, y: i / t || 0}
        }

        function P(t, e) {
            return t === e ? Et : dt(t) >= dt(e) ? t > 0 ? At : Ot : e > 0 ? Nt : Dt
        }

        function I(t, e, i) {
            i || (i = Mt);
            var n = e[i[0]] - t[i[0]], o = e[i[1]] - t[i[1]];
            return Math.sqrt(n * n + o * o)
        }

        function j(t, e, i) {
            i || (i = Mt);
            var n = e[i[0]] - t[i[0]], o = e[i[1]] - t[i[1]];
            return 180 * Math.atan2(o, n) / Math.PI
        }

        function M(t, e) {
            return j(e[1], e[0], Ft) - j(t[1], t[0], Ft)
        }

        function F(t, e) {
            return I(e[0], e[1], Ft) / I(t[0], t[1], Ft)
        }

        function q() {
            this.evEl = Lt, this.evWin = Wt, this.allow = !0, this.pressed = !1, C.apply(this, arguments)
        }

        function L() {
            this.evEl = zt, this.evWin = Vt, C.apply(this, arguments), this.store = this.manager.session.pointerEvents = []
        }

        function W() {
            this.evTarget = Xt, this.evWin = Bt, this.started = !1, C.apply(this, arguments)
        }

        function H(t, e) {
            var i = b(t.touches), n = b(t.changedTouches);
            return e & (St | $t) && (i = x(i.concat(n), "identifier", !0)), [i, n]
        }

        function R() {
            this.evTarget = Ut, this.targetIds = {}, C.apply(this, arguments)
        }

        function z(t, e) {
            var i = b(t.touches), n = this.targetIds;
            if (e & (Ct | Tt) && 1 === i.length)return n[i[0].identifier] = !0, [i, i];
            var o, r, s = b(t.changedTouches), a = [], l = this.target;
            if (r = i.filter(function (t) {
                    return m(t.target, l)
                }), e === Ct)for (o = 0; o < r.length;)n[r[o].identifier] = !0, o++;
            for (o = 0; o < s.length;)n[s[o].identifier] && a.push(s[o]), e & (St | $t) && delete n[s[o].identifier], o++;
            return a.length ? [x(r.concat(a), "identifier", !0), a] : void 0
        }

        function V() {
            C.apply(this, arguments);
            var t = u(this.handler, this);
            this.touch = new R(this.manager, t), this.mouse = new q(this.manager, t)
        }

        function Q(t, e) {
            this.manager = t, this.set(e)
        }

        function X(t) {
            if (g(t, ee))return ee;
            var e = g(t, ie), i = g(t, ne);
            return e && i ? ie + " " + ne : e || i ? e ? ie : ne : g(t, te) ? te : Zt
        }

        function B(t) {
            this.id = _(), this.manager = null, this.options = l(t || {}, this.defaults), this.options.enable = d(this.options.enable, !0), this.state = oe,
                this.simultaneous = {}, this.requireFail = []
        }

        function Y(t) {
            return t & ce ? "cancel" : t & ae ? "end" : t & se ? "move" : t & re ? "start" : ""
        }

        function U(t) {
            return t == Dt ? "down" : t == Nt ? "up" : t == At ? "left" : t == Ot ? "right" : ""
        }

        function G(t, e) {
            var i = e.manager;
            return i ? i.get(t) : t
        }

        function K() {
            B.apply(this, arguments)
        }

        function J() {
            K.apply(this, arguments), this.pX = null, this.pY = null
        }

        function Z() {
            K.apply(this, arguments)
        }

        function tt() {
            B.apply(this, arguments), this._timer = null, this._input = null
        }

        function et() {
            K.apply(this, arguments)
        }

        function it() {
            K.apply(this, arguments)
        }

        function nt() {
            B.apply(this, arguments), this.pTime = !1, this.pCenter = !1, this._timer = null, this._input = null, this.count = 0
        }

        function ot(t, e) {
            return e = e || {}, e.recognizers = d(e.recognizers, ot.defaults.preset), new rt(t, e)
        }

        function rt(t, e) {
            e = e || {}, this.options = l(e, ot.defaults), this.options.inputTarget = this.options.inputTarget || t, this.handlers = {}, this.session = {}, this.recognizers = [], this.element = t, this.input = T(this), this.touchAction = new Q(this, this.options.touchAction), st(this, !0), s(e.recognizers, function (t) {
                var e = this.add(new t[0](t[1]));
                t[2] && e.recognizeWith(t[2]), t[3] && e.requireFailure(t[3])
            }, this)
        }

        function st(t, e) {
            var i = t.element;
            s(t.options.cssProps, function (t, n) {
                i.style[w(i.style, n)] = e ? t : ""
            })
        }

        function at(t, i) {
            var n = e.createEvent("Event");
            n.initEvent(t, !0, !0), n.gesture = i, i.target.dispatchEvent(n)
        }

        var lt = ["", "webkit", "moz", "MS", "ms", "o"], ct = e.createElement("div"), ut = "function", ht = Math.round, dt = Math.abs, pt = Date.now, ft = 1, mt = /mobile|tablet|ip(ad|hone|od)|android/i, gt = "ontouchstart"in t, vt = w(t, "PointerEvent") !== n, yt = gt && mt.test(navigator.userAgent), bt = "touch", xt = "pen", wt = "mouse", _t = "kinect", kt = 25, Ct = 1, Tt = 2, St = 4, $t = 8, Et = 1, At = 2, Ot = 4, Nt = 8, Dt = 16, Pt = At | Ot, It = Nt | Dt, jt = Pt | It, Mt = ["x", "y"], Ft = ["clientX", "clientY"];
        C.prototype = {
            handler: function () {
            }, init: function () {
                this.evEl && p(this.element, this.evEl, this.domHandler), this.evTarget && p(this.target, this.evTarget, this.domHandler), this.evWin && p(k(this.element), this.evWin, this.domHandler)
            }, destroy: function () {
                this.evEl && f(this.element, this.evEl, this.domHandler), this.evTarget && f(this.target, this.evTarget, this.domHandler), this.evWin && f(k(this.element), this.evWin, this.domHandler)
            }
        };
        var qt = {mousedown: Ct, mousemove: Tt, mouseup: St}, Lt = "mousedown", Wt = "mousemove mouseup";
        c(q, C, {
            handler: function (t) {
                var e = qt[t.type];
                e & Ct && 0 === t.button && (this.pressed = !0), e & Tt && 1 !== t.which && (e = St), this.pressed && this.allow && (e & St && (this.pressed = !1), this.callback(this.manager, e, {
                    pointers: [t],
                    changedPointers: [t],
                    pointerType: wt,
                    srcEvent: t
                }))
            }
        });
        var Ht = {pointerdown: Ct, pointermove: Tt, pointerup: St, pointercancel: $t, pointerout: $t}, Rt = {
            2: bt,
            3: xt,
            4: wt,
            5: _t
        }, zt = "pointerdown", Vt = "pointermove pointerup pointercancel";
        t.MSPointerEvent && (zt = "MSPointerDown", Vt = "MSPointerMove MSPointerUp MSPointerCancel"), c(L, C, {
            handler: function (t) {
                var e = this.store, i = !1, n = t.type.toLowerCase().replace("ms", ""), o = Ht[n], r = Rt[t.pointerType] || t.pointerType, s = r == bt, a = y(e, t.pointerId, "pointerId");
                o & Ct && (0 === t.button || s) ? 0 > a && (e.push(t), a = e.length - 1) : o & (St | $t) && (i = !0), 0 > a || (e[a] = t, this.callback(this.manager, o, {
                    pointers: e,
                    changedPointers: [t],
                    pointerType: r,
                    srcEvent: t
                }), i && e.splice(a, 1))
            }
        });
        var Qt = {
            touchstart: Ct,
            touchmove: Tt,
            touchend: St,
            touchcancel: $t
        }, Xt = "touchstart", Bt = "touchstart touchmove touchend touchcancel";
        c(W, C, {
            handler: function (t) {
                var e = Qt[t.type];
                if (e === Ct && (this.started = !0), this.started) {
                    var i = H.call(this, t, e);
                    e & (St | $t) && 0 === i[0].length - i[1].length && (this.started = !1), this.callback(this.manager, e, {
                        pointers: i[0],
                        changedPointers: i[1],
                        pointerType: bt,
                        srcEvent: t
                    })
                }
            }
        });
        var Yt = {
            touchstart: Ct,
            touchmove: Tt,
            touchend: St,
            touchcancel: $t
        }, Ut = "touchstart touchmove touchend touchcancel";
        c(R, C, {
            handler: function (t) {
                var e = Yt[t.type], i = z.call(this, t, e);
                i && this.callback(this.manager, e, {
                    pointers: i[0],
                    changedPointers: i[1],
                    pointerType: bt,
                    srcEvent: t
                })
            }
        }), c(V, C, {
            handler: function (t, e, i) {
                var n = i.pointerType == bt, o = i.pointerType == wt;
                if (n)this.mouse.allow = !1; else if (o && !this.mouse.allow)return;
                e & (St | $t) && (this.mouse.allow = !0), this.callback(t, e, i)
            }, destroy: function () {
                this.touch.destroy(), this.mouse.destroy()
            }
        });
        var Gt = w(ct.style, "touchAction"), Kt = Gt !== n, Jt = "compute", Zt = "auto", te = "manipulation", ee = "none", ie = "pan-x", ne = "pan-y";
        Q.prototype = {
            set: function (t) {
                t == Jt && (t = this.compute()), Kt && (this.manager.element.style[Gt] = t), this.actions = t.toLowerCase().trim()
            }, update: function () {
                this.set(this.manager.options.touchAction)
            }, compute: function () {
                var t = [];
                return s(this.manager.recognizers, function (e) {
                    h(e.options.enable, [e]) && (t = t.concat(e.getTouchAction()))
                }), X(t.join(" "))
            }, preventDefaults: function (t) {
                if (!Kt) {
                    var e = t.srcEvent, i = t.offsetDirection;
                    if (this.manager.session.prevented)return void e.preventDefault();
                    var n = this.actions, o = g(n, ee), r = g(n, ne), s = g(n, ie);
                    return o || r && i & Pt || s && i & It ? this.preventSrc(e) : void 0
                }
            }, preventSrc: function (t) {
                this.manager.session.prevented = !0, t.preventDefault()
            }
        };
        var oe = 1, re = 2, se = 4, ae = 8, le = ae, ce = 16, ue = 32;
        B.prototype = {
            defaults: {}, set: function (t) {
                return a(this.options, t), this.manager && this.manager.touchAction.update(), this
            }, recognizeWith: function (t) {
                if (r(t, "recognizeWith", this))return this;
                var e = this.simultaneous;
                return t = G(t, this), e[t.id] || (e[t.id] = t, t.recognizeWith(this)), this
            }, dropRecognizeWith: function (t) {
                return r(t, "dropRecognizeWith", this) ? this : (t = G(t, this), delete this.simultaneous[t.id], this)
            }, requireFailure: function (t) {
                if (r(t, "requireFailure", this))return this;
                var e = this.requireFail;
                return t = G(t, this), -1 === y(e, t) && (e.push(t), t.requireFailure(this)), this
            }, dropRequireFailure: function (t) {
                if (r(t, "dropRequireFailure", this))return this;
                t = G(t, this);
                var e = y(this.requireFail, t);
                return e > -1 && this.requireFail.splice(e, 1), this
            }, hasRequireFailures: function () {
                return this.requireFail.length > 0
            }, canRecognizeWith: function (t) {
                return !!this.simultaneous[t.id]
            }, emit: function (t) {
                function e(e) {
                    i.manager.emit(i.options.event + (e ? Y(n) : ""), t)
                }

                var i = this, n = this.state;
                ae > n && e(!0), e(), n >= ae && e(!0)
            }, tryEmit: function (t) {
                return this.canEmit() ? this.emit(t) : void(this.state = ue)
            }, canEmit: function () {
                for (var t = 0; t < this.requireFail.length;) {
                    if (!(this.requireFail[t].state & (ue | oe)))return !1;
                    t++
                }
                return !0
            }, recognize: function (t) {
                var e = a({}, t);
                return h(this.options.enable, [this, e]) ? (this.state & (le | ce | ue) && (this.state = oe), this.state = this.process(e), void(this.state & (re | se | ae | ce) && this.tryEmit(e))) : (this.reset(), void(this.state = ue))
            }, process: function () {
            }, getTouchAction: function () {
            }, reset: function () {
            }
        }, c(K, B, {
            defaults: {pointers: 1}, attrTest: function (t) {
                var e = this.options.pointers;
                return 0 === e || t.pointers.length === e
            }, process: function (t) {
                var e = this.state, i = t.eventType, n = e & (re | se), o = this.attrTest(t);
                return n && (i & $t || !o) ? e | ce : n || o ? i & St ? e | ae : e & re ? e | se : re : ue
            }
        }), c(J, K, {
            defaults: {event: "pan", threshold: 10, pointers: 1, direction: jt}, getTouchAction: function () {
                var t = this.options.direction, e = [];
                return t & Pt && e.push(ne), t & It && e.push(ie), e
            }, directionTest: function (t) {
                var e = this.options, i = !0, n = t.distance, o = t.direction, r = t.deltaX, s = t.deltaY;
                return o & e.direction || (e.direction & Pt ? (o = 0 === r ? Et : 0 > r ? At : Ot, i = r != this.pX, n = Math.abs(t.deltaX)) : (o = 0 === s ? Et : 0 > s ? Nt : Dt, i = s != this.pY, n = Math.abs(t.deltaY))), t.direction = o, i && n > e.threshold && o & e.direction
            }, attrTest: function (t) {
                return K.prototype.attrTest.call(this, t) && (this.state & re || !(this.state & re) && this.directionTest(t))
            }, emit: function (t) {
                this.pX = t.deltaX, this.pY = t.deltaY;
                var e = U(t.direction);
                e && this.manager.emit(this.options.event + e, t), this._super.emit.call(this, t)
            }
        }), c(Z, K, {
            defaults: {event: "pinch", threshold: 0, pointers: 2}, getTouchAction: function () {
                return [ee]
            }, attrTest: function (t) {
                return this._super.attrTest.call(this, t) && (Math.abs(t.scale - 1) > this.options.threshold || this.state & re)
            }, emit: function (t) {
                if (this._super.emit.call(this, t), 1 !== t.scale) {
                    var e = t.scale < 1 ? "in" : "out";
                    this.manager.emit(this.options.event + e, t)
                }
            }
        }), c(tt, B, {
            defaults: {event: "press", pointers: 1, time: 500, threshold: 5}, getTouchAction: function () {
                return [Zt]
            }, process: function (t) {
                var e = this.options, i = t.pointers.length === e.pointers, n = t.distance < e.threshold, r = t.deltaTime > e.time;
                if (this._input = t, !n || !i || t.eventType & (St | $t) && !r)this.reset(); else if (t.eventType & Ct)this.reset(), this._timer = o(function () {
                    this.state = le, this.tryEmit()
                }, e.time, this); else if (t.eventType & St)return le;
                return ue
            }, reset: function () {
                clearTimeout(this._timer)
            }, emit: function (t) {
                this.state === le && (t && t.eventType & St ? this.manager.emit(this.options.event + "up", t) : (this._input.timeStamp = pt(), this.manager.emit(this.options.event, this._input)))
            }
        }), c(et, K, {
            defaults: {event: "rotate", threshold: 0, pointers: 2}, getTouchAction: function () {
                return [ee]
            }, attrTest: function (t) {
                return this._super.attrTest.call(this, t) && (Math.abs(t.rotation) > this.options.threshold || this.state & re)
            }
        }), c(it, K, {
            defaults: {event: "swipe", threshold: 10, velocity: .65, direction: Pt | It, pointers: 1},
            getTouchAction: function () {
                return J.prototype.getTouchAction.call(this)
            },
            attrTest: function (t) {
                var e, i = this.options.direction;
                return i & (Pt | It) ? e = t.velocity : i & Pt ? e = t.velocityX : i & It && (e = t.velocityY), this._super.attrTest.call(this, t) && i & t.direction && t.distance > this.options.threshold && dt(e) > this.options.velocity && t.eventType & St
            },
            emit: function (t) {
                var e = U(t.direction);
                e && this.manager.emit(this.options.event + e, t), this.manager.emit(this.options.event, t)
            }
        }), c(nt, B, {
            defaults: {
                event: "tap",
                pointers: 1,
                taps: 1,
                interval: 300,
                time: 250,
                threshold: 2,
                posThreshold: 10
            }, getTouchAction: function () {
                return [te]
            }, process: function (t) {
                var e = this.options, i = t.pointers.length === e.pointers, n = t.distance < e.threshold, r = t.deltaTime < e.time;
                if (this.reset(), t.eventType & Ct && 0 === this.count)return this.failTimeout();
                if (n && r && i) {
                    if (t.eventType != St)return this.failTimeout();
                    var s = this.pTime ? t.timeStamp - this.pTime < e.interval : !0, a = !this.pCenter || I(this.pCenter, t.center) < e.posThreshold;
                    this.pTime = t.timeStamp, this.pCenter = t.center, a && s ? this.count += 1 : this.count = 1, this._input = t;
                    var l = this.count % e.taps;
                    if (0 === l)return this.hasRequireFailures() ? (this._timer = o(function () {
                        this.state = le, this.tryEmit()
                    }, e.interval, this), re) : le
                }
                return ue
            }, failTimeout: function () {
                return this._timer = o(function () {
                    this.state = ue
                }, this.options.interval, this), ue
            }, reset: function () {
                clearTimeout(this._timer)
            }, emit: function () {
                this.state == le && (this._input.tapCount = this.count, this.manager.emit(this.options.event, this._input))
            }
        }), ot.VERSION = "2.0.4", ot.defaults = {
            domEvents: !1,
            touchAction: Jt,
            enable: !0,
            inputTarget: null,
            inputClass: null,
            preset: [[et, {enable: !1}], [Z, {enable: !1}, ["rotate"]], [it, {direction: Pt}], [J, {direction: Pt}, ["swipe"]], [nt], [nt, {
                event: "doubletap",
                taps: 2
            }, ["tap"]], [tt]],
            cssProps: {
                userSelect: "default",
                touchSelect: "none",
                touchCallout: "none",
                contentZooming: "none",
                userDrag: "none",
                tapHighlightColor: "rgba(0,0,0,0)"
            }
        };
        var he = 1, de = 2;
        rt.prototype = {
            set: function (t) {
                return a(this.options, t), t.touchAction && this.touchAction.update(), t.inputTarget && (this.input.destroy(), this.input.target = t.inputTarget, this.input.init()), this
            }, stop: function (t) {
                this.session.stopped = t ? de : he
            }, recognize: function (t) {
                var e = this.session;
                if (!e.stopped) {
                    this.touchAction.preventDefaults(t);
                    var i, n = this.recognizers, o = e.curRecognizer;
                    (!o || o && o.state & le) && (o = e.curRecognizer = null);
                    for (var r = 0; r < n.length;)i = n[r], e.stopped === de || o && i != o && !i.canRecognizeWith(o) ? i.reset() : i.recognize(t), !o && i.state & (re | se | ae) && (o = e.curRecognizer = i), r++
                }
            }, get: function (t) {
                if (t instanceof B)return t;
                for (var e = this.recognizers, i = 0; i < e.length; i++)if (e[i].options.event == t)return e[i];
                return null
            }, add: function (t) {
                if (r(t, "add", this))return this;
                var e = this.get(t.options.event);
                return e && this.remove(e), this.recognizers.push(t), t.manager = this, this.touchAction.update(), t
            }, remove: function (t) {
                if (r(t, "remove", this))return this;
                var e = this.recognizers;
                return t = this.get(t), e.splice(y(e, t), 1), this.touchAction.update(), this
            }, on: function (t, e) {
                var i = this.handlers;
                return s(v(t), function (t) {
                    i[t] = i[t] || [], i[t].push(e)
                }), this
            }, off: function (t, e) {
                var i = this.handlers;
                return s(v(t), function (t) {
                    e ? i[t].splice(y(i[t], e), 1) : delete i[t]
                }), this
            }, emit: function (t, e) {
                this.options.domEvents && at(t, e);
                var i = this.handlers[t] && this.handlers[t].slice();
                if (i && i.length) {
                    e.type = t, e.preventDefault = function () {
                        e.srcEvent.preventDefault()
                    };
                    for (var n = 0; n < i.length;)i[n](e), n++
                }
            }, destroy: function () {
                this.element && st(this, !1), this.handlers = {}, this.session = {}, this.input.destroy(), this.element = null
            }
        }, a(ot, {
            INPUT_START: Ct,
            INPUT_MOVE: Tt,
            INPUT_END: St,
            INPUT_CANCEL: $t,
            STATE_POSSIBLE: oe,
            STATE_BEGAN: re,
            STATE_CHANGED: se,
            STATE_ENDED: ae,
            STATE_RECOGNIZED: le,
            STATE_CANCELLED: ce,
            STATE_FAILED: ue,
            DIRECTION_NONE: Et,
            DIRECTION_LEFT: At,
            DIRECTION_RIGHT: Ot,
            DIRECTION_UP: Nt,
            DIRECTION_DOWN: Dt,
            DIRECTION_HORIZONTAL: Pt,
            DIRECTION_VERTICAL: It,
            DIRECTION_ALL: jt,
            Manager: rt,
            Input: C,
            TouchAction: Q,
            TouchInput: R,
            MouseInput: q,
            PointerEventInput: L,
            TouchMouseInput: V,
            SingleTouchInput: W,
            Recognizer: B,
            AttrRecognizer: K,
            Tap: nt,
            Pan: J,
            Swipe: it,
            Pinch: Z,
            Rotate: et,
            Press: tt,
            on: p,
            off: f,
            each: s,
            merge: l,
            extend: a,
            inherit: c,
            bindFn: u,
            prefixed: w
        }), typeof define == ut && define.amd ? define(function () {
            return ot
        }) : "undefined" != typeof module && module.exports ? module.exports = ot : t[i] = ot
    }(window, document, "Hammer"), function (t) {
        "function" == typeof define && define.amd ? define(["jquery", "hammerjs"], t) : "object" == typeof exports ? t(require("jquery"), require("hammerjs")) : t(jQuery, Hammer)
    }(function (t, e) {
        function i(i, n) {
            var o = t(i);
            o.data("hammer") || o.data("hammer", new e(o[0], n))
        }

        t.fn.hammer = function (t) {
            return this.each(function () {
                i(this, t)
            })
        }, e.Manager.prototype.emit = function (e) {
            return function (i, n) {
                e.call(this, i, n), t(this.element).trigger({type: i, gesture: n})
            }
        }(e.Manager.prototype.emit)
    }), Materialize = {}, Materialize.guid = function () {
        function t() {
            return Math.floor(65536 * (1 + Math.random())).toString(16).substring(1)
        }

        return function () {
            return t() + t() + "-" + t() + "-" + t() + "-" + t() + "-" + t() + t() + t()
        }
    }(), Materialize.elementOrParentIsFixed = function (t) {
        var e = $(t), i = e.add(e.parents()), n = !1;
        return i.each(function () {
            return "fixed" === $(this).css("position") ? (n = !0, !1) : void 0
        }), n
    };
    var Vel;
    Vel = $ ? $.Velocity : Velocity, function (t) {
        t.fn.collapsible = function (e) {
            var i = {accordion: void 0};
            return e = t.extend(i, e), this.each(function () {
                function i(e) {
                    a = s.find("> li > .collapsible-header"), e.hasClass("active") ? e.parent().addClass("active") : e.parent().removeClass("active"), e.parent().hasClass("active") ? e.siblings(".collapsible-body").stop(!0, !1).slideDown({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: !1,
                        complete: function () {
                            t(this).css("height", "")
                        }
                    }) : e.siblings(".collapsible-body").stop(!0, !1).slideUp({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: !1,
                        complete: function () {
                            t(this).css("height", "")
                        }
                    }), a.not(e).removeClass("active").parent().removeClass("active"), a.not(e).parent().children(".collapsible-body").stop(!0, !1).slideUp({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: !1,
                        complete: function () {
                            t(this).css("height", "")
                        }
                    })
                }

                function n(e) {
                    e.hasClass("active") ? e.parent().addClass("active") : e.parent().removeClass("active"), e.parent().hasClass("active") ? e.siblings(".collapsible-body").stop(!0, !1).slideDown({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: !1,
                        complete: function () {
                            t(this).css("height", "")
                        }
                    }) : e.siblings(".collapsible-body").stop(!0, !1).slideUp({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: !1,
                        complete: function () {
                            t(this).css("height", "")
                        }
                    })
                }

                function o(t) {
                    var e = r(t);
                    return e.length > 0
                }

                function r(t) {
                    return t.closest("li > .collapsible-header")
                }

                var s = t(this), a = t(this).find("> li > .collapsible-header"), l = s.data("collapsible");
                s.off("click.collapse", ".collapsible-header"), a.off("click.collapse"), e.accordion || "accordion" === l || void 0 === l ? (a = s.find("> li > .collapsible-header"), a.on("click.collapse", function (e) {
                    var n = t(e.target);
                    o(n) && (n = r(n)), n.toggleClass("active"), i(n)
                }), i(a.filter(".active").first())) : a.each(function () {
                    t(this).on("click.collapse", function (e) {
                        var i = t(e.target);
                        o(i) && (i = r(i)), i.toggleClass("active"), n(i)
                    }), t(this).hasClass("active") && n(t(this))
                })
            })
        }, t(document).ready(function () {
            t(".collapsible").collapsible()
        })
    }(jQuery), function (t) {
        t.fn.scrollTo = function (e) {
            return t(this).scrollTop(t(this).scrollTop() - t(this).offset().top + t(e).offset().top), this
        }, t.fn.dropdown = function (e) {
            var i = {inDuration: 300, outDuration: 225, constrain_width: !0, hover: !1, gutter: 0, belowOrigin: !1};
            this.each(function () {
                function n() {
                    void 0 !== s.data("induration") && (a.inDuration = s.data("inDuration")), void 0 !== s.data("outduration") && (a.outDuration = s.data("outDuration")), void 0 !== s.data("constrainwidth") && (a.constrain_width = s.data("constrainwidth")), void 0 !== s.data("hover") && (a.hover = s.data("hover")), void 0 !== s.data("gutter") && (a.gutter = s.data("gutter")), void 0 !== s.data("beloworigin") && (a.belowOrigin = s.data("beloworigin"))
                }

                function o() {
                    n(), l.addClass("active"), a.constrain_width === !0 && l.css("width", s.outerWidth());
                    var e = 0;
                    a.belowOrigin === !0 && (e = s.height());
                    var i = s.offset().left, o = 0, r = a.gutter;
                    i + l.innerWidth() > t(window).width() && (o = s.innerWidth() - l.innerWidth(), r = -1 * r), l.css({
                        position: "absolute",
                        top: s.position().top + e,
                        left: s.position().left + o + r
                    }), l.stop(!0, !0).css("opacity", 0).slideDown({
                        queue: !1,
                        duration: a.inDuration,
                        easing: "easeOutCubic",
                        complete: function () {
                            t(this).css("height", "")
                        }
                    }).animate({opacity: 1}, {queue: !1, duration: a.inDuration, easing: "easeOutSine"})
                }

                function r() {
                    l.fadeOut(a.outDuration), l.removeClass("active")
                }

                var s = t(this), a = t.extend({}, i, e), l = t("#" + s.attr("data-activates"));
                if (n(), s.after(l), a.hover) {
                    var c = !1;
                    s.unbind("click." + s.attr("id")), s.on("mouseenter", function (t) {
                        c === !1 && (o(), c = !0)
                    }), s.on("mouseleave", function (e) {
                        var i = e.toElement || e.relatedTarget;
                        t(i).closest(".dropdown-content").is(l) || (l.stop(!0, !0), r(), c = !1)
                    }), l.on("mouseleave", function (e) {
                        var i = e.toElement || e.relatedTarget;
                        t(i).closest(".dropdown-button").is(s) || (l.stop(!0, !0), r(), c = !1)
                    })
                } else s.unbind("click." + s.attr("id")), s.bind("click." + s.attr("id"), function (e) {
                    s[0] == e.currentTarget && 0 === t(e.target).closest(".dropdown-content").length ? (e.preventDefault(), o()) : s.hasClass("active") && (r(), t(document).unbind("click." + l.attr("id"))), l.hasClass("active") && t(document).bind("click." + l.attr("id"), function (e) {
                        !l.is(e.target) && !s.is(e.target) && !s.find(e.target).length > 0 && (r(), t(document).unbind("click." + l.attr("id")))
                    })
                });
                s.on("open", o), s.on("close", r)
            })
        }, t(document).ready(function () {
            t(".dropdown-button").dropdown()
        })
    }(jQuery), function (t) {
        var e = 0, i = 0, n = function () {
            return i++, "materialize-lean-overlay-" + i
        };
        t.fn.extend({
            openModal: function (i) {
                t("body").css("overflow", "hidden");
                var o = {
                    opacity: .5,
                    in_duration: 350,
                    out_duration: 250,
                    ready: void 0,
                    complete: void 0,
                    dismissible: !0,
                    starting_top: "4%"
                }, r = n(), s = t(this), a = t('<div class="lean-overlay"></div>'), l = ++e;
                a.attr("id", r).css("z-index", 1e3 + 2 * l), s.data("overlay-id", r).css("z-index", 1e3 + 2 * l + 1), t("body").append(a), i = t.extend(o, i), i.dismissible && (a.click(function () {
                    s.closeModal(i)
                }), t(document).on("keyup.leanModal" + r, function (t) {
                    27 === t.keyCode && s.closeModal(i)
                })), s.find(".modal-close").on("click.close", function (t) {
                    s.closeModal(i)
                }), a.css({display: "block", opacity: 0}), s.css({
                    display: "block",
                    opacity: 0
                }), a.velocity({opacity: i.opacity}, {
                    duration: i.in_duration,
                    queue: !1,
                    ease: "easeOutCubic"
                }), s.data("associated-overlay", a[0]), s.hasClass("bottom-sheet") ? s.velocity({
                    bottom: "0",
                    opacity: 1
                }, {
                    duration: i.in_duration, queue: !1, ease: "easeOutCubic", complete: function () {
                        "function" == typeof i.ready && i.ready()
                    }
                }) : (t.Velocity.hook(s, "scaleX", .7), s.css({top: i.starting_top}), s.velocity({
                    top: "10%",
                    opacity: 1,
                    scaleX: "1"
                }, {
                    duration: i.in_duration, queue: !1, ease: "easeOutCubic", complete: function () {
                        "function" == typeof i.ready && i.ready()
                    }
                }))
            }
        }), t.fn.extend({
            closeModal: function (i) {
                var n = {out_duration: 250, complete: void 0}, o = t(this), r = o.data("overlay-id"), s = t("#" + r);
                i = t.extend(n, i), t("body").css("overflow", ""), o.find(".modal-close").off("click.close"), t(document).off("keyup.leanModal" + r), s.velocity({opacity: 0}, {
                    duration: i.out_duration,
                    queue: !1,
                    ease: "easeOutQuart"
                }), o.hasClass("bottom-sheet") ? o.velocity({bottom: "-100%", opacity: 0}, {
                    duration: i.out_duration,
                    queue: !1,
                    ease: "easeOutCubic",
                    complete: function () {
                        s.css({display: "none"}), "function" == typeof i.complete && i.complete(), s.remove(), e--
                    }
                }) : o.velocity({top: i.starting_top, opacity: 0, scaleX: .7}, {
                    duration: i.out_duration,
                    complete: function () {
                        t(this).css("display", "none"), "function" == typeof i.complete && i.complete(), s.remove(), e--
                    }
                })
            }
        }), t.fn.extend({
            leanModal: function (e) {
                return this.each(function () {
                    var i = {starting_top: "4%"}, n = t.extend(i, e);
                    t(this).click(function (e) {
                        n.starting_top = (t(this).offset().top - t(window).scrollTop()) / 1.15;
                        var i = t(this).attr("href") || "#" + t(this).data("target");
                        t(i).openModal(n), e.preventDefault()
                    })
                })
            }
        })
    }(jQuery), function (t) {
        t.fn.materialbox = function () {
            return this.each(function () {
                function e() {
                    n = !1;
                    var e = s.parent(".material-placeholder"), o = (window.innerWidth, window.innerHeight, s.data("width")), a = s.data("height");
                    s.velocity("stop", !0), t("#materialbox-overlay").velocity("stop", !0), t(".materialbox-caption").velocity("stop", !0), t("#materialbox-overlay").velocity({opacity: 0}, {
                        duration: r,
                        queue: !1,
                        easing: "easeOutQuad",
                        complete: function () {
                            i = !1, t(this).remove()
                        }
                    }), s.velocity({width: o, height: a, left: 0, top: 0}, {
                        duration: r,
                        queue: !1,
                        easing: "easeOutQuad"
                    }), t(".materialbox-caption").velocity({opacity: 0}, {
                        duration: r,
                        queue: !1,
                        easing: "easeOutQuad",
                        complete: function () {
                            e.css({height: "", width: "", position: "", top: "", left: ""}), s.css({
                                height: "",
                                top: "",
                                left: "",
                                width: "",
                                "max-width": "",
                                position: "",
                                "z-index": ""
                            }), s.removeClass("active"), n = !0, t(this).remove()
                        }
                    })
                }

                if (!t(this).hasClass("initialized")) {
                    t(this).addClass("initialized");
                    var i = !1, n = !0, o = 275, r = 200, s = t(this), a = t("<div></div>").addClass("material-placeholder");
                    s.wrap(a), s.on("click", function () {
                        var r = s.parent(".material-placeholder"), a = window.innerWidth, l = window.innerHeight, c = s.width(), u = s.height();
                        if (n === !1)return e(), !1;
                        if (i && n === !0)return e(), !1;
                        n = !1, s.addClass("active"), i = !0, r.css({
                            width: r[0].getBoundingClientRect().width,
                            height: r[0].getBoundingClientRect().height,
                            position: "relative",
                            top: 0,
                            left: 0
                        }), s.css({position: "absolute", "z-index": 1e3}).data("width", c).data("height", u);
                        var h = t('<div id="materialbox-overlay"></div>').css({opacity: 0}).click(function () {
                            n === !0 && e()
                        });
                        if (t("body").append(h), h.velocity({opacity: 1}, {
                                duration: o,
                                queue: !1,
                                easing: "easeOutQuad"
                            }), "" !== s.data("caption")) {
                            var d = t('<div class="materialbox-caption"></div>');
                            d.text(s.data("caption")), t("body").append(d), d.css({display: "inline"}), d.velocity({opacity: 1}, {
                                duration: o,
                                queue: !1,
                                easing: "easeOutQuad"
                            })
                        }
                        var p = 0, f = c / a, m = u / l, g = 0, v = 0;
                        f > m ? (p = u / c, g = .9 * a, v = .9 * a * p) : (p = c / u, g = .9 * l * p, v = .9 * l), s.hasClass("responsive-img") ? s.velocity({
                            "max-width": g,
                            width: c
                        }, {
                            duration: 0, queue: !1, complete: function () {
                                s.css({left: 0, top: 0}).velocity({
                                    height: v,
                                    width: g,
                                    left: t(document).scrollLeft() + a / 2 - s.parent(".material-placeholder").offset().left - g / 2,
                                    top: t(document).scrollTop() + l / 2 - s.parent(".material-placeholder").offset().top - v / 2
                                }, {
                                    duration: o, queue: !1, easing: "easeOutQuad", complete: function () {
                                        n = !0
                                    }
                                })
                            }
                        }) : s.css("left", 0).css("top", 0).velocity({
                            height: v,
                            width: g,
                            left: t(document).scrollLeft() + a / 2 - s.parent(".material-placeholder").offset().left - g / 2,
                            top: t(document).scrollTop() + l / 2 - s.parent(".material-placeholder").offset().top - v / 2
                        }, {
                            duration: o, queue: !1, easing: "easeOutQuad", complete: function () {
                                n = !0
                            }
                        })
                    }), t(window).scroll(function () {
                        i && e()
                    }), t(document).keyup(function (t) {
                        27 === t.keyCode && n === !0 && i && e()
                    })
                }
            })
        }, t(document).ready(function () {
            t(".materialboxed").materialbox()
        })
    }(jQuery), function (t) {
        t.fn.parallax = function () {
            var e = t(window).width();
            return this.each(function (i) {
                function n(i) {
                    var n;
                    n = 601 > e ? o.height() > 0 ? o.height() : o.children("img").height() : o.height() > 0 ? o.height() : 500;
                    var r = o.children("img").first(), s = r.height(), a = s - n, l = o.offset().top + n, c = o.offset().top, u = t(window).scrollTop(), h = window.innerHeight, d = u + h, p = (d - c) / (n + h), f = Math.round(a * p);
                    i && r.css("display", "block"), l > u && u + h > c && r.css("transform", "translate3D(-50%," + f + "px, 0)")
                }

                var o = t(this);
                o.addClass("parallax"), o.children("img").one("load", function () {
                    n(!0)
                }).each(function () {
                    this.complete && t(this).load()
                }), t(window).scroll(function () {
                    e = t(window).width(), n(!1)
                }), t(window).resize(function () {
                    e = t(window).width(), n(!1)
                })
            })
        }
    }(jQuery), function (t) {
        var e = {
            init: function () {
                return this.each(function () {
                    var e = t(this);
                    t(window).width();
                    e.width("100%");
                    var i = t(this).children("li").length;
                    e.children("li").each(function () {
                        t(this).width(100 / i + "%")
                    });
                    var n, o, r = e.find("li.tab a"), s = e.width(), a = e.find("li").first().outerWidth(), l = 0;
                    n = t(r.filter('[href="' + location.hash + '"]')), 0 === n.length && (n = t(this).find("li.tab a.active").first()), 0 === n.length && (n = t(this).find("li.tab a").first()), n.addClass("active"), l = r.index(n), 0 > l && (l = 0), o = t(n[0].hash), e.append('<div class="indicator"></div>');
                    var c = e.find(".indicator");
                    e.is(":visible") && (c.css({right: s - (l + 1) * a}), c.css({left: l * a})), t(window).resize(function () {
                        s = e.width(), a = e.find("li").first().outerWidth(), 0 > l && (l = 0), 0 !== a && 0 !== s && (c.css({right: s - (l + 1) * a}), c.css({left: l * a}))
                    }), r.not(n).each(function () {
                        t(this.hash).hide()
                    }), e.on("click", "a", function (i) {
                        if (t(this).parent().hasClass("disabled"))return void i.preventDefault();
                        s = e.width(), a = e.find("li").first().outerWidth(), n.removeClass("active"), o.hide(), n = t(this), o = t(this.hash), r = e.find("li.tab a"), n.addClass("active");
                        var u = l;
                        l = r.index(t(this)), 0 > l && (l = 0), o.show(), l - u >= 0 ? (c.velocity({right: s - (l + 1) * a}, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), c.velocity({left: l * a}, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad",
                            delay: 90
                        })) : (c.velocity({left: l * a}, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), c.velocity({right: s - (l + 1) * a}, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad",
                            delay: 90
                        })), i.preventDefault()
                    })
                })
            }, select_tab: function (t) {
                this.find('a[href="#' + t + '"]').trigger("click")
            }
        };
        t.fn.tabs = function (i) {
            return e[i] ? e[i].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof i && i ? void t.error("Method " + i + " does not exist on jQuery.tooltip") : e.init.apply(this, arguments)
        }, t(document).ready(function () {
            t("ul.tabs").tabs()
        })
    }(jQuery), function (t) {
        t.fn.tooltip = function (e) {
            var i = null, n = !1, o = null, r = 5, s = {delay: 350};
            return e = t.extend(s, e), t(".material-tooltip").remove(), this.each(function () {
                var s = t(this), a = t("<span></span>").text(s.attr("data-tooltip")), l = t("<div></div>");
                l.addClass("material-tooltip").append(a), l.appendTo(t("body"));
                var c = t("<div></div>").addClass("backdrop");
                c.appendTo(l), c.css({
                    top: 0,
                    left: 0
                }), t(this).off("mouseenter mouseleave"), t(this).on({
                    mouseenter: function (t) {
                        var a = s.data("delay");
                        a = void 0 === a || "" === a ? e.delay : a, i = 0, o = setInterval(function () {
                            if (i += 10, i >= a && n === !1) {
                                n = !0, l.css({
                                    display: "block",
                                    left: "0px",
                                    top: "0px"
                                }), l.children("span").text(s.attr("data-tooltip"));
                                var t = s.outerWidth(), e = s.outerHeight(), o = s.attr("data-position"), u = l.outerHeight(), h = l.outerWidth(), d = "0px", p = "0px", f = 8;
                                "top" === o ? (l.css({
                                    top: s.offset().top - u - r,
                                    left: s.offset().left + t / 2 - h / 2
                                }), d = "-10px", c.css({
                                    borderRadius: "14px 14px 0 0",
                                    transformOrigin: "50% 90%",
                                    marginTop: u,
                                    marginLeft: h / 2 - c.width() / 2
                                })) : "left" === o ? (l.css({
                                    top: s.offset().top + e / 2 - u / 2,
                                    left: s.offset().left - h - r
                                }), p = "-10px", c.css({
                                    width: "14px",
                                    height: "14px",
                                    borderRadius: "14px 0 0 14px",
                                    transformOrigin: "95% 50%",
                                    marginTop: u / 2,
                                    marginLeft: h
                                })) : "right" === o ? (l.css({
                                    top: s.offset().top + e / 2 - u / 2,
                                    left: s.offset().left + t + r
                                }), p = "+10px", c.css({
                                    width: "14px",
                                    height: "14px",
                                    borderRadius: "0 14px 14px 0",
                                    transformOrigin: "5% 50%",
                                    marginTop: u / 2,
                                    marginLeft: "0px"
                                })) : (l.css({
                                    top: s.offset().top + s.outerHeight() + r,
                                    left: s.offset().left + t / 2 - h / 2
                                }), d = "+10px", c.css({marginLeft: h / 2 - c.width() / 2})), f = h / 8, 8 > f && (f = 8), ("right" === o || "left" === o) && (f = h / 10, 6 > f && (f = 6)), l.velocity({
                                    opacity: 1,
                                    marginTop: d,
                                    marginLeft: p
                                }, {
                                    duration: 350,
                                    queue: !1
                                }), c.css({display: "block"}).velocity({opacity: 1}, {
                                    duration: 55,
                                    delay: 0,
                                    queue: !1
                                }).velocity({scale: f}, {duration: 300, delay: 0, queue: !1, easing: "easeInOutQuad"})
                            }
                        }, 10)
                    }, mouseleave: function () {
                        clearInterval(o), i = 0, l.velocity({opacity: 0, marginTop: 0, marginLeft: 0}, {
                            duration: 225,
                            queue: !1,
                            delay: 275
                        }), c.velocity({opacity: 0, scale: 1}, {
                            duration: 225,
                            delay: 275,
                            queue: !1,
                            complete: function () {
                                c.css("display", "none"), l.css("display", "none"), n = !1
                            }
                        })
                    }
                })
            })
        }, t(document).ready(function () {
            t(".tooltipped").tooltip()
        })
    }(jQuery), function (t) {
        "use strict";
        function e(t) {
            return null !== t && t === t.window
        }

        function i(t) {
            return e(t) ? t : 9 === t.nodeType && t.defaultView
        }

        function n(t) {
            var e, n, o = {top: 0, left: 0}, r = t && t.ownerDocument;
            return e = r.documentElement, "undefined" != typeof t.getBoundingClientRect && (o = t.getBoundingClientRect()), n = i(r), {
                top: o.top + n.pageYOffset - e.clientTop,
                left: o.left + n.pageXOffset - e.clientLeft
            }
        }

        function o(t) {
            var e = "";
            for (var i in t)t.hasOwnProperty(i) && (e += i + ":" + t[i] + ";");
            return e
        }

        function r(t) {
            if (u.allowEvent(t) === !1)return null;
            for (var e = null, i = t.target || t.srcElement; null !== i.parentElement;) {
                if (!(i instanceof SVGElement || -1 === i.className.indexOf("waves-effect"))) {
                    e = i;
                    break
                }
                if (i.classList.contains("waves-effect")) {
                    e = i;
                    break
                }
                i = i.parentElement
            }
            return e
        }

        function s(e) {
            var i = r(e);
            null !== i && (c.show(e, i), "ontouchstart"in t && (i.addEventListener("touchend", c.hide, !1), i.addEventListener("touchcancel", c.hide, !1)), i.addEventListener("mouseup", c.hide, !1), i.addEventListener("mouseleave", c.hide, !1))
        }

        var a = a || {}, l = document.querySelectorAll.bind(document), c = {
            duration: 750, show: function (t, e) {
                if (2 === t.button)return !1;
                var i = e || this, r = document.createElement("div");
                r.className = "waves-ripple", i.appendChild(r);
                var s = n(i), a = t.pageY - s.top, l = t.pageX - s.left, u = "scale(" + i.clientWidth / 100 * 10 + ")";
                "touches"in t && (a = t.touches[0].pageY - s.top, l = t.touches[0].pageX - s.left), r.setAttribute("data-hold", Date.now()), r.setAttribute("data-scale", u), r.setAttribute("data-x", l), r.setAttribute("data-y", a);
                var h = {top: a + "px", left: l + "px"};
                r.className = r.className + " waves-notransition", r.setAttribute("style", o(h)), r.className = r.className.replace("waves-notransition", ""), h["-webkit-transform"] = u, h["-moz-transform"] = u, h["-ms-transform"] = u, h["-o-transform"] = u, h.transform = u, h.opacity = "1", h["-webkit-transition-duration"] = c.duration + "ms", h["-moz-transition-duration"] = c.duration + "ms", h["-o-transition-duration"] = c.duration + "ms", h["transition-duration"] = c.duration + "ms", h["-webkit-transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)", h["-moz-transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)", h["-o-transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)", h["transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)", r.setAttribute("style", o(h))
            }, hide: function (t) {
                u.touchup(t);
                var e = this, i = (1.4 * e.clientWidth, null), n = e.getElementsByClassName("waves-ripple");
                if (!(n.length > 0))return !1;
                i = n[n.length - 1];
                var r = i.getAttribute("data-x"), s = i.getAttribute("data-y"), a = i.getAttribute("data-scale"), l = Date.now() - Number(i.getAttribute("data-hold")), h = 350 - l;
                0 > h && (h = 0), setTimeout(function () {
                    var t = {
                        top: s + "px",
                        left: r + "px",
                        opacity: "0",
                        "-webkit-transition-duration": c.duration + "ms",
                        "-moz-transition-duration": c.duration + "ms",
                        "-o-transition-duration": c.duration + "ms",
                        "transition-duration": c.duration + "ms",
                        "-webkit-transform": a,
                        "-moz-transform": a,
                        "-ms-transform": a,
                        "-o-transform": a,
                        transform: a
                    };
                    i.setAttribute("style", o(t)), setTimeout(function () {
                        try {
                            e.removeChild(i)
                        } catch (t) {
                            return !1
                        }
                    }, c.duration)
                }, h)
            }, wrapInput: function (t) {
                for (var e = 0; e < t.length; e++) {
                    var i = t[e];
                    if ("input" === i.tagName.toLowerCase()) {
                        var n = i.parentNode;
                        if ("i" === n.tagName.toLowerCase() && -1 !== n.className.indexOf("waves-effect"))continue;
                        var o = document.createElement("i");
                        o.className = i.className + " waves-input-wrapper";
                        var r = i.getAttribute("style");
                        r || (r = ""), o.setAttribute("style", r), i.className = "waves-button-input", i.removeAttribute("style"), n.replaceChild(o, i), o.appendChild(i)
                    }
                }
            }
        }, u = {
            touches: 0, allowEvent: function (t) {
                var e = !0;
                return "touchstart" === t.type ? u.touches += 1 : "touchend" === t.type || "touchcancel" === t.type ? setTimeout(function () {
                    u.touches > 0 && (u.touches -= 1)
                }, 500) : "mousedown" === t.type && u.touches > 0 && (e = !1), e
            }, touchup: function (t) {
                u.allowEvent(t)
            }
        };
        a.displayEffect = function (e) {
            e = e || {}, "duration"in e && (c.duration = e.duration), c.wrapInput(l(".waves-effect")), "ontouchstart"in t && document.body.addEventListener("touchstart", s, !1), document.body.addEventListener("mousedown", s, !1)
        }, a.attach = function (e) {
            "input" === e.tagName.toLowerCase() && (c.wrapInput([e]), e = e.parentElement), "ontouchstart"in t && e.addEventListener("touchstart", s, !1), e.addEventListener("mousedown", s, !1)
        }, t.Waves = a, document.addEventListener("DOMContentLoaded", function () {
            a.displayEffect()
        }, !1)
    }(window), Materialize.toast = function (t, e, i, n) {
        function o(t) {
            var e = document.createElement("div");
            if (e.classList.add("toast"), i)for (var o = i.split(" "), r = 0, s = o.length; s > r; r++)e.classList.add(o[r]);
            e.innerHTML = t;
            var a = new Hammer(e, {prevent_default: !1});
            return a.on("pan", function (t) {
                var i = t.deltaX, n = 80;
                e.classList.contains("panning") || e.classList.add("panning");
                var o = 1 - Math.abs(i / n);
                0 > o && (o = 0), Vel(e, {left: i, opacity: o}, {duration: 50, queue: !1, easing: "easeOutQuad"})
            }), a.on("panend", function (t) {
                var i = t.deltaX, o = 80;
                Math.abs(i) > o ? Vel(e, {marginTop: "-40px"}, {
                    duration: 375,
                    easing: "easeOutExpo",
                    queue: !1,
                    complete: function () {
                        "function" == typeof n && n(), e.parentNode.removeChild(e)
                    }
                }) : (e.classList.remove("panning"), Vel(e, {left: 0, opacity: 1}, {
                    duration: 300,
                    easing: "easeOutExpo",
                    queue: !1
                }))
            }), e
        }

        i = i || "";
        var r = document.getElementById("toast-container");
        null === r && (r = document.createElement("div"), r.id = "toast-container", document.body.appendChild(r));
        var s = o(t);
        t && r.appendChild(s), s.style.top = "35px", s.style.opacity = 0, Vel(s, {
            top: "0px",
            opacity: 1
        }, {duration: 300, easing: "easeOutCubic", queue: !1});
        var a = e, l = setInterval(function () {
            null === s.parentNode && window.clearInterval(l), s.classList.contains("panning") || (a -= 20), 0 >= a && (Vel(s, {
                opacity: 0,
                marginTop: "-40px"
            }, {
                duration: 375, easing: "easeOutExpo", queue: !1, complete: function () {
                    "function" == typeof n && n(), this[0].parentNode.removeChild(this[0])
                }
            }), window.clearInterval(l))
        }, 20)
    }, function (t) {
        var e = {
            init: function (e) {
                var i = {menuWidth: 240, edge: "left", closeOnClick: !1};
                e = t.extend(i, e), t(this).each(function () {
                    function i(i) {
                        r = !1, s = !1, t("body").css("overflow", ""), t("#sidenav-overlay").velocity({opacity: 0}, {
                            duration: 200,
                            queue: !1,
                            easing: "easeOutQuad",
                            complete: function () {
                                t(this).remove()
                            }
                        }), "left" === e.edge ? (t(".drag-target").css({
                            width: "",
                            right: "",
                            left: "0"
                        }), o.velocity({left: -1 * (e.menuWidth + 10)}, {
                            duration: 200,
                            queue: !1,
                            easing: "easeOutCubic",
                            complete: function () {
                                i === !0 && (o.removeAttr("style"), o.css("width", e.menuWidth))
                            }
                        })) : (t(".drag-target").css({
                            width: "",
                            right: "0",
                            left: ""
                        }), o.velocity({right: -1 * (e.menuWidth + 10)}, {
                            duration: 200,
                            queue: !1,
                            easing: "easeOutCubic",
                            complete: function () {
                                i === !0 && (o.removeAttr("style"), o.css("width", e.menuWidth))
                            }
                        }))
                    }

                    var n = t(this), o = t("#" + n.attr("data-activates"));
                    240 != e.menuWidth && o.css("width", e.menuWidth), t("body").append(t('<div class="drag-target"></div>')), "left" == e.edge ? (o.css("left", -1 * (e.menuWidth + 10)), t(".drag-target").css({left: 0})) : (o.addClass("right-aligned").css("right", -1 * (e.menuWidth + 10)).css("left", ""), t(".drag-target").css({right: 0})), o.hasClass("fixed") && window.innerWidth > 992 && o.css("left", 0), o.hasClass("fixed") && t(window).resize(function () {
                        window.innerWidth > 992 ? 0 !== t("#sidenav-overlay").css("opacity") && s ? i(!0) : (o.removeAttr("style"), o.css("width", e.menuWidth)) : s === !1 && ("left" === e.edge ? o.css("left", -1 * (e.menuWidth + 10)) : o.css("right", -1 * (e.menuWidth + 10)))
                    }), e.closeOnClick === !0 && o.on("click.itemclick", "a:not(.collapsible-header)", function () {
                        i()
                    });
                    var r = !1, s = !1;
                    t(".drag-target").on("click", function () {
                        i()
                    }), t(".drag-target").hammer({prevent_default: !1}).bind("pan", function (n) {
                        if ("touch" == n.gesture.pointerType) {
                            var r = (n.gesture.direction, n.gesture.center.x);
                            n.gesture.center.y, n.gesture.velocityX;
                            if (t("body").css("overflow", "hidden"), 0 === t("#sidenav-overlay").length) {
                                var a = t('<div id="sidenav-overlay"></div>');
                                a.css("opacity", 0).click(function () {
                                    i()
                                }), t("body").append(a)
                            }
                            if ("left" === e.edge && (r > e.menuWidth ? r = e.menuWidth : 0 > r && (r = 0)), "left" === e.edge)r < e.menuWidth / 2 ? s = !1 : r >= e.menuWidth / 2 && (s = !0), o.css("left", r - e.menuWidth); else {
                                r < window.innerWidth - e.menuWidth / 2 ? s = !0 : r >= window.innerWidth - e.menuWidth / 2 && (s = !1);
                                var l = -1 * (r - e.menuWidth / 2);
                                l > 0 && (l = 0), o.css("right", l)
                            }
                            var c;
                            "left" === e.edge ? (c = r / e.menuWidth, t("#sidenav-overlay").velocity({opacity: c}, {
                                duration: 50,
                                queue: !1,
                                easing: "easeOutQuad"
                            })) : (c = Math.abs((r - window.innerWidth) / e.menuWidth), t("#sidenav-overlay").velocity({opacity: c}, {
                                duration: 50,
                                queue: !1,
                                easing: "easeOutQuad"
                            }))
                        }
                    }).bind("panend", function (i) {
                        if ("touch" == i.gesture.pointerType) {
                            var n = i.gesture.velocityX;
                            r = !1, "left" === e.edge ? s && .3 >= n || -.5 > n ? (o.velocity({left: 0}, {
                                duration: 300,
                                queue: !1,
                                easing: "easeOutQuad"
                            }), t("#sidenav-overlay").velocity({opacity: 1}, {
                                duration: 50,
                                queue: !1,
                                easing: "easeOutQuad"
                            }), t(".drag-target").css({
                                width: "50%",
                                right: 0,
                                left: ""
                            })) : (!s || n > .3) && (t("body").css("overflow", ""), o.velocity({left: -1 * (e.menuWidth + 10)}, {
                                duration: 200,
                                queue: !1,
                                easing: "easeOutQuad"
                            }), t("#sidenav-overlay").velocity({opacity: 0}, {
                                duration: 200,
                                queue: !1,
                                easing: "easeOutQuad",
                                complete: function () {
                                    t(this).remove()
                                }
                            }), t(".drag-target").css({
                                width: "10px",
                                right: "",
                                left: 0
                            })) : s && n >= -.3 || n > .5 ? (o.velocity({right: 0}, {
                                duration: 300,
                                queue: !1,
                                easing: "easeOutQuad"
                            }), t("#sidenav-overlay").velocity({opacity: 1}, {
                                duration: 50,
                                queue: !1,
                                easing: "easeOutQuad"
                            }), t(".drag-target").css({
                                width: "50%",
                                right: "",
                                left: 0
                            })) : (!s || -.3 > n) && (t("body").css("overflow", ""), o.velocity({right: -1 * (e.menuWidth + 10)}, {
                                duration: 200,
                                queue: !1,
                                easing: "easeOutQuad"
                            }), t("#sidenav-overlay").velocity({opacity: 0}, {
                                duration: 200,
                                queue: !1,
                                easing: "easeOutQuad",
                                complete: function () {
                                    t(this).remove()
                                }
                            }), t(".drag-target").css({width: "10px", right: 0, left: ""}))
                        }
                    }), n.click(function () {
                        if (s === !0)s = !1, r = !1, i(); else {
                            t("body").css("overflow", "hidden"), "left" === e.edge ? (t(".drag-target").css({
                                width: "50%",
                                right: 0,
                                left: ""
                            }), o.velocity({left: 0}, {
                                duration: 300,
                                queue: !1,
                                easing: "easeOutQuad"
                            })) : (t(".drag-target").css({
                                width: "50%",
                                right: "",
                                left: 0
                            }), o.velocity({right: 0}, {
                                duration: 300,
                                queue: !1,
                                easing: "easeOutQuad"
                            }), o.css("left", ""));
                            var n = t('<div id="sidenav-overlay"></div>');
                            n.css("opacity", 0).click(function () {
                                s = !1, r = !1, i(), n.velocity({opacity: 0}, {
                                    duration: 300,
                                    queue: !1,
                                    easing: "easeOutQuad",
                                    complete: function () {
                                        t(this).remove()
                                    }
                                })
                            }), t("body").append(n), n.velocity({opacity: 1}, {
                                duration: 300,
                                queue: !1,
                                easing: "easeOutQuad",
                                complete: function () {
                                    s = !0, r = !1
                                }
                            })
                        }
                        return !1
                    })
                })
            }, show: function () {
                this.trigger("click")
            }, hide: function () {
                t("#sidenav-overlay").trigger("click")
            }
        };
        t.fn.sideNav = function (i) {
            return e[i] ? e[i].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof i && i ? void t.error("Method " + i + " does not exist on jQuery.sideNav") : e.init.apply(this, arguments)
        }
    }(jQuery), function (t) {
        function e(e, i, n, o) {
            var r = t();
            return t.each(s, function (t, s) {
                if (s.height() > 0) {
                    var a = s.offset().top, l = s.offset().left, c = l + s.width(), u = a + s.height(), h = !(l > i || o > c || a > n || e > u);
                    h && r.push(s)
                }
            }), r
        }

        function i() {
            ++c;
            var i = r.scrollTop(), n = r.scrollLeft(), o = n + r.width(), s = i + r.height(), l = e(i + u.top + 200, o + u.right, s + u.bottom, n + u.left);
            t.each(l, function (t, e) {
                var i = e.data("scrollSpy:ticks");
                "number" != typeof i && e.triggerHandler("scrollSpy:enter"), e.data("scrollSpy:ticks", c)
            }), t.each(a, function (t, e) {
                var i = e.data("scrollSpy:ticks");
                "number" == typeof i && i !== c && (e.triggerHandler("scrollSpy:exit"), e.data("scrollSpy:ticks", null))
            }), a = l
        }

        function n() {
            r.trigger("scrollSpy:winSize")
        }

        function o(t, e, i) {
            var n, o, r, s = null, a = 0;
            i || (i = {});
            var l = function () {
                a = i.leading === !1 ? 0 : h(), s = null, r = t.apply(n, o), n = o = null
            };
            return function () {
                var c = h();
                a || i.leading !== !1 || (a = c);
                var u = e - (c - a);
                return n = this, o = arguments, 0 >= u ? (clearTimeout(s), s = null, a = c, r = t.apply(n, o), n = o = null) : s || i.trailing === !1 || (s = setTimeout(l, u)), r
            }
        }

        var r = t(window), s = [], a = [], l = !1, c = 0, u = {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        }, h = Date.now || function () {
                return (new Date).getTime()
            };
        t.scrollSpy = function (e, n) {
            var a = [];
            e = t(e), e.each(function (e, i) {
                s.push(t(i)), t(i).data("scrollSpy:id", e), t("a[href=#" + t(i).attr("id") + "]").click(function (e) {
                    e.preventDefault();
                    var i = t(this.hash).offset().top + 1;
                    t("html, body").animate({scrollTop: i - 200}, {duration: 400, queue: !1, easing: "easeOutCubic"})
                })
            }), n = n || {throttle: 100}, u.top = n.offsetTop || 0, u.right = n.offsetRight || 0, u.bottom = n.offsetBottom || 0, u.left = n.offsetLeft || 0;
            var c = o(i, n.throttle || 100), h = function () {
                t(document).ready(c)
            };
            return l || (r.on("scroll", h), r.on("resize", h), l = !0), setTimeout(h, 0), e.on("scrollSpy:enter", function () {
                a = t.grep(a, function (t) {
                    return 0 != t.height()
                });
                var e = t(this);
                a[0] ? (t("a[href=#" + a[0].attr("id") + "]").removeClass("active"), e.data("scrollSpy:id") < a[0].data("scrollSpy:id") ? a.unshift(t(this)) : a.push(t(this))) : a.push(t(this)), t("a[href=#" + a[0].attr("id") + "]").addClass("active")
            }), e.on("scrollSpy:exit", function () {
                if (a = t.grep(a, function (t) {
                        return 0 != t.height()
                    }), a[0]) {
                    t("a[href=#" + a[0].attr("id") + "]").removeClass("active");
                    var e = t(this);
                    a = t.grep(a, function (t) {
                        return t.attr("id") != e.attr("id")
                    }), a[0] && t("a[href=#" + a[0].attr("id") + "]").addClass("active")
                }
            }), e
        }, t.winSizeSpy = function (e) {
            return t.winSizeSpy = function () {
                return r
            }, e = e || {throttle: 100}, r.on("resize", o(n, e.throttle || 100))
        }, t.fn.scrollSpy = function (e) {
            return t.scrollSpy(t(this), e)
        }
    }(jQuery), function (t) {
        t(document).ready(function () {
            function e(e) {
                var i = e.css("font-family"), o = e.css("font-size");
                o && n.css("font-size", o), i && n.css("font-family", i), "off" === e.attr("wrap") && n.css("overflow-wrap", "normal").css("white-space", "pre"), n.text(e.val() + "\n");
                var r = n.html().replace(/\n/g, "<br>");
                n.html(r), e.is(":visible") ? n.css("width", e.width()) : n.css("width", t(window).width() / 2), e.css("height", n.height())
            }

            Materialize.updateTextFields = function () {
                var e = "input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], textarea";
                t(e).each(function (e, i) {
                    t(i).val().length > 0 || void 0 !== t(this).attr("placeholder") || t(i)[0].validity.badInput === !0 ? t(this).siblings("label, i").addClass("active") : t(this).siblings("label, i").removeClass("active")
                })
            };
            var i = "input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], textarea";
            t("input[autofocus]").siblings("label, i").addClass("active"), t(document).on("change", i, function () {
                (0 !== t(this).val().length || void 0 !== t(this).attr("placeholder")) && t(this).siblings("label, i").addClass("active"), validate_field(t(this))
            }), t(document).ready(function () {
                Materialize.updateTextFields()
            }), t(document).on("reset", function (e) {
                var n = t(e.target);
                n.is("form") && (n.find(i).removeClass("valid").removeClass("invalid"), n.find(i).each(function () {
                    "" === t(this).attr("value") && t(this).siblings("label, i").removeClass("active")
                }), n.find("select.initialized").each(function () {
                    var t = n.find("option[selected]").text();
                    n.siblings("input.select-dropdown").val(t)
                }))
            }), t(document).on("focus", i, function () {
                t(this).siblings("label, i").addClass("active")
            }), t(document).on("blur", i, function () {
                var e = t(this);
                0 === e.val().length && e[0].validity.badInput !== !0 && void 0 === e.attr("placeholder") && e.siblings("label, i").removeClass("active"), validate_field(e)
            }), validate_field = function (t) {
                var e = void 0 !== t.attr("length"), i = parseInt(t.attr("length")), n = t.val().length;
                0 === t.val().length && t[0].validity.badInput === !1 ? t.hasClass("validate") && (t.removeClass("valid"), t.removeClass("invalid")) : t.hasClass("validate") && (t.is(":valid") && e && i > n || t.is(":valid") && !e ? (t.removeClass("invalid"), t.addClass("valid")) : (t.removeClass("valid"), t.addClass("invalid")))
            };
            var n = t(".hiddendiv").first();
            n.length || (n = t('<div class="hiddendiv common"></div>'), t("body").append(n));
            var o = ".materialize-textarea";
            t(o).each(function () {
                var i = t(this);
                i.val().length && e(i)
            }), t("body").on("keyup keydown", o, function () {
                e(t(this))
            }), t(".file-field").each(function () {
                var e = t(this).find("input.file-path");
                t(this).find('input[type="file"]').change(function () {
                    e.val(t(this)[0].files[0].name), e.trigger("change")
                })
            });
            var r, s = "input[type=range]", a = !1;
            t(s).each(function () {
                var e = t('<span class="thumb"><span class="value"></span></span>');
                t(this).after(e)
            });
            var l = ".range-field";
            t(document).on("change", s, function (e) {
                var i = t(this).siblings(".thumb");
                i.find(".value").html(t(this).val())
            }), t(document).on("mousedown touchstart", s, function (e) {
                var i = t(this).siblings(".thumb");
                i.length <= 0 && (i = t('<span class="thumb"><span class="value"></span></span>'), t(this).append(i)), i.find(".value").html(t(this).val()), a = !0, t(this).addClass("active"), i.hasClass("active") || i.velocity({
                    height: "30px",
                    width: "30px",
                    top: "-20px",
                    marginLeft: "-15px"
                }, {
                    duration: 300,
                    easing: "easeOutExpo"
                }), r = void 0 === e.pageX || null === e.pageX ? e.originalEvent.touches[0].pageX - t(this).offset().left : e.pageX - t(this).offset().left;
                var n = t(this).outerWidth();
                0 > r ? r = 0 : r > n && (r = n), i.addClass("active").css("left", r), i.find(".value").html(t(this).val())
            }), t(document).on("mouseup touchend", l, function () {
                a = !1, t(this).removeClass("active")
            }), t(document).on("mousemove touchmove", l, function (e) {
                var i, n = t(this).children(".thumb");
                if (a) {
                    n.hasClass("active") || n.velocity({
                        height: "30px",
                        width: "30px",
                        top: "-20px",
                        marginLeft: "-15px"
                    }, {
                        duration: 300,
                        easing: "easeOutExpo"
                    }), i = void 0 === e.pageX || null === e.pageX ? e.originalEvent.touches[0].pageX - t(this).offset().left : e.pageX - t(this).offset().left;
                    var o = t(this).outerWidth();
                    0 > i ? i = 0 : i > o && (i = o), n.addClass("active").css("left", i)
                }
            }), t(document).on("mouseout touchleave", l, function () {
                if (!a) {
                    var e = t(this).children(".thumb");
                    e.hasClass("active") && e.velocity({
                        height: "0",
                        width: "0",
                        top: "10px",
                        marginLeft: "-6px"
                    }, {duration: 100}), e.removeClass("active")
                }
            })
        }), t.fn.material_select = function (e) {
            t(this).each(function () {
                if ($select = t(this), !$select.hasClass("browser-default")) {
                    var i = $select.data("select-id");
                    if (i && ($select.parent().find("i").remove(), $select.parent().find("input").remove(), $select.unwrap(), t("ul#select-options-" + i).remove()), "destroy" === e)return void $select.data("select-id", null).removeClass("initialized");
                    var n = Materialize.guid();
                    $select.data("select-id", n);
                    var o = t('<div class="select-wrapper"></div>');
                    o.addClass($select.attr("class"));
                    var r, s = t('<ul id="select-options-' + n + '" class="dropdown-content select-dropdown"></ul>'), a = $select.children("option");
                    r = void 0 !== $select.find("option:selected") ? $select.find("option:selected") : s.first(), a.each(function () {
                        s.append(t('<li class="' + (t(this).is(":disabled") ? "disabled" : "") + '"><span>' + t(this).html() + "</span></li>"))
                    }), s.find("li").each(function (i) {
                        var n = $select;
                        t(this).click(function () {
                            t(this).hasClass("disabled") || (n.find("option").eq(i).prop("selected", !0), n.trigger("change"), n.siblings("input.select-dropdown").val(t(this).text()), "undefined" != typeof e && e())
                        })
                    }), $select.wrap(o);
                    var l = t('<span class="caret">&#9660;</span>');
                    $select.is(":disabled") && l.addClass("disabled");
                    var c = t('<input type="text" class="select-dropdown" readonly="true" ' + ($select.is(":disabled") ? "disabled" : "") + ' data-activates="select-options-' + n + '" value="' + r.html() + '"/>');
                    $select.before(c), c.before(l), t("body").append(s), $select.is(":disabled") || c.dropdown({hover: !1}), $select.attr("tabindex") && t(c[0]).attr("tabindex", $select.attr("tabindex")), $select.addClass("initialized"), c.on("focus", function () {
                        t(this).trigger("open"), r = t(this).val(), selectedOption = s.find("li").filter(function () {
                            return t(this).text().toLowerCase() === r.toLowerCase()
                        })[0], activateOption(s, selectedOption)
                    }), c.on("blur", function () {
                        t(this).trigger("close")
                    }), activateOption = function (e, i) {
                        e.find("li.active").removeClass("active"), t(i).addClass("active"), e.scrollTo(i)
                    }, filterQuery = [], onKeyDown = function (e) {
                        if (9 == e.which)return void c.trigger("close");
                        if (40 == e.which && !s.is(":visible"))return void c.trigger("open");
                        if (13 != e.which || s.is(":visible")) {
                            e.preventDefault(), letter = String.fromCharCode(e.which).toLowerCase();
                            var i = [9, 13, 27, 38, 40];
                            letter && -1 === i.indexOf(e.which) && (filterQuery.push(letter), string = filterQuery.join(""), newOption = s.find("li").filter(function () {
                                return 0 === t(this).text().toLowerCase().indexOf(string)
                            })[0], newOption && activateOption(s, newOption)), 13 == e.which && (activeOption = s.find("li.active:not(.disabled)")[0], activeOption && (t(activeOption).trigger("click"), c.trigger("close"))), 40 == e.which && (newOption = s.find("li.active").next("li:not(.disabled)")[0], newOption && activateOption(s, newOption)), 27 == e.which && c.trigger("close"), 38 == e.which && (newOption = s.find("li.active").prev("li:not(.disabled)")[0], newOption && activateOption(s, newOption)), setTimeout(function () {
                                filterQuery = []
                            }, 1e3)
                        }
                    }, c.on("keydown", onKeyDown)
                }
            })
        }
    }(jQuery), function (t) {
        var e = {
            init: function (e) {
                var i = {indicators: !0, height: 400, transition: 500, interval: 6e3};
                return e = t.extend(i, e), this.each(function () {
                    function i(t, e) {
                        t.hasClass("center-align") ? t.velocity({opacity: 0, translateY: -100}, {
                            duration: e,
                            queue: !1
                        }) : t.hasClass("right-align") ? t.velocity({opacity: 0, translateX: 100}, {
                            duration: e,
                            queue: !1
                        }) : t.hasClass("left-align") && t.velocity({opacity: 0, translateX: -100}, {
                            duration: e,
                            queue: !1
                        })
                    }

                    function n(t) {
                        t >= a.length ? t = 0 : 0 > t && (t = a.length - 1), l = s.find(".active").index(), l != t && (o = a.eq(l), $caption = o.find(".caption"), o.removeClass("active"), o.velocity({opacity: 0}, {
                            duration: e.transition,
                            queue: !1,
                            easing: "easeOutQuad",
                            complete: function () {
                                a.not(".active").velocity({opacity: 0, translateX: 0, translateY: 0}, {
                                    duration: 0,
                                    queue: !1
                                })
                            }
                        }), i($caption, e.transition), e.indicators && c.eq(l).removeClass("active"), a.eq(t).velocity({opacity: 1}, {
                            duration: e.transition,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), a.eq(t).find(".caption").velocity({
                            opacity: 1,
                            translateX: 0,
                            translateY: 0
                        }, {
                            duration: e.transition,
                            delay: e.transition,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), a.eq(t).addClass("active"), e.indicators && c.eq(t).addClass("active"))
                    }

                    var o, r = t(this), s = r.find("ul.slides").first(), a = s.find("li"), l = s.find(".active").index();
                    if (-1 != l && (o = a.eq(l)), r.hasClass("fullscreen") || (e.indicators ? r.height(e.height + 40) : r.height(e.height), s.height(e.height)), a.find(".caption").each(function () {
                            i(t(this), 0)
                        }), a.find("img").each(function () {
                            t(this).css("background-image", "url(" + t(this).attr("src") + ")"), t(this).attr("src", "data:image/gif;base64,R0lGODlhAQABAIABAP///wAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==")
                        }), e.indicators) {
                        var c = t('<ul class="indicators"></ul>');
                        a.each(function (i) {
                            var o = t('<li class="indicator-item"></li>');
                            o.click(function () {
                                var i = s.parent(), o = i.find(t(this)).index();
                                n(o), clearInterval($interval), $interval = setInterval(function () {
                                    l = s.find(".active").index(), a.length == l + 1 ? l = 0 : l += 1, n(l)
                                }, e.transition + e.interval)
                            }), c.append(o)
                        }), r.append(c), c = r.find("ul.indicators").find("li.indicator-item")
                    }
                    o ? o.show() : (a.first().addClass("active").velocity({opacity: 1}, {
                        duration: e.transition,
                        queue: !1,
                        easing: "easeOutQuad"
                    }), l = 0, o = a.eq(l), e.indicators && c.eq(l).addClass("active")), o.find("img").each(function () {
                        o.find(".caption").velocity({opacity: 1, translateX: 0, translateY: 0}, {
                            duration: e.transition,
                            queue: !1,
                            easing: "easeOutQuad"
                        })
                    }), $interval = setInterval(function () {
                        l = s.find(".active").index(), n(l + 1)
                    }, e.transition + e.interval);
                    var u = !1, h = !1, d = !1;
                    r.hammer({prevent_default: !1}).bind("pan", function (t) {
                        if ("touch" === t.gesture.pointerType) {
                            clearInterval($interval);
                            var e = t.gesture.direction, i = t.gesture.deltaX, n = t.gesture.velocityX;
                            $curr_slide = s.find(".active"), $curr_slide.velocity({translateX: i}, {
                                duration: 50,
                                queue: !1,
                                easing: "easeOutQuad"
                            }), 4 === e && (i > r.innerWidth() / 2 || -.65 > n) ? d = !0 : 2 === e && (i < -1 * r.innerWidth() / 2 || n > .65) && (h = !0);
                            var o;
                            h && (o = $curr_slide.next(), 0 === o.length && (o = a.first()), o.velocity({opacity: 1}, {
                                duration: 300,
                                queue: !1,
                                easing: "easeOutQuad"
                            })), d && (o = $curr_slide.prev(), 0 === o.length && (o = a.last()), o.velocity({opacity: 1}, {
                                duration: 300,
                                queue: !1,
                                easing: "easeOutQuad"
                            }))
                        }
                    }).bind("panend", function (t) {
                        "touch" === t.gesture.pointerType && ($curr_slide = s.find(".active"), u = !1, curr_index = s.find(".active").index(), d || h ? h ? (n(curr_index + 1), $curr_slide.velocity({translateX: -1 * r.innerWidth()}, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad",
                            complete: function () {
                                $curr_slide.velocity({opacity: 0, translateX: 0}, {duration: 0, queue: !1})
                            }
                        })) : d && (n(curr_index - 1), $curr_slide.velocity({translateX: r.innerWidth()}, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad",
                            complete: function () {
                                $curr_slide.velocity({opacity: 0, translateX: 0}, {duration: 0, queue: !1})
                            }
                        })) : $curr_slide.velocity({translateX: 0}, {
                            duration: 300,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), h = !1, d = !1, clearInterval($interval), $interval = setInterval(function () {
                            l = s.find(".active").index(), a.length == l + 1 ? l = 0 : l += 1, n(l)
                        }, e.transition + e.interval))
                    }), r.on("sliderPause", function () {
                        clearInterval($interval)
                    }), r.on("sliderStart", function () {
                        clearInterval($interval), $interval = setInterval(function () {
                            l = s.find(".active").index(), a.length == l + 1 ? l = 0 : l += 1, n(l)
                        }, e.transition + e.interval)
                    })
                })
            }, pause: function () {
                t(this).trigger("sliderPause")
            }, start: function () {
                t(this).trigger("sliderStart")
            }
        };
        t.fn.slider = function (i) {
            return e[i] ? e[i].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof i && i ? void t.error("Method " + i + " does not exist on jQuery.tooltip") : e.init.apply(this, arguments)
        }
    }(jQuery), function (t) {
        t(document).ready(function () {
            t(document).on("click.card", ".card", function (e) {
                t(this).find(".card-reveal").length && (t(e.target).is(t(".card-reveal .card-title")) || t(e.target).is(t(".card-reveal .card-title i")) ? t(this).find(".card-reveal").velocity({translateY: 0}, {
                    duration: 225,
                    queue: !1,
                    easing: "easeInOutQuad",
                    complete: function () {
                        t(this).css({display: "none"})
                    }
                }) : (t(e.target).is(t(".card .activator")) || t(e.target).is(t(".card .activator i"))) && t(this).find(".card-reveal").css({display: "block"}).velocity("stop", !1).velocity({translateY: "-100%"}, {
                    duration: 300,
                    queue: !1,
                    easing: "easeInOutQuad"
                }))
            })
        })
    }(jQuery), function (t) {
        t(document).ready(function () {
            t.fn.pushpin = function (e) {
                var i = {top: 0, bottom: 1 / 0, offset: 0};
                return e = t.extend(i, e), $index = 0, this.each(function () {
                    function i(t) {
                        t.removeClass("pin-top"), t.removeClass("pinned"), t.removeClass("pin-bottom")
                    }

                    function n(n, o) {
                        n.each(function () {
                            e.top <= o && e.bottom >= o && !t(this).hasClass("pinned") && (i(t(this)), t(this).css("top", e.offset), t(this).addClass("pinned")), o < e.top && !t(this).hasClass("pin-top") && (i(t(this)), t(this).css("top", 0), t(this).addClass("pin-top")), o > e.bottom && !t(this).hasClass("pin-bottom") && (i(t(this)), t(this).addClass("pin-bottom"), t(this).css("top", e.bottom - s))
                        })
                    }

                    var o = Materialize.guid(), r = t(this), s = t(this).offset().top;
                    n(r, t(window).scrollTop()), t(window).on("scroll." + o, function () {
                        var i = t(window).scrollTop() + e.offset;
                        n(r, i)
                    })
                })
            }
        })
    }(jQuery), function (t) {
        t(document).ready(function () {
            t.fn.reverse = [].reverse, t(document).on("mouseenter.fixedActionBtn", ".fixed-action-btn", function (i) {
                var n = t(this);
                e(n)
            }), t(document).on("mouseleave.fixedActionBtn", ".fixed-action-btn", function (e) {
                var n = t(this);
                i(n)
            })
        }), t.fn.extend({
            openFAB: function () {
                var i = t(this);
                e(i)
            }, closeFAB: function () {
                i($this)
            }
        });
        var e = function (e) {
            if ($this = e, $this.hasClass("active") === !1) {
                $this.addClass("active"), $this.find("ul .btn-floating").velocity({
                    scaleY: ".4",
                    scaleX: ".4",
                    translateY: "40px"
                }, {duration: 0});
                var i = 0;
                $this.find("ul .btn-floating").reverse().each(function () {
                    t(this).velocity({opacity: "1", scaleX: "1", scaleY: "1", translateY: "0"}, {
                        duration: 80,
                        delay: i
                    }), i += 40
                })
            }
        }, i = function (t) {
            $this = t, $this.removeClass("active");
            $this.find("ul .btn-floating").velocity("stop", !0), $this.find("ul .btn-floating").velocity({
                opacity: "0",
                scaleX: ".4",
                scaleY: ".4",
                translateY: "40px"
            }, {duration: 80})
        }
    }(jQuery), function (t) {
        Materialize.fadeInImage = function (e) {
            var i = t(e);
            i.css({opacity: 0}), t(i).velocity({opacity: 1}, {
                duration: 650,
                queue: !1,
                easing: "easeOutSine"
            }), t(i).velocity({opacity: 1}, {
                duration: 1300, queue: !1, easing: "swing", step: function (e, i) {
                    i.start = 100;
                    var n = e / 100, o = 150 - (100 - e) / 1.75;
                    100 > o && (o = 100), e >= 0 && t(this).css({
                        "-webkit-filter": "grayscale(" + n + ")brightness(" + o + "%)",
                        filter: "grayscale(" + n + ")brightness(" + o + "%)"
                    })
                }
            })
        }, Materialize.showStaggeredList = function (e) {
            var i = 0;
            t(e).find("li").velocity({translateX: "-100px"}, {duration: 0}), t(e).find("li").each(function () {
                t(this).velocity({opacity: "1", translateX: "0"}, {duration: 800, delay: i, easing: [60, 10]}), i += 120
            })
        }, t(document).ready(function () {
            var e = !1, i = !1;
            t(".dismissable").each(function () {
                t(this).hammer({prevent_default: !1}).bind("pan", function (n) {
                    if ("touch" === n.gesture.pointerType) {
                        var o = t(this), r = n.gesture.direction, s = n.gesture.deltaX, a = n.gesture.velocityX;
                        o.velocity({translateX: s}, {
                            duration: 50,
                            queue: !1,
                            easing: "easeOutQuad"
                        }), 4 === r && (s > o.innerWidth() / 2 || -.75 > a) && (e = !0), 2 === r && (s < -1 * o.innerWidth() / 2 || a > .75) && (i = !0)
                    }
                }).bind("panend", function (n) {
                    if (Math.abs(n.gesture.deltaX) < t(this).innerWidth() / 2 && (i = !1, e = !1), "touch" === n.gesture.pointerType) {
                        var o = t(this);
                        if (e || i) {
                            var r;
                            r = e ? o.innerWidth() : -1 * o.innerWidth(), o.velocity({translateX: r}, {
                                duration: 100,
                                queue: !1,
                                easing: "easeOutQuad",
                                complete: function () {
                                    o.css("border", "none"), o.velocity({height: 0, padding: 0}, {
                                        duration: 200,
                                        queue: !1,
                                        easing: "easeOutQuad",
                                        complete: function () {
                                            o.remove()
                                        }
                                    })
                                }
                            })
                        } else o.velocity({translateX: 0}, {duration: 100, queue: !1, easing: "easeOutQuad"});
                        e = !1, i = !1
                    }
                })
            })
        })
    }(jQuery), function (t) {
        Materialize.scrollFire = function (t) {
            var e = !1;
            window.addEventListener("scroll", function () {
                e = !0
            }), setInterval(function () {
                if (e) {
                    e = !1;
                    for (var i = window.pageYOffset + window.innerHeight, n = 0; n < t.length; n++) {
                        var o = t[n], r = o.selector, s = o.offset, a = o.callback, l = document.querySelector(r);
                        if (null !== l) {
                            var c = l.getBoundingClientRect().top + document.body.scrollTop;
                            if (i > c + s && o.done !== !0) {
                                var u = new Function(a);
                                u(), o.done = !0
                            }
                        }
                    }
                }
            }, 100)
        }
    }(jQuery), function (t) {
        "function" == typeof define && define.amd ? define("picker", ["jquery"], t) : "object" == typeof exports ? module.exports = t(require("jquery")) : this.Picker = t(jQuery)
    }(function (t) {
        function e(r, s, l, h) {
            function d() {
                return e._.node("div", e._.node("div", e._.node("div", e._.node("div", C.component.nodes(b.open), w.box), w.wrap), w.frame), w.holder)
            }

            function p() {
                _.data(s, C).addClass(w.input).attr("tabindex", -1).val(_.data("value") ? C.get("select", x.format) : r.value), x.editable || _.on("focus." + b.id + " click." + b.id, function (t) {
                    t.preventDefault(), C.$root[0].focus()
                }).on("keydown." + b.id, g), o(r, {haspopup: !0, expanded: !1, readonly: !1, owns: r.id + "_root"})
            }

            function f() {
                C.$root.on({
                    keydown: g, focusin: function (t) {
                        C.$root.removeClass(w.focused), t.stopPropagation()
                    }, "mousedown click": function (e) {
                        var i = e.target;
                        i != C.$root.children()[0] && (e.stopPropagation(), "mousedown" != e.type || t(i).is("input, select, textarea, button, option") || (e.preventDefault(), C.$root[0].focus()))
                    }
                }).on({
                    focus: function () {
                        _.addClass(w.target)
                    }, blur: function () {
                        _.removeClass(w.target)
                    }
                }).on("focus.toOpen", v).on("click", "[data-pick], [data-nav], [data-clear], [data-close]", function () {
                    var e = t(this), i = e.data(), n = e.hasClass(w.navDisabled) || e.hasClass(w.disabled), o = a();
                    o = o && (o.type || o.href), (n || o && !t.contains(C.$root[0], o)) && C.$root[0].focus(), !n && i.nav ? C.set("highlight", C.component.item.highlight, {nav: i.nav}) : !n && "pick"in i ? C.set("select", i.pick) : i.clear ? C.clear().close(!0) : i.close && C.close(!0)
                }), o(C.$root[0], "hidden", !0)
            }

            function m() {
                var e;
                x.hiddenName === !0 ? (e = r.name, r.name = "") : (e = ["string" == typeof x.hiddenPrefix ? x.hiddenPrefix : "", "string" == typeof x.hiddenSuffix ? x.hiddenSuffix : "_submit"], e = e[0] + r.name + e[1]), C._hidden = t('<input type=hidden name="' + e + '"' + (_.data("value") || r.value ? ' value="' + C.get("select", x.formatSubmit) + '"' : "") + ">")[0], _.on("change." + b.id, function () {
                    C._hidden.value = r.value ? C.get("select", x.formatSubmit) : ""
                }), x.container ? t(x.container).append(C._hidden) : _.after(C._hidden)
            }

            function g(t) {
                var e = t.keyCode, i = /^(8|46)$/.test(e);
                return 27 == e ? (C.close(), !1) : void((32 == e || i || !b.open && C.component.key[e]) && (t.preventDefault(), t.stopPropagation(), i ? C.clear().close() : C.open()))
            }

            function v(t) {
                t.stopPropagation(), "focus" == t.type && C.$root.addClass(w.focused), C.open()
            }

            if (!r)return e;
            var y = !1, b = {id: r.id || "P" + Math.abs(~~(Math.random() * new Date))}, x = l ? t.extend(!0, {}, l.defaults, h) : h || {}, w = t.extend({}, e.klasses(), x.klass), _ = t(r), k = function () {
                return this.start()
            }, C = k.prototype = {
                constructor: k, $node: _, start: function () {
                    return b && b.start ? C : (b.methods = {}, b.start = !0, b.open = !1, b.type = r.type, r.autofocus = r == a(), r.readOnly = !x.editable, r.id = r.id || b.id, "text" != r.type && (r.type = "text"), C.component = new l(C, x), C.$root = t(e._.node("div", d(), w.picker, 'id="' + r.id + '_root" tabindex="0"')), f(), x.formatSubmit && m(), p(), x.container ? t(x.container).append(C.$root) : _.after(C.$root), C.on({
                        start: C.component.onStart,
                        render: C.component.onRender,
                        stop: C.component.onStop,
                        open: C.component.onOpen,
                        close: C.component.onClose,
                        set: C.component.onSet
                    }).on({
                        start: x.onStart,
                        render: x.onRender,
                        stop: x.onStop,
                        open: x.onOpen,
                        close: x.onClose,
                        set: x.onSet
                    }), y = i(C.$root.children()[0]), r.autofocus && C.open(), C.trigger("start").trigger("render"))
                }, render: function (t) {
                    return t ? C.$root.html(d()) : C.$root.find("." + w.box).html(C.component.nodes(b.open)), C.trigger("render")
                }, stop: function () {
                    return b.start ? (C.close(), C._hidden && C._hidden.parentNode.removeChild(C._hidden), C.$root.remove(), _.removeClass(w.input).removeData(s), setTimeout(function () {
                        _.off("." + b.id)
                    }, 0), r.type = b.type, r.readOnly = !1, C.trigger("stop"), b.methods = {}, b.start = !1, C) : C
                }, open: function (i) {
                    return b.open ? C : (_.addClass(w.active), o(r, "expanded", !0), setTimeout(function () {
                        C.$root.addClass(w.opened), o(C.$root[0], "hidden", !1)
                    }, 0), i !== !1 && (b.open = !0, y && u.css("overflow", "hidden").css("padding-right", "+=" + n()), C.$root[0].focus(), c.on("click." + b.id + " focusin." + b.id, function (t) {
                        var e = t.target;
                        e != r && e != document && 3 != t.which && C.close(e === C.$root.children()[0])
                    }).on("keydown." + b.id, function (i) {
                        var n = i.keyCode, o = C.component.key[n], r = i.target;
                        27 == n ? C.close(!0) : r != C.$root[0] || !o && 13 != n ? t.contains(C.$root[0], r) && 13 == n && (i.preventDefault(), r.click()) : (i.preventDefault(), o ? e._.trigger(C.component.key.go, C, [e._.trigger(o)]) : C.$root.find("." + w.highlighted).hasClass(w.disabled) || C.set("select", C.component.item.highlight).close())
                    })), C.trigger("open"))
                }, close: function (t) {
                    return t && (C.$root.off("focus.toOpen")[0].focus(), setTimeout(function () {
                        C.$root.on("focus.toOpen", v)
                    }, 0)), _.removeClass(w.active), o(r, "expanded", !1), setTimeout(function () {
                        C.$root.removeClass(w.opened + " " + w.focused), o(C.$root[0], "hidden", !0)
                    }, 0), b.open ? (b.open = !1, y && u.css("overflow", "").css("padding-right", "-=" + n()), c.off("." + b.id), C.trigger("close")) : C
                }, clear: function (t) {
                    return C.set("clear", null, t)
                }, set: function (e, i, n) {
                    var o, r, s = t.isPlainObject(e), a = s ? e : {};
                    if (n = s && t.isPlainObject(i) ? i : n || {}, e) {
                        s || (a[e] = i);
                        for (o in a)r = a[o], o in C.component.item && (void 0 === r && (r = null), C.component.set(o, r, n)), ("select" == o || "clear" == o) && _.val("clear" == o ? "" : C.get(o, x.format)).trigger("change");
                        C.render()
                    }
                    return n.muted ? C : C.trigger("set", a)
                }, get: function (t, i) {
                    if (t = t || "value", null != b[t])return b[t];
                    if ("valueSubmit" == t) {
                        if (C._hidden)return C._hidden.value;
                        t = "value"
                    }
                    if ("value" == t)return r.value;
                    if (t in C.component.item) {
                        if ("string" == typeof i) {
                            var n = C.component.get(t);
                            return n ? e._.trigger(C.component.formats.toString, C.component, [i, n]) : ""
                        }
                        return C.component.get(t)
                    }
                }, on: function (e, i, n) {
                    var o, r, s = t.isPlainObject(e), a = s ? e : {};
                    if (e) {
                        s || (a[e] = i);
                        for (o in a)r = a[o], n && (o = "_" + o), b.methods[o] = b.methods[o] || [], b.methods[o].push(r)
                    }
                    return C
                }, off: function () {
                    var t, e, i = arguments;
                    for (t = 0, namesCount = i.length; t < namesCount; t += 1)e = i[t], e in b.methods && delete b.methods[e];
                    return C
                }, trigger: function (t, i) {
                    var n = function (t) {
                        var n = b.methods[t];
                        n && n.map(function (t) {
                            e._.trigger(t, C, [i])
                        })
                    };
                    return n("_" + t), n(t), C
                }
            };
            return new k
        }

        function i(t) {
            var e, i = "position";
            return t.currentStyle ? e = t.currentStyle[i] : window.getComputedStyle && (e = getComputedStyle(t)[i]), "fixed" == e
        }

        function n() {
            if (u.height() <= l.height())return 0;
            var e = t('<div style="visibility:hidden;width:100px" />').appendTo("body"), i = e[0].offsetWidth;
            e.css("overflow", "scroll");
            var n = t('<div style="width:100%" />').appendTo(e), o = n[0].offsetWidth;
            return e.remove(), i - o
        }

        function o(e, i, n) {
            if (t.isPlainObject(i))for (var o in i)r(e, o, i[o]); else r(e, i, n)
        }

        function r(t, e, i) {
            t.setAttribute(("role" == e ? "" : "aria-") + e, i)
        }

        function s(e, i) {
            t.isPlainObject(e) || (e = {attribute: i}), i = "";
            for (var n in e) {
                var o = ("role" == n ? "" : "aria-") + n, r = e[n];
                i += null == r ? "" : o + '="' + e[n] + '"'
            }
            return i
        }

        function a() {
            try {
                return document.activeElement
            } catch (t) {
            }
        }

        var l = t(window), c = t(document), u = t(document.documentElement);
        return e.klasses = function (t) {
            return t = t || "picker", {
                picker: t,
                opened: t + "--opened",
                focused: t + "--focused",
                input: t + "__input",
                active: t + "__input--active",
                target: t + "__input--target",
                holder: t + "__holder",
                frame: t + "__frame",
                wrap: t + "__wrap",
                box: t + "__box"
            }
        }, e._ = {
            group: function (t) {
                for (var i, n = "", o = e._.trigger(t.min, t); o <= e._.trigger(t.max, t, [o]); o += t.i)i = e._.trigger(t.item, t, [o]), n += e._.node(t.node, i[0], i[1], i[2]);
                return n
            }, node: function (e, i, n, o) {
                return i ? (i = t.isArray(i) ? i.join("") : i, n = n ? ' class="' + n + '"' : "", o = o ? " " + o : "", "<" + e + n + o + ">" + i + "</" + e + ">") : ""
            }, lead: function (t) {
                return (10 > t ? "0" : "") + t
            }, trigger: function (t, e, i) {
                return "function" == typeof t ? t.apply(e, i || []) : t
            }, digits: function (t) {
                return /\d/.test(t[1]) ? 2 : 1
            }, isDate: function (t) {
                return {}.toString.call(t).indexOf("Date") > -1 && this.isInteger(t.getDate())
            }, isInteger: function (t) {
                return {}.toString.call(t).indexOf("Number") > -1 && t % 1 === 0
            }, ariaAttr: s
        }, e.extend = function (i, n) {
            t.fn[i] = function (o, r) {
                var s = this.data(i);
                return "picker" == o ? s : s && "string" == typeof o ? e._.trigger(s[o], s, [r]) : this.each(function () {
                    var r = t(this);
                    r.data(i) || new e(this, i, n, o)
                })
            }, t.fn[i].defaults = n.defaults
        }, e
    }), function (t) {
        "function" == typeof define && define.amd ? define(["picker", "jquery"], t) : "object" == typeof exports ? module.exports = t(require("./picker.js"), require("jquery")) : t(Picker, jQuery)
    }(function (t, e) {
        function i(t, e) {
            var i = this, n = t.$node[0], o = n.value, r = t.$node.data("value"), s = r || o, a = r ? e.formatSubmit : e.format, l = function () {
                return n.currentStyle ? "rtl" == n.currentStyle.direction : "rtl" == getComputedStyle(t.$root[0]).direction
            };
            i.settings = e, i.$node = t.$node, i.queue = {
                min: "measure create",
                max: "measure create",
                now: "now create",
                select: "parse create validate",
                highlight: "parse navigate create validate",
                view: "parse create validate viewset",
                disable: "deactivate",
                enable: "activate"
            }, i.item = {}, i.item.clear = null, i.item.disable = (e.disable || []).slice(0), i.item.enable = -function (t) {
                return t[0] === !0 ? t.shift() : -1
            }(i.item.disable), i.set("min", e.min).set("max", e.max).set("now"), s ? i.set("select", s, {format: a}) : i.set("select", null).set("highlight", i.item.now), i.key = {
                40: 7,
                38: -7,
                39: function () {
                    return l() ? -1 : 1
                },
                37: function () {
                    return l() ? 1 : -1
                },
                go: function (t) {
                    var e = i.item.highlight, n = new Date(e.year, e.month, e.date + t);
                    i.set("highlight", n, {interval: t}), this.render()
                }
            }, t.on("render", function () {
                t.$root.find("." + e.klass.selectMonth).on("change", function () {
                    var i = this.value;
                    i && (t.set("highlight", [t.get("view").year, i, t.get("highlight").date]), t.$root.find("." + e.klass.selectMonth).trigger("focus"))
                }), t.$root.find("." + e.klass.selectYear).on("change", function () {
                    var i = this.value;
                    i && (t.set("highlight", [i, t.get("view").month, t.get("highlight").date]), t.$root.find("." + e.klass.selectYear).trigger("focus"))
                })
            }, 1).on("open", function () {
                var n = "";
                i.disabled(i.get("now")) && (n = ":not(." + e.klass.buttonToday + ")"), t.$root.find("button" + n + ", select").attr("disabled", !1)
            }, 1).on("close", function () {
                t.$root.find("button, select").attr("disabled", !0)
            }, 1)
        }

        var n = 7, o = 6, r = t._;
        i.prototype.set = function (t, e, i) {
            var n = this, o = n.item;
            return null === e ? ("clear" == t && (t = "select"), o[t] = e, n) : (o["enable" == t ? "disable" : "flip" == t ? "enable" : t] = n.queue[t].split(" ").map(function (o) {
                return e = n[o](t, e, i)
            }).pop(), "select" == t ? n.set("highlight", o.select, i) : "highlight" == t ? n.set("view", o.highlight, i) : t.match(/^(flip|min|max|disable|enable)$/) && (o.select && n.disabled(o.select) && n.set("select", o.select, i), o.highlight && n.disabled(o.highlight) && n.set("highlight", o.highlight, i)), n)
        }, i.prototype.get = function (t) {
            return this.item[t]
        }, i.prototype.create = function (t, i, n) {
            var o, s = this;
            return i = void 0 === i ? t : i, i == -(1 / 0) || i == 1 / 0 ? o = i : e.isPlainObject(i) && r.isInteger(i.pick) ? i = i.obj : e.isArray(i) ? (i = new Date(i[0], i[1], i[2]), i = r.isDate(i) ? i : s.create().obj) : i = r.isInteger(i) || r.isDate(i) ? s.normalize(new Date(i), n) : s.now(t, i, n), {
                year: o || i.getFullYear(),
                month: o || i.getMonth(),
                date: o || i.getDate(),
                day: o || i.getDay(),
                obj: o || i,
                pick: o || i.getTime()
            }
        }, i.prototype.createRange = function (t, i) {
            var n = this, o = function (t) {
                return t === !0 || e.isArray(t) || r.isDate(t) ? n.create(t) : t
            };
            return r.isInteger(t) || (t = o(t)), r.isInteger(i) || (i = o(i)), r.isInteger(t) && e.isPlainObject(i) ? t = [i.year, i.month, i.date + t] : r.isInteger(i) && e.isPlainObject(t) && (i = [t.year, t.month, t.date + i]), {
                from: o(t),
                to: o(i)
            }
        }, i.prototype.withinRange = function (t, e) {
            return t = this.createRange(t.from, t.to), e.pick >= t.from.pick && e.pick <= t.to.pick
        }, i.prototype.overlapRanges = function (t, e) {
            var i = this;
            return t = i.createRange(t.from, t.to), e = i.createRange(e.from, e.to), i.withinRange(t, e.from) || i.withinRange(t, e.to) || i.withinRange(e, t.from) || i.withinRange(e, t.to)
        }, i.prototype.now = function (t, e, i) {
            return e = new Date, i && i.rel && e.setDate(e.getDate() + i.rel), this.normalize(e, i)
        }, i.prototype.navigate = function (t, i, n) {
            var o, r, s, a, l = e.isArray(i), c = e.isPlainObject(i), u = this.item.view;
            if (l || c) {
                for (c ? (r = i.year, s = i.month, a = i.date) : (r = +i[0], s = +i[1], a = +i[2]), n && n.nav && u && u.month !== s && (r = u.year, s = u.month), o = new Date(r, s + (n && n.nav ? n.nav : 0), 1), r = o.getFullYear(), s = o.getMonth(); new Date(r, s, a).getMonth() !== s;)a -= 1;
                i = [r, s, a]
            }
            return i
        }, i.prototype.normalize = function (t) {
            return t.setHours(0, 0, 0, 0), t
        }, i.prototype.measure = function (t, e) {
            var i = this;
            return e ? "string" == typeof e ? e = i.parse(t, e) : r.isInteger(e) && (e = i.now(t, e, {rel: e})) : e = "min" == t ? -(1 / 0) : 1 / 0, e
        }, i.prototype.viewset = function (t, e) {
            return this.create([e.year, e.month, 1])
        }, i.prototype.validate = function (t, i, n) {
            var o, s, a, l, c = this, u = i, h = n && n.interval ? n.interval : 1, d = -1 === c.item.enable, p = c.item.min, f = c.item.max, m = d && c.item.disable.filter(function (t) {
                    if (e.isArray(t)) {
                        var n = c.create(t).pick;
                        n < i.pick ? o = !0 : n > i.pick && (s = !0)
                    }
                    return r.isInteger(t)
                }).length;
            if ((!n || !n.nav) && (!d && c.disabled(i) || d && c.disabled(i) && (m || o || s) || !d && (i.pick <= p.pick || i.pick >= f.pick)))for (d && !m && (!s && h > 0 || !o && 0 > h) && (h *= -1); c.disabled(i) && (Math.abs(h) > 1 && (i.month < u.month || i.month > u.month) && (i = u, h = h > 0 ? 1 : -1), i.pick <= p.pick ? (a = !0, h = 1, i = c.create([p.year, p.month, p.date + (i.pick === p.pick ? 0 : -1)])) : i.pick >= f.pick && (l = !0, h = -1, i = c.create([f.year, f.month, f.date + (i.pick === f.pick ? 0 : 1)])), !a || !l);)i = c.create([i.year, i.month, i.date + h]);
            return i
        }, i.prototype.disabled = function (t) {
            var i = this, n = i.item.disable.filter(function (n) {
                return r.isInteger(n) ? t.day === (i.settings.firstDay ? n : n - 1) % 7 : e.isArray(n) || r.isDate(n) ? t.pick === i.create(n).pick : e.isPlainObject(n) ? i.withinRange(n, t) : void 0
            });
            return n = n.length && !n.filter(function (t) {
                return e.isArray(t) && "inverted" == t[3] || e.isPlainObject(t) && t.inverted
            }).length, -1 === i.item.enable ? !n : n || t.pick < i.item.min.pick || t.pick > i.item.max.pick
        }, i.prototype.parse = function (t, e, i) {
            var n = this, o = {};
            return e && "string" == typeof e ? (i && i.format || (i = i || {}, i.format = n.settings.format), n.formats.toArray(i.format).map(function (t) {
                var i = n.formats[t], s = i ? r.trigger(i, n, [e, o]) : t.replace(/^!/, "").length;
                i && (o[t] = e.substr(0, s)), e = e.substr(s)
            }), [o.yyyy || o.yy, +(o.mm || o.m) - 1, o.dd || o.d]) : e
        }, i.prototype.formats = function () {
            function t(t, e, i) {
                var n = t.match(/\w+/)[0];
                return i.mm || i.m || (i.m = e.indexOf(n) + 1), n.length
            }

            function e(t) {
                return t.match(/\w+/)[0].length
            }

            return {
                d: function (t, e) {
                    return t ? r.digits(t) : e.date
                }, dd: function (t, e) {
                    return t ? 2 : r.lead(e.date)
                }, ddd: function (t, i) {
                    return t ? e(t) : this.settings.weekdaysShort[i.day]
                }, dddd: function (t, i) {
                    return t ? e(t) : this.settings.weekdaysFull[i.day]
                }, m: function (t, e) {
                    return t ? r.digits(t) : e.month + 1
                }, mm: function (t, e) {
                    return t ? 2 : r.lead(e.month + 1)
                }, mmm: function (e, i) {
                    var n = this.settings.monthsShort;
                    return e ? t(e, n, i) : n[i.month]
                }, mmmm: function (e, i) {
                    var n = this.settings.monthsFull;
                    return e ? t(e, n, i) : n[i.month]
                }, yy: function (t, e) {
                    return t ? 2 : ("" + e.year).slice(2)
                }, yyyy: function (t, e) {
                    return t ? 4 : e.year
                }, toArray: function (t) {
                    return t.split(/(d{1,4}|m{1,4}|y{4}|yy|!.)/g)
                }, toString: function (t, e) {
                    var i = this;
                    return i.formats.toArray(t).map(function (t) {
                        return r.trigger(i.formats[t], i, [0, e]) || t.replace(/^!/, "")
                    }).join("")
                }
            }
        }(), i.prototype.isDateExact = function (t, i) {
            var n = this;
            return r.isInteger(t) && r.isInteger(i) || "boolean" == typeof t && "boolean" == typeof i ? t === i : (r.isDate(t) || e.isArray(t)) && (r.isDate(i) || e.isArray(i)) ? n.create(t).pick === n.create(i).pick : e.isPlainObject(t) && e.isPlainObject(i) ? n.isDateExact(t.from, i.from) && n.isDateExact(t.to, i.to) : !1
        }, i.prototype.isDateOverlap = function (t, i) {
            var n = this, o = n.settings.firstDay ? 1 : 0;
            return r.isInteger(t) && (r.isDate(i) || e.isArray(i)) ? (t = t % 7 + o, t === n.create(i).day + 1) : r.isInteger(i) && (r.isDate(t) || e.isArray(t)) ? (i = i % 7 + o, i === n.create(t).day + 1) : e.isPlainObject(t) && e.isPlainObject(i) ? n.overlapRanges(t, i) : !1
        }, i.prototype.flipEnable = function (t) {
            var e = this.item;
            e.enable = t || (-1 == e.enable ? 1 : -1)
        }, i.prototype.deactivate = function (t, i) {
            var n = this, o = n.item.disable.slice(0);
            return "flip" == i ? n.flipEnable() : i === !1 ? (n.flipEnable(1), o = []) : i === !0 ? (n.flipEnable(-1), o = []) : i.map(function (t) {
                for (var i, s = 0; s < o.length; s += 1)if (n.isDateExact(t, o[s])) {
                    i = !0;
                    break
                }
                i || (r.isInteger(t) || r.isDate(t) || e.isArray(t) || e.isPlainObject(t) && t.from && t.to) && o.push(t)
            }), o
        }, i.prototype.activate = function (t, i) {
            var n = this, o = n.item.disable, s = o.length;
            return "flip" == i ? n.flipEnable() : i === !0 ? (n.flipEnable(1), o = []) : i === !1 ? (n.flipEnable(-1), o = []) : i.map(function (t) {
                var i, a, l, c;
                for (l = 0; s > l; l += 1) {
                    if (a = o[l], n.isDateExact(a, t)) {
                        i = o[l] = null, c = !0;
                        break
                    }
                    if (n.isDateOverlap(a, t)) {
                        e.isPlainObject(t) ? (t.inverted = !0, i = t) : e.isArray(t) ? (i = t, i[3] || i.push("inverted")) : r.isDate(t) && (i = [t.getFullYear(), t.getMonth(), t.getDate(), "inverted"]);
                        break
                    }
                }
                if (i)for (l = 0; s > l; l += 1)if (n.isDateExact(o[l], t)) {
                    o[l] = null;
                    break
                }
                if (c)for (l = 0; s > l; l += 1)if (n.isDateOverlap(o[l], t)) {
                    o[l] = null;
                    break
                }
                i && o.push(i)
            }), o.filter(function (t) {
                return null != t
            })
        }, i.prototype.nodes = function (t) {
            var e = this, i = e.settings, s = e.item, a = s.now, l = s.select, c = s.highlight, u = s.view, h = s.disable, d = s.min, p = s.max, f = function (t, e) {
                return i.firstDay && (t.push(t.shift()), e.push(e.shift())), r.node("thead", r.node("tr", r.group({
                    min: 0,
                    max: n - 1,
                    i: 1,
                    node: "th",
                    item: function (n) {
                        return [t[n], i.klass.weekdays, 'scope=col title="' + e[n] + '"']
                    }
                })))
            }((i.showWeekdaysFull ? i.weekdaysFull : i.weekdaysLetter).slice(0), i.weekdaysFull.slice(0)), m = function (t) {
                return r.node("div", " ", i.klass["nav" + (t ? "Next" : "Prev")] + (t && u.year >= p.year && u.month >= p.month || !t && u.year <= d.year && u.month <= d.month ? " " + i.klass.navDisabled : ""), "data-nav=" + (t || -1) + " " + r.ariaAttr({
                    role: "button",
                    controls: e.$node[0].id + "_table"
                }) + ' title="' + (t ? i.labelMonthNext : i.labelMonthPrev) + '"')
            }, g = function (n) {
                var o = i.showMonthsShort ? i.monthsShort : i.monthsFull;
                return "short_months" == n && (o = i.monthsShort), i.selectMonths && void 0 == n ? r.node("select", r.group({
                    min: 0,
                    max: 11,
                    i: 1,
                    node: "option",
                    item: function (t) {
                        return [o[t], 0, "value=" + t + (u.month == t ? " selected" : "") + (u.year == d.year && t < d.month || u.year == p.year && t > p.month ? " disabled" : "")]
                    }
                }), i.klass.selectMonth + " browser-default", (t ? "" : "disabled") + " " + r.ariaAttr({controls: e.$node[0].id + "_table"}) + ' title="' + i.labelMonthSelect + '"') : "short_months" == n ? null != l ? r.node("div", o[l.month]) : r.node("div", o[u.month]) : r.node("div", o[u.month], i.klass.month)
            }, v = function (n) {
                var o = u.year, s = i.selectYears === !0 ? 5 : ~~(i.selectYears / 2);
                if (s) {
                    var a = d.year, l = p.year, c = o - s, h = o + s;
                    if (a > c && (h += a - c, c = a), h > l) {
                        var f = c - a, m = h - l;
                        c -= f > m ? m : f, h = l
                    }
                    if (i.selectYears && void 0 == n)return r.node("select", r.group({
                        min: c,
                        max: h,
                        i: 1,
                        node: "option",
                        item: function (t) {
                            return [t, 0, "value=" + t + (o == t ? " selected" : "")]
                        }
                    }), i.klass.selectYear + " browser-default", (t ? "" : "disabled") + " " + r.ariaAttr({controls: e.$node[0].id + "_table"}) + ' title="' + i.labelYearSelect + '"')
                }
                return "raw" == n ? r.node("div", o) : r.node("div", o, i.klass.year)
            };
            return createDayLabel = function () {
                return null != l ? r.node("div", l.date) : r.node("div", a.date)
            }, createWeekdayLabel = function () {
                var t;
                t = null != l ? l.day : a.day;
                var e = i.weekdaysFull[t];
                return e
            }, r.node("div", r.node("div", createWeekdayLabel(), "picker__weekday-display") + r.node("div", g("short_months"), i.klass.month_display) + r.node("div", createDayLabel(), i.klass.day_display) + r.node("div", v("raw"), i.klass.year_display), i.klass.date_display) + r.node("div", r.node("div", (i.selectYears ? g() + v() : g() + v()) + m() + m(1), i.klass.header) + r.node("table", f + r.node("tbody", r.group({
                min: 0,
                max: o - 1,
                i: 1,
                node: "tr",
                item: function (t) {
                    var o = i.firstDay && 0 === e.create([u.year, u.month, 1]).day ? -7 : 0;
                    return [r.group({
                        min: n * t - u.day + o + 1, max: function () {
                            return this.min + n - 1
                        }, i: 1, node: "td", item: function (t) {
                            t = e.create([u.year, u.month, t + (i.firstDay ? 1 : 0)]);
                            var n = l && l.pick == t.pick, o = c && c.pick == t.pick, s = h && e.disabled(t) || t.pick < d.pick || t.pick > p.pick, f = r.trigger(e.formats.toString, e, [i.format, t]);
                            return [r.node("div", t.date, function (e) {
                                return e.push(u.month == t.month ? i.klass.infocus : i.klass.outfocus), a.pick == t.pick && e.push(i.klass.now), n && e.push(i.klass.selected), o && e.push(i.klass.highlighted), s && e.push(i.klass.disabled), e.join(" ")
                            }([i.klass.day]), "data-pick=" + t.pick + " " + r.ariaAttr({
                                role: "gridcell",
                                label: f,
                                selected: n && e.$node.val() === f ? !0 : null,
                                activedescendant: o ? !0 : null,
                                disabled: s ? !0 : null
                            })), "", r.ariaAttr({role: "presentation"})]
                        }
                    })]
                }
            })), i.klass.table, 'id="' + e.$node[0].id + '_table" ' + r.ariaAttr({
                role: "grid",
                controls: e.$node[0].id,
                readonly: !0
            })), i.klass.calendar_container) + r.node("div", r.node("button", i.today, "btn-flat picker__today", "type=button data-pick=" + a.pick + (t && !e.disabled(a) ? "" : " disabled") + " " + r.ariaAttr({controls: e.$node[0].id})) + r.node("button", i.clear, "btn-flat picker__clear", "type=button data-clear=1" + (t ? "" : " disabled") + " " + r.ariaAttr({controls: e.$node[0].id})) + r.node("button", i.close, "btn-flat picker__close", "type=button data-close=true " + (t ? "" : " disabled") + " " + r.ariaAttr({controls: e.$node[0].id})), i.klass.footer)
        }, i.defaults = function (t) {
            return {
                labelMonthNext: "Next month",
                labelMonthPrev: "Previous month",
                labelMonthSelect: "Select a month",
                labelYearSelect: "Select a year",
                monthsFull: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                weekdaysFull: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                weekdaysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                weekdaysLetter: ["S", "M", "T", "W", "T", "F", "S"],
                today: "Today",
                clear: "Clear",
                close: "Close",
                format: "d mmmm, yyyy",
                klass: {
                    table: t + "table",
                    header: t + "header",
                    date_display: t + "date-display",
                    day_display: t + "day-display",
                    month_display: t + "month-display",
                    year_display: t + "year-display",
                    calendar_container: t + "calendar-container",
                    navPrev: t + "nav--prev",
                    navNext: t + "nav--next",
                    navDisabled: t + "nav--disabled",
                    month: t + "month",
                    year: t + "year",
                    selectMonth: t + "select--month",
                    selectYear: t + "select--year",
                    weekdays: t + "weekday",
                    day: t + "day",
                    disabled: t + "day--disabled",
                    selected: t + "day--selected",
                    highlighted: t + "day--highlighted",
                    now: t + "day--today",
                    infocus: t + "day--infocus",
                    outfocus: t + "day--outfocus",
                    footer: t + "footer",
                    buttonClear: t + "button--clear",
                    buttonToday: t + "button--today",
                    buttonClose: t + "button--close"
                }
            }
        }(t.klasses().picker + "__"), t.extend("pickadate", i)
    }), function (t) {
        function e() {
            var e = +t(this).attr("length"), i = +t(this).val().length, n = e >= i;
            t(this).parent().find('span[class="character-counter"]').html(i + "/" + e), o(n, t(this))
        }

        function i(e) {
            var i = t("<span/>").addClass("character-counter").css("float", "right").css("font-size", "12px").css("height", 1);
            e.parent().append(i)
        }

        function n() {
            t(this).parent().find('span[class="character-counter"]').html("")
        }

        function o(t, e) {
            var i = e.hasClass("invalid");
            t && i ? e.removeClass("invalid") : t || i || (e.removeClass("valid"), e.addClass("invalid"))
        }

        t.fn.characterCounter = function () {
            return this.each(function () {
                var o = void 0 !== t(this).attr("length");
                o && (t(this).on("input", e), t(this).on("focus", e), t(this).on("blur", n), i(t(this)))
            })
        }, t(document).ready(function () {
            t("input, textarea").characterCounter()
        })
    }(jQuery), function (t, e, i, n, o) {
        "use strict";
        var r = 0, s = function () {
            var e, i = n.userAgent, o = /msie\s\d+/i;
            return i.search(o) > 0 && (e = o.exec(i).toString(), e = e.split(" ")[1], 9 > e) ? (t("html").addClass("lt-ie9"), !0) : !1
        }();
        Function.prototype.bind || (Function.prototype.bind = function (t) {
            var e = this, i = [].slice;
            if ("function" != typeof e)throw new TypeError;
            var n = i.call(arguments, 1), o = function () {
                if (this instanceof o) {
                    var r = function () {
                    };
                    r.prototype = e.prototype;
                    var s = new r, a = e.apply(s, n.concat(i.call(arguments)));
                    return Object(a) === a ? a : s
                }
                return e.apply(t, n.concat(i.call(arguments)))
            };
            return o
        }), Array.prototype.indexOf || (Array.prototype.indexOf = function (t, e) {
            var i;
            if (null == this)throw new TypeError('"this" is null or not defined');
            var n = Object(this), o = n.length >>> 0;
            if (0 === o)return -1;
            var r = +e || 0;
            if (Math.abs(r) === 1 / 0 && (r = 0), r >= o)return -1;
            for (i = Math.max(r >= 0 ? r : o - Math.abs(r), 0); o > i;) {
                if (i in n && n[i] === t)return i;
                i++
            }
            return -1
        });
        var a = '<span class="irs"><span class="irs-line" tabindex="-1"><span class="irs-line-left"></span><span class="irs-line-mid"></span><span class="irs-line-right"></span></span><span class="irs-min">0</span><span class="irs-max">1</span><span class="irs-from">0</span><span class="irs-to">0</span><span class="irs-single">0</span></span><span class="irs-grid"></span><span class="irs-bar"></span>', l = '<span class="irs-bar-edge"></span><span class="irs-shadow shadow-single"></span><span class="irs-slider single"></span>', c = '<span class="irs-shadow shadow-from"></span><span class="irs-shadow shadow-to"></span><span class="irs-slider from"></span><span class="irs-slider to"></span>', u = '<span class="irs-disable-mask"></span>', h = function (n, o, r) {
            this.VERSION = "2.0.13", this.input = n, this.plugin_count = r, this.current_plugin = 0, this.calc_count = 0, this.update_tm = 0, this.old_from = 0, this.old_to = 0, this.raf_id = null, this.dragging = !1, this.force_redraw = !1, this.is_key = !1, this.is_update = !1, this.is_start = !0, this.is_finish = !1, this.is_active = !1, this.is_resize = !1, this.is_click = !1, this.$cache = {
                win: t(i),
                body: t(e.body),
                input: t(n),
                cont: null,
                rs: null,
                min: null,
                max: null,
                from: null,
                to: null,
                single: null,
                bar: null,
                line: null,
                s_single: null,
                s_from: null,
                s_to: null,
                shad_single: null,
                shad_from: null,
                shad_to: null,
                edge: null,
                grid: null,
                grid_labels: []
            };
            var s = this.$cache.input, a = {
                type: s.data("type"),
                min: s.data("min"),
                max: s.data("max"),
                from: s.data("from"),
                to: s.data("to"),
                step: s.data("step"),
                min_interval: s.data("minInterval"),
                max_interval: s.data("maxInterval"),
                drag_interval: s.data("dragInterval"),
                values: s.data("values"),
                from_fixed: s.data("fromFixed"),
                from_min: s.data("fromMin"),
                from_max: s.data("fromMax"),
                from_shadow: s.data("fromShadow"),
                to_fixed: s.data("toFixed"),
                to_min: s.data("toMin"),
                to_max: s.data("toMax"),
                to_shadow: s.data("toShadow"),
                prettify_enabled: s.data("prettifyEnabled"),
                prettify_separator: s.data("prettifySeparator"),
                force_edges: s.data("forceEdges"),
                keyboard: s.data("keyboard"),
                keyboard_step: s.data("keyboardStep"),
                grid: s.data("grid"),
                grid_margin: s.data("gridMargin"),
                grid_num: s.data("gridNum"),
                grid_snap: s.data("gridSnap"),
                hide_min_max: s.data("hideMinMax"),
                hide_from_to: s.data("hideFromTo"),
                prefix: s.data("prefix"),
                postfix: s.data("postfix"),
                max_postfix: s.data("maxPostfix"),
                decorate_both: s.data("decorateBoth"),
                values_separator: s.data("valuesSeparator"),
                disable: s.data("disable")
            };
            a.values = a.values && a.values.split(",");
            var l = s.prop("value");
            l && (l = l.split(";"), l[0] && l[0] == +l[0] && (l[0] = +l[0]), l[1] && l[1] == +l[1] && (l[1] = +l[1]), o && o.values && o.values.length ? (a.from = l[0] && o.values.indexOf(l[0]), a.to = l[1] && o.values.indexOf(l[1])) : (a.from = l[0] && +l[0], a.to = l[1] && +l[1])), o = t.extend(a, o), this.options = t.extend({
                type: "single",
                min: 10,
                max: 100,
                from: null,
                to: null,
                step: 1,
                min_interval: 0,
                max_interval: 0,
                drag_interval: !1,
                values: [],
                p_values: [],
                from_fixed: !1,
                from_min: null,
                from_max: null,
                from_shadow: !1,
                to_fixed: !1,
                to_min: null,
                to_max: null,
                to_shadow: !1,
                prettify_enabled: !0,
                prettify_separator: " ",
                prettify: null,
                force_edges: !1,
                keyboard: !1,
                keyboard_step: 5,
                grid: !1,
                grid_margin: !0,
                grid_num: 4,
                grid_snap: !1,
                hide_min_max: !1,
                hide_from_to: !1,
                prefix: "",
                postfix: "",
                max_postfix: "",
                decorate_both: !0,
                values_separator: " — ",
                disable: !1,
                onStart: null,
                onChange: null,
                onFinish: null,
                onUpdate: null
            }, o), this.validate(), this.result = {
                input: this.$cache.input,
                slider: null,
                min: this.options.min,
                max: this.options.max,
                from: this.options.from,
                from_percent: 0,
                from_value: null,
                to: this.options.to,
                to_percent: 0,
                to_value: null
            }, this.coords = {
                x_gap: 0,
                x_pointer: 0,
                w_rs: 0,
                w_rs_old: 0,
                w_handle: 0,
                p_gap: 0,
                p_gap_left: 0,
                p_gap_right: 0,
                p_step: 0,
                p_pointer: 0,
                p_handle: 0,
                p_single: 0,
                p_single_real: 0,
                p_from: 0,
                p_from_real: 0,
                p_to: 0,
                p_to_real: 0,
                p_bar_x: 0,
                p_bar_w: 0,
                grid_gap: 0,
                big_num: 0,
                big: [],
                big_w: [],
                big_p: [],
                big_x: []
            }, this.labels = {
                w_min: 0,
                w_max: 0,
                w_from: 0,
                w_to: 0,
                w_single: 0,
                p_min: 0,
                p_max: 0,
                p_from: 0,
                p_from_left: 0,
                p_to: 0,
                p_to_left: 0,
                p_single: 0,
                p_single_left: 0
            }, this.init()
        };
        h.prototype = {
            init: function (t) {
                this.coords.p_step = this.options.step / ((this.options.max - this.options.min) / 100), this.target = "base", this.toggleInput(), this.append(), this.setMinMax(), t ? (this.force_redraw = !0, this.calc(!0), this.callOnUpdate()) : (this.force_redraw = !0, this.calc(!0), this.callOnStart()), this.updateScene()
            }, append: function () {
                var t = '<span class="irs js-irs-' + this.plugin_count + '"></span>';
                this.$cache.input.before(t), this.$cache.input.prop("readonly", !0), this.$cache.cont = this.$cache.input.prev(), this.result.slider = this.$cache.cont, this.$cache.cont.html(a), this.$cache.rs = this.$cache.cont.find(".irs"), this.$cache.min = this.$cache.cont.find(".irs-min"), this.$cache.max = this.$cache.cont.find(".irs-max"), this.$cache.from = this.$cache.cont.find(".irs-from"), this.$cache.to = this.$cache.cont.find(".irs-to"), this.$cache.single = this.$cache.cont.find(".irs-single"), this.$cache.bar = this.$cache.cont.find(".irs-bar"), this.$cache.line = this.$cache.cont.find(".irs-line"), this.$cache.grid = this.$cache.cont.find(".irs-grid"), "single" === this.options.type ? (this.$cache.cont.append(l), this.$cache.edge = this.$cache.cont.find(".irs-bar-edge"), this.$cache.s_single = this.$cache.cont.find(".single"), this.$cache.from[0].style.visibility = "hidden", this.$cache.to[0].style.visibility = "hidden", this.$cache.shad_single = this.$cache.cont.find(".shadow-single")) : (this.$cache.cont.append(c), this.$cache.s_from = this.$cache.cont.find(".from"), this.$cache.s_to = this.$cache.cont.find(".to"), this.$cache.shad_from = this.$cache.cont.find(".shadow-from"), this.$cache.shad_to = this.$cache.cont.find(".shadow-to"), this.setTopHandler()), this.options.hide_from_to && (this.$cache.from[0].style.display = "none", this.$cache.to[0].style.display = "none", this.$cache.single[0].style.display = "none"), this.appendGrid(), this.options.disable ? (this.appendDisableMask(), this.$cache.input[0].disabled = !0) : (this.$cache.cont.removeClass("irs-disabled"), this.$cache.input[0].disabled = !1, this.bindEvents())
            }, setTopHandler: function () {
                var t = this.options.min, e = this.options.max, i = this.options.from, n = this.options.to;
                i > t && n === e ? this.$cache.s_from.addClass("type_last") : e > n && this.$cache.s_to.addClass("type_last")
            }, appendDisableMask: function () {
                this.$cache.cont.append(u), this.$cache.cont.addClass("irs-disabled")
            }, remove: function () {
                this.$cache.cont.remove(), this.$cache.cont = null, this.$cache.line.off("keydown.irs_" + this.plugin_count), this.$cache.body.off("touchmove.irs_" + this.plugin_count), this.$cache.body.off("mousemove.irs_" + this.plugin_count), this.$cache.win.off("touchend.irs_" + this.plugin_count), this.$cache.win.off("mouseup.irs_" + this.plugin_count), s && (this.$cache.body.off("mouseup.irs_" + this.plugin_count), this.$cache.body.off("mouseleave.irs_" + this.plugin_count)), this.$cache.grid_labels = [], this.coords.big = [], this.coords.big_w = [], this.coords.big_p = [], this.coords.big_x = [], cancelAnimationFrame(this.raf_id)
            }, bindEvents: function () {
                this.$cache.body.on("touchmove.irs_" + this.plugin_count, this.pointerMove.bind(this)), this.$cache.body.on("mousemove.irs_" + this.plugin_count, this.pointerMove.bind(this)), this.$cache.win.on("touchend.irs_" + this.plugin_count, this.pointerUp.bind(this)), this.$cache.win.on("mouseup.irs_" + this.plugin_count, this.pointerUp.bind(this)), this.$cache.line.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.line.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.options.drag_interval && "double" === this.options.type ? (this.$cache.bar.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "both")), this.$cache.bar.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "both"))) : (this.$cache.bar.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.bar.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"))), "single" === this.options.type ? (this.$cache.single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.s_single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.shad_single.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.s_single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.edge.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_single.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"))) : (this.$cache.single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.from.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.s_from.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.to.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.s_to.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.shad_from.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_to.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.from.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.s_from.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.to.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.s_to.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.shad_from.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_to.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"))), this.options.keyboard && this.$cache.line.on("keydown.irs_" + this.plugin_count, this.key.bind(this, "keyboard")), s && (this.$cache.body.on("mouseup.irs_" + this.plugin_count, this.pointerUp.bind(this)), this.$cache.body.on("mouseleave.irs_" + this.plugin_count, this.pointerUp.bind(this)))
            }, pointerMove: function (t) {
                if (this.dragging) {
                    var e = t.pageX || t.originalEvent.touches && t.originalEvent.touches[0].pageX;
                    this.coords.x_pointer = e - this.coords.x_gap, this.calc()
                }
            }, pointerUp: function (e) {
                this.current_plugin === this.plugin_count && this.is_active && (this.is_active = !1, (t.contains(this.$cache.cont[0], e.target) || this.dragging) && (this.is_finish = !0, this.callOnFinish()), this.$cache.cont.find(".state_hover").removeClass("state_hover"), this.force_redraw = !0, this.dragging = !1, s && t("*").prop("unselectable", !1), this.updateScene())
            }, changeLevel: function (t) {
                switch (t) {
                    case"single":
                        this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_single);
                        break;
                    case"from":
                        this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_from), this.$cache.s_from.addClass("state_hover"), this.$cache.s_from.addClass("type_last"), this.$cache.s_to.removeClass("type_last");
                        break;
                    case"to":
                        this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_to), this.$cache.s_to.addClass("state_hover"), this.$cache.s_to.addClass("type_last"), this.$cache.s_from.removeClass("type_last");
                        break;
                    case"both":
                        this.coords.p_gap_left = this.toFixed(this.coords.p_pointer - this.coords.p_from), this.coords.p_gap_right = this.toFixed(this.coords.p_to - this.coords.p_pointer), this.$cache.s_to.removeClass("type_last"), this.$cache.s_from.removeClass("type_last")
                }
            }, pointerDown: function (e, i) {
                i.preventDefault();
                var n = i.pageX || i.originalEvent.touches && i.originalEvent.touches[0].pageX;
                2 !== i.button && (this.current_plugin = this.plugin_count, this.target = e, this.is_active = !0, this.dragging = !0, this.coords.x_gap = this.$cache.rs.offset().left, this.coords.x_pointer = n - this.coords.x_gap, this.calcPointer(), this.changeLevel(e), s && t("*").prop("unselectable", !0), this.$cache.line.trigger("focus"), this.updateScene())
            }, pointerClick: function (t, e) {
                e.preventDefault();
                var i = e.pageX || e.originalEvent.touches && e.originalEvent.touches[0].pageX;
                2 !== e.button && (this.current_plugin = this.plugin_count, this.target = t, this.is_click = !0, this.coords.x_gap = this.$cache.rs.offset().left, this.coords.x_pointer = +(i - this.coords.x_gap).toFixed(), this.force_redraw = !0, this.calc(), this.$cache.line.trigger("focus"))
            }, key: function (t, e) {
                if (!(this.current_plugin !== this.plugin_count || e.altKey || e.ctrlKey || e.shiftKey || e.metaKey)) {
                    switch (e.which) {
                        case 83:
                        case 65:
                        case 40:
                        case 37:
                            e.preventDefault(), this.moveByKey(!1);
                            break;
                        case 87:
                        case 68:
                        case 38:
                        case 39:
                            e.preventDefault(), this.moveByKey(!0)
                    }
                    return !0
                }
            }, moveByKey: function (t) {
                var e = this.coords.p_pointer;
                t ? e += this.options.keyboard_step : e -= this.options.keyboard_step, this.coords.x_pointer = this.toFixed(this.coords.w_rs / 100 * e), this.is_key = !0, this.calc()
            }, setMinMax: function () {
                if (this.options) {
                    if (this.options.hide_min_max)return this.$cache.min[0].style.display = "none", void(this.$cache.max[0].style.display = "none");
                    this.options.values.length ? (this.$cache.min.html(this.decorate(this.options.p_values[this.options.min])), this.$cache.max.html(this.decorate(this.options.p_values[this.options.max]))) : (this.$cache.min.html(this.decorate(this._prettify(this.options.min), this.options.min)), this.$cache.max.html(this.decorate(this._prettify(this.options.max), this.options.max))), this.labels.w_min = this.$cache.min.outerWidth(!1), this.labels.w_max = this.$cache.max.outerWidth(!1)
                }
            }, calc: function (t) {
                if (this.options && (this.calc_count++, (10 === this.calc_count || t) && (this.calc_count = 0, this.coords.w_rs = this.$cache.rs.outerWidth(!1), "single" === this.options.type ? this.coords.w_handle = this.$cache.s_single.outerWidth(!1) : this.coords.w_handle = this.$cache.s_from.outerWidth(!1)), this.coords.w_rs)) {
                    this.calcPointer(), this.coords.p_handle = this.toFixed(this.coords.w_handle / this.coords.w_rs * 100);
                    var e = 100 - this.coords.p_handle, i = this.toFixed(this.coords.p_pointer - this.coords.p_gap);
                    switch ("click" === this.target && (this.coords.p_gap = this.coords.p_handle / 2, i = this.toFixed(this.coords.p_pointer - this.coords.p_gap), this.target = this.chooseHandle(i)), 0 > i ? i = 0 : i > e && (i = e), this.target) {
                        case"base":
                            var n = (this.options.max - this.options.min) / 100, o = (this.result.from - this.options.min) / n, r = (this.result.to - this.options.min) / n;
                            this.coords.p_single_real = this.toFixed(o), this.coords.p_from_real = this.toFixed(o), this.coords.p_to_real = this.toFixed(r), this.coords.p_single_real = this.checkDiapason(this.coords.p_single_real, this.options.from_min, this.options.from_max), this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max), this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max), this.coords.p_single = this.toFixed(o - this.coords.p_handle / 100 * o), this.coords.p_from = this.toFixed(o - this.coords.p_handle / 100 * o), this.coords.p_to = this.toFixed(r - this.coords.p_handle / 100 * r), this.target = null;
                            break;
                        case"single":
                            if (this.options.from_fixed)break;
                            this.coords.p_single_real = this.calcWithStep(i / e * 100), this.coords.p_single_real = this.checkDiapason(this.coords.p_single_real, this.options.from_min, this.options.from_max), this.coords.p_single = this.toFixed(this.coords.p_single_real / 100 * e);
                            break;
                        case"from":
                            if (this.options.from_fixed)break;
                            this.coords.p_from_real = this.calcWithStep(i / e * 100), this.coords.p_from_real > this.coords.p_to_real && (this.coords.p_from_real = this.coords.p_to_real), this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max), this.coords.p_from_real = this.checkMinInterval(this.coords.p_from_real, this.coords.p_to_real, "from"), this.coords.p_from_real = this.checkMaxInterval(this.coords.p_from_real, this.coords.p_to_real, "from"), this.coords.p_from = this.toFixed(this.coords.p_from_real / 100 * e);
                            break;
                        case"to":
                            if (this.options.to_fixed)break;
                            this.coords.p_to_real = this.calcWithStep(i / e * 100), this.coords.p_to_real < this.coords.p_from_real && (this.coords.p_to_real = this.coords.p_from_real), this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max), this.coords.p_to_real = this.checkMinInterval(this.coords.p_to_real, this.coords.p_from_real, "to"), this.coords.p_to_real = this.checkMaxInterval(this.coords.p_to_real, this.coords.p_from_real, "to"), this.coords.p_to = this.toFixed(this.coords.p_to_real / 100 * e);
                            break;
                        case"both":
                            if (this.options.from_fixed || this.options.to_fixed)break;
                            i = this.toFixed(i + .1 * this.coords.p_handle), this.coords.p_from_real = this.calcWithStep((i - this.coords.p_gap_left) / e * 100), this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max), this.coords.p_from_real = this.checkMinInterval(this.coords.p_from_real, this.coords.p_to_real, "from"), this.coords.p_from = this.toFixed(this.coords.p_from_real / 100 * e), this.coords.p_to_real = this.calcWithStep((i + this.coords.p_gap_right) / e * 100), this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max),
                                this.coords.p_to_real = this.checkMinInterval(this.coords.p_to_real, this.coords.p_from_real, "to"), this.coords.p_to = this.toFixed(this.coords.p_to_real / 100 * e)
                    }
                    "single" === this.options.type ? (this.coords.p_bar_x = this.coords.p_handle / 2, this.coords.p_bar_w = this.coords.p_single, this.result.from_percent = this.coords.p_single_real, this.result.from = this.calcReal(this.coords.p_single_real), this.options.values.length && (this.result.from_value = this.options.values[this.result.from])) : (this.coords.p_bar_x = this.toFixed(this.coords.p_from + this.coords.p_handle / 2), this.coords.p_bar_w = this.toFixed(this.coords.p_to - this.coords.p_from), this.result.from_percent = this.coords.p_from_real, this.result.from = this.calcReal(this.coords.p_from_real), this.result.to_percent = this.coords.p_to_real, this.result.to = this.calcReal(this.coords.p_to_real), this.options.values.length && (this.result.from_value = this.options.values[this.result.from], this.result.to_value = this.options.values[this.result.to])), this.calcMinMax(), this.calcLabels()
                }
            }, calcPointer: function () {
                return this.coords.w_rs ? (this.coords.x_pointer < 0 || isNaN(this.coords.x_pointer) ? this.coords.x_pointer = 0 : this.coords.x_pointer > this.coords.w_rs && (this.coords.x_pointer = this.coords.w_rs), void(this.coords.p_pointer = this.toFixed(this.coords.x_pointer / this.coords.w_rs * 100))) : void(this.coords.p_pointer = 0)
            }, chooseHandle: function (t) {
                if ("single" === this.options.type)return "single";
                var e = this.coords.p_from_real + (this.coords.p_to_real - this.coords.p_from_real) / 2;
                return t >= e ? this.options.to_fixed ? "from" : "to" : this.options.from_fixed ? "to" : "from"
            }, calcMinMax: function () {
                this.coords.w_rs && (this.labels.p_min = this.labels.w_min / this.coords.w_rs * 100, this.labels.p_max = this.labels.w_max / this.coords.w_rs * 100)
            }, calcLabels: function () {
                this.coords.w_rs && !this.options.hide_from_to && ("single" === this.options.type ? (this.labels.w_single = this.$cache.single.outerWidth(!1), this.labels.p_single = this.labels.w_single / this.coords.w_rs * 100, this.labels.p_single_left = this.coords.p_single + this.coords.p_handle / 2 - this.labels.p_single / 2, this.labels.p_single_left = this.checkEdges(this.labels.p_single_left, this.labels.p_single)) : (this.labels.w_from = this.$cache.from.outerWidth(!1), this.labels.p_from = this.labels.w_from / this.coords.w_rs * 100, this.labels.p_from_left = this.coords.p_from + this.coords.p_handle / 2 - this.labels.p_from / 2, this.labels.p_from_left = this.toFixed(this.labels.p_from_left), this.labels.p_from_left = this.checkEdges(this.labels.p_from_left, this.labels.p_from), this.labels.w_to = this.$cache.to.outerWidth(!1), this.labels.p_to = this.labels.w_to / this.coords.w_rs * 100, this.labels.p_to_left = this.coords.p_to + this.coords.p_handle / 2 - this.labels.p_to / 2, this.labels.p_to_left = this.toFixed(this.labels.p_to_left), this.labels.p_to_left = this.checkEdges(this.labels.p_to_left, this.labels.p_to), this.labels.w_single = this.$cache.single.outerWidth(!1), this.labels.p_single = this.labels.w_single / this.coords.w_rs * 100, this.labels.p_single_left = (this.labels.p_from_left + this.labels.p_to_left + this.labels.p_to) / 2 - this.labels.p_single / 2, this.labels.p_single_left = this.toFixed(this.labels.p_single_left), this.labels.p_single_left = this.checkEdges(this.labels.p_single_left, this.labels.p_single)))
            }, updateScene: function () {
                this.raf_id && (cancelAnimationFrame(this.raf_id), this.raf_id = null), clearTimeout(this.update_tm), this.update_tm = null, this.options && (this.drawHandles(), this.is_active ? this.raf_id = requestAnimationFrame(this.updateScene.bind(this)) : this.update_tm = setTimeout(this.updateScene.bind(this), 300))
            }, drawHandles: function () {
                this.coords.w_rs = this.$cache.rs.outerWidth(!1), this.coords.w_rs && (this.coords.w_rs !== this.coords.w_rs_old && (this.target = "base", this.is_resize = !0), (this.coords.w_rs !== this.coords.w_rs_old || this.force_redraw) && (this.setMinMax(), this.calc(!0), this.drawLabels(), this.options.grid && (this.calcGridMargin(), this.calcGridLabels()), this.force_redraw = !0, this.coords.w_rs_old = this.coords.w_rs, this.drawShadow()), this.coords.w_rs && (this.dragging || this.force_redraw || this.is_key) && ((this.old_from !== this.result.from || this.old_to !== this.result.to || this.force_redraw || this.is_key) && (this.drawLabels(), this.$cache.bar[0].style.left = this.coords.p_bar_x + "%", this.$cache.bar[0].style.width = this.coords.p_bar_w + "%", "single" === this.options.type ? (this.$cache.s_single[0].style.left = this.coords.p_single + "%", this.$cache.single[0].style.left = this.labels.p_single_left + "%", this.options.values.length ? (this.$cache.input.prop("value", this.result.from_value), this.$cache.input.data("from", this.result.from_value)) : (this.$cache.input.prop("value", this.result.from), this.$cache.input.data("from", this.result.from))) : (this.$cache.s_from[0].style.left = this.coords.p_from + "%", this.$cache.s_to[0].style.left = this.coords.p_to + "%", (this.old_from !== this.result.from || this.force_redraw) && (this.$cache.from[0].style.left = this.labels.p_from_left + "%"), (this.old_to !== this.result.to || this.force_redraw) && (this.$cache.to[0].style.left = this.labels.p_to_left + "%"), this.$cache.single[0].style.left = this.labels.p_single_left + "%", this.options.values.length ? (this.$cache.input.prop("value", this.result.from_value + ";" + this.result.to_value), this.$cache.input.data("from", this.result.from_value), this.$cache.input.data("to", this.result.to_value)) : (this.$cache.input.prop("value", this.result.from + ";" + this.result.to), this.$cache.input.data("from", this.result.from), this.$cache.input.data("to", this.result.to))), this.old_from === this.result.from && this.old_to === this.result.to || this.is_start || this.$cache.input.trigger("change"), this.old_from = this.result.from, this.old_to = this.result.to, this.is_resize || this.is_update || this.is_start || this.is_finish || this.callOnChange(), (this.is_key || this.is_click) && this.callOnFinish(), this.is_update = !1, this.is_resize = !1, this.is_finish = !1), this.is_start = !1, this.is_key = !1, this.is_click = !1, this.force_redraw = !1))
            }, callOnStart: function () {
                this.options.onStart && "function" == typeof this.options.onStart && this.options.onStart(this.result)
            }, callOnChange: function () {
                this.options.onChange && "function" == typeof this.options.onChange && this.options.onChange(this.result)
            }, callOnFinish: function () {
                this.options.onFinish && "function" == typeof this.options.onFinish && this.options.onFinish(this.result)
            }, callOnUpdate: function () {
                this.options.onUpdate && "function" == typeof this.options.onUpdate && this.options.onUpdate(this.result)
            }, drawLabels: function () {
                if (this.options) {
                    var t, e, i, n = this.options.values.length, o = this.options.p_values;
                    if (!this.options.hide_from_to)if ("single" === this.options.type)n ? (t = this.decorate(o[this.result.from]), this.$cache.single.html(t)) : (t = this.decorate(this._prettify(this.result.from), this.result.from), this.$cache.single.html(t)), this.calcLabels(), this.labels.p_single_left < this.labels.p_min + 1 ? this.$cache.min[0].style.visibility = "hidden" : this.$cache.min[0].style.visibility = "visible", this.labels.p_single_left + this.labels.p_single > 100 - this.labels.p_max - 1 ? this.$cache.max[0].style.visibility = "hidden" : this.$cache.max[0].style.visibility = "visible"; else {
                        n ? (this.options.decorate_both ? (t = this.decorate(o[this.result.from]), t += this.options.values_separator, t += this.decorate(o[this.result.to])) : t = this.decorate(o[this.result.from] + this.options.values_separator + o[this.result.to]), e = this.decorate(o[this.result.from]), i = this.decorate(o[this.result.to]), this.$cache.single.html(t), this.$cache.from.html(e), this.$cache.to.html(i)) : (this.options.decorate_both ? (t = this.decorate(this._prettify(this.result.from), this.result.from), t += this.options.values_separator, t += this.decorate(this._prettify(this.result.to), this.result.to)) : t = this.decorate(this._prettify(this.result.from) + this.options.values_separator + this._prettify(this.result.to), this.result.to), e = this.decorate(this._prettify(this.result.from), this.result.from), i = this.decorate(this._prettify(this.result.to), this.result.to), this.$cache.single.html(t), this.$cache.from.html(e), this.$cache.to.html(i)), this.calcLabels();
                        var r = Math.min(this.labels.p_single_left, this.labels.p_from_left), s = this.labels.p_single_left + this.labels.p_single, a = this.labels.p_to_left + this.labels.p_to, l = Math.max(s, a);
                        this.labels.p_from_left + this.labels.p_from >= this.labels.p_to_left ? (this.$cache.from[0].style.visibility = "hidden", this.$cache.to[0].style.visibility = "hidden", this.$cache.single[0].style.visibility = "visible", this.result.from === this.result.to ? (this.$cache.from[0].style.visibility = "visible", this.$cache.single[0].style.visibility = "hidden", l = a) : (this.$cache.from[0].style.visibility = "hidden", this.$cache.single[0].style.visibility = "visible", l = Math.max(s, a))) : (this.$cache.from[0].style.visibility = "visible", this.$cache.to[0].style.visibility = "visible", this.$cache.single[0].style.visibility = "hidden"), r < this.labels.p_min + 1 ? this.$cache.min[0].style.visibility = "hidden" : this.$cache.min[0].style.visibility = "visible", l > 100 - this.labels.p_max - 1 ? this.$cache.max[0].style.visibility = "hidden" : this.$cache.max[0].style.visibility = "visible"
                    }
                }
            }, drawShadow: function () {
                var t, e, i, n, o = this.options, r = this.$cache, s = "number" == typeof o.from_min && !isNaN(o.from_min), a = "number" == typeof o.from_max && !isNaN(o.from_max), l = "number" == typeof o.to_min && !isNaN(o.to_min), c = "number" == typeof o.to_max && !isNaN(o.to_max);
                "single" === o.type ? o.from_shadow && (s || a) ? (t = this.calcPercent(s ? o.from_min : o.min), e = this.calcPercent(a ? o.from_max : o.max) - t, t = this.toFixed(t - this.coords.p_handle / 100 * t), e = this.toFixed(e - this.coords.p_handle / 100 * e), t += this.coords.p_handle / 2, r.shad_single[0].style.display = "block", r.shad_single[0].style.left = t + "%", r.shad_single[0].style.width = e + "%") : r.shad_single[0].style.display = "none" : (o.from_shadow && (s || a) ? (t = this.calcPercent(s ? o.from_min : o.min), e = this.calcPercent(a ? o.from_max : o.max) - t, t = this.toFixed(t - this.coords.p_handle / 100 * t), e = this.toFixed(e - this.coords.p_handle / 100 * e), t += this.coords.p_handle / 2, r.shad_from[0].style.display = "block", r.shad_from[0].style.left = t + "%", r.shad_from[0].style.width = e + "%") : r.shad_from[0].style.display = "none", o.to_shadow && (l || c) ? (i = this.calcPercent(l ? o.to_min : o.min), n = this.calcPercent(c ? o.to_max : o.max) - i, i = this.toFixed(i - this.coords.p_handle / 100 * i), n = this.toFixed(n - this.coords.p_handle / 100 * n), i += this.coords.p_handle / 2, r.shad_to[0].style.display = "block", r.shad_to[0].style.left = i + "%", r.shad_to[0].style.width = n + "%") : r.shad_to[0].style.display = "none")
            }, toggleInput: function () {
                this.$cache.input.toggleClass("irs-hidden-input")
            }, calcPercent: function (t) {
                var e = (this.options.max - this.options.min) / 100, i = (t - this.options.min) / e;
                return this.toFixed(i)
            }, calcReal: function (t) {
                var e, i, n = this.options.min, o = this.options.max, r = n.toString().split(".")[1], s = o.toString().split(".")[1], a = 0, l = 0;
                if (0 === t)return this.options.min;
                if (100 === t)return this.options.max;
                r && (e = r.length, a = e), s && (i = s.length, a = i), e && i && (a = e >= i ? e : i), 0 > n && (l = Math.abs(n), n = +(n + l).toFixed(a), o = +(o + l).toFixed(a));
                var c, u = (o - n) / 100 * t + n, h = this.options.step.toString().split(".")[1];
                return h ? u = +u.toFixed(h.length) : (u /= this.options.step, u *= this.options.step, u = +u.toFixed(0)), l && (u -= l), c = h ? +u.toFixed(h.length) : this.toFixed(u), c < this.options.min ? c = this.options.min : c > this.options.max && (c = this.options.max), c
            }, calcWithStep: function (t) {
                var e = Math.round(t / this.coords.p_step) * this.coords.p_step;
                return e > 100 && (e = 100), 100 === t && (e = 100), this.toFixed(e)
            }, checkMinInterval: function (t, e, i) {
                var n, o, r = this.options;
                return r.min_interval ? (n = this.calcReal(t), o = this.calcReal(e), "from" === i ? o - n < r.min_interval && (n = o - r.min_interval) : n - o < r.min_interval && (n = o + r.min_interval), this.calcPercent(n)) : t
            }, checkMaxInterval: function (t, e, i) {
                var n, o, r = this.options;
                return r.max_interval ? (n = this.calcReal(t), o = this.calcReal(e), "from" === i ? o - n > r.max_interval && (n = o - r.max_interval) : n - o > r.max_interval && (n = o + r.max_interval), this.calcPercent(n)) : t
            }, checkDiapason: function (t, e, i) {
                var n = this.calcReal(t), o = this.options;
                return "number" != typeof e && (e = o.min), "number" != typeof i && (i = o.max), e > n && (n = e), n > i && (n = i), this.calcPercent(n)
            }, toFixed: function (t) {
                return t = t.toFixed(9), +t
            }, _prettify: function (t) {
                return this.options.prettify_enabled ? this.options.prettify && "function" == typeof this.options.prettify ? this.options.prettify(t) : this.prettify(t) : t
            }, prettify: function (t) {
                var e = t.toString();
                return e.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + this.options.prettify_separator)
            }, checkEdges: function (t, e) {
                return this.options.force_edges ? (0 > t ? t = 0 : t > 100 - e && (t = 100 - e), this.toFixed(t)) : this.toFixed(t)
            }, validate: function () {
                var t, e, i = this.options, n = this.result, o = i.values, r = o.length;
                if ("string" == typeof i.min && (i.min = +i.min), "string" == typeof i.max && (i.max = +i.max), "string" == typeof i.from && (i.from = +i.from), "string" == typeof i.to && (i.to = +i.to), "string" == typeof i.step && (i.step = +i.step), "string" == typeof i.from_min && (i.from_min = +i.from_min), "string" == typeof i.from_max && (i.from_max = +i.from_max), "string" == typeof i.to_min && (i.to_min = +i.to_min), "string" == typeof i.to_max && (i.to_max = +i.to_max), "string" == typeof i.keyboard_step && (i.keyboard_step = +i.keyboard_step), "string" == typeof i.grid_num && (i.grid_num = +i.grid_num), i.max <= i.min && (i.min ? i.max = 2 * i.min : i.max = i.min + 1, i.step = 1), r)for (i.p_values = [], i.min = 0, i.max = r - 1, i.step = 1, i.grid_num = i.max, i.grid_snap = !0, e = 0; r > e; e++)t = +o[e], isNaN(t) ? t = o[e] : (o[e] = t, t = this._prettify(t)), i.p_values.push(t);
                ("number" != typeof i.from || isNaN(i.from)) && (i.from = i.min), ("number" != typeof i.to || isNaN(i.from)) && (i.to = i.max), "single" === i.type ? (i.from < i.min && (i.from = i.min), i.from > i.max && (i.from = i.max)) : ((i.from < i.min || i.from > i.max) && (i.from = i.min), (i.to > i.max || i.to < i.min) && (i.to = i.max), i.from > i.to && (i.from = i.to)), ("number" != typeof i.step || isNaN(i.step) || !i.step || i.step < 0) && (i.step = 1), ("number" != typeof i.keyboard_step || isNaN(i.keyboard_step) || !i.keyboard_step || i.keyboard_step < 0) && (i.keyboard_step = 5), "number" == typeof i.from_min && i.from < i.from_min && (i.from = i.from_min), "number" == typeof i.from_max && i.from > i.from_max && (i.from = i.from_max), "number" == typeof i.to_min && i.to < i.to_min && (i.to = i.to_min), "number" == typeof i.to_max && i.from > i.to_max && (i.to = i.to_max), n && (n.min !== i.min && (n.min = i.min), n.max !== i.max && (n.max = i.max), (n.from < n.min || n.from > n.max) && (n.from = i.from), (n.to < n.min || n.to > n.max) && (n.to = i.to)), ("number" != typeof i.min_interval || isNaN(i.min_interval) || !i.min_interval || i.min_interval < 0) && (i.min_interval = 0), ("number" != typeof i.max_interval || isNaN(i.max_interval) || !i.max_interval || i.max_interval < 0) && (i.max_interval = 0), i.min_interval && i.min_interval > i.max - i.min && (i.min_interval = i.max - i.min), i.max_interval && i.max_interval > i.max - i.min && (i.max_interval = i.max - i.min)
            }, decorate: function (t, e) {
                var i = "", n = this.options;
                return n.prefix && (i += n.prefix), i += t, n.max_postfix && (n.values.length && t === n.p_values[n.max] ? (i += n.max_postfix, n.postfix && (i += " ")) : e === n.max && (i += n.max_postfix, n.postfix && (i += " "))), n.postfix && (i += n.postfix), i
            }, updateFrom: function () {
                this.result.from = this.options.from, this.result.from_percent = this.calcPercent(this.result.from), this.options.values && (this.result.from_value = this.options.values[this.result.from])
            }, updateTo: function () {
                this.result.to = this.options.to, this.result.to_percent = this.calcPercent(this.result.to), this.options.values && (this.result.to_value = this.options.values[this.result.to])
            }, updateResult: function () {
                this.result.min = this.options.min, this.result.max = this.options.max, this.updateFrom(), this.updateTo()
            }, appendGrid: function () {
                if (this.options.grid) {
                    var t, e, i, n, o, r = this.options, s = r.max - r.min, a = r.grid_num, l = 0, c = 0, u = 4, h = 0, d = "";
                    for (this.calcGridMargin(), r.grid_snap ? (a = s / r.step, l = this.toFixed(r.step / (s / 100))) : l = this.toFixed(100 / a), a > 4 && (u = 3), a > 7 && (u = 2), a > 14 && (u = 1), a > 28 && (u = 0), t = 0; a + 1 > t; t++) {
                        for (i = u, c = this.toFixed(l * t), c > 100 && (c = 100, i -= 2, 0 > i && (i = 0)), this.coords.big[t] = c, n = (c - l * (t - 1)) / (i + 1), e = 1; i >= e && 0 !== c; e++)h = this.toFixed(c - n * e), d += '<span class="irs-grid-pol small" style="left: ' + h + '%"></span>';
                        d += '<span class="irs-grid-pol" style="left: ' + c + '%"></span>', o = this.calcReal(c), o = r.values.length ? r.p_values[o] : this._prettify(o), d += '<span class="irs-grid-text js-grid-text-' + t + '" style="left: ' + c + '%">' + o + "</span>"
                    }
                    this.coords.big_num = Math.ceil(a + 1), this.$cache.cont.addClass("irs-with-grid"), this.$cache.grid.html(d), this.cacheGridLabels()
                }
            }, cacheGridLabels: function () {
                var t, e, i = this.coords.big_num;
                for (e = 0; i > e; e++)t = this.$cache.grid.find(".js-grid-text-" + e), this.$cache.grid_labels.push(t);
                this.calcGridLabels()
            }, calcGridLabels: function () {
                var t, e, i = [], n = [], o = this.coords.big_num;
                for (t = 0; o > t; t++)this.coords.big_w[t] = this.$cache.grid_labels[t].outerWidth(!1), this.coords.big_p[t] = this.toFixed(this.coords.big_w[t] / this.coords.w_rs * 100), this.coords.big_x[t] = this.toFixed(this.coords.big_p[t] / 2), i[t] = this.toFixed(this.coords.big[t] - this.coords.big_x[t]), n[t] = this.toFixed(i[t] + this.coords.big_p[t]);
                for (this.options.force_edges && (i[0] < -this.coords.grid_gap && (i[0] = -this.coords.grid_gap, n[0] = this.toFixed(i[0] + this.coords.big_p[0]), this.coords.big_x[0] = this.coords.grid_gap), n[o - 1] > 100 + this.coords.grid_gap && (n[o - 1] = 100 + this.coords.grid_gap, i[o - 1] = this.toFixed(n[o - 1] - this.coords.big_p[o - 1]), this.coords.big_x[o - 1] = this.toFixed(this.coords.big_p[o - 1] - this.coords.grid_gap))), this.calcGridCollision(2, i, n), this.calcGridCollision(4, i, n), t = 0; o > t; t++)e = this.$cache.grid_labels[t][0], e.style.marginLeft = -this.coords.big_x[t] + "%"
            }, calcGridCollision: function (t, e, i) {
                var n, o, r, s = this.coords.big_num;
                for (n = 0; s > n && (o = n + t / 2, !(o >= s)); n += t)r = this.$cache.grid_labels[o][0], i[n] <= e[o] ? r.style.visibility = "visible" : r.style.visibility = "hidden"
            }, calcGridMargin: function () {
                this.options.grid_margin && (this.coords.w_rs = this.$cache.rs.outerWidth(!1), this.coords.w_rs && ("single" === this.options.type ? this.coords.w_handle = this.$cache.s_single.outerWidth(!1) : this.coords.w_handle = this.$cache.s_from.outerWidth(!1), this.coords.p_handle = this.toFixed(this.coords.w_handle / this.coords.w_rs * 100), this.coords.grid_gap = this.toFixed(this.coords.p_handle / 2 - .1), this.$cache.grid[0].style.width = this.toFixed(100 - this.coords.p_handle) + "%", this.$cache.grid[0].style.left = this.coords.grid_gap + "%"))
            }, update: function (e) {
                this.input && (this.is_update = !0, this.options.from = this.result.from, this.options.to = this.result.to, this.options = t.extend(this.options, e), this.validate(), this.updateResult(e), this.toggleInput(), this.remove(), this.init(!0))
            }, reset: function () {
                this.input && (this.updateResult(), this.update())
            }, destroy: function () {
                this.input && (this.toggleInput(), this.$cache.input.prop("readonly", !1), t.data(this.input, "ionRangeSlider", null), this.remove(), this.input = null, this.options = null)
            }
        }, t.fn.ionRangeSlider = function (e) {
            return this.each(function () {
                t.data(this, "ionRangeSlider") || t.data(this, "ionRangeSlider", new h(this, e, r++))
            })
        }, function () {
            for (var t = 0, e = ["ms", "moz", "webkit", "o"], n = 0; n < e.length && !i.requestAnimationFrame; ++n)i.requestAnimationFrame = i[e[n] + "RequestAnimationFrame"], i.cancelAnimationFrame = i[e[n] + "CancelAnimationFrame"] || i[e[n] + "CancelRequestAnimationFrame"];
            i.requestAnimationFrame || (i.requestAnimationFrame = function (e, n) {
                var o = (new Date).getTime(), r = Math.max(0, 16 - (o - t)), s = i.setTimeout(function () {
                    e(o + r)
                }, r);
                return t = o + r, s
            }), i.cancelAnimationFrame || (i.cancelAnimationFrame = function (t) {
                clearTimeout(t)
            })
        }()
    }(jQuery, document, window, navigator), function (t, e) {
        "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? module.exports = e(require("jquery")) : t.lightbox = e(t.jQuery)
    }(this, function (t) {
        function e(e) {
            this.album = [], this.currentImageIndex = void 0, this.init(), this.options = t.extend({}, this.constructor.defaults), this.option(e)
        }

        return e.defaults = {
            albumLabel: "Фото %1 из %2",
            alwaysShowNavOnTouchDevices: !1,
            fadeDuration: 500,
            fitImagesInViewport: !0,
            positionFromTop: 50,
            resizeDuration: 700,
            showImageNumberLabel: !0,
            wrapAround: !1
        }, e.prototype.option = function (e) {
            t.extend(this.options, e)
        }, e.prototype.imageCountLabel = function (t, e) {
            return this.options.albumLabel.replace(/%1/g, t).replace(/%2/g, e)
        }, e.prototype.init = function () {
            this.enable(), this.build()
        }, e.prototype.enable = function () {
            var e = this;
            t("body").on("click", "a[rel^=lightbox], area[rel^=lightbox], a[data-lightbox], area[data-lightbox]", function (i) {
                return e.start(t(i.currentTarget)), !1
            })
        }, e.prototype.build = function () {
            var e = this;
            t('<div id="lightboxOverlay" class="lightboxOverlay"></div><div id="lightbox" class="lightbox"><div class="lb-outerContainer"><div class="lb-container"><img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" /><div class="lb-nav"><a class="lb-prev" href="" ></a><a class="lb-next" href="" ></a></div><div class="lb-loader"><a class="lb-cancel"></a></div></div></div><div class="lb-dataContainer"><div class="lb-data"><div class="lb-details"><span class="lb-caption"></span><span class="lb-number"></span></div><div class="lb-closeContainer"><a class="lb-close"></a></div></div></div></div>').appendTo(t("body")), this.$lightbox = t("#lightbox"), this.$overlay = t("#lightboxOverlay"), this.$outerContainer = this.$lightbox.find(".lb-outerContainer"), this.$container = this.$lightbox.find(".lb-container"), this.containerTopPadding = parseInt(this.$container.css("padding-top"), 10), this.containerRightPadding = parseInt(this.$container.css("padding-right"), 10), this.containerBottomPadding = parseInt(this.$container.css("padding-bottom"), 10), this.containerLeftPadding = parseInt(this.$container.css("padding-left"), 10), this.$overlay.hide().on("click", function () {
                return e.end(), !1
            }), this.$lightbox.hide().on("click", function (i) {
                return "lightbox" === t(event.target).attr("id") && e.end(), !1
            }), this.$outerContainer.on("click", function (i) {
                return "lightbox" === t(i.target).attr("id") && e.end(), !1
            }), this.$lightbox.find(".lb-prev").on("click", function () {
                return 0 === e.currentImageIndex ? e.changeImage(e.album.length - 1) : e.changeImage(e.currentImageIndex - 1), !1
            }), this.$lightbox.find(".lb-next").on("click", function () {
                return e.currentImageIndex === e.album.length - 1 ? e.changeImage(0) : e.changeImage(e.currentImageIndex + 1), !1
            }), this.$lightbox.find(".lb-loader, .lb-close").on("click", function () {
                return e.end(), !1
            })
        }, e.prototype.start = function (e) {
            function i(t) {
                n.album.push({link: t.attr("href"), title: t.attr("data-title") || t.attr("title")})
            }

            var n = this, o = t(window);
            o.on("resize", t.proxy(this.sizeOverlay, this)), t("select, object, embed").css({visibility: "hidden"}), this.sizeOverlay(), this.album = [];
            var r, s = 0, a = e.attr("data-lightbox");
            if (a) {
                r = t(e.prop("tagName") + '[data-lightbox="' + a + '"]');
                for (var l = 0; l < r.length; l = ++l)i(t(r[l])), r[l] === e[0] && (s = l)
            } else if ("lightbox" === e.attr("rel"))i(e); else {
                r = t(e.prop("tagName") + '[rel="' + e.attr("rel") + '"]');
                for (var c = 0; c < r.length; c = ++c)i(t(r[c])), r[c] === e[0] && (s = c)
            }
            var u = o.scrollTop() + this.options.positionFromTop, h = o.scrollLeft();
            this.$lightbox.css({top: u + "px", left: h + "px"}).fadeIn(this.options.fadeDuration), this.changeImage(s)
        }, e.prototype.changeImage = function (e) {
            var i = this;
            this.disableKeyboardNav();
            var n = this.$lightbox.find(".lb-image");
            this.$overlay.fadeIn(this.options.fadeDuration), t(".lb-loader").fadeIn("slow"), this.$lightbox.find(".lb-image, .lb-nav, .lb-prev, .lb-next, .lb-dataContainer, .lb-numbers, .lb-caption").hide(), this.$outerContainer.addClass("animating");
            var o = new Image;
            o.onload = function () {
                var r, s, a, l, c, u, h;
                n.attr("src", i.album[e].link), r = t(o), n.width(o.width), n.height(o.height), i.options.fitImagesInViewport && (h = t(window).width(), u = t(window).height(), c = h - i.containerLeftPadding - i.containerRightPadding - 20, l = u - i.containerTopPadding - i.containerBottomPadding - 120, i.options.maxWidth && i.options.maxWidth < c && (c = i.options.maxWidth), i.options.maxHeight && i.options.maxHeight < c && (l = i.options.maxHeight), (o.width > c || o.height > l) && (o.width / c > o.height / l ? (a = c, s = parseInt(o.height / (o.width / a), 10), n.width(a), n.height(s)) : (s = l, a = parseInt(o.width / (o.height / s), 10), n.width(a), n.height(s)))), i.sizeContainer(n.width(), n.height())
            }, o.src = this.album[e].link, this.currentImageIndex = e
        }, e.prototype.sizeOverlay = function () {
            this.$overlay.width(t(window).width()).height(t(document).height())
        }, e.prototype.sizeContainer = function (t, e) {
            function i() {
                n.$lightbox.find(".lb-dataContainer").width(s), n.$lightbox.find(".lb-prevLink").height(a), n.$lightbox.find(".lb-nextLink").height(a), n.showImage()
            }

            var n = this, o = this.$outerContainer.outerWidth(), r = this.$outerContainer.outerHeight(), s = t + this.containerLeftPadding + this.containerRightPadding, a = e + this.containerTopPadding + this.containerBottomPadding;
            o !== s || r !== a ? this.$outerContainer.animate({
                width: s,
                height: a
            }, this.options.resizeDuration, "swing", function () {
                i()
            }) : i()
        }, e.prototype.showImage = function () {
            this.$lightbox.find(".lb-loader").stop(!0).hide(), this.$lightbox.find(".lb-image").fadeIn("slow"), this.updateNav(), this.updateDetails(), this.preloadNeighboringImages(), this.enableKeyboardNav()
        }, e.prototype.updateNav = function () {
            var t = !1;
            try {
                document.createEvent("TouchEvent"), t = this.options.alwaysShowNavOnTouchDevices ? !0 : !1
            } catch (e) {
            }
            this.$lightbox.find(".lb-nav").show(), this.album.length > 1 && (this.options.wrapAround ? (t && this.$lightbox.find(".lb-prev, .lb-next").css("opacity", "1"), this.$lightbox.find(".lb-prev, .lb-next").show()) : (this.currentImageIndex > 0 && (this.$lightbox.find(".lb-prev").show(), t && this.$lightbox.find(".lb-prev").css("opacity", "1")), this.currentImageIndex < this.album.length - 1 && (this.$lightbox.find(".lb-next").show(), t && this.$lightbox.find(".lb-next").css("opacity", "1"))))
        }, e.prototype.updateDetails = function () {
            var e = this;
            if ("undefined" != typeof this.album[this.currentImageIndex].title && "" !== this.album[this.currentImageIndex].title && this.$lightbox.find(".lb-caption").html(this.album[this.currentImageIndex].title).fadeIn("fast").find("a").on("click", function (e) {
                    void 0 !== t(this).attr("target") ? window.open(t(this).attr("href"), t(this).attr("target")) : location.href = t(this).attr("href")
                }), this.album.length > 1 && this.options.showImageNumberLabel) {
                var i = this.imageCountLabel(this.currentImageIndex + 1, this.album.length);
                this.$lightbox.find(".lb-number").text(i).fadeIn("fast")
            } else this.$lightbox.find(".lb-number").hide();
            this.$outerContainer.removeClass("animating"), this.$lightbox.find(".lb-dataContainer").fadeIn(this.options.resizeDuration, function () {
                return e.sizeOverlay()
            })
        }, e.prototype.preloadNeighboringImages = function () {
            if (this.album.length > this.currentImageIndex + 1) {
                var t = new Image;
                t.src = this.album[this.currentImageIndex + 1].link
            }
            if (this.currentImageIndex > 0) {
                var e = new Image;
                e.src = this.album[this.currentImageIndex - 1].link
            }
        }, e.prototype.enableKeyboardNav = function () {
            t(document).on("keyup.keyboard", t.proxy(this.keyboardAction, this))
        }, e.prototype.disableKeyboardNav = function () {
            t(document).off(".keyboard")
        }, e.prototype.keyboardAction = function (t) {
            var e = 27, i = 37, n = 39, o = t.keyCode, r = String.fromCharCode(o).toLowerCase();
            o === e || r.match(/x|o|c/) ? this.end() : "p" === r || o === i ? 0 !== this.currentImageIndex ? this.changeImage(this.currentImageIndex - 1) : this.options.wrapAround && this.album.length > 1 && this.changeImage(this.album.length - 1) : ("n" === r || o === n) && (this.currentImageIndex !== this.album.length - 1 ? this.changeImage(this.currentImageIndex + 1) : this.options.wrapAround && this.album.length > 1 && this.changeImage(0))
        }, e.prototype.end = function () {
            this.disableKeyboardNav(), t(window).off("resize", this.sizeOverlay), this.$lightbox.fadeOut(this.options.fadeDuration), this.$overlay.fadeOut(this.options.fadeDuration), t("select, object, embed").css({visibility: "visible"})
        }, new e
    }), function (t, e, i, n) {
        function o(n, o) {
            var r = this;
            return r.options = t.extend({}, a, o), r.parent = n, r.wrapper = r.parent.children(), r.slides = r.wrapper.children(), r.currentSlide = 0, r.CSS3support = !0, r.options.beforeInit.call(r), r.init(), r.build(), r.play(), r.options.touchDistance && r.swipe(), r.options.keyboard && t(i).on("keyup", function (t) {
                39 === t.keyCode && r.slide(1), 37 === t.keyCode && r.slide(-1)
            }), r.options.hoverpause && r.parent.add(r.arrows).add(r.nav).on("mouseover mouseout", function (t) {
                r.pause(), "mouseout" === t.type && r.play()
            }), t(e).on("resize", function () {
                r.init(), r.slide(0)
            }), r.options.afterInit.call(r), {
                current: function () {
                    return -r.currentSlide + 1
                }, play: function () {
                    r.play()
                }, pause: function () {
                    r.pause()
                }, next: function (t) {
                    r.slide(1, !1, t)
                }, prev: function (t) {
                    r.slide(-1, !1, t)
                }, jump: function (t, e) {
                    r.slide(t - 1, !0, e)
                }, nav: function (t) {
                    r.navWrapper && r.navWrapper.remove(), r.options.nav = t ? t : r.options.nav, r.navigation()
                }, arrows: function (t) {
                    r.arrowsWrapper && r.arrowsWrapper.remove(), r.options.arrows = t ? t : r.options.arrows, r.arrows()
                }
            }
        }

        function r(t) {
            var o = !1, r = "Khtml ms O Moz Webkit".split(" "), s = i.createElement("div"), a = null;
            if (t = t.toLowerCase(), s.style[t] !== n && (o = !0), o === !1) {
                a = t.charAt(0).toUpperCase() + t.substr(1);
                for (var l = 0; l < r.length; l++)if (s.style[r[l] + a] !== n) {
                    o = !0;
                    break
                }
            }
            return e.opera && e.opera.version() < 13 && (o = !1), o
        }

        var s = "glide", a = {
            autoplay: 4e3,
            hoverpause: !1,
            animationTime: 2e3,
            arrows: !0,
            arrowsWrapperClass: "slider-arrows",
            arrowMainClass: "slider-arrow",
            arrowRightClass: "slider-arrow--right",
            arrowRightText: '<img src="/frontend/images/arrow-next.png" />',
            arrowLeftClass: "slider-arrow--left",
            arrowLeftText: '<img src="/frontend/images/arrow-prev.png" />',
            nav: !0,
            navCenter: !0,
            navClass: "slider-nav",
            navItemClass: "slider-nav__item",
            navCurrentItemClass: "slider-nav__item--current",
            keyboard: !0,
            touchDistance: 60,
            beforeInit: function () {
            },
            afterInit: function () {
            },
            beforeTransition: function () {
            },
            afterTransition: function () {
            }
        };
        o.prototype.build = function () {
            var t = this;
            t.options.arrows && t.arrows(), t.options.nav && t.navigation()
        }, o.prototype.navigation = function () {
            var e = this;
            if (e.slides.length > 1) {
                var i = e.options, n = e.options.nav === !0 ? e.parent : e.options.nav;
                e.navWrapper = t("<div />", {"class": i.navClass}).appendTo(n);
                for (var o, r = e.navWrapper, s = 0; s < e.slides.length; s++)o = t("<a />", {
                    href: "#",
                    "class": i.navItemClass,
                    "data-distance": s
                }).appendTo(r), r[s + 1] = o;
                var a = r.children();
                a.eq(0).addClass(i.navCurrentItemClass), i.navCenter && r.css({
                    left: "50%",
                    width: a.outerWidth(!0) * a.length,
                    "margin-left": -r.outerWidth(!0) / 2
                }), a.on("click touchstart", function (i) {
                    i.preventDefault(), e.slide(t(this).data("distance"), !0)
                })
            }
        }, o.prototype.arrows = function () {
            var e = this;
            if (e.slides.length > 1) {
                var i = e.options, n = e.options.arrows === !0 ? e.parent : e.options.arrows;
                e.arrowsWrapper = t("<div />", {"class": i.arrowsWrapperClass}).appendTo(n);
                var o = e.arrowsWrapper;
                o.right = t("<a />", {
                    href: "#",
                    "class": i.arrowMainClass + " " + i.arrowRightClass,
                    "data-distance": "1",
                    html: i.arrowRightText
                }).appendTo(o), o.left = t("<a />", {
                    href: "#",
                    "class": i.arrowMainClass + " " + i.arrowLeftClass,
                    "data-distance": "-1",
                    html: i.arrowLeftText
                }).appendTo(o), o.children().on("click touchstart", function (i) {
                    i.preventDefault(), e.slide(t(this).data("distance"), !1)
                })
            }
        }, o.prototype.slide = function (t, e, i) {
            var n = this;
            n.pause(), n.options.beforeTransition.call(n);
            var o = e ? 0 : n.currentSlide, r = -(n.slides.length - 1), s = n.options.navCurrentItemClass, a = n.slides.spread;
            0 === o && -1 === t ? o = r : o === r && 1 === t ? o = 0 : o += -t;
            var l = a * o + "px";
            n.CSS3support ? n.wrapper.css({
                "-webkit-transform": "translate3d(" + l + ", 0px, 0px)",
                "-moz-transform": "translate3d(" + l + ", 0px, 0px)",
                "-ms-transform": "translate3d(" + l + ", 0px, 0px)",
                "-o-transform": "translate3d(" + l + ", 0px, 0px)",
                transform: "translate3d(" + l + ", 0px, 0px)"
            }) : n.wrapper.stop().animate({"margin-left": l}, n.options.animationTime), n.options.nav && n.navWrapper && n.navWrapper.children().eq(-o).addClass(s).siblings().removeClass(s), n.currentSlide = o, n.options.afterTransition.call(n), "undefined" !== i && "function" == typeof i && i(), n.play()
        }, o.prototype.play = function () {
            var t = this;
            t.options.autoplay && (t.auto = setInterval(function () {
                t.slide(1, !1)
            }, t.options.autoplay))
        }, o.prototype.pause = function () {
            var t = this;
            t.options.autoplay && (t.auto = clearInterval(t.auto))
        }, o.prototype.swipe = function () {
            var t, e, i, n, o, r, s, a, l, c, u, h, d, p = this, f = 180 / Math.PI;
            p.parent.on("touchstart", function (e) {
                t = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0], i = t.pageX, n = t.pageY
            }), p.parent.on("touchmove", function (e) {
                t = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0], o = t.pageX, r = t.pageY, c = o - i, u = r - n, h = Math.abs(c << 2), d = Math.abs(u << 2), s = Math.sqrt(h + d), a = Math.sqrt(d), l = Math.asin(a / s), 32 > l * f && e.preventDefault()
            }), p.parent.on("touchend", function (n) {
                t = n.originalEvent.touches[0] || n.originalEvent.changedTouches[0], e = t.pageX - i, e > p.options.touchDistance ? p.slide(-1) : e < -p.options.touchDistance && p.slide(1)
            })
        }, o.prototype.init = function () {
            var t = this, e = t.parent.width();
            t.slides.spread = e, t.wrapper.width(e * t.slides.length), t.slides.width(t.slides.spread), r("transition") && r("transform") || (t.CSS3support = !1)
        }, t.fn[s] = function (e) {
            return this.each(function () {
                t.data(this, "api_" + s) || t.data(this, "api_" + s, new o(t(this), e))
            })
        }
    }(jQuery, window, document), function () {
        var t, e, i, n, o, r = function (t, e) {
            return function () {
                return t.apply(e, arguments)
            }
        }, s = [].indexOf || function (t) {
                for (var e = 0, i = this.length; i > e; e++)if (e in this && this[e] === t)return e;
                return -1
            };
        e = function () {
            function t() {
            }

            return t.prototype.extend = function (t, e) {
                var i, n;
                for (i in e)n = e[i], null == t[i] && (t[i] = n);
                return t
            }, t.prototype.isMobile = function (t) {
                return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(t)
            }, t.prototype.createEvent = function (t, e, i, n) {
                var o;
                return null == e && (e = !1), null == i && (i = !1), null == n && (n = null), null != document.createEvent ? (o = document.createEvent("CustomEvent"), o.initCustomEvent(t, e, i, n)) : null != document.createEventObject ? (o = document.createEventObject(), o.eventType = t) : o.eventName = t, o
            }, t.prototype.emitEvent = function (t, e) {
                return null != t.dispatchEvent ? t.dispatchEvent(e) : e in(null != t) ? t[e]() : "on" + e in(null != t) ? t["on" + e]() : void 0
            }, t.prototype.addEvent = function (t, e, i) {
                return null != t.addEventListener ? t.addEventListener(e, i, !1) : null != t.attachEvent ? t.attachEvent("on" + e, i) : t[e] = i
            }, t.prototype.removeEvent = function (t, e, i) {
                return null != t.removeEventListener ? t.removeEventListener(e, i, !1) : null != t.detachEvent ? t.detachEvent("on" + e, i) : delete t[e]
            }, t.prototype.innerHeight = function () {
                return "innerHeight"in window ? window.innerHeight : document.documentElement.clientHeight
            }, t
        }(), i = this.WeakMap || this.MozWeakMap || (i = function () {
            function t() {
                this.keys = [], this.values = []
            }

            return t.prototype.get = function (t) {
                var e, i, n, o, r;
                for (r = this.keys, e = n = 0, o = r.length; o > n; e = ++n)if (i = r[e], i === t)return this.values[e]
            }, t.prototype.set = function (t, e) {
                var i, n, o, r, s;
                for (s = this.keys, i = o = 0, r = s.length; r > o; i = ++o)if (n = s[i], n === t)return void(this.values[i] = e);
                return this.keys.push(t), this.values.push(e)
            }, t
        }()), t = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (t = function () {
            function t() {
                "undefined" != typeof console && null !== console && console.warn("MutationObserver is not supported by your browser."), "undefined" != typeof console && null !== console && console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.")
            }

            return t.notSupported = !0, t.prototype.observe = function () {
            }, t
        }()), n = this.getComputedStyle || function (t) {
            return this.getPropertyValue = function (e) {
                var i;
                return "float" === e && (e = "styleFloat"), o.test(e) && e.replace(o, function (t, e) {
                    return e.toUpperCase()
                }), (null != (i = t.currentStyle) ? i[e] : void 0) || null
            }, this
        }, o = /(\-([a-z]){1})/g, this.WOW = function () {
            function o(t) {
                null == t && (t = {}), this.scrollCallback = r(this.scrollCallback, this), this.scrollHandler = r(this.scrollHandler, this), this.resetAnimation = r(this.resetAnimation, this), this.start = r(this.start, this), this.scrolled = !0, this.config = this.util().extend(t, this.defaults), this.animationNameCache = new i, this.wowEvent = this.util().createEvent(this.config.boxClass)
            }

            return o.prototype.defaults = {
                boxClass: "wow",
                animateClass: "animated",
                offset: 0,
                mobile: !0,
                live: !0,
                callback: null
            }, o.prototype.init = function () {
                var t;
                return this.element = window.document.documentElement, "interactive" === (t = document.readyState) || "complete" === t ? this.start() : this.util().addEvent(document, "DOMContentLoaded", this.start), this.finished = []
            }, o.prototype.start = function () {
                var e, i, n, o;
                if (this.stopped = !1, this.boxes = function () {
                        var t, i, n, o;
                        for (n = this.element.querySelectorAll("." + this.config.boxClass), o = [], t = 0, i = n.length; i > t; t++)e = n[t], o.push(e);
                        return o
                    }.call(this), this.all = function () {
                        var t, i, n, o;
                        for (n = this.boxes, o = [], t = 0, i = n.length; i > t; t++)e = n[t], o.push(e);
                        return o
                    }.call(this), this.boxes.length)if (this.disabled())this.resetStyle(); else for (o = this.boxes, i = 0, n = o.length; n > i; i++)e = o[i], this.applyStyle(e, !0);
                return this.disabled() || (this.util().addEvent(window, "scroll", this.scrollHandler), this.util().addEvent(window, "resize", this.scrollHandler), this.interval = setInterval(this.scrollCallback, 50)), this.config.live ? new t(function (t) {
                    return function (e) {
                        var i, n, o, r, s;
                        for (s = [], i = 0, n = e.length; n > i; i++)r = e[i], s.push(function () {
                            var t, e, i, n;
                            for (i = r.addedNodes || [], n = [], t = 0, e = i.length; e > t; t++)o = i[t], n.push(this.doSync(o));
                            return n
                        }.call(t));
                        return s
                    }
                }(this)).observe(document.body, {childList: !0, subtree: !0}) : void 0
            }, o.prototype.stop = function () {
                return this.stopped = !0, this.util().removeEvent(window, "scroll", this.scrollHandler), this.util().removeEvent(window, "resize", this.scrollHandler), null != this.interval ? clearInterval(this.interval) : void 0
            }, o.prototype.sync = function () {
                return t.notSupported ? this.doSync(this.element) : void 0
            }, o.prototype.doSync = function (t) {
                var e, i, n, o, r;
                if (null == t && (t = this.element), 1 === t.nodeType) {
                    for (t = t.parentNode || t, o = t.querySelectorAll("." + this.config.boxClass), r = [], i = 0, n = o.length; n > i; i++)e = o[i], s.call(this.all, e) < 0 ? (this.boxes.push(e), this.all.push(e), this.stopped || this.disabled() ? this.resetStyle() : this.applyStyle(e, !0), r.push(this.scrolled = !0)) : r.push(void 0);
                    return r
                }
            }, o.prototype.show = function (t) {
                return this.applyStyle(t), t.className = t.className + " " + this.config.animateClass, null != this.config.callback && this.config.callback(t), this.util().emitEvent(t, this.wowEvent), this.util().addEvent(t, "animationend", this.resetAnimation), this.util().addEvent(t, "oanimationend", this.resetAnimation), this.util().addEvent(t, "webkitAnimationEnd", this.resetAnimation), this.util().addEvent(t, "MSAnimationEnd", this.resetAnimation), t
            }, o.prototype.applyStyle = function (t, e) {
                var i, n, o;
                return n = t.getAttribute("data-wow-duration"), i = t.getAttribute("data-wow-delay"), o = t.getAttribute("data-wow-iteration"), this.animate(function (r) {
                    return function () {
                        return r.customStyle(t, e, n, i, o)
                    }
                }(this))
            }, o.prototype.animate = function () {
                return "requestAnimationFrame"in window ? function (t) {
                    return window.requestAnimationFrame(t)
                } : function (t) {
                    return t()
                }
            }(), o.prototype.resetStyle = function () {
                var t, e, i, n, o;
                for (n = this.boxes, o = [], e = 0, i = n.length; i > e; e++)t = n[e], o.push(t.style.visibility = "visible");
                return o
            }, o.prototype.resetAnimation = function (t) {
                var e;
                return t.type.toLowerCase().indexOf("animationend") >= 0 ? (e = t.target || t.srcElement, e.className = e.className.replace(this.config.animateClass, "").trim()) : void 0
            }, o.prototype.customStyle = function (t, e, i, n, o) {
                return e && this.cacheAnimationName(t), t.style.visibility = e ? "hidden" : "visible", i && this.vendorSet(t.style, {animationDuration: i}), n && this.vendorSet(t.style, {animationDelay: n}), o && this.vendorSet(t.style, {animationIterationCount: o}), this.vendorSet(t.style, {animationName: e ? "none" : this.cachedAnimationName(t)}), t
            }, o.prototype.vendors = ["moz", "webkit"], o.prototype.vendorSet = function (t, e) {
                var i, n, o, r;
                n = [];
                for (i in e)o = e[i], t["" + i] = o, n.push(function () {
                    var e, n, s, a;
                    for (s = this.vendors, a = [], e = 0, n = s.length; n > e; e++)r = s[e], a.push(t["" + r + i.charAt(0).toUpperCase() + i.substr(1)] = o);
                    return a
                }.call(this));
                return n
            }, o.prototype.vendorCSS = function (t, e) {
                var i, o, r, s, a, l;
                for (a = n(t), s = a.getPropertyCSSValue(e), r = this.vendors, i = 0, o = r.length; o > i; i++)l = r[i], s = s || a.getPropertyCSSValue("-" + l + "-" + e);
                return s
            }, o.prototype.animationName = function (t) {
                var e;
                try {
                    e = this.vendorCSS(t, "animation-name").cssText
                } catch (i) {
                    e = n(t).getPropertyValue("animation-name")
                }
                return "none" === e ? "" : e
            }, o.prototype.cacheAnimationName = function (t) {
                return this.animationNameCache.set(t, this.animationName(t))
            }, o.prototype.cachedAnimationName = function (t) {
                return this.animationNameCache.get(t)
            }, o.prototype.scrollHandler = function () {
                return this.scrolled = !0
            }, o.prototype.scrollCallback = function () {
                var t;
                return !this.scrolled || (this.scrolled = !1, this.boxes = function () {
                    var e, i, n, o;
                    for (n = this.boxes, o = [], e = 0, i = n.length; i > e; e++)t = n[e], t && (this.isVisible(t) ? this.show(t) : o.push(t));
                    return o
                }.call(this), this.boxes.length || this.config.live) ? void 0 : this.stop()
            }, o.prototype.offsetTop = function (t) {
                for (var e; void 0 === t.offsetTop;)t = t.parentNode;
                for (e = t.offsetTop; t = t.offsetParent;)e += t.offsetTop;
                return e
            }, o.prototype.isVisible = function (t) {
                var e, i, n, o, r;
                return i = t.getAttribute("data-wow-offset") || this.config.offset, r = window.pageYOffset, o = r + Math.min(this.element.clientHeight, this.util().innerHeight()) - i, n = this.offsetTop(t), e = n + t.clientHeight, o >= n && e >= r
            }, o.prototype.util = function () {
                return null != this._util ? this._util : this._util = new e
            }, o.prototype.disabled = function () {
                return !this.config.mobile && this.util().isMobile(navigator.userAgent)
            }, o
        }()
    }.call(this), function (t) {
        t.rating = function (e, i) {
            this.options = t.extend({
                fx: "float",
                image: "/images/stars.png",
                stars: 5,
                minimal: 0,
                titles: ["голос", "голоса", "голосов"],
                readOnly: !1,
                url: "",
                type: "post",
                loader: "/images/ajax-loader.gif",
                click: function () {
                },
                callback: function () {
                }
            }, i || {}), this.el = t(e), this.left = 0, this.width = 0, this.height = 0, this._data = {};
            var n = this;
            this.el.find(":hidden").each(function () {
                var e = t(this);
                n._data[e.attr("name")] = e.val()
            }), this._data.val = parseFloat(this._data.val) || 0, this._data.votes = parseFloat(this._data.votes) || "", this._data.val > this.options.stars && (this._data.val = this.options.stars), this._data.val < 0 && (this._data.val = 0), this.old = this._data.val, this.vote_wrap = t('<div class="vote-wrap"></div>'), this.vote_block = t('<div class="vote-block"></div>'), this.vote_hover = t('<div class="vote-hover"></div>'), this.vote_stars = t('<div class="vote-stars"></div>'), this.vote_active = t('<div class="vote-active"></div>'), this.vote_result = t('<div class="vote-result"></div>'), this.vote_success = t('<div class="vote-success"></div>'), this.loader = t('<img src="' + this.options.loader + '" alt="load...">'), this.el.html(this.loader);
            var o = new Image;
            o.src = this.options.image, o.onload = function () {
                n.width = this.width, n.height = this.height / 3, n.init()
            }
        };
        var e = t.rating;
        e.fn = e.prototype = {rating: "2.0"}, e.fn.extend = e.extend = t.extend, e.fn.extend({
            init: function () {
                if (this.render(), !this.options.readOnly) {
                    var e = this, i = 0, n = 0;
                    this.vote_hover.bind("mousemove mouseover", function (o) {
                        if (!e.options.readOnly) {
                            var r = t(this), s = 0;
                            i = o.clientX > 0 ? o.clientX : o.pageX, n = i - r.offset().left - 2;
                            var a = e.width * e.options.stars, l = e.options.minimal * e.width;
                            n > a && (n = a), l > n && (n = l), s = Math.round(n / e.width * 10) / 10, "half" == e.options.fx ? n = Math.ceil(n / e.width * 2) * e.width / 2 : "float" != e.options.fx && (n = Math.ceil(n / e.width) * e.width), s = Math.round(n / e.width * 10) / 10, e.vote_active.css({
                                width: n,
                                "background-position": "left center"
                            }), e.vote_success.html("Ваша оценка:" + s)
                        }
                    }).bind("mouseout", function () {
                        e.options.readOnly || (e.reset(), e.vote_success.empty())
                    }).bind("click.rating", function () {
                        if (!e.options.readOnly) {
                            var t = Math.round(n / e.width * 10) / 10;
                            t > e.options.stars && (t = e.options.stars), 0 > t && (t = 0), e.old = e._data.val, e._data.val = (e._data.val * e._data.votes + t) / (e._data.votes + 1), e._data.val = Math.round(100 * e._data.val) / 100, e._data.score = t, e.vote_success.html("Ваша оценка:" + t), "" != e.options.url && e.send(), e.options.readOnly = !0, e.options.click.apply(this, [t])
                        }
                    })
                }
            }, set: function () {
                this.vote_active.css({width: this._data.val * this.width, "background-position": "left bottom"})
            }, reset: function () {
                this.vote_active.css({width: this.old * this.width, "background-position": "left bottom"})
            }, setvoters: function () {
                this.vote_result.html(this.declOfNum(this._data.votes))
            }, render: function () {
                this.el.html(this.vote_wrap.append(this.vote_hover.css({
                    padding: "0 4px",
                    height: this.height,
                    width: this.width * this.options.stars
                }), this.vote_result.text(this.declOfNum(this._data.votes)), this.vote_success)), this.vote_block.append(this.vote_stars.css({
                    height: this.height,
                    width: this.width * this.options.stars,
                    background: "url('" + this.options.image + "') left top"
                }), this.vote_active.css({
                    height: this.height,
                    width: this._data.val * this.width,
                    background: "url('" + this.options.image + "') left bottom"
                })).appendTo(this.vote_hover)
            }, send: function (e) {
                var i = this;
                this.vote_result.html(this.loader), this._data.votes++, t.ajax({
                    url: i.options.url,
                    type: i.options.type,
                    data: this._data,
                    dataType: "json",
                    success: function (t) {
                        "OK" == t.status ? i.set() : (i._data.votes--, i.reset()), i.setvoters(), t.msg && i.vote_success.html(t.msg), "function" == typeof i.options.callback && i.options.callback.apply(i, [t])
                    }
                })
            }, declOfNum: function (t) {
                return 0 >= t ? "" : (t = Math.abs(Math.floor(t)), cases = [2, 0, 1, 1, 1, 2], t + " " + this.options.titles[t % 100 > 4 && 20 > t % 100 ? 2 : cases[5 > t % 10 ? t % 10 : 5]])
            }
        }), t.fn.rating = function (i) {
            if ("string" == typeof i) {
                var n = t(this).data("rating"), o = Array.prototype.slice.call(arguments, 1);
                return n[i].apply(n, o)
            }
            return this.each(function () {
                var n = t(this).data("rating");
                n ? (i && t.extend(n.options, i), n.init()) : t(this).data("rating", new e(this, i))
            })
        }
    }(jQuery), function (t) {
        t(function () {
            t(function () {
                initRating()
            }), t(document).ready(function () {
                t(".modal-trigger").leanModal(), t(".tabs-wrapper").pushpin({top: t(".tabs-wrapper").offset().top}), t(".collapsible").collapsible({accordion: !1});
                t(".slider2").glide().data("api_glide");
                t(".slider2").glide({autoplay: 1e4}), t(".slider2").css("display", "block"), t("select").material_select(), t("ul.tabs").tabs()
            }), t(".button-collapse").sideNav({menuWidth: 300}), t(window).on("keyup", function (t) {
                13 === t.keyCode && glide.jump(3, console.log("Wooo!"))
            }), t(".slider-arrow").on("click", function () {
                console.log(glide.current())
            }), (new WOW).init(), jQuery(document).ready(function (t) {
                function e() {
                    t(window).scrollTop() > 300 ? n.fadeIn(600) : n.fadeOut(600)
                }

                t("<style>.scrollTop{ display:none; z-index:9999; position:fixed;bottom:30px; right:2%; width:50px; height:50px;background:url(/frontend/images/arrows-top.png) 0 0 no-repeat; }.scrollTop:hover{ background-position:0 -60px;}</style>").appendTo("body");
                var i = 500, n = t('<a href="#" class="scrollTop">').appendTo("body");
                n.click(function (e) {
                    e.preventDefault(), t("html:not(:animated),body:not(:animated)").animate({scrollTop: 0}, i)
                }), t(window).scroll(function () {
                    e()
                }), e()
            }),  t(".vertical-crousel").slick({
                infinite: !1,
                vertical: !0,
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: !1,
                responsive: [{breakpoint: 1155, settings: {slidesToShow: 4, slidesToScroll: 1}}]
            }), t(".related-products").slick({
                dots: !0,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: !0,
                autoplaySpeed: 2e3,
                responsive: [{
                    breakpoint: 1200,
                    settings: {slidesToShow: 4, slidesToScroll: 3, infinite: !0, dots: !0}
                }, {breakpoint: 600, settings: {slidesToShow: 2, slidesToScroll: 2}}, {
                    breakpoint: 480,
                    settings: {slidesToShow: 1, slidesToScroll: 1}
                }]
            })
        })
    }(jQuery);