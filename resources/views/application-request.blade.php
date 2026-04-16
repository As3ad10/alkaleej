<x-app-layout>
    {{-- HERO SECTION --}}
    <section
        class="relative flex min-h-screen items-center justify-center text-white before:absolute before:inset-0 before:z-0 before:bg-black/50"
        style="background-image: url('https://images.pexels.com/photos/2675061/pexels-photo-2675061.jpeg?cs=srgb&dl=pexels-didsss-2675061.jpg&fm=jpg&w=1280&h=1920'); background-size: cover; background-position: bottom center; background-repeat: no-repeat; background-attachment: fixed;">
        <div class="wrapper relative z-10 mt-36 flex max-w-4xl flex-col justify-center gap-12">
            <h2 class="text-center text-3xl font-bold text-white">
                نموذج اصدار مشهد
            </h2>
            {{-- <div class="text-center">
                <p>
                    يُتيح معهد المسار الاحترافي، المعتمد من الجهات الرسمية، للمتدربين في مختلف القطاعات الاستفادة من
                    خدماتنا التدريبية المتخصصة بكل سهولة ويسر.
                </p>

            <h3>هدف النموذج:</h3>

            <ul>
                <li>تسهيل عملية استقبال الطلبات لموظفي القطاعات المختلفة.</li>
                <li>رفع جودة الخدمة المقدمة للمتدربين في المجالات الأكاديمية والتدريبية المتنوعة.</li>
                <li>تسريع إجراءات التسجيل في الدورات التدريبية أو إصدار الخطابات اللازمة.</li>
            </ul>

            <h3>لضمان الموثوقية:</h3>

            <p>الموظف المسؤول: <strong>سالم الكثيري</strong></p>

            <p>البريد الإلكتروني الرسمي:
                <a href="mailto:salem.alkatheri@newhorizons.com.sa">
                    salem.alkatheri@newhorizons.com.sa
                </a>
            </p>

            <p>رقم التواصل المباشر عبر واتساب:
                <a href="https://wa.me/966500303750">
                    0500303750
                </a>
            </p>

            <p>
                لأي استفسار أو دعم، يرجى التواصل معنا عبر البيانات المذكورة أعلاه.
            </p>
        </div> --}}
            <div>
                <livewire:application-form />
            </div>
        </div>
    </section>

</x-app-layout>
