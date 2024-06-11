<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props=defineProps({
    'waitings':Array
})

</script>

<template>
    <Head title="順番待ちリスト" />

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-10">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">現在{{waitings.length}}人</h1>
            </div>

            <div class="flex pl-4 mb-4 lg:w-2/3 w-full mx-auto">
                <Link :href="route('waitings.top')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">トップへ戻る</Link>
            </div>

            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-3 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">受付番号</th>
                            <th class="px-3 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">あと</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(waiting, index) in waitings" :key="index">
                        <td class="px-3 py-3">{{ waiting.order_id }}</td>
                        <td class="px-3 py-3">あと{{ index }}人</td>
                        <td class="px-4 py-3" v-if="waiting.order_num==1">待っています</td>
                        <td class="px-4 py-3" v-if="waiting.order_num==2">診察中</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</template>
