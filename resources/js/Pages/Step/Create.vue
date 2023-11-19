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
            <h1 class="">Nome: {{ recipe.name }}</h1>
            <h1 class="">Descrizione: {{ recipe.description == " "?'Nessuna descrizione': recipe.description}}</h1>
            <h1 class="">Durata Preparazione: {{ recipe.duration }}</h1>
            <h1 class="">Punti Ricetta: {{ recipe.recipe_points }}</h1>
            <h1 class="">Difficoltà: {{ recipe.difficulty_id??="Difficoltà non selezionata" }}</h1>
            <h1 class="">Tipo Pietanza: {{ recipe.meal_type_id??="Tipo di pietanza non selezionato" }}</h1>
            <h1 class="">Tipo di Cucina: {{ recipe.cuisine_id??="Cucina non selezionata" }}</h1>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped lang="scss">

</style>