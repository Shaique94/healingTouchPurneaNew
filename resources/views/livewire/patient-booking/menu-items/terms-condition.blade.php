<div class="bg-beige-100 ">
    <div class="bg-white text-beige-600 py-12 md:py-16"> <!-- Reduced padding -->
        <div class="container mx-auto px-4 md:px-6 text-center"> <!-- Added responsive padding -->
            <div class="flex justify-center mb-4 mt-10">
                <svg class="h-12 w-12 text-beige-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h1 class="text-5xl font-bold">Terms & Conditions</h1>
        </div>
    </div>

    <div class="container mx-auto px-4 md:px-6 py-8 md:py-12"> <!-- Adjusted container padding -->
        <div class="max-w-4xl mx-auto bg-white p-6 md:p-8 lg:p-10 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl">
            <section class="mb-8"> <!-- Reduced section margin -->
                <h2 class="text-3xl font-semibold text-beige-600 mb-4 flex items-center">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    1. Introduction
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Welcome to {{ htmlspecialchars($settings['hospital_name'] ?? 'Healing Touch Hospital') }} . These Terms of Service ("Terms") govern your use of our website, services, and facilities. By accessing or using our website or services, you agree to be bound by these Terms. If you do not agree, please do not use our services.
                </p>
            </section>

            <section class="mb-8"> <!-- Reduced section margin -->
                <h2 class="text-3xl font-semibold text-beige-600 mb-4 flex items-center">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    2. Use of Services
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    You agree to use our services only for lawful purposes and in accordance with these Terms. You must not:
                </p>
                <ul class="list-disc pl-6 text-gray-700 mt-3 space-y-2"> <!-- Added space between list items -->
                    <li>Use our services in a way that violates any applicable laws or regulations.</li>
                    <li>Attempt to gain unauthorized access to our systems or networks.</li>
                    <li>Interfere with the proper functioning of our website or services.</li>
                </ul>
            </section>

            <section class="mb-8"> <!-- Reduced section margin -->
                <h2 class="text-3xl font-semibold text-beige-600 mb-4 flex items-center">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    3. Medical Services
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    {{ htmlspecialchars($settings['hospital_name'] ?? 'Healing Touch Hospital') }} provides medical services in accordance with applicable healthcare regulations. We do not guarantee specific outcomes for medical treatments. All medical advice should be followed under the supervision of our licensed professionals.
                </p>
            </section>

            <section class="mb-8"> <!-- Reduced section margin -->
                <h2 class="text-3xl font-semibold text-beige-600 mb-4 flex items-center">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    4. Patient Responsibilities
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    As a patient or user, you are responsible for:
                </p>
                <ul class="list-disc pl-6 text-gray-700 mt-3 space-y-2"> <!-- Added space between list items -->
                    <li>Providing accurate and complete information during registration and consultations.</li>
                    <li>Complying with medical advice and treatment plans provided by our staff.</li>
                    <li>Paying all applicable fees for services rendered.</li>
                </ul>
            </section>

            <section class="mb-8"> <!-- Reduced section margin -->
                <h2 class="text-3xl font-semibold text-beige-600 mb-4 flex items-center">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    5. Intellectual Property
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    All content on our website, including text, images, and logos, is the property of {{ htmlspecialchars($settings['hospital_name'] ?? 'Healing Touch Hospital') }} or its licensors and is protected by intellectual property laws. You may not reproduce, distribute, or modify any content without our prior written consent.
                </p>
            </section>

            <section class="mb-8"> <!-- Reduced section margin -->
                <h2 class="text-3xl font-semibold text-beige-600 mb-4 flex items-center">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    6. Limitation of Liability
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    To the fullest extent permitted by law, {{ htmlspecialchars($settings['hospital_name'] ?? 'Healing Touch Hospital') }} shall not be liable for any indirect, incidental, or consequential damages arising from your use of our services or website. Our liability is limited to the amount paid for the specific service.
                </p>
            </section>

            <section class="mb-8"> <!-- Reduced section margin -->
                <h2 class="text-3xl font-semibold text-beige-600 mb-4 flex items-center">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    7. Changes to Terms
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    We may update these Terms from time to time. Any changes will be posted on this page with an updated "Last Updated" date. Your continued use of our services after such changes constitutes your acceptance of the new Terms.
                </p>
            </section>

            <section class="mb-8"> <!-- Reduced section margin -->
                <h2 class="text-3xl font-semibold text-beige-600 mb-4 flex items-center">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    8. Contact Us
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    If you have any questions about these Terms, please contact us at:
                </p>
                <ul class="mt-3 space-y-2 text-gray-700"> <!-- Adjusted spacing -->
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-beige-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ htmlspecialchars($settings['hospital_name'] ?? 'Healing Touch Hospital') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-beige-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ htmlspecialchars($settings['address'] ?? 'Hope Chauraha, Rambagh Road, Linebazar, Purnea 854301') }}
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-beige-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <a href="mailto:{{ htmlspecialchars($settings['contact_email'] ?? 'info@healingtouchpurnea.com') }}" class="hover:text-beige-600">{{ htmlspecialchars($settings['contact_email'] ?? 'info@healingtouchpurnea.com') }}</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-beige-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <a href="tel:{{ htmlspecialchars($settings['contact_phone'] ?? '+91 9471659700') }}" class="hover:text-beige-600">{{ htmlspecialchars($settings['contact_phone'] ?? '+91 9471659700') }}</a>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</div>