(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[82],{1413:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.FrameContextConsumer=e.FrameContextProvider=e.FrameContext=void 0;var a,o=n(0),r=(a=o)&&a.__esModule?a:{default:a};var l=void 0,i=void 0;"undefined"!==typeof document&&(l=document),"undefined"!==typeof window&&(i=window);var c=e.FrameContext=r.default.createContext({document:l,window:i}),s=c.Provider,u=c.Consumer;e.FrameContextProvider=s,e.FrameContextConsumer=u},1416:function(t,e,n){"use strict";var a=n(23),o=n(144),r=n(1403),l=n(1406),i=n(1377),c=n(1408),s=n(1409),u=n(0),d=n.n(u),m=n(13),p=n(7),f=n(67),h=n(68),v=n(113),b=n(112),y=n(1333),g=n(693),C=n(1367),E=n(1404),x=n(11),w=n(453),j=n(454),O=n(1417),_=n.n(O),N=Object(y.a)({productionPrefix:"iframe-"}),P=function(t){Object(v.a)(n,t);var e=Object(b.a)(n);function n(){var t;Object(f.a)(this,n);for(var a=arguments.length,o=new Array(a),r=0;r<a;r++)o[r]=arguments[r];return(t=e.call.apply(e,[this].concat(o))).state={ready:!1},t.handleRef=function(e){t.contentDocument=e?e.node.contentDocument:null},t.onContentDidMount=function(){t.setState({ready:!0,jss:Object(w.a)(Object(p.a)(Object(p.a)({},Object(g.a)()),{},{plugins:[].concat(Object(m.a)(Object(g.a)().plugins),[Object(j.a)()]),insertionPoint:t.contentDocument.querySelector("#jss-demo-insertion-point")})),sheetsManager:new Map,container:t.contentDocument.body})},t.onContentDidUpdate=function(){t.contentDocument.body.dir=t.props.theme.direction},t.renderHead=function(){return d.a.createElement(d.a.Fragment,null,d.a.createElement("style",{dangerouslySetInnerHTML:{__html:"\n                    html {\n                    font-size: 62.5%;\n                    font-family: Muli, Roboto, Helvetica Neue, Arial, sans-serif;\n                    }\n                "}}),d.a.createElement("noscript",{id:"jss-demo-insertion-point"}))},t}return Object(h.a)(n,[{key:"render",value:function(){var t=this.props,e=t.children,n=t.classes,a=t.theme;return d.a.createElement(_.a,{head:this.renderHead(),ref:this.handleRef,className:n.root,contentDidMount:this.onContentDidMount,contentDidUpdate:this.onContentDidUpdate},this.state.ready?d.a.createElement(C.b,{jss:this.state.jss,generateClassName:N,sheetsManager:this.state.sheetsManager},d.a.createElement(E.a,{theme:a},d.a.cloneElement(e,{container:this.state.container}))):null)}}]),n}(d.a.Component),M=Object(x.a)((function(t){return{root:{backgroundColor:t.palette.background.default,flexGrow:1,height:400,border:"none",boxShadow:t.shadows[1]}}}),{withTheme:!0})(P);function D(t){var e=Object(u.useState)(t.currentTabIndex),n=Object(a.a)(e,2),m=n[0],p=n[1],f=t.component,h=t.raw,v=t.iframe,b=t.className;return d.a.createElement(l.a,{className:b},d.a.createElement(r.a,{position:"static",color:"default",elevation:0},d.a.createElement(s.a,{classes:{root:"border-b-1",flexContainer:"justify-end"},value:m,onChange:function(t,e){p(e)}},f&&d.a.createElement(c.a,{classes:{root:"min-w-64"},icon:d.a.createElement(i.a,null,"remove_red_eye")}),h&&d.a.createElement(c.a,{classes:{root:"min-w-64"},icon:d.a.createElement(i.a,null,"code")}))),d.a.createElement("div",{className:"flex justify-center"},d.a.createElement("div",{className:0===m?"flex flex-1":"hidden"},f&&(v?d.a.createElement(M,null,d.a.createElement(f,null)):d.a.createElement("div",{className:"p-24 flex flex-1 justify-center"},d.a.createElement(f,null)))),d.a.createElement("div",{className:1===m?"flex flex-1":"hidden"},h&&d.a.createElement("div",{className:"flex flex-1"},d.a.createElement(o.a,{component:"pre",className:"language-javascript w-full"},h.default)))))}D.defaultProps={currentTabIndex:0};var S=D;n.d(e,"a",(function(){return S}))},1417:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.FrameContextConsumer=e.FrameContext=void 0;var a=n(1413);Object.defineProperty(e,"FrameContext",{enumerable:!0,get:function(){return a.FrameContext}}),Object.defineProperty(e,"FrameContextConsumer",{enumerable:!0,get:function(){return a.FrameContextConsumer}});var o,r=n(1418),l=(o=r)&&o.__esModule?o:{default:o};e.default=l.default},1418:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var a in n)Object.prototype.hasOwnProperty.call(n,a)&&(t[a]=n[a])}return t},o=function(){function t(t,e){for(var n=0;n<e.length;n++){var a=e[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}return function(e,n,a){return n&&t(e.prototype,n),a&&t(e,a),e}}(),r=n(0),l=d(r),i=d(n(18)),c=d(n(2)),s=n(1413),u=d(n(1419));function d(t){return t&&t.__esModule?t:{default:t}}var m=function(t){function e(t,n){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,e);var a=function(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!==typeof e&&"function"!==typeof e?t:e}(this,(e.__proto__||Object.getPrototypeOf(e)).call(this,t,n));return a.handleLoad=function(){a.forceUpdate()},a._isMounted=!1,a}return function(t,e){if("function"!==typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}(e,t),o(e,[{key:"componentDidMount",value:function(){this._isMounted=!0;var t=this.getDoc();t&&"complete"===t.readyState?this.forceUpdate():this.node.addEventListener("load",this.handleLoad)}},{key:"componentWillUnmount",value:function(){this._isMounted=!1,this.node.removeEventListener("load",this.handleLoad)}},{key:"getDoc",value:function(){return this.node?this.node.contentDocument:null}},{key:"getMountTarget",value:function(){var t=this.getDoc();return this.props.mountTarget?t.querySelector(this.props.mountTarget):t.body.children[0]}},{key:"renderFrameContents",value:function(){if(!this._isMounted)return null;var t=this.getDoc();if(!t)return null;var e=this.props.contentDidMount,n=this.props.contentDidUpdate,a=t.defaultView||t.parentView,o=!this._setInitialContent,r=l.default.createElement(u.default,{contentDidMount:e,contentDidUpdate:n},l.default.createElement(s.FrameContextProvider,{value:{document:t,window:a}},l.default.createElement("div",{className:"frame-content"},this.props.children)));o&&(t.open("text/html","replace"),t.write(this.props.initialContent),t.close(),this._setInitialContent=!0);var c=this.getMountTarget();return[i.default.createPortal(this.props.head,this.getDoc().head),i.default.createPortal(r,c)]}},{key:"render",value:function(){var t=this,e=a({},this.props,{children:void 0});return delete e.head,delete e.initialContent,delete e.mountTarget,delete e.contentDidMount,delete e.contentDidUpdate,l.default.createElement("iframe",a({},e,{ref:function(e){t.node=e}}),this.renderFrameContents())}}]),e}(r.Component);m.propTypes={style:c.default.object,head:c.default.node,initialContent:c.default.string,mountTarget:c.default.string,contentDidMount:c.default.func,contentDidUpdate:c.default.func,children:c.default.oneOfType([c.default.element,c.default.arrayOf(c.default.element)])},m.defaultProps={style:{},head:null,children:void 0,mountTarget:void 0,contentDidMount:function(){},contentDidUpdate:function(){},initialContent:'<!DOCTYPE html><html><head></head><body><div class="frame-root"></div></body></html>'},e.default=m},1419:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=function(){function t(t,e){for(var n=0;n<e.length;n++){var a=e[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}return function(e,n,a){return n&&t(e.prototype,n),a&&t(e,a),e}}(),o=n(0),r=(l(o),l(n(2)));function l(t){return t&&t.__esModule?t:{default:t}}function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function c(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!==typeof e&&"function"!==typeof e?t:e}var s=function(t){function e(){return i(this,e),c(this,(e.__proto__||Object.getPrototypeOf(e)).apply(this,arguments))}return function(t,e){if("function"!==typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}(e,t),a(e,[{key:"componentDidMount",value:function(){this.props.contentDidMount()}},{key:"componentDidUpdate",value:function(){this.props.contentDidUpdate()}},{key:"render",value:function(){return o.Children.only(this.props.children)}}]),e}(o.Component);s.propTypes={children:r.default.element.isRequired,contentDidMount:r.default.func.isRequired,contentDidUpdate:r.default.func.isRequired},e.default=s},1919:function(t,e,n){"use strict";n.r(e);var a=n(23),o=n(477),r=n(208),l=n(0),i=n.n(l),c=["Sea","Sky","Forest","Aerial","Art"].map((function(t){return{value:t,label:t}}));e.default=function(){var t=Object(l.useState)([{value:"nature",label:"Nature"},{value:"city",label:"City"},{value:"landscape",label:"Landscape"}]),e=Object(a.a)(t,2),n=e[0],s=e[1];function u(t){s(t)}return i.a.createElement("div",{className:"w-full max-w-sm pt-64 pb-224"},i.a.createElement(r.a,{className:"text-24 mt-24 mb-8",component:"h2"},"Standart"),i.a.createElement(o.a,{className:"w-full my-16",value:n,onChange:u,placeholder:"Select multiple tags",textFieldProps:{label:"Tags",InputLabelProps:{shrink:!0},variant:"standard"},options:c,isMulti:!0}),i.a.createElement(r.a,{className:"text-24 mt-24 mb-8",component:"h2"},"Outlined"),i.a.createElement(o.a,{className:"w-full my-16",value:n,onChange:u,placeholder:"Select multiple tags",textFieldProps:{label:"Tags",InputLabelProps:{shrink:!0},variant:"outlined"},options:c,isMulti:!0}),i.a.createElement(r.a,{className:"text-24 mt-24 mb-8",component:"h2"},"Filled"),i.a.createElement(o.a,{className:"w-full my-16",value:n,onChange:u,placeholder:"Select multiple tags",textFieldProps:{label:"Tags",InputLabelProps:{shrink:!0},variant:"filled"},options:c,isMulti:!0}))}},1920:function(t,e,n){"use strict";n.r(e),e.default="import FuseChipSelect from '@fuse/core/FuseChipSelect';\nimport Typography from '@material-ui/core/Typography';\nimport React, { useState } from 'react';\n\nconst suggestions = ['Sea', 'Sky', 'Forest', 'Aerial', 'Art'].map(item => ({\n\tvalue: item,\n\tlabel: item\n}));\n\nfunction SimpleExample() {\n\tconst [tags, setTags] = useState([\n\t\t{\n\t\t\tvalue: 'nature',\n\t\t\tlabel: 'Nature'\n\t\t},\n\t\t{\n\t\t\tvalue: 'city',\n\t\t\tlabel: 'City'\n\t\t},\n\t\t{\n\t\t\tvalue: 'landscape',\n\t\t\tlabel: 'Landscape'\n\t\t}\n\t]);\n\n\tfunction handleChipChange(value) {\n\t\tsetTags(value);\n\t}\n\n\treturn (\n\t\t<div className=\"w-full max-w-sm pt-64 pb-224\">\n\t\t\t<Typography className=\"text-24 mt-24 mb-8\" component=\"h2\">\n\t\t\t\tStandart\n\t\t\t</Typography>\n\n\t\t\t<FuseChipSelect\n\t\t\t\tclassName=\"w-full my-16\"\n\t\t\t\tvalue={tags}\n\t\t\t\tonChange={handleChipChange}\n\t\t\t\tplaceholder=\"Select multiple tags\"\n\t\t\t\ttextFieldProps={{\n\t\t\t\t\tlabel: 'Tags',\n\t\t\t\t\tInputLabelProps: {\n\t\t\t\t\t\tshrink: true\n\t\t\t\t\t},\n\t\t\t\t\tvariant: 'standard'\n\t\t\t\t}}\n\t\t\t\toptions={suggestions}\n\t\t\t\tisMulti\n\t\t\t/>\n\n\t\t\t<Typography className=\"text-24 mt-24 mb-8\" component=\"h2\">\n\t\t\t\tOutlined\n\t\t\t</Typography>\n\n\t\t\t<FuseChipSelect\n\t\t\t\tclassName=\"w-full my-16\"\n\t\t\t\tvalue={tags}\n\t\t\t\tonChange={handleChipChange}\n\t\t\t\tplaceholder=\"Select multiple tags\"\n\t\t\t\ttextFieldProps={{\n\t\t\t\t\tlabel: 'Tags',\n\t\t\t\t\tInputLabelProps: {\n\t\t\t\t\t\tshrink: true\n\t\t\t\t\t},\n\t\t\t\t\tvariant: 'outlined'\n\t\t\t\t}}\n\t\t\t\toptions={suggestions}\n\t\t\t\tisMulti\n\t\t\t/>\n\n\t\t\t<Typography className=\"text-24 mt-24 mb-8\" component=\"h2\">\n\t\t\t\tFilled\n\t\t\t</Typography>\n\n\t\t\t<FuseChipSelect\n\t\t\t\tclassName=\"w-full my-16\"\n\t\t\t\tvalue={tags}\n\t\t\t\tonChange={handleChipChange}\n\t\t\t\tplaceholder=\"Select multiple tags\"\n\t\t\t\ttextFieldProps={{\n\t\t\t\t\tlabel: 'Tags',\n\t\t\t\t\tInputLabelProps: {\n\t\t\t\t\t\tshrink: true\n\t\t\t\t\t},\n\t\t\t\t\tvariant: 'filled'\n\t\t\t\t}}\n\t\t\t\toptions={suggestions}\n\t\t\t\tisMulti\n\t\t\t/>\n\t\t</div>\n\t);\n}\n\nexport default SimpleExample;\n"},2763:function(t,e,n){"use strict";n.r(e);var a=n(1416),o=n(193),r=n(1377),l=n(208),i=n(0),c=n.n(i),s=n(30);e.default=function(){return c.a.createElement(o.a,{header:c.a.createElement("div",{className:"flex flex-1 items-center justify-between p-24"},c.a.createElement("div",{className:"flex flex-col"},c.a.createElement("div",{className:"flex items-center mb-16"},c.a.createElement(r.a,{className:"text-18",color:"action"},"home"),c.a.createElement(r.a,{className:"text-16",color:"action"},"chevron_right"),c.a.createElement(l.a,{color:"textSecondary"},"Documentation"),c.a.createElement(r.a,{className:"text-16",color:"action"},"chevron_right"),c.a.createElement(l.a,{color:"textSecondary"},"Fuse Components")),c.a.createElement(l.a,{variant:"h6"},"FuseChipSelect"))),content:c.a.createElement("div",{className:"p-24 max-w-2xl"},c.a.createElement(l.a,{className:"mb-16",component:"p"},c.a.createElement("code",null,"FuseChipSelect")," is a multiple chip select component which uses react-select and material-ui Chip."),c.a.createElement("hr",null),c.a.createElement(l.a,{className:"mt-32 mb-8",variant:"h5"},"Example Usages"),c.a.createElement(a.a,{className:"mb-64",component:n(1919).default,raw:n(1920)}),c.a.createElement(l.a,{className:"mt-32 mb-8",variant:"h5"},"Demos"),c.a.createElement("ul",null,c.a.createElement("li",{className:"mb-8"},c.a.createElement(s.a,{to:"/apps/e-commerce/products/1"},"E-Commerce Product Page"))))})}}}]);