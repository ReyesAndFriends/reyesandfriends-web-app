@extends('layout.app')

@section('title', 'Reyes&Friends - Plan Web: ' . $webPlan->name)
@section('description', 'Descubre nuestro plan web "' . $webPlan->name . '" diseñado para impulsar tu negocio al siguiente nivel. Soluciones digitales innovadoras y personalizadas. ¡Transforma tu empresa hoy!')
@section('keywords', 'planes web, desarrollo web, diseño web, soluciones digitales, aplicaciones móviles, software a medida, chile, ' . $webPlan->name)

@section('content')
	<section class="py-16">
		<div class="container mx-auto px-6">
			<div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12 p-12 items-start bg-zinc-900 rounded-xl">
                <div class="flex flex-col justify-center" data-aos="fade-right" data-aos-duration="1000">
					   @if($webPlan->images && count($webPlan->images) > 0)
						   <div class="flex flex-col gap-4">
							   <div class="w-full aspect-[16/9] mb-2 relative">
								   <img
									   id="mainImage"
									   src="{{ $webPlan->images[0]->image_url }}"
									   alt="Mockup del plan {{ $webPlan->name }}"
									   class="rounded shadow-xl w-full h-full object-cover cursor-pointer transition-all duration-300"
									   data-aos="fade-in"
									   data-aos-duration="600"
								   />
								   <button id="zoomBtn" class="absolute bottom-3 right-3 bg-black/60 text-white rounded-full p-2 text-xl hover:bg-black/80 transition-all duration-200" style="z-index:2" title="Ver en detalle">
									   <i class="fas fa-search-plus cursor-pointer"></i>
								   </button>
							   </div>
							   @if(count($webPlan->images) > 1)
								   <div class="flex gap-3 overflow-x-auto pb-2">
									   @foreach($webPlan->images as $image)
										   <img
											   src="{{ $image->image_url }}"
											   alt="Imagen del plan {{ $webPlan->name }}"
											   class="rounded shadow w-32 h-20 object-cover border-2 border-zinc-800 hover:border-red-600 transition-all duration-200 cursor-pointer"
											   data-aos="fade-in"
											   data-aos-duration="400"
										   />
									   @endforeach
								   </div>
							   @endif
						   </div>
					   @endif
				</div>
				<div class="flex flex-col justify-center" data-aos="fade-left" data-aos-duration="1000">
					   <h1 class="text-4xl md:text-5xl text-white mb-4 font-bold" data-aos="zoom-in" data-aos-duration="800">
						Plan <span class="text-red-600">{{ $webPlan->name }}</span>
					</h1>
					   <h2 class="text-2xl text-white mb-6 font-semibold" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
						${{ number_format($webPlan->price_clp, 0, ',', '.') }}/mes
						@if($webPlan->number_of_months && $webPlan->final_price_clp)
							<span class="block text-base text-gray-400 mt-1">Durante {{ $webPlan->number_of_months }} meses</span>
						@endif
					</h2>
					   <p class="text-lg text-gray-200 mb-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
						{{ $webPlan->description }}
					</p>

					   @if($webPlan->features())
						   <div class="mb-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
							   <h3 class="text-xl text-white font-semibold mb-2">Características principales:</h3>
							   <ul class="list-disc list-inside text-gray-200">
								   @foreach($webPlan->features as $feature)
									   <li data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ 700 + ($loop->index * 100) }}">{{ $feature->feature }}</li>
								   @endforeach
							   </ul>
						   </div>
					@endif

					   @if($webPlan->usages())
						   <div class="mb-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="800">
							   <h3 class="text-xl text-white font-semibold mb-2">Usos recomendados:</h3>
							   <ul class="list-disc list-inside text-gray-200">
								   @foreach($webPlan->usages as $usage)
									   <li data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ 900 + ($loop->index * 100) }}">{{ $usage->usage }}</li>
								   @endforeach
							   </ul>
						   </div>
					@endif

					   @if($webPlan->demo_url)
						   <a href="{{ $webPlan->demo_url }}" target="_blank" rel="noopener" class="inline-block mb-4 text-red-400 hover:text-red-600 underline font-semibold" data-aos="fade-up" data-aos-duration="800" data-aos-delay="1000">Ver demo en vivo</a>
					@endif

					<a href="{{ route('web_plans.interest_form', ['slug' => $webPlan->slug]) }}" class="inline-block bg-red-800 hover:bg-red-900 text-white font-bold py-3 px-8 rounded text-lg transition text-center " data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="1200">Me Interesa <i class="fas fa-arrow-right ml-2"></i></a>

				</div>
			</div>
		</div>
	</section>
@endsection

@push('scripts')
   <script>
	   document.addEventListener('DOMContentLoaded', function() {
		   const mainImg = document.getElementById('mainImage');
		   const thumbs = document.querySelectorAll('img[alt^="Imagen del plan"]');
		   thumbs.forEach(thumb => {
			   thumb.addEventListener('click', function() {
				   if(mainImg) {
					   mainImg.src = this.src;
					   mainImg.setAttribute('data-aos', 'fade-in');
					   mainImg.setAttribute('data-aos-duration', '600');
					   AOS.refresh();
				   }
			   });
		   });

		   // Modal
		   const zoomBtn = document.getElementById('zoomBtn');
		   let modal = null;
		   function openModal(imgSrc) {
			   if(modal) return;
			   modal = document.createElement('div');
			   modal.id = 'imgModal';
			   modal.className = 'fixed inset-0 flex items-center justify-center bg-black/50 z-50 transition-opacity duration-300 opacity-100';
			   modal.innerHTML = `
				   <button class="absolute top-4 right-6 bg-black/70 text-white rounded-full p-2 text-2xl hover:bg-black/90 transition-all duration-200" id="closeModalBtn" title="Cerrar" style="z-index:100;">
					   <i class="fas fa-times cursor-pointer"></i>
				   </button>
				   <div class="relative" data-aos="fade-in" data-aos-duration="400">
					   <img src="${imgSrc}" alt="Imagen detalle" class="max-w-screen-lg max-h-screen rounded shadow-xl" style="box-shadow:0 0 40px #000;" />
				   </div>
			   `;
			   document.body.appendChild(modal);
			   AOS.refresh();

			   modal.querySelector('#closeModalBtn').addEventListener('click', function(e) {
				   e.preventDefault();
				   e.stopPropagation();
				   closeModal();
			   });
			   modal.addEventListener('click', function(e) {
				   const img = modal.querySelector('img');
				   const btn = modal.querySelector('#closeModalBtn');

				   if(e.target === modal || (img && !img.contains(e.target) && (!btn || !btn.contains(e.target)))) {
					   closeModal();
				   }
			   });
		   }
		   function closeModal() {
			   if(modal) {
				   modal.style.opacity = '0';
				   setTimeout(() => {
					   modal.remove();
					   modal = null;
				   }, 300);
			   }
		   }
		   if(mainImg) {
			   mainImg.addEventListener('click', function() {
				   openModal(mainImg.src);
			   });
		   }
		   if(zoomBtn && mainImg) {
			   zoomBtn.addEventListener('click', function(e) {
				   e.stopPropagation();
				   openModal(mainImg.src);
			   });
		   }
	   });
   </script>
@endpush