<script setup>

defineProps({
    errors: Object,
    info: Object,
})
</script>

<template>
    <Head title="予約受付" />
        <div class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
                <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:m-auto w-full mt-10 md:mt-0">
                <h2 class="text-gray-900 text-lg font-medium title-font mb-5">予約が完了しました</h2>
                <p>ようこそ{{ info[0].name }}さん</p>
                </div>
            </div>
        </div>
</template>
