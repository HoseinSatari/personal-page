<!doctype html>
<html lang="fa">
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
       }

    </style>
</head>
<body>

   <div style="width: 90%;margin:auto;display: flex">
       <div style="width: 80%">rirhg</div>
       <div style="width: 20%">
           <div style="border: 1px solid black; width: 100%;height: 400px;display: flex;flex-direction: column">
               <div >
                   <img src="{{\App\Models\info_basic::find(1)->img}}" style="width: 100%;height: 20rem" alt="">
               </div>
               <div>
                    <h2>اطلاعات شخصی</h2>
               </div>
           </div>
       </div>
   </div>

</body>
</html>
