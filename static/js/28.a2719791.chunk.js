(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[28],{1410:function(e,a,t){"use strict";var n=t(690);Object.defineProperty(a,"__esModule",{value:!0}),a.default=function(e,a){var t=r.default.memo(r.default.forwardRef((function(a,t){return r.default.createElement(i.default,(0,o.default)({ref:t},a),e)})));0;return t.muiName=i.default.muiName,t};var o=n(t(174)),r=n(t(0)),i=n(t(1343))},1426:function(e,a,t){"use strict";var n=t(1409),o=t(690);Object.defineProperty(a,"__esModule",{value:!0}),a.default=a.styles=void 0;var r=o(t(154)),i=o(t(174)),l=n(t(0)),c=(o(t(2)),o(t(3))),s=o(t(1411)),d=t(237),u=o(t(193)),m=o(t(1414)),p=function(e){return{root:(0,i.default)((0,i.default)({},e.typography.button),{},{boxSizing:"border-box",minWidth:64,padding:"6px 16px",borderRadius:e.shape.borderRadius,color:e.palette.text.primary,transition:e.transitions.create(["background-color","box-shadow","border"],{duration:e.transitions.duration.short}),"&:hover":{textDecoration:"none",backgroundColor:(0,d.fade)(e.palette.text.primary,e.palette.action.hoverOpacity),"@media (hover: none)":{backgroundColor:"transparent"},"&$disabled":{backgroundColor:"transparent"}},"&$disabled":{color:e.palette.action.disabled}}),label:{width:"100%",display:"inherit",alignItems:"inherit",justifyContent:"inherit"},text:{padding:"6px 8px"},textPrimary:{color:e.palette.primary.main,"&:hover":{backgroundColor:(0,d.fade)(e.palette.primary.main,e.palette.action.hoverOpacity),"@media (hover: none)":{backgroundColor:"transparent"}}},textSecondary:{color:e.palette.secondary.main,"&:hover":{backgroundColor:(0,d.fade)(e.palette.secondary.main,e.palette.action.hoverOpacity),"@media (hover: none)":{backgroundColor:"transparent"}}},outlined:{padding:"5px 15px",border:"1px solid ".concat("light"===e.palette.type?"rgba(0, 0, 0, 0.23)":"rgba(255, 255, 255, 0.23)"),"&$disabled":{border:"1px solid ".concat(e.palette.action.disabledBackground)}},outlinedPrimary:{color:e.palette.primary.main,border:"1px solid ".concat((0,d.fade)(e.palette.primary.main,.5)),"&:hover":{border:"1px solid ".concat(e.palette.primary.main),backgroundColor:(0,d.fade)(e.palette.primary.main,e.palette.action.hoverOpacity),"@media (hover: none)":{backgroundColor:"transparent"}}},outlinedSecondary:{color:e.palette.secondary.main,border:"1px solid ".concat((0,d.fade)(e.palette.secondary.main,.5)),"&:hover":{border:"1px solid ".concat(e.palette.secondary.main),backgroundColor:(0,d.fade)(e.palette.secondary.main,e.palette.action.hoverOpacity),"@media (hover: none)":{backgroundColor:"transparent"}},"&$disabled":{border:"1px solid ".concat(e.palette.action.disabled)}},contained:{color:e.palette.getContrastText(e.palette.grey[300]),backgroundColor:e.palette.grey[300],boxShadow:e.shadows[2],"&:hover":{backgroundColor:e.palette.grey.A100,boxShadow:e.shadows[4],"@media (hover: none)":{boxShadow:e.shadows[2],backgroundColor:e.palette.grey[300]},"&$disabled":{backgroundColor:e.palette.action.disabledBackground}},"&$focusVisible":{boxShadow:e.shadows[6]},"&:active":{boxShadow:e.shadows[8]},"&$disabled":{color:e.palette.action.disabled,boxShadow:e.shadows[0],backgroundColor:e.palette.action.disabledBackground}},containedPrimary:{color:e.palette.primary.contrastText,backgroundColor:e.palette.primary.main,"&:hover":{backgroundColor:e.palette.primary.dark,"@media (hover: none)":{backgroundColor:e.palette.primary.main}}},containedSecondary:{color:e.palette.secondary.contrastText,backgroundColor:e.palette.secondary.main,"&:hover":{backgroundColor:e.palette.secondary.dark,"@media (hover: none)":{backgroundColor:e.palette.secondary.main}}},disableElevation:{boxShadow:"none","&:hover":{boxShadow:"none"},"&$focusVisible":{boxShadow:"none"},"&:active":{boxShadow:"none"},"&$disabled":{boxShadow:"none"}},focusVisible:{},disabled:{},colorInherit:{color:"inherit",borderColor:"currentColor"},textSizeSmall:{padding:"4px 5px",fontSize:e.typography.pxToRem(13)},textSizeLarge:{padding:"8px 11px",fontSize:e.typography.pxToRem(15)},outlinedSizeSmall:{padding:"3px 9px",fontSize:e.typography.pxToRem(13)},outlinedSizeLarge:{padding:"7px 21px",fontSize:e.typography.pxToRem(15)},containedSizeSmall:{padding:"4px 10px",fontSize:e.typography.pxToRem(13)},containedSizeLarge:{padding:"8px 22px",fontSize:e.typography.pxToRem(15)},sizeSmall:{},sizeLarge:{},fullWidth:{width:"100%"},startIcon:{display:"inherit",marginRight:8,marginLeft:-4,"&$iconSizeSmall":{marginLeft:-2}},endIcon:{display:"inherit",marginRight:-4,marginLeft:8,"&$iconSizeSmall":{marginRight:-2}},iconSizeSmall:{"& > *:first-child":{fontSize:18}},iconSizeMedium:{"& > *:first-child":{fontSize:20}},iconSizeLarge:{"& > *:first-child":{fontSize:22}}}};a.styles=p;var f=l.forwardRef((function(e,a){var t=e.children,n=e.classes,o=e.className,s=e.color,d=void 0===s?"default":s,p=e.component,f=void 0===p?"button":p,b=e.disabled,h=void 0!==b&&b,v=e.disableElevation,g=void 0!==v&&v,y=e.disableFocusRipple,E=void 0!==y&&y,x=e.endIcon,S=e.focusVisibleClassName,w=e.fullWidth,C=void 0!==w&&w,k=e.size,N=void 0===k?"medium":k,_=e.startIcon,z=e.type,O=void 0===z?"button":z,j=e.variant,I=void 0===j?"text":j,T=(0,r.default)(e,["children","classes","className","color","component","disabled","disableElevation","disableFocusRipple","endIcon","focusVisibleClassName","fullWidth","size","startIcon","type","variant"]),R=_&&l.createElement("span",{className:(0,c.default)(n.startIcon,n["iconSize".concat((0,m.default)(N))])},_),P=x&&l.createElement("span",{className:(0,c.default)(n.endIcon,n["iconSize".concat((0,m.default)(N))])},x);return l.createElement(u.default,(0,i.default)({className:(0,c.default)(n.root,n[I],o,"inherit"===d?n.colorInherit:"default"!==d&&n["".concat(I).concat((0,m.default)(d))],"medium"!==N&&[n["".concat(I,"Size").concat((0,m.default)(N))],n["size".concat((0,m.default)(N))]],g&&n.disableElevation,h&&n.disabled,C&&n.fullWidth),component:f,disabled:h,focusRipple:!E,focusVisibleClassName:(0,c.default)(n.focusVisible,S),ref:a,type:O},T),l.createElement("span",{className:n.label},R,t,P))})),b=(0,s.default)(p,{name:"MuiButton"})(f);a.default=b},1429:function(e,a,t){"use strict";var n=t(1409),o=t(690);Object.defineProperty(a,"__esModule",{value:!0}),a.default=a.styles=void 0;var r=o(t(174)),i=o(t(154)),l=n(t(0)),c=(o(t(2)),o(t(3))),s=(t(30),o(t(235))),d=o(t(458)),u=o(t(459)),m=o(t(456)),p=o(t(175)),f=o(t(236)),b=o(t(457)),h=o(t(1411)),v={standard:s.default,filled:d.default,outlined:u.default},g={root:{}};a.styles=g;var y=l.forwardRef((function(e,a){var t=e.autoComplete,n=e.autoFocus,o=void 0!==n&&n,s=e.children,d=e.classes,u=e.className,h=e.color,g=void 0===h?"primary":h,y=e.defaultValue,E=e.disabled,x=void 0!==E&&E,S=e.error,w=void 0!==S&&S,C=e.FormHelperTextProps,k=e.fullWidth,N=void 0!==k&&k,_=e.helperText,z=e.hiddenLabel,O=e.id,j=e.InputLabelProps,I=e.inputProps,T=e.InputProps,R=e.inputRef,P=e.label,L=e.multiline,U=void 0!==L&&L,F=e.name,V=e.onBlur,B=e.onChange,M=e.onFocus,A=e.placeholder,W=e.required,$=void 0!==W&&W,D=e.rows,H=e.rowsMax,q=e.select,Y=void 0!==q&&q,G=e.SelectProps,K=e.type,J=e.value,Q=e.variant,X=void 0===Q?"standard":Q,Z=(0,i.default)(e,["autoComplete","autoFocus","children","classes","className","color","defaultValue","disabled","error","FormHelperTextProps","fullWidth","helperText","hiddenLabel","id","InputLabelProps","inputProps","InputProps","inputRef","label","multiline","name","onBlur","onChange","onFocus","placeholder","required","rows","rowsMax","select","SelectProps","type","value","variant"]);var ee={};if("outlined"===X&&(j&&"undefined"!==typeof j.shrink&&(ee.notched=j.shrink),P)){var ae,te=null!==(ae=null===j||void 0===j?void 0:j.required)&&void 0!==ae?ae:$;ee.label=l.createElement(l.Fragment,null,P,te&&"\xa0*")}Y&&(G&&G.native||(ee.id=void 0),ee["aria-describedby"]=void 0);var ne=_&&O?"".concat(O,"-helper-text"):void 0,oe=P&&O?"".concat(O,"-label"):void 0,re=v[X],ie=l.createElement(re,(0,r.default)({"aria-describedby":ne,autoComplete:t,autoFocus:o,defaultValue:y,fullWidth:N,multiline:U,name:F,rows:D,rowsMax:H,type:K,value:J,id:O,inputRef:R,onBlur:V,onChange:B,onFocus:M,placeholder:A,inputProps:I},ee,T));return l.createElement(p.default,(0,r.default)({className:(0,c.default)(d.root,u),disabled:x,error:w,fullWidth:N,hiddenLabel:z,ref:a,required:$,color:g,variant:X},Z),P&&l.createElement(m.default,(0,r.default)({htmlFor:O,id:oe},j),P),Y?l.createElement(b.default,(0,r.default)({"aria-describedby":ne,id:O,labelId:oe,value:J,input:ie},G),s):ie,_&&l.createElement(f.default,(0,r.default)({id:ne},C),_))})),E=(0,h.default)(g,{name:"MuiTextField"})(y);a.default=E},1498:function(e,a,t){"use strict";var n=t(690);Object.defineProperty(a,"__esModule",{value:!0}),a.default=void 0;var o=n(t(0)),r=(0,n(t(1410)).default)(o.default.createElement("path",{d:"M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"}),"Launch");a.default=r},1558:function(e,a,t){"use strict";var n=t(62),o=t.n(n);function r(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",t=o()({method:"post",url:"https://test.udros.com/api/api/get_universities",data:{school_id:e,search:a},config:{headers:{"Access-Control-Allow-Origin":"*","Content-Type":"application/json"}}});return function(e){return t.then((function(a){return e({type:"GET ALL UNIVERSITY DATA",payload:a.data})}))}}t.d(a,"a",(function(){return"GET ALL UNIVERSITY DATA"})),t.d(a,"c",(function(){return r})),t.d(a,"b",(function(){return"SUSPEND_UNIVERSITY"}))},175:function(e,a,t){"use strict";t.r(a);var n=t(694);t.d(a,"default",(function(){return n.a}));var o=t(100);t.d(a,"useFormControl",(function(){return o.a}))},2260:function(e,a,t){"use strict";t.r(a);var n=t(20),o=t(0),r=t.n(o),i=t(233),l=t(6),c=t(273),s=t(1558),d=t(69),u=t(8),m=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,a=arguments.length>1?arguments[1]:void 0;switch(a.type){case s.a:case s.b:return Object(u.a)(Object(u.a)({},e),{},{data:Object(u.a)({},a.payload)});default:return e}},p=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,a=arguments.length>1?arguments[1]:void 0;switch(a.type){case s.b:console.log("success");break;default:return e}},f=Object(d.d)({widgets:m,card:p}),b=t(1348),h=t(1623),v=t(203),g=t(195),y=t(1376),E=t(1417),x=t.n(E),S=t(1498),w=t.n(S),C=t(10),k=t(114),N=t(62),_=t.n(N),z=Object(b.a)((function(e){return{root:{flexGrow:1},paper:{padding:e.spacing(2),margin:"auto",marginBottom:15},button:{margin:e.spacing(1)},msg_button:{color:"#ddd"},view_button:{},suspend_button:{},unsuspend_button:{},pagination:{"& > *":{marginTop:e.spacing(2)}},image:{width:128,height:128},img:{margin:"auto",display:"block",maxWidth:"100%",maxHeight:"100%",objectFit:"fill"}}}));function O(e){var a=z(),t=C.a.merge({},e.data);t.city=null!=t.city?t.city.replace('["',""):t.city,t.city=null!=t.city?t.city.replace('"]',""):t.city,t.users=null!=t.users?t.users.replace('["',""):t.users,t.users=null!=t.users?t.users.replace('"]',""):t.users,t.emails=null!=t.emails?t.emails.replace('["',""):t.emails,t.emails=null!=t.emails?t.emails.replace('"]',""):t.emails;var o=r.a.useState(1===e.data.state?"Suspend":"Unsuspend"),l=Object(n.a)(o,2),c=l[0],s=l[1],d=r.a.useState(1===e.data.state?"rgb(245, 68, 0)":"#039be5"),u=Object(n.a)(d,2),m=u[0],p=u[1];return r.a.createElement("div",{className:a.root},r.a.createElement(v.a,{className:a.paper},r.a.createElement(h.a,{container:!0,spacing:2},r.a.createElement(h.a,{item:!0,xs:12,sm:12,md:3},r.a.createElement(g.a,{className:a.image},r.a.createElement("img",{className:a.img,alt:"complex",src:null!=t.logo?"/assets/images/university/"+t.logo:"/assets/images/university/university.png"}))),r.a.createElement(h.a,{item:!0,xs:12,sm:12,md:9,container:!0},r.a.createElement(h.a,{item:!0,container:!0},r.a.createElement(h.a,{item:!0,xs:12,sm:12,md:12,container:!0},r.a.createElement(h.a,{item:!0,xs:6},r.a.createElement(i.a,{gutterBottom:!0,component:"div"},"Uni Name: ",t.name)),r.a.createElement(h.a,{item:!0,xs:6},r.a.createElement(i.a,{gutterBottom:!0,component:"div"},"ID: ",t.id)))),r.a.createElement(h.a,{item:!0,container:!0},r.a.createElement(h.a,{item:!0,xs:12,sm:12,md:12,container:!0},r.a.createElement(h.a,{item:!0,xs:6},r.a.createElement(i.a,{gutterBottom:!0,component:"div"},"Uni Email: ",t.email)),r.a.createElement(h.a,{item:!0,xs:6},r.a.createElement(i.a,{gutterBottom:!0,component:"div"},"Uni Phone: ",t.phone)))),r.a.createElement(h.a,{item:!0,container:!0},r.a.createElement(h.a,{item:!0,xs:12,sm:12,md:12,container:!0},r.a.createElement(h.a,{item:!0,xs:6},r.a.createElement(i.a,{gutterBottom:!0,component:"div"},"Contact Person: ",t.users)),r.a.createElement(h.a,{item:!0,xs:6},r.a.createElement(i.a,{gutterBottom:!0,component:"div"},"Contact Email: ",t.emails)))))),r.a.createElement(h.a,{container:!0,spacing:2},r.a.createElement(h.a,{item:!0,xs:12,sm:12,md:6},r.a.createElement(h.a,{item:!0,container:!0},r.a.createElement(h.a,{item:!0,xs:12,sm:12,md:12,container:!0},r.a.createElement(h.a,{item:!0,xs:6},r.a.createElement(i.a,{gutterBottom:!0,component:"div"},"City: ",void 0!==t.city&&""!==t.city&&null!==t.city&&"null"!==t.city?t.city:"")),r.a.createElement(h.a,{item:!0,xs:6},r.a.createElement(i.a,{gutterBottom:!0,component:"div"},"Ministry: ",void 0!==t.website&&""!==t.website&&null!==t.website?"Yes":"No"," ",r.a.createElement("a",{target:"_blank",href:t.website.includes("http")?t.website:"https://"+t.website},r.a.createElement(w.a,null))))))),r.a.createElement(h.a,{item:!0,xs:12,sm:12,md:6,container:!0},r.a.createElement(x.a,{m:"auto"},r.a.createElement(y.a,{variant:"contained",color:"primary",style:{background:"#039be5"},className:a.button+a.msg_button},"Message"),r.a.createElement(y.a,{variant:"contained",color:"primary",style:{background:"#039be5"},className:a.button,component:k.a,to:"/admin/edit_univ/".concat(t.id)},"View"),r.a.createElement(y.a,{variant:"contained",color:"primary",style:{background:m},className:a.button,onClick:function(){_()({method:"post",url:"https://test.udros.com/api/api/university_suspend",data:{university_id:t.id},config:{headers:{"Access-Control-Allow-Origin":"*","Content-Type":"application/json"}}}).then((function(e){s(1===e.data.state?"Suspend":"Unsuspend"),p(1===e.data.state?"rgb(245, 68, 0)":"#039be5")}))}},c))))))}var j=t(2272),I=Object(b.a)((function(e){return{root:{"& > *":{marginTop:e.spacing(2)}}}}));function T(e){var a=I(),t=Object(l.b)(),n=Object(l.c)((function(e){return e.auth.user}));return r.a.createElement("div",{className:a.root},r.a.createElement(j.a,{count:Math.ceil(e.data/5),color:"primary",onChange:function(a,o){console.log(o),_()({method:"post",url:"https://test.udros.com/api/api/get_universities",data:{school_id:n.school_id,search:e.search,page:o},config:{headers:{"Access-Control-Allow-Origin":"*","Content-Type":"application/json"}}}).then((function(e){return t({type:s.a,payload:e.data})}))}}))}var R=t(1448),P=t.n(R),L=t(1561),U=t.n(L),F=t(1566),V=t.n(F),B=t(695),M=t(694),A=t(1426),W=t.n(A),$=Object(b.a)((function(e){return{root:{display:"flex",flexWrap:"wrap","& > *":{margin:e.spacing(1),width:e.spacing(16),height:e.spacing(16)}},formControl:{margin:e.spacing(1),width:"100%",minWidth:120},selectEmpty:{marginTop:e.spacing(2)},search_page:{width:"100%",height:"auto"},search_form:{width:"100%",marginLeft:15,marginRight:15},subscription_button:{width:"80%",textAlign:"center",margin:"auto",height:50}}}));function D(){var e=$(),a=r.a.useState(""),t=Object(n.a)(a,2);t[0],t[1];return r.a.createElement("div",{className:e.root},r.a.createElement(v.a,{elevation:3,className:e.search_page},r.a.createElement("div",{className:"m-20"},r.a.createElement(P.a,{container:!0},r.a.createElement(P.a,{item:!0,container:!0,xs:12,sm:6,md:3},r.a.createElement(M.a,{variant:"outlined",className:e.formControl},r.a.createElement(B.a,{id:"demo-simple-select-outlined-label"},"Countries Worldwide"),r.a.createElement(U.a,{labelId:"demo-simple-select-outlined-label",className:e.search_form,label:"Countries Worldwide"},r.a.createElement(V.a,{value:"us"},"United State"),r.a.createElement(V.a,{value:"ca"},"Canada"),r.a.createElement(V.a,{value:"uk"},"UK")))),r.a.createElement(P.a,{item:!0,container:!0,xs:12,sm:6,md:3},r.a.createElement(M.a,{variant:"outlined",className:e.formControl},r.a.createElement(B.a,null,"States If US or Canada"),r.a.createElement(U.a,{labelId:"demo-simple-select-outlined-label",className:e.search_form,label:"States If US or Canada"},r.a.createElement(V.a,{value:"us"},"United State"),r.a.createElement(V.a,{value:"ca"},"Canada"),r.a.createElement(V.a,{value:"uk"},"UK")))),r.a.createElement(P.a,{item:!0,container:!0,xs:12,sm:6,md:3},r.a.createElement(M.a,{variant:"outlined",className:e.formControl},r.a.createElement(B.a,null,"Cities of Selected country"),r.a.createElement(U.a,{className:e.search_form,label:"Cities of Selected country"},r.a.createElement(V.a,{value:"us"},"United State"),r.a.createElement(V.a,{value:"ca"},"Canada"),r.a.createElement(V.a,{value:"uk"},"UK")))),r.a.createElement(P.a,{item:!0,container:!0,xs:12,sm:6,md:3},r.a.createElement(W.a,{variant:"contained",color:"primary",component:k.a,to:"/admin/update_packages",className:e.subscription_button},"Edit Subscription"))))))}var H=t(1429),q=t.n(H);a.default=Object(c.a)("manageUniversity",f)((function(){var e=Object(l.b)(),a=Object(l.c)((function(e){return e.manageUniversity.widgets})),t=Object(l.c)((function(e){return e.auth.user})),c=r.a.useState(""),d=Object(n.a)(c,2),u=d[0],m=d[1];return Object(o.useEffect)((function(){e(s.c(t.school_id,""))}),[e]),a?r.a.createElement("div",{className:"w-full"},r.a.createElement(i.a,{className:"text-32 p-20",component:"h3",style:{backgroundColor:"#0098E0",color:"#FFF"}},"Manange Universities"),r.a.createElement("div",{className:"p-20"},r.a.createElement("div",{className:"widget flex w-full sm:w-1/3 pb-16"},r.a.createElement(q.a,{label:"Search",value:u,onChange:function(a){m(a.target.value),e(s.c(t.school_id,a.target.value))},className:"w-full"})),a.data.universities.data.map((function(e,t){return r.a.createElement(O,{data:e,page:a.current_page,className:"w-full",key:t})})),r.a.createElement(P.a,{container:!0,spacing:0,direction:"column",alignItems:"center",justify:"center"},r.a.createElement(P.a,{item:!0,xs:12},r.a.createElement(T,{data:a.data.universities.total,search:u}))),r.a.createElement(D,null))):null}))},235:function(e,a,t){"use strict";t.r(a);var n=t(461);t.d(a,"default",(function(){return n.a}))},236:function(e,a,t){"use strict";t.r(a);var n=t(691);t.d(a,"default",(function(){return n.a}))},456:function(e,a,t){"use strict";t.r(a);var n=t(695);t.d(a,"default",(function(){return n.a}))},457:function(e,a,t){"use strict";t.r(a);var n=t(696);t.d(a,"default",(function(){return n.a}))}}]);