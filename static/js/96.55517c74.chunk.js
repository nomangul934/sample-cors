(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[96],{2250:function(e,t,a){"use strict";a.r(t);var n=a(20),i=a(0),c=a.n(i),r=a(233),o=a(6),s=a(273),m=a(62),l=a.n(m);function u(e){var t=l()({method:"post",url:"https://test.udros.com/api/api/school_admin/get_participants",data:{fair_id:e},config:{headers:{"Access-Control-Allow-Origin":"*","Content-Type":"application/json"}}});return function(e){return t.then((function(t){return e({type:"GET ALL UNIVERSITY DATA",payload:t.data})}))}}var p=a(69),d=a(8),g=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,t=arguments.length>1?arguments[1]:void 0;switch(t.type){case"GET ALL UNIVERSITY DATA":case"SUSPEND_UNIVERSITY":return Object(d.a)(Object(d.a)({},e),{},{data:Object(d.a)({},t.payload)});default:return e}},E=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,t=arguments.length>1?arguments[1]:void 0;switch(t.type){case"SUSPEND_UNIVERSITY":console.log("success");break;default:return e}},f=Object(p.d)({widgets:g,card:E}),v=a(1348),h=a(1623),y=a(203),b=a(195),j=a(10),x=(a(114),Object(v.a)((function(e){return{root:{flexGrow:1},paper:{padding:e.spacing(2),margin:"auto",marginBottom:15},button:{margin:e.spacing(1)},msg_button:{color:"#ddd"},view_button:{},suspend_button:{},unsuspend_button:{},pagination:{"& > *":{marginTop:e.spacing(2)}},image:{width:128,height:128},img:{margin:"auto",display:"block",maxWidth:"100%",maxHeight:"100%",objectFit:"fill"}}})));function O(e){Object(o.b)();var t=x(),a=j.a.merge({},e.data);a.city=null!=a.city?a.city.replace('["',""):a.city,a.city=null!=a.city?a.city.replace('"]',""):a.city,a.users=null!=a.users?a.users.replace('["',""):a.users,a.users=null!=a.users?a.users.replace('"]',""):a.users,a.emails=null!=a.emails?a.emails.replace('["',""):a.emails,a.emails=null!=a.emails?a.emails.replace('"]',""):a.emails;var i=c.a.useState(1==e.data.state?"Suspend":"Unsuspend"),s=Object(n.a)(i,2);s[0],s[1];return c.a.createElement("div",{className:t.root},c.a.createElement(y.a,{className:t.paper},c.a.createElement(h.a,{container:!0,spacing:2},c.a.createElement(h.a,{item:!0,xs:12,sm:12,md:3},c.a.createElement(b.a,{className:t.image},c.a.createElement("img",{className:t.img,alt:"complex",src:null!=a.logo?"/assets/images/university/"+a.logo:"/assets/images/university/university.png"}))),c.a.createElement(h.a,{item:!0,xs:12,sm:12,md:9,container:!0},c.a.createElement(h.a,{item:!0,container:!0},c.a.createElement(h.a,{item:!0,xs:12,sm:12,md:12,container:!0},c.a.createElement(h.a,{item:!0,xs:6},c.a.createElement(r.a,{gutterBottom:!0,component:"div"},"Uni Name: ",a.name)),c.a.createElement(h.a,{item:!0,xs:6},c.a.createElement(r.a,{gutterBottom:!0,component:"div"},"ID: ",a.id)))),c.a.createElement(h.a,{item:!0,container:!0},c.a.createElement(h.a,{item:!0,xs:12,sm:12,md:12,container:!0},c.a.createElement(h.a,{item:!0,xs:6},c.a.createElement(r.a,{gutterBottom:!0,component:"div"},"Uni Email: ",a.email)),c.a.createElement(h.a,{item:!0,xs:6},c.a.createElement(r.a,{gutterBottom:!0,component:"div"},"Contact Phone: ",a.userphone)))),c.a.createElement(h.a,{item:!0,container:!0},c.a.createElement(h.a,{item:!0,xs:12,sm:12,md:12,container:!0},c.a.createElement(h.a,{item:!0,xs:6},c.a.createElement(r.a,{gutterBottom:!0,component:"div"},"Contact Person: ",a.username)),c.a.createElement(h.a,{item:!0,xs:6},c.a.createElement(r.a,{gutterBottom:!0,component:"div"},"Contact Email: ",a.useremail)))),c.a.createElement(h.a,{item:!0,container:!0},c.a.createElement(h.a,{item:!0,xs:12,sm:12,md:12,container:!0},c.a.createElement(h.a,{item:!0,xs:6},c.a.createElement(r.a,{gutterBottom:!0,component:"div"},"City: ",void 0!=a.city&&""!=a.city&&null!=a.city&&"null"!=a.city?a.city:"")))))),c.a.createElement(h.a,{container:!0,spacing:2})))}var N=a(2272),_=Object(v.a)((function(e){return{root:{"& > *":{marginTop:e.spacing(2)}}}}));function T(e){var t=_(),a=Object(o.b)(),n=(Object(o.c)((function(e){return e.auth.user})),e.fair_id);return c.a.createElement("div",{className:t.root},c.a.createElement(N.a,{count:Math.ceil(e.data/5),color:"primary",onChange:function(e,t){console.log(t),l()({method:"post",url:"https://test.udros.com/api/api/school_admin/get_participants",data:{fair_id:n,page:t},config:{headers:{"Access-Control-Allow-Origin":"*","Content-Type":"application/json"}}}).then((function(e){return a({type:"GET ALL UNIVERSITY DATA",payload:e.data})}))}}))}var w=a(1448),A=a.n(w);t.default=Object(s.a)("manageUniversity",f)((function(e){var t=Object(o.b)(),a=Object(o.c)((function(e){return e.manageUniversity.widgets})),s=(Object(o.c)((function(e){return e.auth.user})),c.a.useState("")),m=Object(n.a)(s,2);return m[0],m[1],Object(i.useEffect)((function(){t(u(e.match.params.fair_id))}),[t]),a?c.a.createElement("div",{className:"w-full"},c.a.createElement(r.a,{className:"text-32 p-20",component:"h3",style:{backgroundColor:"#0098E0",color:"#FFF"}},"Participant universities"),c.a.createElement("div",{className:"p-20"},a.data.data.map((function(e,t){return c.a.createElement(O,{data:e,page:a.current_page,className:"w-full",key:t})})),c.a.createElement(A.a,{container:!0,spacing:0,direction:"column",alignItems:"center",justify:"center"},c.a.createElement(A.a,{item:!0,xs:12},c.a.createElement(T,{data:a.data.total,fair_id:e.match.params.fair_id}))))):null}))}}]);