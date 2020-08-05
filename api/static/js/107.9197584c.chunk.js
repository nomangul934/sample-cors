(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[107],{1570:function(e,a,t){"use strict";var n=t(1),o=t(5),i=t(0),c=t.n(i),l=(t(2),t(3)),r=t(11),s=c.a.forwardRef((function(e,a){var t=e.classes,i=e.className,r=e.dividers,s=void 0!==r&&r,m=Object(o.a)(e,["classes","className","dividers"]);return c.a.createElement("div",Object(n.a)({className:Object(l.default)(t.root,i,s&&t.dividers),ref:a},m))}));a.a=Object(r.a)((function(e){return{root:{flex:"1 1 auto",WebkitOverflowScrolling:"touch",overflowY:"auto",padding:"8px 24px","&:first-child":{paddingTop:20}},dividers:{padding:"16px 24px",borderTop:"1px solid ".concat(e.palette.divider),borderBottom:"1px solid ".concat(e.palette.divider)}}}),{name:"MuiDialogContent"})(s)},1588:function(e,a,t){"use strict";var n=t(1),o=t(5),i=t(0),c=t.n(i),l=(t(2),t(3)),r=t(11),s=c.a.forwardRef((function(e,a){var t=e.disableSpacing,i=void 0!==t&&t,r=e.classes,s=e.className,m=Object(o.a)(e,["disableSpacing","classes","className"]);return c.a.createElement("div",Object(n.a)({className:Object(l.default)(r.root,s,!i&&r.spacing),ref:a},m))}));a.a=Object(r.a)({root:{display:"flex",alignItems:"center",padding:8,justifyContent:"flex-end",flex:"0 0 auto"},spacing:{"& > :not(:first-child)":{marginLeft:8}}},{name:"MuiDialogActions"})(s)},1595:function(e,a,t){"use strict";var n=t(1),o=t(5),i=t(0),c=t.n(i),l=(t(2),t(3)),r=t(11),s=t(208),m=c.a.forwardRef((function(e,a){var t=e.children,i=e.classes,r=e.className,m=e.disableTypography,d=void 0!==m&&m,p=Object(o.a)(e,["children","classes","className","disableTypography"]);return c.a.createElement("div",Object(n.a)({className:Object(l.default)(i.root,r),ref:a},p),d?t:c.a.createElement(s.a,{component:"h2",variant:"h6"},t))}));a.a=Object(r.a)({root:{margin:0,padding:"16px 24px",flex:"0 0 auto"}},{name:"MuiDialogTitle"})(m)},1644:function(e,a,t){"use strict";var n=t(1),o=t(0),i=t.n(o),c=(t(2),t(11)),l=t(208),r=i.a.forwardRef((function(e,a){return i.a.createElement(l.a,Object(n.a)({component:"p",variant:"body1",color:"textSecondary",ref:a},e))}));a.a=Object(c.a)({root:{marginBottom:12}},{name:"MuiDialogContentText"})(r)},2760:function(e,a,t){"use strict";t.r(a);var n=t(144),o=t(193),i=t(1382),c=t(1588),l=t(1570),r=t(1644),s=t(1595),m=t(1377),d=t(208),p=t(20),u=t(0),g=t.n(u),f=t(8);a.default=function(e){var a=Object(f.b)();return g.a.createElement(o.a,{header:g.a.createElement("div",{className:"flex flex-1 items-center justify-between p-24"},g.a.createElement("div",{className:"flex flex-col"},g.a.createElement("div",{className:"flex items-center mb-16"},g.a.createElement(m.a,{className:"text-18",color:"action"},"home"),g.a.createElement(m.a,{className:"text-16",color:"action"},"chevron_right"),g.a.createElement(d.a,{color:"textSecondary"},"Documentation"),g.a.createElement(m.a,{className:"text-16",color:"action"},"chevron_right"),g.a.createElement(d.a,{color:"textSecondary"},"Fuse Components")),g.a.createElement(d.a,{variant:"h6"},"FuseDialog"))),content:g.a.createElement("div",{className:"p-24 max-w-2xl"},g.a.createElement(d.a,{className:"mb-16",component:"p"},g.a.createElement("code",null,"FuseDialog")," is a simple dialog trigger for easily showing dialog messages via redux action. It should be located in the theme layouts."),g.a.createElement(d.a,{className:"mt-32 mb-8",variant:"h5"},"Usage"),g.a.createElement(d.a,{className:"mb-16",component:"p"},"You can show dialog anywhere with dispatching the action openDialog, its using Material-UI's dialog so you can pass the props in the object:"),g.a.createElement(n.a,{component:"pre",className:"language-jsx"},'\n                        <Button\n                            onClick={()=> dispatch(Actions.openDialog({\n                                children: (\n                                    <React.Fragment>\n                                        <DialogTitle id="alert-dialog-title">Use Google\'s location service?</DialogTitle>\n                                        <DialogContent>\n                                            <DialogContentText id="alert-dialog-description">\n                                                Let Google help apps determine location. This means sending anonymous location data to\n                                                Google, even when no apps are running.\n                                            </DialogContentText>\n                                        </DialogContent>\n                                        <DialogActions>\n                                            <Button onClick={()=> dispatch(Actions.closeDialog())} color="primary">\n                                                Disagree\n                                            </Button>\n                                            <Button onClick={()=> dispatch(Actions.closeDialog())} color="primary" autoFocus>\n                                                Agree\n                                            </Button>\n                                        </DialogActions>\n                                    </React.Fragment>\n                                     )\n                                 }))}\n                            variant="contained"\n                            color="secondary"\n                        >\n                            Open Dialog\n                        </Button>\n                        '),g.a.createElement(d.a,{className:"mt-32 mb-8",variant:"h5"},"Example"),g.a.createElement(i.a,{onClick:function(){return a(p.h({children:g.a.createElement(g.a.Fragment,null,g.a.createElement(s.a,{id:"alert-dialog-title"},"Use Google's location service?"),g.a.createElement(l.a,null,g.a.createElement(r.a,{id:"alert-dialog-description"},"Let Google help apps determine location. This means sending anonymous location data to Google, even when no apps are running.")),g.a.createElement(c.a,null,g.a.createElement(i.a,{onClick:function(){return a(p.b())},color:"primary"},"Disagree"),g.a.createElement(i.a,{onClick:function(){return a(p.b())},color:"primary",autoFocus:!0},"Agree")))}))},variant:"contained",color:"secondary"},"Open Dialog"))})}}}]);