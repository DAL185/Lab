 <!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
     <title>Title</title>
         <script type="text/javascript" src="../js/tabs_function.js"></script>
       <script type="text/javascript">
               window.onload = function main() {
           Tabs(".list-item", ".contents", "list-item-checked", "contents-checked");

 }
    </script>
        <style type="text/css">
                #list-title {
                       width: 318px;
                      height: 56px;
                         margin: 0;
                        list-style-type: none;
                       padding-left: 0;
                   }

                .list-item {
                                    float: left;
                                    width: 100px;
                                    height: 50px;
                                    margin: 2px;
                                    line-height: 50px;
                                    font-size: 28px;
                                   text-align: center;
                                    border: 1px solid #000;
                                    cursor: pointer;
                                }

                 .list-item-checked {
                                    background-color: #70adff;
                                    color: #ffffff;
                                }

                 #content-box {
                                    position: relative;
                                    clear: both;
                                    width: 314px;
                                    height: 302px;
                                    margin: 0 2px;
                                }

                 .contents {
                                   position: absolute;
                                    left: 0;
                                    top: 0;
                                    width: 312px;
                                    height: 300px;
                                    margin: 0;
                                    font-size: 32px;
                                    line-height: 300px;
                                    text-align: center;
                                    border: 1px solid #000;
                                    z-index: 0;
                                    opacity: 0;
                                    visibility: hidden;
                                    -webkit-transition: all .5s;
                                    -moz-transition: all .5s;
                                    -ms-transition: all .5s;
                                    -o-transition: all .5s;
                                    transition: all .5s;
                               }

                 .contents-checked {
                                    z-index: 1;
                                   opacity: 1;
                                    visibility: visible;
                                }
            </style>
    </head>
 <body>
 <ul id="list-title">
         <li class="list-item list-item-checked">1</li>
         <li class="list-item">2</li>
         <li class="list-item">3</li>
     </ul>
 <div id="content-box">
         <div class="contents contents-checked" style="background-color: #c8ff40;">content_1</div>
         <div class="contents" style="background-color: #41ff6f;">content_2</div>
         <div class="contents" style="background-color: #ff82a0;">content_3</div>
     </div>
 </body>
 </html>