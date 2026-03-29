<x-app-layout>
    {{-- HERO SECTION --}}
    <section
        class="relative flex min-h-screen items-center justify-center text-white before:absolute before:inset-0 before:z-0 before:bg-black/50"
        style="background-image: url('https://alkhaleej.com.sa/wp-content/uploads/2024/02/cover-12-min.png'); background-size: cover; background-position: bottom center; background-repeat: no-repeat; background-attachment: fixed;">
        <div class="wrapper relative z-10 mt-36 flex max-w-4xl flex-col items-center justify-center gap-12">
            <h1 class="text-center text-4xl font-bold">
                قصة تروى عبر الأجیال
            </h1>
            <p class="text-center text-lg">على مدار أكثر من ثلاثين عامًا كانت الخليج للتدريب والتعليم الداعم الأساسي
                والدائم في حياة الالاف من خلال
                تقديم خبراتها في التعليم والتدريب والتطوير والتوظيف للأفراد والمؤسسات في المملكة العربية السعودية
                والعالم،
                ولاتزال حتى الآن الرفيق الأمثل في رحلة الإنسان إلى القمة.</p>
            <img src="https://alkhaleej.com.sa/wp-content/uploads/2024/02/4persons.svg" alt="4 persons" loading="lazy"
                class="w-full max-w-lg">
            <flux:button href="https://alkhaleej.com.sa/" target="_blank" icon:trailing="arrow-up-left" variant="primary"
                color="accent">
                اعرف المزيد
            </flux:button>
        </div>
    </section>

    {{-- FORMS SECTION --}}
    <section class="py-12">
        <div class="wrapper max-w-6xl">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card -->
                <div
                    class="bg-card border-card-line border-t-accent shadow-2xs flex flex-col rounded-xl border border-t-4">
                    <img class="h-auto w-full rounded-t-xl sm:rounded-se-none"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80"
                        alt="Card Image">
                    <div class="flex flex-col gap-2 p-4 md:p-5">
                        <h3 class="text-xl font-semibold text-slate-800">
                            طلب اصدار مشهد قبول
                        </h3>
                        <p class="text-muted-foreground-1 mt-2">
                            يتيح هذا النموذج لموظفي القطاع العسكري طلب اصدار مشهد قبول من معهد الخليج للتدريب والتعليم.
                        </p>
                        <a class="text-accent hover:text-accent-hover focus:outline-hidden focus:text-accent-focus mt-3 inline-flex items-center gap-x-1 rounded-lg border border-transparent font-semibold decoration-2 hover:underline focus:underline disabled:pointer-events-none disabled:opacity-50"
                            href="{{ route('application-request') }}">
                            طلب اصدار مشهد قبول
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div
                    class="bg-card border-card-line border-t-accent shadow-2xs flex flex-col rounded-xl border border-t-4">
                    <img class="h-auto w-full rounded-t-xl sm:rounded-se-none"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80"
                        alt="Card Image">
                    <div class="flex flex-col gap-2 p-4 md:p-5">
                        <h3 class="text-xl font-semibold text-slate-800">
                            طلب اصدار شهادة
                        </h3>
                        <p class="text-muted-foreground-1 mt-2">
                            يتيح هذا النموذج لموظفي القطاع العسكري طلب اصدار شهادة من معهد الخليج للتدريب والتعليم.
                        </p>
                        <a class="text-accent hover:text-accent-hover focus:outline-hidden focus:text-accent-focus mt-3 inline-flex items-center gap-x-1 rounded-lg border border-transparent font-semibold decoration-2 hover:underline focus:underline disabled:pointer-events-none disabled:opacity-50"
                            href="{{ route('certificate-request') }}">
                            طلب اصدار شهادة
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div
                    class="bg-card border-card-line border-t-accent shadow-2xs flex flex-col rounded-xl border border-t-4">
                    <img class="h-auto w-full rounded-t-xl sm:rounded-se-none"
                        src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80"
                        alt="Card Image">
                    <div class="flex flex-col gap-2 p-4 md:p-5">
                        <h3 class="text-xl font-semibold text-slate-800">
                            طلب استكمال الدفع
                        </h3>
                        <p class="text-muted-foreground-1 mt-2">
                            يتيح هذا النموذج لموظفي القطاع العسكري طلب استكمال الدفع للدورات التدريبية من معهد الخليج
                            للتدريب والتعليم.
                        </p>
                        <a class="text-accent hover:text-accent-hover focus:outline-hidden focus:text-accent-focus mt-3 inline-flex items-center gap-x-1 rounded-lg border border-transparent font-semibold decoration-2 hover:underline focus:underline disabled:pointer-events-none disabled:opacity-50"
                            href="{{ route('payment-request') }}">
                            طلب استكمال الدفع
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </section>

</x-app-layout>
