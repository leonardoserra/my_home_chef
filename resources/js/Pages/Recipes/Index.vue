<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {  Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import Card from '@/Components/Card.vue';


defineProps([
    'recipes',
    'difficulties',
    'mealTypes',
    'cuisines',
]);
</script>
 
<template>
    <Head title="Ricette" />
    <AuthenticatedLayout class="relative">
        <div class="fixed top-12 left-6 action-container">
            <Link  :href="route('recipes.create')" :active="route().current('recipes.create')">
                <PrimaryButton class="mt-4 mb-3">
                    Aggiungi Ricetta
                </PrimaryButton>
            </Link>
        </div>
        <div class="p-4 mx-auto index-body sm:p-6 lg:p-8 ">
            <!-- show all recipes -->
            <div class="overflow-hidden bg-white shadow-sm container-card sm:rounded-lg">
                <template v-if="recipes">
                    <template v-for="(recipe, index) in recipes" :key="index">
                        <Card 
                        :recipe="recipe"
                        :difficulty="difficulties.find(difficulty => difficulty.id == recipe.difficulty_id)"
                        :mealType="mealTypes.find(mealType => mealType.id == recipe.meal_type_id)"
                        :cuisine="cuisines.find(cuisine => cuisine.id == recipe.cuisine_id)"
                        >
                        </Card>
                    </template>
                   
                </template>
                <template v-else>
                    <div>Nessuna Ricetta da mostrare al momento!</div>
                </template>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped lang="scss">
.action-container{
    margin: auto;
    width: 1600px;
}
.index-body{
    display: flex;
    justify-content: center;
    .container-card{
        width: 100%;
        display: flex;
        justify-content: start;
        flex-wrap: wrap;
    }
}
</style>