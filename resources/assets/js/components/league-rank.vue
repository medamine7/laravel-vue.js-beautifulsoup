<template>
<table class="homepage__tabs-table">
    <thead>
        <tr>
            <th>الرتبة</th>
            <th>الفريق</th>
            <th>لعب</th>
            <th>النقاط</th>
        </tr>
    </thead>
    <tbody>
        <tr :key="team.rank" v-for="team in teams">
            <td class="ranking-table-rank " title="رتبة 1">{{team.rank}}</td>
            <td class="ranking-table-team"><a href="/analytics/team/3466/"><img class="js-lazy" :data-original="team.logo" :src="team.logo"/><span :title="team.name">{{team.name}}</span></a></td>
            <td class="ranking-table-matchs">{{team.playcount}}</td>
            <td class="ranking-table-points">{{team.points}}</td>
        </tr>
    </tbody>
</table>
</template>

<script>
export default {
  props : ["teams"]
}
</script>

<style>
</style>
