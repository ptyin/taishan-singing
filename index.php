<!DOCTYPE html>
<html lang="ch_zn">
<head>
    <meta charset="UTF-8">
    <title>泰山学堂歌咏比赛投票</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- 泰山学堂歌咏比赛投票链接！请投出你宝贵的一票 -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/png" href="images/taishan-logo.png"/>

    <!-- Uncomment this if you need apple touch icon. -->
    <!--
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png">
    -->

    <!-- Don't delete this. It's needed for development workflow. -->
    <link rel="stylesheet" href="stylesheets/bundle.css">
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="javascripts/alert.js"></script>
    <style>
        /*.loading-overlay*/
        /*{*/
        /*    display: flex;*/
        /*    flex-direction: column;*/
        /*    justify-content: center;*/
        /*    align-items: center;*/
        /*}*/
        /*#success*/
        /*{*/
        /*    color: #4aff65;*/
        /*}*/
        /*#fail*/
        /*{*/
        /*    color: #e96674;*/
        /*}*/
        .mainWidget {
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: crimson;
        }

        #submit:not([disabled]) {
            -webkit-text-fill-color: #4aff65;
            width: 10rem;
        }

        #sing, #recite {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }

        .mainWidget * {
            box-sizing: border-box;
        }

        .mainWidget button {
            position: relative;
            background: none;
            cursor: pointer;
            border: 0;
            padding: 0;
            outline: 0;
            font-family: 'Chewy', cursive;
            color: crimson;
            width: 20rem;
            margin-top: 1rem;
        }

        .mainWidget span {
            display: block;
        }

        .shadow:before,
        .shadow:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 100px;
            background: red;
            z-index: -1;
            background: linear-gradient(to right, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0) 100%);
            opacity: .4;
            transform: rotateX(0);
            transform-origin: center 30px;
            filter: blur(1px);
            animation: shadowLeft 2s ease-in-out alternate infinite;
            transition: all 1s cubic-bezier(0.875, -0.555, 0.190, 1.640);
        }

        @keyframes shadowLeft {
            to {
                opacity: .1;
                filter: blur(5px);
            }
        }

        .shadow:after {
            background: linear-gradient(to left, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0) 100%);
            opacity: .1;
            filter: blur(5px);
            animation: shadowRight 2s ease-in-out alternate infinite;
        }

        @keyframes shadowRight {
            to {
                opacity: .4;
                filter: blur(1px);
            }
        }


        .vert {
            transform: translateY(-20px);
            animation: vert 1s ease-in-out alternate infinite;
        }

        @keyframes vert {
            to {
                transform: translateY(-25px);
            }
        }

        .floating {
            background-color: transparent;
            -webkit-perspective: 800;
            -webkit-transform-style: preserve-3d;
            transform: rotateY(-3deg) skewY(-3deg);
            animation: swing 2s cubic-bezier(0.420, 0.000, 0.580, 1.000) alternate infinite;
        }

        @keyframes swing {
            to {
                transform: rotateY(3deg) skewY(3deg);
            }
        }

        .floating span {
            display: block;
            padding: 10px 0;
            border-radius: 100px;
            font-size: 20px;
            transition: all 1s cubic-bezier(0.875, -0.555, 0.190, 1.640);
            width: 100%;
        }

        .frontSelect {
            background: #fff;
            transform: translateY(-3px) translateZ(5px) rotateX(0);
        }

        .backSelect {
            background: #aaa;
            transform: translateY(3px) translateZ(-5px) rotateX(-180deg);
        }

        .frontTransform {
            transform: translateY(3px) translateZ(-5px) rotateX(180deg);
            background: #aaa;
        }

        .backTransform {
            transform: translateY(-3px) translateZ(5px) rotateX(0);
            background: #e96674;
        }

        span.back {
            position: absolute;
            top: 0;
            left: 0;
        }

        button[disabled]
        {
            -webkit-text-fill-color: #c0c0c0;
        }
    </style>
</head>
<body>
<div class="loading-overlay">
<!--    <h1 id="success">Success!</h1>-->
<!--    <h1 id="fail">Fail!</h1>-->
    <img src="images/loading.svg">
</div>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide slide-1">
            <div class="item-image animated" data-ani-name="slideInLeft" data-ani-duration="1s"
                 data-ani-delay="0s"></div>
            <p class="item-text animated" data-ani-name="slideInRight" data-ani-duration="1s" data-ani-delay="0.3s">
                欢迎来到歌咏比赛现场！</p>
        </div>
        <div class="swiper-slide slide-2">
            <div class="item-image animated" data-ani-name="bounceInDown" data-ani-duration="1s"
                 data-ani-delay="0s"></div>
            <p class="item-text animated" data-ani-name="bounceInUp" data-ani-duration="1s" data-ani-delay="0.3s">
                请投出你宝贵的一票！</p>
        </div>
        <div id="singContainer" class="swiper-slide mainWidget">
            <div class="item-image animated" data-ani-name="slideInLeft" data-ani-duration="1s" data-ani-delay="0s">
                <div id="sing">
                    <button id="1">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">一、想家的时候</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="2">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">二、风说</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="3">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">三、玛依拉变奏曲</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="5">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">五、再见</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="6">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">六、稻香</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="7">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">七、滚滚长江东逝水</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="9">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">九、南山忆</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="10">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">十、愿得一人心</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="11">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">十一、大碗宽面</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="13">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">十三、一生所爱</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="14">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">十四、明月谱</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                </div>
            </div>
        </div>
        <div id="reciteContainer" class="swiper-slide mainWidget">
            <div class="item-image animated" data-ani-name="slideInRight" data-ani-duration="1s" data-ani-delay="0s">
                <div id="recite">
                    <button id="4">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">四、想家的时候</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="8">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">八、风说</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="12">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">十二、玛依拉变奏曲</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <button id="15">
                      <span class="shadow">
                        <span class="vert">
                          <span class="floating">
                            <span class="front frontSelect">十五、再见</span>
                            <span class="back backSelect">谢谢！</span>
                          </span>
                        </span>
                      </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="swiper-slide slide-3 mainWidget">
            <div class="item-image animated" data-ani-name="flipInX" data-ani-duration="1s" data-ani-delay="0s"></div>
            <button id="submit" class="item-text animated" disabled="disabled" data-ani-name="flipInY" data-ani-duration="1s"
                    data-ani-delay="0.3s">
                <span class="shadow">
                    <span class="vert">
                      <span class="floating">
                        <span class="front frontSelect">提交</span>
                        <span class="back backSelect">成功提交！</span>
                      </span>
                    </span>
                </span>
            </button>
        </div>
    </div>
</div>

<button class="up-arrow">
    <i class="icon-angle-double-up"></i>
</button>

<button class="btn-music">
    <i class="icon-note"></i>
</button>

<audio loop>
    <source src="audios/background.mp3" type="audio/mpeg">
</audio>

<!-- Don't delete this. It's needed for development workflow. -->
<script src="javascripts/bundle.js"></script>
<script>
    var singing, reciting;
    $("#sing button").click(function () {
        singing = $(this).attr("id");
        $(this).siblings("button").children(".shadow").children(".vert").children(".floating").children(".front").removeClass("frontTransform");
        $(this).siblings("button").children(".shadow").children(".vert").children(".floating").children(".back").removeClass("backTransform");
        $(this).children(".shadow").children(".vert").children(".floating").children(".front").addClass("frontTransform");
        $(this).children(".shadow").children(".vert").children(".floating").children(".back").addClass("backTransform");
        if(singing !== undefined && reciting !== undefined)
        {
            $("#submit").removeAttr("disabled");
        }
    });
    $("#recite button").click(function () {
        reciting = $(this).attr("id");
        $(this).siblings("button").children(".shadow").children(".vert").children(".floating").children(".front").removeClass("frontTransform");
        $(this).siblings("button").children(".shadow").children(".vert").children(".floating").children(".back").removeClass("backTransform");
        $(this).children(".shadow").children(".vert").children(".floating").children(".front").addClass("frontTransform");
        $(this).children(".shadow").children(".vert").children(".floating").children(".back").addClass("backTransform");
        if(singing !== undefined && reciting !== undefined)
        {
            $("#submit").removeAttr("disabled");
        }
    });

    $("#submit").click(()=>
    {
        setTimeout(()=>
        {
            $(".mainWidget").hide();
            $(".loading-overlay").show();
        }, 200);
        setTimeout(()=>
        {
            $.ajax(
                {
                    type:"get",
                    url:"submit.php",
                    async:true,
                    data:{singing_vote_id:singing, reciting_vote_id:reciting},
                    dataType:"text",
                    success: function (result, status)
                    {
                        $(".loading-overlay image").hide();
                        console.log(status);
                        if(result === "success")
                        {
                            showToast({
                                title:"提交成功！",
                                icon:'success',
                                duration:3000,
                                mask:true,
                                success:function (res) {
                                    console.warn(JSON.stringify(res));
                                    if(WeixinJSBridge !== undefined)
                                    {
                                        WeixinJSBridge.call('closeWindow');
                                    }
                                }
                            });
                        }
                        else if(result === "fail")
                        {
                            showToast({
                                title:"不要重复提交！",
                                icon:'loading',
                                duration:3000,
                                mask:true,
                                success:function (res) {
                                    console.warn(JSON.stringify(res));
                                    if(WeixinJSBridge !== undefined)
                                    {
                                        WeixinJSBridge.call('closeWindow');
                                    }
                                }
                            });
                        }
                    },
                    error:function (error)
                    {
                        showToast({
                            title:"提交失败！",
                            icon:'loading',
                            duration:3000,
                            mask:true,
                            success:function (res) {
                                console.warn(JSON.stringify(res));
                                if(WeixinJSBridge !== undefined)
                                {
                                    WeixinJSBridge.call('closeWindow');
                                }
                            }
                        });
                        $(".loading-overlay image").hide();
                        console.log(error);
                    }

                }
            );
        }, 500);
    });
</script>
</body>

</html>