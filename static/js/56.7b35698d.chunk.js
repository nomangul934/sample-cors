(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[56],{1414:function(e,a,t){"use strict";Object.defineProperty(a,"__esModule",{value:!0}),a.default=function(e){0;return e.charAt(0).toUpperCase()+e.slice(1)}},1426:function(e,a,t){"use strict";var o=t(1409),n=t(690);Object.defineProperty(a,"__esModule",{value:!0}),a.default=a.styles=void 0;var i=n(t(154)),r=n(t(174)),d=o(t(0)),l=(n(t(2)),n(t(3))),c=n(t(1411)),s=t(237),p=n(t(193)),u=n(t(1414)),m=function(e){return{root:(0,r.default)((0,r.default)({},e.typography.button),{},{boxSizing:"border-box",minWidth:64,padding:"6px 16px",borderRadius:e.shape.borderRadius,color:e.palette.text.primary,transition:e.transitions.create(["background-color","box-shadow","border"],{duration:e.transitions.duration.short}),"&:hover":{textDecoration:"none",backgroundColor:(0,s.fade)(e.palette.text.primary,e.palette.action.hoverOpacity),"@media (hover: none)":{backgroundColor:"transparent"},"&$disabled":{backgroundColor:"transparent"}},"&$disabled":{color:e.palette.action.disabled}}),label:{width:"100%",display:"inherit",alignItems:"inherit",justifyContent:"inherit"},text:{padding:"6px 8px"},textPrimary:{color:e.palette.primary.main,"&:hover":{backgroundColor:(0,s.fade)(e.palette.primary.main,e.palette.action.hoverOpacity),"@media (hover: none)":{backgroundColor:"transparent"}}},textSecondary:{color:e.palette.secondary.main,"&:hover":{backgroundColor:(0,s.fade)(e.palette.secondary.main,e.palette.action.hoverOpacity),"@media (hover: none)":{backgroundColor:"transparent"}}},outlined:{padding:"5px 15px",border:"1px solid ".concat("light"===e.palette.type?"rgba(0, 0, 0, 0.23)":"rgba(255, 255, 255, 0.23)"),"&$disabled":{border:"1px solid ".concat(e.palette.action.disabledBackground)}},outlinedPrimary:{color:e.palette.primary.main,border:"1px solid ".concat((0,s.fade)(e.palette.primary.main,.5)),"&:hover":{border:"1px solid ".concat(e.palette.primary.main),backgroundColor:(0,s.fade)(e.palette.primary.main,e.palette.action.hoverOpacity),"@media (hover: none)":{backgroundColor:"transparent"}}},outlinedSecondary:{color:e.palette.secondary.main,border:"1px solid ".concat((0,s.fade)(e.palette.secondary.main,.5)),"&:hover":{border:"1px solid ".concat(e.palette.secondary.main),backgroundColor:(0,s.fade)(e.palette.secondary.main,e.palette.action.hoverOpacity),"@media (hover: none)":{backgroundColor:"transparent"}},"&$disabled":{border:"1px solid ".concat(e.palette.action.disabled)}},contained:{color:e.palette.getContrastText(e.palette.grey[300]),backgroundColor:e.palette.grey[300],boxShadow:e.shadows[2],"&:hover":{backgroundColor:e.palette.grey.A100,boxShadow:e.shadows[4],"@media (hover: none)":{boxShadow:e.shadows[2],backgroundColor:e.palette.grey[300]},"&$disabled":{backgroundColor:e.palette.action.disabledBackground}},"&$focusVisible":{boxShadow:e.shadows[6]},"&:active":{boxShadow:e.shadows[8]},"&$disabled":{color:e.palette.action.disabled,boxShadow:e.shadows[0],backgroundColor:e.palette.action.disabledBackground}},containedPrimary:{color:e.palette.primary.contrastText,backgroundColor:e.palette.primary.main,"&:hover":{backgroundColor:e.palette.primary.dark,"@media (hover: none)":{backgroundColor:e.palette.primary.main}}},containedSecondary:{color:e.palette.secondary.contrastText,backgroundColor:e.palette.secondary.main,"&:hover":{backgroundColor:e.palette.secondary.dark,"@media (hover: none)":{backgroundColor:e.palette.secondary.main}}},disableElevation:{boxShadow:"none","&:hover":{boxShadow:"none"},"&$focusVisible":{boxShadow:"none"},"&:active":{boxShadow:"none"},"&$disabled":{boxShadow:"none"}},focusVisible:{},disabled:{},colorInherit:{color:"inherit",borderColor:"currentColor"},textSizeSmall:{padding:"4px 5px",fontSize:e.typography.pxToRem(13)},textSizeLarge:{padding:"8px 11px",fontSize:e.typography.pxToRem(15)},outlinedSizeSmall:{padding:"3px 9px",fontSize:e.typography.pxToRem(13)},outlinedSizeLarge:{padding:"7px 21px",fontSize:e.typography.pxToRem(15)},containedSizeSmall:{padding:"4px 10px",fontSize:e.typography.pxToRem(13)},containedSizeLarge:{padding:"8px 22px",fontSize:e.typography.pxToRem(15)},sizeSmall:{},sizeLarge:{},fullWidth:{width:"100%"},startIcon:{display:"inherit",marginRight:8,marginLeft:-4,"&$iconSizeSmall":{marginLeft:-2}},endIcon:{display:"inherit",marginRight:-4,marginLeft:8,"&$iconSizeSmall":{marginRight:-2}},iconSizeSmall:{"& > *:first-child":{fontSize:18}},iconSizeMedium:{"& > *:first-child":{fontSize:20}},iconSizeLarge:{"& > *:first-child":{fontSize:22}}}};a.styles=m;var b=d.forwardRef((function(e,a){var t=e.children,o=e.classes,n=e.className,c=e.color,s=void 0===c?"default":c,m=e.component,b=void 0===m?"button":m,f=e.disabled,h=void 0!==f&&f,y=e.disableElevation,g=void 0!==y&&y,v=e.disableFocusRipple,x=void 0!==v&&v,S=e.endIcon,E=e.focusVisibleClassName,C=e.fullWidth,k=void 0!==C&&C,z=e.size,w=void 0===z?"medium":z,I=e.startIcon,T=e.type,N=void 0===T?"button":T,R=e.variant,_=void 0===R?"text":R,O=(0,i.default)(e,["children","classes","className","color","component","disabled","disableElevation","disableFocusRipple","endIcon","focusVisibleClassName","fullWidth","size","startIcon","type","variant"]),j=I&&d.createElement("span",{className:(0,l.default)(o.startIcon,o["iconSize".concat((0,u.default)(w))])},I),A=S&&d.createElement("span",{className:(0,l.default)(o.endIcon,o["iconSize".concat((0,u.default)(w))])},S);return d.createElement(p.default,(0,r.default)({className:(0,l.default)(o.root,o[_],n,"inherit"===s?o.colorInherit:"default"!==s&&o["".concat(_).concat((0,u.default)(s))],"medium"!==w&&[o["".concat(_,"Size").concat((0,u.default)(w))],o["size".concat((0,u.default)(w))]],g&&o.disableElevation,h&&o.disabled,k&&o.fullWidth),component:b,disabled:h,focusRipple:!x,focusVisibleClassName:(0,l.default)(o.focusVisible,E),ref:a,type:N},O),d.createElement("span",{className:o.label},j,t,A))})),f=(0,c.default)(m,{name:"MuiButton"})(b);a.default=f},193:function(e,a,t){"use strict";t.r(a);var o=t(195);t.d(a,"default",(function(){return o.a}))},2271:function(e,a,t){"use strict";t.r(a);var o=t(0),n=t.n(o),i=t(233),r=t(6),d=t(273),l=t(62),c=t.n(l);var s=t(69),p=t(8),u=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,a=arguments.length>1?arguments[1]:void 0;switch(a.type){case"GET DELETE UNIVERSITIES":case"DELETE UNIVERSITY":return Object(p.a)(Object(p.a)({},e),{},{data:Object(p.a)({},a.payload)});default:return e}},m=Object(s.d)({universityData:u}),b=t(1443),f=t.n(b),h=t(10),y=t(1426),g=t.n(y);t(114);function v(e){h.a.merge({},e.data),Object(r.b)();return n.a.createElement(f.a,{title:"",columns:[{title:"ID",field:"id"},{title:"UNIVERSITY NAME",field:"univ_name"},{title:"MAJAR",field:"majar"},{title:"TIME",field:"time"},{title:"SESSION LEADER",field:"session_leader"},{title:"CONTACT EMAIL",field:"contact_email"},{title:"CONTACT NUMBER",field:"contact_number"},{title:"CITY",field:"city"}],data:[{id:1,univ_name:"Dubai Uni",majar:"Design",time:"9 - 9:45",session_leader:"Ahemd",contact_email:"Ahmed@.com",contact_number:"000000000",city:"dubai"},{id:2,univ_name:"Dubai Uni",majar:"Design",time:"9 - 9:45",session_leader:"Ahemd",contact_email:"Ahmed@.com",contact_number:"000000000",city:"dubai"},{id:3,univ_name:"Dubai Uni",majar:"Design",time:"9 - 9:45",session_leader:"Ahemd",contact_email:"Ahmed@.com",contact_number:"000000000",city:"dubai"}],actions:[function(e){return{icon:function(){return n.a.createElement(g.a,{color:"primary",variant:"contained",style:{textTransform:"none",background:"#039be5"},size:"small"},"View")}}},function(e){return{icon:function(){return n.a.createElement(g.a,{color:"primary",variant:"contained",style:{textTransform:"none",background:"#039be5"},size:"small"},"Edit")}}}],options:{actionsColumnIndex:-1}})}a.default=Object(d.a)("deleteUniversity",m)((function(){var e=Object(r.b)(),a=Object(r.c)((function(e){return e.deleteUniversity.universityData}));return Object(o.useEffect)((function(){e(function(){var e=c()({method:"post",url:"https://test.udros.com/api/api/get_delete_universities",data:{},config:{headers:{"Access-Control-Allow-Origin":"*","Content-Type":"application/json"}}});return function(a){return e.then((function(e){return a({type:"GET DELETE UNIVERSITIES",payload:e.data})}))}}())}),[e]),a?n.a.createElement("div",{className:"w-full"},n.a.createElement(i.a,{className:"text-32 p-20",component:"h3",style:{backgroundColor:"#0098E0",color:"#FFF"}},"Confirmed Session"),n.a.createElement("div",{className:"p-20"},n.a.createElement(v,{data:a.data,className:"mt-32"}))):null}))}}]);