(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[105],{1436:function(e,t,a){"use strict";var n=a(67),r=a(68),c=a(113),l=a(112),o=a(270),s=a(0),i=a.n(s);t.a=function(e,t){return function(a){return function(s){Object(c.a)(m,s);var u=Object(l.a)(m);function m(a){var r;return Object(n.a)(this,m),r=u.call(this,a),Object(o.b)(e,t),r}return Object(r.a)(m,[{key:"render",value:function(){return i.a.createElement(a,this.props)}}]),m}(i.a.PureComponent)}}},1641:function(e,t,a){"use strict";var n=a(73),r=a.n(n);function c(){var e=r.a.get("/api/academy-app/courses");return function(t){return e.then((function(e){return t({type:"[ACADEMY APP] GET COURSES",payload:e.data})}))}}function l(){var e=r.a.get("/api/academy-app/categories");return function(t){return e.then((function(e){return t({type:"[ACADEMY APP] GET CATEGORIES",payload:e.data})}))}}var o=a(7),s=a(49);function i(e){var t=r.a.get("/api/academy-app/course",{params:e});return function(e){return t.then((function(t){return e({type:"[ACADEMY APP] GET COURSE",payload:t.data})}))}}function u(e){return function(t,a){var n=a().academyApp.course.id;r.a.post("/api/academy-app/course/update",Object(o.a)({id:n},e)).then((function(e){return t(Object(s.H)({message:"Course Updated"})),t({type:"[ACADEMY APP] UPDATE COURSE",payload:e.data})}))}}a.d(t,"c",(function(){return"[ACADEMY APP] GET COURSES"})),a.d(t,"a",(function(){return"[ACADEMY APP] GET CATEGORIES"})),a.d(t,"h",(function(){return c})),a.d(t,"f",(function(){return l})),a.d(t,"b",(function(){return"[ACADEMY APP] GET COURSE"})),a.d(t,"d",(function(){return"[ACADEMY APP] SAVE COURSE"})),a.d(t,"e",(function(){return"[ACADEMY APP] UPDATE COURSE"})),a.d(t,"g",(function(){return i})),a.d(t,"i",(function(){return u}))},1642:function(e,t,a){"use strict";var n=a(1),r=a(5),c=a(0),l=a.n(c),o=(a(2),a(3)),s=a(11),i=l.a.forwardRef((function(e,t){var a=e.disableSpacing,c=void 0!==a&&a,s=e.classes,i=e.className,u=Object(r.a)(e,["disableSpacing","classes","className"]);return l.a.createElement("div",Object(n.a)({className:Object(o.default)(s.root,i,!c&&s.spacing),ref:t},u))}));t.a=Object(s.a)({root:{display:"flex",alignItems:"center",padding:8},spacing:{"& > :not(:first-child)":{marginLeft:8}}},{name:"MuiCardActions"})(i)},1798:function(e,t,a){"use strict";var n=a(74),r=a(7),c=a(1641),l=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,t=arguments.length>1?arguments[1]:void 0;switch(t.type){case c.b:case c.d:return Object(r.a)({},t.payload);case c.e:return Object(r.a)(Object(r.a)({},e),t.payload);default:return e}},o={data:null,categories:[]},s=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:o,t=arguments.length>1?arguments[1]:void 0;switch(t.type){case c.c:return Object(r.a)(Object(r.a)({},e),{},{data:t.payload});case c.a:return Object(r.a)(Object(r.a)({},e),{},{categories:t.payload});default:return e}},i=Object(n.d)({courses:s,course:l});t.a=i},2720:function(e,t,a){"use strict";a.r(t);var n=a(23),r=a(133),c=a(463),l=a(10),o=a(1382),s=a(1406),i=a(1642),u=a(1407),m=a(1402),f=a(715),d=a(1377),p=a(717),E=a(1379),b=a(1378),h=a(1347),y=a(724),x=a(1368),v=a(52),g=a(1386),O=a(208),j=a(1436),A=a(3),C=a(0),N=a.n(C),w=a(8),S=a(30),P=a(1641),T=a(1798),k=Object(x.a)((function(e){return{header:{background:"linear-gradient(to right, ".concat(e.palette.primary.dark," 0%, ").concat(e.palette.primary.main," 100%)"),color:e.palette.getContrastText(e.palette.primary.main)},headerIcon:{position:"absolute",top:-64,left:0,opacity:.04,fontSize:512,width:512,height:512,pointerEvents:"none"}}}));t.default=Object(j.a)("academyApp",T.a)((function(e){var t=Object(w.b)(),a=Object(w.c)((function(e){return e.academyApp.courses.data})),x=Object(w.c)((function(e){return e.academyApp.courses.categories})),j=k(e),T=Object(v.a)(),M=Object(C.useState)(null),D=Object(n.a)(M,2),U=D[0],R=D[1],Y=Object(C.useState)(""),I=Object(n.a)(Y,2),G=I[0],L=I[1],J=Object(C.useState)("all"),W=Object(n.a)(J,2),z=W[0],B=W[1];return Object(C.useEffect)((function(){t(P.f()),t(P.h())}),[t]),Object(C.useEffect)((function(){a&&R(0===G.length&&"all"===z?a:l.a.filter(a,(function(e){return("all"===z||e.category===z)&&e.title.toLowerCase().includes(G.toLowerCase())})))}),[a,G,z]),N.a.createElement("div",{className:"flex flex-col flex-auto flex-shrink-0 w-full"},N.a.createElement("div",{className:Object(A.default)(j.header,"relative overflow-hidden flex flex-col flex-shrink-0 items-center justify-center text-center p-16 sm:p-24 h-200 sm:h-288")},N.a.createElement(r.a,{animation:"transition.slideUpIn",duration:400,delay:100},N.a.createElement(O.a,{color:"inherit",className:"text-24 sm:text-40 font-light"},"WELCOME TO ACADEMY")),N.a.createElement(r.a,{duration:400,delay:600},N.a.createElement(O.a,{variant:"subtitle1",color:"inherit",className:"mt-8 sm:mt-16 mx-auto max-w-512"},N.a.createElement("span",{className:"opacity-75"},"Our courses will step you through the process of building a small application, or adding a new feature to an existing application."))),N.a.createElement(d.a,{className:j.headerIcon}," school ")),N.a.createElement("div",{className:"flex flex-col flex-1 max-w-2xl w-full mx-auto px-8 sm:px-16 py-24"},N.a.createElement("div",{className:"flex flex-col flex-shrink-0 sm:flex-row items-center justify-between py-24"},N.a.createElement(g.a,{label:"Search for a course",placeholder:"Enter a keyword...",className:"flex w-full sm:w-320 mb-16 sm:mb-0 mx-16",value:G,inputProps:{"aria-label":"Search"},onChange:function(e){L(e.target.value)},variant:"outlined",InputLabelProps:{shrink:!0}}),N.a.createElement(f.a,{className:"flex w-full sm:w-320 mx-16",variant:"outlined"},N.a.createElement(p.a,{htmlFor:"category-label-placeholder"}," Category "),N.a.createElement(y.a,{value:z,onChange:function(e){B(e.target.value)},input:N.a.createElement(h.a,{labelWidth:9*"category".length,name:"category",id:"category-label-placeholder"})},N.a.createElement(b.a,{value:"all"},N.a.createElement("em",null," All ")),x.map((function(e){return N.a.createElement(b.a,{value:e.value,key:e.id},e.label)}))))),Object(C.useMemo)((function(){return U&&(U.length>0?N.a.createElement(c.a,{enter:{animation:"transition.slideUpBigIn"},className:"flex flex-wrap py-24"},U.map((function(e){var t=x.find((function(t){return t.value===e.category}));return N.a.createElement("div",{className:"w-full pb-24 sm:w-1/2 lg:w-1/3 sm:p-16",key:e.id},N.a.createElement(s.a,{elevation:1,className:"flex flex-col h-256"},N.a.createElement("div",{className:"flex flex-shrink-0 items-center justify-between px-24 h-64",style:{background:t.color,color:T.palette.getContrastText(t.color)}},N.a.createElement(O.a,{className:"font-medium truncate",color:"inherit"},t.label),N.a.createElement("div",{className:"flex items-center justify-center opacity-75"},N.a.createElement(d.a,{className:"text-20 mx-8",color:"inherit"},"access_time"),N.a.createElement("div",{className:"text-16 whitespace-no-wrap"},e.length,"min"))),N.a.createElement(u.a,{className:"flex flex-col flex-auto items-center justify-center"},N.a.createElement(O.a,{className:"text-center text-16 font-400"},e.title),N.a.createElement(O.a,{className:"text-center text-13 font-600 mt-4",color:"textSecondary"},e.updated)),N.a.createElement(m.a,null),N.a.createElement(i.a,{className:"justify-center"},N.a.createElement(o.a,{to:"/apps/academy/courses/".concat(e.id,"/").concat(e.slug),component:S.a,className:"justify-start px-32",color:"secondary"},function(e){switch(e.activeStep){case e.totalSteps:return"COMPLETED";case 0:return"START";default:return"CONTINUE"}}(e))),N.a.createElement(E.a,{className:"w-full",variant:"determinate",value:100*e.activeStep/e.totalSteps,color:"secondary"})))}))):N.a.createElement("div",{className:"flex flex-1 items-center justify-center"},N.a.createElement(O.a,{color:"textSecondary",className:"text-24 my-24"},"No courses found!")))}),[x,U,T.palette])))}))}}]);