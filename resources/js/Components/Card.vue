<script setup>
    defineProps([
        'recipe',
        'difficulty',
        'mealType',
        'cuisine',
    ]);
</script>

<template>
    <div class="recipe-card">
        <div class="image">
            <img :src="recipe.image_path " alt="">
        </div>
        <div class="name">
            {{ recipe.name }}
        </div>
        <div class="description">
            {{ recipe.description }}
        </div>
        <div class="duration">
            {{ recipe.duration }}
        </div>
        <div class="difficulty">
            {{ difficulty}}
        </div>
        <div class="meal-type">
            {{ mealType }}
        </div>
        <div class="cuisine">
            {{ cuisine }}
        </div>
    </div>
   
</template>
<style scoped lang="sass">

</style>