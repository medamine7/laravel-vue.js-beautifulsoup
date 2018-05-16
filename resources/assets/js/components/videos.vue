<template>
    <div>
        <div v-if="videos" :class="'videos-container '+pageDirection">
            <div class="indicator"><h1>{{indicator}}</h1></div>        
            <div class="triple-video-group">
                <div class="double-video-small-group">
                    <div class="small-video-card video-card">
                        <div class="video-thumbnail-container">
                            <img :src="videos[1].image" alt="">
                        </div>
                        <div class="title-n-button">
                            <h3>{{videos[1].heading}}</h3>
                            <a class="watch-button" :href="'/'+videos[1].lang+'/video/'+videos[1].slug"><i class="fas fa-play-circle"></i><span>{{watch}}</span></a>
                        </div>
                    </div>
                    <div class="small-video-card video-card">
                        <div class="video-thumbnail-container">
                            <img :src="videos[2].image" alt="">
                        </div>
                        <div class="title-n-button">
                            <h3>{{videos[2].heading}}</h3>
                            <a class="watch-button" :href="'/'+videos[2].lang+'/video/'+videos[2].slug"><i class="fas fa-play-circle"></i><span>{{watch}}</span></a>
                        </div>
                    </div>
                </div>
                <div class="large-video-card video-card">
                    <div class="video-thumbnail-container">
                        <img :src="videos[0].image" alt="">
                    </div>
                    <div class="title-n-button">
                        <h3> {{videos[0].heading}} </h3>
                        <a class="watch-button" :href="'/'+videos[0].lang+'/video/'+videos[0].slug"><i class="fas fa-play-circle"></i><span>{{watch}}</span></a>
                    </div>
                </div>
                <div class="double-video-small-group">
                    <div class="small-video-card video-card">
                        <div class="video-thumbnail-container">
                            <img :src="videos[3].image" alt="">
                        </div>
                        <div class="title-n-button">
                            <h3>{{videos[3].heading}}</h3>
                            <a class="watch-button" :href="'/'+videos[3].lang+'/video/'+videos[3].slug"><i class="fas fa-play-circle"></i><span>{{watch}}</span></a>
                        </div>
                    </div>
                    <div class="small-video-card video-card">
                        <div class="video-thumbnail-container">
                            <img :src="videos[4].image" alt="">
                        </div>
                        <div class="title-n-button">
                            <h3>{{videos[4].heading}}</h3>
                            <a class="watch-button" :href="'/'+videos[4].lang+'/video/'+videos[4].slug"><i class="fas fa-play-circle"></i><span>{{watch}}</span></a>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="bottom-video-card-group">
                <div class="small-video-card video-card">
                    <div class="video-thumbnail-container">
                        <img :src="videos[5].image" alt="">
                    </div>
                    <div class="title-n-button">
                        <h3>{{videos[5].heading}}</h3>
                        <a class="watch-button" :href="'/'+videos[5].lang+'/video/'+videos[5].slug"><i class="fas fa-play-circle"></i><span>{{watch}}</span></a>
                    </div>
                </div>
                <div class="small-video-card video-card">
                    <div class="video-thumbnail-container">
                        <img :src="videos[6].image" alt="">
                    </div>
                    <div class="title-n-button">
                        <h3>{{videos[6].heading}}</h3>
                        <a class="watch-button" :href="'/'+videos[6].lang+'/video/'+videos[6].slug"><i class="fas fa-play-circle"></i><span>{{watch}}</span></a>
                    </div>
                </div>
                <div class="small-video-card video-card">
                    <div class="video-thumbnail-container">
                        <img :src="videos[7].image" alt="">
                    </div>
                    <div class="title-n-button">
                        <h3>{{videos[7].heading}}</h3>
                        <a class="watch-button" :href="'/'+videos[7].lang+'/video/'+videos[7].slug"><i class="fas fa-play-circle"></i><span>{{watch}}</span></a>
                    </div>
                </div>
                <div class="small-video-card video-card">
                    <div class="video-thumbnail-container">
                        <img :src="videos[8].image" alt="">
                    </div>
                    <div class="title-n-button">
                        <h3>{{videos[8].heading}}</h3>
                        <a class="watch-button" :href="'/'+videos[8].lang+'/video/'+videos[8].slug"><i class="fas fa-play-circle"></i><span>{{watch}}</span></a>
                    </div>
                </div>
            </div>
                <!-- loaded videos -->
                <div :key="index" v-if="index>8" v-for="(video,index) in videos" class="small-video-card video-card">
                    <div class="video-thumbnail-container">
                        <img :src="video.image" alt="">
                    </div>
                    <div class="title-n-button">
                        <h3>{{video.heading}}</h3>
                        <a class="watch-button" :href="'/'+video.lang+'/video/'+video.slug"><i class="fas fa-play-circle"></i><span>{{watch}}</span></a>
                    </div>
                </div>
            </div>
        
            <a v-if="!isload" :href="route" class="more-vids-btn"><h2>{{more}}</h2></a>                  
            <a v-if="isload" class="more-vids-btn" @click="getMoreVideos"><h2 v-if="!loading">{{load}}</h2><preloader v-if="loading"></preloader></a>                  
        </div>
</template>

<script>
export default {
    props : ["watch","more","load","isload","indicator","route",'category','pageDirection'],
    methods : {
        getMoreVideos(){
            this.loading=true;
            var Ref=this;                    
            axios.get("/get_videos/"+this.category+"/"+Ref.vid_num)
            .then(function (response) {
                Ref.loading=false;
                var videos=response.data;
                videos.forEach(function(element) {
                    element.image="/storage/"+element.image;
                });
                Ref.videos=videos;
                Ref.vid_num+=4;
            
            })
            .catch(function (error) {
                console.log(error);
            });
        },
    },
    data(){
        return{
            videos:'',
            vid_num: 17,
            loading : false
        }
    },
    created(){
        var Ref=this;        
        axios.get("/get_videos/"+this.category+"/13")
        .then(function (response) {
            var videos=response.data;
            videos.forEach(function(element) {
                element.image="/storage/"+element.image;
            });
            Ref.videos=videos;
            
        })
        .catch(function (error) {
            console.log(error);
        });
  }
}
</script>


<style>
/*
    .bottom-video-card-group{
        display : flex;
        flex-direction : row;
        width: 100%;
        justify-content: space-between;
    }

    .triple-video-group{
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: center;
    }

    .double-video-small-group{
        display: flex;
        flex-direction: column;
    }

    .video-card{
        position : relative;
        overflow: hidden;
    }

    .large-video-card{
        width: 410px;
        height : 360px;
        margin: 0 10px;
        
    }

    .small-video-card{
        width: 200px;
        height: 175px;
        margin-bottom: 10px;
    }

    .video-thumbnail-container img{
        width : auto;
        height: 100%;
    }

    .video-thumbnail-container{
        width: 100%;
        height: 100%;
        position: relative;
    }

    .video-thumbnail-container:after{
        content: '';
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        position :absolute;
        top: 0;
        transition : .2s opacity;
        right: 0;
    }

    .watch-button{
        border-radius: 20px;
        height: auto;
        padding: 2px 25px;
        text-align: center;
        background: #f5f6fa;
        font-family: 'Cairo', sans-serif;        
        font-weight : bold;
        font-size:14px;
        border : none;
        color: #2C3A47;
        outline: none;
        cursor: pointer;
    }

    .title-n-button svg{
        margin : 0 0 0 10px;
        color: #6D214F;
    }

    
    .title-n-button{
        position: absolute;
        padding: 15px 10px;
        bottom:0;
        right:0;
        left:0;
        box-sizing: border-box;
    }

    .title-n-button h3{
        text-align: right;
        color: #f5f6fa; 
        font-size: 15px;       
    }
    
    

    .large-video-card .title-n-button h3{
        font-size: 1.17em;
        
    }
    
    .more-vids-btn{
        background: #55E6C1;
        color : #2C3A47;
        margin: 20px auto;
        padding: 0 50px;
        cursor: pointer;
        height:50px;
        display : flex;
        justify-content: center;
        width: 120px;
        white-space : nowrap;
    }

    .more-vids-btn h2{
        margin : 0;
        display: inline-block;
    }

    .videos-container{
        display: flex;
        justify-content: space-between;
        direction :rtl;
        flex-direction: row;
        margin: auto;
        flex-wrap : wrap;
        width: 830px;
    }

    @media (max-width : 830px){
        .triple-video-group{
            flex-direction: column;
        }

        .large-video-card{
            margin: 0;
            order : 1;
            margin-bottom: 10px;
            
        }
        
        .videos-container{
            width: 410px;
        }

        .double-video-small-group{
            flex-direction: row;
            justify-content: space-between;
            order : 2;
        }

        .bottom-video-card-group{
            flex-wrap: wrap;
        }
    }

    @media (max-width : 430px){
        .videos-container{
            width: 80%;
        }

        .small-video-card{
            width : 49%;
            height:133px;
            font-size:12px;
        }

        .watch-btn{
            padding: 2px 10px;
        }


        .title-n-button h3{
            font-size: 13px;       
        }


        .large-video-card{
            height : 260px;
            width: 100%;
        }
    }
*/
</style>
