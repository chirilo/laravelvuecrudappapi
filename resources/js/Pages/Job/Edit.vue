<script setup>
//import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
//import TextArea from '@/Components/TextArea.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';


const props = defineProps({
    job : Object
});

const form = useForm({
    id: props.job.id,
    jname: props.job.jname,
    jslug: props.job.jslug,
    jserial: props.job.jserial,
    jdescription : props.job.jdescription,
});

const submit = () => {
     form.put(route("jobs.update", props.job.id));
};
</script>
<template>
    <Head title="Edit JOb" />

    <!-- <AuthenticatedLayout> -->
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Job</h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div>
                    <a href="/jobs/"> <- Back to Jobs List</a>
                </div>
                <section>
                    <form @submit.prevent="submit" class="mt-6 space-y-6">
                        <div>
                            <InputLabel for="jname" value="Jname" />

                            <TextInput
                                id="jname"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.jname"
                                required
                                autofocus
                            />

                            <InputError class="mt-2" :message="form.errors.jname" />
                        </div>

                        <div>
                            <InputLabel for="jslug" value="JSlug" />

                            <TextInput
                                id="jslug"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.jslug"
                                required
                            />

                            <InputError class="mt-2" :message="form.errors.jslug" />
                        </div>
                        <div>
                            <InputLabel for="jserial" value="JSerial" />

                            <TextInput
                                id="jserial"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.jserial"
                                required
                            />

                            <InputError class="mt-2" :message="form.errors.jserial" />
                        </div>
                        <div>
                            <InputLabel for="jdescription" value="JDescription" />

                            <TextInput
                                id="jdescription"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.jdescription"
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
</template>