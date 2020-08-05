(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[80],{1430:function(e,a,t){"use strict";var n=t(0),l=t.n(n).a.createContext();a.a=l},1436:function(e,a,t){"use strict";var n=t(67),l=t(68),r=t(113),c=t(112),i=t(270),s=t(0),o=t.n(s);a.a=function(e,a){return function(t){return function(s){Object(r.a)(m,s);var d=Object(c.a)(m);function m(t){var l;return Object(n.a)(this,m),l=d.call(this,t),Object(i.b)(e,a),l}return Object(l.a)(m,[{key:"render",value:function(){return o.a.createElement(t,this.props)}}]),m}(o.a.PureComponent)}}},1448:function(e,a,t){"use strict";var n=t(0),l=t.n(n).a.createContext();a.a=l},1505:function(e,a,t){"use strict";var n=t(5),l=t(1),r=t(0),c=t.n(r),i=(t(2),t(3)),s=t(11),o=t(1448),d=c.a.forwardRef((function(e,a){var t=e.classes,r=e.className,s=e.component,d=void 0===s?"table":s,m=e.padding,u=void 0===m?"default":m,p=e.size,f=void 0===p?"medium":p,E=e.stickyHeader,b=void 0!==E&&E,h=Object(n.a)(e,["classes","className","component","padding","size","stickyHeader"]),v=c.a.useMemo((function(){return{padding:u,size:f,stickyHeader:b}}),[u,f,b]);return c.a.createElement(o.a.Provider,{value:v},c.a.createElement(d,Object(l.a)({ref:a,className:Object(i.default)(t.root,r,b&&t.stickyHeader)},h)))}));a.a=Object(s.a)((function(e){return{root:{display:"table",width:"100%",borderCollapse:"collapse",borderSpacing:0,"& caption":Object(l.a)({},e.typography.body2,{padding:e.spacing(2),color:e.palette.text.secondary,textAlign:"left",captionSide:"bottom"})},stickyHeader:{borderCollapse:"separate"}}}),{name:"MuiTable"})(d)},1506:function(e,a,t){"use strict";var n=t(1),l=t(5),r=t(0),c=t.n(r),i=(t(2),t(3)),s=t(11),o=t(1430),d=t(19),m=c.a.forwardRef((function(e,a){var t=e.classes,r=e.className,s=e.component,d=void 0===s?"tr":s,m=e.hover,u=void 0!==m&&m,p=e.selected,f=void 0!==p&&p,E=Object(l.a)(e,["classes","className","component","hover","selected"]),b=c.a.useContext(o.a);return c.a.createElement(d,Object(n.a)({ref:a,className:Object(i.default)(t.root,r,b&&{head:t.head,footer:t.footer}[b.variant],u&&t.hover,f&&t.selected)},E))}));a.a=Object(s.a)((function(e){return{root:{color:"inherit",display:"table-row",verticalAlign:"middle",outline:0,"&$hover:hover":{backgroundColor:e.palette.action.hover},"&$selected,&$selected:hover":{backgroundColor:Object(d.d)(e.palette.secondary.main,e.palette.action.selectedOpacity)}},selected:{},hover:{},head:{},footer:{}}}),{name:"MuiTableRow"})(m)},1507:function(e,a,t){"use strict";var n=t(5),l=t(1),r=t(0),c=t.n(r),i=(t(2),t(3)),s=t(11),o=t(12),d=t(19),m=t(1448),u=t(1430),p=c.a.forwardRef((function(e,a){var t,r=e.align,s=void 0===r?"inherit":r,d=e.classes,p=e.className,f=e.component,E=e.padding,b=e.scope,h=e.size,v=e.sortDirection,g=e.variant,y=Object(n.a)(e,["align","classes","className","component","padding","scope","size","sortDirection","variant"]),N=c.a.useContext(m.a),x=c.a.useContext(u.a);t=f||(x&&"head"===x.variant?"th":"td");var O=b;!O&&x&&"head"===x.variant&&(O="col");var j=E||(N&&N.padding?N.padding:"default"),w=h||(N&&N.size?N.size:"medium"),A=g||x&&x.variant,I=null;return v&&(I="asc"===v?"ascending":"descending"),c.a.createElement(t,Object(l.a)({ref:a,className:Object(i.default)(d.root,d[A],p,"inherit"!==s&&d["align".concat(Object(o.a)(s))],"default"!==j&&d["padding".concat(Object(o.a)(j))],"medium"!==w&&d["size".concat(Object(o.a)(w))],{head:N&&N.stickyHeader&&d.stickyHeader}[A]),"aria-sort":I,scope:O},y))}));a.a=Object(s.a)((function(e){return{root:Object(l.a)({},e.typography.body2,{display:"table-cell",verticalAlign:"inherit",borderBottom:"1px solid\n    ".concat("light"===e.palette.type?Object(d.i)(Object(d.d)(e.palette.divider,1),.88):Object(d.a)(Object(d.d)(e.palette.divider,1),.68)),textAlign:"left",padding:16}),head:{color:e.palette.text.primary,lineHeight:e.typography.pxToRem(24),fontWeight:e.typography.fontWeightMedium},body:{color:e.palette.text.primary},footer:{color:e.palette.text.secondary,lineHeight:e.typography.pxToRem(21),fontSize:e.typography.pxToRem(12)},sizeSmall:{padding:"6px 24px 6px 16px","&:last-child":{paddingRight:16},"&$paddingCheckbox":{width:24,padding:"0px 12px 0 16px","&:last-child":{paddingLeft:12,paddingRight:16},"& > *":{padding:0}}},paddingCheckbox:{width:48,padding:"0 0 0 4px","&:last-child":{paddingLeft:0,paddingRight:4}},paddingNone:{padding:0,"&:last-child":{padding:0}},alignLeft:{textAlign:"left"},alignCenter:{textAlign:"center"},alignRight:{textAlign:"right",flexDirection:"row-reverse"},alignJustify:{textAlign:"justify"},stickyHeader:{position:"sticky",top:0,left:0,zIndex:2,backgroundColor:e.palette.background.default}}}),{name:"MuiTableCell"})(p)},1508:function(e,a,t){"use strict";var n=t(1),l=t(5),r=t(0),c=t.n(r),i=(t(2),t(3)),s=t(11),o=t(1430),d={variant:"body"},m=c.a.forwardRef((function(e,a){var t=e.classes,r=e.className,s=e.component,m=void 0===s?"tbody":s,u=Object(l.a)(e,["classes","className","component"]);return c.a.createElement(o.a.Provider,{value:d},c.a.createElement(m,Object(n.a)({className:Object(i.default)(t.root,r),ref:a},u)))}));a.a=Object(s.a)({root:{display:"table-row-group"}},{name:"MuiTableBody"})(m)},1531:function(e,a,t){"use strict";var n=t(1),l=t(5),r=t(0),c=t.n(r),i=(t(2),t(3)),s=t(11),o=t(1430),d={variant:"head"},m=c.a.forwardRef((function(e,a){var t=e.classes,r=e.className,s=e.component,m=void 0===s?"thead":s,u=Object(l.a)(e,["classes","className","component"]);return c.a.createElement(o.a.Provider,{value:d},c.a.createElement(m,Object(n.a)({className:Object(i.default)(t.root,r),ref:a},u)))}));a.a=Object(s.a)({root:{display:"table-header-group"}},{name:"MuiTableHead"})(m)},2916:function(e,a,t){"use strict";t.r(a);var n=t(133),l=t(193),r=t(1398),c=t(1377),i=t(716),s=t(1436),o=t(0),d=t.n(o),m=t(8),u=t(208);var p=function(e){var a=e.className,t=e.selected.location.split(">");return d.a.createElement(u.a,{className:a},t.map((function(e,a){return d.a.createElement("span",{key:a,className:"flex items-center"},d.a.createElement("span",null,e),t.length-1!==a&&d.a.createElement(c.a,null,"chevron_right"))})))},f=t(1381),E=t(1368),b=t(1397),h=t(3),v=Object(E.a)({table:{"& th":{padding:"16px 0"}},typeIcon:{"&.folder:before":{content:"'folder'",color:"#FFB300"},"&.document:before":{content:"'insert_drive_file'",color:"#1565C0"},"&.spreadsheet:before":{content:"'insert_chart'",color:"#4CAF50"}}});var g=function(e){var a=Object(m.c)((function(e){return e.fileManagerApp.files})),t=Object(m.c)((function(e){var t=e.fileManagerApp;return a[t.selectedItemId]})),l=v();return t?d.a.createElement(n.a,{animation:"transition.slideUpIn",delay:200},d.a.createElement("div",{className:"file-details p-16 sm:p-24"},d.a.createElement("div",{className:"preview h-128 sm:h-256 file-icon flex items-center justify-center"},d.a.createElement(n.a,{animation:"transition.expandIn",delay:300},d.a.createElement(c.a,{className:Object(h.default)(l.typeIcon,t.type,"text-48")}))),d.a.createElement(f.a,{className:"offline-switch",control:d.a.createElement(b.a,{checked:t.offline,"aria-label":"Available Offline"}),label:"Available Offline"}),d.a.createElement(u.a,{variant:"subtitle1",className:"py-16"},"Info"),d.a.createElement("table",{className:Object(h.default)(l.table,"w-full text-justify")},d.a.createElement("tbody",null,d.a.createElement("tr",{className:"type"},d.a.createElement("th",null,"Type"),d.a.createElement("td",null,t.type)),d.a.createElement("tr",{className:"size"},d.a.createElement("th",null,"Size"),d.a.createElement("td",null,""===t.size?"-":t.size)),d.a.createElement("tr",{className:"location"},d.a.createElement("th",null,"Location"),d.a.createElement("td",null,t.location)),d.a.createElement("tr",{className:"owner"},d.a.createElement("th",null,"Owner"),d.a.createElement("td",null,t.owner)),d.a.createElement("tr",{className:"modified"},d.a.createElement("th",null,"Modified"),d.a.createElement("td",null,t.modified)),d.a.createElement("tr",{className:"opened"},d.a.createElement("th",null,"Opened"),d.a.createElement("td",null,t.opened)),d.a.createElement("tr",{className:"created"},d.a.createElement("th",null,"Created"),d.a.createElement("td",null,t.created)))))):null};var y=function(e){var a=Object(m.c)((function(e){return e.fileManagerApp.files})),t=Object(m.c)((function(e){var t=e.fileManagerApp;return a[t.selectedItemId]}));return t?d.a.createElement("div",{className:"flex flex-col justify-between h-full p-4 sm:p-12"},d.a.createElement("div",{className:"toolbar flex align-center justify-end"},d.a.createElement(n.a,{animation:"transition.expandIn",delay:200},d.a.createElement(i.a,null,d.a.createElement(c.a,null,"delete"))),d.a.createElement(n.a,{animation:"transition.expandIn",delay:200},d.a.createElement(i.a,null,d.a.createElement(c.a,null,"cloud_download"))),d.a.createElement(i.a,null,d.a.createElement(c.a,null,"more_vert"))),d.a.createElement("div",{className:"p-12"},d.a.createElement(n.a,{delay:200},d.a.createElement(u.a,{variant:"subtitle1",className:"mb-8"},t.name)),d.a.createElement(n.a,{delay:300},d.a.createElement(u.a,{variant:"caption",className:""},d.a.createElement("span",null,"Edited"),d.a.createElement("span",null,": ",t.modified))))):null},N=t(23),x=t(1388),O=t(1505),j=t(1508),w=t(1507),A=t(1531),I=t(1506),C=t(73),k=t.n(C),M="[FILE MANAGER APP] GET FILES";var S=Object(E.a)({typeIcon:{"&.folder:before":{content:"'folder'",color:"#FFB300"},"&.document:before":{content:"'insert_drive_file'",color:"#1565C0"},"&.spreadsheet:before":{content:"'insert_chart'",color:"#4CAF50"}}});var z=function(e){var a=Object(m.b)(),t=Object(m.c)((function(e){return e.fileManagerApp.files})),l=Object(m.c)((function(e){return e.fileManagerApp.selectedItemId})),r=S();return d.a.createElement(n.a,{animation:"transition.slideUpIn",delay:300},d.a.createElement(O.a,null,d.a.createElement(A.a,null,d.a.createElement(I.a,null,d.a.createElement(w.a,{className:"max-w-64 w-64 p-0 text-center"}," "),d.a.createElement(w.a,null,"Name"),d.a.createElement(w.a,{className:"hidden sm:table-cell"},"Type"),d.a.createElement(w.a,{className:"hidden sm:table-cell"},"Owner"),d.a.createElement(w.a,{className:"text-center hidden sm:table-cell"},"Size"),d.a.createElement(w.a,{className:"hidden sm:table-cell"},"Modified"))),d.a.createElement(j.a,null,Object.entries(t).map((function(t){var n=Object(N.a)(t,2),s=(n[0],n[1]);return d.a.createElement(I.a,{key:s.id,hover:!0,onClick:function(e){return a({type:"[FILE MANAGER APP] SET SELECTED ITEM",payload:s.id})},selected:s.id===l,className:"cursor-pointer"},d.a.createElement(w.a,{className:"max-w-64 w-64 p-0 text-center"},d.a.createElement(c.a,{className:Object(h.default)(r.typeIcon,s.type)})),d.a.createElement(w.a,null,s.name),d.a.createElement(w.a,{className:"hidden sm:table-cell"},s.type),d.a.createElement(w.a,{className:"hidden sm:table-cell"},s.owner),d.a.createElement(w.a,{className:"text-center hidden sm:table-cell"},""===s.size?"-":s.size),d.a.createElement(w.a,{className:"hidden sm:table-cell"},s.modified),d.a.createElement(x.a,{lgUp:!0},d.a.createElement(w.a,null,d.a.createElement(i.a,{onClick:function(a){return e.pageLayout.current.toggleRightSidebar()},"aria-label":"open right sidebar"},d.a.createElement(c.a,null,"info")))))})))))},R=t(1338),T=t(1339),H=t(1405),L=t(1384);var F=function(){return d.a.createElement(R.a,{component:"nav"},d.a.createElement(T.a,{button:!0,dense:!0},d.a.createElement(H.a,{className:"min-w-40"},d.a.createElement(c.a,{className:"text-20"},"folder")),d.a.createElement(L.a,{primary:"My Files"})),d.a.createElement(T.a,{button:!0,dense:!0},d.a.createElement(H.a,{className:"min-w-40"},d.a.createElement(c.a,{className:"text-20"},"star")),d.a.createElement(L.a,{primary:"Starred"})),d.a.createElement(T.a,{button:!0,dense:!0},d.a.createElement(H.a,{className:"min-w-40"},d.a.createElement(c.a,{className:"text-20"},"folder_shared")),d.a.createElement(L.a,{primary:"Sharred with me"})),d.a.createElement(T.a,{button:!0,dense:!0},d.a.createElement(H.a,{className:"min-w-40"},d.a.createElement(c.a,{className:"text-20"},"access_time")),d.a.createElement(L.a,{primary:"Recent"})),d.a.createElement(T.a,{button:!0,dense:!0},d.a.createElement(H.a,{className:"min-w-40"},d.a.createElement(c.a,{className:"text-20"},"not_interested")),d.a.createElement(L.a,{primary:"Offline"})))};var _=function(){return d.a.createElement("div",{className:"flex items-center h-full p-12"},d.a.createElement(c.a,null,"folder"),d.a.createElement(u.a,{variant:"h6",className:"mx-12"},"File Manager"))},P=t(74),B=t(10),D=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},a=arguments.length>1?arguments[1]:void 0;switch(a.type){case M:return B.a.keyBy(a.payload,"id");default:return e}},G=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"1",a=arguments.length>1?arguments[1]:void 0;switch(a.type){case"[FILE MANAGER APP] SET SELECTED ITEM":return a.payload;default:return e}},$=Object(P.d)({files:D,selectedItemId:G});a.default=Object(s.a)("fileManagerApp",$)((function(){var e=Object(m.b)(),a=Object(m.c)((function(e){return e.fileManagerApp.files})),t=Object(m.c)((function(e){var t=e.fileManagerApp;return a[t.selectedItemId]})),s=Object(o.useRef)(null);return Object(o.useEffect)((function(){e(function(){var e=k.a.get("/api/file-manager-app/files");return function(a){return e.then((function(e){return a({type:M,payload:e.data})}))}}())}),[e]),d.a.createElement(l.a,{classes:{root:"bg-red",header:"h-96 min-h-96 sm:h-160 sm:min-h-160",sidebarHeader:"h-96 min-h-96 sm:h-160 sm:min-h-160",rightSidebar:"w-320"},header:d.a.createElement("div",{className:"flex flex-col flex-1 p-8 sm:p-12 relative"},d.a.createElement("div",{className:"flex items-center justify-between"},d.a.createElement(i.a,{onClick:function(e){s.current.toggleLeftSidebar()},"aria-label":"open left sidebar"},d.a.createElement(c.a,null,"menu")),d.a.createElement(n.a,{animation:"transition.expandIn",delay:200},d.a.createElement(i.a,{"aria-label":"search"},d.a.createElement(c.a,null,"search")))),d.a.createElement("div",{className:"flex flex-1 items-end"},d.a.createElement(n.a,{animation:"transition.expandIn",delay:600},d.a.createElement(r.a,{color:"secondary","aria-label":"add",className:"absolute bottom-0 ltr:left-0 rtl:right-0 mx-16 -mb-28 z-999"},d.a.createElement(c.a,null,"add"))),d.a.createElement(n.a,{delay:200},d.a.createElement("div",null,t&&d.a.createElement(p,{selected:t,className:"flex flex-1 ltr:pl-72 rtl:pr-72 pb-12 text-16 sm:text-24"}))))),content:d.a.createElement(z,{pageLayout:s}),leftSidebarVariant:"temporary",leftSidebarHeader:d.a.createElement(_,null),leftSidebarContent:d.a.createElement(F,null),rightSidebarHeader:d.a.createElement(y,null),rightSidebarContent:d.a.createElement(g,null),ref:s,innerScroll:!0})}))}}]);