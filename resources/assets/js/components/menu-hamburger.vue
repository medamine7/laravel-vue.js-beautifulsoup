<template>
    <span class="widget-menu">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </span>  
</template>


<style>

    .widget-menu{
        font-size: 30px;
        margin: 0;
        display: flex;
        cursor: pointer;
        flex-direction: column;
        justify-content: center;
        width: 62px;
        top : 4px;        
        height: 45px;
        position: relative;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: .5s ease-in-out;
        -moz-transition: .5s ease-in-out;
        -o-transition: .5s ease-in-out;
        transition: .5s ease-in-out;
        cursor: pointer;
        transform: scale(.6);
    }
    
    .widget-menu span {
        display: block;
        position: absolute;
        height: 7px;
        width: 50%;
        background: #2C3A47;
        opacity: 1;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: .25s ease-in-out;
        -moz-transition: .25s ease-in-out;
        -o-transition: .25s ease-in-out;
        transition: .25s ease-in-out;
    }

    .widget-menu span:nth-child(even) {
        left: 50%;
        border-radius: 0 9px 9px 0;
    }

    .widget-menu span:nth-child(odd) {
        left:0px;
        border-radius: 9px 0 0 9px;
    }

    .widget-menu span:nth-child(1), .widget-menu span:nth-child(2) {
        top: 0px;
    }

    .widget-menu span:nth-child(3), .widget-menu span:nth-child(4) {
        top: 18px;
    }

    .widget-menu span:nth-child(5), .widget-menu span:nth-child(6) {
        top: 36px;
    }

    .widget-menu.open span:nth-child(1),.widget-menu.open span:nth-child(6) {
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .widget-menu.open span:nth-child(2),.widget-menu.open span:nth-child(5) {
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }

    .widget-menu.open span:nth-child(1) {
        left: 5px;
        top: 7px;
    }

    .widget-menu.open span:nth-child(2) {
        left: calc(50% - 5px);
        top: 7px;
    }

    .widget-menu.open span:nth-child(3) {
        left: -50%;
        opacity: 0;
    }

    .widget-menu.open span:nth-child(4) {
        left: 100%;
        opacity: 0;
    }

    .widget-menu.open span:nth-child(5) {
        left: 5px;
        top: 29px;
    }

    .widget-menu.open span:nth-child(6) {
        left: calc(50% - 5px);
        top: 29px;
    }



</style>

<script>
    $(document).ready(function(){
        $('#nav-icon1,.widget-menu,#nav-icon3,#nav-icon4').click(function(){
            $(this).toggleClass('open');
        });
    });
</script>
