
<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref } from 'vue';
const actualStepNumber = ref(0);

defineProps([
    'recipe',
    'steps',
    'actionTypes',
]);

const form = useForm({    
    step_number: actualStepNumber.value,
    description: null,
    action_type_id: null,
});
const errors = ref({
    step_number: `Errore. Debug: lo step number è: ${actualStepNumber.value}`,
    description: 'Descrizione Obbligatoria',
    action_type_id: 'Seleziona un Azione valida o non mettere niente',
});

//methods
const incrementStepNumber = () =>{
    actualStepNumber.value++;
}
const resetForm = () => {
    form.reset();
}

const setupNewStepForm = () =>{
    resetForm();
    incrementStepNumber();
}

</script>

<template>
    <Head title="Passaggi della Ricetta" />
    <AuthenticatedLayout>
        <!-- {{ recipe }} -->
        <div id="info-form-container" class="w-4/5 p-4 m-auto overflow-hidden bg-white shadow-sm recipe-info sm:rounded-lg">

            <div class="mb-5">
                <h1 class="">Nome: {{ recipe.name }}</h1>
                <h1 class="">Descrizione: {{ recipe.description == " "?'Nessuna descrizione': recipe.description}}</h1>
                <h1 class="">Durata Preparazione: {{ recipe.duration }}</h1>
                <h1 class="">Punti Ricetta: {{ recipe.recipe_points }}</h1>
                <h1 class="">Difficoltà: {{ recipe.difficulty_id??"Difficoltà non selezionata" }}</h1>
                <h1 class="">Tipo Pietanza: {{ recipe.meal_type_id??"Tipo di pietanza non selezionato" }}</h1>
                <h1 class="">Tipo di Cucina: {{ recipe.cuisine_id??"Cucina non selezionata" }}</h1>
            </div>
    
            <!-- step form -->
            <!-- if no steps show a message -->
            <div>
                {{ Object.keys(steps) == 'message' ? steps['message'] : '' }}
            </div>
            <div class="mt-3 step-number">
                Passaggio Numero {{ form.step_number + 1 }}
            </div>
            <form @submit.prevent="form.post(route('step.store'),  { onSuccess: () => setupNewStepForm() })">
                <InputError :message="form.errors.step_number?errors.step_number:''" class="mt-2" />
                <input 
                    type="hidden" 
                    v-model="form.step_number" 
                    class="block w-full mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >

                <InputError :message="form.errors.description?errors.description:''" class="mt-2" />
                <textarea
                    v-model="form.description"
                    placeholder="Descrivi il passaggio, max 800 caratteri"
                    class="block w-full mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                ></textarea>

                <!-- Action Type -->
                <InputError :message="form.errors.action_type_id?errors.action_type_id:''" class="mt-2" />
                <select v-model="form.action_type_id" class="inline-block w-64 mb-2 border-gray-300 rounded-md shadow-sm me-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                    <option :value=null>Seleziona Tipo di Cucina</option>
                    <template v-for="(actionType, index) in actionTypes" :key="index">
                        <option :value="actionType.id">{{ actionType.name }}</option>
                    </template>
                </select>
                <div>
                    <PrimaryButton class="mt-4 ">Aggiungi Step</PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped lang="scss">

</style>