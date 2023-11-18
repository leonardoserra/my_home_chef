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
        {{ recipe }}
        <div class="recipe-info">
            
        </div>
        <h1 class="">{{ recipe.name }}</h1>
    </AuthenticatedLayout>
</template>

<style scoped lang="scss">

</style>