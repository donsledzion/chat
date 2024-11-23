import{T as d,c as u,w as l,o as i,a,u as t,Z as c,b as o,f,t as p,g as w,d as g,n as _,e as y}from"./app-CZTem61Z.js";import{_ as x}from"./GuestLayout-CDB8loMq.js";import{_ as b,a as k,b as V}from"./TextInput-BjFZhxgi.js";import{P as v}from"./PrimaryButton-DLgo_RHX.js";import"./ApplicationLogo-JxPddJdK.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const B={key:0,class:"mb-4 text-sm font-medium text-green-600 dark:text-green-400"},N={class:"mt-4 flex items-center justify-end"},h={__name:"ForgotPassword",props:{status:{type:String}},setup(r){const e=d({email:""}),m=()=>{e.post(route("password.email"))};return(P,s)=>(i(),u(x,null,{default:l(()=>[a(t(c),{title:"Forgot Password"}),s[2]||(s[2]=o("div",{class:"mb-4 text-sm text-gray-600 dark:text-gray-400"}," Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one. ",-1)),r.status?(i(),f("div",B,p(r.status),1)):w("",!0),o("form",{onSubmit:y(m,["prevent"])},[o("div",null,[a(b,{for:"email",value:"Email"}),a(k,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:t(e).email,"onUpdate:modelValue":s[0]||(s[0]=n=>t(e).email=n),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),a(V,{class:"mt-2",message:t(e).errors.email},null,8,["message"])]),o("div",N,[a(v,{class:_({"opacity-25":t(e).processing}),disabled:t(e).processing},{default:l(()=>s[1]||(s[1]=[g(" Email Password Reset Link ")])),_:1},8,["class","disabled"])])],32)]),_:1}))}};export{h as default};
