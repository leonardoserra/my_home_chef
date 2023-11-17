<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

defineProps([
    'difficulties',
    'mealTypes',
    'cuisines',
]);

const form = useForm({
    name: '',
    description: '',
    image_path: '',
    duration: '',
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
                <InputError :message="form.errors.name" class="mt-2" />
                <input 
                    type="text" 
                    v-model="form.name" 
                    placeholder="Nome Ricetta *Obbligatorio*"
                    class="block w-full mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >

                <InputError :message="form.errors.description" class="mt-2" />
                <textarea
                    v-model="form.description"
                    placeholder="Breve Descrizione max 100 caratteri"
                    class="block w-full mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>

                <InputError :message="form.errors.name" class="mt-2" />
                <input 
                    type="text" 
                    v-model="form.image_path" 
                    placeholder="Path Immagine - Opzionale"
                    class="block w-full mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >
                <!-- Duration -->
                <InputError :message="form.errors.duration" class="mt-2" />
                <input 
                    type="number" 
                    v-model="form.duration" 
                    min="0"
                    max="720"
                    placeholder="Durata Ricetta in Minuti"
                    class="block w-60 mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >
                <!-- Difficulties -->
                <InputError :message="form.errors.difficulty_id" class="mt-2" />
                <select v-model="form.difficulty_id" class="block w-60 mb-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                    <option  :value=null>Seleziona Difficoltà</option>
                    <template v-for="(difficulty,index) in difficulties" :key="index">
                        <option :value="difficulty.id">{{ difficulty.name }}</option>
                    </template>
                </select>

                <!-- Meal Types -->
                <InputError :message="form.errors.meal_type_id" class="mt-2" />
                <select v-model="form.meal_type_id" class="block w-60 mb-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                    <option :value=null>Seleziona Tipo Di Pietanza</option>
                    <template v-for="(mealType,index) in mealTypes" :key="index">
                        <option :value="mealType.id">{{ mealType.name }}</option>
                    </template>
                </select>

                <!-- Cuisines -->
                <InputError :message="form.errors.cuisine_id" class="mt-2" />
                <select v-model="form.cuisine_id" class="block w-60 mb-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                    <option :value=null>Seleziona Tipo di Cucina</option>
                    <template v-for="(cuisine,index) in cuisines" :key="index">
                        <option :value="cuisine.id">{{ cuisine.name }}</option>
                    </template>
                </select>
                
                <PrimaryButton class="mt-4">Crea Ricetta</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped lang="scss">

</style>