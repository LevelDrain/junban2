<script setup>
import { reactive } from 'vue';
import { Head, router } from '@inertiajs/vue3';

defineProps({
    errors: Object,
})

const form = reactive({
    patient_id: null,
})

const submit = async () => {
    try {
        await axios.get('/sanctum/csrf-cookie');
        router.post(route('waitings.store'), form);
    } catch (error) {
        console.error('Error fetching CSRF cookie:', error);
        return;
    }
}
</script>

<template>

    <Head title="予約受付" />

    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
                    <div
                        class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:m-auto w-full mt-10 md:mt-0">
                        <h2 class="text-gray-900 text-lg font-medium title-font mb-5">予約受付</h2>
                        <form @submit.prevent="submit">
                            <div class="relative mb-4">
                                <label for="patient_id" class="leading-7 text-sm text-gray-600">診察券番号</label>
                                <input type="number" id="patient_id" name="patient_id" v-model="form.patient_id"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <p class="text-red-600 mt-3">{{ errors.patient_id }}</p>
                            </div>
                            <button
                                class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信する</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
