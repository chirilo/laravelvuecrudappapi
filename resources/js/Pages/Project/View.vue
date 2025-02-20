<script setup>
//import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    project : Object
});

</script>
<template>
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
</template>