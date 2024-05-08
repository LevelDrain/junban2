<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="JunNavi" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="text-gray-600 body-font">
                    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                        </svg>
                        <span class="ml-3 text-xl">くまくま病院</span>
                        </a>

                        <nav v-if="canLogin" class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                            <Link
                                v-if="$page.props.auth.user"
                                :href="route('dashboard')"
                                class="mr-5 hover:text-gray-900"
                            >
                                Dashboard
                            </Link>

                            <template v-else>
                                <Link
                                    v-if="canLogin"
                                    :href="route('login')"
                                    class="mr-5 hover:text-gray-900"
                                >
                                    管理者ログイン
                                </Link>
                            </template>
                        </nav>
                    </div>
                </header>

                <main class="mt-6">
                    <div class="container mx-auto flex px-5 py-12 items-center justify-center flex-col">
                        <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                        <div class="text-center lg:w-2/3 w-full">
                        <p class="mb-8 leading-relaxed">株式会社アイソルのアプリケーション「<a href="https://www.ai-sol.jp/product/junnavi/" target="_blank">JunNavi</a>」を元に自主制作した当日順番・日時予約システムです。</p>
                        <div class="flex justify-center">
                            <Link :href="route('waitings.create')" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">予約する</Link>
                            <button class="ml-4 inline-flex text-gray-700 bg-indigo-100 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-200 rounded text-lg">順番を見る</button>
                        </div>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">

                </footer>
            </div>
        </div>
    </div>
</template>
