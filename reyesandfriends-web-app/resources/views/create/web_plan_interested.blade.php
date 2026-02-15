@extends('layout.app')

@section('title', 'Reyes&Friends - Me interesa este plan web')
@section('description', 'Completa tus datos para que te contactemos sobre el plan web que te interesa. Soluciones digitales innovadoras y personalizadas.')
@section('keywords', 'planes web, contacto, interesado, desarrollo web, diseño web, soluciones digitales, chile')

@section('content')
	<section class="py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-screen-xl max-md:max-w-xl mx-auto bg-black py-8 px-12 rounded-lg shadow-lg" data-aos="zoom-in" data-aos-duration="1200">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-y-12 gap-x-8 lg:gap-x-12">
                    <div class="lg:col-span-2">
                        <div>
                            <h2 class="text-2xl text-white font-semibold mb-6 text-center" data-aos="fade-down" data-aos-delay="200">Cotizar Plan Web</h2>
                            <p class="text-white mb-6" data-aos="fade-up" data-aos-delay="400">Con esta información podremos contactarte y procesar tu solicitud de manera eficiente.</p>
                                <h2 class="text-2xl text-white font-semibold mb-6 text-center" data-aos="fade-down" data-aos-delay="200" data-aos-easing="ease-in-out" data-aos-duration="1200">Cotizar Plan Web</h2>
                                <p class="text-white mb-6" data-aos="fade-up" data-aos-delay="400" data-aos-easing="ease-in-out" data-aos-duration="1200">Con esta información podremos contactarte y procesar tu solicitud de manera eficiente.</p>
                            <form id="web-plan-interested-form" autocomplete="off" novalidate action="{{ route('web_plans.interest_store', $webPlan->slug) }}" method="POST" data-aos="zoom-in" data-aos-delay="600">
                                @csrf
                                <div class="grid lg:grid-cols-2 gap-y-6 gap-x-4">
                                    <div class="col-span-1">
                                        <label for="first_name" class="block text-gray-300 font-bold mb-2">Nombre (requerido)</label>
                                        <input type="text" id="first_name" name="first_name" maxlength="50" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Ingresa tu nombre" required />
                                        <p id="error_first_name" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
                                    </div>
                                    <div class="col-span-1">
                                        <label for="last_name" class="block text-gray-300 font-bold mb-2">Apellido (requerido)</label>
                                        <input type="text" id="last_name" name="last_name" maxlength="50" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Ingresa tu apellido" required />
                                        <p id="error_last_name" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
                                    </div>
                                    <div class="col-span-1">
                                        <label for="email" class="block text-gray-300 font-bold mb-2">Correo electrónico (requerido)</label>
                                        <input type="email" id="email" name="email" maxlength="100" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Ingresa tu correo electrónico" required />
                                        <p id="error_email" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
                                    </div>
                                    <div class="col-span-1">
                                        <label for="cellphone" class="block text-gray-300 font-bold mb-2">Número de Teléfono (opcional)</label>
                                        <div class="flex">
                                            <span class="inline-flex items-center px-3 rounded-l-sm bg-zinc-700 text-white border border-r-0 border-zinc-700 select-none">+56</span>
                                            <input type="tel" id="cellphone" name="cellphone" maxlength="9" minlength="9" class="w-full p-3 rounded-r-sm bg-zinc-800 text-white border border-zinc-700 border-l-0 focus:outline-none focus:ring-2 focus:ring-red-700 text-sm" placeholder="912345678" pattern="[0-9]{9}" inputmode="numeric" />
                                        </div>
                                        <p id="error_cellphone" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
                                    </div>
                                    <div class="lg:col-span-2 mt-6">
                                        <button id="submit-btn" type="submit" class="w-full bg-gray-500 text-white font-bold py-3 px-8 rounded text-lg transition cursor-not-allowed" disabled>Enviar Solicitud</button>
                                    </div>
                                </div>
                            </form>
						</div>
					</div>
					<div class="relative">
						<h2 class="text-xl text-white font-semibold mb-6">Resumen de la Orden</h2>
                        <img src="{{ $webPlan->images[0]->image_url }}" alt="Mockup del plan {{ $webPlan->name }}" class="rounded shadow-xl w-full h-48 object-cover pointer-events-none" />
                        <div class="mt-4">
                            <h3 class="text-lg text-white font-semibold text-center">Plan <span class="text-red-700">{{ $webPlan->name }}</span></h3>
                            <p class="text-gray-300 mt-2">{{ $webPlan->description }}</p>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('web-plan-interested-form');
        const submitBtn = document.getElementById('submit-btn');
        const fields = {
            first_name: {
                required: true,
                validator: value => value.trim().length > 0,
                error: 'El nombre es obligatorio.'
            },
            last_name: {
                required: true,
                validator: value => value.trim().length > 0,
                error: 'El apellido es obligatorio.'
            },
            email: {
                required: true,
                validator: value => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
                error: 'Correo electrónico inválido.'
            },
            cellphone: {
                required: false,
                validator: value => value === '' || (/^\d{9}$/.test(value)),
                error: 'El número debe tener 9 dígitos.'
            }
        };

        function validateField(field, value) {
            if (fields[field].required && !fields[field].validator(value)) {
                return fields[field].error;
            }
            if (!fields[field].required && value && !fields[field].validator(value)) {
                return fields[field].error;
            }
            return '';
        }

        function updateErrors(showErrors) {
            let valid = true;
            Object.keys(fields).forEach(field => {
                const input = document.getElementById(field);
                const errorElem = document.getElementById('error_' + field);
                const errorMsg = validateField(field, input.value);
                errorElem.textContent = (showErrors && errorMsg) ? errorMsg : '';
                if (errorMsg) valid = false;
            });
            return valid;
        }

        function updateButtonState() {
            const isValid = updateErrors(false);
            if (isValid) {
                submitBtn.disabled = false;
                submitBtn.classList.remove('bg-gray-500', 'cursor-not-allowed');
                submitBtn.classList.add('bg-red-800', 'hover:bg-red-900', 'cursor-pointer');
            } else {
                submitBtn.disabled = true;
                submitBtn.classList.add('bg-gray-500', 'cursor-not-allowed');
                submitBtn.classList.remove('bg-red-800', 'hover:bg-red-900', 'cursor-pointer');
            }
        }

        Object.keys(fields).forEach(field => {
            const input = document.getElementById(field);
            input.addEventListener('input', updateButtonState);
            input.addEventListener('blur', updateButtonState);
        });

        form.addEventListener('submit', function (e) {
            const isValid = updateErrors(true);
            updateButtonState();
            if (!isValid) {
                e.preventDefault();
            }
        });

        updateButtonState();
    });
    </script>
@endpush
