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
        <div class="image-wrapper">
            <img class="image" :src="recipe.image_path " alt="">
        </div>
        <div class="name">
            {{ recipe.name }}
        </div>
        <div class="description">
            <em>
                {{ recipe.description }}
            </em>
        </div>
        <div class="duration">
            Preparazione: {{ recipe.duration }} min
        </div>
        <div class="difficulty">
            Difficoltà: {{ difficulty ? difficulty : 'nessuna cucina selezionata' }}
        </div>
        <div class="meal-type">
            Tipo di piatto: {{ mealType ? mealType : 'nessuna cucina selezionata' }}
        </div>
        <div class="cuisine">
            Cucina: {{ cuisine ? cuisine : 'nessuna cucina selezionata' }}
        </div>
    </div>
   
</template>
<style scoped lang="scss">
    .recipe-card{
        width: calc(100% / 3 - 30px);
        padding: 15px;
        border: 1px solid black;
        border-radius: 15px;
        text-align: center;
            .image-wrapper{
                width: 100%;
                padding-left: calc(100%/2 - 25%);
                padding-right: calc(100%/2 - 25%);
                .image{
                    width:100%;
                    border-radius: 10px;
                }
            }
            .name{
                font-size: 2rem;
            }
            .description{
                font-size: 1.2rem;
                margin-bottom: 10px;
            }

            .name ,
            .image-wrapper,
            .duration, 
            .difficulty,
            .meal-type,
            .cuisine {
                margin: 5px 0 5px 0;
            }

        }
</style>