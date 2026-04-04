<x-app-layout>
    {{-- HERO SECTION --}}
    <section
        class="relative flex min-h-screen items-center justify-center text-white before:absolute before:inset-0 before:z-0 before:bg-black/50"
        style="background-image: url('https://images.pexels.com/photos/8500417/pexels-photo-8500417.jpeg?cs=srgb&dl=pexels-rdne-8500417.jpg&fm=jpg&w=1280&h=853'); background-size: cover; background-position: bottom center; background-repeat: no-repeat; background-attachment: fixed;">
        <div class="wrapper relative z-10 mt-36 flex max-w-4xl flex-col justify-center gap-12">
            <h1 class="text-center text-4xl font-bold text-white">
                طلب استكمال الدفع
            </h1>
            <div class="text-center">
                <p>يتيح هذا النموذج لمتدربي معهد المسار الاحترافي طلب استكمال الدفع للدورات التدريبية التي تمت الموافقة
                    عليها مسبقًا.</p>
            </div>
            <div>
                <livewire:payment-request-form />
            </div>
        </div>
    </section>

</x-app-layout>
