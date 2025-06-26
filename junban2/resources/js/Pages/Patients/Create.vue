<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive } from 'vue';
import { Head, router } from '@inertiajs/vue3';

defineProps({
    errors: Object,
})

const form = reactive({
    patient_id: null,
    name: null,
})

const submit = async () => {
    try {
        await axios.get('/sanctum/csrf-cookie');
        router.post(route('patients.confirm'), form);
    } catch (error) {
        console.error('Error fetching CSRF cookie:', error);
        return;
    }
}

</script>

<template>

    <Head title="個人情報の登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">個人情報の登録</h2>
        </template>

        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 py-10 lg:max-w-7xl">

                    <div class="container px-5 pb-28 mx-auto flex justify-center items-center">
                        <form @submit.prevent="submit">
                            <div class="relative mb-4">
                                <label for="patient_id" class="leading-7 text-sm text-gray-600">診察券番号</label>
                                <input type="number" id="patient_id" name="patient_id" v-model="form.patient_id"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <p class="text-red-600 mt-3">{{ errors.patient_id }}</p>
                            </div>
                            <div class="relative mb-4">
                                <label for="name" class="leading-7 text-sm text-gray-600">氏名</label>
                                <input type="text" id="name" name="name" v-model="form.name"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <p class="text-red-600 mt-3">{{ errors.name }}</p>
                            </div>
                            <div class="relative mb-4">
                                <div class="leading-7 text-sm text-gray-600">生年月日……</div>
                                <div class="leading-7 text-sm text-gray-600">※ 以下、他の個人情報は省略</div>
                            </div>

                            <button
                                class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded">送信する</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
