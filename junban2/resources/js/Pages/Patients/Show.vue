<script setup>
import { reactive } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';

const props = defineProps({
    errors: Object,
    patient_info: Array,
})

const form = reactive({
    name: props.patient_info.name,
    order_num: props.patient_info.order_num,
})

const submit = () => {
    router.put(route('patients.update', props.patient_info.id), form)
}

const deletePatientInfo = () => {
    router.delete(route('patients.destroy', props.patient_info.id), {
        preserveScroll: true,
    })
}

</script>

<template>

    <Head title="個人情報詳細" />

    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
                    <div
                        class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:m-auto w-full mt-10 md:mt-0">
                        <form @submit.prevent="submit">
                            <div class="relative mb-4">
                                <p class="leading-7 text-sm text-gray-600">{{ props.patient_info.patient_id }}</p>

                                <label for="name" class="leading-7 text-sm text-gray-600">氏名</label>
                                <input type="text" id="name" name="name" v-model="form.name"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <p class="text-red-600 mt-3">{{ errors.name }}</p>

                                <label for="status" class="leading-7 text-sm text-gray-600">待ち状況</label>
                                <select id="status" name="status" v-model="form.order_num"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option value="">-</option>
                                    <option value="1">待っています</option>
                                    <option value="2">診察中</option>
                                    <option value="3">保留</option>
                                </select>
                                <p class="text-red-600 mt-3">{{ errors.order_num }}</p>
                            </div>
                            <Link :href="route('patients.index')"
                                class="inline-block text-indigo-500 bg-white border-indigo-500 border-2 py-2 px-8 focus:outline-none hover:border-indigo-600 rounded text-lg">
                            戻る</Link>
                            <button type="submit"
                                class="ml-5 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                        </form>
                        <button type="button" @click="deletePatientInfo()"
                            class="mt-40 text-white bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">個人情報を削除する</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
