<template>
    <div class="modal">
		<div class="modal-content">
            <div class="modal-sidebar">
                <div @click="toClose" class="close-times"><i class="fas fa-times"></i></div>
                <div class="ad"></div>
                <!-- <small-card :key="suggestion.id" v-for="suggestion in suggestions" :article="suggestion"></small-card> -->
            </div>
            <div class="modal-article">
                <div class="loader-overlay">
	                <img src="/images/modalloader.gif" alt="" class="modal-loader notwow">
                </div> 
                <div class="modal-article-image">
                    <img :src="image" alt="">
                </div>
                <h3 class="modal-article-heading">{{heading}}</h3>  
                <div class="modal-article-content">
                    <p>{{body}}</p>
                </div>
            </div>
        </div>
	</div>
</template>



<script>
export default {

    props : ["anchor"],
    data(){
        return {
            body :'',
            image : '',
            heading : '',
            suggestions: ''
        }
    },
    methods:{
        toClose(){
            this.$emit("close-modal");
        }
    },
    mounted(){
        var modalRef=this;
        document.addEventListener("keyup",function(e){
           if (e.keyCode===27) modalRef.toClose();
        });

        window.addEventListener("click",function(e){
            if (e.target==document.querySelector(".modal")) modalRef.toClose();
        });
        axios.get('/article/'+this.anchor)
        .then(function (response) {
            var image=response.data.article.image;
            var body = response.data.article.body;
            var heading = response.data.article.heading;
            var suggestions = response.data.suggestions;
            $(".loader-overlay").fadeOut();
            modalRef.body=body;
            modalRef.heading=heading;
            modalRef.image='/storage/cover_images/'+image;
            modalRef.suggestions=suggestions;

        })
        .catch(function (error) {
            console.log(error);
        });
    }
}
</script>


<style>

    .modal{
        direction: rtl;
        position : fixed;
        z-index: 105;
        top: 0;
        left : 0;
        width: 100%;
        height : 100vh;
        overflow : hidden;
        background: rgba(0,0,0,.6);
    }

    .modal-content{
        margin : 20px;
        background: #fff;
        display : flex;
        height : 87vh;
        padding: 20px;
        justify-content: space-between;
    }

    .close-times{
        cursor: pointer;
    }

    .ad{
        width: 350px;
        height: 350px;
        background: grey;
    }

    .modal-article{
        padding: 20px;
        height: 100%;
        overflow-y: auto;
        box-sizing: border-box;
        position : relative;
        width: 100%;
    }
    
    .modal-article-image {
        width: 100%;
    }
    
    .modal-article-image img{
        width: 50%;
        display: block;
        margin: auto;
    }

    .modal-loader{
        width : 150px;
        margin: auto;
    }

    .loader-overlay{
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background : white;
        top : 0;
        bottom : 0;
        right : 0;
        left : 0 ;
        margin : auto;
        position: absolute;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }

    
</style>
