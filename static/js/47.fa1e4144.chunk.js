(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[47],{2026:function(e,t,a){"use strict";var n=a(1),r=a(5),c=a(0),l=(a(2),a(3)),o=a(11),i=c.forwardRef((function(e,t){var a=e.classes,o=e.className,i=e.dividers,s=void 0!==i&&i,m=Object(r.a)(e,["classes","className","dividers"]);return c.createElement("div",Object(n.a)({className:Object(l.default)(a.root,o,s&&a.dividers),ref:t},m))}));t.a=Object(o.a)((function(e){return{root:{flex:"1 1 auto",WebkitOverflowScrolling:"touch",overflowY:"auto",padding:"8px 24px","&:first-child":{paddingTop:20}},dividers:{padding:"16px 24px",borderTop:"1px solid ".concat(e.palette.divider),borderBottom:"1px solid ".concat(e.palette.divider)}}}),{name:"MuiDialogContent"})(i)},2027:function(e,t,a){"use strict";var n=a(1),r=a(5),c=a(0),l=(a(2),a(3)),o=a(11),i=c.forwardRef((function(e,t){var a=e.disableSpacing,o=void 0!==a&&a,i=e.classes,s=e.className,m=Object(r.a)(e,["disableSpacing","classes","className"]);return c.createElement("div",Object(n.a)({className:Object(l.default)(i.root,s,!o&&i.spacing),ref:t},m))}));t.a=Object(o.a)({root:{display:"flex",alignItems:"center",padding:8,justifyContent:"flex-end",flex:"0 0 auto"},spacing:{"& > :not(:first-child)":{marginLeft:8}}},{name:"MuiDialogActions"})(i)},2032:function(e,t,a){"use strict";var n=a(1),r=a(0),c=(a(2),a(11)),l=a(233),o=r.forwardRef((function(e,t){return r.createElement(l.a,Object(n.a)({component:"p",variant:"body1",color:"textSecondary",ref:t},e))}));t.a=Object(c.a)({root:{marginBottom:12}},{name:"MuiDialogContentText"})(o)},2033:function(e,t,a){"use strict";var n=a(1),r=a(5),c=a(0),l=(a(2),a(3)),o=a(11),i=a(233),s=c.forwardRef((function(e,t){var a=e.children,o=e.classes,s=e.className,m=e.disableTypography,u=void 0!==m&&m,d=Object(r.a)(e,["children","classes","className","disableTypography"]);return c.createElement("div",Object(n.a)({className:Object(l.default)(o.root,s),ref:t},d),u?a:c.createElement(i.a,{component:"h2",variant:"h6"},a))}));t.a=Object(o.a)({root:{margin:0,padding:"16px 24px",flex:"0 0 auto"}},{name:"MuiDialogTitle"})(s)},2215:function(e,t,a){"use strict";a.r(t);var n=a(8),r=a(20),c=a(134),l=a(200),o=a(1376),i=a(1402),s=a(1403),m=a(1389),u=a(2027),d=a(2026),p=a(2032),f=a(2033),b=a(1371),v=a(722),x=a(711),E=a(1400),g=a(1379),j=a(1339),O=a(1348),y=a(233),w=a(62),h=a.n(w),N=a(3),k=a(0),S=a.n(k),C=S.a.forwardRef((function(e,t){return S.a.createElement(j.a,Object.assign({direction:"up",ref:t},e))})),T=Object(O.a)((function(e){return{header:{background:"linear-gradient(to right, ".concat(e.palette.primary.dark," 0%, ").concat(e.palette.primary.main," 100%)"),color:e.palette.primary.contrastText}}}));t.default=function(){var e=T(),t=Object(k.useState)([]),a=Object(r.a)(t,2),j=a[0],O=a[1],w=Object(k.useState)({open:!1,title:null,content:null}),M=Object(r.a)(w,2),R=M[0],D=M[1];return Object(k.useEffect)((function(){h.a.get("/api/knowledge-base").then((function(e){O(e.data)}))}),[]),S.a.createElement("div",{className:"w-full"},S.a.createElement("div",{className:Object(N.default)(e.header,"flex flex-col items-center justify-center text-center p-16 sm:p-24 h-200 sm:h-360")},S.a.createElement(c.a,{animation:"transition.slideUpIn",duration:400,delay:100},S.a.createElement(y.a,{color:"inherit",className:"text-36 sm:text-56 font-light"},"How can we help?")),S.a.createElement(c.a,{duration:400,delay:600},S.a.createElement(y.a,{variant:"subtitle1",color:"inherit",className:"opacity-75 mt-16 mx-auto max-w-512"},"Welcome to our knowledge base"))),S.a.createElement("div",null,Object(k.useMemo)((function(){return S.a.createElement(l.a,{enter:{animation:"transition.slideUpBigIn"},className:"flex flex-wrap justify-center max-w-xl w-full mx-auto px-16 sm:px-24 py-32"},j.map((function(e){return S.a.createElement("div",{className:"w-full max-w-512 pb-24 md:w-1/2 md:p-16",key:e.id},S.a.createElement(i.a,{elevation:1},S.a.createElement(s.a,null,S.a.createElement(y.a,{className:"font-medium px-16 pt-8",color:"textSecondary"},e.title),S.a.createElement(v.a,{component:"nav"},e.featuredArticles.map((function(e){return S.a.createElement(x.a,{key:e.id,button:!0,onClick:function(){return t=e,void D(Object(n.a)({open:!0},t));var t}},S.a.createElement(E.a,{className:"min-w-40"},S.a.createElement(b.a,null,"note")),S.a.createElement(g.a,{primary:e.title}))}))),S.a.createElement(o.a,{className:"normal-case w-full justify-start",color:"secondary"},"See all articles (".concat(e.articlesCount,")")))))})))}),[j])),Object(k.useMemo)((function(){function e(){D(Object(n.a)(Object(n.a)({},R),{},{open:!1}))}return S.a.createElement(m.a,{open:R.open,onClose:e,"aria-labelledby":"knowledge-base-document",TransitionComponent:C},S.a.createElement(f.a,null,R.title),S.a.createElement(d.a,null,S.a.createElement(p.a,{dangerouslySetInnerHTML:{__html:R.content}})),S.a.createElement(u.a,null,S.a.createElement(o.a,{onClick:e,color:"primary"},"CLOSE")))}),[R]))}}}]);