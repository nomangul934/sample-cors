(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[144],{1440:function(e,t,a){"use strict";var n=a(5),i=a(1),r=a(0),l=a.n(r),o=(a(2),a(3)),c=a(11),s=[0,1,2,3,4,5,6,7,8,9,10],m=["auto",!0,1,2,3,4,5,6,7,8,9,10,11,12];function d(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:1,a=parseFloat(e);return"".concat(a/t).concat(String(e).replace(String(a),"")||"px")}var u=l.a.forwardRef((function(e,t){var a=e.alignContent,r=void 0===a?"stretch":a,c=e.alignItems,s=void 0===c?"stretch":c,m=e.classes,d=e.className,u=e.component,f=void 0===u?"div":u,g=e.container,p=void 0!==g&&g,x=e.direction,v=void 0===x?"row":x,E=e.item,h=void 0!==E&&E,b=e.justify,w=void 0===b?"flex-start":b,y=e.lg,j=void 0!==y&&y,C=e.md,W=void 0!==C&&C,S=e.sm,O=void 0!==S&&S,N=e.spacing,I=void 0===N?0:N,k=e.wrap,z=void 0===k?"wrap":k,M=e.xl,F=void 0!==M&&M,G=e.xs,U=void 0!==G&&G,B=e.zeroMinWidth,D=void 0!==B&&B,P=Object(n.a)(e,["alignContent","alignItems","classes","className","component","container","direction","item","justify","lg","md","sm","spacing","wrap","xl","xs","zeroMinWidth"]),T=Object(o.default)(m.root,d,p&&[m.container,0!==I&&m["spacing-xs-".concat(String(I))]],h&&m.item,D&&m.zeroMinWidth,"row"!==v&&m["direction-xs-".concat(String(v))],"wrap"!==z&&m["wrap-xs-".concat(String(z))],"stretch"!==s&&m["align-items-xs-".concat(String(s))],"stretch"!==r&&m["align-content-xs-".concat(String(r))],"flex-start"!==w&&m["justify-xs-".concat(String(w))],!1!==U&&m["grid-xs-".concat(String(U))],!1!==O&&m["grid-sm-".concat(String(O))],!1!==W&&m["grid-md-".concat(String(W))],!1!==j&&m["grid-lg-".concat(String(j))],!1!==F&&m["grid-xl-".concat(String(F))]);return l.a.createElement(f,Object(i.a)({className:T,ref:t},P))})),f=Object(c.a)((function(e){return Object(i.a)({root:{},container:{boxSizing:"border-box",display:"flex",flexWrap:"wrap",width:"100%"},item:{boxSizing:"border-box",margin:"0"},zeroMinWidth:{minWidth:0},"direction-xs-column":{flexDirection:"column"},"direction-xs-column-reverse":{flexDirection:"column-reverse"},"direction-xs-row-reverse":{flexDirection:"row-reverse"},"wrap-xs-nowrap":{flexWrap:"nowrap"},"wrap-xs-wrap-reverse":{flexWrap:"wrap-reverse"},"align-items-xs-center":{alignItems:"center"},"align-items-xs-flex-start":{alignItems:"flex-start"},"align-items-xs-flex-end":{alignItems:"flex-end"},"align-items-xs-baseline":{alignItems:"baseline"},"align-content-xs-center":{alignContent:"center"},"align-content-xs-flex-start":{alignContent:"flex-start"},"align-content-xs-flex-end":{alignContent:"flex-end"},"align-content-xs-space-between":{alignContent:"space-between"},"align-content-xs-space-around":{alignContent:"space-around"},"justify-xs-center":{justifyContent:"center"},"justify-xs-flex-end":{justifyContent:"flex-end"},"justify-xs-space-between":{justifyContent:"space-between"},"justify-xs-space-around":{justifyContent:"space-around"},"justify-xs-space-evenly":{justifyContent:"space-evenly"}},function(e,t){var a={};return s.forEach((function(n){var i=e.spacing(n);0!==i&&(a["spacing-".concat(t,"-").concat(n)]={margin:"-".concat(d(i,2)),width:"calc(100% + ".concat(d(i),")"),"& > $item":{padding:d(i,2)}})})),a}(e,"xs"),{},e.breakpoints.keys.reduce((function(t,a){return function(e,t,a){var n={};m.forEach((function(e){var t="grid-".concat(a,"-").concat(e);if(!0!==e)if("auto"!==e){var i="".concat(Math.round(e/12*1e8)/1e6,"%");n[t]={flexBasis:i,flexGrow:0,maxWidth:i}}else n[t]={flexBasis:"auto",flexGrow:0,maxWidth:"none"};else n[t]={flexBasis:0,flexGrow:1,maxWidth:"100%"}})),"xs"===a?Object(i.a)(e,n):e[t.breakpoints.up(a)]=n}(t,e,a),t}),{}))}),{name:"MuiGrid"})(u);t.a=f},2889:function(e,t,a){"use strict";a.r(t),a.d(t,"default",(function(){return j}));var n=a(0),i=a.n(n),r=a(1440),l=a(209),o=a(1382),c=a(579),s=a(1368),m=a(11),d=a(1377),u=a(3),f=a(1386),g=a(717),p=a(476),x=a(1378),v=a(1401),E=a(715),h=a(724),b=Object(s.a)((function(e){return{productImageUpload:{transitionProperty:"box-shadow",transitionDuration:e.transitions.duration.short,transitionTimingFunction:e.transitions.easing.easeInOut},formControl:{minWidth:400,margin:30},root:{flexGrow:1,padding:e.spacing(0,2),"& > *":{margin:e.spacing(2)}},root1:{"& > *":{width:900,maxWidth:900,margin:20}},root2:{"& > *":{width:430,maxWidth:430,margin:20}},paper:{padding:e.spacing(2),margin:20},image:{width:100,height:100},img:{maxWidth:100,maxHeight:100,height:80,width:100}}})),w=Object(m.a)((function(e){return{root:{width:130,float:"right",color:e.palette.getContrastText(c.a[500]),backgroundColor:"#0011bb","&:hover":{backgroundColor:"#0011bb"}}}}))(o.a);function y(e){var t=e.target.files[0];if(t){var a=new FileReader;a.readAsBinaryString(t),a.onerror=function(){console.log("error on load image")}}}function j(){var e=b();return i.a.createElement("div",{className:e.root},i.a.createElement(l.a,{className:e.paper},i.a.createElement("h2",null,"Add User")),i.a.createElement(l.a,{className:e.paper},i.a.createElement(r.a,{item:!0,container:!0,spacing:2},i.a.createElement(r.a,{item:!0,xs:2,container:!0,direction:"column",justify:"center"},i.a.createElement("div",null,i.a.createElement("div",{className:"flex justify-center sm:justify-start flex-wrap -mx-8"},i.a.createElement("label",{htmlFor:"button-file",className:Object(u.default)(e.productImageUpload,"flex items-center justify-center relative w-128 h-128 rounded-4 mx-8 mb-16 overflow-hidden cursor-pointer shadow-1 hover:shadow-5")},i.a.createElement("input",{accept:"image/*",className:"hidden",id:"button-file",type:"file",onChange:y}),i.a.createElement(d.a,{fontSize:"large",color:"action"},"cloud_upload"))))),i.a.createElement(r.a,{item:!0,sm:!0,container:!0,spacing:2},i.a.createElement(r.a,{item:!0,container:!0,justify:"flex-end"},i.a.createElement(r.a,{item:!0,sm:12},i.a.createElement(f.a,{id:"outlined-basic",fullWidth:!0,label:"School Name",variant:"outlined"}))),i.a.createElement(r.a,{item:!0,container:!0,justify:"flex-end",spacing:1},i.a.createElement(r.a,{item:!0,sm:6},i.a.createElement(f.a,{id:"outlined-basic",fullWidth:!0,label:"Mobile Number",variant:"outlined"})),i.a.createElement(r.a,{item:!0,sm:6},i.a.createElement(f.a,{id:"outlined-basic",fullWidth:!0,label:"Email",variant:"outlined"}))),i.a.createElement(r.a,{item:!0,container:!0,justify:"flex-end",spacing:1},i.a.createElement(r.a,{item:!0,sm:6},i.a.createElement(f.a,{id:"outlined-basic",fullWidth:!0,label:"Phone",variant:"outlined"})),i.a.createElement(r.a,{item:!0,sm:6},i.a.createElement(f.a,{id:"outlined-basic",fullWidth:!0,label:"EXT",variant:"outlined"}))),i.a.createElement(r.a,{item:!0,container:!0,justify:"flex-start",spacing:1},i.a.createElement(r.a,{item:!0,sm:6},i.a.createElement(f.a,{id:"outlined-basic",fullWidth:!0,label:"Title",variant:"outlined"}))),i.a.createElement(r.a,{item:!0,container:!0,justify:"flex-end",spacing:1},i.a.createElement(r.a,{item:!0,sm:6},i.a.createElement(f.a,{id:"outlined-basic",fullWidth:!0,label:"Password",variant:"outlined"})),i.a.createElement(r.a,{item:!0,sm:6},i.a.createElement(f.a,{id:"outlined-basic",fullWidth:!0,label:"Confirm Password",variant:"outlined"})))),i.a.createElement(r.a,{item:!0,container:!0,justify:"space-between"},i.a.createElement(r.a,{item:!0},i.a.createElement("div",null,i.a.createElement(E.a,{className:e.formControl},i.a.createElement(g.a,{htmlFor:"grouped-native-select"},"University"),i.a.createElement(h.a,{native:!0,defaultValue:"",input:i.a.createElement(p.a,{id:"grouped-native-select"})},i.a.createElement("option",{value:""}),i.a.createElement("optgroup",{label:"Category 1"},i.a.createElement("option",{value:1},"Option 1"),i.a.createElement("option",{value:2},"Option 2")),i.a.createElement("optgroup",{label:"Category 2"},i.a.createElement("option",{value:3},"Option 3"),i.a.createElement("option",{value:4},"Option 4")))),i.a.createElement(E.a,{className:e.formControl},i.a.createElement(g.a,{htmlFor:"grouped-select"},"Select University"),i.a.createElement(h.a,{defaultValue:"",input:i.a.createElement(p.a,{id:"grouped-select"})},i.a.createElement(x.a,{value:""},i.a.createElement("em",null,"None")),i.a.createElement(v.a,null,"Category 1"),i.a.createElement(x.a,{value:1},"Option 1"),i.a.createElement(x.a,{value:2},"Option 2"),i.a.createElement(v.a,null,"Category 2"),i.a.createElement(x.a,{value:3},"Option 3"),i.a.createElement(x.a,{value:4},"Option 4")))))),i.a.createElement(r.a,{item:!0,xs:!0,container:!0,alignItems:"flex-end"},i.a.createElement("div",{className:e.root},i.a.createElement(w,{variant:"contained",color:"primary",className:e.margin},"Add Record"))))))}}}]);