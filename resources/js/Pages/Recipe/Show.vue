<script setup>
import {Head} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
defineProps([
    'recipe',
    'actionTypes'
])

</script>

<template>
<!-- {{ recipe }}
{{ recipe.steps }} -->

<Head :title=" recipe.name" />
    <AuthenticatedLayout>
       
        <div id="info-form-container" class="w-4/5 p-4 m-auto overflow-hidden bg-white shadow-sm recipe-info sm:rounded-lg">

            <div class="mb-5 text-center">
                <h1 class="">Nome: {{ recipe.name }}</h1>
                <h1 class="">Descrizione: {{ recipe.description == " "?'Nessuna descrizione' : recipe.description}}</h1>
                <h1 class="">Durata Preparazione: {{ recipe.duration }}</h1>
                <h1 class="">Punti Ricetta: {{ recipe.recipe_points }}</h1>
                <h1 class="">Difficoltà: {{ recipe.difficulty_id ?? "Difficoltà non selezionata" }}</h1>
                <h1 class="">Tipo Pietanza: {{ recipe.meal_type_id ?? "Tipo di pietanza non selezionato" }}</h1>
                <h1 class="">Tipo di Cucina: {{ recipe.cuisine_id ?? "Cucina non selezionata" }}</h1>
                <br>
                <div class="text-center steps">
                    <template v-for="(step,index) in recipe.steps" :key="index">
                        <div class="">
                            <div class="step-label">
                               Passaggio n.{{step.step_number + 1 }} 
                               <template v-if="step.action_type_id!=null" >
                                   <span class="mb-1 action-type"> 
                                        : {{actionTypes.filter(actionType=>actionType.id == step.action_type_id)[0].name }}
                                   </span>
                               </template>
                            </div>
                            
                           <p class="step-description ">
                            {{ step.description }}
                           </p>
                           <br>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    
</template>

<style lang="scss" scoped>
</style>