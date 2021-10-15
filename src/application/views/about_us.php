<!--UI style referenced from https://codepen.io/shaikmaqsood/pen/aNgZeK-->
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300'rel='stylesheet'type='text/css'"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Dancing+Script:700'rel='stylesheet'type='text/css'"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

</head>
<style>
    .product_button {
        padding: 10px;
        font-size: 18px;
        left:80px;
        top: 40px;
        /*bottom: 20px;*/
        position: absolute;
        border-radius: 15px;
        background-color: skyblue;
    }
    .product_button:hover{
        color:#117a8b;
        background-color: white;
        opacity: 0.8;
    }
</style>
<div class="row">
    <body>
    <div class="containers col-lg-6 col-md-6">
        <form action="<?php base_url()?>/proj/homepage">
            <button class="product_button" type="submit"> Home </button>
        </form>
        <img width="400" height="400" style="position:relative;left:100px;top: 150px;" src="../../proj/uploads/UQ.png">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous"
                src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="53sh35pD"></script>
        <div width="400" height="400" style="position:relative;left:150px;top: 150px;" class="fb-share-button" data-href="https://deco3801-gpa7forsure.uqcloud.net/proj/index.php"
             data-layout="button" data-size="large"><a target="_blank"
                                                       href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdeco3801-gpa7forsure.uqcloud.net%2Fproj%2Findex.php&amp;src=sdkpreparse"
                                                       class="fb-xfbml-parse-ignore">Share</a></div>
    </div>

    </body>
    <div class="content col-md-offset-6 col-lg-offset-6">
        <center>
            <h1 class="contentHead">ABOUT US</h1>
        </center>

        <h2>Hi Folks, <br/><br/>
            This is GPA7forsure. We're a gourp of Freakin Codeigniter developers, jus came up with this concept of enjoy
            a
            BIG PROJECT with friends, we are about to graduate this year. <br/><br/>
            Can't belive that it worked.
            <br/><br/>
            Show your L<span>&hearts;</span>VE if you like our website.
            <br/><br/>
            <pre style="width: 600px">
             <span style="text-align:right; color:#000000; font-size:18px;">&nbsp&nbspNOTICE:'You don't know what you've got,<br>&nbsp&nbsp til it goes, til it's gone.'
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    *Presented by GPA7forsure'</span>

            </pre>
        </h2>
    </div>
</div>

<style>

    body {
        background: url('https://s-media-cache-ak0.pinimg.com/736x/f4/ac/6a/f4ac6aac3afb587f6cae04155656fca3.jpg');
    }

    .containers {
        width: 550px;
        height: 100%;
        margin-left: 10px;
    }

    .pic {
        box-shadow: 6px 6px 7px #888888;
        width: 300px;
        height: 300px;
        position: relative;
        overflow: hidden;
        margin-top: 100px;
        margin-left: 135px;
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .pic:before {
        content: '';
        margin-top: -63px;
        margin-left: -80px;
        position: absolute;
        width: 450px;
        height: 450px;
        background: url('http://ultraimg.com/images/a0ed6d.jpg') center center;
        -ms-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }

    .pic:hover, .box1:hover, .box2:hover, .social1:hover, .social2:hover, .social3:hover {
        box-shadow: 3px 3px 7px #888888;
        cursor: pointer;
    }

    .box1 {
        box-shadow: 6px 6px 7px #888888;
        width: 100px;
        height: 100px;
        position: relative;
        overflow: hidden;
        margin-top: -124px;
        margin-left: 16px;
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .box1:before {
        content: '';
        margin-top: -25px;
        margin-left: -31px;
        position: absolute;
        width: 200px;
        height: 200px;
        background: url('http://creek.themebucket.net/wp-content/uploads/2015/09/8.jpg') center center;
        -ms-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }

    .box2 {
        box-shadow: 6px 6px 7px #888888;
        position: relative;
        overflow: hidden;
        width: 194px;
        height: 99px;
        margin-top: 14px;
        margin-left: 78px;
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .box2:before {

        content: '';
        margin-top: -74px;
        margin-left: -31px;
        position: absolute;
        width: 300px;
        height: 300px;
        background: url('http://i-cdn.phonearena.com/images/articles/220901-image/Here-is-how-the-start-screen-of-Google-Maps-looks-like.jpg') center center;
        -ms-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }

    .social1 {
        box-shadow: 6px 6px 7px #888888;
        width: 80px;
        height: 80px;
        background-color: #3b5998;
        margin-top: -57px;
        margin-left: 305px;
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .social1 > i {
        font-size: 60px;
        margin-top: 13px;
        margin-left: 20px;
        -ms-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
        color: #ffffff;
    }

    .social2 {
        box-shadow: 6px 6px 7px #888888;
        width: 80px;
        height: 80px;
        background-color: #C73B6F;
        margin-top: -142px;
        margin-left: 370px;
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .social2 > i {
        font-size: 60px;
        margin-top: 8px;
        margin-left: 13px;
        -ms-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
        color: #ffffff;
    }

    .social3 {
        box-shadow: 6px 6px 7px #888888;
        width: 80px;
        height: 80px;
        background-color: #000000;
        margin-top: -143px;
        margin-left: 435px;
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .social3 > i {
        font-size: 60px;
        margin-top: 9px;
        margin-left: 9px;
        -ms-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
        color: #ffffff;
    }

    .content {
        height: 100%;
        width: 500px;
    }

    p {
        font-family: 'Open Sans Condensed', sans-serif;
    }

    h2 {
        font-family: 'Dancing Script', cursive;
    }

    .contentHead {
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 60px;
        font-weight: 500;
        text-decoration: underline;
    }

    sup {
        font-family: 'Open Sans Condensed', sans-serif;
        font-style: italic;
        font-size: smaller;
    }

    span {
        color: pink;
    }
</style>