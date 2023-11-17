<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps([
    'difficulties',
    'mealTypes',
    'cuisines',
]);

const form = useForm({
    name: '',
    description: '',
    image_path: '',
    duration: null,
    difficulty_id: null,
    meal_type_id: null,
    cuisine_id: null,
});



</script>
 
<template>
    <Head title="Ricette" />
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            
            <form @submit.prevent="form.post(route('recipes.store'), { onSuccess: () => form.reset() })">
                <input 
                    type="text" 
                    v-model="form.name" 
                    placeholder="Nome Ricetta *Obbligatorio*"
                    class="block w-full mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >
                <textarea
                    v-model="form.description"
                    placeholder="Descrizione max 255 caratteri"
                    class="block w-full mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <input 
                    type="text" 
                    v-model="form.image_path" 
                    placeholder="Path Immagine - Opzionale"
                    class="block w-full mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >
                <!-- Duration -->
                <input 
                    type="number" 
                    v-model="form.duration" 
                    min="0"
                    max="60"
                    placeholder="Durata Ricetta in Minuti"
                    class="block w-60 mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >

                <!-- Difficulties -->
                <select v-model="form.difficulty_id" class="block w-60 mb-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                    <option  :value=null>Seleziona Difficoltà</option>
                    <template v-for="(difficulty,index) in difficulties" :key="index">
                        <option :value="difficulty.id">{{ difficulty.name }}</option>
                    </template>
                </select>

                <!-- Meal Types -->
                <select v-model="form.meal_type_id" class="block w-60 mb-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                    <option :value=null>Seleziona Tipo Di Pietanza</option>
                    <template v-for="(mealType,index) in mealTypes" :key="index">
                        <option :value="mealType.id">{{ mealType.name }}</option>
                    </template>
                </select>

                <!-- Cuisines -->
                <select v-model="form.cuisine_id" class="block w-60 mb-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                    <option :value=null>Seleziona Tipo di Cucina</option>
                    <template v-for="(cuisine,index) in cuisines" :key="index">
                        <option :value="cuisine.id">{{ cuisine.name }}</option>
                    </template>
                </select>
                
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Crea Ricetta</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped lang="scss">

</style>