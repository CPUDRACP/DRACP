/*
 Highcharts JS v10.3.2 (2022-11-29)

 Old IE (v6, v7, v8) module for Highcharts v6+.

 (c) 2010-2021 Highsoft AS
 Author: Torstein Honsi

 License: www.highcharts.com/license
*/
(function(c){"object"===typeof module&&module.exports?(c["default"]=c,module.exports=c):"function"===typeof define&&define.amd?define("highcharts/modules/oldie",["highcharts"],function(q){c(q);c.Highcharts=q;return c}):c("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(c){function q(c,m,t,e){c.hasOwnProperty(m)||(c[m]=e.apply(null,t),"function"===typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:m,module:c[m]}})))}c=c?c._modules:{};q(c,"Extensions/Oldie/VMLAxis3D.js",
[c["Core/Utilities.js"]],function(c){var p=c.addEvent,t=function(){return function(c){this.axis=c}}();return function(){function c(){}c.compose=function(r){r.keepProps.push("vml");p(r,"destroy",c.onDestroy);p(r,"init",c.onInit);p(r,"render",c.onRender)};c.onDestroy=function(){var c=this.vml;if(c){var p;["backFrame","bottomFrame","sideFrame"].forEach(function(r){(p=c[r])&&(c[r]=p.destroy())},this)}};c.onInit=function(){this.vml||(this.vml=new t(this))};c.onRender=function(){var c=this.vml;c.sideFrame&&
(c.sideFrame.css({zIndex:0}),c.sideFrame.front.attr({fill:c.sideFrame.color}));c.bottomFrame&&(c.bottomFrame.css({zIndex:1}),c.bottomFrame.front.attr({fill:c.bottomFrame.color}));c.backFrame&&(c.backFrame.css({zIndex:0}),c.backFrame.front.attr({fill:c.backFrame.color}))};return c}()});q(c,"Extensions/Oldie/VMLRenderer3D.js",[c["Core/Axis/Axis.js"],c["Core/Defaults.js"],c["Extensions/Oldie/VMLAxis3D.js"]],function(c,m,t){var p=m.setOptions;return function(){function e(){}e.compose=function(e,m){var h=
m.prototype;e=e.prototype;p({animate:!1});e.face3d=h.face3d;e.polyhedron=h.polyhedron;e.elements3d=h.elements3d;e.element3d=h.element3d;e.cuboid=h.cuboid;e.cuboidPath=h.cuboidPath;e.toLinePath=h.toLinePath;e.toLineSegments=h.toLineSegments;e.arc3d=function(c){c=h.arc3d.call(this,c);c.css({zIndex:c.zIndex});return c};e.arc3dPath=h.arc3dPath;t.compose(c)};return e}()});q(c,"Extensions/Oldie/Oldie.js",[c["Core/Chart/Chart.js"],c["Core/Color/Color.js"],c["Core/Defaults.js"],c["Core/Globals.js"],c["Core/Pointer.js"],
c["Core/Renderer/RendererRegistry.js"],c["Core/Renderer/SVG/SVGElement.js"],c["Core/Renderer/SVG/SVGRenderer.js"],c["Core/Utilities.js"],c["Extensions/Oldie/VMLRenderer3D.js"]],function(c,m,t,e,r,q,y,h,k,P){var p=m.parse,N=t.getOptions,v=e.deg2rad,g=e.doc;t=e.noop;var D=e.svg,w=e.win,Q=k.addEvent,E=k.createElement,B=k.css,G=k.defined,H=k.discardElement,I=k.erase,x=k.extend;m=k.extendClass;var R=k.isArray,J=k.isNumber,F=k.isObject,z=k.pick,u=k.pInt,S=k.uniqueKey;N().global.VMLRadialGradientURL="http://code.highcharts.com/10.3.2/gfx/vml-radial-gradient.png";
g&&!g.defaultView&&(e.getStyle=k.getStyle=function l(b,d){var c={width:"clientWidth",height:"clientHeight"}[d];if(b.style[d])return u(b.style[d]);"opacity"===d&&(d="filter");if(c)return b.style.zoom=1,Math.max(b[c]-2*l(b,"padding"),0);b=b.currentStyle[d.replace(/\-(\w)/g,function(b,d){return d.toUpperCase()})];"filter"===d&&(b=b.replace(/alpha\(opacity=([0-9]+)\)/,function(b,d){return d/100}));return""===b?1:u(b)});D||(Q(y,"afterInit",function(){"text"===this.element.nodeName&&this.css({position:"absolute"})}),
r.prototype.normalize=function(a,b){a=a||w.event;a.target||(a.target=a.srcElement);b||(this.chartPosition=b=this.getChartPosition());return x(a,{chartX:Math.round(Math.max(a.x,a.clientX-b.left)),chartY:Math.round(a.y)})},c.prototype.ieSanitizeSVG=function(a){return a=a.replace(/<IMG /g,"<image ").replace(/<(\/?)TITLE>/g,"<$1title>").replace(/height=([^" ]+)/g,'height="$1"').replace(/width=([^" ]+)/g,'width="$1"').replace(/hc-svg-href="([^"]+)">/g,'xlink:href="$1"/>').replace(/ id=([^" >]+)/g,' id="$1"').replace(/class=([^" >]+)/g,
'class="$1"').replace(/ transform /g," ").replace(/:(path|rect)/g,"$1").replace(/style="([^"]+)"/g,function(a){return a.toLowerCase()})},c.prototype.isReadyToRender=function(){var a=this;return D||w!=w.top||"complete"===g.readyState?!0:(g.attachEvent("onreadystatechange",function(){g.detachEvent("onreadystatechange",a.firstRender);"complete"===g.readyState&&a.firstRender()}),!1)},g.createElementNS||(g.createElementNS=function(a,b){return g.createElement(b)}),e.addEventListenerPolyfill=function(a,
b){function d(a){a.target=a.srcElement||w;b.call(c,a)}var c=this;c.attachEvent&&(c.hcEventsIE||(c.hcEventsIE={}),b.hcKey||(b.hcKey=S()),c.hcEventsIE[b.hcKey]=d,c.attachEvent("on"+a,d))},e.removeEventListenerPolyfill=function(a,b){this.detachEvent&&(b=this.hcEventsIE[b.hcKey],this.detachEvent("on"+a,b))},c={docMode8:g&&8===g.documentMode,init:function(a,b){var d=["<",b,' filled="f" stroked="f"'],c=["position: ","absolute",";"],f="div"===b;("shape"===b||f)&&c.push("left:0;top:0;width:1px;height:1px;");
c.push("visibility: ",f?"hidden":"visible");d.push(' style="',c.join(""),'"/>');b&&(d=f||"span"===b||"img"===b?d.join(""):a.prepVML(d),this.element=E(d));this.renderer=a},add:function(a){var b=this.renderer,d=this.element,c=b.box,f=a&&a.inverted;c=a?a.element||a:c;a&&(this.parentGroup=a);f&&b.invertChild(d,c);c.appendChild(d);this.added=!0;this.alignOnAdd&&!this.deferUpdateTransform&&this.updateTransform();if(this.onAdd)this.onAdd();this.className&&this.attr("class",this.className);return this},updateTransform:y.prototype.htmlUpdateTransform,
setSpanRotation:function(){var a=this.rotation,b=Math.cos(a*v),d=Math.sin(a*v);B(this.element,{filter:a?["progid:DXImageTransform.Microsoft.Matrix(M11=",b,", M12=",-d,", M21=",d,", M22=",b,", sizingMethod='auto expand')"].join(""):"none"})},getSpanCorrection:function(a,b,d,c,f){var l=c?Math.cos(c*v):1,e=c?Math.sin(c*v):0,K=z(this.elemHeight,this.element.offsetHeight);this.xCorr=0>l&&-a;this.yCorr=0>e&&-K;var A=0>l*e;this.xCorr+=e*b*(A?1-d:d);this.yCorr-=l*b*(c?A?d:1-d:1);f&&"left"!==f&&(this.xCorr-=
a*d*(0>l?-1:1),c&&(this.yCorr-=K*d*(0>e?-1:1)),B(this.element,{textAlign:f}))},pathToVML:function(a){for(var b=a.length,d=[];b--;)J(a[b])?d[b]=Math.round(10*a[b])-5:"Z"===a[b]?d[b]="x":(d[b]=a[b],!a.isArc||"wa"!==a[b]&&"at"!==a[b]||(d[b+5]===d[b+7]&&(d[b+7]+=a[b+7]>a[b+5]?1:-1),d[b+6]===d[b+8]&&(d[b+8]+=a[b+8]>a[b+6]?1:-1)));return d.join(" ")||"x"},clip:function(a){var b=this;if(a){var d=a.members;I(d,b);d.push(b);b.destroyClip=function(){I(d,b)};a=a.getCSS(b)}else b.destroyClip&&b.destroyClip(),
a={clip:b.docMode8?"inherit":"rect(auto)"};return b.css(a)},css:y.prototype.htmlCss,safeRemoveChild:function(a){a.parentNode&&H(a)},destroy:function(){this.destroyClip&&this.destroyClip();return y.prototype.destroy.apply(this)},on:function(a,b){this.element["on"+a]=function(){var a=w.event;a.target=a.srcElement;b(a)};return this},cutOffPath:function(a,b){a=a.split(/[ ,]/);var d=a.length;if(9===d||11===d)a[d-4]=a[d-2]=u(a[d-2])-10*b;return a.join(" ")},shadow:function(a,b,d){var c=[],f,e=this.element,
h=this.renderer,K=e.style,A=e.path;A&&"string"!==typeof A.value&&(A="x");var g=A;if(a){var O=z(a.width,3);var n=(a.opacity||.15)/O;for(f=1;3>=f;f++){var k=2*O+1-2*f;d&&(g=this.cutOffPath(A.value,k+.5));var m=['<shape isShadow="true" strokeweight="',k,'" filled="false" path="',g,'" coordsize="10 10" style="',e.style.cssText,'" />'];var p=E(h.prepVML(m),null,{left:u(K.left)+z(a.offsetX,1)+"px",top:u(K.top)+z(a.offsetY,1)+"px"});d&&(p.cutOff=k+1);m=['<stroke color="',a.color||"#000000",'" opacity="',
n*f,'"/>'];E(h.prepVML(m),null,null,p);b?b.element.appendChild(p):e.parentNode.insertBefore(p,e);c.push(p)}this.shadows=c}return this},updateShadows:t,setAttr:function(a,b){this.docMode8?this.element[a]=b:this.element.setAttribute(a,b)},getAttr:function(a){return this.docMode8?this.element[a]:this.element.getAttribute(a)},classSetter:function(a){(this.added?this.element:this).className=a},dashstyleSetter:function(a,b,d){(d.getElementsByTagName("stroke")[0]||E(this.renderer.prepVML(["<stroke/>"]),
null,null,d))[b]=a||"solid";this[b]=a},dSetter:function(a,b,d){var c=this.shadows;a=a||[];this.d=a.join&&a.join(" ");d.path=a=this.pathToVML(a);if(c)for(d=c.length;d--;)c[d].path=c[d].cutOff?this.cutOffPath(a,c[d].cutOff):a;this.setAttr(b,a)},fillSetter:function(a,b,d){var c=d.nodeName;"SPAN"===c?d.style.color=a:"IMG"!==c&&(d.filled="none"!==a,this.setAttr("fillcolor",this.renderer.color(a,d,b,this)))},"fill-opacitySetter":function(a,b,d){E(this.renderer.prepVML(["<",b.split("-")[0],' opacity="',
a,'"/>']),null,null,d)},opacitySetter:t,rotationSetter:function(a,b,d){d=d.style;this[b]=d[b]=a;d.left=-Math.round(Math.sin(a*v)+1)+"px";d.top=Math.round(Math.cos(a*v))+"px"},strokeSetter:function(a,b,d){this.setAttr("strokecolor",this.renderer.color(a,d,b,this))},"stroke-widthSetter":function(a,b,d){d.stroked=!!a;this[b]=a;J(a)&&(a+="px");this.setAttr("strokeweight",a)},titleSetter:function(a,b){this.setAttr(b,a)},visibilitySetter:function(a,b,d){"inherit"===a&&(a="visible");this.shadows&&this.shadows.forEach(function(d){d.style[b]=
a});"DIV"===d.nodeName&&(a="hidden"===a?"-999em":0,this.docMode8||(d.style[b]=a?"visible":"hidden"),b="top");d.style[b]=a},xSetter:function(a,b,d){this[b]=a;"x"===b?b="left":"y"===b&&(b="top");this.updateClipping?(this[b]=a,this.updateClipping()):d.style[b]=a},zIndexSetter:function(a,b,d){d.style[b]=a},fillGetter:function(){return this.getAttr("fillcolor")||""},strokeGetter:function(){return this.getAttr("strokecolor")||""},classGetter:function(){return this.getAttr("className")||""}},c["stroke-opacitySetter"]=
c["fill-opacitySetter"],e.VMLElement=c=m(y,c),c.prototype.ySetter=c.prototype.widthSetter=c.prototype.heightSetter=c.prototype.xSetter,c={Element:c,isIE8:-1<w.navigator.userAgent.indexOf("MSIE 8.0"),init:function(a,b,d){this.crispPolyLine=h.prototype.crispPolyLine;this.alignedObjects=[];var c=this.createElement("div").css({position:"relative"});var e=c.element;a.appendChild(c.element);this.isVML=!0;this.box=e;this.boxWrapper=c;this.gradients={};this.cache={};this.cacheKeys=[];this.imgCount=0;this.setSize(b,
d,!1);if(!g.namespaces.hcv){g.namespaces.add("hcv","urn:schemas-microsoft-com:vml");try{g.createStyleSheet().cssText="hcv\\:fill, hcv\\:path, hcv\\:shape, hcv\\:stroke{ behavior:url(#default#VML); display: inline-block; } "}catch(T){g.styleSheets[0].cssText+="hcv\\:fill, hcv\\:path, hcv\\:shape, hcv\\:stroke{ behavior:url(#default#VML); display: inline-block; } "}}},isHidden:function(){return!this.box.offsetWidth},clipRect:function(a,b,d,c){var e=this.createElement(),l=F(a);return x(e,{members:[],
count:0,left:(l?a.x:a)+1,top:(l?a.y:b)+1,width:(l?a.width:d)-1,height:(l?a.height:c)-1,getCSS:function(a){var b=a.element,d=b.nodeName,c=a.inverted,e=this.top-("shape"===d?b.offsetTop:0),l=this.left;b=l+this.width;var f=e+this.height;e={clip:"rect("+Math.round(c?l:e)+"px,"+Math.round(c?f:b)+"px,"+Math.round(c?b:f)+"px,"+Math.round(c?e:l)+"px)"};!c&&a.docMode8&&"DIV"===d&&x(e,{width:b+"px",height:f+"px"});return e},updateClipping:function(){e.members.forEach(function(a){a.element&&a.css(e.getCSS(a))})}})},
color:function(a,b,d,c){var e=this,l=/^rgba/,h,g,k="none";a&&a.linearGradient?g="gradient":a&&a.radialGradient&&(g="pattern");if(g){var m,t,n=a.linearGradient||a.radialGradient,q=void 0,r=void 0,u=void 0,v=void 0,w,x,y,B,z="";a=a.stops;r=q=void 0;var D=[],F=function(){h=['<fill colors="'+D.join(",")+'" opacity="',x,'" o:opacity2="',w,'" type="',g,'" ',z,'focus="100%" method="any" />'];E(e.prepVML(h),null,null,b)};q=a[0];r=a[a.length-1];0<q[0]&&a.unshift([0,q[1]]);1>r[0]&&a.push([1,r[1]]);a.forEach(function(a,
b){l.test(a[1])?(L=p(a[1]),m=L.get("rgb"),t=L.get("a")):(m=a[1],t=1);D.push(100*a[0]+"% "+m);b?(x=t,y=m):(w=t,B=m)});if("fill"===d)if("gradient"===g)q=n.x1||n[0]||0,r=n.y1||n[1]||0,u=n.x2||n[2]||0,v=n.y2||n[3]||0,z='angle="'+(90-180*Math.atan((v-r)/(u-q))/Math.PI)+'"',F();else{d=n.r;var G=2*d,H=2*d,I=n.cx,J=n.cy,M=b.radialReference,C;n=function(){M&&(C=c.getBBox(),I+=(M[0]-C.x)/C.width-.5,J+=(M[1]-C.y)/C.height-.5,G*=M[2]/C.width,H*=M[2]/C.height);z='src="'+N().global.VMLRadialGradientURL+'" size="'+
G+","+H+'" origin="0.5,0.5" position="'+I+","+J+'" color2="'+B+'" ';F()};c.added?n():c.onAdd=n;k=y}else k=m}else if(l.test(a)&&"IMG"!==b.tagName){var L=p(a);c[d+"-opacitySetter"](L.get("a"),d,b);k=L.get("rgb")}else n=b.getElementsByTagName(d),n.length&&(n[0].opacity=1,n[0].type="solid"),k=a;return k},prepVML:function(a){var b=this.isIE8;a=a.join("");b?(a=a.replace("/>",' xmlns="urn:schemas-microsoft-com:vml" />'),a=-1===a.indexOf('style="')?a.replace("/>",' style="display:inline-block;behavior:url(#default#VML);" />'):
a.replace('style="','style="display:inline-block;behavior:url(#default#VML);')):a=a.replace("<","<hcv:");return a},text:h.prototype.html,path:function(a){var b={coordsize:"10 10"};R(a)?b.d=a:F(a)&&x(b,a);return this.createElement("shape").attr(b)},circle:function(a,b,d){var c=this.symbol("circle");F(a)&&(d=a.r,b=a.y,a=a.x);c.isCircle=!0;c.r=d;return c.attr({x:a,y:b})},g:function(a){var b;a&&(b={className:"highcharts-"+a,"class":"highcharts-"+a});return this.createElement("div").attr(b)},image:function(a,
b,d,c,e){var f=this.createElement("img").attr({src:a});1<arguments.length&&f.attr({x:b,y:d,width:c,height:e});return f},createElement:function(a){return"rect"===a?this.symbol(a):h.prototype.createElement.call(this,a)},invertChild:function(a,b){var c=this;b=b.style;var e="IMG"===a.tagName&&a.style;B(a,{flip:"x",left:u(b.width)-(e?u(e.top):1)+"px",top:u(b.height)-(e?u(e.left):1)+"px",rotation:-90});[].forEach.call(a.childNodes,function(b){c.invertChild(b,a)})},symbols:{arc:function(a,b,c,e,f){var d=
f.start,g=f.end,l=f.r||c||e;c=f.innerR;e=Math.cos(d);var h=Math.sin(d),k=Math.cos(g),m=Math.sin(g);if(0===g-d)return["x"];d=["wa",a-l,b-l,a+l,b+l,a+l*e,b+l*h,a+l*k,b+l*m];f.open&&!c&&d.push("e","M",a,b);d.push("at",a-c,b-c,a+c,b+c,a+c*k,b+c*m,a+c*e,b+c*h,"x","e");d.isArc=!0;return d},circle:function(a,b,c,e,f){f&&G(f.r)&&(c=e=2*f.r);f&&f.isCircle&&(a-=c/2,b-=e/2);return["wa",a,b,a+c,b+e,a+c,b+e/2,a+c,b+e/2,"e"]},rect:function(a,b,c,e,f){return h.prototype.symbols[G(f)&&f.r?"callout":"square"].call(0,
a,b,c,e,f)}}},e.VMLRenderer=e=function(){this.init.apply(this,arguments)},x(e.prototype,h.prototype),x(e.prototype,c),q.registerRendererType("VMLRenderer",e,!0),P.compose(e,h));h.prototype.getSpanWidth=function(a,b){var c=a.getBBox(!0).width;!D&&this.forExport&&(c=this.measureSpanWidth(b.firstChild.data,a.styles));return c};h.prototype.measureSpanWidth=function(a,b){var c=g.createElement("span");a=g.createTextNode(a);c.appendChild(a);B(c,b);this.box.appendChild(c);b=c.offsetWidth;H(c);return b}});
q(c,"masters/modules/oldie.src.js",[],function(){})});
//# sourceMappingURL=oldie.js.map