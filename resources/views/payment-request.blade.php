<x-app-layout>
    {{-- HERO SECTION --}}
    <section
        class="relative flex min-h-screen items-center justify-center text-white before:absolute before:inset-0 before:z-0 before:bg-black/50"
        style="background-image: url('https://alkhaleej.com.sa/wp-content/uploads/2024/02/cover-12-min.png'); background-size: cover; background-position: bottom center; background-repeat: no-repeat; background-attachment: fixed;">
        <div class="wrapper relative z-10 mt-36 flex max-w-4xl flex-col justify-center gap-12">
            <h1 class="text-center text-4xl font-bold text-white">
                طلب استكمال الدفع
            </h1>
            <div class="text-center">
                <p>يتيح هذا النموذج لموظفي القطاع العسكري طلب استكمال الدفع للدورات التدريبية من معهد الخليج للتدريب
                    والتعليم.</p>
            </div>
            <div>
                <livewire:payment-request-form />
            </div>
        </div>
    </section>

</x-app-layout>
