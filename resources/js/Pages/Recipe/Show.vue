<script setup>

defineProps([
    'recipe',
])

</script>

<template>
{{ recipe }}
{{ recipe.steps }}
</template>