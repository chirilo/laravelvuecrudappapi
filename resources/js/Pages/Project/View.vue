<script setup>
//import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';

const props = defineProps({
    project : Object
});

</script>
<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>
        </template>

        <div class="py-12" style="display: none;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                </div>
            </div>
        </div>

        <Head :title="props.project.heading" />
        <!-- <AuthenticatedLayout> -->
        	<div class="py-12">
            	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    				<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"><a :href="route('projects.index')" style="float: right;"> <- Back to Projects List</a> </h2>
    			</div>
        	</div>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <h1 class="text-2xl">{{props.project.heading}}</h1>
                    <div>
                        {{props.project.description}}
                    </div>
                </div>
            </div>
        <!-- </AuthenticatedLayout> -->
    </AppLayout>
</template>