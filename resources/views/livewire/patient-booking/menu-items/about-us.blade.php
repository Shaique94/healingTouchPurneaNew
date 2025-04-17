<section class="bg-white py-16 px-4 md:px-12 lg:px-24">
    <div class="max-w-6xl mx-auto text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">About Healing Touch Hospital</h1>
        <p class="text-lg text-gray-600 mb-12">
            At Healing Touch Hospital, we are committed to providing compassionate, high-quality healthcare with a focus on patient well-being and comfort.
        </p>
    </div>

    <!-- Mission & Services Section -->
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 mb-16 items-center">
        <div>
            <img src="{{ asset('images/heroImageHt.jpg') }}" alt="Healing Touch Hospital" class="rounded-2xl shadow-md w-full">
        </div>
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Mission</h2>
            <p class="text-gray-600 mb-4">
                Our mission is to deliver exceptional medical care with a human touch. We aim to create a healing environment where every patient is treated with dignity, respect, and empathy.
            </p>

            <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">Our Services</h2>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>24/7 Emergency Care</li>
                <li>Advanced Diagnostics & Imaging</li>
                <li>Specialized Surgical Services</li>
                <li>Maternity & Childcare</li>
                <li>Outpatient & Inpatient Services</li>
                <li>Wellness & Preventive Programs</li>
            </ul>
        </div>
    </div>

    <!-- Female Problem Specialist Section -->
    <div class="max-w-6xl mx-auto mt-20 mb-16 grid md:grid-cols-2 gap-12 items-center">
   
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Female Problem Specialist</h2>
            <p class="text-gray-600 mb-4">
                Our Female Problem Specialist is dedicated to providing compassionate care for women’s health. From hormonal imbalances to reproductive concerns, our expert team ensures every woman’s health is addressed with the utmost care, sensitivity, and understanding.
            </p>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>Menstrual disorders</li>
                <li>Polycystic Ovary Syndrome (PCOS)</li>
                <li>Pregnancy care</li>
                <li>Fibroids & cysts</li>
                <li>Menopause support</li>
                <li>Fertility treatments & counseling</li>
            </ul>
        </div>
        <div>
            <img src="{{ asset('images/hospital4.jpg') }}" alt="Female Problem Specialist" class="rounded-2xl shadow-md w-full">
        </div>
    </div>

    <!-- Surgery Specialist Section -->
    <div class="max-w-6xl mx-auto mt-20 mb-16 grid md:grid-cols-2 gap-12 items-center">
    <div>
            <img src="{{ asset('images/hospital3.jpg') }}" alt="Surgery Specialist" class="rounded-2xl shadow-md w-full">
        </div>
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Surgery Specialist</h2>
            <p class="text-gray-600 mb-4">
                Our Surgery Specialist team is equipped with the latest medical technology and a wealth of experience to handle a wide range of surgical procedures. Whether it’s a routine operation or a complex surgery, you can trust our skilled surgeons for safe, effective treatment.
            </p>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>Minimally invasive surgeries</li>
                <li>Orthopedic surgeries</li>
                <li>General & laparoscopic surgeries</li>
                <li>Cardiac surgeries</li>
                <li>Neurosurgery</li>
                <li>Cosmetic & reconstructive surgery</li>
            </ul>
        </div>
        
    </div>

    <!-- Core Values Section -->
    <div class="max-w-4xl mx-auto mt-20 mb-16 text-center">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Core Values</h2>
        <p class="text-gray-600 mb-8">
            At the heart of everything we do is our commitment to putting patients first. Our values guide us in delivering world-class care and support for every individual who walks through our doors.
        </p>
        <div class="grid md:grid-cols-3 gap-8 text-left">
            <div class="p-6 bg-gray-50 rounded-xl shadow hover:shadow-md transition">
                <h4 class="font-semibold text-lg text-gray-800 mb-2">Compassion</h4>
                <p class="text-gray-600">We treat every patient with kindness and understanding, offering care that heals both body and mind.</p>
            </div>
            <div class="p-6 bg-gray-50 rounded-xl shadow hover:shadow-md transition">
                <h4 class="font-semibold text-lg text-gray-800 mb-2">Integrity</h4>
                <p class="text-gray-600">Our commitment to ethical practices ensures transparency in treatment, billing, and communication.</p>
            </div>
            <div class="p-6 bg-gray-50 rounded-xl shadow hover:shadow-md transition">
                <h4 class="font-semibold text-lg text-gray-800 mb-2">Excellence</h4>
                <p class="text-gray-600">We constantly strive to improve our services, invest in advanced technology, and uphold the highest standards in healthcare.</p>
            </div>
        </div>
    </div>

    <!-- Team Introduction -->
    <div class="max-w-6xl mx-auto mt-20 mb-16 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <img src="{{ asset('images/hospital4.jpg') }}" alt="Experienced Medical Team" class="rounded-2xl shadow-md w-full">
        </div>
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">A Team You Can Trust</h2>
            <p class="text-gray-600 mb-4">
                Our team of experienced medical professionals, nurses, and staff are dedicated to delivering expert care with warmth and empathy. Whether you're visiting for a routine check-up or specialized treatment, you can be assured you're in safe hands.
            </p>
            <p class="text-gray-600">
                At Healing Touch, healthcare is not just a profession — it’s a calling. We are proud to be part of your health journey.
            </p>
        </div>
    </div>

    <!-- Final Call-to-Action -->
    <div class="max-w-6xl mx-auto mt-20 mb-16 text-center">
        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Ready to Prioritize Your Health?</h3>
        <p class="text-gray-600 mb-6">Book an appointment or visit us for compassionate, expert care today.</p>
        <a href="{{ route('contact.page') }}" class="inline-block px-8 py-3 bg-beige-600 text-white font-medium rounded-full shadow hover:bg-beige-700 transition">
            Contact Us
        </a>
    </div>
</section>
