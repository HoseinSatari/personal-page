<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: "fa";
            src: url("/fonts/Vazir.ttf") format("truetype") ;

        }
        body{
            font-family: "fa";
            direction: rtl;
        }
        /*.section{*/

        /*    border-radius: 10px;*/
        /*    width: 100%;*/
        /*    height: 500px;*/
        /*    background: radial-gradient(#D3CCE3 , #E9E4F0);*/
        /*    box-shadow: 0 0.75rem 1.5rem rgb(0 0 0 / 39%);*/
        /*}*/
        /*.text_shadow{*/
        /*    text-shadow: 0 0.5rem 0.9rem rgb(0 0 0 / 50%);*/
        /*}*/
    </style>
</head>
<body>
@php
$info = \App\Models\info_basic::find(1);
    @endphp
<div style="max-width: 90%;margin: auto;display: flex; ">
    <section class="section" style="display: flex">
       <div style="width: 30%; display: flex;flex-direction: column;    justify-content: center;">
            <div style="display: flex">
                <img src="{{$info->img}}" style="width: 70%;height: 200px;border-radius: 8rem;margin: auto" alt="">
            </div>
           <div>
               <h4 class="text_shadow" style="text-align: center">توسعه دهنده صفحات وب / بک اند</h4>
           </div>
       </div>
        <div style="width: 70%; display: flex;flex-direction: column;padding-right: 2rem;margin-top: 3rem">
            <div>
                <h4 class="text_shadow">درباره من</h4>
                <p class="text_shadow" style="max-width: 90%;text-align: justify">{{$info->about}}</p>
            </div>
            <div>
               <h4 class="text_shadow">اطلاعات شخصی</h4>
                p
            </div>
        </div>
    </section>
</div>



</body>
</html>
