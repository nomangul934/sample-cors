(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[230],{2856:function(e,a,t){"use strict";t.r(a);var c=t(23),l=t(133),n=t(463),r=t(193),m=t(1382),s=t(224),i=t(225),o=t(1377),p=t(716),f=t(476),E=t(209),h=t(1368),u=t(52),d=t(1404),x=t(208),N=t(73),b=t.n(N),v=t(3),w=t(0),j=t.n(w),O=Object(h.a)({title:{color:s.a[800]},url:{color:i.a[800]}});a.default=function(){var e=O(),a=Object(u.a)(),t=Object(w.useState)([]),s=Object(c.a)(t,2),i=s[0],h=s[1];return Object(w.useEffect)((function(){b.a.get("/api/search").then((function(e){h(e.data)}))}),[]),j.a.createElement(r.a,{header:j.a.createElement("div",{className:"flex flex-1 items-center p-16 sm:p-24 max-w-md"},j.a.createElement(d.a,{theme:a},j.a.createElement(E.a,{className:"flex items-center h-44 w-full px-16",elevation:1},j.a.createElement(f.a,{placeholder:"Search...",disableUnderline:!0,fullWidth:!0,inputProps:{"aria-label":"Search"}}),j.a.createElement(o.a,{color:"action"},"search")))),content:j.a.createElement("div",{className:"p-16 pt-0 sm:p-24 sm:pt-0 max-w-md"},j.a.createElement(l.a,{delay:200},j.a.createElement(x.a,{color:"textSecondary",className:"text-13 mt-12 mb-24"},i.length," results")),j.a.createElement(n.a,{enter:{animation:"transition.slideUpBigIn"}},i.map((function(a){return j.a.createElement("div",{className:"mb-28",key:a.id},j.a.createElement(x.a,{className:Object(v.default)(e.title,"text-18 cursor-pointer")},a.title),j.a.createElement(x.a,{className:Object(v.default)(e.url)},a.url),j.a.createElement(x.a,{className:"text-13"},a.excerpt))}))),j.a.createElement("div",{className:"flex justify-center mt-32"},j.a.createElement("div",{className:"flex item-center"},j.a.createElement(p.a,{className:"w-32"},j.a.createElement(o.a,{className:"text-20"},"ltr"===a.direction?"chevron_left":"chevron_right")),j.a.createElement(m.a,{className:"font-normal min-w-32 h-48 p-0 px-8"},"1"),j.a.createElement(m.a,{className:"font-normal min-w-32 h-48 p-0 px-8"},"2"),j.a.createElement(m.a,{className:"font-normal min-w-32 h-48 p-0 px-8"},"3"),j.a.createElement(m.a,{className:"font-normal min-w-32 h-48 p-0 px-8"},"4"),j.a.createElement(m.a,{className:"font-normal min-w-32 h-48 p-0 px-8"},"5"),j.a.createElement(p.a,{className:"w-32"},j.a.createElement(o.a,{className:"text-20"},"ltr"===a.direction?"chevron_right":"chevron_left")))))})}}}]);