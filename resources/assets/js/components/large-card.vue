<template>
    <div class="card-container">
        <a :href="'/'+article.lang+'/article/'+article.article_id">
            <div class="card card-large" >
                <div class="title-container">
                    <h3>{{article.heading}}</h3>
                </div>        
                <img :src="'/storage/cover_images/'+article.image" alt="">
            </div>
            <div class="article-meta">
                <p><span>{{article.category.category_name}}</span> {{article.created_at}}</p>
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
