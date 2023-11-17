<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import Card from '@/Components/Card.vue';

import { ref } from 'vue';

defineProps([
    'recipes',
    'difficulties',
    'mealTypes',
    'cuisines',
]);
</script>
 
<template>
    <Head title="Ricette" />
    <AuthenticatedLayout>
        <div class="mx-auto p-4 sm:p-6 lg:p-8">
            <Link :href="route('recipes.create')" :active="route().current('recipes.create')">
                <PrimaryButton class="mt-4 mb-3">
                    Aggiungi Ricetta
                </PrimaryButton>
            </Link>
            <!-- show all recipes -->
            <div class="container-card">
                <template v-if="recipes">
                    <template v-for="(recipe, index) in recipes" :key="index">
                        <Card 
                        :recipe="recipe"
                        :difficulty="difficulties.find(difficulty => difficulty.id == recipe.difficulty_id).name"
                        :mealType="mealTypes.find(mealType => mealType.id == recipe.meal_type_id).name"
                        :cuisine="cuisines.find(cuisine => cuisine.id == recipe.cuisine_id).name"
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
   .container-card{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap:15px;
   }
</style>