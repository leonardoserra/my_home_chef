<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head} from '@inertiajs/vue3';
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
    duration: '',
    difficulty_id: null,
    meal_type_id: null,
    cuisine_id: null,
});

const errors = ref({
    name:'Nome obbligatorio',
    description: 'La descrizione supera i 100 caratteri, scrivi una breve descrizione',
    image_path: "Non è un percorso valido per l'immagine, non puoi superari i 255 caratteri",
    duration: 'Durata ricetta obbligatoria',
    difficulty_id: 'Inserisci un livello di difficoltà valido',
    meal_type_id: 'Inserisci un tipo di pietanza valido',
    cuisine_id: 'Inserisci un tipo di cucina valido',
});
</script>
 
<template>
    <Head title="Nuova Ricetta" />
    
    <AuthenticatedLayout>
        <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
            
            <form class="p-4 overflow-hidden bg-white shadow-sm sm:rounded-lg" @submit.prevent="form.post(route('recipe.store'), { onSuccess: () => form.reset() })">
                <InputError :message="form.errors.name?errors.name:''" class="mt-2" />
                <input 
                    type="text" 
                    v-model="form.name" 
                    placeholder="Nome Ricetta *Obbligatorio*"
                    class="block w-full mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >

                <InputError :message="form.errors.description?errors.description:''" class="mt-2" />
                <textarea
                    v-model="form.description"
                    placeholder="Breve Descrizione max 100 caratteri"
                    class="block w-full mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                ></textarea>

                <InputError :message="form.errors.image_path?errors.image_path:''" class="mt-2" />
                <input 
                    type="text" 
                    v-model="form.image_path" 
                    placeholder="Path Immagine - Opzionale"
                    class="block w-full mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >
                <!-- Duration -->
                <InputError :message="form.errors.duration?errors.duration:''" class="mt-2" />
                <input 
                    type="number" 
                    v-model="form.duration" 
                    min="0"
                    max="720"
                    placeholder="Durata Ricetta in Minuti"
                    class="inline-block w-64 mb-2 border-gray-300 rounded-md shadow-sm me-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >
                <!-- Difficulties -->
                <InputError :message="form.errors.difficulty_id?errors.difficulty_id:''" class="mt-2" />
                <select v-model="form.difficulty_id" class="inline-block w-64 mb-2 border-gray-300 rounded-md shadow-sm me-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                    <option  :value=null>Seleziona Difficoltà</option>
                    <template v-for="(difficulty,index) in difficulties" :key="index">
                        <option :value="difficulty.id">{{ difficulty.name }}</option>
                    </template>
                </select>

                <!-- Meal Types -->
                <InputError :message="form.errors.meal_type_id?errors.meal_type_id:''" class="mt-2" />
                <select v-model="form.meal_type_id" class="inline-block w-64 mb-2 border-gray-300 rounded-md shadow-sm me-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                    <option :value=null>Seleziona Tipo Di Pietanza</option>
                    <template v-for="(mealType,index) in mealTypes" :key="index">
                        <option :value="mealType.id">{{ mealType.name }}</option>
                    </template>
                </select>

                <!-- Cuisines -->
                <InputError :message="form.errors.cuisine_id?errors.cuisine_id:''" class="mt-2" />
                <select v-model="form.cuisine_id" class="inline-block w-64 mb-2 border-gray-300 rounded-md shadow-sm me-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                    <option :value=null>Seleziona Tipo di Cucina</option>
                    <template v-for="(cuisine,index) in cuisines" :key="index">
                        <option :value="cuisine.id">{{ cuisine.name }}</option>
                    </template>
                </select>
                <div>
                    <PrimaryButton class="mt-4 ">Crea Ricetta</PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped lang="scss">

</style>