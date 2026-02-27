@extends('layout.app')

@section('title', 'Reyes&Friends - Contacto')
@section('description', 'Ponte en contacto con nosotros. Soluciones digitales innovadoras y personalizadas.')
@section('keywords', 'contacto, desarrollo web, diseño web, soluciones digitales, chile')

@section('content')
    <section class="relative w-full h-[70vh] flex items-center justify-center bg-cover bg-center overflow-hidden">
        <img src="{{ asset('img/background/background-web.jpg') }}" alt="Ilustración de fondo" class="absolute inset-0 w-full h-full object-cover pointer-events-none grayscale" />
        <div class="absolute inset-0 bg-red-950/90"></div>
			<div class="relative z-10 container mx-auto flex flex-col md:flex-row items-center h-full px-6 gap-8">
				<div class="w-full md:w-1/2 flex justify-center" data-aos="fade-right" data-aos-duration="1200">
					<img src="{{ asset('img/contact/ilustration.png') }}" alt="Solución digital" class="w-3/4 h-auto drop-shadow-xl pointer-events-none robot-fade-mask" />
				</div>
				<div class="w-full md:w-1/2 text-white space-y-6" data-aos="fade-left" data-aos-duration="1200">
					<h1 class="text-5xl md:text-6xl font-bold mb-4 drop-shadow-lg" data-aos="fade-down" data-aos-delay="200" data-aos-easing="ease-in-out" data-aos-duration="1200">Contacto</h1>
					<p class="text-lg md:text-xl text-gray-200 leading-relaxed font-medium" data-aos="fade-up" data-aos-delay="400" data-aos-easing="ease-in-out" data-aos-duration="1200">Estamos aquí para ayudarte. Si tienes alguna pregunta o inquietud, no dudes en ponerte en contacto con nosotros.</p>
				</div>
			</div>
    </section>

	<section class="py-16">
		<div class="container mx-auto px-6">
            <h2 class="text-3xl mb-12 text-center relative">
                <span class="bg-zinc-900 px-4 relative z-10 text-white">Envíanos un mensaje</span>
                <div class="absolute left-0 right-0 top-1/2 h-0.5 bg-red-700 -z-0"></div>
            </h2>
			<div class="bg-black p-8 rounded-lg shadow-lg max-w-5xl mx-auto">
				<form id="contact-form" autocomplete="off" novalidate action="{{ route('contact.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
					@csrf
					<div class="col-span-1">
						<label for="first_name" class="block text-gray-300 font-bold mb-2">Nombre (requerido)</label>
						<input type="text" id="first_name" name="first_name" maxlength="50" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Ingresa tu nombre" required />
						@error('first_name')
							<span class="text-red-500 text-sm mt-1 min-h-[20px]">{{ $message }}</span>
						@enderror
						<p id="error_first_name" class="min-h-[20px]"></p>
					</div>
					<div class="col-span-1">
						<label for="last_name" class="block text-gray-300 font-bold mb-2">Apellido (requerido)</label>
						<input type="text" id="last_name" name="last_name" maxlength="50" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Ingresa tu apellido" required />
						@error('last_name')
							<span class="text-red-500 text-sm mt-1 min-h-[20px]">{{ $message }}</span>
						@enderror
						<p id="error_last_name" class="min-h-[20px]"></p>
					</div>
					<div class="col-span-1">
						<label for="cellphone" class="block text-gray-300 font-bold mb-2">Número de Teléfono (opcional)</label>
						<div class="flex">
							<span class="inline-flex items-center px-3 rounded-l-sm bg-zinc-700 text-white border border-r-0 border-zinc-700 select-none">+56</span>
							<input type="tel" id="cellphone" name="cellphone" maxlength="9" minlength="9" class="w-full p-3 rounded-r-sm bg-zinc-800 text-white border border-zinc-700 border-l-0 focus:outline-none focus:ring-2 focus:ring-red-700 text-sm" placeholder="912345678" pattern="[0-9]{9}" inputmode="numeric" />
						</div>
						@error('cellphone')
							<span class="text-red-500 text-sm mt-1 min-h-[20px]">{{ $message }}</span>
						@enderror
						<p id="error_cellphone" class="min-h-[20px]"></p>
					</div>
					<div class="col-span-1">
						<label for="email" class="block text-gray-300 font-bold mb-2">Correo electrónico (requerido)</label>
						<input type="email" id="email" name="email" maxlength="100" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Ingresa tu correo electrónico" required />
						@error('email')
							<span class="text-red-500 text-sm mt-1 min-h-[20px]">{{ $message }}</span>
						@enderror
						<p id="error_email" class="min-h-[20px]"></p>
					</div>
					<div class="col-span-1 md:col-span-2">
						<label for="category_slug" class="block text-gray-300 font-bold mb-2">Categoría (requerido)</label>
						<select id="category_slug" name="category_slug" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" required>
							<option value="">Selecciona una categoría</option>
							@foreach($categories as $category)
								<option value="{{ $category->slug }}">{{ $category->name }}</option>
							@endforeach
						</select>
						@error('category_slug')
							<span class="text-red-500 text-sm mt-1 min-h-[20px]">{{ $message }}</span>
						@enderror
						<p id="error_category_slug" class="min-h-[20px]"></p>
					</div>
					<div class="col-span-1 md:col-span-2">
						<label for="message" class="block text-gray-300 font-bold mb-2">Mensaje (requerido)</label>
						<textarea id="message" name="message" minlength="20" maxlength="1000" rows="5" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Escribe tu mensaje aquí (mínimo 20, máximo 1000 caracteres)..." required></textarea>
						@error('message')
							<span class="text-red-500 text-sm mt-1 min-h-[20px]">{{ $message }}</span>
						@enderror
						<p id="error_message" class="min-h-[20px]"></p>
					</div>
					<div class="md:col-span-2 col-span-1 mt-4">
						<div class="mb-4 flex justify-center">
							<div class="w-full flex flex-col items-center">
								<div id="turnstile-container" class="flex justify-center"></div>
								@error('cf-turnstile-response')
									<span class="text-red-500 text-sm mt-1 min-h-[20px]">{{ $message }}</span>
								@enderror
							</div>
						</div>
						<button id="submit-btn" type="submit" class="w-full bg-gray-500 text-white font-bold py-3 rounded-sm text-lg transition cursor-not-allowed" disabled>Enviar Mensaje</button>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection

@push('scripts')
   <script>
   document.addEventListener('DOMContentLoaded', function () {
	   const form = document.getElementById('contact-form');
	   const submitBtn = document.getElementById('submit-btn');
	   const turnstileContainer = document.getElementById('turnstile-container');
	   const turnstileScriptId = 'cloudflare-turnstile-script';
	   let turnstileRetries = 0;
	   const maxTurnstileRetries = 10;

	   function getTurnstileToken() {
		   const tokenInput = document.querySelector('input[name="cf-turnstile-response"]');
		   return tokenInput ? tokenInput.value : '';
	   }

	   function setTurnstileToken(token) {
		   let input = document.querySelector('input[name="cf-turnstile-response"]');
		   if (!input) {
			   input = document.createElement('input');
			   input.type = 'hidden';
			   input.name = 'cf-turnstile-response';
			   form.appendChild(input);
		   }
		   input.value = token;
	   }

	   function loadTurnstileScript() {
		   if (document.getElementById(turnstileScriptId)) {
			   return;
		   }

		   const script = document.createElement('script');
		   script.id = turnstileScriptId;
		   script.src = 'https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit';
		   script.async = true;
		   script.defer = true;
		   script.onerror = function () {
			   turnstileRetries += 1;
			   if (turnstileRetries <= maxTurnstileRetries) {
				   document.getElementById(turnstileScriptId)?.remove();
				   setTimeout(loadTurnstileScript, 1000);
			   }
		   };

		   document.head.appendChild(script);
	   }

	   function renderTurnstile() {
		   if (!turnstileContainer || turnstileContainer.dataset.rendered === '1') {
			   return;
		   }

		   if (!window.turnstile || typeof window.turnstile.render !== 'function') {
			   turnstileRetries += 1;
			   if (turnstileRetries <= maxTurnstileRetries) {
				   setTimeout(renderTurnstile, 500);
			   }
			   return;
		   }

		   turnstileContainer.dataset.rendered = '1';
		   window.turnstile.render(turnstileContainer, {
			   sitekey: '{{ config('turnstile.site_key', config('app.turnstile.site_key')) }}',
			   callback: function(token) {
				   setTurnstileToken(token);
				   updateButtonState();
			   },
			   'expired-callback': function() {
				   setTurnstileToken('');
				   updateButtonState();
			   },
			   'error-callback': function() {
				   setTurnstileToken('');
				   updateButtonState();
			   },
			   theme: 'light',
		   });
	   }
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
		   },
		   category_slug: {
			   required: true,
			   validator: value => value !== '',
			   error: 'Selecciona una categoría.'
		   },
		   message: {
			   required: true,
			   validator: value => value.trim().length >= 20 && value.trim().length <= 1000,
			   error: 'El mensaje debe tener entre 20 y 1000 caracteres.'
		   },
		   'cf-turnstile-response': {
			   required: true,
			   validator: value => value && value.length > 0,
			   error: 'Por favor verifica que no eres un robot.'
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

	   function updateErrors() {
		   let valid = true;
		   Object.keys(fields).forEach(field => {
			   const input = document.getElementById(field);
			   let value = input ? input.value : '';
			   if (field === 'cf-turnstile-response') {
				   value = getTurnstileToken();
			   }
			   const errorMsg = validateField(field, value);
			   if (errorMsg) valid = false;
		   });
		   return valid;
	   }

	   function updateButtonState() {
		   const isValid = updateErrors();
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
		   if (input) {
			   input.addEventListener('input', updateButtonState);
			   input.addEventListener('blur', updateButtonState);
		   }
	   });

	   form.addEventListener('submit', function (e) {
		   const isValid = updateErrors();
		   updateButtonState();
		   if (!isValid) {
			   e.preventDefault();
		   }
	   });

	   if (turnstileContainer) {
		   loadTurnstileScript();
		   renderTurnstile();
	   }

	   updateButtonState();
   });
   </script>
@endpush