(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[79],{1436:function(e,t,a){"use strict";var n=a(67),r=a(68),l=a(113),c=a(112),i=a(270),o=a(0),s=a.n(o);t.a=function(e,t){return function(a){return function(o){Object(l.a)(p,o);var d=Object(c.a)(p);function p(a){var r;return Object(n.a)(this,p),r=d.call(this,a),Object(i.b)(e,t),r}return Object(r.a)(p,[{key:"render",value:function(){return s.a.createElement(a,this.props)}}]),p}(s.a.PureComponent)}}},1641:function(e,t,a){"use strict";var n=a(73),r=a.n(n);function l(){var e=r.a.get("/api/academy-app/courses");return function(t){return e.then((function(e){return t({type:"[ACADEMY APP] GET COURSES",payload:e.data})}))}}function c(){var e=r.a.get("/api/academy-app/categories");return function(t){return e.then((function(e){return t({type:"[ACADEMY APP] GET CATEGORIES",payload:e.data})}))}}var i=a(7),o=a(49);function s(e){var t=r.a.get("/api/academy-app/course",{params:e});return function(e){return t.then((function(t){return e({type:"[ACADEMY APP] GET COURSE",payload:t.data})}))}}function d(e){return function(t,a){var n=a().academyApp.course.id;r.a.post("/api/academy-app/course/update",Object(i.a)({id:n},e)).then((function(e){return t(Object(o.H)({message:"Course Updated"})),t({type:"[ACADEMY APP] UPDATE COURSE",payload:e.data})}))}}a.d(t,"c",(function(){return"[ACADEMY APP] GET COURSES"})),a.d(t,"a",(function(){return"[ACADEMY APP] GET CATEGORIES"})),a.d(t,"h",(function(){return l})),a.d(t,"f",(function(){return c})),a.d(t,"b",(function(){return"[ACADEMY APP] GET COURSE"})),a.d(t,"d",(function(){return"[ACADEMY APP] SAVE COURSE"})),a.d(t,"e",(function(){return"[ACADEMY APP] UPDATE COURSE"})),a.d(t,"g",(function(){return s})),a.d(t,"i",(function(){return d}))},1721:function(e,t,a){"use strict";var n=a(1),r=a(5),l=a(0),c=a.n(l),i=(a(2),a(3)),o=a(11),s=a(209),d=a(1722),p=c.a.createElement(d.a,null),u=c.a.forwardRef((function(e,t){var a=e.activeStep,l=void 0===a?0:a,o=e.alternativeLabel,d=void 0!==o&&o,u=e.children,m=e.classes,f=e.className,v=e.connector,b=void 0===v?p:v,E=e.nonLinear,h=void 0!==E&&E,y=e.orientation,O=void 0===y?"horizontal":y,x=Object(r.a)(e,["activeStep","alternativeLabel","children","classes","className","connector","nonLinear","orientation"]),g=c.a.isValidElement(b)?c.a.cloneElement(b,{orientation:O}):null,j=c.a.Children.toArray(u),S=j.map((function(e,t){var a={alternativeLabel:d,connector:b,last:t+1===j.length,orientation:O},r={index:t,active:!1,completed:!1,disabled:!1};return l===t?r.active=!0:!h&&l>t?r.completed=!0:!h&&l<t&&(r.disabled=!0),[!d&&g&&0!==t&&c.a.cloneElement(g,Object(n.a)({key:t},r)),c.a.cloneElement(e,Object(n.a)({},a,{},r,{},e.props))]}));return c.a.createElement(s.a,Object(n.a)({square:!0,elevation:0,className:Object(i.default)(m.root,m[O],f,d&&m.alternativeLabel),ref:t},x),S)}));t.a=Object(o.a)({root:{display:"flex",padding:24},horizontal:{flexDirection:"row",alignItems:"center"},vertical:{flexDirection:"column"},alternativeLabel:{alignItems:"flex-start"}},{name:"MuiStepper"})(u)},1722:function(e,t,a){"use strict";var n=a(1),r=a(5),l=a(0),c=a.n(l),i=(a(2),a(3)),o=a(11),s=c.a.forwardRef((function(e,t){var a=e.active,l=e.alternativeLabel,o=void 0!==l&&l,s=e.classes,d=e.className,p=e.completed,u=e.disabled,m=(e.index,e.orientation),f=void 0===m?"horizontal":m,v=Object(r.a)(e,["active","alternativeLabel","classes","className","completed","disabled","index","orientation"]);return c.a.createElement("div",Object(n.a)({className:Object(i.default)(s.root,s[f],d,o&&s.alternativeLabel,a&&s.active,p&&s.completed,u&&s.disabled),ref:t},v),c.a.createElement("span",{className:Object(i.default)(s.line,"vertical"===f?s.lineVertical:s.lineHorizontal)}))}));t.a=Object(o.a)((function(e){return{root:{flex:"1 1 auto"},horizontal:{},vertical:{marginLeft:12,padding:"0 0 8px"},alternativeLabel:{position:"absolute",top:12,left:"calc(-50% + 20px)",right:"calc(50% + 20px)"},active:{},completed:{},disabled:{},line:{display:"block",borderColor:"light"===e.palette.type?e.palette.grey[400]:e.palette.grey[600]},lineHorizontal:{borderTopStyle:"solid",borderTopWidth:1},lineVertical:{borderLeftStyle:"solid",borderLeftWidth:1,minHeight:24}}}),{name:"MuiStepConnector"})(s)},1723:function(e,t,a){"use strict";var n=a(1),r=a(5),l=a(0),c=a.n(l),i=(a(121),a(2),a(3)),o=a(11),s=c.a.forwardRef((function(e,t){var a=e.active,l=void 0!==a&&a,o=e.alternativeLabel,s=e.children,d=e.classes,p=e.className,u=e.completed,m=void 0!==u&&u,f=e.connector,v=e.disabled,b=void 0!==v&&v,E=e.expanded,h=void 0!==E&&E,y=e.index,O=e.last,x=e.orientation,g=Object(r.a)(e,["active","alternativeLabel","children","classes","className","completed","connector","disabled","expanded","index","last","orientation"]);return c.a.createElement("div",Object(n.a)({className:Object(i.default)(d.root,d[x],p,o&&d.alternativeLabel,m&&d.completed),ref:t},g),f&&o&&0!==y&&c.a.cloneElement(f,{orientation:x,alternativeLabel:o,index:y,active:l,completed:m,disabled:b}),c.a.Children.map(s,(function(e){return c.a.isValidElement(e)?c.a.cloneElement(e,Object(n.a)({active:l,alternativeLabel:o,completed:m,disabled:b,expanded:h,last:O,icon:y+1,orientation:x},e.props)):null})))}));t.a=Object(o.a)({root:{},horizontal:{paddingLeft:8,paddingRight:8},vertical:{},alternativeLabel:{flex:1,position:"relative"},completed:{}},{name:"MuiStep"})(s)},1724:function(e,t,a){"use strict";var n=a(1),r=a(5),l=a(0),c=a.n(l),i=(a(2),a(3)),o=a(11),s=a(208),d=a(1747),p=c.a.forwardRef((function(e,t){var a=e.active,l=void 0!==a&&a,o=e.alternativeLabel,p=void 0!==o&&o,u=e.children,m=e.classes,f=e.className,v=e.completed,b=void 0!==v&&v,E=e.disabled,h=void 0!==E&&E,y=e.error,O=void 0!==y&&y,x=(e.expanded,e.icon),g=(e.last,e.optional),j=e.orientation,S=void 0===j?"horizontal":j,A=e.StepIconComponent,C=e.StepIconProps,L=Object(r.a)(e,["active","alternativeLabel","children","classes","className","completed","disabled","error","expanded","icon","last","optional","orientation","StepIconComponent","StepIconProps"]),N=A;return x&&!N&&(N=d.a),c.a.createElement("span",Object(n.a)({className:Object(i.default)(m.root,m[S],f,h&&m.disabled,p&&m.alternativeLabel,O&&m.error),ref:t},L),x||N?c.a.createElement("span",{className:Object(i.default)(m.iconContainer,p&&m.alternativeLabel)},c.a.createElement(N,Object(n.a)({completed:b,active:l,error:O,icon:x},C))):null,c.a.createElement("span",{className:m.labelContainer},c.a.createElement(s.a,{variant:"body2",component:"span",className:Object(i.default)(m.label,p&&m.alternativeLabel,b&&m.completed,l&&m.active,O&&m.error),display:"block"},u),g))}));p.muiName="StepLabel",t.a=Object(o.a)((function(e){return{root:{display:"flex",alignItems:"center","&$alternativeLabel":{flexDirection:"column"},"&$disabled":{cursor:"default"}},horizontal:{},vertical:{},label:{color:e.palette.text.secondary,"&$active":{color:e.palette.text.primary,fontWeight:500},"&$completed":{color:e.palette.text.primary,fontWeight:500},"&$alternativeLabel":{textAlign:"center",marginTop:16},"&$error":{color:e.palette.error.main}},active:{},completed:{},error:{},disabled:{},iconContainer:{flexShrink:0,display:"flex",paddingRight:8,"&$alternativeLabel":{paddingRight:0}},alternativeLabel:{},labelContainer:{width:"100%"}}}),{name:"MuiStepLabel"})(p)},1747:function(e,t,a){"use strict";var n=a(0),r=a.n(n),l=(a(2),a(3)),c=a(64),i=Object(c.a)(r.a.createElement("path",{d:"M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24zm-2 17l-5-5 1.4-1.4 3.6 3.6 7.6-7.6L19 8l-9 9z"}),"CheckCircle"),o=Object(c.a)(r.a.createElement("path",{d:"M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"}),"Warning"),s=a(11),d=a(452),p=r.a.createElement("circle",{cx:"12",cy:"12",r:"12"}),u=r.a.forwardRef((function(e,t){var a=e.completed,n=void 0!==a&&a,c=e.icon,s=e.active,u=void 0!==s&&s,m=e.error,f=void 0!==m&&m,v=e.classes;if("number"===typeof c||"string"===typeof c){var b=Object(l.default)(v.root,u&&v.active,f&&v.error,n&&v.completed);return f?r.a.createElement(o,{className:b,ref:t}):n?r.a.createElement(i,{className:b,ref:t}):r.a.createElement(d.a,{className:b,ref:t},p,r.a.createElement("text",{className:v.text,x:"12",y:"16",textAnchor:"middle"},c))}return c}));t.a=Object(s.a)((function(e){return{root:{display:"block",color:e.palette.text.disabled,"&$completed":{color:e.palette.primary.main},"&$active":{color:e.palette.primary.main},"&$error":{color:e.palette.error.main}},text:{fill:e.palette.primary.contrastText,fontSize:e.typography.caption.fontSize,fontFamily:e.typography.fontFamily},active:{},completed:{},error:{}}}),{name:"MuiStepIcon"})(u)},1798:function(e,t,a){"use strict";var n=a(74),r=a(7),l=a(1641),c=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,t=arguments.length>1?arguments[1]:void 0;switch(t.type){case l.b:case l.d:return Object(r.a)({},t.payload);case l.e:return Object(r.a)(Object(r.a)({},e),t.payload);default:return e}},i={data:null,categories:[]},o=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:i,t=arguments.length>1?arguments[1]:void 0;switch(t.type){case l.c:return Object(r.a)(Object(r.a)({},e),{},{data:t.payload});case l.a:return Object(r.a)(Object(r.a)({},e),{},{categories:t.payload});default:return e}},s=Object(n.d)({courses:o,course:c});t.a=s},2719:function(e,t,a){"use strict";a.r(t);var n=a(193),r=a(51),l=a(225),c=a(1398),i=a(1388),o=a(1377),s=a(716),d=a(209),p=a(1723),u=a(1724),m=a(1721),f=a(1368),v=a(52),b=a(208),E=a(1436),h=a(0),y=a.n(h),O=a(8),x=a(30),g=a(1718),j=a.n(g),S=a(1641),A=a(1798),C=Object(f.a)((function(e){return{stepLabel:{cursor:"pointer!important"},successFab:{background:"".concat(l.a[500],"!important"),color:"white!important"}}}));t.default=Object(E.a)("academyApp",A.a)((function(e){var t=Object(O.b)(),a=Object(O.c)((function(e){return e.academyApp.course})),l=Object(v.a)(),f=C(e),E=Object(h.useRef)(null);function g(e){t(S.i({activeStep:e+1}))}Object(h.useEffect)((function(){t(S.g(e.match.params))}),[t,e.match.params]),Object(h.useEffect)((function(){a&&0===a.activeStep&&t(S.i({activeStep:1}))}),[t,a]);var A=a&&0!==a.activeStep?a.activeStep:1;return y.a.createElement(n.a,{classes:{content:"flex flex-col flex-auto overflow-hidden",header:"h-72 min-h-72"},header:y.a.createElement("div",{className:"flex flex-1 items-center px-16 lg:px-24"},y.a.createElement(i.a,{lgUp:!0},y.a.createElement(s.a,{onClick:function(e){return E.current.toggleLeftSidebar()},"aria-label":"open left sidebar"},y.a.createElement(o.a,null,"menu"))),y.a.createElement(s.a,{to:"/apps/academy/courses",component:x.a},y.a.createElement(o.a,null,"ltr"===l.direction?"arrow_back":"arrow_forward")),a&&y.a.createElement(b.a,{className:"flex-1 text-20 mx-16"},a.title)),content:a&&y.a.createElement("div",{className:"flex flex-1 relative overflow-hidden"},y.a.createElement(r.a,{className:"w-full overflow-auto"},y.a.createElement(j.a,{className:"overflow-hidden",index:A-1,enableMouseEvents:!0,onChangeIndex:g},a.steps.map((function(e,t){return y.a.createElement("div",{className:"flex justify-center p-16 pb-64 sm:p-24 sm:pb-64 md:p-48 md:pb-64",key:e.id},y.a.createElement(d.a,{className:"w-full max-w-lg rounded-8 p-16 md:p-24",elevation:1},y.a.createElement("div",{dangerouslySetInnerHTML:{__html:e.content},dir:l.direction})))})))),y.a.createElement("div",{className:"flex justify-center w-full absolute left-0 right-0 bottom-0 pb-16 md:pb-32"},y.a.createElement("div",{className:"flex justify-between w-full max-w-xl px-8"},y.a.createElement("div",null,1!==A&&y.a.createElement(c.a,{className:"",color:"secondary",onClick:function(){t(S.i({activeStep:a.activeStep-1}))}},y.a.createElement(o.a,null,"ltr"===l.direction?"chevron_left":"chevron_right"))),y.a.createElement("div",null,A<a.steps.length?y.a.createElement(c.a,{className:"",color:"secondary",onClick:function(){t(S.i({activeStep:a.activeStep+1}))}},y.a.createElement(o.a,null,"ltr"===l.direction?"chevron_right":"chevron_left")):y.a.createElement(c.a,{className:f.successFab,to:"/apps/academy/courses",component:x.a},y.a.createElement(o.a,null,"check")))))),leftSidebarContent:a&&y.a.createElement(m.a,{classes:{root:"bg-transparent"},activeStep:A-1,orientation:"vertical"},a.steps.map((function(e,t){return y.a.createElement(p.a,{key:e.id,onClick:function(){return g(t)}},y.a.createElement(u.a,{classes:{root:f.stepLabel}},e.title))}))),innerScroll:!0,ref:E})}))}}]);