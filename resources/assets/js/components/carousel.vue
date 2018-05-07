<template>
    <div class="owl-carousel owl-theme">
        <medium-card :article="articles[8]"></medium-card>
        <medium-card :article="articles[9]"></medium-card>
        <medium-card :article="articles[10]"></medium-card>
        <medium-card :article="articles[11]"></medium-card>
        <medium-card :article="articles[12]"></medium-card>
        <medium-card :article="articles[13]"></medium-card>
    </div>
</template>


<script>
export default {
    props : ["articles"],
    methods : {
    }
}
</script>

