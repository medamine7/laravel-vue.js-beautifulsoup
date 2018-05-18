<template>
<table class="homepage__tabs-table">
    <thead>
        <tr>
            <th>{{rank}}</th>
            <th>{{team}}</th>
            <th>{{played}}</th>
            <th>{{points}}</th>
        </tr>
    </thead>
    <tbody>
        <tr :key="team.rank" v-for="team in teams">
            <td class="ranking-table-rank " title="رتبة 1">{{team.rank}}</td>
            <td class="ranking-table-team"><img class="js-lazy" :data-original="team.logo" :src="team.logo"/><span v-html="team.name" :title="team.name"></span></td>
            <td class="ranking-table-matchs">{{team.playcount}}</td>
            <td class="ranking-table-points">{{team.points}}</td>
        </tr>
    </tbody>
</table>
</template>

<script>
export default {
  props : ["teams","played","rank","team","points"]
}
</script>

<style>
</style>
