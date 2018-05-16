<template>
    <div class="card-container">
        <a :href="'/'+article.lang+'/article/'+article.slug">
            <div class="card card-medium" >
                <img :src="'/storage/'+article.image" alt="">
                <div class="title-container">
                    <h3>{{article.heading}}</h3>
                </div>        
            </div>
            <div class="article-meta">
                <p><span>{{article.category.category_name}}</span> <i class="far fa-calendar-alt"></i>{{article.date}} <i class="far fa-clock"></i> {{article.time}}</p>
            </div>
        </a>
    </div>
</template>

<script>

export default {
    props : ["article"],
}

</script>

<style>

</style>
