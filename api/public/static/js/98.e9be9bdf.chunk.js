(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[98],{1436:function(e,a,t){"use strict";var n=t(67),r=t(68),l=t(113),c=t(112),i=t(270),o=t(0),s=t.n(o);a.a=function(e,a){return function(t){return function(o){Object(l.a)(u,o);var m=Object(c.a)(u);function u(t){var r;return Object(n.a)(this,u),r=m.call(this,t),Object(i.b)(e,a),r}return Object(r.a)(u,[{key:"render",value:function(){return s.a.createElement(t,this.props)}}]),u}(s.a.PureComponent)}}},1438:function(e,a,t){"use strict";var n=t(54),r=t(51),l=t(1368),c=t(3),i=t(0),o=t.n(i),s=t(1404),m=t(8);var u=function(e){var a=Object(m.c)((function(e){return e.fuse.settings.mainThemeDark}));return o.a.createElement("div",{className:e.classes.header},e.header&&o.a.createElement(s.a,{theme:a},e.header))},d=t(23),p=t(1374),f=t(1388);var b=function(e){var a=Object(m.c)((function(e){return e.fuse.settings.mainThemeDark})),t=e.classes;return o.a.createElement(o.a.Fragment,null,e.header&&o.a.createElement(s.a,{theme:a},o.a.createElement("div",{className:Object(c.default)(t.sidebarHeader,e.variant)},e.header)),e.content&&o.a.createElement(r.a,{className:t.sidebarContent,enable:e.innerScroll},e.content))};var E=o.a.forwardRef((function(e,a){var t=Object(i.useState)(!1),n=Object(d.a)(t,2),r=n[0],l=n[1],s=e.classes;Object(i.useImperativeHandle)(a,(function(){return{toggleSidebar:m}}));var m=function(){l(!r)};return o.a.createElement(o.a.Fragment,null,o.a.createElement(f.a,{lgUp:"permanent"===e.variant},o.a.createElement(p.a,{variant:"temporary",anchor:e.position,open:r,onClose:function(e){return m()},classes:{root:Object(c.default)(s.sidebarWrapper,e.variant),paper:Object(c.default)(s.sidebar,e.variant,"left"===e.position?s.leftSidebar:s.rightSidebar)},ModalProps:{keepMounted:!0},container:e.rootRef.current,BackdropProps:{classes:{root:s.backdrop}},style:{position:"absolute"}},o.a.createElement(b,e))),"permanent"===e.variant&&o.a.createElement(f.a,{mdDown:!0},o.a.createElement(p.a,{variant:"permanent",className:Object(c.default)(s.sidebarWrapper,e.variant),open:r,classes:{paper:Object(c.default)(s.sidebar,e.variant,"left"===e.position?s.leftSidebar:s.rightSidebar)}},o.a.createElement(b,e))))})),h=Object(l.a)((function(e){return{root:{display:"flex",flexDirection:"row",minHeight:"100%",position:"relative",flex:"1 0 auto",height:"auto",backgroundColor:e.palette.background.default},innerScroll:{flex:"1 1 auto",height:"100%"},topBg:{position:"absolute",left:0,right:0,top:0,height:200,background:"linear-gradient(to right, ".concat(e.palette.primary.dark," 0%, ").concat(e.palette.primary.main," 100%)"),backgroundSize:"cover",pointerEvents:"none"},contentWrapper:Object(n.a)({display:"flex",flexDirection:"column",padding:"0 3.2rem",flex:"1 1 100%",zIndex:2,maxWidth:"100%",minWidth:0,minHeight:0},e.breakpoints.down("xs"),{padding:"0 1.6rem"}),header:{height:136,minHeight:136,maxHeight:136,display:"flex",color:e.palette.primary.contrastText},headerSidebarToggleButton:{color:e.palette.primary.contrastText},contentCard:{display:"flex",flex:"1 1 100%",flexDirection:"column",backgroundColor:e.palette.background.paper,boxShadow:e.shadows[1],minHeight:0,borderRadius:"8px 8px 0 0"},toolbar:{height:64,minHeight:64,display:"flex",alignItems:"center",borderBottom:"1px solid ".concat(e.palette.divider)},content:{flex:"1 1 auto",height:"100%",overflow:"auto","-webkit-overflow-scrolling":"touch"},sidebarWrapper:{position:"absolute",backgroundColor:"transparent",zIndex:5,overflow:"hidden","&.permanent":Object(n.a)({},e.breakpoints.up("lg"),{zIndex:1,position:"relative"})},sidebar:{position:"absolute","&.permanent":Object(n.a)({},e.breakpoints.up("lg"),{backgroundColor:"transparent",position:"relative",border:"none",overflow:"hidden"}),width:240,height:"100%"},leftSidebar:{},rightSidebar:{},sidebarHeader:{height:200,minHeight:200,color:e.palette.primary.contrastText,backgroundColor:e.palette.primary.dark,"&.permanent":Object(n.a)({},e.breakpoints.up("lg"),{backgroundColor:"transparent"})},sidebarContent:Object(n.a)({display:"flex",flex:"1 1 auto",flexDirection:"column",backgroundColor:e.palette.background.default,color:e.palette.text.primary},e.breakpoints.up("lg"),{overflow:"auto","-webkit-overflow-scrolling":"touch"}),backdrop:{position:"absolute"}}})),v=o.a.forwardRef((function(e,a){var t=Object(i.useRef)(null),n=Object(i.useRef)(null),l=Object(i.useRef)(null),s=h(e),m=e.rightSidebarHeader||e.rightSidebarContent,d=e.leftSidebarHeader||e.leftSidebarContent;return o.a.useImperativeHandle(a,(function(){return{rootRef:l,toggleLeftSidebar:function(){t.current.toggleSidebar()},toggleRightSidebar:function(){n.current.toggleSidebar()}}})),o.a.createElement("div",{className:Object(c.default)(s.root,e.innerScroll&&s.innerScroll),ref:l},o.a.createElement("div",{className:s.topBg}),o.a.createElement("div",{className:"flex container w-full"},d&&o.a.createElement(E,{position:"left",header:e.leftSidebarHeader,content:e.leftSidebarContent,variant:e.leftSidebarVariant||"permanent",innerScroll:e.innerScroll,classes:s,ref:t,rootRef:l}),o.a.createElement("div",{className:Object(c.default)(s.contentWrapper,d&&(void 0===e.leftSidebarVariant||"permanent"===e.leftSidebarVariant)&&"lg:ltr:pl-0 lg:rtl:pr-0",m&&(void 0===e.rightSidebarVariant||"permanent"===e.rightSidebarVariant)&&"lg:pr-0")},o.a.createElement(u,{header:e.header,classes:s}),o.a.createElement("div",{className:Object(c.default)(s.contentCard,e.innerScroll&&"inner-scroll")},e.contentToolbar&&o.a.createElement("div",{className:s.toolbar},e.contentToolbar),e.content&&o.a.createElement(r.a,{className:s.content,enable:e.innerScroll,scrollToTopOnRouteChange:e.innerScroll},e.content))),m&&o.a.createElement(E,{position:"right",header:e.rightSidebarHeader,content:e.rightSidebarContent,variant:e.rightSidebarVariant||"permanent",innerScroll:e.innerScroll,classes:s,ref:n,rootRef:l})))}));v.defaultProps={};var g=o.a.memo(v);t.d(a,"a",(function(){return g}))},1570:function(e,a,t){"use strict";var n=t(1),r=t(5),l=t(0),c=t.n(l),i=(t(2),t(3)),o=t(11),s=c.a.forwardRef((function(e,a){var t=e.classes,l=e.className,o=e.dividers,s=void 0!==o&&o,m=Object(r.a)(e,["classes","className","dividers"]);return c.a.createElement("div",Object(n.a)({className:Object(i.default)(t.root,l,s&&t.dividers),ref:a},m))}));a.a=Object(o.a)((function(e){return{root:{flex:"1 1 auto",WebkitOverflowScrolling:"touch",overflowY:"auto",padding:"8px 24px","&:first-child":{paddingTop:20}},dividers:{padding:"16px 24px",borderTop:"1px solid ".concat(e.palette.divider),borderBottom:"1px solid ".concat(e.palette.divider)}}}),{name:"MuiDialogContent"})(s)},1588:function(e,a,t){"use strict";var n=t(1),r=t(5),l=t(0),c=t.n(l),i=(t(2),t(3)),o=t(11),s=c.a.forwardRef((function(e,a){var t=e.disableSpacing,l=void 0!==t&&t,o=e.classes,s=e.className,m=Object(r.a)(e,["disableSpacing","classes","className"]);return c.a.createElement("div",Object(n.a)({className:Object(i.default)(o.root,s,!l&&o.spacing),ref:a},m))}));a.a=Object(o.a)({root:{display:"flex",alignItems:"center",padding:8,justifyContent:"flex-end",flex:"0 0 auto"},spacing:{"& > :not(:first-child)":{marginLeft:8}}},{name:"MuiDialogActions"})(s)},1821:function(e,a){e.exports=s,e.exports.parse=n,e.exports.compile=function(e,a){return r(n(e,a),a)},e.exports.tokensToFunction=r,e.exports.tokensToRegExp=o;var t=new RegExp(["(\\\\.)","(?:\\:(\\w+)(?:\\(((?:\\\\.|[^\\\\()])+)\\))?|\\(((?:\\\\.|[^\\\\()])+)\\))([+*?])?"].join("|"),"g");function n(e,a){for(var n,r=[],i=0,o=0,s="",m=a&&a.delimiter||"/",u=a&&a.whitelist||void 0,d=!1;null!==(n=t.exec(e));){var p=n[0],f=n[1],b=n.index;if(s+=e.slice(o,b),o=b+p.length,f)s+=f[1],d=!0;else{var E="",h=n[2],v=n[3],g=n[4],x=n[5];if(!d&&s.length){var y=s.length-1,j=s[y];(!u||u.indexOf(j)>-1)&&(E=j,s=s.slice(0,y))}s&&(r.push(s),s="",d=!1);var O="+"===x||"*"===x,S="?"===x||"*"===x,N=v||g,A=E||m;r.push({name:h||i++,prefix:E,delimiter:A,optional:S,repeat:O,pattern:N?c(N):"[^"+l(A===m?A:A+m)+"]+?"})}}return(s||o<e.length)&&r.push(s+e.substr(o)),r}function r(e,a){for(var t=new Array(e.length),n=0;n<e.length;n++)"object"===typeof e[n]&&(t[n]=new RegExp("^(?:"+e[n].pattern+")$",i(a)));return function(a,n){for(var r="",l=n&&n.encode||encodeURIComponent,c=!n||!1!==n.validate,i=0;i<e.length;i++){var o=e[i];if("string"!==typeof o){var s,m=a?a[o.name]:void 0;if(Array.isArray(m)){if(!o.repeat)throw new TypeError('Expected "'+o.name+'" to not repeat, but got array');if(0===m.length){if(o.optional)continue;throw new TypeError('Expected "'+o.name+'" to not be empty')}for(var u=0;u<m.length;u++){if(s=l(m[u],o),c&&!t[i].test(s))throw new TypeError('Expected all "'+o.name+'" to match "'+o.pattern+'"');r+=(0===u?o.prefix:o.delimiter)+s}}else if("string"!==typeof m&&"number"!==typeof m&&"boolean"!==typeof m){if(!o.optional)throw new TypeError('Expected "'+o.name+'" to be '+(o.repeat?"an array":"a string"))}else{if(s=l(String(m),o),c&&!t[i].test(s))throw new TypeError('Expected "'+o.name+'" to match "'+o.pattern+'", but got "'+s+'"');r+=o.prefix+s}}else r+=o}return r}}function l(e){return e.replace(/([.+*?=^!:${}()[\]|/\\])/g,"\\$1")}function c(e){return e.replace(/([=!:$/()])/g,"\\$1")}function i(e){return e&&e.sensitive?"":"i"}function o(e,a,t){for(var n=(t=t||{}).strict,r=!1!==t.start,c=!1!==t.end,o=t.delimiter||"/",s=[].concat(t.endsWith||[]).map(l).concat("$").join("|"),m=r?"^":"",u=0;u<e.length;u++){var d=e[u];if("string"===typeof d)m+=l(d);else{var p=d.repeat?"(?:"+d.pattern+")(?:"+l(d.delimiter)+"(?:"+d.pattern+"))*":d.pattern;a&&a.push(d),d.optional?d.prefix?m+="(?:"+l(d.prefix)+"("+p+"))?":m+="("+p+")?":m+=l(d.prefix)+"("+p+")"}}if(c)n||(m+="(?:"+l(o)+")?"),m+="$"===s?"$":"(?="+s+")";else{var f=e[e.length-1],b="string"===typeof f?f[f.length-1]===o:void 0===f;n||(m+="(?:"+l(o)+"(?="+s+"))?"),b||(m+="(?="+l(o)+"|"+s+")")}return new RegExp(m,i(t))}function s(e,a,t){return e instanceof RegExp?function(e,a){if(!a)return e;var t=e.source.match(/\((?!\?)/g);if(t)for(var n=0;n<t.length;n++)a.push({name:n,prefix:null,delimiter:null,optional:!1,repeat:!1,pattern:null});return e}(e,a):Array.isArray(e)?function(e,a,t){for(var n=[],r=0;r<e.length;r++)n.push(s(e[r],a,t).source);return new RegExp("(?:"+n.join("|")+")",i(t))}(e,a,t):function(e,a,t){return o(n(e,t),a,t)}(e,a,t)}},2911:function(e,a,t){"use strict";t.r(a);var n=t(1438),r=t(1436),l=t(0),c=t.n(l),i=t(8),o=t(23),s=t(133),m=t(10),u=t(1411),d=t(1402),p=t(1377),f=t(716),b=t(208),E=t(107),h=t(1368),v=t(3),g=Object(h.a)((function(e){return{root:{display:"flex",alignItems:"center",height:21,borderRadius:2,padding:"0 6px",fontSize:11,backgroundColor:"rgba(0,0,0,.08);"},color:{width:8,height:8,marginRight:4,borderRadius:"50%"}}}));var x=function(e){var a=g();return c.a.createElement("div",{className:Object(v.default)(a.root,e.className)},c.a.createElement("div",{className:a.color,style:{backgroundColor:e.color}}),c.a.createElement("div",null,e.title))},y=t(73),j=t.n(y),O="[MAIL APP] GET MAILS";function S(){return function(e,a){var t=a().mailApp.mails.routeParams;return j.a.get("/api/mail-app/mails",{params:t}).then((function(a){return e({type:"[MAIL APP] UPDATE MAILS",payload:a.data})}))}}function N(e,a){return{type:"[MAILS] SELECT MAILS BY PARAMETER",payload:{parameter:e,value:a}}}function A(e){return function(a,t){var n=t().mailApp.mails.selectedMailIds;return j.a.post("/api/mail-app/set-folder",{selectedMailIds:n,folderId:e}).then((function(e){return a({type:"[MAILS] SET FOLDER ON SELECTED MAILS"}),a(S())}))}}var L=t(7),I="[MAIL APP] GET MAIL",k="[MAIL APP] UPDATE MAIL";function C(e){var a=j.a.post("/api/mail-app/update-mail",e);return function(e){return a.then((function(a){return e({type:k,payload:a.data})}))}}var w="[MAIL APP] GET FOLDERS";var T="[MAIL APP] GET LABELS";var M="[MAIL APP] GET FILTERS";var R=Object(E.h)((function(e){var a=Object(i.b)(),t=Object(i.c)((function(e){return e.mailApp.mail})),n=Object(i.c)((function(e){return e.mailApp.labels})),r=Object(l.useState)(!1),E=Object(o.a)(r,2),h=E[0],v=E[1];return Object(l.useEffect)((function(){a(function(e){var a=j.a.get("/api/mail-app/mail",{params:e});return function(t){return a.then((function(a){return t({type:I,routeParams:e,payload:a.data})}))}}(e.match.params))}),[a,e.match.params]),t?c.a.createElement("div",{className:"p-16 sm:p-24"},c.a.createElement("div",{className:"flex items-center justify-between overflow-hidden"},c.a.createElement("div",{className:"flex flex-col"},c.a.createElement(s.a,{delay:100},c.a.createElement(b.a,{variant:"subtitle1",className:"flex"},t.subject)),n&&t.labels.length>0&&c.a.createElement("div",{className:"flex flex-wrap mt-8 -mx-2"},t.labels.map((function(e){return c.a.createElement(x,{className:"mt-4 mx-2",title:m.a.find(n,{id:e}).title,color:m.a.find(n,{id:e}).color,key:e})}))))),c.a.createElement(d.a,{className:"my-16"}),c.a.createElement(s.a,{animation:"transition.slideUpIn",delay:200},c.a.createElement("div",null,c.a.createElement("div",{className:"flex items-start justify-between"},c.a.createElement("div",{className:"flex items-center justify-start"},t.from.avatar?c.a.createElement(u.a,{alt:t.from.name,src:t.from.avatar}):c.a.createElement(u.a,null,t.from.name[0]),c.a.createElement("div",{className:"flex flex-col mx-8"},c.a.createElement("span",null,t.from.name),c.a.createElement(b.a,{component:"div",color:"textSecondary",variant:"body1",className:"flex items-center justify-start"},c.a.createElement("div",null,"to"),c.a.createElement("div",{className:"mx-4"},t.to[0].name)))),c.a.createElement(f.a,null,c.a.createElement(p.a,null,"more_vert"))),c.a.createElement("div",{className:"my-16"},c.a.createElement(b.a,{color:"primary",className:"cursor-pointer underline mb-8",onClick:function(){v(!h)}},h?c.a.createElement("span",null,"Hide Details"):c.a.createElement("span",null,"Show Details")),h&&c.a.createElement("div",{className:"flex"},c.a.createElement(b.a,{variant:"body2",className:"flex flex-col"},c.a.createElement("span",null,"From:"),c.a.createElement("span",null,"To:"),c.a.createElement("span",null,"Date:")),c.a.createElement(b.a,{variant:"body2",color:"textSecondary",className:"px-4 flex flex-col"},c.a.createElement("span",null,t.from.email),c.a.createElement("span",null,t.to[0].email),c.a.createElement("span",null,t.time)))),c.a.createElement(b.a,{variant:"body2",dangerouslySetInnerHTML:{__html:t.message}}),c.a.createElement(d.a,{className:"my-16"}),t.attachments&&c.a.createElement("div",null,c.a.createElement(b.a,{variant:"subtitle1",className:"mb-16"},c.a.createElement("span",{className:"mx-4"},"Attachments"),c.a.createElement("span",null,"(",t.attachments.length,")")),c.a.createElement("div",{className:"flex flex-wrap -mx-8"},t.attachments.map((function(e){return c.a.createElement("div",{className:"w-192 px-8 pb-16",key:e.fileName},c.a.createElement("img",{className:"w-full rounded-4",src:e.preview,alt:e.fileName}),c.a.createElement("div",{className:"flex flex-col"},c.a.createElement(b.a,{color:"primary",className:"underline cursor-pointer",onClick:function(e){return e.preventDefault()}},"View"),c.a.createElement(b.a,{color:"primary",className:"underline cursor-pointer",onClick:function(e){return e.preventDefault()}},"Download"),c.a.createElement(b.a,null,"(",e.size,")")))}))))))):null})),P=t(52),D=t(1821);var H=Object(E.h)((function(e){var a=Object(i.b)(),t=Object(i.c)((function(e){return e.mailApp.mail})),n=Object(P.a)(),r=D.compile(e.match.path),l=Object(L.a)({},e.match.params);delete l.mailId;var o=r(l);return t?c.a.createElement("div",{className:"flex flex-1 items-center justify-between overflow-hidden sm:px-16"},c.a.createElement(f.a,{onClick:function(){return e.history.push(o)}},c.a.createElement(p.a,null,"ltr"===n.direction?"arrow_back":"arrow_forward")),c.a.createElement("div",{className:"flex items-center justify-start","aria-label":"Toggle star"},c.a.createElement(s.a,{animation:"transition.expandIn",delay:100},c.a.createElement(f.a,{onClick:function(){return a(function(e){var a=Object(L.a)(Object(L.a)({},e),{},{starred:!e.starred});return function(e){return e({type:"[MAIL APP] TOGGLE STAR MAIL"}),e(C(a))}}(t))}},t.starred?c.a.createElement(p.a,null,"star"):c.a.createElement(p.a,null,"star_border"))),c.a.createElement(s.a,{animation:"transition.expandIn",delay:100},c.a.createElement(f.a,{onClick:function(){return a(function(e){var a=Object(L.a)(Object(L.a)({},e),{},{important:!e.important});return function(e){return e({type:"[MAIL APP] TOGGLE IMPORTANT MAIL"}),e(C(a))}}(t))}},t.important?c.a.createElement(p.a,null,"label"):c.a.createElement(p.a,null,"label_outline"))))):null})),B=t(1388),W=t(476),G=t(209),z=t(1404),U=t(77);var _=function(e){var a=Object(i.b)(),t=Object(i.c)((function(e){return e.mailApp.mails.searchText})),n=Object(i.c)((function(e){return e.fuse.settings.mainTheme})),r=Object(U.b)("mailApp").t;return c.a.createElement(z.a,{theme:n},c.a.createElement("div",{className:"flex flex-1"},c.a.createElement(G.a,{className:"flex items-center w-full h-48 sm:h-56 p-16 ltr:pl-4 lg:ltr:pl-16 rtl:pr-4 lg:rtl:pr-16 rounded-8",elevation:1},c.a.createElement(B.a,{lgUp:!0},c.a.createElement(f.a,{onClick:function(a){return e.pageLayout.current.toggleLeftSidebar()},"aria-label":"open left sidebar"},c.a.createElement(p.a,null,"menu"))),c.a.createElement(p.a,{color:"action"},"search"),c.a.createElement(W.a,{placeholder:r("SEARCH_PLACEHOLDER"),className:"px-16",disableUnderline:!0,fullWidth:!0,value:t,inputProps:{"aria-label":"Search"},onChange:function(e){return a({type:"[MAILS] SET SEARCH TEXT",searchText:e.target.value.toLowerCase()})}}))))},F=t(119),V=t(1338),$=t(1339),Y=t(1384),J=t(1401),X=t(195),q=t(1403),K=t(1382),Q=t(1396),Z=t(1588),ee=t(1570),ae=t(1386),te=t(1385),ne=Object(h.a)({root:{fontSize:13,backgroundColor:"rgba(0, 0, 0, 0.08)",border:"1px solid rgba(0, 0, 0, 0.16)",paddingLeft:16,marginBottom:8,borderRadius:2,display:"flex",justifyContent:"space-between",alignItems:"center"},filename:{fontWeight:600},size:{marginLeft:8,fontWeight:300}});var re=function(e){var a=ne();return c.a.createElement("div",{className:Object(v.default)(a.root,e.className)},c.a.createElement("div",{className:"flex"},c.a.createElement(b.a,{variant:"caption",className:a.filename},e.fileName),c.a.createElement(b.a,{variant:"caption",className:a.size},"(",e.size,")")),c.a.createElement(f.a,null,c.a.createElement(p.a,{className:"text-16"},"close")))};var le=function(){var e=Object(l.useState)(!1),a=Object(o.a)(e,2),t=a[0],n=a[1],r=Object(X.b)({from:"johndoe@creapond.com",to:"",cc:"",bcc:"",subject:"",message:""}),i=r.form,s=r.handleChange,m=Object(U.b)("mailApp").t;return c.a.createElement("div",{className:"p-24"},c.a.createElement(K.a,{variant:"contained",color:"primary",className:"w-full",onClick:function(){n(!0)}},m("COMPOSE")),c.a.createElement(Q.a,{open:t,onClose:function(){n(!1)},"aria-labelledby":"form-dialog-title"},c.a.createElement(q.a,{position:"static"},c.a.createElement(te.a,{className:"flex w-full"},c.a.createElement(b.a,{variant:"subtitle1",color:"inherit"},"New Message"))),c.a.createElement("form",{noValidate:!0,onSubmit:function(e){e.preventDefault(),n(!1)},className:"flex flex-col"},c.a.createElement(ee.a,{classes:{root:"p-16 pb-0 sm:p-24 sm:pb-0"}},c.a.createElement(ae.a,{className:"mt-8 mb-16",label:"From",id:"from",name:"from",value:i.from,onChange:s,variant:"outlined",fullWidth:!0,disabled:!0}),c.a.createElement(ae.a,{className:"mt-8 mb-16",label:"To",autoFocus:!0,id:"to",name:"to",value:i.to,onChange:s,variant:"outlined",fullWidth:!0,required:!0}),c.a.createElement(ae.a,{className:"mt-8 mb-16",label:"Cc",id:"cc",name:"cc",value:i.cc,onChange:s,variant:"outlined",fullWidth:!0}),c.a.createElement(ae.a,{className:"mt-8 mb-16",label:"Bcc",id:"bcc",name:"bcc",value:i.bcc,onChange:s,variant:"outlined",fullWidth:!0}),c.a.createElement(ae.a,{className:"mt-8 mb-16",label:"Subject",id:"subject",name:"subject",value:i.subject,onChange:s,variant:"outlined",fullWidth:!0}),c.a.createElement(ae.a,{className:"mt-8 mb-16",id:"message",name:"message",onChange:s,value:i.message,label:"Message",type:"text",multiline:!0,rows:5,variant:"outlined",fullWidth:!0}),c.a.createElement("div",{className:"pt-8"},c.a.createElement(re,{fileName:"attachment-2.doc",size:"12 kb"}),c.a.createElement(re,{fileName:"attachment-1.jpg",size:"350 kb"}))),c.a.createElement(Z.a,{className:"justify-between p-8"},c.a.createElement("div",{className:"px-16"},c.a.createElement(K.a,{variant:"contained",color:"primary",type:"submit"},"Send"),c.a.createElement(f.a,null,c.a.createElement(p.a,null,"attach_file"))),c.a.createElement(f.a,{onClick:function(){n(!1)}},c.a.createElement(p.a,null,"delete"))))))},ce=Object(h.a)((function(e){return{listItem:{color:"inherit!important",textDecoration:"none!important",height:40,width:"calc(100% - 16px)",borderRadius:"0 20px 20px 0",paddingLeft:24,paddingRight:12,"&.active":{backgroundColor:e.palette.secondary.main,color:"".concat(e.palette.secondary.contrastText,"!important"),pointerEvents:"none","& .list-item-icon":{color:"inherit"}},"& .list-item-icon":{fontSize:16,width:16,height:16,marginRight:16}},listSubheader:{paddingLeft:24}}}));var ie=function(e){var a=Object(i.c)((function(e){return e.mailApp.folders})),t=Object(i.c)((function(e){return e.mailApp.labels})),n=Object(i.c)((function(e){return e.mailApp.filters})),r=ce(),l=Object(U.b)("mailApp").t;return c.a.createElement(s.a,{animation:"transition.slideUpIn",delay:400},c.a.createElement("div",{className:"flex-auto border-l-1"},c.a.createElement(le,null),c.a.createElement("div",null,c.a.createElement(V.a,null,c.a.createElement(J.a,{className:r.listSubheader,disableSticky:!0},l("FOLDERS")),a.length>0&&a.map((function(e){return c.a.createElement($.a,{button:!0,component:F.a,to:"/apps/mail/".concat(e.handle),key:e.id,activeClassName:"active",className:r.listItem},c.a.createElement(p.a,{className:"list-item-icon",color:"action"},e.icon),c.a.createElement(Y.a,{primary:e.translate?l(e.translate):e.title,disableTypography:!0}))}))),c.a.createElement(V.a,null,c.a.createElement(J.a,{className:r.listSubheader,disableSticky:!0},l("FILTERS")),n.length>0&&n.map((function(e){return c.a.createElement($.a,{button:!0,component:F.a,to:"/apps/mail/filter/".concat(e.handle),activeClassName:"active",className:r.listItem,key:e.id},c.a.createElement(p.a,{className:"list-item-icon",color:"action"},e.icon),c.a.createElement(Y.a,{primary:e.translate?l(e.translate):e.title,disableTypography:!0}))}))),c.a.createElement(V.a,null,c.a.createElement(J.a,{className:r.listSubheader,disableSticky:!0},l("LABELS")),t&&t.map((function(e){return c.a.createElement($.a,{button:!0,component:F.a,to:"/apps/mail/label/".concat(e.handle),key:e.id,className:r.listItem},c.a.createElement(p.a,{className:"list-item-icon",style:{color:e.color},color:"action"},"label"),c.a.createElement(Y.a,{primary:e.title,disableTypography:!0}))}))))))},oe=t(1378),se={creapond:"johndoe@creapond.com",withinpixels:"johndoe@withinpixels.com"};var me=function(e){var a=Object(l.useState)("creapond"),t=Object(o.a)(a,2),n=t[0],r=t[1],i=Object(U.b)("mailApp").t;return c.a.createElement("div",{className:"flex flex-col justify-center h-full p-24"},c.a.createElement("div",{className:"flex items-center flex-1"},c.a.createElement(s.a,{animation:"transition.expandIn",delay:300},c.a.createElement(p.a,{className:"text-32"},"mail")),c.a.createElement(s.a,{animation:"transition.slideLeftIn",delay:300},c.a.createElement("span",{className:"text-24 mx-16"},i("APP_TITLE")))),c.a.createElement(s.a,{animation:"transition.slideUpIn",delay:300},c.a.createElement(ae.a,{id:"account-selection",select:!0,label:n,value:n,onChange:function(e){r(e.target.value)},placeholder:"Select Account",margin:"normal"},Object.keys(se).map((function(e,a){return c.a.createElement(oe.a,{key:e,value:e},se[e])})))))},ue=t(463),de=t(26),pe=t(1387),fe=t(1821),be=Object(h.a)((function(e){return{mailItem:{borderBottom:"1px solid  ".concat(e.palette.divider),"&.unread":{background:"rgba(0,0,0,0.03)"},"&.selected":{"&::after":{content:'""',position:"absolute",left:0,display:"block",height:"100%",width:3,backgroundColor:e.palette.primary.main}}},avatar:{backgroundColor:e.palette.primary[500]}}})),Ee=Object(E.h)((function(e){var a=Object(i.b)(),t=Object(i.c)((function(e){return e.mailApp.mails.selectedMailIds})),n=Object(i.c)((function(e){return e.mailApp.labels})),r=be(e),l=fe.compile(e.match.path),o=t.length>0&&void 0!==t.find((function(a){return a===e.mail.id}));return c.a.createElement($.a,{dense:!0,button:!0,onClick:function(){return e.history.push(l(Object(L.a)(Object(L.a)({},e.match.params),{},{mailId:e.mail.id})))},className:Object(v.default)(r.mailItem,o&&"selected",!e.mail.read&&"unread","py-16 px-8")},c.a.createElement(pe.a,{tabIndex:-1,disableRipple:!0,checked:o,onChange:function(){return a({type:"[MAILS] TOGGLE IN SELECTED MAILS",mailId:e.mail.id})},onClick:function(e){return e.stopPropagation()}}),c.a.createElement("div",{className:"flex flex-1 flex-col relative overflow-hidden"},c.a.createElement("div",{className:"flex items-center justify-between px-16 pb-8"},c.a.createElement("div",{className:"flex items-center"},e.mail.from.avatar?c.a.createElement(u.a,{alt:e.mail.from.name,src:e.mail.from.avatar}):c.a.createElement(u.a,{className:r.avatar},e.mail.from.name[0]),c.a.createElement(b.a,{variant:"subtitle1",className:"mx-8"},e.mail.from.name)),c.a.createElement(b.a,{variant:"subtitle1"},e.mail.time)),c.a.createElement("div",{className:"flex flex-col px-16 py-0"},c.a.createElement(b.a,{className:"truncate"},e.mail.subject),c.a.createElement(b.a,{color:"textSecondary",className:"truncate"},m.a.truncate(e.mail.message.replace(/<(?:.|\n)*?>/gm,""),{length:180}))),c.a.createElement("div",{className:"flex justify-end px-12"},n&&e.mail.labels.map((function(e){return c.a.createElement(x,{className:"mx-2 mt-4",title:m.a.find(n,{id:e}).title,color:m.a.find(n,{id:e}).color,key:e})})))))}));var he=Object(E.h)((function(e){var a=Object(i.b)(),t=Object(i.c)((function(e){return e.mailApp.mails.entities})),n=Object(i.c)((function(e){return e.mailApp.mails.searchText})),r=Object(l.useState)(null),m=Object(o.a)(r,2),u=m[0],d=m[1],p=Object(U.b)("mailApp").t;return Object(l.useEffect)((function(){a(function(e){var a=j.a.get("/api/mail-app/mails",{params:e});return function(t){return a.then((function(a){return t({type:O,routeParams:e,payload:a.data})}))}}(e.match.params))}),[a,e.match.params]),Object(l.useEffect)((function(){t&&d(function(){var e=Object.keys(t).map((function(e){return t[e]}));return 0===n.length?e:de.a.filterArrayByString(e,n)}())}),[t,n]),u?0===u.length?c.a.createElement(s.a,{delay:100},c.a.createElement("div",{className:"flex flex-1 items-center justify-center h-full"},c.a.createElement(b.a,{color:"textSecondary",variant:"h5"},p("NO_MESSAGES")))):c.a.createElement(V.a,{className:"p-0"},c.a.createElement(ue.a,{enter:{animation:"transition.slideUpBigIn"}},u.map((function(e){return c.a.createElement(Ee,{mail:e,key:e.id})})))):null})),ve=t(54),ge=t(474);var xe=function(e){var a=Object(i.b)(),t=Object(i.c)((function(e){return e.mailApp.mails.selectedMailIds})),n=Object(i.c)((function(e){return e.mailApp.mails.entities})),r=Object(i.c)((function(e){return e.mailApp.labels})),s=Object(i.c)((function(e){return e.mailApp.folders})),m=Object(l.useState)({selectMenu:null,foldersMenu:null,labelsMenu:null}),u=Object(o.a)(m,2),d=u[0],b=u[1];function E(e,a){b(Object(L.a)(Object(L.a)({},a),{},Object(ve.a)({},a,e.currentTarget)))}function h(e,a){b(Object(L.a)(Object(L.a)({},a),{},Object(ve.a)({},a,null)))}return c.a.createElement("div",{className:"flex flex-1 items-center sm:px-8"},c.a.createElement(pe.a,{onChange:function(e){return e.target.checked?a({type:"[MAILS] SELECT ALL MAILS"}):a({type:"[MAILS] DESELECT ALL MAILS"})},checked:t.length===Object.keys(n).length&&t.length>0,indeterminate:t.length!==Object.keys(n).length&&t.length>0}),c.a.createElement(f.a,{className:"",size:"small","aria-label":"More","aria-owns":d.select?"select-menu":null,"aria-haspopup":"true",onClick:function(e){return E(e,"select")}},c.a.createElement(p.a,null,"arrow_drop_down")),c.a.createElement(ge.a,{id:"select-menu",anchorEl:d.select,open:Boolean(d.select),onClose:function(e){return h(0,"select")}},c.a.createElement(oe.a,{onClick:function(e){a({type:"[MAILS] SELECT ALL MAILS"}),h(0,"select")}},"All"),c.a.createElement(oe.a,{onClick:function(e){a({type:"[MAILS] DESELECT ALL MAILS"}),h(0,"select")}},"None"),c.a.createElement(oe.a,{onClick:function(e){a(N("read",!0)),h(0,"select")}},"Read"),c.a.createElement(oe.a,{onClick:function(e){a(N("read",!1)),h(0,"select")}},"Unread"),c.a.createElement(oe.a,{onClick:function(e){a(N("starred",!0)),h(0,"select")}},"Starred"),c.a.createElement(oe.a,{onClick:function(e){a(N("starred",!1)),h(0,"select")}},"Unstarred"),c.a.createElement(oe.a,{onClick:function(e){a(N("important",!0)),h(0,"select")}},"Important"),c.a.createElement(oe.a,{onClick:function(e){a(N("important",!1)),h(0,"select")}},"Unimportant")),t.length>0&&c.a.createElement(c.a.Fragment,null,c.a.createElement("div",{className:"border-r-1 h-48 w-1 mx-12 my-0"}),c.a.createElement(f.a,{onClick:function(e){return a(A(4))},"aria-label":"Delete"},c.a.createElement(p.a,null,"delete")),c.a.createElement(f.a,{"aria-label":"More","aria-owns":d.folders?"folders-menu":null,"aria-haspopup":"true",onClick:function(e){return E(e,"folders")}},c.a.createElement(p.a,null,"folder")),c.a.createElement(ge.a,{id:"folders-menu",anchorEl:d.folders,open:Boolean(d.folders),onClose:function(e){return h(0,"folders")}},s.length>0&&s.map((function(e){return c.a.createElement(oe.a,{onClick:function(t){a(A(e.id)),h(0,"folders")},key:e.id},e.title)}))),c.a.createElement(f.a,{"aria-label":"More","aria-owns":d.labels?"labels-menu":null,"aria-haspopup":"true",onClick:function(e){return E(e,"labels")}},c.a.createElement(p.a,null,"label")),c.a.createElement(ge.a,{id:"folders-menu",anchorEl:d.labels,open:Boolean(d.labels),onClose:function(e){return h(0,"labels")}},r.length>0&&r.map((function(e){return c.a.createElement(oe.a,{onClick:function(t){var n;a((n=e.id,function(e,a){var t=a().mailApp.mails.selectedMailIds;return j.a.post("/api/mail-app/toggle-label",{selectedMailIds:t,labelId:n}).then((function(a){return e({type:"[MAILS] TOGGLE LABEL ON SELECTED MAILS"}),e(S())}))})),h(0,"labels")},key:e.id},e.title)})))))},ye=t(74),je=t(13),Oe=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],a=arguments.length>1?arguments[1]:void 0;switch(a.type){case M:return Object(je.a)(a.payload);default:return e}},Se=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],a=arguments.length>1?arguments[1]:void 0;switch(a.type){case w:return Object(je.a)(a.payload);default:return e}},Ne=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,a=arguments.length>1?arguments[1]:void 0;switch(a.type){case T:return Object(je.a)(a.payload);default:return e}},Ae=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,a=arguments.length>1?arguments[1]:void 0;switch(a.type){case I:case k:return Object(L.a)({},a.payload);default:return e}},Le={entities:[],routeParams:{},selectedMailIds:[],searchText:""},Ie=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:Le,a=arguments.length>1?arguments[1]:void 0;switch(a.type){case O:return Object(L.a)(Object(L.a)({},e),{},{entities:m.a.keyBy(a.payload,"id"),searchText:"",routeParams:a.routeParams});case"[MAIL APP] UPDATE MAILS":return Object(L.a)(Object(L.a)({},e),{},{entities:m.a.keyBy(a.payload,"id")});case"[MAILS] SELECT ALL MAILS":var t=Object.keys(e.entities).map((function(a){return e.entities[a]})),n=t.map((function(e){return e.id}));return Object(L.a)(Object(L.a)({},e),{},{selectedMailIds:n});case"[MAILS] DESELECT ALL MAILS":return Object(L.a)(Object(L.a)({},e),{},{selectedMailIds:[]});case"[MAILS] SELECT MAILS BY PARAMETER":var r=a.payload,l=Object.keys(e.entities).map((function(a){return e.entities[a]})),c=l.filter((function(e){return e[r.parameter]===r.value})).map((function(e){return e.id}));return Object(L.a)(Object(L.a)({},e),{},{selectedMailIds:c});case"[MAILS] TOGGLE IN SELECTED MAILS":var i=a.mailId,o=Object(je.a)(e.selectedMailIds);return o=void 0!==o.find((function(e){return e===i}))?o.filter((function(e){return e!==i})):[].concat(Object(je.a)(o),[i]),Object(L.a)(Object(L.a)({},e),{},{selectedMailIds:o});case"[MAILS] SET SEARCH TEXT":return Object(L.a)(Object(L.a)({},e),{},{searchText:a.searchText});default:return e}},ke=Object(ye.d)({mails:Ie,mail:Ae,folders:Se,labels:Ne,filters:Oe});a.default=Object(r.a)("mailApp",ke)((function(e){var a=Object(i.b)(),t=Object(l.useRef)(null);return Object(l.useEffect)((function(){a(function(){var e=j.a.get("/api/mail-app/filters");return function(a){return e.then((function(e){return a({type:M,payload:e.data})}))}}()),a(function(){var e=j.a.get("/api/mail-app/folders");return function(a){return e.then((function(e){return a({type:w,payload:e.data})}))}}()),a(function(){var e=j.a.get("/api/mail-app/labels");return function(a){return e.then((function(e){return a({type:T,payload:e.data})}))}}())}),[a]),c.a.createElement(n.a,{classes:{root:"w-full",content:"flex flex-col",header:"items-center min-h-72 h-72 sm:h-136 sm:min-h-136"},header:c.a.createElement(_,{pageLayout:t}),contentToolbar:e.match.params.mailId?c.a.createElement(H,null):c.a.createElement(xe,null),content:e.match.params.mailId?c.a.createElement(R,null):c.a.createElement(he,null),leftSidebarHeader:c.a.createElement(me,null),leftSidebarContent:c.a.createElement(ie,null),ref:t,innerScroll:!0})}))}}]);