<template>
    <div class="card video-card">
        <div class="title-container">
            <h3>{{video.heading}}</h3>
        </div>
        <img :src='"/storage/"+video.image' alt="">
    </div>
</template>

<script>
export default {
    props : ["video"],

}
</script>

