<section class="bg-white py-16 px-4 md:px-12 lg:px-24">
    <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">About Healing Touch Hospital</h1>
        <p class="text-lg text-gray-600 mb-12">
            At Healing Touch Hospital, we are committed to providing compassionate, high-quality healthcare with a focus on patient well-being and comfort.
        </p>
    </div>

    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
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

    <div class="max-w-6xl mx-auto mt-20 text-center">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Need Medical Assistance?</h3>
        <a href="{{ route('contact.page') }}" class="inline-block mt-4 px-6 py-3 bg-blue-600 text-white font-medium rounded-full shadow hover:bg-blue-700 transition">
            Contact Us
        </a>
    </div>
</section>
