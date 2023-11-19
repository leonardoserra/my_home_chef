<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps([
    'recipe'
]);

const form = useForm({    
    order_number: 0,
    description: null,
    action_type_id: null,
});
</script>

<template>
    <Head title="Passaggi della Ricetta" />
    <AuthenticatedLayout>
        <!-- {{ recipe }} -->
        <div class="m-auto recipe-info">
            <h1 class="">{{ recipe.name }}</h1>
            <h1 class="">{{ recipe.description == " "?'Nessuna descrizione': recipe.description}}</h1>
            <h1 class="">{{ recipe.duration }}</h1>
            <h1 class="">{{ recipe.recipe_points }}</h1>
            <h1 class="">{{ recipe.difficulty_id??="Difficoltà non selezionata" }}</h1>
            <h1 class="">{{ recipe.meal_type_id??="Tipo di pietanza non selezionato" }}</h1>
            <h1 class="">{{ recipe.cuisine_id??="Cucina non selezionata" }}</h1>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped lang="scss">

</style>