<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    errors: Object,
    info: Number,
})
</script>

<template>
    <Head title="予約受付" />

    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                <div class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
                        <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:m-auto w-full mt-10 md:mt-0">
                            <h2 class="text-gray-900 text-lg font-medium title-font mb-5">予約が完了しました</h2>
                            <p>受付番号{{ info }}で予約しました。</p>

                            <div class="flex justify-center mt-6">
                                <Link :href="route('waitings.index')" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                    順番を見る
                                </Link>
                                <!-- <Link :href="route('waitings.top')" class="ml-4 inline-flex text-gray-700 bg-indigo-100 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-200 rounded text-lg">
                                    最初に戻る
                                </Link> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
