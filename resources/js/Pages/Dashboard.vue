<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, Link } from '@inertiajs/vue3';
import ProfileCard from '@/Components/ProfileCard.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';


const user = usePage().props.auth.user;

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profilo Cuoco</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white flex justify-center  overflow-hidden shadow-sm sm:rounded-lg">

                    <Link  :href="route('profile.edit')" :active="route().current('dashboard')">
                        <PrimaryButton class="mt-2" >MODIFICA</PrimaryButton>
                    </Link>
                    
                    <ProfileCard ></ProfileCard>
                    

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
