(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[143],{1440:function(e,t,a){"use strict";var n=a(5),i=a(1),r=a(0),c=a.n(r),s=(a(2),a(3)),o=a(11),l=[0,1,2,3,4,5,6,7,8,9,10],m=["auto",!0,1,2,3,4,5,6,7,8,9,10,11,12];function g(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:1,a=parseFloat(e);return"".concat(a/t).concat(String(e).replace(String(a),"")||"px")}var d=c.a.forwardRef((function(e,t){var a=e.alignContent,r=void 0===a?"stretch":a,o=e.alignItems,l=void 0===o?"stretch":o,m=e.classes,g=e.className,d=e.component,x=void 0===d?"div":d,p=e.container,f=void 0!==p&&p,u=e.direction,v=void 0===u?"row":u,h=e.item,w=void 0!==h&&h,E=e.justify,b=void 0===E?"flex-start":E,j=e.lg,y=void 0!==j&&j,S=e.md,C=void 0!==S&&S,W=e.sm,N=void 0!==W&&W,I=e.spacing,O=void 0===I?0:I,z=e.wrap,M=void 0===z?"wrap":z,k=e.xl,B=void 0!==k&&k,D=e.xs,G=void 0!==D&&D,A=e.zeroMinWidth,J=void 0!==A&&A,P=Object(n.a)(e,["alignContent","alignItems","classes","className","component","container","direction","item","justify","lg","md","sm","spacing","wrap","xl","xs","zeroMinWidth"]),R=Object(s.default)(m.root,g,f&&[m.container,0!==O&&m["spacing-xs-".concat(String(O))]],w&&m.item,J&&m.zeroMinWidth,"row"!==v&&m["direction-xs-".concat(String(v))],"wrap"!==M&&m["wrap-xs-".concat(String(M))],"stretch"!==l&&m["align-items-xs-".concat(String(l))],"stretch"!==r&&m["align-content-xs-".concat(String(r))],"flex-start"!==b&&m["justify-xs-".concat(String(b))],!1!==G&&m["grid-xs-".concat(String(G))],!1!==N&&m["grid-sm-".concat(String(N))],!1!==C&&m["grid-md-".concat(String(C))],!1!==y&&m["grid-lg-".concat(String(y))],!1!==B&&m["grid-xl-".concat(String(B))]);return c.a.createElement(x,Object(i.a)({className:R,ref:t},P))})),x=Object(o.a)((function(e){return Object(i.a)({root:{},container:{boxSizing:"border-box",display:"flex",flexWrap:"wrap",width:"100%"},item:{boxSizing:"border-box",margin:"0"},zeroMinWidth:{minWidth:0},"direction-xs-column":{flexDirection:"column"},"direction-xs-column-reverse":{flexDirection:"column-reverse"},"direction-xs-row-reverse":{flexDirection:"row-reverse"},"wrap-xs-nowrap":{flexWrap:"nowrap"},"wrap-xs-wrap-reverse":{flexWrap:"wrap-reverse"},"align-items-xs-center":{alignItems:"center"},"align-items-xs-flex-start":{alignItems:"flex-start"},"align-items-xs-flex-end":{alignItems:"flex-end"},"align-items-xs-baseline":{alignItems:"baseline"},"align-content-xs-center":{alignContent:"center"},"align-content-xs-flex-start":{alignContent:"flex-start"},"align-content-xs-flex-end":{alignContent:"flex-end"},"align-content-xs-space-between":{alignContent:"space-between"},"align-content-xs-space-around":{alignContent:"space-around"},"justify-xs-center":{justifyContent:"center"},"justify-xs-flex-end":{justifyContent:"flex-end"},"justify-xs-space-between":{justifyContent:"space-between"},"justify-xs-space-around":{justifyContent:"space-around"},"justify-xs-space-evenly":{justifyContent:"space-evenly"}},function(e,t){var a={};return l.forEach((function(n){var i=e.spacing(n);0!==i&&(a["spacing-".concat(t,"-").concat(n)]={margin:"-".concat(g(i,2)),width:"calc(100% + ".concat(g(i),")"),"& > $item":{padding:g(i,2)}})})),a}(e,"xs"),{},e.breakpoints.keys.reduce((function(t,a){return function(e,t,a){var n={};m.forEach((function(e){var t="grid-".concat(a,"-").concat(e);if(!0!==e)if("auto"!==e){var i="".concat(Math.round(e/12*1e8)/1e6,"%");n[t]={flexBasis:i,flexGrow:0,maxWidth:i}}else n[t]={flexBasis:"auto",flexGrow:0,maxWidth:"none"};else n[t]={flexBasis:0,flexGrow:1,maxWidth:"100%"}})),"xs"===a?Object(i.a)(e,n):e[t.breakpoints.up(a)]=n}(t,e,a),t}),{}))}),{name:"MuiGrid"})(d);t.a=x},2886:function(e,t,a){"use strict";a.r(t),a.d(t,"default",(function(){return g}));var n=a(0),i=a.n(n),r=a(1440),c=a(209),s=a(208),o=a(267),l=a(1368),m=Object(l.a)((function(e){return{root:{flexGrow:1,padding:e.spacing(0,2),"& > *":{margin:e.spacing(2)}},paper:{padding:e.spacing(2),margin:20},image:{width:100,height:100},img:{maxWidth:100,maxHeight:100,height:60,width:100,paddingRight:30}}}));function g(){var e=m();return i.a.createElement("div",{className:e.root},i.a.createElement(c.a,{className:e.paper},i.a.createElement("h2",null,"Past Confirmed Universities")),i.a.createElement(c.a,{className:e.paper},i.a.createElement(r.a,{item:!0,container:!0},i.a.createElement(r.a,{item:!0,xs:1},i.a.createElement(o.a,{className:e.image},i.a.createElement("img",{className:e.img,alt:"complex",src:"/material-ui-static/images/grid/complex.jpg"}))),i.a.createElement(r.a,{item:!0,sm:!0,container:!0},i.a.createElement(r.a,{item:!0,xs:!0,container:!0,spacing:1},i.a.createElement(r.a,{item:!0},i.a.createElement(s.a,{gutterBottom:!0,variant:"subtitle1"},"Test University 1")),i.a.createElement(r.a,{item:!0,container:!0},i.a.createElement(r.a,{item:!0},i.a.createElement("span",null,"Start Date: 2019-09-02 00:00:00")),i.a.createElement(r.a,{item:!0,container:!0,xs:6,alignItems:"flex-end",direction:"column"},i.a.createElement(r.a,{item:!0},i.a.createElement("span",null,"End Date: 2020-02-02 00:00:00")))),i.a.createElement(r.a,{item:!0,xs:8},i.a.createElement(s.a,{variant:"body2"},"Accepted: By Admin")))),i.a.createElement(r.a,{item:!0,sm:!0,container:!0,justify:"center"},i.a.createElement(r.a,{item:!0},i.a.createElement(o.a,{className:e.image},i.a.createElement("img",{className:e.img,alt:"complex",src:"/material-ui-static/images/grid/complex.jpg"})),i.a.createElement(s.a,{variant:"caption"},"This is a test school: Please Ignore"))))))}}}]);