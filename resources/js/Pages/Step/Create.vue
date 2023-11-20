
<script setup>
import {Head, useForm, usePage} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { ref } from 'vue';
import { computed } from 'vue';

const message = 'Ancora nessun passaggio per questa Ricetta, aggiungi il primo!';
defineProps([
    'recipe',
    'steps',
    'actionTypes',
]);

const recipeId = ref(usePage().props.recipe.id);
const initialStepsLength = usePage().props.steps.length;
let addedSteps = 0;

const form = useForm({    
    step_number: initialStepsLength,
    description: null,
    action_type_id: null,
    recipe_id: recipeId.value,
});

const errors = ref({
    description: 'Descrizione Obbligatoria',
    action_type_id: 'Seleziona un Azione valida o non mettere niente',
});

//methods
function incrementStepAtSubmit(){
    addedSteps++;
}

function setNewForm(){
    incrementStepAtSubmit();
    form.reset();
    form.step_number = initialStepsLength + addedSteps;
}


</script>

<template>
    <Head title="Passaggi della Ricetta" />
    <AuthenticatedLayout>
        <!-- debug -->
        <!-- {{ recipe }} -->
        <!-- <div v-if="form">
            next form step_number: {{ form.step_number }}
            <br/>
            initialStepsLenght: {{ initialStepsLength }}
            <br>
            added {{ addedSteps }}
         </div> -->
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
    

            <!-- existing steps -->
            <!-- if no steps show a message -->
            <div v-if="steps.length==0">
                {{ message }}
            </div>
            <div v-else="steps" >
                <!-- {{ steps }} -->
               <template v-for="(step, index) in steps" :key="index">
                <div class="block w-full mb-2 border-gray-300 rounded-md shadow-sm focus:border-black-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    {{ index + 1 }}.
                    <!-- {{ step.action_type_id != null ? actionTypes[step.action_type_id - 1].name:'Passaggio' }} -->
                    {{ step.action_type_id != null ? actionTypes.filter(actionType => actionType.id == step.action_type_id)[0].name:'Passaggio' }}
                    <p class="ms-4">
                        {{ step.description }}
                    </p>
                </div>
               </template>
            </div>
            <!-- step form -->
           
            <div class="mt-3 step-number">
                Passaggio Numero {{ steps.length + 1}}
            </div>
            <form @submit.prevent="form.post(route('step.store'),  { onSuccess: () =>  setNewForm() })">
             
                <!-- Action Type -->
                <select v-model="form.action_type_id" class="inline-block w-64 mb-2 border-gray-300 rounded-md shadow-sm me-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                    <option :value=null>Scegli Azione</option>
                    <template v-for="(actionType, index) in actionTypes" :key="index">
                        <option :value="actionType.id">{{ actionType.name }}</option>
                    </template>
                </select>
                <InputError :message="form.errors.action_type_id?errors.action_type_id:''" class="mt-2" />
                
                <textarea
                v-model="form.description"
                placeholder="Descrivi il passaggio, max 800 caratteri"
                class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                ></textarea>
                <InputError :message="form.errors.description?errors.description:''" class="" />

                
                <div>
                    <PrimaryButton class="mt-4 ">Aggiungi Step</PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped lang="scss">

</style>