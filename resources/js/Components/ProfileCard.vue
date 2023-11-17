<script setup>
    import {  usePage } from '@inertiajs/vue3';
    const user = usePage().props.auth.user;
</script>

<template>
    <div class="profile-card">
        <div class="image-wrapper">
            <img class="image" :src="user.profile_picture_path " :alt="user.name">
        </div>
        <div class="name">
            {{ user.name }}
        </div>
        <div class="description">
            <em>
                {{ user.description }}
            </em>
        </div>
    </div>
   
</template>
<style scoped lang="scss">
    .profile-card{
        width: calc(100% / 3 - 30px);
        margin: 15px;
        padding: 15px;
        border: 1px solid black;
        border-radius: 15px;
        text-align: center;
            .image-wrapper{
                width: 100%;
                margin: auto;
                .image{
                    width:100%;
                    border-radius: 10px;
                }
            }
            .name{
                font-size: 2rem;
            }
            .description{
                font-size: 1.2rem;
                margin-bottom: 10px;
            }

            .name ,
            .image-wrapper,
            .duration, 
            .difficulty,
            .meal-type,
            .cuisine {
                margin: 5px 0 5px 0;
            }

        }
</style>