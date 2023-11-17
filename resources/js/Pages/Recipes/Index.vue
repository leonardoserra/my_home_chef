<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps([
    'recipes',
]);





</script>
 
<template>
    <Head title="Ricette" />
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <!-- show all recipes -->
            <template v-if="recipes.lenght >= 1">
                <div  v-for="(recipe, index) in recipes" :key="index">
                     {{ recipe.name }}
                </div>
            </template>
            <template v-else>
                <p>Nessuna Ricetta da mostrare al momento!</p>
            </template>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped lang="scss">

</style>