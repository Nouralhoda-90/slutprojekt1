"use strict";(globalThis.webpackChunkcomplianz_gdpr=globalThis.webpackChunkcomplianz_gdpr||[]).push([[6512],{26512:(e,t,l)=>{l.r(t),l.d(t,{default:()=>p});var a=l(51280),n=l(93396),o=l(15832);const p=(0,a.memo)((({label:e,id:t,value:l,onChange:p,required:r,defaultValue:i,disabled:c,options:m={},units:u=["px"]})=>{const s=i.type||l.type||u[0],[d,g]=(0,a.useState)(s),[b,k]=(0,a.useState)(!1),z={top:(0,n.__)("Top","complianz-gdpr"),right:(0,n.__)("Right","complianz-gdpr"),bottom:(0,n.__)("Bottom","complianz-gdpr"),left:(0,n.__)("Left","complianz-gdpr")};(0,a.useEffect)((()=>{l.top===l.right&&l.top===l.bottom&&l.top===l.left&&k(!0)}),[]),(0,a.useEffect)((()=>{b&&h(l.top,"top")}),[b]);const h=(e,t)=>{let a={...l};b?a=E(e):a[t]=e,p(a)},E=e=>{let t={...l};return t.top=e,t.right=e,t.bottom=e,t.left=e,t};return(0,a.createElement)("div",{className:"cmplz-border-input"},Object.keys(z).map((e=>{const t=z[e],n=l.hasOwnProperty(e)?l[e]:i[e];return(0,a.createElement)(a.Fragment,{key:e},(0,a.createElement)("input",{className:"cmplz-border-input-side",type:"number",key:e,onChange:t=>h(t.target.value,e),value:n}),(0,a.createElement)("p",{className:"cmplz-border-input-side-label"},t))})),b&&(0,a.createElement)("button",{className:"cmplz-border-input-link linked",onClick:()=>k(!b)},(0,a.createElement)(o.default,{name:"linked",size:16,tooltip:(0,n.__)("Unlink values","complianz-gdpr")})),!b&&(0,a.createElement)("button",{className:"cmplz-border-input-link",onClick:()=>k(!b)},(0,a.createElement)(o.default,{name:"unlinked",size:16,tooltip:(0,n.__)("Link values together","complianz-gdpr")})),u.length>1&&(0,a.createElement)("div",{className:"cmplz-border-input-unit"},(0,a.createElement)("select",{value:d,onChange:e=>(e=>{g(e);let t={...l};t.type=e,p(t)})(e.target.value)},u.map(((e,t)=>(0,a.createElement)("option",{key:t,value:e},e))))),1===u.length&&(0,a.createElement)("div",{className:"cmplz-border-input-unit"},d))}))}}]);