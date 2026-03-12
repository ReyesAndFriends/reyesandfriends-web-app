@extends('layout.app')

@section('title', 'Reyes&Friends - Cotizar un proyecto web')
@section('description', 'Completa tus datos para que te contactemos sobre el proyecto web que deseas cotizar. Soluciones digitales innovadoras y personalizadas.')
@section('keywords', 'cotizar proyecto web, contacto para cotización, soluciones digitales personalizadas, desarrollo web a medida')

@section('content')
	<section class="py-16">
		<div class="container mx-auto px-6">
			<div class="max-w-screen-xl max-md:max-w-xl mx-auto bg-black py-8 px-8 md:px-12 rounded-lg shadow-lg" data-aos="zoom-in" data-aos-duration="1200">
				<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-y-12 gap-x-8 lg:gap-x-12">
					<div class="lg:col-span-2">
						<div>
							<h2 class="text-2xl text-white font-semibold mb-6 text-center" data-aos="fade-down" data-aos-delay="200">Cotizar Proyecto Web</h2>
							<p class="text-white mb-6" data-aos="fade-up" data-aos-delay="400">Cuéntanos sobre tu proyecto y comparte imágenes de referencia si deseas. Nuestro equipo revisará tu solicitud para enviarte una propuesta ajustada a lo que necesitas.</p>

							<form id="quote-project-form" autocomplete="off" novalidate action="{{ route('quote_project.store') }}" method="POST" enctype="multipart/form-data" data-aos="zoom-in" data-aos-delay="600">
								@csrf

								<div class="grid lg:grid-cols-2 gap-y-6 gap-x-4">
									<div class="col-span-1 lg:col-span-2">
										<label for="name" class="block text-zinc-100 font-bold mb-2">Nombre del Proyecto (requerido)</label>
										<input type="text" id="name" name="name" maxlength="120" value="{{ old('name') }}" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Ejemplo: Plataforma de reservas para clínica" required />
										@error('name')
											<span class="text-red-500 text-sm mt-1 min-h-[20px] block">{{ $message }}</span>
										@enderror
										<p id="error_name" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
									</div>

									<div class="col-span-1">
										<label for="client_name" class="block text-zinc-100 font-bold mb-2">Tu Nombre (requerido)</label>
										<input type="text" id="client_name" name="client_name" maxlength="100" value="{{ old('client_name') }}" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Ingresa tu nombre" required />
										@error('client_name')
											<span class="text-red-500 text-sm mt-1 min-h-[20px] block">{{ $message }}</span>
										@enderror
										<p id="error_client_name" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
									</div>

									<div class="col-span-1">
										<label for="client_email" class="block text-zinc-100 font-bold mb-2">Correo Electrónico (requerido)</label>
										<input type="email" id="client_email" name="client_email" maxlength="100" value="{{ old('client_email') }}" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Ingresa tu correo electrónico" required />
										@error('client_email')
											<span class="text-red-500 text-sm mt-1 min-h-[20px] block">{{ $message }}</span>
										@enderror
										<p id="error_client_email" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
									</div>

									<div class="col-span-1">
										<label for="client_phone" class="block text-zinc-100 font-bold mb-2">Número de Teléfono (opcional)</label>
										<div class="flex">
											<span class="inline-flex items-center px-3 rounded-l-sm bg-zinc-700 text-white border border-r-0 border-zinc-700 select-none">+56</span>
											<input type="tel" id="client_phone" name="client_phone" maxlength="9" minlength="9" value="{{ old('client_phone') }}" class="w-full p-3 rounded-r-sm bg-zinc-800 text-white border border-zinc-700 border-l-0 focus:outline-none focus:ring-2 focus:ring-red-700 text-sm" placeholder="912345678" pattern="[0-9]{9}" inputmode="numeric" />
										</div>
										@error('client_phone')
											<span class="text-red-500 text-sm mt-1 min-h-[20px] block">{{ $message }}</span>
										@enderror
										<p id="error_client_phone" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
									</div>

									<div class="col-span-1 lg:col-span-2">
										<label for="description" class="block text-zinc-100 font-bold mb-2">Describe tu Proyecto (requerido)</label>
										<textarea id="description" name="description" rows="5" minlength="20" maxlength="2500" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Cuéntanos objetivos, funcionalidades necesarias, tipo de público, plazos, etc." required>{{ old('description') }}</textarea>
										@error('description')
											<span class="text-red-500 text-sm mt-1 min-h-[20px] block">{{ $message }}</span>
										@enderror
										<p id="error_description" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
									</div>

									<div class="col-span-1 lg:col-span-2">
										<label for="extra_info" class="block text-zinc-100 font-bold mb-2">Información Adicional (opcional)</label>
										<textarea id="extra_info" name="extra_info" rows="3" maxlength="1200" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" placeholder="Puedes agregar detalles como presupuesto aproximado, referencias o requisitos especiales.">{{ old('extra_info') }}</textarea>
										@error('extra_info')
											<span class="text-red-500 text-sm mt-1 min-h-[20px] block">{{ $message }}</span>
										@enderror
										<p id="error_extra_info" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
									</div>

									<div class="col-span-1 lg:col-span-2">
										<label for="photos" class="block text-zinc-100 font-bold mb-2">Imágenes de Referencia (opcional, máximo 5)</label>
										<input type="file" id="photos" name="photos[]" multiple accept="image/jpeg,image/png,image/jpg,image/webp" class="w-full p-3 rounded-sm bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-700" />
										<p class="text-sm text-zinc-200 mt-2">Formatos permitidos: JPG, JPEG, PNG y WEBP. Máximo 4MB por imagen y 12MB en total.</p>
										@error('photos')
											<span class="text-red-500 text-sm mt-1 min-h-[20px] block">{{ $message }}</span>
										@enderror
										@error('photos.*')
											<span class="text-red-500 text-sm mt-1 min-h-[20px] block">{{ $message }}</span>
										@enderror
										<p id="error_photos" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
										<p id="photos_count_info" class="text-sm text-zinc-200 min-h-[20px]"></p>
										<div id="photos-preview-wrapper" class="hidden mt-4">
											<div class="flex items-center justify-between mb-2">
												<p class="text-sm text-zinc-100 font-semibold">Vista previa</p>
												<button type="button" id="clear-photos-btn" class="text-xs bg-zinc-700 hover:bg-zinc-600 text-white px-3 py-1 rounded">Limpiar todo</button>
											</div>
											<div id="photos-preview-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3"></div>
										</div>
									</div>

									<div class="lg:col-span-2 mt-6">
										<div class="mb-4 flex justify-center">
											<div class="w-full flex flex-col items-center">
												<div id="turnstile-container" class="flex justify-center"></div>
												@error('cf-turnstile-response')
													<span class="text-red-500 text-sm mt-1 min-h-[20px] block">{{ $message }}</span>
												@enderror
												<p id="error_cf-turnstile-response" class="text-red-500 text-sm mt-1 min-h-[20px]"></p>
											</div>
										</div>
										<button id="submit-btn" type="submit" class="w-full bg-zinc-600 text-white font-bold py-3 px-8 rounded text-lg transition cursor-not-allowed" disabled>Enviar Solicitud</button>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="relative">
						<h2 class="text-xl text-white font-semibold mb-6">¿Qué Revisaremos?</h2>
						<div class="rounded shadow-xl w-full min-h-48 bg-zinc-900 border border-zinc-700 p-5 flex flex-col gap-4">
							<div>
								<h3 class="text-lg text-white font-semibold">Objetivos del Proyecto</h3>
								<p class="text-zinc-100 mt-2">Analizamos el tipo de solución web que buscas y los resultados que esperas obtener.</p>
							</div>
							<div>
								<h3 class="text-lg text-white font-semibold">Alcance y Funcionalidades</h3>
								<p class="text-zinc-100 mt-2">Con tu descripción e imágenes podemos estimar mejor tiempos, complejidad y propuesta.</p>
							</div>
							<div>
								<h3 class="text-lg text-white font-semibold">Siguiente Paso</h3>
								<p class="text-zinc-100 mt-2">Te responderemos por correo para coordinar una reunión o enviarte una cotización inicial.</p>
							</div>
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
	const form = document.getElementById('quote-project-form');
	const submitBtn = document.getElementById('submit-btn');
	const photosInput = document.getElementById('photos');
	const clientPhoneInput = document.getElementById('client_phone');
	const photosCountInfo = document.getElementById('photos_count_info');
		const photosPreviewWrapper = document.getElementById('photos-preview-wrapper');
		const photosPreviewGrid = document.getElementById('photos-preview-grid');
		const clearPhotosBtn = document.getElementById('clear-photos-btn');
	const turnstileContainer = document.getElementById('turnstile-container');
	const turnstileScriptId = 'cloudflare-turnstile-script-quote-project';
	let turnstileRetries = 0;
	const maxTurnstileRetries = 10;
		const maxPhotos = 5;
		const maxFileSizeBytes = 4 * 1024 * 1024;
		const maxTotalSizeBytes = 12 * 1024 * 1024;
		let selectedFiles = [];

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

	function formatBytesToMb(bytes) {
		return (bytes / (1024 * 1024)).toFixed(2);
	}

	function syncPhotosInputFromSelection() {
		if (!photosInput) {
			return;
		}

		const dataTransfer = new DataTransfer();
		selectedFiles.forEach(file => dataTransfer.items.add(file));
		photosInput.files = dataTransfer.files;
	}

	function renderPhotoPreviews() {
		if (!photosPreviewWrapper || !photosPreviewGrid) {
			return;
		}

		photosPreviewGrid.innerHTML = '';

		if (selectedFiles.length === 0) {
			photosPreviewWrapper.classList.add('hidden');
			return;
		}

		photosPreviewWrapper.classList.remove('hidden');

		selectedFiles.forEach((file, index) => {
			const card = document.createElement('div');
			card.className = 'relative bg-zinc-900 border border-zinc-700 rounded p-2';

			const image = document.createElement('img');
			const imageUrl = URL.createObjectURL(file);
			image.src = imageUrl;
			image.alt = 'Vista previa ' + (index + 1);
			image.className = 'w-full h-24 object-cover rounded';
			image.onload = function () {
				URL.revokeObjectURL(imageUrl);
			};

			const meta = document.createElement('p');
			meta.className = 'text-[11px] text-zinc-200 mt-2 truncate';
			meta.textContent = file.name + ' (' + formatBytesToMb(file.size) + ' MB)';

			const removeBtn = document.createElement('button');
			removeBtn.type = 'button';
			removeBtn.className = 'absolute top-1 right-1 text-[10px] bg-red-800 hover:bg-red-900 text-white px-2 py-1 rounded';
			removeBtn.textContent = 'Quitar';
			removeBtn.addEventListener('click', function () {
				selectedFiles.splice(index, 1);
				syncPhotosInputFromSelection();
				renderPhotoPreviews();
				updateButtonState();
			});

			card.appendChild(image);
			card.appendChild(meta);
			card.appendChild(removeBtn);
			photosPreviewGrid.appendChild(card);
		});
	}

	function getPhotosError(files) {
		if (!files || files.length === 0) {
			return '';
		}

		if (files.length > maxPhotos) {
			return 'Puedes subir un máximo de 5 imágenes.';
		}

		const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
		let totalSize = 0;
		for (const file of files) {
			if (!allowedTypes.includes(file.type)) {
				return 'Solo se permiten imágenes JPG, JPEG, PNG o WEBP.';
			}
			if (file.size > maxFileSizeBytes) {
				return 'Cada imagen puede pesar hasta 4MB.';
			}
			totalSize += file.size;
		}

		if (totalSize > maxTotalSizeBytes) {
			return 'El peso total de las imágenes no puede superar 12MB.';
		}

		return '';
	}

	function normalizePhoneForInput(value) {
		if (!value) {
			return '';
		}

		let digits = value.replace(/\D+/g, '');

		if (digits.length === 11 && digits.startsWith('56')) {
			digits = digits.slice(2);
		}

		if (digits.length > 9) {
			digits = digits.slice(-9);
		}

		return digits;
	}

	const fields = {
		name: {
			required: true,
			validator: value => value.trim().length > 0 && value.trim().length <= 120,
			error: 'El nombre del proyecto es obligatorio (máximo 120 caracteres).'
		},
		client_name: {
			required: true,
			validator: value => value.trim().length > 0 && value.trim().length <= 100,
			error: 'Tu nombre es obligatorio (máximo 100 caracteres).'
		},
		client_email: {
			required: true,
			validator: value => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
			error: 'Correo electrónico inválido.'
		},
		client_phone: {
			required: false,
			validator: value => {
				const normalized = normalizePhoneForInput(value);
				return normalized === '' || /^\d{9}$/.test(normalized);
			},
			error: 'El número debe tener 9 dígitos.'
		},
		description: {
			required: true,
			validator: value => value.trim().length >= 20 && value.trim().length <= 2500,
			error: 'La descripción debe tener entre 20 y 2500 caracteres.'
		},
		extra_info: {
			required: false,
			validator: value => value.trim().length <= 1200,
			error: 'La información adicional no puede superar 1200 caracteres.'
		},
		photos: {
			required: false,
			validator: files => getPhotosError(files) === '',
			error: ''
		},
		'cf-turnstile-response': {
			required: true,
			validator: value => value && value.length > 0,
			error: 'Por favor verifica que no eres un robot.'
		}
	};

	function validateField(field) {
		if (field === 'cf-turnstile-response') {
			const token = getTurnstileToken();
			return fields[field].validator(token) ? '' : fields[field].error;
		}

		if (field === 'photos') {
			const files = selectedFiles;
			return getPhotosError(files);
		}

		const input = document.getElementById(field);
		const value = input ? input.value : '';

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
			const errorElem = document.getElementById('error_' + field.replace(/\./g, '-'));
			const errorMsg = validateField(field);

			if (errorElem) {
				errorElem.textContent = showErrors && errorMsg ? errorMsg : '';
			}

			if (errorMsg) {
				valid = false;
			}
		});

		if (photosCountInfo) {
			const total = selectedFiles.length;
			const totalSize = selectedFiles.reduce((sum, file) => sum + file.size, 0);
			photosCountInfo.textContent = total > 0
				? total + ' imagen(es) seleccionada(s) - ' + formatBytesToMb(totalSize) + ' MB en total.'
				: '';
		}

		return valid;
	}

	function updateButtonState() {
		const isValid = updateErrors(false);

		if (isValid) {
			submitBtn.disabled = false;
			submitBtn.classList.remove('bg-zinc-600', 'cursor-not-allowed');
			submitBtn.classList.add('bg-red-800', 'hover:bg-red-900', 'cursor-pointer');
		} else {
			submitBtn.disabled = true;
			submitBtn.classList.add('bg-zinc-600', 'cursor-not-allowed');
			submitBtn.classList.remove('bg-red-800', 'hover:bg-red-900', 'cursor-pointer');
		}
	}

	Object.keys(fields).forEach(field => {
		if (field === 'photos' || field === 'cf-turnstile-response') {
			return;
		}

		const input = document.getElementById(field);
		if (input) {
			input.addEventListener('input', updateButtonState);
			input.addEventListener('blur', updateButtonState);
		}
	});

	if (clientPhoneInput) {
		clientPhoneInput.value = normalizePhoneForInput(clientPhoneInput.value);
		clientPhoneInput.addEventListener('input', function () {
			this.value = normalizePhoneForInput(this.value);
		});
	}

	if (photosInput) {
		photosInput.addEventListener('change', function () {
			selectedFiles = Array.from(photosInput.files || []);
			syncPhotosInputFromSelection();
			renderPhotoPreviews();
			updateButtonState();
		});
	}

	if (clearPhotosBtn) {
		clearPhotosBtn.addEventListener('click', function () {
			selectedFiles = [];
			syncPhotosInputFromSelection();
			renderPhotoPreviews();
			updateButtonState();
		});
	}

	form.addEventListener('submit', function (e) {
		const isValid = updateErrors(true);
		updateButtonState();

		if (!isValid) {
			e.preventDefault();
		}
	});

	if (turnstileContainer) {
		loadTurnstileScript();
		renderTurnstile();
	}

	renderPhotoPreviews();
	updateButtonState();
});
</script>
@endpush