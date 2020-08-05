(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[122],{1436:function(t,e,r){"use strict";var a=r(67),n=r(68),i=r(113),c=r(112),o=r(270),d=r(0),u=r.n(d);e.a=function(t,e){return function(r){return function(d){Object(i.a)(p,d);var s=Object(c.a)(p);function p(r){var n;return Object(a.a)(this,p),n=s.call(this,r),Object(o.b)(t,e),n}return Object(n.a)(p,[{key:"render",value:function(){return u.a.createElement(r,this.props)}}]),p}(u.a.PureComponent)}}},1482:function(t,e,r){"use strict";var a=r(26),n=r(276),i=r(10),c=r(49),o=r(73),d=r.n(o),u=r(67),s=function t(e){Object(u.a)(this,t);var r=e||{};this.id=r.id||a.a.generateGUID(),this.name=r.name||"",this.description=r.description||"",this.idAttachmentCover=r.idAttachmentCover||"",this.idMembers=r.idMembers||[],this.idLabels=r.idLabels||[],this.attachments=r.attachments||[],this.subscribed=r.subscribed||!0,this.checklists=r.checklists||[],this.checkItems=r.checkItems||0,this.checkItemsChecked=r.checkItemsChecked||0,this.comments=r.comments||[],this.activities=r.activities||[],this.due=r.due||""},p=function t(e){Object(u.a)(this,t);var r=e||{};this.id=r.id||a.a.generateGUID(),this.name=r.name||"",this.idCards=[]},l=[{id:"26022e4129ad3a5sc28b36cd",name:"High Priority",class:"bg-red text-white"},{id:"56027e4119ad3a5dc28b36cd",name:"Design",class:"bg-orange text-white"},{id:"5640635e19ad3a5dc21416b2",name:"App",class:"bg-blue text-white"},{id:"6540635g19ad3s5dc31412b2",name:"Feature",class:"bg-green text-white"}],b=[{id:"56027c1930450d8bf7b10758",name:"Alice Freeman",avatar:"assets/images/avatars/alice.jpg"},{id:"26027s1930450d8bf7b10828",name:"Danielle Obrien",avatar:"assets/images/avatars/danielle.jpg"},{id:"76027g1930450d8bf7b10958",name:"James Lewis",avatar:"assets/images/avatars/james.jpg"},{id:"36027j1930450d8bf7b10158",name:"John Doe",avatar:"assets/images/avatars/vincent.jpg"}],f=function t(e){Object(u.a)(this,t);var r=e||{};this.name=r.name||"Untitled Board",this.uri=r.uri||"untitled-board",this.id=r.id||a.a.generateGUID(),this.settings=r.settings||{color:"",subscribed:!0,cardCoverImages:!0},this.lists=[],this.cards=[],this.members=r.members||b,this.labels=r.labels||l};function m(){var t=d.a.get("/api/scrumboard-app/boards");return function(e){return t.then((function(t){return e({type:"[SCRUMBOARD APP] GET BOARDS",payload:t.data})}))}}function A(){return{type:"[SCRUMBOARD APP] RESET BOARDS"}}function O(t){var e=d.a.post("/api/scrumboard-app/board/new",{board:t||new f});return function(t){return e.then((function(e){var r=e.data;return n.a.push({pathname:"/apps/scrumboard/boards/".concat(r.id,"/").concat(r.handle)}),t({type:"[SCRUMBOARD APP] NEW BOARD",board:r})}))}}var R=r(23),h=function(t,e,r){var a=Array.from(t),n=a.splice(e,1),i=Object(R.a)(n,1)[0];return a.splice(r,0,i),a},D=h,P="[SCRUMBOARD APP] ADD CARD",C="[SCRUMBOARD APP] ADD LIST";function v(t){var e=d.a.get("/api/scrumboard-app/board",{params:t});return function(t){return e.then((function(e){return t({type:"[SCRUMBOARD APP] GET BOARD",payload:e.data})}),(function(e){t(Object(c.H)({message:e.response.data,autoHideDuration:2e3,anchorOrigin:{vertical:"top",horizontal:"right"}})),n.a.push({pathname:"/apps/scrumboard/boards"})}))}}function E(){return{type:"[SCRUMBOARD APP] RESET BOARD"}}function g(t){return function(e,r){var a=r().scrumboardApp.board,n=a.lists,i=D(n,t.source.index,t.destination.index);return d.a.post("/api/scrumboard-app/list/order",{boardId:a.id,lists:i}).then((function(t){e(Object(c.H)({message:"List Order Saved",autoHideDuration:2e3,anchorOrigin:{vertical:"top",horizontal:"right"}}))})),e({type:"[SCRUMBOARD APP] ORDER LIST",payload:i})}}function S(t){return function(e,r){var a=r().scrumboardApp.board,n=function(t,e,r){var a=i.a.find(t,{id:e.droppableId}),n=i.a.find(t,{id:r.droppableId}),c=a.idCards[e.index];if(e.droppableId===r.droppableId){var o=h(a.idCards,e.index,r.index);return t.map((function(t){return t.id===e.droppableId&&(t.idCards=o),t}))}return a.idCards.splice(e.index,1),n.idCards.splice(r.index,0,c),t.map((function(t){return t.id===e.droppableId?a:t.id===r.droppableId?n:t}))}(a.lists,t.source,t.destination);return d.a.post("/api/scrumboard-app/card/order",{boardId:a.id,lists:n}).then((function(t){e(Object(c.H)({message:"Card Order Saved",autoHideDuration:2e3,anchorOrigin:{vertical:"top",horizontal:"right"}}))})),e({type:"[SCRUMBOARD APP] ORDER CARD",payload:n})}}function y(t,e,r){var a=new s({name:r}),n=d.a.post("/api/scrumboard-app/card/new",{boardId:t,listId:e,data:a});return function(t){return new Promise((function(e,r){n.then((function(r){return e(r.data),t({type:P,payload:r.data})}))}))}}function j(t,e){var r=new p({name:e}),a=d.a.post("/api/scrumboard-app/list/new",{boardId:t,data:r});return function(t){return a.then((function(e){return t({type:C,payload:e.data})}))}}function B(t,e,r){var a=d.a.post("/api/scrumboard-app/list/rename",{boardId:t,listId:e,listTitle:r});return function(t){return a.then((function(a){return t({type:"[SCRUMBOARD APP] RENAME LIST",listId:e,listTitle:r})}))}}function I(t,e){var r=d.a.post("/api/scrumboard-app/list/remove",{boardId:t,listId:e});return function(t){return r.then((function(r){return t({type:"[SCRUMBOARD APP] REMOVE LIST",listId:e})}))}}function M(t){return function(e){return e({type:"[SCRUMBOARD APP] ADD LABEL",payload:t})}}function x(t){return function(e,r){var a=r().scrumboardApp.board,n=i.a.merge(a.settings,t);return d.a.post("/api/scrumboard-app/board/settings/update",{boardId:a.id,settings:n}).then((function(t){return e({type:"[SCRUMBOARD APP] CHANGE BOARD SETTINGS",payload:t.data})}))}}function U(t){var e=d.a.post("/api/scrumboard-app/board/delete",{boardId:t});return function(t){return e.then((function(e){return n.a.push({pathname:"/apps/scrumboard/boards"}),t({type:"[SCRUMBOARD APP] DELETE BOARD"})}))}}function w(t){var e=i.a.merge(t,{id:a.a.generateGUID(),name:"".concat(t.name," (Copied)"),uri:"".concat(t.uri,"-copied")});return function(t){return t(O(e)),{type:"[SCRUMBOARD APP] COPY BOARD"}}}function T(t,e){var r=d.a.post("/api/scrumboard-app/board/rename",{boardId:t,boardTitle:e});return function(t){return r.then((function(r){return t({type:"[SCRUMBOARD APP] RENAME BOARD",boardTitle:e})}))}}function L(t){return{type:"[SCRUMBOARD APP] OPEN CARD DIALOG",payload:t}}function N(){return{type:"[SCRUMBOARD APP] CLOSE CARD DIALOG"}}function k(t,e){return function(r){return d.a.post("/api/scrumboard-app/card/update",{boardId:t,card:e}).then((function(t){return r(Object(c.H)({message:"Card Saved",autoHideDuration:2e3,anchorOrigin:{vertical:"top",horizontal:"right"}})),r({type:"[SCRUMBOARD APP] UPDATE CARD",payload:e})}))}}function G(t,e){return function(r){return d.a.post("/api/scrumboard-app/card/remove",{boardId:t,cardId:e}).then((function(a){return r({type:"[SCRUMBOARD APP] REMOVE CARD",boardId:t,cardId:e})}))}}r.d(e,"g",(function(){return"[SCRUMBOARD APP] GET BOARD"})),r.d(e,"f",(function(){return"[SCRUMBOARD APP] DELETE BOARD"})),r.d(e,"o",(function(){return"[SCRUMBOARD APP] RENAME BOARD"})),r.d(e,"d",(function(){return"[SCRUMBOARD APP] CHANGE BOARD SETTINGS"})),r.d(e,"q",(function(){return"[SCRUMBOARD APP] RESET BOARD"})),r.d(e,"l",(function(){return"[SCRUMBOARD APP] ORDER LIST"})),r.d(e,"k",(function(){return"[SCRUMBOARD APP] ORDER CARD"})),r.d(e,"a",(function(){return P})),r.d(e,"c",(function(){return C})),r.d(e,"b",(function(){return"[SCRUMBOARD APP] ADD LABEL"})),r.d(e,"p",(function(){return"[SCRUMBOARD APP] RENAME LIST"})),r.d(e,"n",(function(){return"[SCRUMBOARD APP] REMOVE LIST"})),r.d(e,"y",(function(){return v})),r.d(e,"K",(function(){return E})),r.d(e,"J",(function(){return g})),r.d(e,"I",(function(){return S})),r.d(e,"B",(function(){return y})),r.d(e,"C",(function(){return j})),r.d(e,"H",(function(){return B})),r.d(e,"F",(function(){return I})),r.d(e,"t",(function(){return M})),r.d(e,"u",(function(){return x})),r.d(e,"x",(function(){return U})),r.d(e,"w",(function(){return w})),r.d(e,"G",(function(){return T})),r.d(e,"h",(function(){return"[SCRUMBOARD APP] GET BOARDS"})),r.d(e,"r",(function(){return"[SCRUMBOARD APP] RESET BOARDS"})),r.d(e,"i",(function(){return"[SCRUMBOARD APP] NEW BOARD"})),r.d(e,"z",(function(){return m})),r.d(e,"L",(function(){return A})),r.d(e,"A",(function(){return O})),r.d(e,"j",(function(){return"[SCRUMBOARD APP] OPEN CARD DIALOG"})),r.d(e,"e",(function(){return"[SCRUMBOARD APP] CLOSE CARD DIALOG"})),r.d(e,"s",(function(){return"[SCRUMBOARD APP] UPDATE CARD"})),r.d(e,"m",(function(){return"[SCRUMBOARD APP] REMOVE CARD"})),r.d(e,"D",(function(){return L})),r.d(e,"v",(function(){return N})),r.d(e,"M",(function(){return k})),r.d(e,"E",(function(){return G}))},1797:function(t,e,r){"use strict";var a=r(74),n=r(13),i=r(7),c=r(10),o=r(1482),d=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,e=arguments.length>1?arguments[1]:void 0;switch(e.type){case o.g:return Object(i.a)({},e.payload);case o.q:return null;case o.l:case o.k:case o.c:return Object(i.a)(Object(i.a)({},t),{},{lists:e.payload});case o.a:return Object(i.a)({},e.payload);case o.b:return Object(i.a)(Object(i.a)({},t),{},{labels:[].concat(Object(n.a)(t.labels),[e.payload])});case o.s:return Object(i.a)(Object(i.a)({},t),{},{cards:t.cards.map((function(t){return t.id===e.payload.id?e.payload:t}))});case o.m:return Object(i.a)(Object(i.a)({},t),{},{cards:c.a.reject(t.cards,{id:e.cardId}),lists:t.lists.map((function(t){return c.a.set(t,"idCards",c.a.reject(t.idCards,(function(t){return t===e.cardId}))),t}))});case o.p:return Object(i.a)(Object(i.a)({},t),{},{lists:t.lists.map((function(t){return t.id===e.listId&&(t.name=e.listTitle),t}))});case o.n:return Object(i.a)(Object(i.a)({},t),{},{lists:c.a.reject(t.lists,{id:e.listId})});case o.d:return Object(i.a)(Object(i.a)({},t),{},{settings:e.payload});case o.f:return null;case o.o:return Object(i.a)(Object(i.a)({},t),{},{name:e.boardTitle});default:return t}},u=[],s=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:u,e=arguments.length>1?arguments[1]:void 0;switch(e.type){case o.h:return Object(n.a)(e.payload);case o.i:return[].concat(Object(n.a)(t),[e.board]);case o.r:return[];default:return t}},p={dialogOpen:!1,data:null},l=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:p,e=arguments.length>1?arguments[1]:void 0;switch(e.type){case o.j:return{dialogOpen:!0,data:e.payload};case o.s:return Object(i.a)(Object(i.a)({},t),{},{data:e.payload});case o.m:case o.e:return p;default:return t}},b=Object(a.d)({boards:s,board:d,card:l});e.a=b},2722:function(t,e,r){"use strict";r.r(e);var a=r(133),n=r(463),i=r(1377),c=r(1368),o=r(196),d=r(208),u=r(1436),s=r(3),p=r(0),l=r.n(p),b=r(8),f=r(30),m=r(1482),A=r(1797),O=Object(c.a)((function(t){return{root:{background:t.palette.primary.main,color:t.palette.getContrastText(t.palette.primary.main)},board:{cursor:"pointer",boxShadow:t.shadows[0],transitionProperty:"box-shadow border-color",transitionDuration:t.transitions.duration.short,transitionTimingFunction:t.transitions.easing.easeInOut,background:t.palette.primary.dark,color:t.palette.getContrastText(t.palette.primary.dark),"&:hover":{boxShadow:t.shadows[6]}},newBoard:{borderWidth:2,borderStyle:"dashed",borderColor:Object(o.fade)(t.palette.getContrastText(t.palette.primary.main),.6),"&:hover":{borderColor:Object(o.fade)(t.palette.getContrastText(t.palette.primary.main),.8)}}}}));e.default=Object(u.a)("scrumboardApp",A.a)((function(t){var e=Object(b.b)(),r=Object(b.c)((function(t){return t.scrumboardApp.boards})),c=O(t);return Object(p.useEffect)((function(){return e(m.z()),function(){e(m.L())}}),[e]),l.a.createElement("div",{className:Object(s.default)(c.root,"flex flex-grow flex-shrink-0 flex-col items-center")},l.a.createElement("div",{className:"flex flex-grow flex-shrink-0 flex-col items-center container px-16 md:px-24"},l.a.createElement(a.a,null,l.a.createElement(d.a,{className:"mt-44 sm:mt-88 sm:py-24 text-32 sm:text-40 font-300",color:"inherit"},"Scrumboard App")),l.a.createElement("div",null,l.a.createElement(n.a,{className:"flex flex-wrap w-full justify-center py-32 px-16",enter:{animation:"transition.slideUpBigIn",duration:300}},r.map((function(t){return l.a.createElement("div",{className:"w-224 h-224 p-16",key:t.id},l.a.createElement(f.a,{to:"/apps/scrumboard/boards/".concat(t.id,"/").concat(t.uri),className:Object(s.default)(c.board,"flex flex-col items-center justify-center w-full h-full rounded py-24"),role:"button"},l.a.createElement(i.a,{className:"text-56"},"assessment"),l.a.createElement(d.a,{className:"text-16 font-300 text-center pt-16 px-32",color:"inherit"},t.name)))})),l.a.createElement("div",{className:"w-224 h-224 p-16"},l.a.createElement("div",{className:Object(s.default)(c.board,c.newBoard,"flex flex-col items-center justify-center w-full h-full rounded py-24"),onClick:function(){return e(m.A())},onKeyDown:function(){return e(m.A())},role:"button",tabIndex:0},l.a.createElement(i.a,{className:"text-56"},"add_circle"),l.a.createElement(d.a,{className:"text-16 font-300 text-center pt-16 px-32",color:"inherit"},"Add new board")))))))}))}}]);