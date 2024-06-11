<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    errors: Object,
    patients: Array,
})

const deleteOrder = (patient_id) => {
    router.delete(route('waitings.destroyWithoutId', patient_id))
}

</script>

<template>

    <Head title="患者さん情報管理" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">患者さん情報管理</h2>
        </template>

        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 py-10 lg:max-w-7xl">

                    <div class="container px-5 pb-28 mx-auto flex justify-center items-center">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                                <tr>
                                    <th
                                        class="px-3 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                        診察券番号</th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                        氏名</th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                        順番待ち番号</th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                        ステータス</th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                    </th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="patient in patients" :key="patient.id">
                                    <td class="px-3 py-3">{{ patient.patient_id }}</td>
                                    <td class="px-4 py-3">{{ patient.name }}</td>
                                    <td class="px-4 py-3">{{ patient.order_id }}</td>
                                    <td class="px-4 py-3" v-if="patient.order_num == null">-</td>
                                    <td class="px-4 py-3" v-if="patient.order_num == 1">待っています</td>
                                    <td class="px-4 py-3" v-if="patient.order_num == 2">診察中</td>
                                    <td class="px-4 py-3" v-if="patient.order_num == 3">保留</td>
                                    <td class="px-4 py-3">
                                        <Link :href="route('patients.show', patient.id)">更新する</Link>
                                    </td>
                                    <td class="px-4 py-3"><button type="button"
                                            @click="deleteOrder(patient.patient_id)">予約をキャンセル</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
