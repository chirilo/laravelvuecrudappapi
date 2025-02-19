<script setup>
//import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    job : Object
});

</script>
<template>
    <Head :title="props.job.jname" />
    <!-- <AuthenticatedLayout> -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <h1 class="text-2xl">{{props.job.jname}}</h1>
                <div>
                    {{props.job.jdescription}}
                </div>
            </div>
        </div>
    <!-- </AuthenticatedLayout> -->
</template>