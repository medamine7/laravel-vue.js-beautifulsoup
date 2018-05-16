<template>
    <div :class="'headlines '+pageDirection">
        <div class="large-group-container">
            <div class="large-group">
                <large-card :article="articles[0]"></large-card>
                <div class="double-card">
                    <medium-card :article='articles[1]'></medium-card>
                    <medium-card :article='articles[2]'></medium-card>
                </div>
            </div>
            <img src="/images/ad-tall.jpg" alt="" class="ad-tall">
        </div>
        <div class="small-group-container">
            <small-card :article='articles[3]'></small-card>
            <small-card :article='articles[4]'></small-card>
            <small-card :article='articles[5]'></small-card>
            <small-card :article='articles[6]'></small-card>
            <small-card :article='articles[7]'></small-card>
        </div>
    </div>
</template>

<script>
    export default {
        props : ["articles","pageDirection"],
        methods : {

        }
        
    }
</script>

