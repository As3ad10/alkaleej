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
        <div class="wrapper flex max-w-2xl flex-col gap-8">
            <h2 class="text-center text-3xl font-bold text-zinc-900">
                اصدار مشهد قبول
            </h2>
            <div class="text-center">
                <p>هذا النموذج يتيـح لـ معهد الخليج للتدريب والتعليم، أحد فروع شركة الخليج للتدريب والتعليم، والمعتمد من
                    الجهات الرسمية.</p>

                <p><strong>هدف النموذج:</strong></p>
                <ol>
                    <li>تسهيل عملية استقبال الطلبات - لموظفي القطاع العسكري</li>
                    <li>رفع جودة الخدمة المقدمة للعسكريين، في قطاعات "الدفاع الجوي - القوات البرية - القوات الجوية"</li>
                    <li>تسريع إجراءات اصدار الخطابات او التسجيل في الدورات.</li>
                </ol>

                <p><strong>لضمان الموثوقية:</strong></p>
                <ol>
                    <li>الموظف المسؤول: [الاسم]</li>
                    <li>البريد الإلكتروني الرسمي: [<a
                            href="mailto:salem.alkatheri@newhorizons.com.sa">salem.alkatheri@newhorizons.com.sa</a>]
                    </li>
                    <li>رقم التواصل المباشر واتساب: [0500303750]</li>
                </ol>

                <p>لأي استفسار أو دعم، يرجى التواصل عبر البيانات أعلاه.</p>
            </div>
            <div>
                <livewire:application-form />
            </div>
        </div>
    </section>

</x-app-layout>
