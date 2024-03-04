"use strict";(globalThis.webpackChunkcomplianz_gdpr=globalThis.webpackChunkcomplianz_gdpr||[]).push([[3904,9056,6363],{79056:(e,t,a)=>{a.r(t),a.d(t,{default:()=>i});var l=a(51280),r=a(15832),n=a(88496);const i=e=>{const[t,a]=(0,n.useState)(!1);return(0,l.createElement)("div",{className:"cmplz-panel__list__item",style:e.style?e.style:{}},(0,l.createElement)("details",{open:t},(0,l.createElement)("summary",{onClick:e=>(e=>{e.preventDefault(),a(!t)})(e)},e.icon&&(0,l.createElement)(r.default,{name:e.icon}),(0,l.createElement)("h5",{className:"cmplz-panel__list__item__title"},e.summary),(0,l.createElement)("div",{className:"cmplz-panel__list__item__comment"},e.comment),(0,l.createElement)("div",{className:"cmplz-panel__list__item__icons"},e.icons),(0,l.createElement)(r.default,{name:"chevron-down",size:18})),(0,l.createElement)("div",{className:"cmplz-panel__list__item__details"},t&&e.details)))}},83904:(e,t,a)=>{a.r(t),a.d(t,{default:()=>c});var l=a(51280),r=a(93396),n=a(25536),i=a(88496),m=a(66363);const c=(0,i.memo)((e=>{const{updateField:t,setChangedField:a}=(0,n.default)();let i=e.field,c=i.value;return Array.isArray(c)||(c=[]),(0,l.createElement)("div",{className:"components-base-control cmplz-thirdparty"},(0,l.createElement)("div",null,(0,l.createElement)("button",{onClick:()=>(()=>{let l=e.field.value;Array.isArray(l)||(l=[]);let n={},m=[...l];n.name=(0,r.__)("New Third Party","complianz-gdpr"),m.push(n),t(i.id,m),a(i.id,m)})(),className:"button button-default"},(0,r.__)("Add new Third Party","complianz-gdpr"))),(0,l.createElement)("div",{className:"cmplz-panel__list"},c.map(((t,a)=>(0,l.createElement)(m.default,{field:e.field,updateField:e.updateField,index:a,key:a,thirdParty:t})))))}))},66363:(e,t,a)=>{a.r(t),a.d(t,{default:()=>d});var l=a(51280),r=a(79056),n=a(25536),i=a(88496),m=a(93396),c=a(38924);const d=(0,i.memo)((e=>{const{updateField:t,setChangedField:a}=(0,n.default)(),{selectedMainMenuItem:d}=(0,c.default)(),[s,u]=wp.element.useState(e.thirdParty.name?e.thirdParty.name:""),[p,o]=wp.element.useState(e.thirdParty.purpose?e.thirdParty.purpose:""),[_,y]=wp.element.useState(e.thirdParty.country?e.thirdParty.country:""),[E,f]=wp.element.useState(e.thirdParty.data?e.thirdParty.data:""),h=(l,r)=>{let n=[...e.field.value];Array.isArray(n)||(n=[]);let i={...n[e.index]};i[r]=l,n[e.index]=i,t(e.field.id,n),a(e.field.id,n)};return(0,i.useEffect)((()=>{const e=setTimeout((()=>{h(s,"name")}),500);return()=>{clearTimeout(e)}}),[s]),(0,i.useEffect)((()=>{const e=setTimeout((()=>{h(E,"data")}),500);return()=>{clearTimeout(e)}}),[E]),(0,i.useEffect)((()=>{const e=setTimeout((()=>{h(_,"country")}),500);return()=>{clearTimeout(e)}}),[_]),(0,i.useEffect)((()=>{const e=setTimeout((()=>{h(p,"purpose")}),500);return()=>{clearTimeout(e)}}),[p]),(0,l.createElement)(l.Fragment,null,(0,l.createElement)(r.default,{summary:s,details:(0,l.createElement)(l.Fragment,null,(0,l.createElement)("div",{className:"cmplz-details-row"},(0,l.createElement)("label",null,(0,m.__)("Name","complianz-gdpr")),(0,l.createElement)("input",{onChange:e=>u(e.target.value),type:"text",placeholder:(0,m.__)("Name","complianz-gdpr"),value:s})),(0,l.createElement)("div",{className:"cmplz-details-row"},(0,l.createElement)("label",null,(0,m.__)("Country","complianz-gdpr")),(0,l.createElement)("input",{onChange:e=>y(e.target.value),type:"text",placeholder:(0,m.__)("Country","complianz-gdpr"),value:_})),(0,l.createElement)("div",{className:"cmplz-details-row"},(0,l.createElement)("label",null,(0,m.__)("Purpose","complianz-gdpr")),(0,l.createElement)("input",{onChange:e=>o(e.target.value),type:"text",placeholder:(0,m.__)("Purpose","complianz-gdpr"),value:p})),(0,l.createElement)("div",{className:"cmplz-details-row"},(0,l.createElement)("label",null,(0,m.__)("Data","complianz-gdpr")),(0,l.createElement)("input",{onChange:e=>f(e.target.value),type:"text",placeholder:(0,m.__)("Data","complianz-gdpr"),value:E})),(0,l.createElement)("div",{className:"cmplz-details-row__buttons"},(0,l.createElement)("button",{className:"button button-default cmplz-reset-button",onClick:l=>(async l=>{let r=e.field.value;Array.isArray(r)||(r=[]);let n=[...r];n.hasOwnProperty(e.index)&&n.splice(e.index,1),t(e.field.id,n),a(e.field.id,n),await saveFields(d,!1,!1)})()},(0,m.__)("Delete","complianz-gdpr"))))}))}))}}]);