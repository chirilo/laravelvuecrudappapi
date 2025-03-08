<script setup>
//import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import Dropdown from '@/Components/Dropdown.vue';
import ExampleComponent from '@/Components/ExampleComponent.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';


import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';

const form = useForm({
    heading: '',
    slug: '',
    description : ''
});

const submit = () => {
    form.post(route("projects.store"));
};
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

        <Head title="Create Blog" />

    	<!-- <AuthenticatedLayout> -->
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Blog</h2>
        </template> -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            	<h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Project</h2>
        	</div>
        	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
				<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"><a :href="route('projects.index')" style="float: right;"> <- Back</a> </h2>
			</div>
    	</div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <section>
                    <form @submit.prevent="submit" class="mt-6 space-y-6">
                    	<div>
                            <InputLabel for="category" value="Category" />
                            <Dropdown 
                            	v-model="form.category" 
                            	:options="categories" 
                            	optionLabel="name" 
                            	placeholder="Select a City" 
                            	class="w-full md:w-14rem" 
                            />

                        </div>
                        <div>
                        	<ExampleComponent />
                        </div>
                        <div>
                            <InputLabel for="heading" value="Heading" />

                            <TextInput
                                id="heading"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.heading"
                                required
                                autofocus
                            />

                            <InputError class="mt-2" :message="form.errors.heading" />
                        </div>

                        <div>
                            <InputLabel for="slug" value="Slug" />

                            <TextInput
                                id="slug"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.slug"
                                required
                            />

                            <InputError class="mt-2" :message="form.errors.slug" />
                        </div>
                        <div>
                            <InputLabel for="description" value="Description" />

                            <TextArea
                                id="description"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.description"
                            />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                            <Transition
                                enter-active-class="transition ease-in-out"
                                enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out"
                                leave-to-class="opacity-0"
                            >
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    	<!-- </AuthenticatedLayout> -->
    </AppLayout>
</template>