"use strict";(globalThis.webpackChunkcomplianz_gdpr=globalThis.webpackChunkcomplianz_gdpr||[]).push([[6363,9056],{79056:(e,t,a)=>{a.r(t),a.d(t,{default:()=>m});var l=a(51280),n=a(15832),r=a(88496);const m=e=>{const[t,a]=(0,r.useState)(!1);return(0,l.createElement)("div",{className:"cmplz-panel__list__item",style:e.style?e.style:{}},(0,l.createElement)("details",{open:t},(0,l.createElement)("summary",{onClick:e=>(e=>{e.preventDefault(),a(!t)})(e)},e.icon&&(0,l.createElement)(n.default,{name:e.icon}),(0,l.createElement)("h5",{className:"cmplz-panel__list__item__title"},e.summary),(0,l.createElement)("div",{className:"cmplz-panel__list__item__comment"},e.comment),(0,l.createElement)("div",{className:"cmplz-panel__list__item__icons"},e.icons),(0,l.createElement)(n.default,{name:"chevron-down",size:18})),(0,l.createElement)("div",{className:"cmplz-panel__list__item__details"},t&&e.details)))}},66363:(e,t,a)=>{a.r(t),a.d(t,{default:()=>s});var l=a(51280),n=a(79056),r=a(25536),m=a(88496),c=a(93396),i=a(38924);const s=(0,m.memo)((e=>{const{updateField:t,setChangedField:a}=(0,r.default)(),{selectedMainMenuItem:s}=(0,i.default)(),[u,d]=wp.element.useState(e.thirdParty.name?e.thirdParty.name:""),[o,p]=wp.element.useState(e.thirdParty.purpose?e.thirdParty.purpose:""),[_,E]=wp.element.useState(e.thirdParty.country?e.thirdParty.country:""),[y,h]=wp.element.useState(e.thirdParty.data?e.thirdParty.data:""),g=(l,n)=>{let r=[...e.field.value];Array.isArray(r)||(r=[]);let m={...r[e.index]};m[n]=l,r[e.index]=m,t(e.field.id,r),a(e.field.id,r)};return(0,m.useEffect)((()=>{const e=setTimeout((()=>{g(u,"name")}),500);return()=>{clearTimeout(e)}}),[u]),(0,m.useEffect)((()=>{const e=setTimeout((()=>{g(y,"data")}),500);return()=>{clearTimeout(e)}}),[y]),(0,m.useEffect)((()=>{const e=setTimeout((()=>{g(_,"country")}),500);return()=>{clearTimeout(e)}}),[_]),(0,m.useEffect)((()=>{const e=setTimeout((()=>{g(o,"purpose")}),500);return()=>{clearTimeout(e)}}),[o]),(0,l.createElement)(l.Fragment,null,(0,l.createElement)(n.default,{summary:u,details:(0,l.createElement)(l.Fragment,null,(0,l.createElement)("div",{className:"cmplz-details-row"},(0,l.createElement)("label",null,(0,c.__)("Name","complianz-gdpr")),(0,l.createElement)("input",{onChange:e=>d(e.target.value),type:"text",placeholder:(0,c.__)("Name","complianz-gdpr"),value:u})),(0,l.createElement)("div",{className:"cmplz-details-row"},(0,l.createElement)("label",null,(0,c.__)("Country","complianz-gdpr")),(0,l.createElement)("input",{onChange:e=>E(e.target.value),type:"text",placeholder:(0,c.__)("Country","complianz-gdpr"),value:_})),(0,l.createElement)("div",{className:"cmplz-details-row"},(0,l.createElement)("label",null,(0,c.__)("Purpose","complianz-gdpr")),(0,l.createElement)("input",{onChange:e=>p(e.target.value),type:"text",placeholder:(0,c.__)("Purpose","complianz-gdpr"),value:o})),(0,l.createElement)("div",{className:"cmplz-details-row"},(0,l.createElement)("label",null,(0,c.__)("Data","complianz-gdpr")),(0,l.createElement)("input",{onChange:e=>h(e.target.value),type:"text",placeholder:(0,c.__)("Data","complianz-gdpr"),value:y})),(0,l.createElement)("div",{className:"cmplz-details-row__buttons"},(0,l.createElement)("button",{className:"button button-default cmplz-reset-button",onClick:l=>(async l=>{let n=e.field.value;Array.isArray(n)||(n=[]);let r=[...n];r.hasOwnProperty(e.index)&&r.splice(e.index,1),t(e.field.id,r),a(e.field.id,r),await saveFields(s,!1,!1)})()},(0,c.__)("Delete","complianz-gdpr"))))}))}))}}]);