(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[51],{1413:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.FrameContextConsumer=t.FrameContextProvider=t.FrameContext=void 0;var a,r=n(0),o=(a=r)&&a.__esModule?a:{default:a};var i=void 0,c=void 0;"undefined"!==typeof document&&(i=document),"undefined"!==typeof window&&(c=window);var l=t.FrameContext=o.default.createContext({document:i,window:c}),s=l.Provider,u=l.Consumer;t.FrameContextProvider=s,t.FrameContextConsumer=u},1416:function(e,t,n){"use strict";var a=n(23),r=n(144),o=n(1403),i=n(1406),c=n(1377),l=n(1408),s=n(1409),u=n(0),m=n.n(u),d=n(13),p=n(7),f=n(67),b=n(68),h=n(113),y=n(112),v=n(1333),g=n(693),O=n(1367),j=n(1404),x=n(11),E=n(453),k=n(454),w=n(1417),D=n.n(w),P=Object(v.a)({productionPrefix:"iframe-"}),C=function(e){Object(h.a)(n,e);var t=Object(y.a)(n);function n(){var e;Object(f.a)(this,n);for(var a=arguments.length,r=new Array(a),o=0;o<a;o++)r[o]=arguments[o];return(e=t.call.apply(t,[this].concat(r))).state={ready:!1},e.handleRef=function(t){e.contentDocument=t?t.node.contentDocument:null},e.onContentDidMount=function(){e.setState({ready:!0,jss:Object(E.a)(Object(p.a)(Object(p.a)({},Object(g.a)()),{},{plugins:[].concat(Object(d.a)(Object(g.a)().plugins),[Object(k.a)()]),insertionPoint:e.contentDocument.querySelector("#jss-demo-insertion-point")})),sheetsManager:new Map,container:e.contentDocument.body})},e.onContentDidUpdate=function(){e.contentDocument.body.dir=e.props.theme.direction},e.renderHead=function(){return m.a.createElement(m.a.Fragment,null,m.a.createElement("style",{dangerouslySetInnerHTML:{__html:"\n                    html {\n                    font-size: 62.5%;\n                    font-family: Muli, Roboto, Helvetica Neue, Arial, sans-serif;\n                    }\n                "}}),m.a.createElement("noscript",{id:"jss-demo-insertion-point"}))},e}return Object(b.a)(n,[{key:"render",value:function(){var e=this.props,t=e.children,n=e.classes,a=e.theme;return m.a.createElement(D.a,{head:this.renderHead(),ref:this.handleRef,className:n.root,contentDidMount:this.onContentDidMount,contentDidUpdate:this.onContentDidUpdate},this.state.ready?m.a.createElement(O.b,{jss:this.state.jss,generateClassName:P,sheetsManager:this.state.sheetsManager},m.a.createElement(j.a,{theme:a},m.a.cloneElement(t,{container:this.state.container}))):null)}}]),n}(m.a.Component),N=Object(x.a)((function(e){return{root:{backgroundColor:e.palette.background.default,flexGrow:1,height:400,border:"none",boxShadow:e.shadows[1]}}}),{withTheme:!0})(C);function M(e){var t=Object(u.useState)(e.currentTabIndex),n=Object(a.a)(t,2),d=n[0],p=n[1],f=e.component,b=e.raw,h=e.iframe,y=e.className;return m.a.createElement(i.a,{className:y},m.a.createElement(o.a,{position:"static",color:"default",elevation:0},m.a.createElement(s.a,{classes:{root:"border-b-1",flexContainer:"justify-end"},value:d,onChange:function(e,t){p(t)}},f&&m.a.createElement(l.a,{classes:{root:"min-w-64"},icon:m.a.createElement(c.a,null,"remove_red_eye")}),b&&m.a.createElement(l.a,{classes:{root:"min-w-64"},icon:m.a.createElement(c.a,null,"code")}))),m.a.createElement("div",{className:"flex justify-center"},m.a.createElement("div",{className:0===d?"flex flex-1":"hidden"},f&&(h?m.a.createElement(N,null,m.a.createElement(f,null)):m.a.createElement("div",{className:"p-24 flex flex-1 justify-center"},m.a.createElement(f,null)))),m.a.createElement("div",{className:1===d?"flex flex-1":"hidden"},b&&m.a.createElement("div",{className:"flex flex-1"},m.a.createElement(r.a,{component:"pre",className:"language-javascript w-full"},b.default)))))}M.defaultProps={currentTabIndex:0};var T=M;n.d(t,"a",(function(){return T}))},1417:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.FrameContextConsumer=t.FrameContext=void 0;var a=n(1413);Object.defineProperty(t,"FrameContext",{enumerable:!0,get:function(){return a.FrameContext}}),Object.defineProperty(t,"FrameContextConsumer",{enumerable:!0,get:function(){return a.FrameContextConsumer}});var r,o=n(1418),i=(r=o)&&r.__esModule?r:{default:r};t.default=i.default},1418:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var a in n)Object.prototype.hasOwnProperty.call(n,a)&&(e[a]=n[a])}return e},r=function(){function e(e,t){for(var n=0;n<t.length;n++){var a=t[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}return function(t,n,a){return n&&e(t.prototype,n),a&&e(t,a),t}}(),o=n(0),i=m(o),c=m(n(18)),l=m(n(2)),s=n(1413),u=m(n(1419));function m(e){return e&&e.__esModule?e:{default:e}}var d=function(e){function t(e,n){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t);var a=function(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e,n));return a.handleLoad=function(){a.forceUpdate()},a._isMounted=!1,a}return function(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,e),r(t,[{key:"componentDidMount",value:function(){this._isMounted=!0;var e=this.getDoc();e&&"complete"===e.readyState?this.forceUpdate():this.node.addEventListener("load",this.handleLoad)}},{key:"componentWillUnmount",value:function(){this._isMounted=!1,this.node.removeEventListener("load",this.handleLoad)}},{key:"getDoc",value:function(){return this.node?this.node.contentDocument:null}},{key:"getMountTarget",value:function(){var e=this.getDoc();return this.props.mountTarget?e.querySelector(this.props.mountTarget):e.body.children[0]}},{key:"renderFrameContents",value:function(){if(!this._isMounted)return null;var e=this.getDoc();if(!e)return null;var t=this.props.contentDidMount,n=this.props.contentDidUpdate,a=e.defaultView||e.parentView,r=!this._setInitialContent,o=i.default.createElement(u.default,{contentDidMount:t,contentDidUpdate:n},i.default.createElement(s.FrameContextProvider,{value:{document:e,window:a}},i.default.createElement("div",{className:"frame-content"},this.props.children)));r&&(e.open("text/html","replace"),e.write(this.props.initialContent),e.close(),this._setInitialContent=!0);var l=this.getMountTarget();return[c.default.createPortal(this.props.head,this.getDoc().head),c.default.createPortal(o,l)]}},{key:"render",value:function(){var e=this,t=a({},this.props,{children:void 0});return delete t.head,delete t.initialContent,delete t.mountTarget,delete t.contentDidMount,delete t.contentDidUpdate,i.default.createElement("iframe",a({},t,{ref:function(t){e.node=t}}),this.renderFrameContents())}}]),t}(o.Component);d.propTypes={style:l.default.object,head:l.default.node,initialContent:l.default.string,mountTarget:l.default.string,contentDidMount:l.default.func,contentDidUpdate:l.default.func,children:l.default.oneOfType([l.default.element,l.default.arrayOf(l.default.element)])},d.defaultProps={style:{},head:null,children:void 0,mountTarget:void 0,contentDidMount:function(){},contentDidUpdate:function(){},initialContent:'<!DOCTYPE html><html><head></head><body><div class="frame-root"></div></body></html>'},t.default=d},1419:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=function(){function e(e,t){for(var n=0;n<t.length;n++){var a=t[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}return function(t,n,a){return n&&e(t.prototype,n),a&&e(t,a),t}}(),r=n(0),o=(i(r),i(n(2)));function i(e){return e&&e.__esModule?e:{default:e}}function c(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function l(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}var s=function(e){function t(){return c(this,t),l(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}return function(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,e),a(t,[{key:"componentDidMount",value:function(){this.props.contentDidMount()}},{key:"componentDidUpdate",value:function(){this.props.contentDidUpdate()}},{key:"render",value:function(){return r.Children.only(this.props.children)}}]),t}(r.Component);s.propTypes={children:o.default.element.isRequired,contentDidMount:o.default.func.isRequired,contentDidUpdate:o.default.func.isRequired},t.default=s},1477:function(e,t,n){"use strict";n.d(t,"a",(function(){return p})),n.d(t,"b",(function(){return d}));var a=n(0),r=n(1350),o=n(3),i=n(1368),c=n(52),l=n(1435),s=n(1447),u=n(1446),m=Object(i.a)({toolbarLandscape:{flexWrap:"wrap"},toolbarAmpmLeftPadding:{paddingLeft:50},separator:{margin:"0 4px 0 2px",cursor:"default"},hourMinuteLabel:{display:"flex",justifyContent:"flex-end",alignItems:"flex-end"},hourMinuteLabelAmpmLandscape:{marginTop:"auto"},hourMinuteLabelReverse:{flexDirection:"row-reverse"},ampmSelection:{marginLeft:20,marginRight:-20,display:"flex",flexDirection:"column"},ampmLandscape:{margin:"4px 0 auto",flexDirection:"row",justifyContent:"space-around",flexBasis:"100%"},ampmSelectionWithSeconds:{marginLeft:15,marginRight:10},ampmLabel:{fontSize:18}},{name:"MuiPickersTimePickerToolbar"});function d(e,t,n){var o=Object(r.c)();return{meridiemMode:Object(u.d)(e,o),handleMeridiemChange:Object(a.useCallback)((function(a){var r=Object(u.c)(e,a,Boolean(t),o);n(r,!1)}),[t,e,n,o])}}var p=function(e){var t=e.date,n=e.views,i=e.ampm,p=e.openView,f=e.onChange,b=e.isLandscape,h=e.setOpenView,y=Object(r.c)(),v=Object(c.a)(),g=m(),O=d(t,i,f),j=O.meridiemMode,x=O.handleMeridiemChange,E=b?"h3":"h2";return Object(a.createElement)(l.b,{isLandscape:b,className:Object(o.default)(b?g.toolbarLandscape:i&&g.toolbarAmpmLeftPadding)},Object(a.createElement)("div",{className:Object(o.default)(g.hourMinuteLabel,i&&b&&g.hourMinuteLabelAmpmLandscape,{rtl:g.hourMinuteLabelReverse}[v.direction])},Object(s.d)(n,"hours")&&Object(a.createElement)(l.c,{variant:E,onClick:function(){return h(u.b.HOURS)},selected:p===u.b.HOURS,label:y.getHourText(t,Boolean(i))}),Object(s.d)(n,["hours","minutes"])&&Object(a.createElement)(l.f,{label:":",variant:E,selected:!1,className:g.separator}),Object(s.d)(n,"minutes")&&Object(a.createElement)(l.c,{variant:E,onClick:function(){return h(u.b.MINUTES)},selected:p===u.b.MINUTES,label:y.getMinuteText(t)}),Object(s.d)(n,["minutes","seconds"])&&Object(a.createElement)(l.f,{variant:"h2",label:":",selected:!1,className:g.separator}),Object(s.d)(n,"seconds")&&Object(a.createElement)(l.c,{variant:"h2",onClick:function(){return h(u.b.SECONDS)},selected:p===u.b.SECONDS,label:y.getSecondText(t)})),i&&Object(a.createElement)("div",{className:Object(o.default)(g.ampmSelection,b&&g.ampmLandscape,Object(s.d)(n,"seconds")&&g.ampmSelectionWithSeconds)},Object(a.createElement)(l.c,{disableRipple:!0,variant:"subtitle1",selected:"am"===j,typographyClassName:g.ampmLabel,label:y.getMeridiemText("am"),onClick:function(){return x("am")}}),Object(a.createElement)(l.c,{disableRipple:!0,variant:"subtitle1",selected:"pm"===j,typographyClassName:g.ampmLabel,label:y.getMeridiemText("pm"),onClick:function(){return x("pm")}})))}},1511:function(e,t,n){"use strict";n.d(t,"a",(function(){return h})),n.d(t,"b",(function(){return y}));var a=n(6),r=n(0),o=(n(2),n(1350)),i=n(3),c=(n(1),n(5),n(1368)),l=n(1435),s=n(1461),u=(n(1468),n(122),n(1457)),m=(n(35),n(14),n(53),n(55),n(56),Object(c.a)({toolbar:{flexDirection:"column",alignItems:"flex-start"},toolbarLandscape:{padding:16},dateLandscape:{marginRight:16}},{name:"MuiPickersDatePickerRoot"})),d=function(e){var t=e.date,n=e.views,a=e.setOpenView,c=e.isLandscape,u=e.openView,d=Object(o.c)(),p=m(),f=Object(r.useMemo)((function(){return Object(s.d)(n)}),[n]),b=Object(r.useMemo)((function(){return Object(s.b)(n)}),[n]);return Object(r.createElement)(l.b,{isLandscape:c,className:Object(i.default)(!f&&p.toolbar,c&&p.toolbarLandscape)},Object(r.createElement)(l.c,{variant:f?"h3":"subtitle1",onClick:function(){return a("year")},selected:"year"===u,label:d.getYearText(t)}),!f&&!b&&Object(r.createElement)(l.c,{variant:"h4",selected:"date"===u,onClick:function(){return a("date")},align:c?"left":"center",label:d.getDatePickerHeaderText(t),className:Object(i.default)(c&&p.dateLandscape)}),b&&Object(r.createElement)(l.c,{variant:"h4",onClick:function(){return a("month")},selected:"month"===u,label:d.getMonthText(t)}))};function p(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}var f=function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?p(n,!0).forEach((function(t){Object(a.a)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):p(n).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}({},u.c,{openTo:"date",views:["year","date"]});function b(e){var t=Object(o.c)();return{getDefaultFormat:function(){return Object(s.c)(e.views,t)}}}var h=Object(l.g)({useOptions:b,Input:l.d,useState:l.i,DefaultToolbarComponent:d}),y=Object(l.g)({useOptions:b,Input:l.a,useState:l.e,DefaultToolbarComponent:d});h.defaultProps=f,y.defaultProps=f},1538:function(e,t,n){"use strict";n.d(t,"a",(function(){return d})),n.d(t,"b",(function(){return m}));var a=n(6),r=(n(0),n(2),n(1350)),o=(n(3),n(1),n(5),n(1435)),i=(n(1468),n(122),n(1457)),c=(n(35),n(14),n(53),n(55),n(56),n(1477));function l(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}var s=function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?l(n,!0).forEach((function(t){Object(a.a)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):l(n).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}({},i.d,{openTo:"hours",views:["hours","minutes"]});function u(e){var t=Object(r.c)();return{getDefaultFormat:function(){return Object(o.h)(e.format,e.ampm,{"12h":t.time12hFormat,"24h":t.time24hFormat})}}}var m=Object(o.g)({useOptions:u,Input:o.d,useState:o.i,DefaultToolbarComponent:c.a}),d=Object(o.g)({useOptions:u,Input:o.a,useState:o.e,DefaultToolbarComponent:c.a,getCustomProps:function(e){return{refuse:e.ampm?/[^\dap]+/gi:/[^\d]+/gi}}});m.defaultProps=s,d.defaultProps=s},2321:function(e,t,n){"use strict";n.r(t),n.d(t,"default",(function(){return m}));var a=n(23),r=n(0),o=n.n(r),i=n(1440),c=n(1746),l=n(1350),s=n(1511),u=n(1538);function m(){var e=o.a.useState(new Date("2014-08-18T21:11:54")),t=Object(a.a)(e,2),n=t[0],r=t[1],m=function(e){r(e)};return o.a.createElement(l.a,{utils:c.a},o.a.createElement(i.a,{container:!0,justify:"space-around"},o.a.createElement(s.b,{disableToolbar:!0,variant:"inline",format:"MM/dd/yyyy",margin:"normal",id:"date-picker-inline",label:"Date picker inline",value:n,onChange:m,KeyboardButtonProps:{"aria-label":"change date"}}),o.a.createElement(s.b,{margin:"normal",id:"date-picker-dialog",label:"Date picker dialog",format:"MM/dd/yyyy",value:n,onChange:m,KeyboardButtonProps:{"aria-label":"change date"}}),o.a.createElement(u.a,{margin:"normal",id:"time-picker",label:"Time picker",value:n,onChange:m,KeyboardButtonProps:{"aria-label":"change time"}})))}},2322:function(e,t,n){"use strict";n.r(t),t.default='import \'date-fns\';\nimport React from \'react\';\nimport Grid from \'@material-ui/core/Grid\';\nimport DateFnsUtils from \'@date-io/date-fns\';\nimport {\n  MuiPickersUtilsProvider,\n  KeyboardTimePicker,\n  KeyboardDatePicker,\n} from \'@material-ui/pickers\';\n\nexport default function MaterialUIPickers() {\n  // The first commit of Material-UI\n  const [selectedDate, setSelectedDate] = React.useState(new Date(\'2014-08-18T21:11:54\'));\n\n  const handleDateChange = date => {\n    setSelectedDate(date);\n  };\n\n  return (\n    <MuiPickersUtilsProvider utils={DateFnsUtils}>\n      <Grid container justify="space-around">\n        <KeyboardDatePicker\n          disableToolbar\n          variant="inline"\n          format="MM/dd/yyyy"\n          margin="normal"\n          id="date-picker-inline"\n          label="Date picker inline"\n          value={selectedDate}\n          onChange={handleDateChange}\n          KeyboardButtonProps={{\n            \'aria-label\': \'change date\',\n          }}\n        />\n        <KeyboardDatePicker\n          margin="normal"\n          id="date-picker-dialog"\n          label="Date picker dialog"\n          format="MM/dd/yyyy"\n          value={selectedDate}\n          onChange={handleDateChange}\n          KeyboardButtonProps={{\n            \'aria-label\': \'change date\',\n          }}\n        />\n        <KeyboardTimePicker\n          margin="normal"\n          id="time-picker"\n          label="Time picker"\n          value={selectedDate}\n          onChange={handleDateChange}\n          KeyboardButtonProps={{\n            \'aria-label\': \'change time\',\n          }}\n        />\n      </Grid>\n    </MuiPickersUtilsProvider>\n  );\n}\n'},2323:function(e,t,n){"use strict";n.r(t),n.d(t,"default",(function(){return l}));var a=n(0),r=n.n(a),o=n(1368),i=n(1386),c=Object(o.a)((function(e){return{container:{display:"flex",flexWrap:"wrap"},textField:{marginLeft:e.spacing(1),marginRight:e.spacing(1),width:200}}}));function l(){var e=c();return r.a.createElement("form",{className:e.container,noValidate:!0},r.a.createElement(i.a,{id:"date",label:"Birthday",type:"date",defaultValue:"2017-05-24",className:e.textField,InputLabelProps:{shrink:!0}}))}},2324:function(e,t,n){"use strict";n.r(t),t.default="import React from 'react';\nimport { makeStyles } from '@material-ui/core/styles';\nimport TextField from '@material-ui/core/TextField';\n\nconst useStyles = makeStyles(theme => ({\n  container: {\n    display: 'flex',\n    flexWrap: 'wrap',\n  },\n  textField: {\n    marginLeft: theme.spacing(1),\n    marginRight: theme.spacing(1),\n    width: 200,\n  },\n}));\n\nexport default function DatePickers() {\n  const classes = useStyles();\n\n  return (\n    <form className={classes.container} noValidate>\n      <TextField\n        id=\"date\"\n        label=\"Birthday\"\n        type=\"date\"\n        defaultValue=\"2017-05-24\"\n        className={classes.textField}\n        InputLabelProps={{\n          shrink: true,\n        }}\n      />\n    </form>\n  );\n}\n"},2325:function(e,t,n){"use strict";n.r(t),n.d(t,"default",(function(){return l}));var a=n(0),r=n.n(a),o=n(1368),i=n(1386),c=Object(o.a)((function(e){return{container:{display:"flex",flexWrap:"wrap"},textField:{marginLeft:e.spacing(1),marginRight:e.spacing(1),width:200}}}));function l(){var e=c();return r.a.createElement("form",{className:e.container,noValidate:!0},r.a.createElement(i.a,{id:"datetime-local",label:"Next appointment",type:"datetime-local",defaultValue:"2017-05-24T10:30",className:e.textField,InputLabelProps:{shrink:!0}}))}},2326:function(e,t,n){"use strict";n.r(t),t.default="import React from 'react';\nimport { makeStyles } from '@material-ui/core/styles';\nimport TextField from '@material-ui/core/TextField';\n\nconst useStyles = makeStyles(theme => ({\n  container: {\n    display: 'flex',\n    flexWrap: 'wrap',\n  },\n  textField: {\n    marginLeft: theme.spacing(1),\n    marginRight: theme.spacing(1),\n    width: 200,\n  },\n}));\n\nexport default function DateAndTimePickers() {\n  const classes = useStyles();\n\n  return (\n    <form className={classes.container} noValidate>\n      <TextField\n        id=\"datetime-local\"\n        label=\"Next appointment\"\n        type=\"datetime-local\"\n        defaultValue=\"2017-05-24T10:30\"\n        className={classes.textField}\n        InputLabelProps={{\n          shrink: true,\n        }}\n      />\n    </form>\n  );\n}\n"},2327:function(e,t,n){"use strict";n.r(t),n.d(t,"default",(function(){return l}));var a=n(0),r=n.n(a),o=n(1368),i=n(1386),c=Object(o.a)((function(e){return{container:{display:"flex",flexWrap:"wrap"},textField:{marginLeft:e.spacing(1),marginRight:e.spacing(1),width:200}}}));function l(){var e=c();return r.a.createElement("form",{className:e.container,noValidate:!0},r.a.createElement(i.a,{id:"time",label:"Alarm clock",type:"time",defaultValue:"07:30",className:e.textField,InputLabelProps:{shrink:!0},inputProps:{step:300}}))}},2328:function(e,t,n){"use strict";n.r(t),t.default="import React from 'react';\nimport { makeStyles } from '@material-ui/core/styles';\nimport TextField from '@material-ui/core/TextField';\n\nconst useStyles = makeStyles(theme => ({\n  container: {\n    display: 'flex',\n    flexWrap: 'wrap',\n  },\n  textField: {\n    marginLeft: theme.spacing(1),\n    marginRight: theme.spacing(1),\n    width: 200,\n  },\n}));\n\nexport default function TimePickers() {\n  const classes = useStyles();\n\n  return (\n    <form className={classes.container} noValidate>\n      <TextField\n        id=\"time\"\n        label=\"Alarm clock\"\n        type=\"time\"\n        defaultValue=\"07:30\"\n        className={classes.textField}\n        InputLabelProps={{\n          shrink: true,\n        }}\n        inputProps={{\n          step: 300, // 5 min\n        }}\n      />\n    </form>\n  );\n}\n"},2799:function(e,t,n){"use strict";n.r(t);var a=n(0),r=n.n(a),o=n(1416),i=(n(144),n(193)),c=n(1382),l=n(1377),s=n(208),u=n(1368),m=Object(u.a)((function(e){return{layoutRoot:{"& .description":{marginBottom:16}}}}));t.default=function(e){var t=m();return r.a.createElement(i.a,{classes:{root:t.layoutRoot},header:r.a.createElement("div",{className:"flex flex-1 items-center justify-between p-24"},r.a.createElement("div",{className:"flex flex-col"},r.a.createElement("div",{className:"flex items-center mb-16"},r.a.createElement(l.a,{className:"text-18",color:"action"},"home"),r.a.createElement(l.a,{className:"text-16",color:"action"},"chevron_right"),r.a.createElement(s.a,{color:"textSecondary"},"Documentation"),r.a.createElement(l.a,{className:"text-16",color:"action"},"chevron_right"),r.a.createElement(s.a,{color:"textSecondary"},"Material UI Components")),r.a.createElement(s.a,{variant:"h6"},"Date / Time pickers")),r.a.createElement(c.a,{className:"normal-case",variant:"contained",component:"a",href:"https://material-ui.com/components/pickers",target:"_blank",role:"button"},r.a.createElement(l.a,null,"link"),r.a.createElement("span",{className:"mx-4"},"Reference"))),content:r.a.createElement("div",{className:"p-24 max-w-2xl"},r.a.createElement(s.a,{className:"text-44 mt-32 mb-8",component:"h1"},"Date / Time pickers"),r.a.createElement(s.a,{className:"description"},"Date pickers and Time pickers provide a simple way to select a single value from a pre-determined set."),r.a.createElement("ul",null,r.a.createElement("li",null,"On mobile, pickers are best suited for display in confirmation dialog."),r.a.createElement("li",null,"For inline display, such as on a form, consider using compact controls such as segmented dropdown buttons.")),r.a.createElement(s.a,{className:"text-32 mt-32 mb-8",component:"h2"},"@material-ui/pickers"),r.a.createElement(s.a,{className:"mb-16",component:"div"},' src="https://img.shields.io/github/stars/mui-org/material-ui-pickers.svg?style=social&label=Stars" alt="stars/> src="https://img.shields.io/npm/dm/@material-ui/pickers.svg" alt="npm downloads/>'),r.a.createElement(s.a,{className:"mb-16",component:"div"},r.a.createElement("a",{href:"https://material-ui-pickers.dev/"},"@material-ui/pickers")," provides date picker and time picker controls."),r.a.createElement(s.a,{className:"mb-16",component:"div"},r.a.createElement(o.a,{className:"my-24",iframe:!1,component:n(2321).default,raw:n(2322)})),r.a.createElement(s.a,{className:"text-32 mt-32 mb-8",component:"h2"},"Native pickers"),r.a.createElement(s.a,{className:"mb-16",component:"div"},"\u26a0\ufe0f Native input controls support by browsers ",r.a.createElement("a",{href:"https://caniuse.com/#feat=input-datetime"},"isn't perfect"),". Have a look at ",r.a.createElement("a",{href:"https://material-ui-pickers.dev/"},"@material-ui/pickers")," for a richer solution."),r.a.createElement(s.a,{className:"text-24 mt-32 mb-8",component:"h3"},"Datepickers"),r.a.createElement(s.a,{className:"mb-16",component:"div"},"A native datepicker example with ",r.a.createElement("code",null,'type="date"'),"."),r.a.createElement(s.a,{className:"mb-16",component:"div"},r.a.createElement(o.a,{className:"my-24",iframe:!1,component:n(2323).default,raw:n(2324)})),r.a.createElement(s.a,{className:"text-24 mt-32 mb-8",component:"h3"},"Date & Time pickers"),r.a.createElement(s.a,{className:"mb-16",component:"div"},"A native date & time picker example with ",r.a.createElement("code",null,'type="datetime-local"'),"."),r.a.createElement(s.a,{className:"mb-16",component:"div"},r.a.createElement(o.a,{className:"my-24",iframe:!1,component:n(2325).default,raw:n(2326)})),r.a.createElement(s.a,{className:"text-24 mt-32 mb-8",component:"h3"},"Time pickers"),r.a.createElement(s.a,{className:"mb-16",component:"div"},"A native time picker example with ",r.a.createElement("code",null,'type="time"'),"."),r.a.createElement(s.a,{className:"mb-16",component:"div"},r.a.createElement(o.a,{className:"my-24",iframe:!1,component:n(2327).default,raw:n(2328)})))})}}}]);