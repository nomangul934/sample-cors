(this["webpackJsonpfuse-react-app"]=this["webpackJsonpfuse-react-app"]||[]).push([[94],{1413:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.FrameContextConsumer=t.FrameContextProvider=t.FrameContext=void 0;var a,o=n(0),r=(a=o)&&a.__esModule?a:{default:a};var l=void 0,c=void 0;"undefined"!==typeof document&&(l=document),"undefined"!==typeof window&&(c=window);var i=t.FrameContext=r.default.createContext({document:l,window:c}),s=i.Provider,u=i.Consumer;t.FrameContextProvider=s,t.FrameContextConsumer=u},1416:function(e,t,n){"use strict";var a=n(23),o=n(144),r=n(1403),l=n(1406),c=n(1377),i=n(1408),s=n(1409),u=n(0),m=n.n(u),d=n(13),p=n(7),f=n(67),h=n(68),E=n(113),y=n(112),b=n(1333),v=n(693),g=n(1367),x=n(1404),w=n(11),j=n(453),O=n(454),N=n(1417),C=n.n(N),_=Object(b.a)({productionPrefix:"iframe-"}),D=function(e){Object(E.a)(n,e);var t=Object(y.a)(n);function n(){var e;Object(f.a)(this,n);for(var a=arguments.length,o=new Array(a),r=0;r<a;r++)o[r]=arguments[r];return(e=t.call.apply(t,[this].concat(o))).state={ready:!1},e.handleRef=function(t){e.contentDocument=t?t.node.contentDocument:null},e.onContentDidMount=function(){e.setState({ready:!0,jss:Object(j.a)(Object(p.a)(Object(p.a)({},Object(v.a)()),{},{plugins:[].concat(Object(d.a)(Object(v.a)().plugins),[Object(O.a)()]),insertionPoint:e.contentDocument.querySelector("#jss-demo-insertion-point")})),sheetsManager:new Map,container:e.contentDocument.body})},e.onContentDidUpdate=function(){e.contentDocument.body.dir=e.props.theme.direction},e.renderHead=function(){return m.a.createElement(m.a.Fragment,null,m.a.createElement("style",{dangerouslySetInnerHTML:{__html:"\n                    html {\n                    font-size: 62.5%;\n                    font-family: Muli, Roboto, Helvetica Neue, Arial, sans-serif;\n                    }\n                "}}),m.a.createElement("noscript",{id:"jss-demo-insertion-point"}))},e}return Object(h.a)(n,[{key:"render",value:function(){var e=this.props,t=e.children,n=e.classes,a=e.theme;return m.a.createElement(C.a,{head:this.renderHead(),ref:this.handleRef,className:n.root,contentDidMount:this.onContentDidMount,contentDidUpdate:this.onContentDidUpdate},this.state.ready?m.a.createElement(g.b,{jss:this.state.jss,generateClassName:_,sheetsManager:this.state.sheetsManager},m.a.createElement(x.a,{theme:a},m.a.cloneElement(t,{container:this.state.container}))):null)}}]),n}(m.a.Component),M=Object(w.a)((function(e){return{root:{backgroundColor:e.palette.background.default,flexGrow:1,height:400,border:"none",boxShadow:e.shadows[1]}}}),{withTheme:!0})(D);function T(e){var t=Object(u.useState)(e.currentTabIndex),n=Object(a.a)(t,2),d=n[0],p=n[1],f=e.component,h=e.raw,E=e.iframe,y=e.className;return m.a.createElement(l.a,{className:y},m.a.createElement(r.a,{position:"static",color:"default",elevation:0},m.a.createElement(s.a,{classes:{root:"border-b-1",flexContainer:"justify-end"},value:d,onChange:function(e,t){p(t)}},f&&m.a.createElement(i.a,{classes:{root:"min-w-64"},icon:m.a.createElement(c.a,null,"remove_red_eye")}),h&&m.a.createElement(i.a,{classes:{root:"min-w-64"},icon:m.a.createElement(c.a,null,"code")}))),m.a.createElement("div",{className:"flex justify-center"},m.a.createElement("div",{className:0===d?"flex flex-1":"hidden"},f&&(E?m.a.createElement(M,null,m.a.createElement(f,null)):m.a.createElement("div",{className:"p-24 flex flex-1 justify-center"},m.a.createElement(f,null)))),m.a.createElement("div",{className:1===d?"flex flex-1":"hidden"},h&&m.a.createElement("div",{className:"flex flex-1"},m.a.createElement(o.a,{component:"pre",className:"language-javascript w-full"},h.default)))))}T.defaultProps={currentTabIndex:0};var P=T;n.d(t,"a",(function(){return P}))},1417:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.FrameContextConsumer=t.FrameContext=void 0;var a=n(1413);Object.defineProperty(t,"FrameContext",{enumerable:!0,get:function(){return a.FrameContext}}),Object.defineProperty(t,"FrameContextConsumer",{enumerable:!0,get:function(){return a.FrameContextConsumer}});var o,r=n(1418),l=(o=r)&&o.__esModule?o:{default:o};t.default=l.default},1418:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var a in n)Object.prototype.hasOwnProperty.call(n,a)&&(e[a]=n[a])}return e},o=function(){function e(e,t){for(var n=0;n<t.length;n++){var a=t[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}return function(t,n,a){return n&&e(t.prototype,n),a&&e(t,a),t}}(),r=n(0),l=m(r),c=m(n(18)),i=m(n(2)),s=n(1413),u=m(n(1419));function m(e){return e&&e.__esModule?e:{default:e}}var d=function(e){function t(e,n){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t);var a=function(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e,n));return a.handleLoad=function(){a.forceUpdate()},a._isMounted=!1,a}return function(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,e),o(t,[{key:"componentDidMount",value:function(){this._isMounted=!0;var e=this.getDoc();e&&"complete"===e.readyState?this.forceUpdate():this.node.addEventListener("load",this.handleLoad)}},{key:"componentWillUnmount",value:function(){this._isMounted=!1,this.node.removeEventListener("load",this.handleLoad)}},{key:"getDoc",value:function(){return this.node?this.node.contentDocument:null}},{key:"getMountTarget",value:function(){var e=this.getDoc();return this.props.mountTarget?e.querySelector(this.props.mountTarget):e.body.children[0]}},{key:"renderFrameContents",value:function(){if(!this._isMounted)return null;var e=this.getDoc();if(!e)return null;var t=this.props.contentDidMount,n=this.props.contentDidUpdate,a=e.defaultView||e.parentView,o=!this._setInitialContent,r=l.default.createElement(u.default,{contentDidMount:t,contentDidUpdate:n},l.default.createElement(s.FrameContextProvider,{value:{document:e,window:a}},l.default.createElement("div",{className:"frame-content"},this.props.children)));o&&(e.open("text/html","replace"),e.write(this.props.initialContent),e.close(),this._setInitialContent=!0);var i=this.getMountTarget();return[c.default.createPortal(this.props.head,this.getDoc().head),c.default.createPortal(r,i)]}},{key:"render",value:function(){var e=this,t=a({},this.props,{children:void 0});return delete t.head,delete t.initialContent,delete t.mountTarget,delete t.contentDidMount,delete t.contentDidUpdate,l.default.createElement("iframe",a({},t,{ref:function(t){e.node=t}}),this.renderFrameContents())}}]),t}(r.Component);d.propTypes={style:i.default.object,head:i.default.node,initialContent:i.default.string,mountTarget:i.default.string,contentDidMount:i.default.func,contentDidUpdate:i.default.func,children:i.default.oneOfType([i.default.element,i.default.arrayOf(i.default.element)])},d.defaultProps={style:{},head:null,children:void 0,mountTarget:void 0,contentDidMount:function(){},contentDidUpdate:function(){},initialContent:'<!DOCTYPE html><html><head></head><body><div class="frame-root"></div></body></html>'},t.default=d},1419:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=function(){function e(e,t){for(var n=0;n<t.length;n++){var a=t[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}return function(t,n,a){return n&&e(t.prototype,n),a&&e(t,a),t}}(),o=n(0),r=(l(o),l(n(2)));function l(e){return e&&e.__esModule?e:{default:e}}function c(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function i(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}var s=function(e){function t(){return c(this,t),i(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}return function(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,e),a(t,[{key:"componentDidMount",value:function(){this.props.contentDidMount()}},{key:"componentDidUpdate",value:function(){this.props.contentDidUpdate()}},{key:"render",value:function(){return o.Children.only(this.props.children)}}]),t}(o.Component);s.propTypes={children:r.default.element.isRequired,contentDidMount:r.default.func.isRequired,contentDidUpdate:r.default.func.isRequired},t.default=s},2775:function(e,t,n){"use strict";n.r(t);var a=n(0),o=n.n(a),r=(n(1416),n(144)),l=n(193),c=n(1382),i=n(1377),s=n(208),u=n(1368),m=Object(u.a)((function(e){return{layoutRoot:{"& .description":{marginBottom:16}}}}));t.default=function(e){var t=m();return o.a.createElement(l.a,{classes:{root:t.layoutRoot},header:o.a.createElement("div",{className:"flex flex-1 items-center justify-between p-24"},o.a.createElement("div",{className:"flex flex-col"},o.a.createElement("div",{className:"flex items-center mb-16"},o.a.createElement(i.a,{className:"text-18",color:"action"},"home"),o.a.createElement(i.a,{className:"text-16",color:"action"},"chevron_right"),o.a.createElement(s.a,{color:"textSecondary"},"Documentation"),o.a.createElement(i.a,{className:"text-16",color:"action"},"chevron_right"),o.a.createElement(s.a,{color:"textSecondary"},"Material UI Components")),o.a.createElement(s.a,{variant:"h6"},"Box")),o.a.createElement(c.a,{className:"normal-case",variant:"contained",component:"a",href:"https://material-ui.com/components/box",target:"_blank",role:"button"},o.a.createElement(i.a,null,"link"),o.a.createElement("span",{className:"mx-4"},"Reference"))),content:o.a.createElement("div",{className:"p-24 max-w-2xl"},o.a.createElement(s.a,{className:"text-44 mt-32 mb-8",component:"h1"},"Box"),o.a.createElement(s.a,{className:"description"},"The Box component serves as a wrapper component for most of the CSS utility needs."),o.a.createElement(s.a,{className:"mb-16",component:"div"},"The Box component packages ",o.a.createElement("a",{href:"/system/basics/#all-inclusive"},"all the style functions")," that are exposed in ",o.a.createElement("code",null,"@material-ui/system"),". It's created using the ",o.a.createElement("a",{href:"/styles/api/#styled-style-function-component"},o.a.createElement("code",null,"styled()"))," function of ",o.a.createElement("code",null,"@material-ui/core/styles"),"."),o.a.createElement(s.a,{className:"text-32 mt-32 mb-8",component:"h2"},"Example"),o.a.createElement(s.a,{className:"mb-16",component:"div"},o.a.createElement("a",{href:"/system/palette/"},"The palette")," style function."),o.a.createElement(s.a,{className:"text-32 mt-32 mb-8",component:"h2"},"Overriding Material-UI components"),o.a.createElement(s.a,{className:"mb-16",component:"div"},"The Box component wraps your component. It creates a new DOM element, a ",o.a.createElement("code",null,"<div>")," by default that can be changed with the ",o.a.createElement("code",null,"component")," property. Let's say you want to use a ",o.a.createElement("code",null,"<span>")," instead:"),o.a.createElement(r.a,{component:"pre",className:"language-jsx"},' \n<Box component="span" m={1}>\n  <Button />\n</Box>\n'),o.a.createElement(s.a,{className:"mb-16",component:"div"},"This works great when the changes can be isolated to a new DOM element. For instance, you can change the margin this way."),o.a.createElement(s.a,{className:"mb-16",component:"div"},"However, sometimes you have to target the underlying DOM element. For instance, you want to change the text color of the button. The Button component defines its own color. CSS inheritance doesn't help. To workaround the problem, you have two options:"),o.a.createElement("ol",null,o.a.createElement("li",null,"Use ",o.a.createElement("a",{href:"https://reactjs.org/docs/react-api.html#cloneelement"},o.a.createElement("code",null,"React.cloneElement()")))),o.a.createElement(s.a,{className:"mb-16",component:"div"},"The Box component has a ",o.a.createElement("code",null,"clone")," property to enable the usage of the clone element method of React."),o.a.createElement(r.a,{component:"pre",className:"language-jsx"},' \n<Box color="text.primary" clone>\n  <Button />\n</Box>\n'),o.a.createElement("ol",{start:"2"},o.a.createElement("li",null,"Use render props")),o.a.createElement(s.a,{className:"mb-16",component:"div"},"The Box children accepts a render props function. You can pull out the ",o.a.createElement("code",null,"className"),"."),o.a.createElement(r.a,{component:"pre",className:"language-jsx"},' \n<Box color="text.primary">\n  {props => <Button {...props} />}\n</Box>\n'),o.a.createElement("blockquote",null,o.a.createElement(s.a,{className:"mb-16",component:"div"},"\u26a0\ufe0f The CSS specificity relies on the import order. If you want the guarantee that the wrapped component's style will be overridden, you need to import the Box last.")),o.a.createElement(s.a,{className:"text-32 mt-32 mb-8",component:"h2"},"API"),o.a.createElement(r.a,{component:"pre",className:"language-jsx"}," \nimport Box from '@material-ui/core/Box';\n"),o.a.createElement("table",null,o.a.createElement("thead",null,o.a.createElement("tr",null,o.a.createElement("th",{align:"left"},"Name"),o.a.createElement("th",{align:"left"},"Type"),o.a.createElement("th",{align:"left"},"Default"),o.a.createElement("th",{align:"left"},"Description"))),o.a.createElement("tbody",null,o.a.createElement("tr",null,o.a.createElement("td",{align:"left"},o.a.createElement("span",{className:"prop-name required"},"children\xa0*")),o.a.createElement("td",{align:"left"},o.a.createElement("span",{className:"prop-type"},"union:\xa0node\xa0|",o.a.createElement("br",null),"\xa0func",o.a.createElement("br",null))),o.a.createElement("td",{align:"left"}),o.a.createElement("td",{align:"left"},"Box render function or node.")),o.a.createElement("tr",null,o.a.createElement("td",{align:"left"},o.a.createElement("span",{className:"prop-name"},"clone")),o.a.createElement("td",{align:"left"},o.a.createElement("span",{className:"prop-type"},"bool")),o.a.createElement("td",{align:"left"},o.a.createElement("span",{className:"prop-default"},"false")),o.a.createElement("td",{align:"left"},"If ",o.a.createElement("code",null,"true"),", the box will recycle its children DOM element. It's using ",o.a.createElement("code",null,"React.cloneElement")," internally.")),o.a.createElement("tr",null,o.a.createElement("td",{align:"left"},o.a.createElement("span",{className:"prop-name"},"component")),o.a.createElement("td",{align:"left"},o.a.createElement("span",{className:"prop-type"},"union:\xa0string\xa0|",o.a.createElement("br",null),"\xa0func\xa0|",o.a.createElement("br",null),"\xa0object",o.a.createElement("br",null))),o.a.createElement("td",{align:"left"},o.a.createElement("span",{className:"prop-default"},"'div'")),o.a.createElement("td",{align:"left"},"The component used for the root node. Either a string to use a DOM element or a component.")))),o.a.createElement(s.a,{className:"mb-16",component:"div"},"Any other properties supplied will be used by ",o.a.createElement("a",{href:"/system/basics/#all-inclusive"},"the style functions")," or spread to the root element."))})}}}]);